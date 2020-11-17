<?php 


add_action( 'wp_ajax_profile_transaction', 'add_transaction_row' );

function add_transaction_row() {
	$tr_type = $_GET['tr_type'];
	$redirect = false;
	$user = wp_get_current_user();
	if($tr_type == 'buy_case'):
		
		//produkt - [post object]
		//summa_investiczij - [number]
		global $post;
		$post = get_post($_GET['your-product-id']);
		$start_price = get_field('czena_v', $_GET['your-product-id']);
		$row = array(
			'produkt' => $post,
			'summa_investiczij' => $_GET['your-payment'],
			'czena_pri_pokupke' => $start_price
		);
		add_row('produkty', $row, $user);

	elseif($tr_type == 'top_up' || $tr_type == 'transaction' || $tr_type == 'realize_case'):
		if($tr_type == 'top_up'):
			$row_type = 'in';
		elseif($tr_type == 'transaction'): 
			$row_type = 'out';
		elseif($tr_type == 'realize_case'):
			$row_type = 'buy';
			$product = $_GET['your-product-id'];
			$index = $_GET['your-row-index'];
			if(have_rows('produkty', $user)):
				while(have_rows('produkty', $user)):the_row();
					if(get_row_index() == $index):
						update_sub_field('status', 'wait', $user);
					endif;
				endwhile;
			endif;
		endif;

		$row = array(
			'tip_operaczii' => $row_type,
			'summa'         => $_GET['your-payment'],
			'data'          => current_time('d.m.Y'),
			'product'       => $product
		);
		$redirect = 'history';
		add_row('istoriya_operaczij', $row, $user);
	endif;
	echo json_encode(array(
		'redirect' => $redirect,
		'get' => $row
	));
	die;
}

