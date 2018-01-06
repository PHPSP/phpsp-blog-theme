<?php
/** Configuration */
if ( ! get_option( 'phpsp_data_version' ) ) {
	add_option( 'phpsp_data_version', '0' );
}

/** Widgets classes */
class PHPSP_Artigos_Widget extends WP_Widget {

	public function PHPSP_Artigos_Widget() {
		parent::WP_Widget( 'phpsp-artigos', 'PHPSP - Artigos', ' Lista de Artigos de uma categoria' );
	}

	public function widget( $args, $instance ) {
		global $post;
		$query_args = array( 'cat' => $instance['cat'], 'posts_per_page' => $instance['limit'] );

        if (!is_home() && isset($post->ID) && is_numeric($post->ID))
        {
            $query_args['post__not_in'] = array($post->ID);
        }

		$loop       = new WP_Query( $query_args );
		echo $args['before_widget'];
		echo $args['before_title'] . $instance['title'] . $args['after_title'];

		while ( $loop->have_posts() ) {
			$loop->the_post();
			get_template_part( 'widget', 'artigos' );
		}

		echo '<div class="todos_artigos"><a href="' . get_category_link( $instance['cat'] ) . '">' . $instance['more']
		     . '</a></div>';

		echo $args['after_widget'];
	}

	public function update( $new_instance, $old_instance ) {
		$instance          = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'], '<strong></strong>' );
		$instance['cat']   = strip_tags( $new_instance['cat'] );
		$instance['limit'] = strip_tags( $new_instance['limit'] );
		$instance['more']  = strip_tags( $new_instance['more'] );

		return $instance;
	}

	public function form( $instance ) {
		if ( $instance ) {
			$title = esc_attr( $instance['title'] );
			$cat   = esc_attr( $instance['cat'] );
			$limit = esc_attr( $instance['limit'] );
			$more  = esc_attr( $instance['more'] );
		} else {
			$title = '';
			$cat   = '';
			$limit = 5;
			$more  = ' Ver mais...';
		}

		$form
			= '
        <p>
            <label for="' . $this->get_field_id( 'title' ) . '">
                Título
                <input class="widefat" id="' . $this->get_field_id( 'title' ) . '" name="'
			  . $this->get_field_name( 'title' ) . '" type="text" value="' . $title . '" />
            </label>
        </p>
        <p>
            <label for="' . $this->get_field_id( 'cat' ) . '">
                Categoria
                <select id="' . $this->get_field_id( 'cat' ) . '" name="' . $this->get_field_name( 'cat' )
			  . '" class="widefat" style="width:100%;">';

		foreach ( get_terms( 'category', 'parent=0&hide_empty=0' ) as $term ) {
			$form
				.= '<option ' . selected( $cat, $term->term_id, false ) . ' value="' . $term->term_id . '">'
				   . $term->name
				   . '</option>';
		}

		$form
			.= '
                </select>
            </label>
        </p>
        <p>
            <label for="' . $this->get_field_id( 'limit' ) . '">
                Quantidade
                <input class="widefat" id="' . $this->get_field_id( 'limit' ) . '" name="'
			   . $this->get_field_name( 'limit' ) . '" type="text" value="' . $limit . '" />
            </label>
        </p>
        <p>
            <label for="' . $this->get_field_id( 'more' ) . '">
                Texto final
                <input class="widefat" id="' . $this->get_field_id( 'more' ) . '" name="'
			   . $this->get_field_name( 'more' ) . '" type="text" value="' . $more . '" />
            </label>
        </p>
        ';

		echo $form;
	}
}

class PHPSP_Avisos_Widget extends WP_Widget {

	public function PHPSP_Avisos_Widget() {
		parent::WP_Widget( 'phpsp-avisos', 'PHPSP - Avisos', ' Lista de Avisos de uma categoria' );
	}

	public function widget( $args, $instance ) {
		$query_args = array( 'cat' => $instance['cat'], 'posts_per_page' => $instance['limit'] );
		$loop       = new WP_Query( $query_args );
		echo $args['before_widget'];
		echo $args['before_title'] . $instance['title'] . $args['after_title'];

		while ( $loop->have_posts() ) {
			$loop->the_post();
			get_template_part( 'widget', 'avisos' );
		}

		if ( $instance['show_more'] ) {
			echo '<div class="todos_artigos"><a href="' . get_category_link( $instance['cat'] ) . '">'
			     . $instance['more'] . '</a></div>';
		}

		echo $args['after_widget'];
	}

