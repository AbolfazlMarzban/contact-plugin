<?php

if (!defined('ABSPATH')) {
    exit;
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('after_setup_theme', 'load_carbon_fields');
add_action('carbon_fields_register_fields', 'create_options_page');

function load_carbon_fields()
{
    \Carbon_Fields\Carbon_Fields::boot();
}

function create_options_page()
{
    Container::make( 'theme_options', __( 'Contact form' ) )
    ->set_icon('dashicons-carrot')
    ->add_fields( array(
        Field::make( 'checkbox', 'contact_plugin_active', __( 'Active' ) ),
        Field::make( 'text', 'contact_plugin_recipients', __( 'Recipient Email' ) )
        ->set_help_text('The email that the form is submitted to'),
        Field::make('textarea', 'contact_plugin_message', _('Confirmation Message'))
        ->set_attribute('placeholder', 'Enter Confirmation Message')
        ->set_help_text('Type the message you want the submitter to receive!'),
        
    ) );
}