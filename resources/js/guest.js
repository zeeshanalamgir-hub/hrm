import $ from 'jquery';
import { renderIcons } from './erp/icons';

window.$ = window.jQuery = $;

function toast(message) {
    const $toast = $('#guestToast');

    $toast.text(message).addClass('show');
    clearTimeout($toast.data('timer'));
    $toast.data('timer', setTimeout(() => $toast.removeClass('show'), 3200));
}

function initLandingNav() {
    $('#mobileMenu').on('click', function () {
        const $nav = $('#siteNav').toggleClass('open');
        $(this).attr('aria-expanded', String($nav.hasClass('open')));
    });

    $('#siteNav a').on('click', () => {
        $('#siteNav').removeClass('open');
        $('#mobileMenu').attr('aria-expanded', 'false');
    });
}

function initLoginForm() {
    const $form = $('#loginForm');
    const $email = $('#email');
    const $password = $('#password');
    const $note = $('#formNote');

    $('#togglePassword').on('click', function () {
        const reveal = $password.attr('type') === 'password';

        $password.attr('type', reveal ? 'text' : 'password');
        $(this)
            .attr('aria-label', reveal ? 'Hide password' : 'Show password')
            .html(`<i data-lucide="${reveal ? 'eye-off' : 'eye'}" class="size-4"></i>`);
        renderIcons(this);
    });

    $('#forgotPassword').on('click', (event) => {
        event.preventDefault();
        toast('Password reset is not set up yet. Contact your workspace administrator.');
        $email.trigger('focus');
    });

    // Quick client-side checks; the server validates again on submit.
    $form.on('submit', (event) => {
        if (!$email.val().trim() || !$email[0].checkValidity()) {
            event.preventDefault();
            $note.addClass('error').text('Please enter a valid work email address.');
            $email.trigger('focus');
            return;
        }

        if (!$password.val()) {
            event.preventDefault();
            $note.addClass('error').text('Please enter your password.');
            $password.trigger('focus');
            return;
        }

        $form.find('[type=submit]').prop('disabled', true);
    });
}

$(function () {
    renderIcons();
    initLandingNav();
    initLoginForm();
});
