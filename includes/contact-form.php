<?php

if (!defined('ABSPATH')) {
    exit;
}
use Melipayamak\MelipayamakApi;

add_shortcode('advForms', 'show_contact_form');

add_action('rest_api_init', 'create_rest_endpoint');


add_action('rest_api_init', 'create_sms_endpoint');

add_action('rest_api_init', 'create_support_endpoint');


add_action('init', 'create_submission_page');

// add_action('add_meta_boxes', 'create_meta_box');

// add_filter('manage_submission_posts_columns', 'custom_submission_columns');

// add_action('manage_submission_posts_custom_column', 'fill_submission_columns', 10, 2);


// add_action('admin_init', 'setup_search');


add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');


function enqueue_custom_scripts()
{
    wp_enqueue_style('contact_form_plugin', MY_PLUGIN_URL . '/assets/contact_plugin.css');
}


function setup_search()
{
    global $typenow;

    if($typenow === 'submission')
    {
        add_filter('posts_search', 'submission_search_override', 10 , 2);
    }
}


function submission_search_override($search, $query)
{
          // Override the submissions page search to include custom meta data

    global $wpdb;

    if ($query->is_main_query() && !empty($query->query['s'])) {
          $sql    = "
            or exists (
                select * from {$wpdb->postmeta} where post_id={$wpdb->posts}.ID
                and meta_key in ('name','email','phone')
                and meta_value like %s
            )
        ";
          $like   = '%' . $wpdb->esc_like($query->query['s']) . '%';
          $search = preg_replace(
                "#\({$wpdb->posts}.post_title LIKE [^)]+\)\K#",
                $wpdb->prepare($sql, $like),
                $search
          );
    }

    return $search;
}

function fill_submission_columns($column, $post_id)
{
    switch($column)
    {
        case 'name':
            echo esc_html(get_post_meta($post_id, 'name', true) );
        break;
        case 'email':
            echo esc_html(get_post_meta($post_id, 'email', true) );
        break;
        case 'phone':
            echo esc_html(get_post_meta($post_id, 'phone', true) );
        break;
        case 'address':
            echo esc_html(get_post_meta($post_id, 'address', true) );
        break;
        case 'message':
            echo esc_html(get_post_meta($post_id, 'message', true) );
        break;
        
    }
}

function custom_submission_columns($columns)
{
    $columns = array(
        'cb' => $columns['cb'],
        'name' => __('Name', 'contact-plugin'),
        'email' => __('Email', 'contact-plugin'),
        'phone' => __('Phone', 'contact-plugin'),
        'address' => __('Address', 'contact-plugin'),
        'message' => __('Message', 'contact-plugin')
    );
    return $columns;
}
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

function create_sms_endpoint()
{
    register_rest_route('v1/contact-form-sms', 'submit', array(
        'methods' => 'POST',
        'callback' => 'get_sms_number'
    ));
}

function create_support_endpoint()
{
    register_rest_route('v1/contact-form-support', 'submit', array(
        'methods' => 'POST',
        'callback' => 'send_support_sms'
    ));
}

function send_support_sms($data)
{
    $params = $data->get_params();
    $user = $params["user"];
    $step = $params["step"];

    $reciever = get_plugin_options('contact_plugin_recipients');
    try{
        $username = '09124246135';
        $password = '#31E4';
        $api = new MelipayamakApi($username,$password);
        $sms = $api->sms();
        $to = $reciever;
        $from = '50004001246135';
        $text = "کاربری با شماره ی {$user} برای مرحله ی {$step} درخواست پشتیبانی تلفنی دارد.";
        $response = $sms->send($to,$from,$text);
        $json = json_decode($response);
        // echo $json->Value; //RecId or Error Number 
    }catch(Exception $e){
        echo $e->getMessage();
    }

}
function get_sms_number($data)
{
    $params = $data->get_params();
    $otp= rand(1000, 9999);
  
    // try{
    //     $username = '09124246135';
    //     $password = '#31E4';
    //     $api = new MelipayamakApi($username,$password);
    //     $sms = $api->sms();
    //     $to = $params["phoneNum"];
    //     $from = '50004001246135';
    //     $text = $otp;
    //     $response = $sms->send($to,$from,$text);
    //     $json = json_decode($response);
    //     // echo $json->Value; //RecId or Error Number 
    // }catch(Exception $e){
    //     echo $e->getMessage();
    // }

    return $params["nonce"] . $otp;

}

