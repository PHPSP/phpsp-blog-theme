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

function PHPSP_register_widgets() {
    register_widget( 'PHPSP_Artigos_Widget' );
    register_widget( 'PHPSP_Avisos_Widget' );
}

add_action( 'widgets_init', 'PHPSP_register_widgets' );