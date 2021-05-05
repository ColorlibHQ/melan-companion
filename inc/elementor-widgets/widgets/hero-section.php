<?php
namespace Melanelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;
use Elementor\Utils;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Melan elementor hero section widget.
 *
 * @since 1.0
 */
class Melan_Hero extends Widget_Base {

	public function get_name() {
		return 'melan-hero';
	}

	public function get_title() {
		return __( 'Hero Section', 'melan-companion' );
	}

	public function get_icon() {
		return 'eicon-slider-full-screen';
	}

	public function get_categories() {
		return [ 'melan-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Hero content ------------------------------
		$this->start_controls_section(
			'hero_content',
			[
				'label' => __( 'Hero section content', 'melan-companion' ),
			]
        );
        $this->add_control(
            'img_settings_seperator',
            [
                'label' => esc_html__( 'Banner Images Section', 'melan-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'sec_bg',
            [
                'label' => esc_html__( 'Section BG Image', 'melan-companion' ),
                'description' => esc_html__( 'Best size is 1920x900', 'melan-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $this->add_control(
            'pattern_img',
            [
                'label' => esc_html__( 'Pattern Image', 'melan-companion' ),
                'description' => esc_html__( 'Best size is 257x174', 'melan-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );

        $this->add_control(
            'text_settings_seperator',
            [
                'label' => esc_html__( 'Banner Text Section', 'melan-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'melan-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Hello This is Milan', 'melan-companion' ),
            ]
        );
        $this->add_control(
            'sec_text',
            [
                'label' => esc_html__( 'Section Text', 'melan-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => __( 'Creative Designer', 'melan-companion' ),
            ]
        );

        $this->add_control(
            'social_settings_seperator',
            [
                'label' => esc_html__( 'Social Section', 'melan-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );

		$this->add_control(
            'socials', [
                'label' => __( 'Create New', 'melan-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ item_title }}}',
                'fields' => [
                    [
                        'name' => 'item_title',
                        'label' => __( 'Item Title', 'melan-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default'     => __( 'Facebook', 'melan-companion' ),
                    ],
                    [
                        'name' => 'item_icon',
                        'label' => __( 'Item Icon', 'melan-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::ICON,
                        'default'     => 'fa fa-facebook',
                        'options' => melan_themify_icon()
                    ],
                    [
                        'name' => 'item_url',
                        'label' => __( 'Item URL', 'melan-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                        'default'     => [
                            'url'   => '#',
                        ]
                    ],
                ],
                'default'   => [
                    [      
                        'item_title' => __( 'Facebook', 'melan-companion' ),
                        'item_icon'  => 'fa fa-facebook',
                        'item_url'   => [
                            'url'    => '#',
                        ],
                    ],
                    [      
                        'item_title' => __( 'Twitter', 'melan-companion' ),
                        'item_icon'  => 'fa fa-twitter',
                        'item_url'   => [
                            'url'    => '#',
                        ],
                    ],
                    [      
                        'item_title' => __( 'Instagram', 'melan-companion' ),
                        'item_icon'  => 'fa fa-instagram',
                        'item_url'   => [
                            'url'    => '#',
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
				'label' => __( 'Style Hero Section', 'melan-companion' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'left_circle_img',
                'label' => __( 'Left Circle Image', 'melan-companion' ),
                'description' => __( 'Upload The Left Circle Image. Best size is 724x767', 'melan-companion' ),
                'types' => [ 'classic' ],
                'selector' => '{{WRAPPER}} .slider_area .single_slider::before',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'right_circle_img',
                'label' => __( 'Right Top Circle Image', 'melan-companion' ),
                'description' => __( 'Upload The Right Circle Image. Best size is 531x504', 'melan-companion' ),
                'types' => [ 'classic' ],
                'selector' => '{{WRAPPER}} .slider_area .single_slider::after',
            ]
        );

        $this->add_control(
            'text_section_separator',
            [
                'label'     => __( 'Text Styles', 'melan-companion' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        ); 
		$this->add_control(
			'big_title_col', [
				'label' => __( 'Title Color', 'melan-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider .slider_text h3' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'text_col', [
				'label' => __( 'Text Color', 'melan-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider .slider_text span' => 'color: {{VALUE}};',
				],
			]
        );
		$this->end_controls_section();
	}
    
	protected function render() {
    $settings   = $this->get_settings();
    $sec_bg    = !empty( $settings['sec_bg']['url'] ) ? $settings['sec_bg']['url'] : '';
    $pattern_img    = !empty( $settings['pattern_img']['id'] ) ? wp_get_attachment_image( $settings['pattern_img']['id'], 'melan_about_thumb_558x400', '', array( 'alt' => $sec_title . ' pattern image' ) ) : '';
    $sec_title    = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $sec_text    = !empty( $settings['sec_text'] ) ? $settings['sec_text'] : '';
    $socials    = !empty( $settings['socials'] ) ? $settings['socials'] : '';
    ?>

    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="single_slider d-flex align-items-center" <?php echo melan_inline_bg_img( esc_url( $sec_bg ) ); ?>>
            <span class="d-done left_circle" data-img-url="<?php echo esc_url( $left_circle )?>"></span>
            <span class="d-done right_circle" data-img-url="<?php echo esc_url( $right_circle )?>"></span>
            <div class="shap_pattern d-none d-lg-block">
                <?php 
                    if ( $pattern_img ) { 
                        echo $pattern_img;
                    }
                ?>
            </div>
            <?php 
                if( is_array( $socials ) && count( $socials ) > 0 ) {
                    ?>
                    <div class="social_links">
                        <ul>
                            <?php
                            foreach( $socials as $item ) {
                                $item_icon = ( !empty( $item['item_icon'] ) ) ? $item['item_icon'] : '';
                                $item_url = !empty( $item['item_url']['url'] ) ? $item['item_url']['url'] : '';
                                ?>
                                    <li><a href="<?php echo esc_url( $item_url )?>"> <i class="<?php echo esc_attr( $item_icon )?>"></i> </a></li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                    <?php
                }
            ?>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-12">
                        <div class="slider_text text-center">
                            <?php 
                                if ( $sec_title ) { 
                                    echo '<h3>'.esc_html( $sec_title ).'</h3>';
                                }
                                if ( $sec_text ) { 
                                    echo '<span>'.esc_html( $sec_text ).'</span>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider_area_end -->
    <?php
    } 
}