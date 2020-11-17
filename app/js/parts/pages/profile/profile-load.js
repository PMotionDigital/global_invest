jQuery(document).ready(($) => {
	// setup page 
	const pages = [
		{
			name: 'history',
			templates: ['profile-menu', 'profile-history']
		},
		{
			name: 'docs',
			templates: ['profile-menu', 'profile-docs']
		},
		{
			name: 'support',
			templates: ['profile-menu', 'profile-support']
		},
		{
			name: 'transaction',
			templates: ['profile-menu', 'profile-transaction']
		},
		{
			name: 'top-up',
			templates: ['profile-menu', 'profile-top-up']
		}
	];

	
	const loadContainer = $('[data-profile-loadwrap]');
	const setupPage = (templates = [], page = '') => {
		$.ajax({
			url: `${window.location.origin}/wp-admin/admin-ajax.php`,
            method: 'GET',
            cache: false,
            data: {
                action: 'setup_profile_page',
                templates: templates
            },
            beforeSend: () => {
            	loadContainer.addClass('load');
            },
           	success: (data) => {
            	const response = JSON.parse(data);
            	console.log(response);
            	loadContainer.find('.changable').remove();
            	
            	for(temp in response.templates){
            		if(temp != 'profile-menu') {
	            		loadContainer.append(response.templates[temp]);
	            	}
            	};

            	$(`[data-link="${page}"]`).addClass('current').siblings().removeClass('current');
            	setTimeout(()=> {
            		loadContainer.removeClass('load');
            	}, 100);
            }
		});
	}
	window.loadProfilePage = (page) => {
		const pageConf = pages.find((el) => el.name === page);
		setupPage(pageConf.templates, page);
	};
	//setupPage(['profile-menu', 'profile-history']);
});