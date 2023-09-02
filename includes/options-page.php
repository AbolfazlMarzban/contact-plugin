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
    Container::make( 'theme_options', __( 'تنظیمات فرم' ) )
    ->set_page_menu_position(100)
    ->set_icon('dashicons-media-document')
    ->add_fields( array(
        Field::make( 'checkbox', 'contact_plugin_active', __( 'Active' ) ),
        Field::make( 'text', 'contact_plugin_recipients', __( 'شماره تماس پشتیبانی' ) ),
        Field::make( 'text', 'contact_plugin_guide1', __( 'لینک ویدیوی مرحله ی اول' ) ),
        Field::make( 'text', 'contact_plugin_guide2', __( 'لینک ویدیوی مرحله ی دوم' ) ),
        Field::make( 'text', 'contact_plugin_guide3', __( 'لینک ویدیوی مرحله ی سوم' ) ),
        Field::make( 'text', 'contact_plugin_guide4', __( 'لینک ویدیوی مرحله ی چهارم' ) ),
        Field::make( 'text', 'contact_plugin_guide5', __( 'لینک ویدیوی مرحله ی پنجم' ) ),
        Field::make( 'text', 'contact_plugin_guide6', __( 'لینک ویدیوی مرحله ی ششم' ) ),
        Field::make( 'text', 'contact_plugin_guide7', __( 'لینک ویدیوی مرحله ی هفتم' ) ),
        Field::make( 'text', 'contact_plugin_guide8', __( 'لینک ویدیوی مرحله ی هشتم' ) ),
        Field::make( 'text', 'contact_plugin_guide9', __( 'لینک ویدیوی مرحله ی نهم' ) ),
        // Field::make('textarea', 'contact_plugin6message', _('Confirmation Message')3
        // ->set_attribute('placeholder', 'Enter C6nfirmation Message'4
        // ->set_help_text('Type the message you w6nt the submitter to5receive!'),
    ) );
}