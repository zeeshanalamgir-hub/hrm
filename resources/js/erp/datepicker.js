import flatpickr from 'flatpickr';

const DISPLAY_FORMAT = 'M j, Y';
const VALUE_FORMAT = 'Y-m-d';

/*
 * Date pickers (flatpickr):
 *   <input data-datepicker>  single date in a form; submits Y-m-d, shows "Oct 10, 2026".
 *                            Optional data-min-date / data-max-date ("today" or Y-m-d).
 *   <button data-daterange data-from="Y-m-d" data-to="Y-m-d">
 *                            range picker with presets; applying it reloads the page
 *                            with ?from=…&to=… in the URL.
 */
export function initDatePickers(root = document) {
    root.querySelectorAll('input[data-datepicker]').forEach(initDateInput);
    root.querySelectorAll('[data-daterange]').forEach(initRangeButton);
}

function initDateInput(input) {
    if (input._flatpickr) {
        return;
    }

    flatpickr(input, {
        dateFormat: VALUE_FORMAT,
        altInput: true,
        altFormat: DISPLAY_FORMAT,
        allowInput: true,
        disableMobile: true,
        minDate: input.dataset.minDate || null,
        maxDate: input.dataset.maxDate || null,
    });
}

function initRangeButton(button) {
    // flatpickr needs an input to attach to; the button is only the trigger and anchor.
    const input = document.createElement('input');
    input.type = 'text';
    input.className = 'sr-only';
    input.tabIndex = -1;
    input.setAttribute('aria-hidden', 'true');
    button.after(input);

    const picker = flatpickr(input, {
        mode: 'range',
        dateFormat: VALUE_FORMAT,
        defaultDate: [button.dataset.from, button.dataset.to].filter(Boolean),
        maxDate: 'today',
        showMonths: window.matchMedia('(min-width: 768px)').matches ? 2 : 1,
        positionElement: button,
        position: 'below right',
        disableMobile: true,
        onReady: (_, __, instance) => addPresets(instance, apply),
        onClose: (dates) => {
            if (dates.length === 2) {
                apply(dates);
            }
        },
    });

    function apply([from, to]) {
        const url = new URL(window.location.href);
        url.searchParams.set('from', picker.formatDate(from, VALUE_FORMAT));
        url.searchParams.set('to', picker.formatDate(to, VALUE_FORMAT));

        if (url.href !== window.location.href) {
            window.location.assign(url);
        }
    }

    // Clicking the button while open would close (mousedown) and reopen (click); remember the state.
    let wasOpen = false;
    button.addEventListener('mousedown', () => (wasOpen = picker.isOpen));
    button.addEventListener('click', () => {
        if (!wasOpen) {
            picker.open();
        }
    });
    button.setAttribute('aria-haspopup', 'dialog');
}

function addPresets(instance, apply) {
    const today = new Date();
    today.setHours(0, 0, 0, 0);

    const daysAgo = (days) => new Date(today.getFullYear(), today.getMonth(), today.getDate() - days);
    const presets = [
        ['Today', () => [today, today]],
        ['Last 7 days', () => [daysAgo(6), today]],
        ['Last 30 days', () => [daysAgo(29), today]],
        ['This month', () => [new Date(today.getFullYear(), today.getMonth(), 1), today]],
        ['Last 90 days', () => [daysAgo(89), today]],
    ];

    const bar = document.createElement('div');
    bar.className = 'flatpickr-presets';

    presets.forEach(([label, range]) => {
        const preset = document.createElement('button');
        preset.type = 'button';
        preset.textContent = label;
        preset.addEventListener('click', () => {
            const dates = range();
            instance.setDate(dates, false);
            instance.close();
            apply(dates);
        });
        bar.append(preset);
    });

    instance.calendarContainer.append(bar);
}
