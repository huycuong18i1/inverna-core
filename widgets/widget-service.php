<?php

class TFServices_Widget extends \Elementor\Widget_Base {



	public function get_name() {

        return 'tf-service';

    }

    

    public function get_title() {

        return esc_html__( 'TF Service', 'themesflat-core' );

    }



    public function get_icon() {

        return 'eicon-posts-grid';

    }

    

    public function get_categories() {

        return [ 'themesflat_addons' ];

    }



	public function get_style_depends(){

		return ['owl-carousel'];

	}



	public function get_script_depends() {

		return ['owl-carousel','tf-service'];

	}



	protected function register_controls() {

        // Start Posts Query        

			$this->start_controls_section( 

				'section_posts_query',

	            [

	                'label' => esc_html__('Query', 'themesflat-core'),

	            ]

	        );



	        $this->add_control( 

					'posts_per_page',

		            [

		                'label' => esc_html__( 'Posts Per Page', 'themesflat-core' ),

		                'type' => \Elementor\Controls_Manager::NUMBER,

		                'default' => '4',

		            ]

		        );



		        $this->add_control( 

		        	'order_by',

					[

						'label' => esc_html__( 'Order By', 'themesflat-core' ),

						'type' => \Elementor\Controls_Manager::SELECT,

						'default' => 'date',

						'options' => [						

				            'date' => 'Date',

				            'ID' => 'Post ID',			            

				            'title' => 'Title',

						],

					]

				);



				$this->add_control( 

					'order',

					[

						'label' => esc_html__( 'Order', 'themesflat-core' ),

						'type' => \Elementor\Controls_Manager::SELECT,

						'default' => 'desc',

						'options' => [						

				            'desc' => 'Descending',

				            'asc' => 'Ascending',	

						],

					]

				);



				$this->add_control( 

					'posts_categories',

					[

						'label' => esc_html__( 'Categories', 'themesflat-core' ),

						'type' => \Elementor\Controls_Manager::SELECT2,

						'options' => ThemesFlat_Addon_For_Elementor_inverna::tf_get_taxonomies('services_category'),

						'label_block' => true,

		                'multiple' => true,

					]

				);



				$this->add_control( 

					'exclude',

					[

						'label' => esc_html__( 'Exclude', 'themesflat-core' ),

						'type'	=> \Elementor\Controls_Manager::TEXT,	

						'description' => esc_html__( 'Post Ids Will Be Inorged. Ex: 1,2,3', 'themesflat-core' ),

						'default' => '',

						'label_block' => true,				

					]

				);



				$this->add_control( 

					'sort_by_id',

					[

						'label' => esc_html__( 'Sort By ID', 'themesflat-core' ),

						'type'	=> \Elementor\Controls_Manager::TEXT,	

						'description' => esc_html__( 'Post Ids Will Be Sort. Ex: 1,2,3', 'themesflat-core' ),

						'default' => '',

						'label_block' => true,				

					]

				);



				$this->add_group_control( 

					\Elementor\Group_Control_Image_Size::get_type(),

					[

						'name' => 'thumbnail',

						'default' => 'full',

					]

				);



				$this->add_control( 

		        	'layout',

					[

						'label' => esc_html__( 'Columns', 'themesflat-core' ),

						'type' => \Elementor\Controls_Manager::SELECT,

						'default' => 'column-4',

						'options' => [

							'column-1' => esc_html__( '1', 'themesflat-core' ),

							'column-2' => esc_html__( '2', 'themesflat-core' ),

							'column-3' => esc_html__( '3', 'themesflat-core' ),

							'column-4' => esc_html__( '4', 'themesflat-core' ),

							'column-5' => esc_html__( '5', 'themesflat-core' ),

						],

					]

				);	



				$this->add_control( 

		        	'style',

					[

						'label' => esc_html__( 'Styles', 'themesflat-core' ),

						'type' => \Elementor\Controls_Manager::SELECT,

						'default' => 'style1',

						'options' => [

							'style1' => esc_html__( 'Style 1', 'themesflat-core' ),

							'style2' => esc_html__( 'Style 2', 'themesflat-core' ),

							'style3' => esc_html__( 'Style 3', 'themesflat-core' ),

							'style4' => esc_html__( 'Style 4', 'themesflat-core' ),

							'style5' => esc_html__( 'Style 5', 'themesflat-core' ),

						],

					]

				);



				$this->add_control( 

					'show_exc',

					[

						'label' => esc_html__( 'Show Description', 'themesflat-core' ),

						'type' => \Elementor\Controls_Manager::SWITCHER,

						'label_on' => esc_html__( 'Show', 'themesflat-core' ),

						'label_off' => esc_html__( 'Hide', 'themesflat-core' ),

						'return_value' => 'yes',

						'default' => 'yes',

					]

				);

				

				$this->add_control( 

					'excerpt_lenght',

					[

						'label' => esc_html__( 'Excerpt Length', 'inverna' ),

						'type' => \Elementor\Controls_Manager::NUMBER,

						'min' => 0,

						'max' => 500,

						'step' => 1,

						'default' => 15,

						'condition' => [

							'show_exc'	=> 'yes',

						],

					]

				);




				$this->add_control( 

					'show_button',

					[

						'label' => esc_html__( 'Show Button', 'themesflat-core' ),

						'type' => \Elementor\Controls_Manager::SWITCHER,

						'label_on' => esc_html__( 'Show', 'themesflat-core' ),

						'label_off' => esc_html__( 'Hide', 'themesflat-core' ),

						'return_value' => 'yes',

						'default' => 'yes',

					]

				);



				$this->add_control( 

					'button_text',

					[

						'label' => esc_html__( 'Button Text', 'themesflat-core' ),

						'type' => \Elementor\Controls_Manager::TEXT,

						'default' => esc_html__( 'Explore More', 'themesflat-core' ),

						'condition' => [

							'show_button'	=> 'yes',

						],

					]

				);	

				$this->add_control(
					'post_icon_readmore',
					[
						'label' => esc_html__( 'Button Icon', 'inverna' ),
						'type' => \Elementor\Controls_Manager::ICONS,
						'default' => [
							'value' => 'icon-inverna-arrow-up-right',
							'library' => 'theme_icon',
						],
					]
				);




			$this->end_controls_section();

        // /.End Posts Query

// Start Carousel        

$this->start_controls_section( 

	'section_posts_carousel',

	[

		'label' => esc_html__('Carousel', 'themesflat-core'),
		

	]

);	



$this->add_control( 

	'carousel',

	[

		'label' => esc_html__( 'Carousel', 'themesflat-core' ),

		'type' => \Elementor\Controls_Manager::SWITCHER,

		'label_on' => esc_html__( 'On', 'themesflat-core' ),

		'label_off' => esc_html__( 'Off', 'themesflat-core' ),

		'return_value' => 'yes',

		'default' => 'no',

	]

);

$this->add_control( 

	'carousel_column_desk',

	[

		'label' => esc_html__( 'Columns Desktop', 'themesflat-core' ),

		'type' => \Elementor\Controls_Manager::SELECT,

		'default' => '3',

		'options' => [

			'1' => esc_html__( '1', 'themesflat-core' ),

			'2' => esc_html__( '2', 'themesflat-core' ),

			'3' => esc_html__( '3', 'themesflat-core' ),

			'4' => esc_html__( '4', 'themesflat-core' ),

			'5' => esc_html__( '5', 'themesflat-core' ),

			'6' => esc_html__( '6', 'themesflat-core' ),

		],

		'condition' => [

			'carousel' => 'yes',

		],

	]

);



$this->add_control( 

	'carousel_column_tablet',

	[

		'label' => esc_html__( 'Columns Tablet', 'themesflat-core' ),

		'type' => \Elementor\Controls_Manager::SELECT,

		'default' => '1',

		'options' => [

			'1' => esc_html__( '1', 'themesflat-core' ),

			'2' => esc_html__( '2', 'themesflat-core' ),

			'3' => esc_html__( '3', 'themesflat-core' ),

		],

		'condition' => [

			'carousel' => 'yes',

		],

	]

);



$this->add_control( 

	'carousel_column_mobile',

	[

		'label' => esc_html__( 'Columns Mobile', 'themesflat-core' ),

		'type' => \Elementor\Controls_Manager::SELECT,

		'default' => '1',

		'options' => [

			'1' => esc_html__( '1', 'themesflat-core' ),

			'2' => esc_html__( '2', 'themesflat-core' ),

		],

		'condition' => [

			'carousel' => 'yes',

		],

	]

);	

$this->add_control(

	'carousel_spacer',

	[

		'label' => esc_html__( 'Spacer', 'themesflat-core' ),

		'type' => \Elementor\Controls_Manager::NUMBER,

		'min' => 0,

		'max' => 100,

		'step' => 1,

		'default' => 30,				

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

		'default' => 'no',

		'condition' => [

			'carousel' => 'yes',

		],

		'description'	=> 'Just show when you have two slide',

		'separator' => 'before',

	]

);


$this->add_control( 

	'carousel_bullets',

	[

		'label'         => esc_html__( 'Bullets', 'themesflat-core' ),

		'type'          => \Elementor\Controls_Manager::SWITCHER,

		'label_on'      => esc_html__( 'Show', 'themesflat-core' ),

		'label_off'     => esc_html__( 'Hide', 'themesflat-core' ),

		'return_value'  => 'yes',

		'default'       => 'no',

		'condition' => [

			'carousel' => 'yes',

		],

		'separator' => 'before',

	]

);	

$this->end_controls_section();

// /.End Carousel


		// Start General Style 

			$this->start_controls_section( 

				'section_style_general',

				[

					'label' => esc_html__( 'General', 'themesflat-core' ),

					'tab' => \Elementor\Controls_Manager::TAB_STYLE,

				]

			);



			$this->add_responsive_control( 

				'padding',

				[

					'label' => esc_html__( 'Padding Spacing', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::DIMENSIONS,

					'default' => [

						'top' => '15',

						'right' => '15',

						'bottom' => '15',

						'left' => '15',

						'unit' => 'px',

						'isLinked' => true,

					],

					'selectors' => [

						'{{WRAPPER}} .wrap-services-post .item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],		

				]

			);	



			$this->add_responsive_control( 

				'margin',

				[

					'label' => esc_html__( 'Margin Spacing', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::DIMENSIONS,

					'allowed_dimensions' => [ 'right', 'left' ],

					'default' => [

						'right' => '',

						'left' => '',

						'unit' => 'px',

						'isLinked' => true,

					],

					'selectors' => [

						'{{WRAPPER}} .wrap-services-post .item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],

				]

			);  



			$this->add_responsive_control( 

				'padding_inner',

				[

					'label' => esc_html__( 'Padding Inner', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::DIMENSIONS,

					'selectors' => [

						'{{WRAPPER}} .wrap-services-post .item .services-post' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],					

				]

			);	



			$this->add_responsive_control( 

				'margin_inner',

				[

					'label' => esc_html__( 'Margin Inner', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::DIMENSIONS,

					'selectors' => [

						'{{WRAPPER}} .wrap-services-post .item .services-post' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],

				]

			);
			$this->add_control( 

				'inner_background_color',
	
				[
	
					'label' => esc_html__( 'Background Color', 'themesflat-core' ),
	
					'type' => \Elementor\Controls_Manager::COLOR,
	
	
					'selectors' => [
	
						'{{WRAPPER}} .tf-services-wrap .services-post' => 'background: {{VALUE}}',
	
					],
	
				]
	
			); 

			$this->add_responsive_control( 

				'content_border_radius_over',
	
				[
	
					'label' => esc_html__( 'Border Radius', 'themesflat-core' ),
	
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
	
					'size_units' => [ 'px' , '%' ],
	
					'selectors' => [
	
						'{{WRAPPER}} .tf-services-wrap .services-post' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	
					],
	
				]
	
			); 


			$this->end_controls_section();    

		// /.End General Style



		// Start Content Style 

		$this->start_controls_section( 

			'section_style_content',

			[

				'label' => esc_html__( 'Content', 'themesflat-core' ),

				'tab' => \Elementor\Controls_Manager::TAB_STYLE,

			]

		);

		$this->add_control( 

			'content_background_color',

			[

				'label' => esc_html__( 'Background Color', 'themesflat-core' ),

				'type' => \Elementor\Controls_Manager::COLOR,


				'selectors' => [

					'{{WRAPPER}} .tf-services-wrap .content' => 'background: {{VALUE}}',

				],

			]

		); 

		$this->add_group_control( 

			\Elementor\Group_Control_Border::get_type(),

			[

				'name' => 'content_border',

				'label' => esc_html__( 'Border', 'themesflat-core' ),

				'selector' => '{{WRAPPER}} .tf-services-wrap .content',

			]

		);



		$this->add_responsive_control( 

			'content_border_radius_tf',

			[

				'label' => esc_html__( 'Border Radius', 'themesflat-core' ),

				'type' => \Elementor\Controls_Manager::DIMENSIONS,

				'size_units' => [ 'px' , '%' ],

				'selectors' => [

					'{{WRAPPER}} .tf-services-wrap .content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

				],

			]

		); 


		$this->add_responsive_control( 

			'padding_content',

			[

				'label' => esc_html__( 'Padding', 'themesflat-core' ),

				'type' => \Elementor\Controls_Manager::DIMENSIONS,

				'selectors' => [

					'{{WRAPPER}} .wrap-services-post .content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

				],					

			]

		);	



		$this->add_responsive_control( 

			'margin_content',

			[

				'label' => esc_html__( 'Margin', 'themesflat-core' ),

				'type' => \Elementor\Controls_Manager::DIMENSIONS,

				'selectors' => [

					'{{WRAPPER}} .wrap-services-post .content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

				],

			]

		);  



		$this->end_controls_section(); 

		$this->start_controls_section( 

			'section_style_image',

			[

				'label' => esc_html__( 'Image', 'themesflat-core' ),

				'tab' => \Elementor\Controls_Manager::TAB_STYLE,

			]

		);

		$this->add_control(
            'image_height',
            [
                'label' => esc_html__( 'Size Image', 'themesflat-core' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em' ], 
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 10,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .tf-services-wrap .featured-post img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

		$this->add_responsive_control( 

			'image_border_radius_tf',

			[

				'label' => esc_html__( 'Border Radius', 'themesflat-core' ),

				'type' => \Elementor\Controls_Manager::DIMENSIONS,

				'size_units' => [ 'px' , '%' ],

				'selectors' => [

					'{{WRAPPER}} .tf-services-wrap .featured-post img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .tf-services-wrap .featured-post a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .tf-services-wrap.style2 .featured-post' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .tf-services-wrap.style3 .featured-post' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

				],

			]

		); 


		$this->end_controls_section(); 


				$this->start_controls_section( 

					'section_style_icon',
	
					[
	
						'label' => esc_html__( 'Icon', 'themesflat-core' ),
	
						'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	
					]
	
				);

				$this->add_control( 

					'icon_size',
	
					[
	
						'label' => esc_html__( 'Size', 'themesflat-core' ),
	
						'type' => \Elementor\Controls_Manager::SLIDER,
	
						'size_units' => [ 'px' ],
	
						'range' => [
	
							'px' => [
	
								'min' => 0,
	
								'max' => 300,
	
								'step' => 1,
	
							],
	
						],
	
						'selectors' => [
	
							'{{WRAPPER}} .tf-services-wrap .icon svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
							'{{WRAPPER}} .tf-services-wrap .icon' => 'font-size: {{SIZE}}{{UNIT}};',
	
						],
	
					]
	
				);

				$this->add_control(
					'icon_color',
					[
						'label' => esc_html__( 'Color', 'themesflat-core' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .tf-services-wrap .icon' => 'color: {{VALUE}}',
							'{{WRAPPER}} .tf-services-wrap .icon svg *' => 'fill: {{VALUE}}',
						],
					]
				);
				
		$this->end_controls_section(); 



		// Start Title Style 

			$this->start_controls_section( 

				'section_style_title',

				[

					'label' => esc_html__( 'Title', 'themesflat-core' ),

					'tab' => \Elementor\Controls_Manager::TAB_STYLE,

				]

			);



			$this->add_group_control( 

	        	\Elementor\Group_Control_Typography::get_type(),

				[

					'name' => 'typography',

					'label' => esc_html__( 'Typography', 'themesflat-core' ),

					'selector' => '{{WRAPPER}} .wrap-services-post .services-post .title ',

				]

			); 



			$this->add_responsive_control( 

				'margin_title',

				[

					'label' => esc_html__( 'Margin', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::DIMENSIONS,

					'selectors' => [

						'{{WRAPPER}} .wrap-services-post .services-post .title ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],

				]

			);  	



			$this->start_controls_tabs( 

				'background_title_tabs',

				);

				$this->start_controls_tab( 

					'title_style_normal_tab',

					[

						'label' => esc_html__( 'Normal', 'themesflat-core' ),

					] ); 

					$this->add_control( 

						'title_color',

						[

							'label' => esc_html__( 'Color', 'themesflat-core' ),

							'type' => \Elementor\Controls_Manager::COLOR,

							'default' => '',

							'selectors' => [

								'{{WRAPPER}} .wrap-services-post .services-post .title a' => 'color: {{VALUE}}',

							],

							

							

						]

					);  



				$this->end_controls_tab();



				$this->start_controls_tab( 

					'title_style_hover_tab',

					[

						'label' => esc_html__( 'Hover', 'themesflat-core' ),

					] );



					$this->add_control( 

						'title_color_hover',

						[

							'label' => esc_html__( 'Color Hover', 'themesflat-core' ),

							'type' => \Elementor\Controls_Manager::COLOR,

							'default' => '',

							'selectors' => [

								'{{WRAPPER}} .wrap-services-post  .services-post  .title a:hover' => 'color: {{VALUE}}',

							],

						]

					);   



					

				$this->end_controls_tab();

			$this->end_controls_tabs(); 

			

			$this->end_controls_section();    

		// /.End Title Style



		// Start Description Style 

			$this->start_controls_section( 

				'section_style_desc',

				[

					'label' => esc_html__( 'Description', 'themesflat-core' ),

					'tab' => \Elementor\Controls_Manager::TAB_STYLE,

				]

			);	



			$this->add_group_control( 

	        	\Elementor\Group_Control_Typography::get_type(),

				[

					'name' => 'typography_desc',

					'label' => esc_html__( 'Typography', 'themesflat-core' ),

					'selector' => '{{WRAPPER}} .wrap-services-post  .services-post .description',

				]

			);



			$this->add_control( 

				'desc_color',

				[

					'label' => esc_html__( 'Color', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'default' => '',

					'selectors' => [

						'{{WRAPPER}} .wrap-services-post  .services-post .description' => 'color: {{VALUE}}',

					],

					

				]

			); 



			$this->add_responsive_control( 

				'margin_desc',

				[

					'label' => esc_html__( 'Margin', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::DIMENSIONS,

					'selectors' => [

						'{{WRAPPER}} .wrap-services-post  .services-post .description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],

				]

			);  



		

			

			$this->end_controls_section();    

		// /.End Description Style



		// Start Button Style 

			$this->start_controls_section( 

				'section_style_btn',

				[

					'label' => esc_html__( 'Button', 'themesflat-core' ),

					'tab' => \Elementor\Controls_Manager::TAB_STYLE,

				]

			);	



			$this->add_group_control( 

	        	\Elementor\Group_Control_Typography::get_type(),

				[

					'name' => 'typography_button',

					'label' => esc_html__( 'Typography', 'themesflat-core' ),

					'selector' => '{{WRAPPER}} .wrap-services-post .services-post .tf-button-container a,{{WRAPPER}} .wrap-services-post .services-post .tf-button-container a i, {{WRAPPER}} .wrap-services-post .services-post .tf-button-container a .read ',

				]

			);



			$this->start_controls_tabs( 

				'background_button_tabs',

				);

				$this->start_controls_tab( 

					'button_style_normal_tab',

					[

						'label' => esc_html__( 'Normal', 'themesflat-core' ),

					] ); 

					$this->add_control( 

						'button_color_a',

						[

							'label' => esc_html__( 'Color', 'themesflat-core' ),

							'type' => \Elementor\Controls_Manager::COLOR,

							'default' => '',

							'selectors' => [

								'{{WRAPPER}} .wrap-services-post .services-post .tf-button-container a , {{WRAPPER}} .wrap-services-post .services-post .tf-button-container a i, {{WRAPPER}} .tf-services-wrap.style3 .tf-button .read' => 'color: {{VALUE}}',

							],

							

						]

					);  

					$this->add_control( 

						'button_bgcolor_a',

						[

							'label' => esc_html__( 'Background', 'themesflat-core' ),

							'type' => \Elementor\Controls_Manager::COLOR,

							'default' => '',

							'selectors' => [

								'{{WRAPPER}} .wrap-services-post .services-post .tf-button-container a' => 'background: {{VALUE}}',

							],

							

						]

					);  

					$this->add_group_control( 

						\Elementor\Group_Control_Border::get_type(),
			
						[
			
							'name' => 'button_border',
			
							'label' => esc_html__( 'Border', 'themesflat-core' ),
			
							'selector' => '{{WRAPPER}} .tf-services-wrap.style3 .tf-button',

			
						]
			
					);



				$this->end_controls_tab();



				$this->start_controls_tab( 

					'social_style_hover_tab',

					[

						'label' => esc_html__( 'Hover', 'themesflat-core' ),

					] );





					$this->add_control( 

						'button_color_hover',

						[

							'label' => esc_html__( 'Color Hover', 'themesflat-core' ),

							'type' => \Elementor\Controls_Manager::COLOR,

							'default' => '',

							'selectors' => [

								'{{WRAPPER}} .wrap-services-post .services-post .tf-button-container a:hover' => 'color: {{VALUE}}',
							],

							

						]

					);  

					$this->add_control( 

						'button_bgcolor_hover',

						[

							'label' => esc_html__( 'Background Color Hover', 'themesflat-core' ),

							'type' => \Elementor\Controls_Manager::COLOR,

							'default' => '',

							'selectors' => [

								'{{WRAPPER}} .wrap-services-post .services-post .tf-button-container a:hover' => 'background: {{VALUE}}',
							],

							

						]

					);  



				$this->end_controls_tab();

			$this->end_controls_tabs(); 

			



			

			$this->end_controls_section();    

		// /.End Button Style

	}



	protected function render($instance = []) {

		$settings = $this->get_settings_for_display();


		$has_carousel = 'no-carousel';

		if ( $settings['carousel'] == 'yes' ) {

			$has_carousel = 'has-carousel';

		}


		$this->add_render_attribute( 'tf_services_wrap', ['class' => ['tf-services-wrap', 'themesflat-services-taxonomy', $settings['style'], $has_carousel ], 'data-tabid' => $this->get_id()] );





		if ( get_query_var('paged') ) {

           $paged = get_query_var('paged');

        } elseif ( get_query_var('page') ) {

           $paged = get_query_var('page');

        } else {

           $paged = 1;

        }

		$query_args = array(

            'post_type' => 'services',

            'posts_per_page' => $settings['posts_per_page'],

            'paged'     => $paged

        );



        if (! empty( $settings['posts_categories'] )) {        	

        	$query_args['tax_query'] = array(

							        array(

							            'taxonomy' => 'services_category',

							            'field'    => 'slug',

							            'terms'    => $settings['posts_categories']

							        ),

							    );

        }        

        if ( ! empty( $settings['exclude'] ) ) {				

			if ( ! is_array( $settings['exclude'] ) )

				$exclude = explode( ',', $settings['exclude'] );



			$query_args['post__not_in'] = $exclude;

		}



		$query_args['orderby'] = $settings['order_by'];

		$query_args['order'] = $settings['order'];



		if ( $settings['sort_by_id'] != '' ) {	

			$sort_by_id = array_map( 'trim', explode( ',', $settings['sort_by_id'] ) );

			$query_args['post__in'] = $sort_by_id;

			$query_args['orderby'] = 'post__in';

		}



		$query = new WP_Query( $query_args );

		if ( $query->have_posts() ) : ?>

<div <?php echo $this->get_render_attribute_string('tf_services_wrap'); ?>
    data-column="<?php echo esc_attr($settings['carousel_column_desk']); ?>"
    data-column2="<?php echo esc_attr($settings['carousel_column_tablet']); ?>"
    data-column3="<?php echo esc_attr($settings['carousel_column_mobile']); ?>"
    data-spacer="<?php echo esc_attr($settings['carousel_spacer']); ?>" data-prev_icon="icon-inverna-arrow-right"
    data-next_icon="icon-inverna-Right" data-arrow="<?php echo esc_attr($settings['carousel_arrow']) ?>"
    data-bullets="<?php echo esc_attr($settings['carousel_bullets']) ?>">

    <div class="wrap-services-post row <?php echo esc_attr($settings['layout']); ?> ">

        <?php if ( $settings['carousel'] == 'yes' ): ?>
        <div class="owl-carousel">
            <?php endif; ?>

            <?php $count = 1; while ( $query->have_posts() ) : $query->the_post(); ?>


            <?php 

						$attr['settings'] = $settings; 
						$attr['count'] = $count; 
						$attr['icon'] = \Elementor\Addon_Elementor_Icon_manager_inverna::render_icon( themesflat_get_opt_elementor('services_post_icon') );

						tf_get_template_widget("service/{$settings['style']}", $attr); 

						?>


            <?php $count++; endwhile; ?>
            <?php if ( $settings['carousel'] == 'yes' ): ?>

        </div>

        <?php endif; ?>

        <?php wp_reset_postdata(); ?>

    </div>

</div>

<?php

		else:

			esc_html_e('No posts found', 'themesflat-core');

		endif;

			

	}	



}