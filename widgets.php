<?php

/** Widgets classes */
class PHPSP_Artigos_Widget extends WP_Widget {

    public function PHPSP_Artigos_Widget() {
        parent::WP_Widget('phpsp-artigos', 'PHPSP - Artigos', ' Lista de Artigos de uma categoria');
    }

    public function widget ($args, $instance) {
        $query_args = array( 'cat' => $instance['cat'], 'posts_per_page' => $instance['limit'] );
        $loop = new WP_Query($query_args);
        echo $args['before_widget'];
        echo $args['before_title'] . $instance['title'] . $args['after_title'];

        while ($loop->have_posts()) {
            $loop->the_post();
            get_template_part('widget', 'artigos');
        }

        echo '<div class="todos_artigos"><a href="' . get_category_link($instance['cat']) . '">' . $instance['more'] . '</a></div>';

        echo $args['after_widget'];
    }

    public function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title'], '<strong></strong>');
        $instance['cat'] = strip_tags($new_instance['cat']);
        $instance['limit'] = strip_tags($new_instance['limit']);
        $instance['more'] = strip_tags($new_instance['more']);

        return $instance;
    }

    public function form($instance) {
        if ( $instance ) {
            $title = esc_attr($instance['title']);
            $cat = esc_attr($instance['cat']);
            $limit = esc_attr($instance['limit']);
            $more = esc_attr($instance['more']);
        } else {
            $title = '';
            $cat = '';
            $limit = 5;
            $more = ' Ver mais...';
        }

        $form = '
        <p>
            <label for="' . $this->get_field_id('title') . '">
                Título
                <input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . $title . '" />
            </label>
        </p>
        <p>
            <label for="' . $this->get_field_id('cat') . '">
                Categoria
                <select id="' . $this->get_field_id('cat') . '" name="' . $this->get_field_name('cat') . '" class="widefat" style="width:100%;">';

        foreach(get_terms('category','parent=0&hide_empty=0') as $term) {
            $form .= '<option ' . selected($cat, $term->term_id, false ) . ' value="' . $term->term_id . '">' . $term->name . '</option>';
        }

        $form .= '
                </select>
            </label>
        </p>
        <p>
            <label for="' . $this->get_field_id('limit') . '">
                Quantidade
                <input class="widefat" id="' . $this->get_field_id('limit') . '" name="' . $this->get_field_name('limit') . '" type="text" value="' . $limit . '" />
            </label>
        </p>
        <p>
            <label for="' . $this->get_field_id('more') . '">
                Texto final
                <input class="widefat" id="' . $this->get_field_id('more') . '" name="' . $this->get_field_name('more') . '" type="text" value="' . $more . '" />
            </label>
        </p>
        ';

        echo $form;
    }
}

class PHPSP_Avisos_Widget extends WP_Widget {

    public function PHPSP_Avisos_Widget() {
        parent::WP_Widget('phpsp-avisos', 'PHPSP - Avisos', ' Lista de Avisos de uma categoria');
    }

    public function widget ($args, $instance) {
        $query_args = array( 'cat' => $instance['cat'], 'posts_per_page' => $instance['limit'] );
        $loop = new WP_Query($query_args);
        echo $args['before_widget'];
        echo $args['before_title'] . $instance['title'] . $args['after_title'];

        while ($loop->have_posts()) {
            $loop->the_post();
            get_template_part('widget', 'avisos');
        }

        if ($instance['show_more']) {
            echo '<div class="todos_artigos"><a href="' . get_category_link($instance['cat']) . '">' . $instance['more'] . '</a></div>';
        }

        echo $args['after_widget'];
    }

    public function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title'], '<strong></strong>');
        $instance['cat'] = strip_tags($new_instance['cat']);
        $instance['limit'] = strip_tags($new_instance['limit']);
        $instance['show_more'] = strip_tags($new_instance['show_more']);
        $instance['more'] = strip_tags($new_instance['more']);