function get_form_data($data)
{
    $files = $data->get_file_params();
    $params = $data->get_params();
    // $params = json_decode($req["data"], true);

    // return $_FILES["passport_file"]['passport_file'];s
    $phone_number = $params["phoneNumber"];

    // $field_name = sanitize_text_field( $params['name']);
    // $field_email = sanitize_email( $params['email']);
    // $field_address = sanitize_text_field( $params['address']);
    // $field_phone = sanitize_text_field( $params['phone']);
    // $field_message = sanitize_textarea_field( $params['message']);

    // $recipient_email = get_plugin_options('contact_plugin_recipients');

   

    // if(!wp_verify_nonce($params['_wpnonce'], 'wp_rest'))
    // {
    //     return new WP_Rest_Response('Message not Sent!', 422);
    // }
    unset($params["_wpnonce"]);
    unset($params["_wp_http_referer"]);


    //send the email message
    // $headers = [];

    // $sender = get_bloginfo('admin-email');
    // $sender_name = get_bloginfo('name');
    // $headers[] = "From: {$sender_name} - {$sender}";
    // $headers[] = "Reply-to: <{$field_name}> <{$field_email}>";
    // $headers[] = "Content-Type: text/html";
    // $subject = "New contact form plugin entry from {$field_name}";
    // $message = '';
    // $message .= "Message has been sent from {$field_name} <br /> <br />";


    // if(!$recipient_email)
    // {
    //     $recipient_email = $sender;
    // }


    $postarr = [
        'post_title' => $phone_number,
        'post_type' => 'submission',
        'post_status' => 'publish'
    ];

    $post_id = wp_insert_post($postarr);

    $upload_dir = wp_upload_dir();
    foreach($params as $label => $value)
    {
        switch($label)
        {   
            default:
                $value = sanitize_text_field($value);
        }
        add_post_meta($post_id, sanitize_text_field($label), $value);
        // $message .= sanitize_text_field(ucfirst($label)) . ':' . $value . "<br>";

    }
    foreach($files as $label => $value)
    {
        switch($label)
        {   
            case 'passport_file':
                if ( isset( $files[ $label ] ) ) {
                    if(strlen($files[$label]['name']) > 0 )
                    $path = $upload_dir[ 'path' ] . '/' . basename( $files[ $label ][ 'name' ] );
            
                    if( move_uploaded_file( $files[ $label ][ 'tmp_name' ], $path ) ) {
                        $url =  $upload_dir[ 'url' ] . '/' . basename( $files[ $label ][ 'name' ] );
                    }
                    update_post_meta($post_id, sanitize_text_field($label), $url);
                }
            break;
            case 'daneshNameh_file':
                if ( isset( $files[ $label ] ) ) {
                    if(strlen($files[$label]['name']) > 0 )
                    $path = $upload_dir[ 'path' ] . '/' . basename( $files[ $label ][ 'name' ] );
            
                    if( move_uploaded_file( $files[ $label ][ 'tmp_name' ], $path ) ) {
                        $url =  $upload_dir[ 'url' ] . '/' . basename( $files[ $label ][ 'name' ] );
                    }
                    update_post_meta($post_id, sanitize_text_field($label), $url);
                }
            break;
            case 'daneshNameh_file':
                if ( isset( $files[ $label ] ) ) {
                    if(strlen($files[$label]['name']) > 0 )
                    $path = $upload_dir[ 'path' ] . '/' . basename( $files[ $label ][ 'name' ] );
            
                    if( move_uploaded_file( $files[ $label ][ 'tmp_name' ], $path ) ) {
                        $url =  $upload_dir[ 'url' ] . '/' . basename( $files[ $label ][ 'name' ] );
                    }
                    update_post_meta($post_id, sanitize_text_field($label), $url);
                }
            break;
            case 'rizNomarat_file':
                if ( isset( $files[ $label ] ) ) {
                    if(strlen($files[$label]['name']) > 0 )
                    $path = $upload_dir[ 'path' ] . '/' . basename( $files[ $label ][ 'name' ] );
            
                    if( move_uploaded_file( $files[ $label ][ 'tmp_name' ], $path ) ) {
                        $url =  $upload_dir[ 'url' ] . '/' . basename( $files[ $label ][ 'name' ] );
                    }
                    update_post_meta($post_id, sanitize_text_field($label), $url);
                }
                break;
            default:
                $value = sanitize_text_field($value);
        }
  
        // add_post_meta($post_id, sanitize_text_field($label), $value);
        // $message .= sanitize_text_field(ucfirst($label)) . ':' . $value . "<br>";

    }



    // wp_mail($recipient_email, $subject, $message, $headers);

    $success_message = 'The Message was Sent Successfully!';
    // if(get_plugin_options('contact_plugin_message')){
    //     $success_message = get_plugin_options('contact_plugin_message');
    //     $success_message = str_replace('{name}', $params['name'], $success_message);
    // }

    return new WP_Rest_Response($success_message, 200);

}

function create_submission_page()
{
    $args = [
        'public' => true,
        'has_archive' => true,
        'menu_position' => 99,
        // 'publicly_queryable' => false,
        'labels' => [
            'name' => 'فرم ها',
            'singular_name' => 'Submission',
            'edit_item' => 'view form'
        ],
        'supports' => ['title', 'custom-fields'],
        'capability_type' => 'post',
        // 'capabilities' => array(
        //     'create_posts' => false
        // ),
        // 'map_meta_cap' => true
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


    echo 'Name :' . get_post_meta( get_the_ID(), 'name', true);

    // echo '<ul>';
    //     echo '<li><strong>Name</strong>:<br>' . esc_html( get_post_meta( get_the_ID(), 'name', true) ) . '</li>';
    //     echo '<li><strong>Email</strong>:<br>' . esc_html( get_post_meta( get_the_ID(), 'email', true) ) . '</li>';
    //     echo '<li><strong>Phone</strong>:<br>' . esc_html( get_post_meta( get_the_ID(), 'phone', true) ) . '</li>';
    //     echo '<li><strong>Address</strong>:<br>' . esc_html( get_post_meta( get_the_ID(), 'address', true) ) . '</li>';
    //     echo '<li><strong>Message</strong>:<br>' . esc_html( get_post_meta( get_the_ID(), 'message', true) ) . '</li>';

    // echo '</ul>';

}