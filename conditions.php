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
