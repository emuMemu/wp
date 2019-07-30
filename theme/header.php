
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php if(is_home()): ?>
	<title><?php bloginfo('name'); ?> | <?php bloginfo('description'); ?></title>
	<?php else: ?>
	<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
	<?php endif; ?>
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">
	<!-- <meta name="twitter:card" content="summary_large_image"> -->
	<meta name="twitter:card" content="summary">
	<meta name="twitter:site" content="@lIMIl_II__">
	<meta property="og:url" content="https://portfolio.emur-s.com/">
	<meta property="og:title" content="eMur | サイト制作">
	<!-- <meta property="og:description" content=""> -->
	<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/images/M.png">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<header id="header">
		<div class="header_body">
			<div class="header_header">
				<h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>

				<label class="toggle" for="menu">
					<input type="checkbox" id="menu">
					<span class="toggle-menu close">MENU</span>
				</label>
			</div>	<!-- /header_header -->

			<?php get_template_part('template-parts/themes'); ?>

			<?php
				wp_nav_menu(array(
					'theme_location'	=> 'header_menu',
					'depth'				=> 1,
					'container'			=> 'nav',
				));
			?>

			<div class="header_footer">
				<div class="sns">
					<a href="#"><i class="fab fa-facebook-square"></i></a>
					<a href="#"><i class="fab fa-youtube"></i></a>
					<a href="#"><i class="fab fa-instagram"></i></a>
					<a href="https://twitter.com/lIMIl_II__" target="_blank" rel="noopener noreferrer">
						<i class="fab fa-twitter-square"></i>
					</a>
				</div>	<!-- /sns -->

				<small>&copy; 2019 <?php bloginfo('name'); ?></small>
			</div>	<!-- /header_footer -->
		</div>	<!-- /header_body -->

		<div class="triangle"></div>

		<?php get_template_part('template-parts/pagenation'); ?>
	</header>
