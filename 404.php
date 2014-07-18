<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<section class="content">
		<section class="">
			<h2>Página não encontrada!</h2>
			<p>
				Tente uma busca pela informação desejada:
			</p>
			<div class="busca_404"><?php get_search_form(); ?></div>	
		</section>
	</section>

<?php get_footer(); ?>