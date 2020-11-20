<?php 

function load_doc() {
	//print_r($_POST);
	//var_dump($_FILES);
	$user = wp_get_current_user();
	if ( ! function_exists( 'wp_handle_upload' ) )  {
        require_once( ABSPATH . 'wp-admin/includes/file.php' );  
	}

	if ( $_FILES ) { 
    $files = $_FILES['upload_file'];	
    $message = '';

    	foreach ($files['name'] as $key => $value) {            
            if ($files['name'][$key]) { 
                $file = array( 
                    'name' => $files['name'][$key],
                    'type' => $files['type'][$key], 
                    'tmp_name' => $files['tmp_name'][$key], 
                    'error' => $files['error'][$key],
                    'size' => $files['size'][$key]
                ); 
                $_FILES = array ("my_file_upload" => $file); 

                
                foreach ($_FILES as $file => $array) {              
                    $newupload = my_handle_attachment($file,0); 
                    if(is_wp_error($newupload)):

                    	$error_string = $newupload->get_error_message();
    					$message .= '<p class="error">Ошибка при загрузке '.$array['name'] .' '. $error_string . '</p>';
                    
                    else: 
                    	//$newupload
                    	$row = array(
                    		'dokument' => $newupload
                    	);

                    	add_row('vashi_dokumenty', $row, $user);
                    	$message .= '<p>Файл "'. $array['name'] . '" успешно загружен.</p>';
                    endif;
                }
            } 
        }

        ob_start();
        	while(have_rows('vashi_dokumenty', $user)): the_row();
        		$doc = get_sub_field('dokument'); 
				$link = wp_get_attachment_url($doc);
				$name =  basename($link);  ?>
				<li class="docs-wrap_item">
					<a href="<?php echo $link; ?>" download>
						<div class="image">
							<img src="<?php bloginfo('template_url'); ?>/dist/images/icons/doc-fill.svg" alt="">
						</div>
						<div class="desc"><?php echo $name; ?></div>
					</a>
				</li> <?php
        	endwhile;
        $template = ob_get_clean();
        $response = array(
        	'message' => $message,
        	'template' => $template
        );
        echo json_encode($response); 
    }

	die;
}

add_action( 'wp_ajax_load_doc', 'load_doc' );
add_action('wp_ajax_nopriv_load_doc', 'load_doc');

function my_handle_attachment($file_handler,$post_id,$set_thu=false) {
  // check to make sure its a successful upload
  if ($_FILES[$file_handler]['error'] !== UPLOAD_ERR_OK) __return_false();

  require_once(ABSPATH . "wp-admin" . '/includes/image.php');
  require_once(ABSPATH . "wp-admin" . '/includes/file.php');
  require_once(ABSPATH . "wp-admin" . '/includes/media.php');

  $attach_id = media_handle_upload( $file_handler, $post_id );
  if ( is_numeric( $attach_id ) ) {
    update_post_meta( $post_id, '_my_file_upload', $attach_id );
  }
  return $attach_id;
}
