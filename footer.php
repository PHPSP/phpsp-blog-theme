	</section><!-- #main .wrapper -->
	<footer role="contentinfo">
		<section class="container facebook">
			<h3>Curta o PHPSP</h3>
			<div id="facebook-box">
                <div id="face">&nbsp;</div> 
            </div>
        </section>
        <section class="footer_links">		
            <a href="http://www.soyuz.com.br/" target="_blank">
                <img alt="Soyuz" 
                    src="<?php bloginfo( 'template_url' ); ?>/img/soyuz.png">
            </a>				
            <a href="http://www.php.net/" target="_blank">
                <img alt="Php" 
                    src="<?php bloginfo( 'template_url' ); ?>/img/php.png">
            </a>				
            <a href="http://www.windowsazure.com/pt-br/" target="_blank">
                <img alt="Windows Azure" 
                    src="<?php bloginfo( 'template_url' ); ?>/img/azure.png">
            </a>				
            <a href="http://imasters.com.br/" target="_blank">
                <img alt="iMasters" 
                    src="<?php bloginfo( 'template_url' ); ?>/img/imasters.png">
            </a>				
            <a href="https://contaazul.com/" target="_blank">
                <img alt="Conta Azul" 
                src="<?php bloginfo( 'template_url' ); ?>/img/contaazul.png">
            </a>				
            <a href="http://www.jetbrains.com/phpstorm/" target="_blank">
                <img alt="Jet Brains" 
                src="<?php bloginfo( 'template_url' ); ?>/img/logo_phpstorm.png">
            </a>				
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
    <?php wp_footer(); ?>
</body>
</html>
