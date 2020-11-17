jQuery(document).ready(($) => {

	// Submit form detect & call handlers
	let valid = false;

	$(document).on('submit', '.ajax-auth[data-id]', (e) => {
		e.preventDefault();
		const form = $(e.currentTarget);
		const id = form.data('id');
		const formData = {};
		let action = '';

		form.serializeArray().forEach((el) => {
			formData[el.name] = el.value;
		});
		if (id === 'login') {
			action = 'ajaxLogin';
			valid = true;
		} else if (id === 'register') {
			action = 'ajaxRegister';
		}
		formData['action'] = action;

		const req = form.find('[data-required]');
		const reqArr = [];
		req.each((i, el) => {
			if ($(el).val() !== '') {
				reqArr.push(true);
				$(el).removeClass('invalid');
			} else {
				reqArr.push(false);
				$(el).addClass('invalid');
				// $(el).get(0).setCustomValidity('Хуила');
			}
		});
		if (!valid) {
			$('[name="new_user_password_check"]').addClass('invalid');
		} else {
			$('[name="new_user_password_check"]').removeClass('invalid');
		}
		console.log(valid, reqArr);
		if (reqArr.every((item) => item === true)) {
			userAuth(formData);
			console.log(formData);
		}
	});

	$(document).on('input', '[name="new_user_password_check"]', (e) => {
		const val = $(e.currentTarget).val();
		const passVal = $('[name="new_user_password"]').val();
		val == passVal ? valid = true : valid = false;
	});

	$(document).on('input', '[name="new_user_name"], [name="username"]', (e) => {
		const val = $(e.currentTarget).val();
		$(e.currentTarget).val(val.toLowerCase());
	});
	// Login/Register handler

	function userAuth(data) {
		console.log(data);
		$.ajax({
			url: `${window.location.origin}/wp-admin/admin-ajax.php`,
			method: 'POST',
			data: data,
			beforeSend: () => {
				console.log('send');
				$('[data-modal="login"] .wrap').addClass('loading');
			},
			success: (json) => {
				const response = JSON.parse(json);
				console.log(response);

				if (response.redirect === true) {
					window.location.href = response.redirect_link;
				} else {
					$('[data-modal="login"] .wrap').removeClass('loading');
					// $('[data-modal="login"]').removeClass('open');
					// noteForm(response.message);


					let inputs = $('.fields');
					inputs.css('border', '2px solid red');
					$('.form-message').html(response.message);
					$('.form-message').css('color', 'red');
					


				}
			}
		});
	}

	// Form Style 

	$(document).on('click', '.form-login [data-header]', (e) => {
		e.preventDefault();
		const valueHeader = $(e.currentTarget).data('header');

		$(`.form-login [data-header="${valueHeader}"], .form-login [data-content="${valueHeader}"]`)
			.addClass('active')
			.siblings().removeClass('active');

	});

	function noteForm(text) {
		setTimeout(function () {
			$('#note_form .note_form-text').html(text);
			$('#note_form').addClass('show');
		}, 500);

		setTimeout(function () {
			$('#note_form').removeClass('show');

		}, 5500);
	}

	$('body').on('click', '.password-control', function () {
		if ($('#log-input').attr('type') == 'password') {
			$(this).addClass('password-control--noview');
			$('#log-input').attr('type', 'text');
		} else {
			$(this).removeClass('password-control--noview');
			$('#log-input').attr('type', 'password');
		}
		return false;
	});
	$('body').on('click', '.password-reg', function () {
		if ($('#reg-input').attr('type') == 'password') {
			$(this).addClass('password-reg--noview');
			$('#reg-input').attr('type', 'text');
		} else {
			$(this).removeClass('password-reg--noview');
			$('#reg-input').attr('type', 'password');
		}
		return false;
	});

});