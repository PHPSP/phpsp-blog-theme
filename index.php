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
        if ($header_image) {
            $header_image_width  = get_custom_header()->width;
            $header_image_height = get_custom_header()->height;
        } else {
            $header_image = get_template_directory_uri() . '/img/cropped-banner.jpg';
            $header_image_width  = HEADER_IMAGE_WIDTH;
            $header_image_height = HEADER_IMAGE_HEIGHT;
        }
        ?>
        <img class="img_fundo_topo" src="<?php echo $header_image; ?>" width="<?php echo $header_image_width; ?>" height="<?php echo $header_image_height; ?>" alt="" />
	</section>
	<section class="content">
		<div class="row-fluid">
            <div class="bl_eventos span4">
                <?php dynamic_sidebar('home-column-1'); ?>
            </div>
            <div class="bl_artigos span4">
                <?php dynamic_sidebar('home-column-2'); ?>
            </div>
            <div class="bl_avisos span4">
                <?php dynamic_sidebar('home-column-3'); ?>
            </div>
		</div>
	</section>

<?php get_footer(); ?>
