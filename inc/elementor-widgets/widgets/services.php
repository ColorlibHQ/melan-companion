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
 * Melan elementor service section widget.
 *
 * @since 1.0
 */
class Melan_Services extends Widget_Base {

	public function get_name() {
		return 'melan-service';
	}

	public function get_title() {
		return __( 'Services', 'melan-companion' );
	}

	public function get_icon() {
		return 'eicon-settings';
	}

	public function get_categories() {
		return [ 'melan-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Services content ------------------------------
		$this->start_controls_section(
			'service_content',
			[
				'label' => __( 'Services content', 'melan-companion' ),
			]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'melan-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Service Provided', 'melan-companion' ),
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'melan-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => 'Build brands campaigns  <br> & digital projects',
            ]
        );

        $this->add_control(
            'service_settings_seperator',
            [
                'label' => esc_html__( 'Services', 'melan-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );

		$this->add_control(
            'services', [
                'label' => __( 'Create New', 'melan-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ item_title }}}',
                'fields' => [
                    [
                        'name' => 'item_icon',
                        'label' => __( 'Select Icon', 'melan-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::SELECT,
                        'default'     => 'layers',
                        'options' => melan_themify_icon()
                    ],
                    [
                        'name' => 'item_title',
                        'label' => __( 'Title', 'melan-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default'     => __( 'Graphic design', 'melan-companion' ),
                    ],
                    [
                        'name' => 'item_text',
                        'label' => __( 'Text', 'melan-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXTAREA,
                        'default'     => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor.', 'melan-companion' ),
                    ],
                ],
                'default'   => [
                    [      
                        'item_icon'  => 'layers',
                        'item_title' => __( 'Graphic design', 'melan-companion' ),
                        'item_text'  => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor.', 'melan-companion' ),
                    ],
                    [      
                        'item_icon'  => 'design',
                        'item_title' => __( 'Web design', 'melan-companion' ),
                        'item_text'  => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor.', 'melan-companion' ),
                    ],
                    [      
                        'item_icon'  => 'rectangle',
                        'item_title' => __( 'Mobile app', 'melan-companion' ),
                        'item_text'  => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor.', 'melan-companion' ),
                    ],
                ]
            ]
		);
		$this->end_controls_section(); // End service content

    /**
     * Style Tab
     * ------------------------------ Style Section Heading ------------------------------
     *
     */

        $this->start_controls_section(
            'style_room_section', [
                'label' => __( 'Style Service Section', 'melan-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'big_title_col', [
                'label' => __( 'Section Title Color', 'melan-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .expert_doctors_area .doctors_title h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'single_item_styles_seperator',
            [
                'label' => esc_html__( 'Single Item Styles', 'melan-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'member_name_col', [
                'label' => __( 'Member Name Color', 'melan-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .expert_doctors_area .single_expert .experts_name h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'member_desig_color', [
                'label' => __( 'Member Designation Color', 'melan-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .expert_doctors_area .single_expert .experts_name span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'single_item_bg_styles_seperator',
            [
                'label' => esc_html__( 'Single Item Bg Styles', 'melan-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'member_bg_color', [
                'label' => __( 'Bg Color', 'melan-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .expert_doctors_area .single_expert .experts_name' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'hover_member_bg_color', [
                'label' => __( 'Item Hover Bg Color', 'melan-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .expert_doctors_area .single_expert:hover .experts_name' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {
    $settings  = $this->get_settings();
    $sub_title = !empty( $settings['sub_title'] ) ? $settings['sub_title'] : '';
    $sec_title = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $services = !empty( $settings['services'] ) ? $settings['services'] : '';
    ?>
    <!-- service_area  -->
    <div class="service_area">
        <div class="container">
            <?php 
                if ( $sec_title || $sub_title ) { 
                    echo '
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="section_title text-center mb-65">
                                <span>'.esc_html( $sub_title ).'</span>
                                <h3>'.wp_kses_post( nl2br( $sec_title ) ).'</h3>
                            </div>
                        </div>
                    </div>
                    ';
                }
            ?>
            <div class="row">
                <?php 
                if( is_array( $services ) && count( $services ) > 0 ) {
                    foreach( $services as $item ) {
                        $item_icon = ( !empty( $item['item_icon'] ) ) ? MELAN_DIR_ICON_IMG_URI . $item['item_icon'] . '.svg' : '';
                        $item_title = ( !empty( $item['item_title'] ) ) ? $item['item_title'] : '';
                        $item_text = ( !empty( $item['item_text'] ) ) ? $item['item_text'] : '';
                        ?>
                        <div class="col-xl-4 col-md-4">
                            <div class="single_service text-center">
                                <?php 
                                    if ( $item_icon ) { 
                                        echo '
                                        <div class="icon">
                                            <img src="'.esc_url( $item_icon ).'" alt="'.esc_html( $item_title ).'">
                                        </div>
                                        ';
                                    }
                                    if ( $item_title ) { 
                                        echo '<h3>'.esc_html( $item_title ).'</h3>';
                                    }
                                    if ( $item_text ) { 
                                        echo '<p>'.wp_kses_post( $item_text ).'</p>';
                                    }
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    }
}