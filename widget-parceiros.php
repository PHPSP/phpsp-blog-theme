    <section class="footer_links">
        <?php echo $widget_content;?>
    </section>
    <nav class="visible-phone">
        <ul id="menu-pages" class="container menu">
            <?php wp_list_pages('title_li='); ?>
            <li><a href="<?php bloginfo('url'); ?>?feed=rss2">Subscribe</a></li>
        </ul>
    </nav>
    <section id="creative-commons" class="container">
        <a class="img-cc" rel="license" href="https://creativecommons.org/licenses/by-nc-nd/3.0/deed.pt">
            <img alt="Licença Creative Commons" style="border-width:0" src="https://licensebuttons.net/l/by-nc-nd/3.0/88x31.png" />
        </a>
        <p class="desc-cc span5">O trabalho Portal de <a href="https://phpsp.org.br" property="cc:attributionName" rel="cc:attributionURL">PHP-SP</a> foi licenciado com uma Licença <a rel="license" href="https://creativecommons.org/licenses/by-nc-nd/3.0/deed.pt">Creative Commons - Atribuição-NãoComercial-SemDerivados 3.0 Não Adaptada</a>.</p>
    </section>