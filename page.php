<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
	
	<section class="content cat">
		<div class="row-fluid">
			<div class="span8">			
				<?php
					while ( have_posts() ) : the_post(); 
						the_content();
					endwhile;
				?>			
			</div>
			<?php get_sidebar(); ?>
		</div>
	</section>

<?php get_footer(); ?>