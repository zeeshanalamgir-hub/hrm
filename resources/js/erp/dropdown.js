import $ from 'jquery';

/*
 * Simple dropdowns:
 *   <div data-dropdown>
 *     <button data-dropdown-toggle aria-expanded="false">…</button>
 *     <div data-dropdown-panel>…</div>
 *   </div>
 * Only one dropdown is open at a time. Clicking outside, choosing a
 * [role=menuitem] or pressing Escape closes it.
 */
function setOpen($dropdown, open) {
    $dropdown.find('[data-dropdown-panel]').first().toggleClass('open', open);
    $dropdown.find('[data-dropdown-toggle]').first().attr('aria-expanded', String(open));
}

export function closeDropdowns($except = $()) {
    $('[data-dropdown]').not($except).each(function () {
        setOpen($(this), false);
    });
}

export function initDropdowns() {
    $(document).on('click', '[data-dropdown-toggle]', function (event) {
        event.stopPropagation();

        const $dropdown = $(this).closest('[data-dropdown]');
        const willOpen = $(this).attr('aria-expanded') !== 'true';

        closeDropdowns($dropdown);
        setOpen($dropdown, willOpen);
    });

    $(document).on('click', (event) => {
        const $target = $(event.target);

        if ($target.closest('[role=menuitem]').length || !$target.closest('[data-dropdown]').length) {
            closeDropdowns();
        }
    });

    $(document).on('keydown', (event) => {
        if (event.key !== 'Escape') {
            return;
        }

        const $open = $('[data-dropdown-panel].open').closest('[data-dropdown]');

        if ($open.length) {
            closeDropdowns();
            $open.find('[data-dropdown-toggle]').first().trigger('focus');
        }
    });
}
