<?php

add_shortcode('contact', 'show_contact_form');

add_action('rest_api_init', 'create_rest_endpoint');

function show_contact_form()
{
    include MY_PLUGIN_PATH . '/includes/templates/contact-form.php';
}

function create_rest_endpoint()
{
    register_rest_route('v1/contact-form', 'submit', array(
        'methods' => 'POST',
        'callback' => 'get_form_data'
    ));
}

function get_form_data($data)
{
    $params = $data->get_params();
    if(!wp_verify_nonce($params['_wpnonce'], 'wp_rest'))
    {
        return new WP_Rest_Response('Message not Sent!', 422);
    }
    unset($params["_wpnonce"]);
    unset($params["_wp_http_referer"]);


    //send the email message
    $headers = [];

    $sender = get_bloginfo('admin-email');
    $sender_name = get_bloginfo('name');
    $headers[] = "From: {$sender_name} - {$sender}";
    $headers[] = "Reply-to: <{$params['name']}> <{$params['email']}>";
    $headers[] = "Content-Type: text/html";
    $subject = "New contact form plugin entry from {$params['name']}";
    $message = '';
    $message .= "Message has been sent from {$params['name']} <br /> <br />";


    foreach($params as $label => $value)
    {
        $message .= ucfirst($label) . ':' . $value . "<br>";
    }

    wp_mail($sender, $subject, $message, $headers);

    return new WP_Rest_Response('Message Sent!', 200);

}