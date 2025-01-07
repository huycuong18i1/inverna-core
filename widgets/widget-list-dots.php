<?php
class TFListDots_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tf-list-dots';
    }
    
    public function get_title() {
        return esc_html__( 'TF Hotspot', 'themesflat-core' );
    }

    public function get_icon() {
        return 'eicon-bullet-list';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

    public function get_style_depends() {
		return ['tf-list-dots'];
	}

	public function get_script_depends() {
		return ['tf-list-dots'];
	}

	protected function register_controls() {
		// Start List Setting        
			$this->start_controls_section( 'section_setting',
	            [
	                'label' => esc_html__('Setting', 'themesflat-core'),
	            ]
	        );
			$this->add_control(
				'image',
				[
					'label' => esc_html__( 'Choose Image', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME."assets/img/placeholder.jpg",
					],
				]
			);
			

			$this->add_group_control(
				\Elementor\Group_Control_Image_Size::get_type(),
				[
					'name' => 'thumbnail',
					'include' => [],
					'default' => 'full',
				]
			);

			$repeater = new \Elementor\Repeater();

			$repeater->add_control(
				'link',
				[
					'label' => esc_html__( 'Link Product', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( '#', 'themesflat-core' ),
					'label_block' => true,
				]
			);

			$repeater->add_control(
				'active',
				[
					'label' => esc_html__( 'Set Active', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Yes', 'themesflat-core' ),
					'label_off' => esc_html__( 'No', 'themesflat-core' ),
					'return_value' => 'active',
					'default' => 'inactive',
				]
			);

	        $repeater->add_control(
				'title',
				[
					'label' => esc_html__( 'Name', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'Car Suspension Disc', 'themesflat-core' ),
					'label_block' => true,
				]
			);

			$repeater->add_control(
				'description',
				[
					'label' => esc_html__( 'Description', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'Lorem ipsum dolor sit amet
					ectetur adipisicing elit', 'themesflat-core' ),
					'label_block' => true,
				]
			);

			$repeater->add_control(
				'price',
				[
					'label' => esc_html__( 'Price', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( '$98.00', 'themesflat-core' ),
					'label_block' => true,
				]
			);

			$repeater->add_control(
                'position',
                [
                    'label' => esc_html__( 'Position', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'right',
                    'options' => [
                        'left'  => esc_html__( 'Left', 'themesflat-core' ),
                        'right' => esc_html__( 'Right', 'themesflat-core' ),
                    ],
                ]
            );

			$repeater->add_control(
				'position_x',
				[
					'label' => esc_html__( 'Left', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ '%' ],
					'range' => [
						'%' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
						],
					],
					'default' => [
						'unit' => '%'
					],
					'selectors' => [
						'{{WRAPPER}} {{CURRENT_ITEM}}' => 'left: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$repeater->add_control(
				'position_y',
				[
					'label' => esc_html__( 'Top', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ '%' ],
					'range' => [
						'%' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
						],
					],
					'default' => [
						'unit' => '%'
					],
					'selectors' => [
						'{{WRAPPER}} {{CURRENT_ITEM}}' => 'top: {{SIZE}}{{UNIT}};',
					],
				]
			);


			$this->add_control(
				'list',
				[
					'label' => esc_html__( 'List', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::REPEATER,
					'fields' => $repeater->get_controls(),
					'default' => [
						[
							'title' => esc_html__( 'Car Suspension Disc', 'themesflat-core' ),
							'description' => esc_html__( 'Lorem ipsum dolor sit amet
							ectetur adipisicing elit', 'themesflat-core' ),
							'price' => esc_html__( '$98.00', 'themesflat-core' ),
						],
						[
							'title' => esc_html__( 'Car Suspension Disc', 'themesflat-core' ),
							'description' => esc_html__( 'Lorem ipsum dolor sit amet
							ectetur adipisicing elit', 'themesflat-core' ),
							'price' => esc_html__( '$98.00', 'themesflat-core' ),
						],
						[
							'title' => esc_html__( 'Car Suspension Disc', 'themesflat-core' ),
							'description' => esc_html__( 'Lorem ipsum dolor sit amet
							ectetur adipisicing elit', 'themesflat-core' ),
							'price' => esc_html__( '$98.00', 'themesflat-core' ),
						],
	
					],
					'title_field' => '{{{ title }}}',
				]
			);

	        
			$this->end_controls_section();
        // /.End List Setting              

	    // Start Style
	        $this->start_controls_section( 'section_style',
	            [
	                'label' => esc_html__( 'Style', 'themesflat-core' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );

	        $this->add_control(
				'h_name',
				[
					'label' => esc_html__( 'Title', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
				]
			);

			$this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'typography_name',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .item-dot .inner .title',
				]
			); 

			$this->add_control( 
				'color_name',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					
					'selectors' => [
						'{{WRAPPER}} .item-dot .inner .title' => 'color: {{VALUE}}',					
					],
				]
			);

			$this->add_control(
				'h_description',
				[
					'label' => esc_html__( 'Description', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
				]
			);

			$this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'typography_description',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .item-dot .inner .description ',
				]
			); 

			$this->add_control( 
				'color_description',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					
					'selectors' => [
						'{{WRAPPER}} .item-dot .inner .description ' => 'color: {{VALUE}}',					
					],
				]
			);

			$this->add_control(
				'h_price',
				[
					'label' => esc_html__( 'Price', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
				]
			);

			$this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'typography_price',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .item-dot .inner .price span ',
				]
			); 

			$this->add_control( 
				'color_price',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					
					'selectors' => [
						'{{WRAPPER}} .item-dot .inner .price span ' => 'color: {{VALUE}}',					
					],
				]
			);

			$this->add_control(
				'h_dot',
				[
					'label' => esc_html__( 'Dot', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
				]
			);
			$this->add_control( 
				'color_dot',
				[
					'label' => esc_html__( 'Backgroud Color Dot', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					
					'selectors' => [
						'{{WRAPPER}} .item-dot' => 'background: {{VALUE}}',					
					],
				]
			);

			$this->add_control( 
				'color_dot3',
				[
					'label' => esc_html__( 'Backgroud Color Dot Active', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					
					'selectors' => [
						'{{WRAPPER}} .item-dot.active' => 'background: {{VALUE}}',					
					],
				]
			);

			$this->add_control(
				'h_content',
				[
					'label' => esc_html__( 'Content', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
				]
			);
			$this->add_control( 
				'bg_content',
				[
					'label' => esc_html__( 'Backgroud Content', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					
					'selectors' => [
						'{{WRAPPER}} .item-dot .inner, {{WRAPPER}} .item-dot .inner::after' => 'background: {{VALUE}}',					
					],
				]
			);
			


			
			        
        	$this->end_controls_section();    
	    // /.End Style 
	}

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'tf_list-dots', ['id' => "tf-list-dots-{$this->get_id()}", 'class' => ['tf-list-dots'], 'data-tabid' => $this->get_id()] );	
			
		?>
		<div <?php echo $this->get_render_attribute_string('tf_list-dots') ?>>
			<?php
			if ($settings['image'] != '') {
					$url = esc_attr($settings['image']['url']);
					echo sprintf( '<div class="image"><img src="%1s" alt="image"></div>',$url);
			}
			?>
			<?php foreach ( $settings['list'] as $dot ): 
			?>
			<div class="elementor-repeater-item-<?php echo esc_attr($dot['_id']); ?> item-dot <?php echo esc_attr($dot['active']); ?> <?php echo esc_attr($dot['position']); ?>">
				<a href="<?php echo esc_attr($dot['link']); ?>">
					<div class="inner">
						<div class="group-title">
							<?php if ($dot['title'] != ''): ?>
								<div class="title">
									<?php echo esc_attr($dot['title']); ?>
								</div>
							<?php endif; ?> 
							<?php if ($dot['price'] != ''): ?>
								<div class="price"><?php echo esc_attr($dot['price']); ?></div>
							<?php endif; ?>
						</div>
					<?php if ($dot['description'] != ''): ?>
						<div class="description"><p><?php echo esc_attr($dot['description']); ?></p></div>
					<?php endif; ?> 
					</div>
				</a>
			</div>
			
			<?php endforeach; ?>
	    </div>
	<?php	
	}

}