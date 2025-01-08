<?php 
global $post;
$id = $post->ID;
$termsArray = get_the_terms( $id, 'services_category' );
$termsString = "";
if ( $termsArray ) {
	foreach ( $termsArray as $term ) {
		$itemname = strtolower( $term->slug ); 
		$itemname = str_replace( ' ', '-', $itemname );
		$termsString .= $itemname.' ';
	}
}
$features = get_post_meta($post->ID, 'features_services_value', true);
?>
<div class="item <?php echo esc_attr( $termsString ); ?> animated fadeInUp">				
    <div class="services-post hover-flash scale-hover">



        <div class="content"> 
            <h4 class="title">
                <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
            </h4>
            <?php if ( $settings['show_exc'] == 'yes' ): ?>
                <p class="description"><?php echo wp_trim_words( get_the_content(), $settings['excerpt_lenght'], '' ); ?></p>
            <?php endif; ?>
            <?php if ( !empty($features) ): ?>
                <div class="group-features">
                    <?php echo wp_kses_post($features); ?>
                </div>
            <?php endif; ?>
            <?php if ( $settings['show_button'] == 'yes' ): ?>
                <div class="tf-button-container">
                <a href="<?php echo esc_url( get_permalink() ) ?>" class="tf-button">
                        <span><?php echo esc_attr( $settings['button_text'] ); ?></span>
                    </a>
                </div>
            <?php endif; ?>
        </div>

        <div class="featured-post">
            <a href="<?php echo get_the_permalink(); ?>">
                <?php 
                $get_id_post_thumbnail = get_post_thumbnail_id();
                echo sprintf('<img src="%s" alt="image">', \Elementor\Group_Control_Image_Size::get_attachment_image_src( $get_id_post_thumbnail, 'thumbnail', $settings ));
                ?>
            </a>
        </div>

    </div>
</div>



