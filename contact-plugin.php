<?php
/*
 * Plugin Name: Contact Plugin
 * Description: Contact Plugin
 * Author: Abolfazl Marzban
 * Author URI : https://abolfazlmarzban.ir
 * Version: 1.0.0
 * Text Domain: Contact-Plugin
 */

 if (!defined('ABSPATH')) {
    exit;
}

if(!class_exists('ContactPlugin')){
class ContactPlugin {
    public function __construct()
    {

        add_action('wp_footer', array($this, 'load_script'));

        define('MY_PLUGIN_PATH',  plugin_dir_path(__FILE__));
        require_once( MY_PLUGIN_PATH .'/vendor/autoload.php');
    }

    public function initialize()
    {
        include_once MY_PLUGIN_PATH . 'includes/utilities.php';
        include_once MY_PLUGIN_PATH . 'includes/options-page.php';
        include_once MY_PLUGIN_PATH . 'includes/contact-form.php';

    }

   public function load_script()
{?>

<script>
     (function ($) {
    $("#contact-form").submit(function(event){
            event.preventDefault();
            var form = $(this);
            console.log('form', form)
            $.ajax({
                type: "POST",
                url: "<?php echo get_rest_url(null, 'v1/contact-form/submit'); ?>",
                data: form.serialize()
            }) 
        });
    })(jQuery)
        </script>
<?php }

}

$contactPlugin = new ContactPlugin;
$contactPlugin->initialize();
}
