/*
 * Single condition:-
*/
$this->add_control(
	'post_thumbnail_on_off',
	[
		'label' => __( 'Post Thumbnail On/Off?', 'your-plugin' ),
		'type' => \Elementor\Controls_Manager::SWITCHER,
		'label_on' => __( 'Show', 'your-plugin' ),
		'label_off' => __( 'Hide', 'your-plugin' ),
		'return_value' => 'yes',
		'default' => 'yes',
	]
);
$this->add_control(
	'post_thumbnail',
	[
		'label' => __( 'Post Thumbnail', 'your-plugin' ),
		'type' => \Elementor\Controls_Manager::MEDIA,
		'condition' => [
            'post_thumbnail_on_off' => 'yes',
        ]
	]
);


/*
 * Two or more condition for one control:-
*/
$this->add_control(
	'content',
	[
		'label' => __('Content', 'digimart_toolkit'),
		'type' => Controls_Manager::TEXTAREA,
		'default' => __('contact@digimart.com', 'digimart_toolkit'),
		'conditions' => [
			'relation' => 'and',
			'terms' => [
				[
					'name' => 'title',
					'operator' => '==',
					'value' => [
						'yes',
					],
				],
				[
					'name' => 'title2',
					'operator' => '==',
					'value' => [
						'',
					],
				],
			],
		],
	]
);

$this->add_control(
    'readmore_text',
    [
	'label' => __('Label Text', 'themepaw-companion'),
	'type' => Controls_Manager::TEXT,
	'default' => __('Read More','themepaw-companion'),
	'conditions'   => [
	    'terms' => [
		[
		    'relation' => 'or',
		    'terms'    => [
			[
			    'name'  => 'left_meta',
			    'value' => 'readmore',
			],
			[
			    'name'  => 'right_meta',
			    'value' => 'readmore',
			]
		    ],
		],
	    ],
	],
    ]
);


/*
 * condition for URL control:-
*/
$this->add_control(
	'content',
	[
		'label' => __('Content', 'digimart_toolkit'),
		'type' => Controls_Manager::TEXTAREA,
		'default' => __('contact@digimart.com', 'digimart_toolkit'),
		'condition' => [
			'title2[url]!' => '',
		]
	]
);




/*
 * Add a custom control to an existing Elementor widget:-
*/
add_action('elementor/element/before_section_end', 'add_control_in_existing_widget', 10, 3 );
function add_control_in_existing_widget( $section, $section_id, $args ) {
	if( $section->get_name() == 'testimonial' && $section_id == 'section_testimonial' ){
		// we are at the end of the "section_image" area of the "image-box"
		$section->add_control(
			'testimonial_name_title_pos' ,
			[
				'label'        => 'Name and title position',
				'type'         => Elementor\Controls_Manager::SELECT,
				'default'      => 'vertical',
				'options'      => array(
					'vertical' => 'Vertical',
					'horizontal' => 'Horizontal'
				),
				'prefix_class' => 'dgm-testimonial-name-title-',
				'label_block'  => true,
			]
		);
	}
}

add_action( 'elementor/widget/before_render_content', 'custom_render_button' );
/**
 * Adding a new attribute to our button
 *
 * @param \Elementor\Widget_Base $button
 */
function custom_render_button( $button ) {
	//Check if we are on a button
	if( 'testimonial' === $button->get_name() ) {
		// Get the settings
		$settings = $button->get_settings();

		// Adding our type as a class to the button
		if( $settings['testimonial_name_title_pos'] ) {
			$button->add_render_attribute( 'testimonial_content', 'class', $settings['testimonial_name_title_pos'], true );
		}
	}
}
