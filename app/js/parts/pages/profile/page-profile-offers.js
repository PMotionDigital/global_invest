jQuery(document).ready(($) => {
	const loadContainer = $('[data-profile-loadwrap]');

	$('.page-template-profile-offers [data-link-id]').on('click', (e) => {
		e.preventDefault();
		const target = $(e.currentTarget);
		const slug = target.data('link-id');
		$.ajax({
            url: `${window.location.origin}/wp-admin/admin-ajax.php`,
            method: 'GET',
            cache: false,
            data: {
            	action: 'profile_offers',
            	slug: slug
            },
            beforeSend: () => {
                loadContainer.addClass('load');
            },
            success: (data) => {
                console.log(data);
                $('.profile-offers').replaceWith(data);
                loadContainer.removeClass('load');
      			target.closest('li').addClass('active').siblings().removeClass('active');
            }
        });

	});
});