	public function update( $new_instance, $old_instance ) {
		$instance              = $old_instance;
		$instance['title']     = strip_tags( $new_instance['title'], '<strong></strong>' );
		$instance['cat']       = strip_tags( $new_instance['cat'] );
		$instance['limit']     = strip_tags( $new_instance['limit'] );
		$instance['show_more'] = strip_tags( $new_instance['show_more'] );
		$instance['more']      = strip_tags( $new_instance['more'] );

		return $instance;
	}

	public function form( $instance ) {
		if ( $instance ) {
			$title     = esc_attr( $instance['title'] );
			$cat       = esc_attr( $instance['cat'] );
			$limit     = esc_attr( $instance['limit'] );
			$show_more = esc_attr( $instance['show_more'] );
			$more      = esc_attr( $instance['more'] );
		} else {
			$title     = '';
			$cat       = '';
			$limit     = 5;
			$show_more = 0;
			$more      = ' Ver mais...';
		}

		$form
			= '
        <p>
            <label for="' . $this->get_field_id( 'title' ) . '">
                Título
                <input class="widefat" id="' . $this->get_field_id( 'title' ) . '" name="'
			  . $this->get_field_name( 'title' ) . '" type="text" value="' . $title . '" />
            </label>
        </p>
        <p>
            <label for="' . $this->get_field_id( 'cat' ) . '">
                Categoria
                <select id="' . $this->get_field_id( 'cat' ) . '" name="' . $this->get_field_name( 'cat' )
			  . '" class="widefat" style="width:100%;">';

		foreach ( get_terms( 'category', 'parent=0&hide_empty=0' ) as $term ) {
			$form
				.= '<option ' . selected( $cat, $term->term_id, false ) . ' value="' . $term->term_id . '">'
				   . $term->name
				   . '</option>';
		}

		$form
			.= '
                </select>
            </label>
        </p>
        <p>
            <label for="' . $this->get_field_id( 'limit' ) . '">
                Quantidade
                <input class="widefat" id="' . $this->get_field_id( 'limit' ) . '" name="'
			   . $this->get_field_name( 'limit' ) . '" type="text" value="' . $limit . '" />
            </label>
        </p>
        <p>
            <label for="' . $this->get_field_id( 'show_more' ) . '">
                <input type="checkbox" ' . checked( $show_more, 1, false ) . ' class="widefat" id="'
			   . $this->get_field_id( 'show_more' ) . '" name="' . $this->get_field_name( 'show_more' ) . '" type="text" value="1" />Mostrar link para mais?
            </label>
        </p>
        <p>
            <label for="' . $this->get_field_id( 'more' ) . '">
                Texto link "Ver mais..."
                <input class="widefat" id="' . $this->get_field_id( 'more' ) . '" name="'
			   . $this->get_field_name( 'more' ) . '" type="text" value="' . $more . '" />
            </label>
        </p>
        ';

		echo $form;
	}
}

class PHPSP_Topo_Widget extends WP_Widget {

	public function PHPSP_Topo_Widget() {
		parent::WP_Widget( 'phpsp-topo', 'PHPSP - Topo', 'Aviso no topo + redes sociais' );
	}

	public function widget( $args, $instance ) {

		set_query_var( 'widget_content', $instance['content'] );

		echo $args['before_widget'];

		get_template_part( 'widget', 'topo' );

		echo $args['after_widget'];
	}

	public function update( $new_instance, $old_instance ) {
		$instance            = $old_instance;
		$instance['content'] = strip_tags( $new_instance['content'], '<strong></strong><a></a>' );

		return $instance;
	}

	public function form( $instance ) {
		if ( $instance ) {
			$content = esc_attr( $instance['content'] );
		} else {
			$content = '';
		}

		$form
			= '
        <p>
            <label for="' . $this->get_field_id( 'content' ) . '">
                Chamada
                <textarea class="widefat" id="' . $this->get_field_id( 'content' ) . '" name="'
			  . $this->get_field_name( 'content' ) . '">' . $content . '</textarea>
            </label>
        </p>';

		echo $form;
	}
}

class PHPSP_Social_Widget extends WP_Widget {

	public function PHPSP_Social_Widget() {
		parent::WP_Widget( 'phpsp-social', 'PHPSP - Social', 'Plugin do Facebook + Twitter' );
	}

