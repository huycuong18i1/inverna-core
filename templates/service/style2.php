<?php 
    $echo_count = $count < 10 ? '0'.$count : $count;
?>
<div class="item">				
    <div class="services-post hover-flash scale-hover">

        <div class="featured-post">
            <a href="<?php echo get_the_permalink(); ?>">
                <?php 
                $get_id_post_thumbnail = get_post_thumbnail_id();
                echo sprintf('<img src="%s" alt="image">', \Elementor\Group_Control_Image_Size::get_attachment_image_src( $get_id_post_thumbnail, 'thumbnail', $settings ));
                ?>
            </a>
        </div>

        <div class="content"> 
            <div class="wrap-title">
                <?php if(!empty($icon)): ?>
                    <div class="icon">
                        <?php echo $icon; ?>
                    </div>
                <?php endif; ?>
                <h3 class="title border_eff">
                    <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                </h3>
                <div class="shape">
                    <i class="icon-inverna-element"></i>
                </div>
            </div>
            <?php if ( $settings['show_exc'] == 'yes' ): ?>
                <p class="description"><?php echo wp_trim_words( get_the_content(), $settings['excerpt_lenght'], '' ); ?></p>
            <?php endif; ?>
            <div class="wrap-bottom">
                <?php if ( $settings['show_button'] == 'yes' ): ?>
                    <div class="tf-button-container">
                        <a href="<?php echo esc_url( get_permalink() ) ?>" class="tf-button">
                            <span><?php echo esc_attr( $settings['button_text'] ); ?></span>
                            <?php echo \Elementor\Addon_Elementor_Icon_manager_inverna::render_icon( $settings['post_icon_readmore'], [ 'aria-hidden' => 'true' ] );?>
                        </a>
                    </div>
                <?php endif; ?>
                <div class="count-service"><?php echo $echo_count; ?></div>
            </div>
        </div>
    </div>
</div>

