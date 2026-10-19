import $ from 'jquery';

/*
 * Any element with data-open-modal="<dialog id>" opens that <dialog>.
 */
export function initModals() {
    $(document).on('click', '[data-open-modal]', function () {
        document.getElementById($(this).data('open-modal'))?.showModal();
    });

    $(document).on('click', '[data-close-modal]', function () {
        $(this).closest('dialog')[0]?.close();
    });

    initConfirmDelete();
}

/*
 * Buttons with data-confirm-delete="<url>" and data-name="<label>" open the
 * shared confirmation dialog, which submits a DELETE request to that URL.
 */
function initConfirmDelete() {
    const modal = document.getElementById('confirmDeleteModal');

    $(document).on('click', '[data-confirm-delete]', function () {
        $('#confirmDeleteForm').attr('action', $(this).data('confirm-delete'));
        $('#confirmDeleteName').text($(this).data('name') || 'this record');
        modal.showModal();
    });
}
