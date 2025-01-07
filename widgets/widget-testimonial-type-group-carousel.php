<?php
class TFTestimonialTypeGroupCarousel_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tf-testimonial-carousel-type-group';
    }
    
    public function get_title() {
        return esc_html__( 'TF Testimonial Carousel', 'themesflat-core' );
    }

    public function get_icon() {
        return 'eicon-slider-push';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

    public function get_style_depends() {
		return ['owl-carousel','tf-testimonial'];
	}

	public function get_script_depends() {
		return ['owl-carousel','tf-testimonial'];
	}

	protected function register_controls() {
        // Start Carousel Setting        
			$this->start_controls_section( 
				'section_carousel',
	            [
	                'label' => esc_html__('Testimonial Carousel', 'themesflat-core'),
	            ]
	        );	

			$this->add_control(
				'before_title',
				[
					'label' => esc_html__( 'Before Heading', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'Trusted Car Delaer Service', 'themesflat-core' ),
					'label_block' => true,
				]
			);		

			$this->add_control(
				'heading',
				[
					'label' => esc_html__( 'Heading', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXT,					
					'default' => esc_html__( 'What client’s Says', 'themesflat-core' ),
					'label_block' => true,
				]
			);

			$this->add_control(
				'icon_quote',
				[
					'label' => esc_html__( 'Icon', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'default' => [
						'value' => 'icon-inverna-quote',
						'library' => 'theme_icon',
					],
				]
			);	 

			$this->add_control( 
				'show_thumb',
				[
					'label' => esc_html__( 'Hide Group Images', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'themesflat-core' ),
					'label_off' => esc_html__( 'Hide', 'themesflat-core' ),
					'return_value' => 'yes',
					'default' => 'no',
				]
			);
		

			$repeater = new \Elementor\Repeater();

			$repeater->add_control(
				'avatar',
				[
					'label' => esc_html__( 'Choose Avatar', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME."assets/img/placeholder-2.jpg",
					],
				]
			);

			$repeater->add_control(
				'name',
				[
					'label' => esc_html__( 'Name', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'Leslie Alexander', 'themesflat-core' ),
				]
			);

			$repeater->add_control(
				'position',
				[
					'label' => esc_html__( 'Position', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'ThemeForest Exclusive', 'themesflat-core' ),
				]
			);

			$repeater->add_control(
				'description',
				[
					'label' => esc_html__( 'Description', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::WYSIWYG,
					'rows' => 10,
					'default' => esc_html__( 'The other hand we denounce with righteou indg ation and dislike
                    men who are so beguiled and demorali ed by the of pleasure Events
                    moment.Dislike men who are so beguiled and demoraliz worlds
                    by the charms of pleasure “', 'themesflat-core' ),
				]
			);	

            $repeater->add_control(
				'rating',
				[
					'label' => esc_html__( 'Rating', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => '100',
					'options' => [
						'0'   => esc_html__( '0 stars', 'themesflat-core' ),
						'20'  => esc_html__( '1 star', 'themesflat-core' ),
						'40'  => esc_html__( '2 stars', 'themesflat-core' ),
						'60'  => esc_html__( '3 stars', 'themesflat-core' ),
						'80'  => esc_html__( '4 stars', 'themesflat-core' ),
						'100' => esc_html__( '5 stars', 'themesflat-core' ),
					],
				]
			);

			$repeater->add_control(
				'image',
				[
					'label' => esc_html__( 'Choose Image (Only Style 1)', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME."assets/img/testimonial-type-2.jpg",
					],
				]
			);		

			$this->add_control( 
				'carousel_list',
				[					
					'type' => \Elementor\Controls_Manager::REPEATER,
					'fields' => $repeater->get_controls(),
					'default' => [
						[ 
							'name' => 'Teodoro D. Williams',
							'position' => 'Web Developer',
							'description'=> 'Consectetur adipiscing elit sed do eius mod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ul trices gravida. Risus commodo viverra maecenas accumsan lacus facilisis.',
						],
						[ 
							'name' => 'Donald C. Mitchell',
							'position' => 'Web Developer',
							'description'=> 'Consectetur adipiscing elit sed do eius mod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ul trices gravida. Risus commodo viverra maecenas accumsan lacus facilisis.',
						],
						[ 
							'name' => 'Teodoro D. Williams',
							'position' => 'Web Developer',
							'description'=> 'Consectetur adipiscing elit sed do eius mod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ul trices gravida. Risus commodo viverra maecenas accumsan lacus facilisis.',
						],
						[ 
							'name' => 'Donald C. Mitchell',
							'position' => 'Web Developer',
							'description'=> 'Consectetur adipiscing elit sed do eius mod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ul trices gravida. Risus commodo viverra maecenas accumsan lacus facilisis.',
						],
					],					
				]
			);

			$this->add_control(
				'h_image_size_avatar',
				[
					'label' => esc_html__( 'Image Size Avatar', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Image_Size::get_type(),
				[
					'name' => 'thumbnail_avatar',
					'default' => 'thumbnail',
				]
			);
			$this->add_control(
				'h_image_size_Image',
				[
					'label' => esc_html__( 'Image Size Image', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
					'condition' => [
						'testimonial_style' => 'style-1',
					],
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Image_Size::get_type(),
				[
					'name' => 'thumbnail_image',
					'default' => 'full',
					'condition' => [
						'testimonial_style' => 'style-1',
					],
				]
			);
			
			$this->end_controls_section();
        // /.End Carousel	

        // Start Style        
			$this->start_controls_section( 
				'section_style',
	            [
	                'label' => esc_html__('Style', 'themesflat-core'),
	            ]
	        );	

	        $this->add_control(
				'h_general',
				[
					'label' => esc_html__( 'General', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
				]
			);

			$this->add_control(
				'h_before_heading',
				[
					'label' => esc_html__( 'Before Heading', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			$this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'typography_before_title',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-testimonial-carousel-type-group .before-title',
				]
			);
			$this->add_control( 
				'color_before_title',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel-type-group .before-title' => 'color: {{VALUE}}',					
					],
				]
			);

			$this->add_control(
				'h_heading',
				[
					'label' => esc_html__( 'Heading', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			$this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'typography_heading',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-testimonial-carousel-type-group .heading',
				]
			); 
			$this->add_control( 
				'color_heading',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel-type-group .heading' => 'color: {{VALUE}}',					
					],
				]
			);

	        $this->add_control(
				'h_icon',
				[
					'label' => esc_html__( 'Icon', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			$this->add_control(
				'icon_fontsize',
				[
					'label' => esc_html__( 'Font Size', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 1000,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel-type-group .icon-quote i' => 'font-size: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .tf-testimonial-carousel-type-group .icon-quote svg' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);
			$this->add_control(
				'icon_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel-type-group .icon-quote' => 'color: {{VALUE}}',
						'{{WRAPPER}} .tf-testimonial-carousel-type-group .icon-quote svg' => 'fill: {{VALUE}}',
					],
				]
			);

	        $this->add_control(
				'h_name',
				[
					'label' => esc_html__( 'Name', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'name_typography',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-testimonial-carousel-type-group .name',
				]
			);
			$this->add_control(
				'name_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel-type-group .name' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'h_position',
				[
					'label' => esc_html__( 'Position', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'position_typography',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-testimonial-carousel-type-group .position',
				]
			);
			$this->add_control(
				'position_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel-type-group .position' => 'color: {{VALUE}}',
					],
				]
			);


			$this->add_control(
				'h_description',
				[
					'label' => esc_html__( 'Description', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'description_typography',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-testimonial-carousel-type-group .description',
				]
			);
			$this->add_control(
				'description_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel-type-group .description' => 'color: {{VALUE}}',
					],
				]
			);

	        $this->end_controls_section();
        // /.End Style

        // Start Arrow        
			$this->start_controls_section( 
				'section_arrow',
	            [
	                'label' => esc_html__('Arrow', 'themesflat-core'),
	            ]
	        );

	        $this->add_control( 
				'carousel_arrow',
				[
					'label' => esc_html__( 'Arrow', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'themesflat-core' ),
					'label_off' => esc_html__( 'Hide', 'themesflat-core' ),
					'return_value' => 'yes',
					'default' => 'yes',				
					'description'	=> 'Just show when you have two slide',
					'separator' => 'before',
				]
			);

	        $this->add_control( 
				'carousel_prev_icon', [
	                'label' => esc_html__( 'Prev Icon', 'themesflat-core' ),
	                'type' => \Elementor\Controls_Manager::ICON,
                    'default' => 'icon-inverna-arrow-left',
	                'include' => [
						'fa fa-angle-double-left',
						'fa fa-angle-left',
						'fa fa-chevron-left',
						'fa fa-arrow-left',
						'icon-inverna-arrow-left',
					],   
	                'condition' => [                	
	                    'carousel_arrow' => 'yes',
	                ]
	            ]
	        );

	    	$this->add_control( 
	    		'carousel_next_icon', [
	                'label' => esc_html__( 'Next Icon', 'themesflat-core' ),
	                'type' => \Elementor\Controls_Manager::ICON,
	                'default' => 'icon-inverna-arrow-right',
	                'include' => [
						'fa fa-angle-double-right',
						'fa fa-angle-right',
						'fa fa-chevron-right',
						'fa fa-arrow-right',
						'icon-inverna-arrow-right',
					], 
	                'condition' => [                	
	                    'carousel_arrow' => 'yes',
	                ]
	            ]
	        );

	        $this->end_controls_section();
        // /.End Arrow
	}

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();
		
		$carousel_arrow = 'no-arrow';
		if ( $settings['carousel_arrow'] == 'yes' ) {
			$carousel_arrow = 'has-arrow';
		}

		$show_thumb = 'has-thumb';
		if ( $settings['show_thumb'] == 'yes' ) {
			$show_thumb = 'hide-thumb';
		}
		
		$icon_quote = \Elementor\Addon_Elementor_Icon_manager_inverna::render_icon( $settings['icon_quote'], [ 'aria-hidden' => 'true' ] );

		?>
		<div class="tf-testimonial-carousel-type-group style-1 <?php echo esc_attr($show_thumb); ?> <?php echo esc_attr($carousel_arrow); ?>" data-loop="true" data-auto="false" data-spacer="30" data-prev_icon="<?php echo esc_attr($settings['carousel_prev_icon']) ?>" data-next_icon="<?php echo esc_attr($settings['carousel_next_icon']) ?>" data-arrow="<?php echo esc_attr($settings['carousel_arrow']) ?>">
				<div class="wrap-testimonial">
                	<div class="owl-carousel owl-theme thumbs tes-thumbs">
						<?php foreach ($settings['carousel_list'] as $carousel): ?>
					    <div class="image-thumbs">
                            <?php if ($icon_quote): ?>
						    	<div class="icon-quote"><?php echo sprintf($icon_quote); ?></div>
						    <?php endif; ?>	
					    	<?php if ($carousel['image']['id']): ?>
								<img src="<?php echo esc_url(\Elementor\Group_Control_Image_Size::get_attachment_image_src( $carousel['image']['id'], 'thumbnail_image', $settings )); ?>" alt="image">
							<?php else: ?>
								<img src="<?php echo esc_attr($carousel['image']['url']); ?>" alt="image">
							<?php endif ?>
                            <div class="rating">
								<span class="testimonial-star-rating"><span style="width:<?php echo esc_attr($carousel['rating']); ?>%"></span></span>
							</div>
					    </div>
					    <?php endforeach;?>
					</div>

					<div class="inner-testimonial">
						<div class="bg-overlay"></div>
						<div class="wrap-heading">
							<?php if ($settings['before_title']): ?>
								<div class="before-title"><?php echo esc_attr($settings['before_title']); ?></div>
							<?php endif; ?>

							<?php if ($settings['heading']): ?>
								<div class="heading"><?php echo esc_attr($settings['heading']); ?></div>
							<?php endif; ?>
						</div>
								
						<div class="owl-carousel owl-theme testimonial">
							<?php foreach ($settings['carousel_list'] as $carousel): ?>			
							<div class="item">
								<div class="item-testimonial">
									<div class="description"><?php echo sprintf( '%1$s', $carousel['description'] ); ?></div>
									<div class="wrap-avatar">
										<div class="avatar">
											<?php if ($carousel['avatar']['id']): ?>
												<img src="<?php echo esc_url(\Elementor\Group_Control_Image_Size::get_attachment_image_src( $carousel['avatar']['id'], 'thumbnail_avatar', $settings )); ?>" alt="avatar">
											<?php else: ?>
												<img src="<?php echo esc_attr($carousel['avatar']['url']); ?>" alt="avatar">
											<?php endif ?>										
										</div>
										<div class="info">
											<div class="name"><?php echo esc_attr($carousel['name']); ?></div>
											<div class="position"><?php echo esc_attr($carousel['position']); ?></div>
										</div>
									</div>
								</div>			
							</div>				
							<?php endforeach;?>
						</div>
					</div>
							
				</div>
		</div>
		<?php	
	}

}