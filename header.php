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
			<!--<a class="btn btn-navbar bar_sub" data-toggle="collapse" data-target=".nav-collapse2">
			  <span class="icon-bar">Menu</span>
			  <span class="icon-bar"></span>
			  <span class="icon-bar"></span>			
			</a>-->
			<div id="cont-menu" class="clearfix  nav-collapse collapse">						
					<ul id="menu-principal" class="container menu">
						<li><a href="<?php bloginfo('url'); ?>">Home</a></li>
						<?php
						$cats = wp_list_categories('echo=0&title_li=&exclude=1,776');
						$cats = preg_replace('/title=\"(.*?)\"/','',$cats);
						echo $cats;
						?>
					</ul>
				
			</div>
			
			<div id="sub-menu" class="clearfix hidden-phone">
				<!--nav-collapse2 collapse-->
				<ul id="menu-pages" class="container menu">
					<?php wp_list_pages('title_li='); ?>
					<li><a href="<?php bloginfo('url'); ?>?feed=rss2">Subscribe</a></li>
				</ul>							
			</div>
		</nav>
				
		<section class="container">
			<div class="event">
				<strong>Próximos encontros e eventos? </strong>
				<a href="http://www.meetup.com/php-sp/">Visite a página do PHPSP no Meetup</a>
            </div>
            <div class="shared">
                <a href="http://www.meetup.com/php-sp/" target="_blank">
                    <img alt="Meetup" 
                        src="<?php bloginfo('template_url'); ?>/img/icons/meetup.png">
                </a>
                <a href="http://facebook.com/sao.paulo.elephants" target="_blank">
                    <img alt="Facebook" 
                        src="<?php bloginfo('template_url'); ?>/img/icons/facebook.png">
                </a>					
                <a href="http://twitter.com/phpsp" target="_blank">
                    <img alt="Twitter" 
                        src="<?php bloginfo('template_url'); ?>/img/icons/twitter.png">
                </a>					
                <a href="https://plus.google.com/communities/108495352672468069896" target="_blank">
                    <img alt="Google plus" 
                        src="<?php bloginfo('template_url'); ?>/img/icons/google-plus.png">
                </a>					
                <a href="http://www.linkedin.com/groups/PHPSP-Grupo-Desenvolvedores-PHP-S%C3%A3o-1808119" target="_blank">
                    <img alt="Linkedin" 
                        src="<?php bloginfo('template_url'); ?>/img/icons/linkedin.png">
                </a>					
                <a href="http://github.com/phpsp" target="_blank">
                    <img alt="Github" 
                        src="<?php bloginfo('template_url'); ?>/img/icons/github.png">
                </a>					
            </div>
		</section>
	</header>

	<section id="center_body" class="container">
