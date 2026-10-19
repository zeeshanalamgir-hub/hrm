import $ from 'jquery';
import { initDropdowns } from './dropdown';
import { showToast } from './toast';

export function initTopbar() {
    const $search = $('#globalSearch');

    // Ctrl/Cmd + K focuses the global search from anywhere.
    $(document).on('keydown', (event) => {
        if ((event.metaKey || event.ctrlKey) && event.key.toLowerCase() === 'k') {
            event.preventDefault();
            $search.trigger('focus');
        }
    });

    $search.on('keydown', (event) => {
        const query = $search.val().trim();

        if (event.key === 'Enter' && query) {
            showToast(`Search is ready for “${query}” — connect a search API.`);
        }
    });

    initDropdowns();
    initNotifications();
}

function initNotifications() {
    // Sample notifications are not stored yet, so "read" only lasts until the next page load.
    $('#markAllRead').on('click', function () {
        $('.notification-item.unread').removeClass('unread');
        $('#notificationDot, #notificationCount').remove();
        $(this).remove();
        showToast('All notifications marked as read.');
    });
}
