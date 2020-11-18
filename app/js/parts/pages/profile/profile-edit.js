jQuery(document).ready(function ($) {

    $(document).on('input change', '.profile-form--edit input', () => {
        $('.submit_settings').removeClass('disabled');
    });
    // Post login form
    $(document).on('submit', '.profile-form--edit', (e) => {

        e.preventDefault();
        const profileForm = $(e.currentTarget);
        let formData = new FormData();
        profileForm.serializeArray().forEach((el) => {
            formData.append(el.name, el.value);
        });



        formData.append('action', 'update_user_profile')


        const loadContainer = $('[data-profile-loadwrap]');
        $.ajax({
            type: 'POST',
            url: document.location.origin + '/wp-admin/admin-ajax.php',
            contentType: false,
            processData: false,
            data: formData,
            beforeSend: () => {
                loadContainer.addClass('load');
            },
            success: (response) => {
                let jsonOutput = JSON.parse(response);
                let userFirstName = jsonOutput.name;
                let outputError = jsonOutput.error;
                loadContainer.removeClass('load');
                //console.log(outputError);

                const noteFormText = profileForm.find('.form-message');

                if (outputError.length == 0) {
                    noteFormText.html('Изменения успешно сохранены!');
                } else {
                    noteFormText.html(outputError);
                }

                headeruserName.html(userFirstName);
                profileFormBtn.removeClass('loading');
                profileFormBtn.addClass('disabled');

                if (picUploaded == true) {
                    acfSubmit.trigger('click');
                }
            }
        });

    });
    $('body').on('click', '.password-edit--open', function () {
        if ($('#edit-input').attr('type') == 'password') {
            $(this).addClass('password-edit--close');
            $('#edit-input').attr('type', 'text');
        } else {
            $(this).removeClass('password-edit--close');
            $('#edit-input').attr('type', 'password');
        }
        return false;
    });
});