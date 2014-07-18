<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	</section><!-- #main .wrapper -->
	<footer role="contentinfo">
		<section class="container facebook">
			<h3>Curta o PHPSP</h3>
			<div id="facebook-box">
                        	<div id="face">&nbsp;</div> 
                        </div>
		</section>
		<section class="footer_links">		
			
				<?php $bookmarks = get_bookmarks( array('category_name' => 'Parceiros', 'orderby' => 'id', 'order' => 'ASC'));			
					foreach ( $bookmarks as $bm ) {  ?>
					   <a class="link_parceiros"  href="<?php echo $bm->link_url; ?>" target="_blank">
						<img alt="<?php echo $bm->link_name; ?>"  src="<?php echo get_bloginfo( 'template_url' )."/img/".str_replace("http://","",$bm->link_image); ?>" />
					    </a>				
				<?php }	?>										
			
		</section>
		<nav class="visible-phone">
			<ul id="menu-pages" class="container menu">
						<?php wp_list_pages('title_li='); ?>
						<li><a href="<?php bloginfo('url'); ?>?feed=rss2">Subscribe</a></li>
			</ul>
		</nav>
		<section id="creative-commons" class="container">
			<a class="img-cc" rel="license" href="http://creativecommons.org/licenses/by-nc-nd/3.0/deed.pt">
				<img alt="Licença Creative Commons" style="border-width:0" src="http://i.creativecommons.org/l/by-nc-nd/3.0/88x31.png" />
			</a>
			<p class="desc-cc span5">O trabalho Portal de <a href="http://phpsp.org.br" property="cc:attributionName" rel="cc:attributionURL">PHP-SP</a> foi licenciado com uma Licença <a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/3.0/deed.pt">Creative Commons - Atribuição-NãoComercial-SemDerivados 3.0 Não Adaptada</a>.</p>
		</section>
	</footer>
</body>
</html>