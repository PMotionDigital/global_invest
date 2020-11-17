<!DOCTYPE html>
<html lang="ru" class="no-js">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title><?php wp_title('')?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta content="telephone=no" name="format-detection">
		<meta name="HandheldFriendly" content="true">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(array('page')) ?>>
		<?php
			$mainWrapper = 'col-lg-8 col-md-12 col-lm-11 col-xs-11';
		?>
		<main class="global-main">
			<header id="header" class="dis-flex flex-wrap-wrap justify-content-center">

				<?php if ( current_user_can('subscriber') && !wp_is_mobile() && (is_page('lichnyj-kabinet') || is_page('lichnyj-kabinet-nashi-predlozheniya'))){ ?>
					<div class="col-lg-11 flex-wrap-wrap justify-content-center dis-flex align-items-center">
						<?php get_template_part('templates/parts/header/header-profile')?>
					</div>
				<?php } else if (current_user_can('subscriber') && wp_is_mobile() && (is_page('lichnyj-kabinet') || is_page('lichnyj-kabinet-nashi-predlozheniya'))){ ?>

					<?php get_template_part('templates/parts/header/header-profile-mobile')?>

				<?php } else if(!wp_is_mobile()) { ?>

				<div class="col-lg-11 flex-wrap-wrap justify-content-center dis-flex align-items-center">
					<?php get_template_part('templates/parts/header/header-components')?>
				</div>

				<div class="col-lg-12 header_sub-menu dis-flex justify-content-center">
					<?php get_template_part('templates/parts/header/header-submenu')?>
				</div>

				<?php } else { ?>

					<?php get_template_part('templates/parts/header/header-mobile')?>

				<?php } ?>
			</header>