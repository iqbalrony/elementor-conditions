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