        return $instance;
    }

    public function form($instance) {
        if ( $instance ) {
            $title = esc_attr($instance['title']);
            $cat = esc_attr($instance['cat']);
            $limit = esc_attr($instance['limit']);
            $show_more = esc_attr($instance['show_more']);
            $more = esc_attr($instance['more']);
        } else {
            $title = '';
            $cat = '';
            $limit = 5;
            $show_more = 0;
            $more = ' Ver mais...';
        }

        $form = '
        <p>
            <label for="' . $this->get_field_id('title') . '">
                Título
                <input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . $title . '" />
            </label>
        </p>
        <p>
            <label for="' . $this->get_field_id('cat') . '">
                Categoria
                <select id="' . $this->get_field_id('cat') . '" name="' . $this->get_field_name('cat') . '" class="widefat" style="width:100%;">';

        foreach(get_terms('category','parent=0&hide_empty=0') as $term) {
            $form .= '<option ' . selected($cat, $term->term_id, false ) . ' value="' . $term->term_id . '">' . $term->name . '</option>';
        }

        $form .= '
                </select>
            </label>
        </p>
        <p>
            <label for="' . $this->get_field_id('limit') . '">
                Quantidade
                <input class="widefat" id="' . $this->get_field_id('limit') . '" name="' . $this->get_field_name('limit') . '" type="text" value="' . $limit . '" />
            </label>
        </p>
        <p>
            <label for="' . $this->get_field_id('show_more') . '">
                <input type="checkbox" ' . checked($show_more, 1, false ) . ' class="widefat" id="' . $this->get_field_id('show_more') . '" name="' . $this->get_field_name('show_more') . '" type="text" value="1" />Mostrar link para mais?
            </label>
        </p>
        <p>
            <label for="' . $this->get_field_id('more') . '">
                Texto link "Ver mais..."
                <input class="widefat" id="' . $this->get_field_id('more') . '" name="' . $this->get_field_name('more') . '" type="text" value="' . $more . '" />
            </label>
        </p>
        ';

        echo $form;
    }
}

class PHPSP_Topo_Widget extends WP_Widget {

    public function PHPSP_Topo_Widget() {
        parent::WP_Widget('phpsp-topo', 'PHPSP - Topo', 'Aviso no topo + redes sociais');
    }

    public function widget ($args, $instance) {

        set_query_var('widget_content', $instance['content']);

        echo $args['before_widget'];

        get_template_part('widget', 'topo');

        echo $args['after_widget'];
    }

    public function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['content'] = strip_tags($new_instance['content'], '<strong></strong><a></a>');

        return $instance;
    }

    public function form($instance) {
        if ( $instance ) {
            $content = esc_attr($instance['content']);
        } else {
            $content = '';
        }

        $form = '
        <p>
            <label for="' . $this->get_field_id('content') . '">
                Chamada
                <textarea class="widefat" id="' . $this->get_field_id('content') . '" name="' . $this->get_field_name('content') . '">' . $content . '</textarea>
            </label>
        </p>';

        echo $form;
    }
}

class PHPSP_Facebook_Widget extends WP_Widget {

    public function PHPSP_Facebook_Widget() {
        parent::WP_Widget('phpsp-facebook', 'PHPSP - Facebook', 'Plugin dop Facebook');
    }

    public function widget ($args, $instance) {

        echo $args['before_widget'];

        echo '<section class="container facebook">';

        echo $args['before_title'];

        echo $instance['title'];

        echo $args['after_title'];

        echo '
                <div id="facebook-box">
                    <div id="face">&nbsp;</div>
                </div>
            </section>
        ';

        echo $args['after_widget'];
    }

    public function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title'], '<strong></strong>');

        return $instance;
    }

    public function form($instance) {
        if ( $instance ) {
            $title = esc_attr($instance['title']);
        } else {
            $title = '';
        }

        $form = '
        <p>
            <label for="' . $this->get_field_id('title') . '">
                Título
                <input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . $title . '" />
            </label>
        </p>';

        echo $form;
    }
}

class PHPSP_Parceiros_Widget extends WP_Widget {

    public function PHPSP_Parceiros_Widget() {
        parent::WP_Widget('phpsp-parceiros', 'PHPSP - Parceiros', 'Imagem dos parceiros do PHPSP');
    }

