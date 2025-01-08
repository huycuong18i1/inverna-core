<?php

class TFTeam_Widget extends \Elementor\Widget_Base {



	public function get_name() {

        return 'tf-team';

    }

    

    public function get_title() {

        return esc_html__( 'TF Team', 'themesflat-core' );

    }



    public function get_icon() {

        return 'eicon-posts-grid';

    }

    

    public function get_categories() {

        return [ 'themesflat_addons' ];

    }



	public function get_style_depends(){

		return ['tf-team'];

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

						'options' => ThemesFlat_Addon_For_Elementor_inverna::tf_get_taxonomies('team_category'),

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

		        	'style',

					[

						'label' => esc_html__( 'Styles', 'themesflat-core' ),

						'type' => \Elementor\Controls_Manager::SELECT,

						'default' => 'style1',

						'options' => [

							'style1' => esc_html__( 'Style 1', 'themesflat-core' ),

							'style2' => esc_html__( 'Style 2', 'themesflat-core' ),

						],

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

						],

					]

				);	

			

			$this->end_controls_section();

        // /.End Posts Query



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

						'{{WRAPPER}} .wrap-team-post .item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

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

						'{{WRAPPER}} .wrap-team-post .item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],

				]

			);  

			$this->add_control( 

				'bg_wrap_color',
	
				[
	
					'label' => esc_html__( 'Background Color', 'themesflat-core' ),
	
					'type' => \Elementor\Controls_Manager::COLOR,
	
					'default' => '',
	
					'selectors' => [
	
						'{{WRAPPER}} .tf-team-wrap .team-post' => 'background-color: {{VALUE}}',
	
					],
	
					
	
				]
	
			);
	
			$this->end_controls_section();    

		// /.End General Style



		// Start Post Icon Style 

		$this->start_controls_section( 

			'image_hei',

			[

				'label' => esc_html__( 'Image', 'themesflat-core' ),

				'tab' => \Elementor\Controls_Manager::TAB_STYLE,

			]

		);

		

		$this->add_responsive_control( 

			'image_sv',

			[

				'label' => esc_html__( 'Image Height', 'themesflat-core' ),

				'type' => \Elementor\Controls_Manager::SLIDER,

				'size_units' => [ 'px', '%', 'rem', 'em' ],

				'range' => [

					'px' => [

						'min' => 0,

						'max' => 1000,

						'step' => 1,

					],

					'%' => [

						'min' => 0,

						'max' => 100,

						'step' => 1,

					],

					'rem' => [

						'min' => 0,

						'max' => 10,

						'step' => 0.1,

					],

					'em' => [

						'min' => 0,

						'max' => 10,

						'step' => 0.1,

					],

				],

				'selectors' => [

					'{{WRAPPER}} .tf-team-wrap .featured-post img' => 'height: {{SIZE}}{{UNIT}};',

				],

			]

		);
		$this->add_responsive_control( 

			'image_border_radius',

			[

				'label' => esc_html__( 'Border Radius', 'themesflat-core' ),

				'type' => \Elementor\Controls_Manager::DIMENSIONS,

				'size_units' => [ 'px' , '%' ],

				'selectors' => [

					'{{WRAPPER}} .tf-team-wrap .featured-post img, {{WRAPPER}} .tf-team-wrap .featured-post > a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

				],

			]

		);



		$this->end_controls_section(); 


		
		// Start Post Icon Style 

		$this->start_controls_section( 

			'content-team',

			[

				'label' => esc_html__( 'Content', 'themesflat-core' ),

				'tab' => \Elementor\Controls_Manager::TAB_STYLE,

			]

		);
		$this->add_responsive_control( 

			'padding_inner_content',

			[

				'label' => esc_html__( 'Padding', 'themesflat-core' ),

				'type' => \Elementor\Controls_Manager::DIMENSIONS,

				'selectors' => [

					'{{WRAPPER}} .tf-team-wrap .content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

				],					

			]

		);	
		$this->add_responsive_control( 

			'content_border_radius',

			[

				'label' => esc_html__( 'Border Radius', 'themesflat-core' ),

				'type' => \Elementor\Controls_Manager::DIMENSIONS,

				'size_units' => [ 'px' , '%' ],

				'selectors' => [

					'{{WRAPPER}} .tf-team-wrap .content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

				],

			]

		);
		$this->add_control( 

			'bg_content_color',

			[

				'label' => esc_html__( 'Background Color', 'themesflat-core' ),

				'type' => \Elementor\Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .tf-team-wrap .content' => 'background-color: {{VALUE}}',

				],

				

			]

		);

		$this->add_control( 

			'bg_content_color_hover',

			[

				'label' => esc_html__( 'Background Color Hover', 'themesflat-core' ),

				'type' => \Elementor\Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .tf-team-wrap .content:hover' => 'background-color: {{VALUE}}',

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

					'selector' => '{{WRAPPER}} .wrap-team-post .team-post .title ',

				]

			); 



			$this->add_responsive_control( 

				'margin_title',

				[

					'label' => esc_html__( 'Margin', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::DIMENSIONS,

					'selectors' => [

						'{{WRAPPER}} .wrap-team-post .team-post .title ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

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

								'{{WRAPPER}} .wrap-team-post .team-post .title a' => 'color: {{VALUE}}',

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

								'{{WRAPPER}} .wrap-team-post  .team-post  .title a:hover' => 'color: {{VALUE}}',

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

					'label' => esc_html__( 'Position', 'themesflat-core' ),

					'tab' => \Elementor\Controls_Manager::TAB_STYLE,

				]

			);	



			$this->add_group_control( 

	        	\Elementor\Group_Control_Typography::get_type(),

				[

					'name' => 'typography_desc',

					'label' => esc_html__( 'Typography', 'themesflat-core' ),

					'selector' => '{{WRAPPER}} .wrap-team-post .team-post .category-team a',

				]

			);



			$this->add_control( 

				'desc_color',

				[

					'label' => esc_html__( 'Color', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::COLOR,

					'default' => '',

					'selectors' => [

						'{{WRAPPER}} .wrap-team-post .team-post .category-team a' => 'color: {{VALUE}}',

					],

					

				]

			); 



			$this->add_responsive_control( 

				'margin_desc',

				[

					'label' => esc_html__( 'Margin', 'themesflat-core' ),

					'type' => \Elementor\Controls_Manager::DIMENSIONS,

					'selectors' => [

						'{{WRAPPER}} .wrap-team-post .team-post .category-team' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],

				]

			);  



		

			

			$this->end_controls_section();    

		// /.End Description Style



		// Start Description Style 

		$this->start_controls_section( 

			'section_style_icon',

			[

				'label' => esc_html__( 'Icon Social', 'themesflat-core' ),

				'tab' => \Elementor\Controls_Manager::TAB_STYLE,

			]

		);	


		$this->add_responsive_control( 

			'icon_border_radius',

			[

				'label' => esc_html__( 'Border Radius', 'themesflat-core' ),

				'type' => \Elementor\Controls_Manager::DIMENSIONS,

				'size_units' => [ 'px' , '%' ],

				'selectors' => [

					'{{WRAPPER}} .team-post .list-social a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',

				],

			]

		);


		$this->add_control( 

			'icon_color',

			[

				'label' => esc_html__( 'Icon Color', 'themesflat-core' ),

				'type' => \Elementor\Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .team-post .list-social a' => 'color: {{VALUE}}',

				],

				

			]

		);

		$this->add_control( 

			'icon_color_hover',

			[

				'label' => esc_html__( 'Icon Color Hover', 'themesflat-core' ),

				'type' => \Elementor\Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .team-post .list-social a:hover' => 'color: {{VALUE}}',

				],

				

			]

		);

		$this->add_control( 

			'bg_icon_color',

			[

				'label' => esc_html__( 'Background Icon Color', 'themesflat-core' ),

				'type' => \Elementor\Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .team-post .list-social a' => 'background-color: {{VALUE}}',

				],

				

			]

		);

		$this->add_control( 

			'bg_icon_color_hover',

			[

				'label' => esc_html__( 'Background Icon Color Hover', 'themesflat-core' ),

				'type' => \Elementor\Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .team-post .list-social a:hover' => 'background-color: {{VALUE}}',

				],

				

			]

		);

		$this->add_group_control( 

			\Elementor\Group_Control_Border::get_type(),

			[

				'name' => 'icon_border',

				'label' => esc_html__( 'Border', 'themesflat-core' ),

				'selector' => '{{WRAPPER}} .team-post .list-social a',

			]

		);

		$this->add_control( 

			'icon_border_hover',

			[

				'label' => esc_html__( 'Border Hover', 'themesflat-core' ),

				'type' => \Elementor\Controls_Manager::COLOR,


				'selectors' => [

					'{{WRAPPER}} .team-post .list-social a:hover' => 'border-color: {{VALUE}}',

				],

				

			]

		);



	

		

		$this->end_controls_section();    

	// /.End Description Style



	



	}



	protected function render($instance = []) {

		$settings = $this->get_settings_for_display();





		$this->add_render_attribute( 'tf_team_wrap', ['class' => ['tf-team-wrap', 'themesflat-team-taxonomy', $settings['style'] ], 'data-tabid' => $this->get_id()] );





		if ( get_query_var('paged') ) {

           $paged = get_query_var('paged');

        } elseif ( get_query_var('page') ) {

           $paged = get_query_var('page');

        } else {

           $paged = 1;

        }

		$query_args = array(

            'post_type' => 'team',

            'posts_per_page' => $settings['posts_per_page'],

            'paged'     => $paged

        );



        if (! empty( $settings['posts_categories'] )) {        	

        	$query_args['tax_query'] = array(

							        array(

							            'taxonomy' => 'team_category',

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

<div <?php echo $this->get_render_attribute_string('tf_team_wrap'); ?>>



    <div class="wrap-team-post row <?php echo esc_attr($settings['layout']); ?> ">



        <?php while ( $query->have_posts() ) : $query->the_post(); 

                            global $post;

                            $facebook = get_post_meta($post->ID, 'facebook_team_value', true);

                            $twitter = get_post_meta($post->ID, 'twitter_team_value', true);

                            $linkedin = get_post_meta($post->ID, 'linkedin_team_value', true);

                            $youtube = get_post_meta($post->ID, 'youtube_team_value', true);

                            $custom1 = get_post_meta($post->ID, 'custom1_team_value', true);

                            $custom2 = get_post_meta($post->ID, 'custom2_team_value', true);

                            $facebook_icon = get_post_meta($post->ID, 'facebook_icon_value', true);

                            $twitter_icon = get_post_meta($post->ID, 'twitter_icon_value', true);

                            $linkedin_icon = get_post_meta($post->ID, 'linkedin_icon_value', true);

                            $youtube_icon = get_post_meta($post->ID, 'youtube_icon_value', true);

                            $custom1_icon = get_post_meta($post->ID, 'custom1_icon_value', true);

                            $custom2_icon = get_post_meta($post->ID, 'custom2_icon_value', true);

                ?>

        <?php 

					$attr['settings'] = $settings; 
					$attr['facebook'] = $facebook; 
					$attr['twitter'] = $twitter; 
					$attr['linkedin'] = $linkedin; 
					$attr['youtube'] = $youtube; 
					$attr['custom1'] = $custom1; 
					$attr['custom2'] = $custom2; 
					$attr['facebook_icon'] = $facebook_icon; 
					$attr['twitter_icon'] = $twitter_icon; 
					$attr['linkedin_icon'] = $linkedin_icon; 
					$attr['youtube_icon'] = $youtube_icon; 
					$attr['custom1_icon'] = $custom1_icon; 
					$attr['custom2_icon'] = $custom2_icon; 
							
					tf_get_template_widget("team/{$settings['style']}", $attr); 

					?>

        <?php endwhile; ?>



        <?php wp_reset_postdata(); ?>

    </div>

</div>

<?php

		else:

			esc_html_e('No posts found', 'themesflat-core');

		endif;

			

	}	



}