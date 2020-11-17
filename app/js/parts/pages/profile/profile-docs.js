jQuery(document).ready(($) => {
    const loadContainer = $('[data-profile-loadwrap]');
    $(document).on('submit', '#upload-file', (e) => {
        e.preventDefault();
        const formData = new FormData(e.currentTarget);
        formData.append('action', 'load_doc');
        formData.append('hui', 'hui');
        formData.append('file', $(e.currentTarget).find('[type="file"]')[0].files[0]);

        $.ajax({
            url: `${window.location.origin}/wp-admin/admin-ajax.php`,
            method: 'POST',
            processData: false,
            contentType: false,
            dataType: 'json',
            cache: false,
            data: formData,
            beforeSend: () => {
                loadContainer.addClass('load');
                $('.modal').removeClass('open');
            },
            success: (data) => {
                //const response = JSON.parse(data);
                console.log(data.template);
                $('[data-your-docs] .docs-wrap').html(data.template);
                loadContainer.removeClass('load');
                noteForm(data.message);
            }
        });
    });

    $(document).on('click', '.docs-tabs [data-tab]', (e) => {
        e.preventDefault();
        const tabName = $(e.currentTarget).data('tab');
        $(`[data-tab-content="${tabName}"], [data-tab="${tabName}"]`).addClass('active').siblings('').removeClass('active');
    });

    $(document).on('click', '.docs-tabs [data-period]', (e) => {
        e.preventDefault();
        const tabName = $(e.currentTarget).data('period');
        $(`[data-period-content="${tabName}"], [data-period="${tabName}"]`).addClass('active').siblings('').removeClass('active');
    });

    function noteForm(text) {
        setTimeout(function() {
            $('#note_form .note_form-text').html(text);
            $('#note_form').addClass('show');
        }, 500);

        setTimeout(function() {
            $('#note_form').removeClass('show');

        }, 5500);
    }
});