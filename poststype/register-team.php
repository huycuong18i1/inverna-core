<?php

add_action('init', 'themesflat_register_team_post_type');

/**

  * Register project post type

*/

function themesflat_register_team_post_type() {

    /*team*/

    $team_slug = themesflat_get_opt('team_slug', 'team');

    $labels = array(

        'name'                  => esc_html__( 'Team', 'themesflat' ),

        'singular_name'         => esc_html__( 'Team', 'themesflat' ),

        'menu_name'             => esc_html__( 'Team', 'themesflat' ),

        'add_new'               => esc_html__( 'New Team', 'themesflat' ),

        'add_new_item'          => esc_html__( 'Add New Team', 'themesflat' ),

        'new_item'              => esc_html__( 'New Team Item', 'themesflat' ),

        'edit_item'             => esc_html__( 'Edit Team Item', 'themesflat' ),

        'view_item'             => esc_html__( 'View Team', 'themesflat' ),

        'all_items'             => esc_html__( 'All Team', 'themesflat' ),

        'search_items'          => esc_html__( 'Search Team', 'themesflat' ),

        'not_found'             => esc_html__( 'No Team Items Found', 'themesflat' ),

        'not_found_in_trash'    => esc_html__( 'No Team Items Found In Trash', 'themesflat' ),

        'parent_item_colon'     => esc_html__( 'Parent Team:', 'themesflat' )



    );

    $args = array(

        'labels'        => $labels,

        'rewrite'       => array( 'slug' => $team_slug ),        

        'supports'    => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'elementor' ),

        'public'        => true,

        'show_in_rest' => true,

        'has_archive' => true

    );

    register_post_type( 'team', $args );

    flush_rewrite_rules();

}



add_filter( 'post_updated_messages', 'themesflat_team_updated_messages' );

/**

  * team update messages.

*/

