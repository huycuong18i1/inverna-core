<?php
class TFCarBanner_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tf-car-banner';
    }
    
    public function get_title() {
        return esc_html__( 'TF Car Banner', 'themesflat-core' );
    }

    public function get_icon() {
        return 'eicon-form-vertical';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

	protected function _register_controls() {
		// Start Car Banner Setting        
			$this->start_controls_section( 'section_setting',
	            [
	                'label' => esc_html__('Setting', 'themesflat-core'),
	            ]
	        );

			$this->add_control( 
	        	'style',
				[
					'label' => esc_html__( 'Layout Style', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'style1',
					'options' => [
						'style1' => esc_html__( 'Style 1', 'themesflat-core' ),
						'style2' => esc_html__( 'Style 2', 'themesflat-core' ),
					],
				]
			);

            $this->add_control(
				'subtitle',
				[
					'label' => esc_html__( 'Sub Title', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXT,					
					'default' => esc_html__( 'Car inventory', 'themesflat-core' ),
					'label_block' => true,
					'condition' => [
						'style' => 'style2'
					],
				]
			);


			$this->add_control(
				'heading',
				[
					'label' => esc_html__( 'Heading', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXT,					
					'default' => esc_html__( 'Search Over 18000+ Used Vehicles', 'themesflat-core' ),
					'label_block' => true,
				]
			);

			$this->add_control( 
	        	'html_tag',
				[
					'label' => esc_html__( 'HTML Tag', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'h3',
					'options' => [
						'h1' => esc_html__( 'H1', 'themesflat-core' ),
						'h2' => esc_html__( 'H2', 'themesflat-core' ),
						'h3' => esc_html__( 'H3', 'themesflat-core' ),
						'h4' => esc_html__( 'H4', 'themesflat-core' ),
						'h5' => esc_html__( 'H5', 'themesflat-core' ),
						'h6' => esc_html__( 'H6', 'themesflat-core' ),
						'span' => esc_html__( 'span', 'themesflat-core' ),
						'p' => esc_html__( 'p', 'themesflat-core' ),
						'div' => esc_html__( 'div', 'themesflat-core' ),
					],
				]
			);

			$this->add_control( 
                'button_text',
                [
                    'label' => esc_html__( 'Button Text', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__( 'View Inventory', 'themesflat-core' ),
                ]
            );	
            
            $this->add_control(
				'link',
				[
					'label' => esc_html__( 'Link', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::URL,
					'placeholder' => esc_html__( 'https://your-link.com', 'themesflat-core' ),
					'default' => [
						'url' => '#',
						'is_external' => false,
						'nofollow' => false,
					],
				]
			);	

			$this->add_control( 
				'heading_image',
				[
					'label' => esc_html__( 'Group Image', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			$this->add_control(
				'image_car',
				[
					'label' => esc_html__( 'Image Car', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME."assets/img/car.png",
					],
				]
			);

			$this->add_control(
				'image_shape_car',
				[
					'label' => esc_html__( 'Shape', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME."assets/img/shape.png",
					],
				]
			);
		
			$this->add_group_control(
				\Elementor\Group_Control_Background::get_type(),
				[
					'name' => 'background_content',
					'types' => [ 'classic' ],
					'selector' => '{{WRAPPER}} .tf-car-banner',
				]
			);
	        
	    $this->end_controls_section();
        // /.End Car Banner Setting  

	}	

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();		

		$image_car =  \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image_car' );
		$image_shape_car =  \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image_shape_car' );
		if ($settings['heading'] != '') {
			$heading = sprintf( '<%1$s class="heading">%2$s</%1$s>',$settings['html_tag'], $settings['heading'] );
		}	
		$this->add_render_attribute( 'tf_car_banner', ['id' => "tf-car-banner-{$this->get_id()}", 'class' => ['tf-car-banner', $settings['style']], 'data-tabid' => $this->get_id() ] );
		
        ?>
        <div <?php echo $this->get_render_attribute_string('tf_car_banner') ?>>
		    <?php if ($settings['subtitle'] != '' && $settings['style'] == 'style2'): ?>
		    	<div class="subtitle">
                    <?php echo esc_html($settings['subtitle']); ?>
                </div>
            <?php endif; ?>   
            <?php echo $heading; ?>
			<?php if ($settings['button_text'] != ''): ?>
            	<a href="<?php echo esc_url( $settings['link']['url'] ) ?>" class="tf-button" >
						<?php echo esc_attr( $settings['button_text'] ); ?> <i class="icon-inverna-right-arrow"></i> 
				</a>
			<?php endif; ?>
			<?php echo sprintf('<div class="group-image">%1$s %2$s</div>', $image_car, $image_shape_car); ?>
	    </div>
        <?php 		
	}

}