    public function widget ($args, $instance) {
        get_template_part('widget', 'parceiros');
    }

    public function update($new_instance, $old_instance) {
        return $new_instance;
    }

    public function form($instance) {
        echo '';
    }
}

function PHPSP_register_widgets() {
    register_widget( 'PHPSP_Artigos_Widget' );
    register_widget( 'PHPSP_Avisos_Widget' );
    register_widget( 'PHPSP_Topo_Widget' );
    register_widget( 'PHPSP_Facebook_Widget' );
    register_widget( 'PHPSP_Parceiros_Widget' );
}

add_action( 'widgets_init', 'PHPSP_register_widgets' );

/** Configuracao padrao */
$active_widgets = get_option( 'sidebars_widgets' );

//Pra nao salvar atoa
$hasChange = false;

//Configura a primeira coluna, se estiver vazia
if (empty($active_widgets['home-column-1'])) {

    $hasChange = true;

    //Meetup highlight
    $active_widgets['home-column-1'][0] = 'vsmeetnextsinglewidget-1';

    $meetup_widget_content_1[1] = array(
        'title' => 'Próximos Eventos',
        'id' => 'php-sp',
        'date_format' => 'd/m/Y @ g:i a'
    );

    //Meetup lista outros
    $active_widgets['home-column-1'][1] = 'vsmeetlistwidget-1';

    $meetup_widget_content_2[1] = array(
        'title' => '',
        'id' => 'php-sp',
        'hide_first' => true,
        'limit' => 5,
        'date_format' => 'd/m/Y @ g:i a'
    );

    update_option('widget_vsmeetnextsinglewidget', $meetup_widget_content_1);
    update_option('widget_vsmeetlistwidget', $meetup_widget_content_2);
}

//Configura a segunda coluna, se estiver vazia
if (empty($active_widgets['home-column-2'])) {

    $hasChange = true;

    //Artigos
    $active_widgets['home-column-2'][0] = 'phpsp-artigos-1';

    $artigos_widget_content[1] = array(
        'title' => '<strong>Artigos</strong> da comunidade',
        'cat' => 3,
        'limit' => 5,
        'more' => 'Ver mais artigos...'
    );

    update_option('widget_phpsp-artigos', $artigos_widget_content);
}

//Configura a terceira coluna, se estiver vazia
if (empty($active_widgets['home-column-3'])) {

    $hasChange = true;

    //Avisos
    $active_widgets['home-column-3'][0] = 'phpsp-avisos-1';

    $avisos_widget_content[1] = array(
        'title' => '<strong>Avisos</strong> da comunidade',
        'cat' => 776,
        'limit' => 1,
        'show_more' => 0,
        'more' => 'Ver mais avisos...'
    );

    update_option('widget_phpsp-avisos', $avisos_widget_content);
}

//Configura o topo de avisos
if (empty($active_widgets['head-announce'])) {

    $hasChange = true;

    //Topo
    $active_widgets['head-announce'][0] = 'phpsp-topo-1';

    $topo_widget_content[1] = array(
        'content' => '<strong>Próximos encontros e eventos? </strong>
        <a href="http://www.meetup.com/php-sp/">Visite a página do PHPSP no Meetup</a>',
    );

    update_option('widget_phpsp-topo', $topo_widget_content);
}

//Configura o Rodape
if (empty($active_widgets['footer-links'])) {

    $hasChange = true;

    //Facebook
    $active_widgets['footer-links'][0] = 'phpsp-facebook-1';

    $footer_facebook_widget_content[$counter] = array(
        'title' => 'Curta o PHPSP',
    );

    $active_widgets['footer-links'][1] = 'phpsp-parceiros-1';

    $footer_partners_widget_content[1] = array();

    update_option('widget_phpsp-facebook', $footer_facebook_widget_content);
    update_option('widget_phpsp-parceiros', $footer_partners_widget_content);
}

if ($hasChange) {
    update_option( 'sidebars_widgets', $active_widgets );
}