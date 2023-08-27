<?php

add_shortcode('contact', 'show_contact_form');

add_action('rest_api_init', 'create_rest_endpoint');

add_action('init', 'create_submission_page');

add_action('add_meta_boxes', 'create_meta_box');

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

    $postarr = [
        'post_title' => $params['name'],
        'post_type' => 'submission'

    ];

    $post_id = wp_insert_post($postarr);


    foreach($params as $label => $value)
    {
        $message .= ucfirst($label) . ':' . $value . "<br>";
        add_post_meta($post_id, $label, $value);
    }



    wp_mail($sender, $subject, $message, $headers);

    return new WP_Rest_Response('The Message was Sent Successfully!', 200);

}

function create_submission_page()
{
    $args = [
        'public' => true,
        'has_archive' => true,
        'labels' => [
            'name' => 'Submissions',
            'singular_name' => 'Submission'
        ],
        'supports' => ['title', 'editor', 'custom-fields']
    ];
    // 'capabilities'=> ['create_posts' => 'do_not_allow']

    register_post_type('submission',$args);
}

function create_meta_box()
{
    add_meta_box('custome_contact_form', 'submission', 'display_submission');
}

function display_submission()
{
    $post_metas = get_post_meta( get_the_ID() );

    unset($post_metas['_edit_lock']);


    foreach($post_metas as $key => $value){
        echo '<strong>' . ucfirst($key) . '</strong>' . ':' . $value[0] . '<br><br>';
    }


    // echo 'Name :' . get_post_meta( get_the_ID(), 'name', true);
}