<?php 
if ( get_query_var('paged') ) {
    $paged = get_query_var('paged');
 } elseif ( get_query_var('page') ) {
    $paged = get_query_var('page');
 } else {
    $paged = 1;
 }
$query_args = array(
    'post_type' => 'post',
    'posts_per_page' => $settings['posts_per_page'],
    'paged'     => $paged
);
if (! empty( $settings['posts_categories'] )) {
    $query_args['category_name'] = implode(',', $settings['posts_categories']);
}        
if ( ! empty( $settings['exclude'] ) ) {				
    if ( ! is_array( $settings['exclude'] ) )
        $exclude = explode( ',', $settings['exclude'] );

    $query_args['post__not_in'] = $exclude;
}
$query_args['orderby'] = $settings['order_by'];
$query_args['order'] = $settings['order'];	
$query = new WP_Query( $query_args );

?>
<?php while ( $query->have_posts() ) : $query->the_post();?>
<?php 
$get_id_post_thumbnail = get_post_thumbnail_id();
$featured_image = sprintf('<img src="%s" alt="image">', \Elementor\Group_Control_Image_Size::get_attachment_image_src( $get_id_post_thumbnail, 'thumbnail', $settings ));  
?>
<div class="item">
    <div class="entry blog-post "> 
        <?php if ( $settings['show_image'] == 'yes' ): ?>                                    
        <div class="featured-post">
            <a href="<?php echo esc_url( get_permalink() ) ?>">
                <?php echo sprintf('%s',$featured_image); ?>
                <span class="blog-plus"></span>
            </a>            
            <?php if ( $settings['show_category'] == 'yes' ): ?>
                <div class="meta-features">
                    <div class="category-post">
                        <?php if ( !empty($settings['category_icon']) ): ?>
                            <?php echo \Elementor\Addon_Elementor_Icon_manager_inverna::render_icon( $settings['category_icon'], [ 'aria-hidden' => 'true' ] );?>
                        <?php endif; ?>
                        <?php the_category( ' ' ); ?>
                    </div>
                </div>
            <?php endif; ?> 
        </div>
        <?php endif; ?>
        <div class="content">
            <?php if ( $settings['show_meta'] == 'yes' ): ?> 
                <ul class="meta-post">
                    <?php if ( $settings['show_user'] == 'yes' ): ?>
                    <li class="author-post">
                        <div class="image">
                            <?php echo get_avatar( get_the_author_meta( 'ID' ), 50 ); ?>
                        </div>
                        <div class="name"><?php echo get_the_author(); ?></div>
                    </li>
                    <?php endif; ?> 
                    <?php if ( $settings['show_comment'] == 'yes' ): ?>
                    <li>
                        <div class="post-comment">
                            <i class="icon-inverna-comment"></i><?php echo esc_html(comments_number()); ?>
                        </div>
                    </li>
                    <?php endif; ?> 
                </ul>
            <?php endif; ?> 
            <?php if ( $settings['show_title'] == 'yes' ): ?>
                <h3 class="title"><a href="<?php echo esc_url( get_the_permalink() ); ?>" title="<?php echo esc_attr( get_the_title() ); ?>"><?php echo get_the_title(); ?></a></h3>
            <?php endif; ?>
            <?php if ( $settings['show_excerpt'] == 'yes' ): ?>
                <div class="description"><?php echo wp_trim_words( get_the_content(), $settings['excerpt_lenght'], '' ); ?></div>
            <?php endif; ?>  
            <?php if ( $settings['show_button'] == 'yes' && $settings['button_text'] != '' ): ?>
                <div class="tf-button-container">
                <a href="<?php echo esc_url( get_permalink() ) ?>" class="tf-button">
                    <span><?php echo esc_attr( $settings['button_text'] ); ?></span>
                    <?php echo \Elementor\Addon_Elementor_Icon_manager_inverna::render_icon( $settings['post_icon_readmore'], [ 'aria-hidden' => 'true' ] );?>
                </a>
                </div>
            <?php endif; ?> 
        </div>                      
    </div>
</div>
<?php endwhile; ?>