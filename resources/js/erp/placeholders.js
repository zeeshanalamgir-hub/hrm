import $ from 'jquery';
import { closeSidebar } from './sidebar';
import { showToast } from './toast';

/*
 * Links and buttons marked data-placeholder="Name" belong to modules that
 * are not built yet. Give them a real route to remove the placeholder.
 */
export function initPlaceholders() {
    $(document).on('click', '[data-placeholder]', function (event) {
        event.preventDefault();

        closeSidebar();
        showToast(`${$(this).data('placeholder')} — connect this to your module.`);
    });
}
