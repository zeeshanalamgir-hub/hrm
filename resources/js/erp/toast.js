import $ from 'jquery';

let timer;

export function showToast(message) {
    const $toast = $('#toast');

    $('#toastMessage').text(message);
    $toast.addClass('show');

    clearTimeout(timer);
    timer = setTimeout(() => $toast.removeClass('show'), 2800);
}
