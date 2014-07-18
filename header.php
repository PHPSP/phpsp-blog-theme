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
				<h1 class="title"><a href="<?php bloginfo('url') ?>"><img src="<?php bloginfo('template_url') ?>/img/logo.png" alt=""></a></h1> <div class="title_web hidden-phone hidden-tablet"><?php bloginfo( 'name' ); ?></div>
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
				<strong>Próximo encontro: </strong>
				<?php											
					
				$events = eo_get_events(array( 
					'numberposts'=>1, 
					'events_start_after'=>'today',
					'event-category' => 'prox-encontro',
					'showpastevents'=>false,
				));

				if($events){ 
				  foreach ($events as $event){ 
				       $venue_id = eo_get_venue($event->ID); 
				       $venue_name = eo_get_venue_name($venue_id);
				       $str = eo_get_the_start('j F Y, H\hi', $event->ID,null,$event->occurrence_id);		
				       echo $venue_name.", ".$str."\n";
				  } 
				}
			       ?>				
			</div>
			<div class="shared">
				<?php $bookmarks = get_bookmarks( array('category_name' => 'Mídias Sociais', 'orderby' => 'id', 'order' => 'ASC'));				
					foreach ( $bookmarks as $bm ) {  ?>
					    <a class="link_parceiros"  href="<?php echo $bm->link_url; ?>" target="_blank">
						<img alt="<?php echo $bm->link_name; ?>" src="<?php echo get_bloginfo( 'template_url' )."/img/icons/".str_replace("http://","",$bm->link_image); ?>" />
					    </a>					
				<?php }	?>
			</div>
		</section>
	</header>

	<section id="center_body" class="container">