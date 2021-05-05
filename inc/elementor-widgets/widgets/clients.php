<?php
namespace Melanelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Utils;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Melan Clients Contents section widget.
 *
 * @since 1.0
 */
class Melan_Client_Contents extends Widget_Base {

	public function get_name() {
		return 'melan-client-contents';
	}

	public function get_title() {
		return __( 'Client Contents', 'melan-companion' );
	}

	public function get_icon() {
		return 'eicon-testimonial-carousel';
	}

	public function get_categories() {
		return [ 'melan-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Client contents  ------------------------------
		$this->start_controls_section(
			'clients_content',
			[
				'label' => __( 'Client Contents', 'melan-companion' ),
			]
        );
        
		$this->add_control(
            'clients', [
                'label' => __( 'Create New', 'melan-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ client_name }}}',
                'fields' => [
                    [
                        'name' => 'client_name',
                        'label' => __( 'Client Name', 'melan-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Client 1', 'melan-companion' ),
                    ],
                    [
                        'name' => 'client_logo',
                        'label' => __( 'Client Logo', 'melan-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                        'default' => [
                            'url' => Utils::get_placeholder_image_src()
                        ]
                    ],
                ],
                'default'   => [
                    [
                        'client_name'           => __( 'Client 1', 'melan-companion' ),
                        'client_logo'           => [
                            'url'               => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'client_name'           => __( 'Client 2', 'melan-companion' ),
                        'client_logo'           => [
                            'url'               => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'client_name'           => __( 'Client 3', 'melan-companion' ),
                        'client_logo'           => [
                            'url'               => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'client_name'           => __( 'Client 4', 'melan-companion' ),
                        'client_logo'           => [
                            'url'               => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'client_name'           => __( 'Client 5', 'melan-companion' ),
                        'client_logo'           => [
                            'url'               => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'client_name'           => __( 'Client 6', 'melan-companion' ),
                        'client_logo'           => [
                            'url'               => Utils::get_placeholder_image_src(),
                        ],
                    ],
                ]
            ]
        );
        $this->end_controls_section(); // End Hero content

        /**
         * Style Tab
         * ------------------------------ Style Title ------------------------------
         *
         */
        $this->start_controls_section(
            'style_title', [
                'label' => __( 'Style Client Section', 'melan-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'rev_txt_col', [
                'label' => __( 'Review Text Color', 'melan-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testmonial_area .testmonial_info p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'rev_name_col', [
                'label' => __( 'Reviewer Name Color', 'melan-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testmonial_area .testmonial_info .author_name h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'rev_desig_col', [
                'label' => __( 'Reviewer Designation Color', 'melan-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testmonial_area .testmonial_info .author_name span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {

    // call load widget script
    $this->load_widget_script(); 
    $settings = $this->get_settings();
    $clients  = !empty( $settings['clients'] ) ? $settings['clients'] : '';
    ?>

    <!-- brand_area_start -->
    <div class="brand_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="brand_active owl-carousel">
                        <?php
                        if( is_array( $clients ) && count( $clients ) > 0 ){
                            foreach ( $clients as $client ) {
                                $client_name = !empty( $client['client_name'] ) ? $client['client_name'] : '';
                                $client_logo = !empty( $client['client_logo']['id'] ) ? wp_get_attachment_image( $client['client_logo']['id'], 'melan_client_logo_145x70', '', array('alt' => $client_name . ' image' ) ) : '';
                                ?>
                                <div class="single_brand text-center">
                                    <?php 
                                    if ( $client_logo ) { 
                                        echo $client_logo;
                                    }
                                    ?>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- brand_area_end -->
    <?php

    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            // brand-active
            $('.brand_active').owlCarousel({
            loop:true,
            margin:0,
            items:1,
            autoplay:true,
            navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
            nav:false,
            dots:false,
            autoplayHoverPause: true,
            autoplaySpeed: 800,
            responsive:{
                0:{
                    items:2,
                    dots:false,
                    nav:false,
                },
                767:{
                    items:4,
                    dots:false,
                    nav:false,
                },
                992:{
                    items:5,
                    nav:false
                },
                1200:{
                    items:6,
                    nav:false
                },
                1500:{
                    items:6
                }
            }
            });            
        })(jQuery);
        </script>
        <?php 
        }
    }	
}
