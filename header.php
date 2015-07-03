<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
		
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/bootstrap/css/bootstrap.css" />	
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/bootstrap/css/bootstrap.min.css" />	
	<link href='http://fonts.googleapis.com/css?family=Merriweather+Sans' rel='stylesheet' type='text/css'>
	
	<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/index.js"></script>
	<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/widget.js"></script>		
	
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body>
	<header  role="banner">
		<section class="header-section container clearfix">
			<div class="row-fluid">	
                <h1 class="title">
                    <a href="<?php bloginfo('url') ?>">
                        <img src="<?php bloginfo('template_url') ?>/img/logo.png" alt="">
                    </a>
                </h1> 
                <div class="title_web hidden-phone hidden-tablet"><?php bloginfo( 'name' ); ?></div>
				<?php get_search_form(); ?>				
			</div>	
		</section>
		<nav class="nav">
			<a class="btn btn-navbar bar_menu" data-toggle="collapse" data-target=".nav-collapse">
			  <span class="icon-bar">Menu</span>			  
			</a>
			<div id="cont-menu" class="clearfix  nav-collapse collapse">
                <?php wp_nav_menu(array('theme_location' => 'header-menu-1', 'menu_class' => 'container menu-principal', 'fallback_cb' => 'phpsp_busca_menu')); ?>
			</div>
			
			<div id="sub-menu" class="clearfix hidden-phone">
                <?php wp_nav_menu(array('theme_location' => 'header-menu-2', 'menu_class' => 'container menu menu-secundario', 'fallback_cb' => 'phpsp_busca_menu')); ?>
			</div>
		</nav>

        <?php dynamic_sidebar('head-announce'); ?>
	</header>

	<section id="center_body" class="container">
