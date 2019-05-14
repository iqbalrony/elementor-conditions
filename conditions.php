<?php
class Elementor_Custom_Widget extends \Elementor\Widget_Base {
	/*=================================
			Single condition:-
	====================================*/

	/* Example:- 01
	 * This condition is like this:-
	 * if($post_thumbnail_on_off == 'yes'){
	 *    Show Post Thumbnail
	 * }
	*/
	$this->add_control(
		'post_thumbnail_on_off',
		[
			'label' => __('Post Thumbnail On/Off?', 'your-plugin'),
			'type' => \Elementor\Controls_Manager::SWITCHER,
			'label_on' => __('Show', 'your-plugin'),
			'label_off' => __('Hide', 'your-plugin'),
			'return_value' => 'yes',
			'default' => 'yes',
		]
	);
	$this->add_control(
		'post_thumbnail',
		[
			'label' => __('Post Thumbnail', 'your-plugin'),
			'type' => \Elementor\Controls_Manager::MEDIA,
			'condition' => [
				'post_thumbnail_on_off' => 'yes',
			]
		]
	);


	/* Example:- 02
	 * This condition is like this:-
	 * if( !empty($title) ){
	 *    Show Title color
	 * }
	*/
	$this->add_control(
		'title',
		[
			'label' => __('Title', 'your-plugin'),
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => 'Title',
		]
	);
	$this->add_control(
		'title_color',
		[
			'label' => __('Title color', 'your-plugin'),
			'type' => \Elementor\Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .title' => 'color: {{VALUE}}',
			],
			'condition' => [
				'title!' => '',
			]
		]
	);


	/*==================================================
			Two or more condition for one control:-
	=====================================================*/

	/*
	 * relation ['and', 'or']. default relation value is 'and'
	 * Compare Operators [ '==', '!=', '!==', 'in', '!in', '<', '<=', '>', '>=', '===' ]
	 * default compare operator value is '==='
	 * ['in', '!in'] this two operator use to find array key exist in it or not.
	*/

	/* Example:- 01
	 * This condition is like this:-
	 * if( !empty($title_1) && !empty($title_2) ){
	 *    Show Title color
	 * }
	*/
	$this->add_control(
		'title_1',
		[
			'label' => __('Title 1', 'your-plugin'),
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => 'Title 1',
		]
	);
	$this->add_control(
		'title_2',
		[
			'label' => __('Title 2', 'your-plugin'),
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => 'Title 2',
		]
	);
	$this->add_control(
		'title_color',
		[
			'label' => __('Title color', 'your-plugin'),
			'type' => \Elementor\Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .title' => 'color: {{VALUE}}',
			],
			'condition' => [
				'title_1!' => '',
				'title_2!' => '',
			]
		]
	);

	/* Example:- 02
	 * This condition is like this:-
	 * if( !empty($title_1) || !empty($title_2) ){
	 *    Show Title color
	 * }
	*/
	$this->add_control(
		'title_1',
		[
			'label' => __('Title 1', 'your-plugin'),
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => 'Title 1',
		]
	);
	$this->add_control(
		'title_2',
		[
			'label' => __('Title 2', 'your-plugin'),
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => 'Title 2',
		]
	);
	$this->add_control(
		'title_color',
		[
			'label' => __('Title color', 'your-plugin'),
			'type' => \Elementor\Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .title' => 'color: {{VALUE}}',
			],
			'conditions' => [
				'relation' => 'or',
				'terms' => [
					[
						'name' => 'title_1',
						'operator' => '!=',
						'value' => [
							'',
						],
					],
					[
						'name' => 'title_2',
						'operator' => '!=',
						'value' => [
							'',
						],
					],
				],
			],
		]
	);

	/* Example:- 03
	 * This condition is like this:-
	 * if( !empty($title_1) || $title_2 === 'read' ){
	 *    Show Title color
	 * }
	*/
	$this->add_control(
		'title_1',
		[
			'label' => __('Title 1', 'your-plugin'),
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => 'Title 1',
		]
	);
	$this->add_control(
		'title_2',
		[
			'label' => __('Title 2', 'your-plugin'),
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => 'Title 2',
		]
	);
	$this->add_control(
		'title_color',
		[
			'label' => __('Title color', 'your-plugin'),
			'type' => \Elementor\Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .title' => 'color: {{VALUE}}',
			],
			'conditions' => [
				'terms' => [
					[
						'relation' => 'or',
						'terms' => [
							[
								'name' => 'title_1',
								'operator' => '!=',
								'value' => '',
							],
							[
								'name' => 'title_2',
								'value' => 'read',
							]
						],
					],
				],
			],
		]
	);

	/* Example:- 04
	 * This condition is like this:-
	 * if( (!empty($title_1) || !empty($title_2)) && $icon=='yes ){
	 *    Show Title color
	 * }
	 * this is advance level condition and use it by the cool head.
	*/
	$this->add_control(
		'title_1',
		[
			'label' => __('Title 1', 'your-plugin'),
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => 'Title 1',
		]
	);
	$this->add_control(
		'title_2',
		[
			'label' => __('Title 2', 'your-plugin'),
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => 'Title 2',
		]
	);
	$this->add_control(
		'icon',
		[
			'label' => __('Icon On/Off?', 'your-plugin'),
			'type' => \Elementor\Controls_Manager::SWITCHER,
			'label_on' => __('Show', 'your-plugin'),
			'label_off' => __('Hide', 'your-plugin'),
			'return_value' => 'yes',
			'default' => 'yes',
		]
	);
	$this->add_control(
		'title_color',
		[
			'label' => __('Title color', 'your-plugin'),
			'type' => \Elementor\Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .title' => 'color: {{VALUE}}',
			],
			'conditions' => [
				'terms' => [
					[
						'relation' => 'or',
						'terms' => [
							[
								'name' => 'title_1',
								'operator' => '!=',
								'value' => '',
							],
							[
								'name' => 'title_2',
								'operator' => '!=',
								'value' => '',
							],
						],
					],
					[
						'terms' => [
							[
								'name' => 'icon',
								'value' => 'yes',
							],
						],
					]
				]
			],
		]
	);


	/*
	 * condition for URL control:-
	*/
	/*===================================================================
			Condition for those control which return array value:-
	=======================================================================*/
	/* Example:- 01
	 * URL control return an array which contain three key which are url, is_external and nofollow
	 * This condition is like this:-
	 * if( ( !empty($link['url']) ){
	 *    Show Button color
	 * }
	*/
	$this->add_control(
		'link',
		[
			'label' => __('Button Link', 'text-domain'),
			'type' => \Elementor\Controls_Manager::URL,
			'default' => [
				'url' => '',
				'is_external' => true,
				'nofollow' => true,
			],
		]
	);
	$this->add_control(
		'btn_color',
		[
			'label' => __('Button Color', 'text-domain'),
			'type' => \Elementor\Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .button' => 'color: {{VALUE}}',
			],
			'condition' => [
				'link[url]!' => '',
			]
		]
	);
}
