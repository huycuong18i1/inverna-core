<?php 
if(!function_exists('flat_get_post_page_content')){
    function flat_get_post_page_content( $slug ) {
        $content_post = get_posts(array(
            'name' => $slug,
            'posts_per_page' => 1,
            'post_type' => 'elementor_library',
            'post_status' => 'publish'
        ));
        if (array_key_exists(0, $content_post) == true) {
            $id = $content_post[0]->ID;
            return $id;
        }
    }
}

if(!function_exists('tf_header_enabled')){
    function tf_header_enabled() {
        $header_id = ThemesFlat_Addon_For_Elementor_inverna::get_settings( 'type_header', '' );
        $status    = false;

        if ( '' !== $header_id ) {
            $status = true;
        }

        return apply_filters( 'tf_header_enabled', $status );
    }
}

if(!function_exists('tf_footer_enabled')){
    function tf_footer_enabled() {
        $header_id = ThemesFlat_Addon_For_Elementor_inverna::get_settings( 'type_footer', '' );
        $status    = false;

        if ( '' !== $header_id ) {
            $status = true;
        }

        return apply_filters( 'tf_footer_enabled', $status );
    }
}

if(!function_exists('get_header_content')){
    function get_header_content() {
        $tf_get_header_id = ThemesFlat_Addon_For_Elementor_inverna::tf_get_header_id();
        echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display($tf_get_header_id);
    }
}

if(!function_exists('tf_get_template_widget')){
    function tf_get_template_widget($template_name, $args = null, $return = false){
        $template_file = $template_name . '.php';
        $default_folder = plugin_dir_path(__FILE__) . 'templates/';
        $theme_folder = apply_filters('tf_templates_folder', dirname(plugin_basename(__FILE__)));
        $template = locate_template($theme_folder . '/' . $template_file);
        if (!$template) {
            $template = $default_folder . $template_file;
        }
        if ($args && is_array($args)) {
            extract($args);
        }
        if ($return) {
            ob_start();
        }
        if (file_exists($template)) {
            include $template;
        }
        if ($return) {
            return ob_get_clean();
        }
        return null;
    }
}

// Hide render sidebar container css
remove_filter( 'render_block', 'wp_render_layout_support_flag', 10, 2 );
remove_filter( 'render_block', 'gutenberg_render_layout_support_flag', 10, 2 );
remove_filter( 'render_block', 'wp_render_layout_support_flag', 10, 2 );

add_filter( 'render_block', function( $block_content, $block ) {
    if ( $block['blockName'] === 'core/group' ) {
        return $block_content;
    }

    return wp_render_layout_support_flag( $block_content, $block );
}, 10, 2 );

add_action('wp_ajax_filter_project', 'filter_project');
add_action('wp_ajax_nopriv_filter_project', 'filter_project');

function filter_project() {
    $category = $_POST['category'];
	$paged = isset($_POST['paged']) ? intval($_POST['paged']) : 8;

    $args = array(
        'post_type' => 'project',
        'post_status' => 'publish',
        'posts_per_page' => $paged,
    );

    if ($category !== '*') {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'project_category',
                'field' => 'slug',
                'terms' => $category,
            ),
        );
    }



    $query = new WP_Query($args);

    	if ($query->have_posts()) : ?>
			<?php while ( $query->have_posts() ) : $query->the_post(); 
            $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
            ?>

            <div class="item">				

<div class="project-post scale-hover">

<div class="featured-post">

<a href="<?php echo get_the_permalink(); ?>">

<img src="<?php echo esc_url($thumbnail_url) ?>" alt="images">

</a>

</div>

    <div class="content"> 

            <h5 class="title border_eff">
                <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
            </h5>
            <div class="category-project"><?php echo esc_attr ( the_terms( get_the_ID(), 'project_category', '', ', ', '' ) ); ?></div>

    </div>

</div>

</div>
           
		<?php endwhile; 
		?>
		
	<?php else: ?>
		
        <?php esc_html_e('No posts found', 'themesflat-core'); ?>

	<?php endif; ?>

	<?php
	wp_reset_postdata();
    wp_die();
}

?>

