<?php
class TFPriceTable_Widget extends \Elementor\Widget_Base {

  public function get_name() {
        return 'tf-pricetable';
    }
    
    public function get_title() {
        return esc_html__( 'TF Price Table', 'themesflat-core' );
    }

    public function get_icon() {
        return 'eicon-price-table';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

    public function get_style_depends() {
        return ['tf-pricetable'];
    }

    protected function register_controls() {
        // Start Price Table Header  
            $this->start_controls_section( 
                'section_price_header',
                [
                    'label' => esc_html__('Header', 'themesflat-core'),
                ]
            );

            $this->add_control(
                'style_table',
                [
                    'label' => esc_html__( 'Style', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'style1',
                    'options' => [
                        'style1'  => esc_html__( 'Style 1', 'themesflat-core' ),
                        'style2' => esc_html__( 'Style 2', 'themesflat-core' ),
                        'style3' => esc_html__( 'Style 3', 'themesflat-core' ),
                    ],
                ]
            );

            $this->add_control(
                'active',
                [
                    'label' => esc_html__( 'Active', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'noactive',
                    'options' => [
                        'noactive'  => esc_html__( 'No', 'themesflat-core' ),
                        'setactive' => esc_html__( 'Yes', 'themesflat-core' ),
                    ],
                ]
            );

            $this->add_control(
				'pr_icon',
				[
					'label' => esc_html__( 'Icon', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'default' => [
						'value' => 'icon-inverna-price-house',
						'library' => 'theme_icon',
					],
				]
			);

            $this->add_control(
                'price',
                [
                    'label' => esc_html__( 'Price', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__( '40', 'themesflat-core' ),
                ]
            );

            $this->add_control(
                'price_type',
                [
                    'label' => esc_html__( 'Price Type', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__( '$', 'themesflat-core' ),
                ]
            );

            $this->add_control(
                'time',
                [
                    'label' => esc_html__( 'Time', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__( '/Mth', 'themesflat-core' ),
                ]
            );

            $this->add_control( 
                'show_badge',
                [
                    'label' => esc_html__( 'Show Badge', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'Show', 'themesflat-core' ),
                    'label_off' => esc_html__( 'Hide', 'themesflat-core' ),
                    'return_value' => 'yes',
                    'default' => 'no',
                    'condition' => [
                        'style_table'	=> 'style2',
                    ],
                ]
            );

            $this->add_control(
                'badge',
                [
                    'label' => esc_html__( 'Badge', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__( 'Save 25%', 'themesflat-core' ),
                    'condition' => [
                        'show_badge'	=> 'yes',
                    ],
                ]
            );

            $this->add_control(
                'title',
                [
                    'label' => esc_html__( 'Title', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__( 'Standard', 'themesflat-core' ),
                ]
            );

            $this->add_control(
                'subtitle',
                [
                    'label' => esc_html__( 'Sub Title', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__( 'Save 29% on First Year', 'themesflat-core' ),
                ]
            );
            
            $this->add_control(
                'subtitle2',
                [
                    'label' => esc_html__( 'Sub Title 2', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__( 'Introductory Offer', 'themesflat-core' ),
                    'condition' => [
                        'style_table'	=> 'style2',
                    ],
                ]
            );

            $this->end_controls_section();
        // /.End Price Table Header

        // Start Price Table Content  
            $this->start_controls_section( 
                'section_price_content',
                [
                    'label' => esc_html__('Content', 'themesflat-core'),
                ]
            );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control(
                'item',
                [
                    'label' => esc_html__( 'Item', 'tf-addon-for-elementer' ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                ]
            );

            $repeater->add_control(
                'icon',
                [
                    'label' => esc_html__( 'Icon', 'tf-addon-for-elementer' ),
                    'type' => \Elementor\Controls_Manager::ICONS,
                    'default' => [
                        'value' => 'fa fa-check',
                        'library' => 'theme_icon',
                    ],
                ]
            );

            $repeater->add_control(
                'icon_color',
                [
                    'label' => esc_html__( 'Icon Color', 'tf-addon-for-elementer' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} {{CURRENT_ITEM}} .wrap-icon i' => 'color: {{VALUE}}',
                        '{{WRAPPER}} {{CURRENT_ITEM}} .wrap-icon svg' => 'fill: {{VALUE}}',
                    ],
                ]
            );       
            
            $repeater->add_control(
                'icon_color_bg',
                [
                    'label' => esc_html__( 'Icon Background Color', 'tf-addon-for-elementer' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} {{CURRENT_ITEM}} .wrap-icon' => 'background: {{VALUE}};border-color: {{VALUE}}',
                    ],
                ]
            );

            $repeater->add_control(
                'text',
                [
                    'label' => esc_html__( 'Text', 'tf-addon-for-elementer' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__( 'Content price', 'tf-addon-for-elementer' ),
                    'label_block' => true,
                ]
            );

            $repeater->add_control(
                'text_color',
                [
                    'label' => esc_html__( 'Text Color', 'tf-addon-for-elementer' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} {{CURRENT_ITEM}} .text' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'items',
                [
                    'label' => esc_html__( 'Items', 'tf-addon-for-elementer' ),
                    'type' => \Elementor\Controls_Manager::REPEATER,
                    'show_label' => true,
                    'fields' => $repeater->get_controls(),
                    'default' => [
                        [   
                            'text' => esc_html__( 'Listing free', 'tf-addon-for-elementer' ),
                        ],
                        [   
                            'text' => esc_html__( 'Support 24/7', 'tf-addon-for-elementer' ),
                        ],
                        [   
                            'text' => esc_html__( 'Quick access to customers', 'tf-addon-for-elementer' ),
                        ],
                        [   
                            'text' => esc_html__( 'Auto refresh ads', 'tf-addon-for-elementer' ),
                        ],
                    ],
                    'title_field' => '{{{ text }}}',
                ]
            );            

            $this->end_controls_section();
        // /.End Price Table Content

        // Start Price Table Button  
            $this->start_controls_section( 
                'section_price_button',
                [
                    'label' => esc_html__('Button', 'themesflat-core'),
                ]
            );
            $this->add_control(
                'button_text',
                [
                    'label' => esc_html__( 'Button Text', 'tf-addon-for-elementer' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__( 'Get started', 'tf-addon-for-elementer' ),
                ]
            );

            $this->add_control(
                'post_icon_readmore',
                [
                    'label' => esc_html__( 'Post Icon ', 'inverna' ),
                    'type' => \Elementor\Controls_Manager::ICONS,
                ]
            );

            $this->add_control(
                'link',
                [
                    'label' => esc_html__( 'Link', 'tf-addon-for-elementer' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'placeholder' => esc_html__( 'https://your-link.com', 'tf-addon-for-elementer' ),
                    'default' => [
                        'url' => '#',
                        'is_external' => false,
                        'nofollow' => false,
                    ],
                ]
            );
            $this->end_controls_section();
        // /.End Price Table Button


    }

    protected function render($instance = []) {
        $settings = $this->get_settings_for_display();

        $this->add_render_attribute( 'tf_pricetable', ['id' => "tf-pricetable-{$this->get_id()}", 'class' => ['tf-pricetable', $settings['active'], $settings['style_table']],  'data-tabid' => $this->get_id()] );  

        $header = $content = $button = $subtitle = $subtitle2  = $icon =  $item_list = $number_order = $time = '';

        foreach ( $settings['items'] as $index => $item ) {
            $item_list .= '<div class="item elementor-repeater-item-' . $item['_id'] . '">
                            <span class="wrap-icon">'.\Elementor\Addon_Elementor_Icon_manager_inverna::render_icon( $item['icon'] ).'</span>
                            <span class="text">'.$item['text'].'</span>
                        </div>';
        }
        $pr_icon = \Elementor\Addon_Elementor_Icon_manager_inverna::render_icon( $settings['pr_icon'], [ 'aria-hidden' => 'true' ] );
        $post_icon_readmore = \Elementor\Addon_Elementor_Icon_manager_inverna::render_icon( $settings['post_icon_readmore'], [ 'aria-hidden' => 'true' ] );
        $price_type = $settings['price_type'] ? '<span class="price-type">'.$settings['price_type'].'</span>' : '';
        $price = $settings['price'] ? '<span class="price">'.$settings['price'].'</span>' : '0';
        $title = $settings['title'] ? '<div class="title">'.$settings['title'].'</div>' : '';
        $badge = $settings['badge'] ? '<div class="badge-table">'.$settings['badge'].'</div>' : '';
       
        $time = '<span class="time">'.$settings['time'].'</span>';

        if (!empty($settings['subtitle'])) {
            $subtitle = '<h4 class="subtitle">'.$settings['subtitle'].'</h4>';
        }    

        if (!empty($settings['subtitle2'])) {
            $subtitle2 = '<h4 class="subtitle2">'.$settings['subtitle2'].'</h4>';
        } 

        $header = sprintf( '<div class="header-price">
                                <div class="wrap-pricon">
                                %6$s
                                </div>
                                 %1$s
                                 %5$s 
                                <div class="content-price"> %4$s %2$s %3$s</div>
                            </div>',$title,$price,$time,$price_type,$subtitle,$pr_icon);

        $header2 = sprintf( '<div class="header-price">
                            %1$s 
                            %2$s 
                       </div>',$title,$subtitle);
        
        $header2_2 = sprintf( '<div class="header-price">
                       %1$s 
                      <div class="content-price"> %4$s %2$s %3$s</div>
                  </div>',$subtitle2,$price,$time,$price_type);

        $header3 = sprintf( '<div class="header-price">
                    %1$s
                  <div class="wrap-pricon">
                  %6$s
                  </div>
                   <div class="content-price"> %4$s %2$s %3$s</div>
                   %5$s 
              </div>',$title,$price,$time,$price_type,$subtitle,$pr_icon);

        $content = sprintf( '<div class="content-list">
                                <div class="inner-content-list">%1$s</div>
                            </div>',$item_list);

        $target = $settings['link']['is_external'] ? ' target="_blank"' : '';
        $nofollow = $settings['link']['nofollow'] ? ' rel="nofollow"' : '';
        $button = sprintf( '<div class="wrap-button">
                                <a href="%2$s" class="tf-btn" %3$s %4$s> <span>%1$s</span>  %5$s</a>
                            </div>',$settings['button_text'], $settings['link']['url'], $target, $nofollow, $post_icon_readmore);

        if ( $settings['style_table'] == 'style2' ) {
            echo sprintf ( 
                '
                <div %1$s> 
                    %6$s 
                    %2$s
                    %4$s
                    %3$s
                    %5$s
                </div>',
                    $this->get_render_attribute_string('tf_pricetable'),
                    $header2,
                    $header2_2,
                    $content,
                    $button,
                    $badge
            );
        }elseif ( $settings['style_table'] == 'style3' ) {
            echo sprintf ( 
                '
                <div %1$s>  
                    %2$s
                    %4$s
                    %3$s
                </div>',
                    $this->get_render_attribute_string('tf_pricetable'),
                    $header3,
                    $content,
                    $button,
            );
        } else {
            echo sprintf ( 
                '
                <div %1$s>  
                    %2$s
                    %3$s
                    %4$s
                </div>',
                    $this->get_render_attribute_string('tf_pricetable'),
                    $header,
                    $content,
                    $button,

            );
        }              
    }

}