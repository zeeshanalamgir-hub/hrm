import $ from 'jquery';

export function openSidebar() {
    $('#sidebar').addClass('open');
    $('#sidebarOverlay').addClass('show');
}

export function closeSidebar() {
    $('#sidebar').removeClass('open');
    $('#sidebarOverlay').removeClass('show');
}

function toggleSubmenu(event) {
    event.preventDefault();

    const $item = $(this);
    const $submenu = $('#submenu-' + $item.data('menu'));
    const willOpen = !$submenu.hasClass('open');

    // Only one module stays expanded at a time.
    $('.nav-submenu').not($submenu).stop(true, true).slideUp(180).removeClass('open');
    $('.has-submenu').not($item).removeClass('expanded').attr('aria-expanded', 'false');

    if (willOpen) {
        $submenu.stop(true, true).slideDown(220).addClass('open');
    } else {
        $submenu.stop(true, true).slideUp(180).removeClass('open');
    }

    $item.toggleClass('expanded', willOpen).attr('aria-expanded', String(willOpen));
}

export function initSidebar() {
    $('#menuButton').on('click', openSidebar);
    $('#closeSidebar, #sidebarOverlay').on('click', closeSidebar);
    $('.has-submenu').on('click', toggleSubmenu);

    $(document).on('keydown', (event) => {
        if (event.key === 'Escape') {
            closeSidebar();
        }
    });
}