	public function widget( $args, $instance ) {

		echo $args['before_widget'];

		echo '<section class="container social">';

		echo <<<FACEBOOK
        <div id="facebook">
            <div id="fb-root"></div>
            <script>(function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s); js.id = id;
              js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.3";
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>

            <div class="fb-page" data-href="https://www.facebook.com/sao.paulo.elephants" data-width="500" data-height="400" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true" data-show-posts="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/sao.paulo.elephants"><a href="https://www.facebook.com/sao.paulo.elephants">PHPSP - Grupo de Usuários</a></blockquote></div></div>
        </div>
FACEBOOK;


		echo <<<TWITTER
        <div id="twitter">
            <a class="twitter-timeline" href="https://twitter.com/phpsp" data-widget-id="617036286898098176">Tweets by @phpsp</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
        </div>
TWITTER;

		echo "</section>";

		echo $args['after_widget'];
	}

	public function update( $new_instance, $old_instance ) {
		$instance          = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'], '<strong></strong>' );

		return $instance;
	}

	public function form( $instance ) {
		if ( $instance ) {
			$title = esc_attr( $instance['title'] );
		} else {
			$title = '';
		}

		$form
			= '
        <p>
            <label for="' . $this->get_field_id( 'title' ) . '">
                Título
                <input class="widefat" id="' . $this->get_field_id( 'title' ) . '" name="'
			  . $this->get_field_name( 'title' ) . '" type="text" value="' . $title . '" />
            </label>
        </p>';

		echo $form;
	}
}

class PHPSP_Parceiros_Widget extends WP_Widget {

	public function PHPSP_Parceiros_Widget() {
		parent::WP_Widget( 'phpsp-parceiros', 'PHPSP - Parceiros', 'Imagem dos parceiros do PHPSP' );
	}

	public function widget( $args, $instance ) {

		set_query_var( 'widget_content', $instance['content'] );
		set_query_var( 'template_url', get_bloginfo( 'template_url' ) );

		echo $args['before_widget'];

		get_template_part( 'widget', 'parceiros' );

		echo $args['after_widget'];
	}

	public function update( $new_instance, $old_instance ) {
		$instance            = $old_instance;
		$instance['content'] = strip_tags( $new_instance['content'], '<strong></strong><a></a><img></img><br></br>' );

		return $instance;
	}

	public function form( $instance ) {
		if ( $instance ) {
			$content = esc_attr( $instance['content'] );
		} else {
			$content = '';
		}

		$form
			= '
        <p>
            <label for="' . $this->get_field_id( 'content' ) . '">
                Conteúdo
                <textarea class="widefat" id="' . $this->get_field_id( 'content' ) . '" name="'
			  . $this->get_field_name( 'content' ) . '">' . $content . '</textarea>
            </label>
        </p>';

		echo $form;
	}
}

function PHPSP_register_widgets() {
	register_widget( 'PHPSP_Artigos_Widget' );
	register_widget( 'PHPSP_Avisos_Widget' );
	register_widget( 'PHPSP_Topo_Widget' );
	register_widget( 'PHPSP_Social_Widget' );
	register_widget( 'PHPSP_Parceiros_Widget' );
}

add_action( 'widgets_init', 'PHPSP_register_widgets' );

/** Configuracao padrao */
$active_widgets = get_option( 'sidebars_widgets' );

//Pra nao salvar atoa
$hasChange = false;

$dataVersion = get_option( 'phpsp_data_version' );

$themeVersion = wp_get_theme()->get( 'Version' );

$forceUdate = version_compare( $themeVersion, $dataVersion, '>' ) ? true : false;

if ( $forceUdate ) {
	$hasChange                             = true;
	$active_widgets                        = array( 'array_version' => 1 );
	$active_widgets['orphaned_widgets_1']  = array();
	$active_widgets['wp_inactive_widgets'] = array();
}

//Configura a primeira coluna, se estiver vazia
if ( empty( $active_widgets['home-column-1'] ) ) {

	$hasChange = true;

	//Meetup list
	$active_widgets['home-column-1'][0] = 'vsmeetgroupslistwidget-1';

	$meetup_widget_content_1[1] = array(
		'title'           => 'Próximos Eventos',
		'ids'             => 'php-sp,phpsp-campinas,vagrant-sao-paulo,laravel-sp,wpsampa',
        'highlight_groups'=> 'php-sp,phpsp-campinas',
		'limit'           => 7,
		'highlight_first' => 1,
		'date_format'     => 'd/m @ H:i',
	);

	update_option( 'widget_vsmeetgroupslistwidget', $meetup_widget_content_1 );
}

//Configura a segunda coluna, se estiver vazia
if ( empty( $active_widgets['home-column-2'] ) ) {

	$hasChange = true;

	//Artigos
	$active_widgets['home-column-2'][0] = 'phpsp-artigos-1';

	$artigos_widget_content[1] = array(
		'title' => '<strong>Artigos</strong> da comunidade',
		'cat'   => 3,
		'limit' => 5,
		'more'  => 'Ver mais artigos...'
	);

	update_option( 'widget_phpsp-artigos', $artigos_widget_content );
}

