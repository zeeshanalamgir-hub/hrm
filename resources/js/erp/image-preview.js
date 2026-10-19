import $ from 'jquery';

/*
 * <input type="file" data-image-preview="#container"> shows the chosen image
 * inside the container ([data-avatar-new] replaces [data-avatar-current]) and
 * writes the file name into the nearest [data-image-name].
 */
export function initImagePreviews() {
    $(document).on('change', 'input[type=file][data-image-preview]', function () {
        const file = this.files?.[0];
        const $container = $($(this).data('image-preview'));

        if (!file || !file.type.startsWith('image/')) {
            return;
        }

        $container.find('[data-avatar-current]').addClass('hidden');
        $container.find('[data-avatar-new]').attr('src', URL.createObjectURL(file)).removeClass('hidden');
        $(this).closest('form').find('[data-image-name]').text(`${file.name} — click “Save profile” to upload.`);
    });
}
