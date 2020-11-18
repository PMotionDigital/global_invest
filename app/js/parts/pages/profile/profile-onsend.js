jQuery(document).ready(($) => {
    const formAction = [{
            id: 775,
            action: 'transaction'
        },
        {
            id: 778,
            action: 'top_up'
        },
        {
            id: 776,
            action: 'buy_case'
        },
        {
            id: 855,
            action: 'realize_case'
        }
    ];

    const paymentFormAction = (action, data) => {
        // options = {
        // 	id: 1,
        // 	action: 'action'
        // }
        const loadContainer = $('[data-profile-loadwrap]');

        $.ajax({
            url: `${window.location.origin}/wp-admin/admin-ajax.php`,
            method: 'GET',
            cache: false,
            data: {
                action: 'profile_transaction',
                tr_type: action,
                ...data
            },
            beforeSend: () => {
                loadContainer.addClass('load');
            },
            success: (response) => {
                const data = JSON.parse(response);
                console.log(data);
                //loadContainer.removeClass('load');
                $('[data-modal]').removeClass('open');
                if (data.redirect) {
                    loadProfilePage(data.redirect);
                } else {
                    loadContainer.removeClass('load');
                }
            }
        });
    };

    document.addEventListener('wpcf7submit', (e) => {
        const formSetup = formAction.find(({
            id
        }) => id == e.detail.contactFormId);
        const formData = {};
        console.log(e.detail.contactFormId);
        e.detail.inputs.forEach((input) => {
            formData[input.name] = input.value;
        });
        console.log(formData);
        if (formSetup) {
            paymentFormAction(formSetup.action, formData);
        }
    }, false);

    $(document).on('click', '.profile-offers_item-buy', (e) => {
        e.preventDefault();
        const submit = $('[data-modal="buy-case"]').find('[type="submit"]');
        submit.addClass('disabled');
        const postId = Number($(e.currentTarget).closest('[data-post-id]').data('post-id'));
        const postName = $(e.currentTarget).closest('[data-post-id]').find('.profile-offers_item-name').text().trim();
        const min = $(e.currentTarget).data('min') || $(e.currentTarget).find('[data-min]').data('min') || 0;
        $('[data-modal="buy-case"] [name="your-payment"]').attr('min', min);
        // $('[data-modal="buy-case"] [name="your-payment"]').val(min);
        $('[data-modal="buy-case"] [name="your-payment"]').attr('placeholder', `От ${min.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ").replace('.',',')} $`);

        $('[name="your-product"]').val(postName);
        $('[name="your-product-id"]').val(postId);

        $(document).on('input', '[data-modal="buy-case"] [name="your-payment"]', (e) => {
            if ($(e.currentTarget).val() < min) {
                submit.addClass('disabled');
            } else {
                submit.removeClass('disabled');
            }
        });
    });

    $(document).on('click', '.product-row [data-modal]', (e) => {
        e.preventDefault();
        const sum = $(e.currentTarget).data('inc').toFixed(2);
        const id = $(e.currentTarget).data('product');
        const ind = $(e.currentTarget).data('index');
        $('[data-modal="realize"] [name="your-row-index"]').val(ind);
        $('[data-modal="realize"] [name="your-payment"]').val(sum);
        $('[data-modal="realize"] [name="your-product"]').val($(e.currentTarget).closest('.product-row').find('.product-name').text().trim());
        $('[data-modal="realize"] [name="your-product-id"]').val(id);
    });

    function numberWithCommas(x) {
        const parts = x.toString().split(".");
        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, " ");
        return parts.join(",");
    }
});