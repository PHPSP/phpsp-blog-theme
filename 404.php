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
		<div class="row-fluid span12 not-found">
			<h1 class="blue-block"><strong>404</strong> - Página não encontrada.</h1>
			<p>
				O conteúdo que você buscou não foi encontrado, já foi removido ou não era sobre o universo PHP e deu erro :p.
			</p>
			<p>
			    Que tal usar nossa busca para tentar localizar o que estava procurando?
            </p>
			<div class="busca_404"><?php get_search_form(); ?></div>
        </div>
        <div class="row-fluid span12">
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
		</div>
	</section>

<?php get_footer(); ?>