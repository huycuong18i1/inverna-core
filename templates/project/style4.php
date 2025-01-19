<?php 
global $post;
        $id = $post->ID;
        $termsArray = get_the_terms( $id, 'case_study_category' );
        $termsString = "";

        if ( $termsArray ) {
            foreach ( $termsArray as $term ) {
                $itemname = strtolower( $term->slug ); 
                $itemname = str_replace( ' ', '-', $itemname );
                $termsString .= $itemname.' ';
            }
        }
?>
<?php $count_attr = $count < 10 ? '0'.$count : $count; ?>
<div class="item">				

    <div class="case-study-post">

    <div class="number"><?php echo $count_attr; ?></div>

    <div class="number s2"><?php echo $count_attr; ?></div>

    <div class="featured-post">

<a href="<?php echo get_the_permalink(); ?>">

<?php 

$get_id_post_thumbnail = get_post_thumbnail_id();

echo sprintf('<img src="%s" alt="image">', \Elementor\Group_Control_Image_Size::get_attachment_image_src( $get_id_post_thumbnail, 'thumbnail', $settings ));

?>

</a>

</div>

        <div class="content"> 
            
            <div class="category-case-study"><?php echo esc_attr ( the_terms( get_the_ID(), 'case_study_category', '', ', ', '' ) ); ?></div>
                <h5 class="title border_eff">
                    <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                </h5>

            <?php if ( $settings['show_button'] == 'yes' ): ?>

                <div class="tf-button-container">

                <a href="<?php echo esc_url( get_permalink() ) ?>" class="tf-button">

                <span class="plus"><?php echo \Elementor\Addon_Elementor_Icon_manager_inverna::render_icon( $settings['post_icon_readmore'], [ 'aria-hidden' => 'true' ] );?></span>

                <span class="read"><?php echo esc_attr( $settings['button_text'] ); ?></span>

                </a>

                </div>

            <?php endif; ?>

        </div>

    </div>

</div>