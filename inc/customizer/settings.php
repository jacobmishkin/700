<?php
/**
 * Customizer settings.
 *
 * @package xyz
 */

/**
 * Register additional scripts.
 */
function _customize_additional_scripts( $wp_customize ) {

	// Register a setting.
	$wp_customize->add_setting(
		'_header_scripts',
		array(
			'default'           => '',
			'sanitize_callback' => 'force_balance_tags',
		)
	);

	// Create the setting field.
	$wp_customize->add_control(
		'_header_scripts',
		array(
			'label'       => esc_html__( 'Header Scripts', 'xyz' ),
			'description' => esc_html__( 'Additional scripts to add to the header. Basic HTML tags are allowed.', 'xyz' ),
			'section'     => '_additional_scripts_section',
			'type'        => 'textarea',
		)
	);

	// Register a setting.
	$wp_customize->add_setting(
		'_footer_scripts',
		array(
			'default'           => '',
			'sanitize_callback' => 'force_balance_tags',
		)
	);

	// Create the setting field.
	$wp_customize->add_control(
		'_footer_scripts',
		array(
			'label'       => esc_html__( 'Footer Scripts', 'xyz' ),
			'description' => esc_html__( 'Additional scripts to add to the footer. Basic HTML tags are allowed.', 'xyz' ),
			'section'     => '_additional_scripts_section',
			'type'        => 'textarea',
		)
	);
}
add_action( 'customize_register', '_customize_additional_scripts' );

/**
 * Register a social icons setting.
 */
function _customize_social_icons( $wp_customize ) {

	// Create an array of our social links for ease of setup.
	$social_networks = array( 'facebook', 'googleplus', 'instagram', 'linkedin', 'twitter' );

	// Loop through our networks to setup our fields.
	foreach ( $social_networks as $network ) {

		// Register a setting.
		$wp_customize->add_setting(
			'_' . $network . '_link',
			array(
				'default' => '',
				'sanitize_callback' => 'esc_url',
	        )
	    );

	    // Create the setting field.
	    $wp_customize->add_control(
	        '_' . $network . '_link',
	        array(
	            'label'   => /* translators: the social network name. */ sprintf( esc_html__( '%s Link', 'xyz' ), ucwords( $network ) ),
	            'section' => '_social_links_section',
	            'type'    => 'text',
	        )
	    );
	}
}
add_action( 'customize_register', '_customize_social_icons' );

/**
 * Register copyright text setting.
 */
function _customize_copyright_text( $wp_customize ) {

	// Register a setting.
	$wp_customize->add_setting(
		'_copyright_text',
		array(
			'default' => '',
		)
	);

	// Create the setting field.
	$wp_customize->add_control(
		new Text_Editor_Custom_Control(
			$wp_customize,
			'_copyright_text',
			array(
				'label'       => esc_html__( 'Copyright Text', 'xyz' ),
				'description' => esc_html__( 'The copyright text will be displayed in the footer. Basic HTML tags allowed.', 'xyz' ),
				'section'     => '_footer_section',
				'type'        => 'textarea',
			)
		)
	);
}
add_action( 'customize_register', '_customize_copyright_text' );