function themesflat_team_updated_messages ( $messages ) {

    Global $post, $post_ID;

    $messages[esc_html__( 'team' )] = array(

        0  => '',

        1  => sprintf( esc_html__( 'team Updated. <a href="%s">View team</a>', 'themesflat' ), esc_url( get_permalink( $post_ID ) ) ),

        2  => esc_html__( 'Custom Field Updated.', 'themesflat' ),

        3  => esc_html__( 'Custom Field Deleted.', 'themesflat' ),

        4  => esc_html__( 'team Updated.', 'themesflat' ),

        5  => isset( $_GET['revision']) ? sprintf( esc_html__( 'team Restored To Revision From %s', 'themesflat' ), wp_post_revision_title((int)$_GET['revision'], false)) : false,

        6  => sprintf( esc_html__( 'team Published. <a href="%s">View team</a>', 'themesflat' ), esc_url( get_permalink( $post_ID ) ) ),

        7  => esc_html__( 'team Saved.', 'themesflat' ),

        8  => sprintf( esc_html__('team Submitted. <a target="_blank" href="%s">Preview team</a>', 'themesflat' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),

        9  => sprintf( esc_html__( 'team Scheduled For: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview team</a>', 'themesflat' ),date_i18n( esc_html__( 'M j, Y @ G:i', 'themesflat' ), strtotime( $post->post_date ) ), esc_url( get_permalink( $post_ID ) ) ),

        10 => sprintf( esc_html__( 'team Draft Updated. <a target="_blank" href="%s">Preview team</a>', 'themesflat' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),

    );

    return $messages;

}



add_action( 'init', 'themesflat_register_team_taxonomy' );

/**

  * Register team taxonomy

*/

function themesflat_register_team_taxonomy() {

    /*team Categories*/

    $team_cat_slug = 'team_category';    

    $labels = array(

        'name'                       => esc_html__( 'Team Categories', 'themesflat' ),

        'singular_name'              => esc_html__( 'Categories', 'themesflat' ),

        'search_items'               => esc_html__( 'Search Categories', 'themesflat' ),

        'menu_name'                  => esc_html__( 'Categories', 'themesflat' ),

        'all_items'                  => esc_html__( 'All Categories', 'themesflat' ),

        'parent_item'                => esc_html__( 'Parent Categories', 'themesflat' ),

        'parent_item_colon'          => esc_html__( 'Parent Categories:', 'themesflat' ),

        'new_item_name'              => esc_html__( 'New Categories Name', 'themesflat' ),

        'add_new_item'               => esc_html__( 'Add New Categories', 'themesflat' ),

        'edit_item'                  => esc_html__( 'Edit Categories', 'themesflat' ),

        'update_item'                => esc_html__( 'Update Categories', 'themesflat' ),

        'add_or_remove_items'        => esc_html__( 'Add or remove Categories', 'themesflat' ),

        'choose_from_most_used'      => esc_html__( 'Choose from the most used Categories', 'themesflat' ),

        'not_found'                  => esc_html__( 'No Categories found.' ),

        'menu_name'                  => esc_html__( 'Categories' ),

    );

    $args = array(

        'labels'        => $labels,

        'rewrite'       => array('slug'=>$team_cat_slug),

        'hierarchical'  => true,

        'show_in_rest'  => true,

    );

    register_taxonomy( 'team_category', 'team', $args );

    flush_rewrite_rules();

}



add_action( 'init', 'themesflat_register_team_tag' );

/**

 * Register tag taxonomy

 */

function themesflat_register_team_tag() {

    $team_tag_slug = 'team_tag';



    $labels = array(

        'name'                       => esc_html__( 'Team Tags', 'themesflat' ),

        'singular_name'              => esc_html__( 'Team Tags', 'themesflat' ),

        'search_items'               => esc_html__( 'Search Tags', 'themesflat' ),        

        'all_items'                  => esc_html__( 'All Tags', 'themesflat' ),

        'new_item_name'              => esc_html__( 'Add New Tag', 'themesflat' ),

        'add_new_item'               => esc_html__( 'New Tag Name', 'themesflat' ),

        'edit_item'                  => esc_html__( 'Edit Tag', 'themesflat' ),

        'update_item'                => esc_html__( 'Update Tag', 'themesflat' ),

        'menu_name'                  => esc_html__( 'Tags' ),

    );

    $args = array(

        'labels'       => $labels,

        'rewrite'       => array('slug'=>$team_tag_slug),

        'hierarchical' => true,

        'show_in_rest'  => true,

    );

    register_taxonomy( 'team_tag', 'team', $args );

    flush_rewrite_rules();

}



function social_team_meta() {



    add_meta_box(

		'team_custom_field',       

		'Information team',                  

		'team_custom_metabox',  

		'team',                 

		'normal',                

		'high'                     

	);



	add_meta_box(

		'facebook_social_name',       

		'Social Select Field 1',                  

		'facebook_team_metabox',  

		'team',                 

		'normal',                

		'high'                     

	);



    add_meta_box(

		'twitter_social_name',       

		'Social Select Field 2',                  

		'twitter_team_metabox',  

		'team',                 

		'normal',                

		'high'                     

	);



    add_meta_box(

		'linkedin_social_name',       

		'Social Select Field 3',                  

		'linkedin_team_metabox',  

		'team',                 

		'normal',                

		'high'                     

	);



    add_meta_box(

		'youtube_social_name',       

		'Social Select Field 4',                  

		'youtube_team_metabox',  

		'team',                 

		'normal',                

		'high'                     

	);



    add_meta_box(

		'custom1_team_metabox',       

		'Social Select Field 5',                  

		'custom1_team_metabox',  

		'team',                 

		'normal',                

		'high'                     

	);



    add_meta_box(

		'custom2_team_metabox',       

		'Social Select Field 6',                  

		'custom2_team_metabox',  

		'team',                 

		'normal',                

		'high'                     

	);

}

add_action('add_meta_boxes', 'social_team_meta');



function team_custom_metabox() {

    global $post;


	$data_email = get_post_meta($post->ID, 'email_team_value', true);

	$data_phone = get_post_meta($post->ID, 'phone_team_value', true);

	$data_location = get_post_meta($post->ID, 'location_team_value', true);

    // Use nonce for verification to secure data sending

    wp_nonce_field( basename( __FILE__ ), 'team_nonce' );



    ?>



    <div class="inner-full" style="margin-bottom: 30px;">

    <label for="email_team" style="    display: block;font-size: 18px;font-weight: 600;color: #3C210E;text-transform: capitalize;    margin-bottom: 20px;"><?php esc_html_e( 'Email', 'themesflat' ) ?></label>

<input type="text" id="email_team" name="email_team_value"  value="<?php echo (isset($data_email)) ? $data_email : ''; ?>" style="    border: 1px solid #E4E4E4; background-color: #f6f6f6; padding: 16px 20px 16px 20px;">

    </div>

    <div class="inner-full" style="margin-bottom: 30px;">

    <label for="phone_team" style="    display: block;font-size: 18px;font-weight: 600;color: #3C210E;text-transform: capitalize;    margin-bottom: 20px;"><?php esc_html_e( 'Phone Number', 'themesflat' ) ?></label>

<input type="text" id="phone_team" name="phone_team_value"  value="<?php echo (isset($data_phone)) ? $data_phone : ''; ?>" style="    border: 1px solid #E4E4E4; background-color: #f6f6f6; padding: 16px 20px 16px 20px;">

</div>

<div class="inner-full" style="margin-bottom: 30px;">

<label for="location_team" style="    display: block;font-size: 18px;font-weight: 600;color: #3C210E;text-transform: capitalize;    margin-bottom: 20px;"><?php esc_html_e( 'Location', 'themesflat' ) ?></label>

            <input type="text" id="location_team" name="location_team_value"  value="<?php echo (isset($data_location)) ? $data_location : ''; ?>" style="    border: 1px solid #E4E4E4; background-color: #f6f6f6; padding: 16px 20px 16px 20px;">

</div>



    <?php

}



function facebook_team_metabox() {

    global $post;

	$data = get_post_meta($post->ID, 'facebook_team_value', true);

	$icon = get_post_meta($post->ID, 'facebook_icon_value', true);

    // Use nonce for verification to secure data sending

    wp_nonce_field( basename( __FILE__ ), 'team_nonce' );



    ?>



    <div class="group-form-select-social" style="display: flex;

    align-items: center;

    gap: 20px;">

        <select style="font-family: 'finwice';     border-radius: 999px;

    padding: 4px 10px;

    margin-bottom: 15px;" name="facebook_icon_value" class="select-icon">

            <option value="">Select Icon</option>

            <option value="facebook" <?php selected($icon, 'facebook'); ?>>&#xe926; Facebook</option>

            <option value="instagram" <?php selected($icon, 'instagram'); ?>>&#xe95e; Instagram</option>

            <option value="linkedin" <?php selected($icon, 'linkedin'); ?>>&#xe92f; Linkedin</option>

            <option value="twitter" <?php selected($icon, 'twitter'); ?>>&#xe967; Twitter</option>

            <option value="google-plus" <?php selected($icon, 'google-plus'); ?>>&#xe95f; Google / Gmail</option>

            <option value="youtube" <?php selected($icon, 'youtube'); ?>>&#xe95b; Youtube</option>

            <option value="skype" <?php selected($icon, 'skype'); ?>>&#xe95d; Skype</option>

        </select>

        <input type="text" name="facebook_team_value" placeholder="www.facebook.com" value="<?php echo (isset($data)) ? $data : ''; ?>" style="    border: 1px solid #E4E4E4; background-color: #f6f6f6; padding: 16px 20px 16px 20px;">

    </div>



    <?php

}



function twitter_team_metabox() {

    global $post;

	$data = get_post_meta($post->ID, 'twitter_team_value', true);

	$icon = get_post_meta($post->ID, 'twitter_icon_value', true);

    // Use nonce for verification to secure data sending

    wp_nonce_field( basename( __FILE__ ), 'team_nonce' );



    ?>

    <div class="group-form-select-social" style="display: flex;

    align-items: center;

    gap: 20px;">

        <select style="font-family: 'finwice';     border-radius: 999px;

    padding: 4px 10px;

    margin-bottom: 15px;" name="twitter_icon_value" class="select-icon">

            <option value="">Select Icon</option>

            <option value="facebook" <?php selected($icon, 'facebook'); ?>>&#xe926; Facebook</option>

            <option value="instagram" <?php selected($icon, 'instagram'); ?>>&#xe95e; Instagram</option>

            <option value="linkedin" <?php selected($icon, 'linkedin'); ?>>&#xe92f; Linkedin</option>

            <option value="twitter" <?php selected($icon, 'twitter'); ?>>&#xe967; Twitter</option>

            <option value="google-plus" <?php selected($icon, 'google-plus'); ?>>&#xe95f; Google / Gmail</option>

            <option value="youtube" <?php selected($icon, 'youtube'); ?>>&#xe95b; Youtube</option>

            <option value="skype" <?php selected($icon, 'skype'); ?>>&#xe95d; Skype</option>

        </select>

    <input type="text" name="twitter_team_value" placeholder="twitter.com" value="<?php echo (isset($data)) ? $data : ''; ?>" style="    border: 1px solid #E4E4E4; background-color: #f6f6f6; padding: 16px 20px 16px 20px;">

    </div>

    <?php

}



function linkedin_team_metabox() {

    global $post;

	$data = get_post_meta($post->ID, 'linkedin_team_value', true);

	$icon = get_post_meta($post->ID, 'linkedin_icon_value', true);

    // Use nonce for verification to secure data sending

    wp_nonce_field( basename( __FILE__ ), 'team_nonce' );



    ?>



    <div class="group-form-select-social" style="display: flex;

    align-items: center;

    gap: 20px;">

        <select style="font-family: 'finwice';     border-radius: 999px;

    padding: 4px 10px;

    margin-bottom: 15px;" name="linkedin_icon_value" class="select-icon">

            <option value="">Select Icon</option>

            <option value="facebook" <?php selected($icon, 'facebook'); ?>>&#xe926; Facebook</option>

            <option value="instagram" <?php selected($icon, 'instagram'); ?>>&#xe95e; Instagram</option>

            <option value="linkedin" <?php selected($icon, 'linkedin'); ?>>&#xe92f; Linkedin</option>

            <option value="twitter" <?php selected($icon, 'twitter'); ?>>&#xe967; Twitter</option>

            <option value="google-plus" <?php selected($icon, 'google-plus'); ?>>&#xe95f; Google / Gmail</option>

            <option value="youtube" <?php selected($icon, 'youtube'); ?>>&#xe95b; Youtube</option>

            <option value="skype" <?php selected($icon, 'skype'); ?>>&#xe95d; Skype</option>

        </select>

    <input type="text" name="linkedin_team_value" placeholder="linkedin.com" value="<?php echo (isset($data)) ? $data : ''; ?>" style="    border: 1px solid #E4E4E4; background-color: #f6f6f6; padding: 16px 20px 16px 20px;">

    </div>



    <?php

}



function youtube_team_metabox() {

    global $post;

	$data = get_post_meta($post->ID, 'youtube_team_value', true);

	$icon = get_post_meta($post->ID, 'youtube_icon_value', true);

    // Use nonce for verification to secure data sending

    wp_nonce_field( basename( __FILE__ ), 'team_nonce' );



    ?>



<div class="group-form-select-social" style="display: flex;

    align-items: center;

    gap: 20px;">

        <select style="font-family: 'finwice';     border-radius: 999px;

    padding: 4px 10px;

    margin-bottom: 15px;" name="youtube_icon_value" class="select-icon">

            <option value="">Select Icon</option>

            <option value="facebook" <?php selected($icon, 'facebook'); ?>>&#xe926; Facebook</option>

            <option value="instagram" <?php selected($icon, 'instagram'); ?>>&#xe95e; Instagram</option>

            <option value="linkedin" <?php selected($icon, 'linkedin'); ?>>&#xe92f; Linkedin</option>

            <option value="twitter" <?php selected($icon, 'twitter'); ?>>&#xe967; Twitter</option>

            <option value="google-plus" <?php selected($icon, 'google-plus'); ?>>&#xe95f; Google / Gmail</option>

            <option value="youtube" <?php selected($icon, 'youtube'); ?>>&#xe95b; Youtube</option>

            <option value="skype" <?php selected($icon, 'skype'); ?>>&#xe95d; Skype</option>

        </select>

    <input type="text" name="youtube_team_value" placeholder="youtube.com" value="<?php echo (isset($data)) ? $data : ''; ?>" style="    border: 1px solid #E4E4E4; background-color: #f6f6f6; padding: 16px 20px 16px 20px;">

    </div>



    <?php

}



function custom1_team_metabox() {

    global $post;

	$data = get_post_meta($post->ID, 'custom1_team_value', true);

	$icon = get_post_meta($post->ID, 'custom1_icon_value', true);

    // Use nonce for verification to secure data sending

    wp_nonce_field( basename( __FILE__ ), 'team_nonce' );



    ?>



<div class="group-form-select-social" style="display: flex;

    align-items: center;

    gap: 20px;">

        <select style="font-family: 'finwice';     border-radius: 999px;

    padding: 4px 10px;

    margin-bottom: 15px;" name="custom1_icon_value" class="select-icon">

            <option value="">Select Icon</option>

            <option value="facebook" <?php selected($icon, 'facebook'); ?>>&#xe926; Facebook</option>

            <option value="instagram" <?php selected($icon, 'instagram'); ?>>&#xe95e; Instagram</option>

            <option value="linkedin" <?php selected($icon, 'linkedin'); ?>>&#xe92f; Linkedin</option>

            <option value="twitter" <?php selected($icon, 'twitter'); ?>>&#xe967; Twitter</option>

            <option value="google-plus" <?php selected($icon, 'google-plus'); ?>>&#xe95f; Google / Gmail</option>

            <option value="youtube" <?php selected($icon, 'youtube'); ?>>&#xe95b; Youtube</option>

            <option value="skype" <?php selected($icon, 'skype'); ?>>&#xe95d; Skype</option>

        </select>

    <input type="text" name="custom1_team_value" placeholder="Link" value="<?php echo (isset($data)) ? $data : ''; ?>" style="    border: 1px solid #E4E4E4; background-color: #f6f6f6; padding: 16px 20px 16px 20px;">

    </div>



    <?php

}



function custom2_team_metabox() {

    global $post;

	$data = get_post_meta($post->ID, 'custom2_team_value', true);

	$icon = get_post_meta($post->ID, 'custom2_icon_value', true);

    // Use nonce for verification to secure data sending

    wp_nonce_field( basename( __FILE__ ), 'team_nonce' );



    ?>



<div class="group-form-select-social" style="display: flex;

    align-items: center;

    gap: 20px;">

        <select style="font-family: 'finwice';     border-radius: 999px;

    padding: 4px 10px;

    margin-bottom: 15px;" name="custom2_icon_value" class="select-icon">

            <option value="">Select Icon</option>

            <option value="facebook" <?php selected($icon, 'facebook'); ?>>&#xe926; Facebook</option>

            <option value="instagram" <?php selected($icon, 'instagram'); ?>>&#xe95e; Instagram</option>

            <option value="linkedin" <?php selected($icon, 'linkedin'); ?>>&#xe92f; Linkedin</option>

            <option value="twitter" <?php selected($icon, 'twitter'); ?>>&#xe967; Twitter</option>

            <option value="google-plus" <?php selected($icon, 'google-plus'); ?>>&#xe95f; Google / Gmail</option>

            <option value="youtube" <?php selected($icon, 'youtube'); ?>>&#xe95b; Youtube</option>

            <option value="skype" <?php selected($icon, 'skype'); ?>>&#xe95d; Skype</option>

        </select>

    <input type="text" name="custom2_team_value" placeholder="Link" value="<?php echo (isset($data)) ? $data : ''; ?>" style="    border: 1px solid #E4E4E4; background-color: #f6f6f6; padding: 16px 20px 16px 20px;">

    </div>



    <?php

}



function social_save_meta_fields( $post_id ) {



	// verify nonce

	if (!isset($_POST['team_nonce']) || !wp_verify_nonce($_POST['team_nonce'], basename(__FILE__)))

		return 'nonce not verified';

  

	// check autosave

	if ( wp_is_post_autosave( $post_id ) )

		return 'autosave';

  

	//check post revision

	if ( wp_is_post_revision( $post_id ) )

		return 'revision';

  

	// check permissions

	if ( 'team' == $_POST['post_type'] ) {

		if ( ! current_user_can( 'edit_page', $post_id ) )

			return 'cannot edit page';

		} elseif ( ! current_user_can( 'edit_post', $post_id ) ) {

			return 'cannot edit post';

	}

  

    if (array_key_exists('wporg_field', $_POST)) {

        update_post_meta(

            $post_id,

            '_wporg_meta_key',

            $_POST['wporg_field']

        );

    }



    // information

	update_post_meta( $post_id, 'email_team_value', wp_kses_post($_POST[ 'email_team_value' ]) );

	update_post_meta( $post_id, 'phone_team_value', wp_kses_post($_POST[ 'phone_team_value' ]) );

	update_post_meta( $post_id, 'location_team_value', wp_kses_post($_POST[ 'location_team_value' ]) );


    // social

	update_post_meta( $post_id, 'facebook_icon_value', wp_kses_post($_POST[ 'facebook_icon_value' ]) );

	update_post_meta( $post_id, 'facebook_team_value', wp_kses_post($_POST[ 'facebook_team_value' ]) );

	update_post_meta( $post_id, 'twitter_icon_value', wp_kses_post($_POST[ 'twitter_icon_value' ]) );

	update_post_meta( $post_id, 'twitter_team_value', wp_kses_post($_POST[ 'twitter_team_value' ]) );

	update_post_meta( $post_id, 'linkedin_icon_value', wp_kses_post($_POST[ 'linkedin_icon_value' ]) );

	update_post_meta( $post_id, 'linkedin_team_value', wp_kses_post($_POST[ 'linkedin_team_value' ]) );

	update_post_meta( $post_id, 'youtube_icon_value', wp_kses_post($_POST[ 'youtube_icon_value' ]) );

	update_post_meta( $post_id, 'youtube_team_value', wp_kses_post($_POST[ 'youtube_team_value' ]) );

    update_post_meta( $post_id, 'custom1_icon_value', wp_kses_post($_POST[ 'custom1_icon_value' ]) );

	update_post_meta( $post_id, 'custom1_team_value', wp_kses_post($_POST[ 'custom1_team_value' ]) );

    update_post_meta( $post_id, 'custom2_icon_value', wp_kses_post($_POST[ 'custom2_icon_value' ]) );

	update_post_meta( $post_id, 'custom2_team_value', wp_kses_post($_POST[ 'custom2_team_value' ]) );


}



add_action( 'save_post', 'social_save_meta_fields' );