//Configura a terceira coluna, se estiver vazia
if ( empty( $active_widgets['home-column-3'] ) ) {

	$hasChange = true;

	//Avisos
	$active_widgets['home-column-3'][0] = 'phpsp-avisos-1';

	$avisos_widget_content[1] = array(
		'title'     => '<strong>Avisos</strong> da comunidade',
		'cat'       => 776,
		'limit'     => 1,
		'show_more' => 0,
		'more'      => 'Ver mais avisos...'
	);

	update_option( 'widget_phpsp-avisos', $avisos_widget_content );
}

//Configura o topo de avisos
if ( empty( $active_widgets['head-announce'] ) ) {

	$hasChange = true;

	//Topo
	$active_widgets['head-announce'][0] = 'phpsp-topo-1';

	$topo_widget_content[1] = array(
		'content' => '<strong>Próximos encontros e eventos? </strong>
        <a href="https://www.meetup.com/php-sp/">Visite a página do PHPSP no Meetup</a>',
	);

	update_option( 'widget_phpsp-topo', $topo_widget_content );
}

//Configura o Rodape
if ( empty( $active_widgets['footer-links'] ) ) {

	$hasChange = true;

	//Facebook + Twitter
	$active_widgets['footer-links'][0] = 'phpsp-social-1';

	$footer_social_widget_content[1] = array(
		'title' => 'PHPSP nas redes sociais',
	);

	$active_widgets['footer-links'][1] = 'phpsp-parceiros-1';

	$template_url = get_bloginfo( 'template_url' );

	$footer_partners_widget_content[1] = array(
		'content' => '
        <a class="logo_php" href="http://www.php.net/" target="_blank">
            <img alt="PHP"
                 src="' . $template_url . '/img/php.png">
        </a><br />
        <a href="https://azure.microsoft.com/pt-br/" target="_blank">
            <img alt="Windows Azure"
                 src="' . $template_url . '/img/azure.png">
        </a>
        <a href="https://imasters.com.br/" target="_blank">
            <img alt="iMasters"
                 src="' . $template_url . '/img/imasters.png">
        </a>
        <a href="https://paypal.com.br/" target="_blank">
            <img alt="PayPal"
                 src="' . $template_url . '/img/paypal.png">
        </a>
        <a href="https://www.locaweb.com.br" target="_blank">
            <img alt="LocaWeb"
                 src="' . $template_url . '/img/locaweb.png">
        </a>
        <a href="https://www.jetbrains.com/phpstorm/" target="_blank">
            <img alt="Jet Brains"
                 src="' . $template_url . '/img/phpstorm.png">
        </a>
        <a href="https://soyuz.com.br/" target="_blank">
            <img alt="Soyuz"
                 src="' . $template_url . '/img/soyuz.png">
        </a>
        <a href="https://contaazul.com/" target="_blank">
            <img alt="Conta Azul"
                 src="' . $template_url . '/img/contaazul.png">
		</a>
		<a href="https://devnaestrada.com.br/" target="_blank">
            <img alt="Dev Na Estrada"
                 src="' . $template_url . '/img/devnaestrada.png">
        </a>',
	);

	update_option( 'widget_phpsp-social', $footer_social_widget_content );
	update_option( 'widget_phpsp-parceiros', $footer_partners_widget_content );
}

//Configura a lateral direita (paginas internas)
if ( empty( $active_widgets['content-right-column-1'] ) ) {

	$hasChange = true;

	//Outros artigos
	$active_widgets['content-right-column-1'][0] = 'phpsp-artigos-2';

	$artigos_widget_content[2] = array(
		'title' => 'Últimos Artigos',
		'cat'   => 3,
		'limit' => 5,
		'more'  => 'Ver mais artigos...'
	);

	$active_widgets['content-right-column-1'][1] = 'categories-1';

	$footer_categories_widget_content[1] = array(
		'title'       => 'Outros Temas',
		'count'       => 1,
		'hierarchial' => 1,
	);

	update_option( 'widget_phpsp-artigos', $artigos_widget_content );
	update_option( 'widget_categories', $footer_categories_widget_content );
}

if ( $hasChange ) {

	update_option( 'sidebars_widgets', $active_widgets );

	if ( $forceUdate ) {
		update_option( 'phpsp_data_version', $themeVersion );
	}
}