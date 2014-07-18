<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<section class="img-destaque">
		<?php
			$header_image = get_header_image();
			if ( $header_image ) :
				if ( function_exists( 'get_custom_header' ) ) {
					$header_image_width = get_theme_support( 'custom-header', 'width' );
				} else {
					$header_image_width = HEADER_IMAGE_WIDTH;
				}
				?>
			<?php
				if ( is_singular() && has_post_thumbnail( $post->ID ) &&
						( $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), array( $header_image_width, $header_image_width ) ) ) &&
						$image[1] >= $header_image_width ) :
					echo get_the_post_thumbnail( $post->ID, 'post-thumbnail' );
				else :
					if ( function_exists( 'get_custom_header' ) ) {
						$header_image_width  = get_custom_header()->width;
						$header_image_height = get_custom_header()->height;
					} else {
						$header_image_width  = HEADER_IMAGE_WIDTH;
						$header_image_height = HEADER_IMAGE_HEIGHT;
					}
					?>
				<img class="img_fundo_topo" src="<?php header_image(); ?>" width="<?php echo $header_image_width; ?>" height="<?php echo $header_image_height; ?>" alt="" />
		<?php endif;  ?>
		<?php endif; ?>
	</section>
	<section class="content">
		<div class="row-fluid">	
			<div class="bl_eventos span4">
			    <h2 class="black-block">Próximos <strong>Eventos</strong></h2>
				<?php																
				$events = eo_get_events(array( 
					'numberposts'=>5, 
					'events_start_after'=>'today',
					'tax_query'=>array( array(
						'taxonomy'=>'event-category',
						'operator' => 'NOT IN',
						'field'=>'slug',
						'terms'=> array('prox-encontro')
					)),
					'showpastevents'=>false,
				));

				if($events){ 
				  foreach ($events as $event){					
					$venue_id = eo_get_venue($event->ID); 
					$venue_name = eo_get_venue_name($venue_id);
					$str = eo_get_the_start('j F Y, H\hi', $event->ID,null,$event->occurrence_id);							
				?>
					<div class="row-fluid article-phpsp-home">
						<div class="span12">
						    <div><a href="<?= get_permalink($event->ID); ?>"><?php echo $event->post_title; ?></a></div>
						    <small><?php echo $venue_name.", ".$str."\n";?></small>
						</div>
					 </div>			
				<?php				
				  } 
				}
			       ?>				   
			</div>
			<div class="bl_artigos span4">
				<h2 class="blue-block"><strong>Artigos</strong> da comunidade</h2>
				<?php   wp_reset_query();
					$args = array( 'category_name' => 'artigos', 'posts_per_page' => 5 );
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ): $loop->the_post();?>
					<div class="row-fluid article-phpsp-home">
					    <div class="span3">
						<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'the-bootstrap_author_bio_avatar_size', 70 ) ); ?>
						
					    </div>
					    <div class="span9">
						<div class="art_title"><a href="<?php the_permalink(); ?>"><?php echo the_title();?></a></div>
						<small class="art_por">por <?php the_author()?></small>
					    </div>
					</div>
				<?php endwhile; ?>
				<a class="todos_artigos" href="<?php echo get_bloginfo('url'); ?>/index.php/category/artigos/">Ver todos os artigos...</a>
			</div>
			<div class="bl_avisos span4">
			    <h2 class="grey-block"><strong>Avisos</strong> da comunidade</h2>
			    <?php
				wp_reset_query();				
				$loop = new WP_Query( array( 'category_name' => 'Avisos', 'posts_per_page' => 1 ) );
				$loop->the_post(); ?>
			    <div class="row-fluid article-phpsp-home">
				<div class="span12">
				    <div class="aviso"><?php the_excerpt()?></div>
				    <strong><a href="<?php the_permalink(); ?>">Saiba mais</a></strong>
				</div>
			    </div>
			</div>
		</div>
	</section>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
