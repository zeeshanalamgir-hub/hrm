import $ from 'jquery';
import { renderIcons } from './erp/icons';
import { initSidebar } from './erp/sidebar';
import { initTopbar } from './erp/topbar';
import { initModals } from './erp/modal';
import { initPlaceholders } from './erp/placeholders';
import { showToast } from './erp/toast';
import { initSearchableSelects } from './erp/searchable-select';
import { initImagePreviews } from './erp/image-preview';
import { initDatePickers } from './erp/datepicker';

// Expose jQuery globally for inline scripts and third-party plugins.
window.$ = window.jQuery = $;

$(function () {
    renderIcons();
    initSidebar();
    initTopbar();
    initModals();
    initPlaceholders();
    initSearchableSelects();
    initImagePreviews();
    initDatePickers();

    // Show the session flash message (e.g. "Profile updated.") after redirects.
    const flash = $('#toast').data('flash');
    if (flash) {
        showToast(flash);
    }
});
