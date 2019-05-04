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


#more condition for one control:-

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
