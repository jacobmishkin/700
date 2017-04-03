<?php
/**
 * Custom queries for REST API Responses.
 *
 * This file is used to house "getter" function, that fetch data from the database.
 *
 * @package xyz
 */
add_action( 'rest_api_init', 'custon_theme_register_fields' );
function custon_theme_register_fields() {
    register_rest_field( 'post',
        'previous_post_ID',
        array(
            'get_callback'    => 'theme_get_previous_post_ID',
            'update_callback' => null,
            'schema'          => null,
        )
    );
    register_rest_field( 'post',
        'previous_post_title',
        array(
            'get_callback'    => 'theme_get_previous_post_title',
            'update_callback' => null,
            'schema'          => null,
        )
    );
    register_rest_field( 'post',
        'previous_post_link',
        array(
            'get_callback'    => 'theme_get_previous_post_link',
            'update_callback' => null,
            'schema'          => null,
        )
    );
}

function theme_get_previous_post_ID() {
	return get_previous_post()->ID;
}

function theme_get_previous_post_title() {
	return get_previous_post()->post_title;
}

function theme_get_previous_post_link() {
	return get_permalink( get_previous_post()->ID );
}