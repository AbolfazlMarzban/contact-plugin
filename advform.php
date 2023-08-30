<?php
/*
 * Plugin Name: advForms
 * Description: advForms
 * Author: Abolfazl Marzban
 * Author URI : https://abolfazlmarzban.ir
 * Version: 1.0.0
 * Text Domain: advForms
 */



 if (!defined('ABSPATH')) {
    exit;
}

if(!class_exists('advForms')){
    
class advForms {
    public function __construct()
    {

        add_action('wp_footer', array($this, 'load_script'));
        define('MY_PLUGIN_PATH',  plugin_dir_path(__FILE__));
        define('MY_PLUGIN_URL', plugin_dir_url(__FILE__));
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
    $("#advForm").hide();
    (function ($) {
    $("#signUpBtn").click(function(event){
        var phoneNum = $("#phoneNumber").val();
        $.ajax({
                type: "POST",
                url: "<?php echo get_rest_url(null, 'v1/contact-form-sms/submit'); ?>",
                data: {"phoneNum": phoneNum},
                // success: function(res)
                // {
                //     form.hide();
                //     $("#form_success").html(res).fadeIn();
                // },
                // error: function()
                // {
                //     $("#form_error").html("There was an error submitting your form!").fadeIn();
                // }
            })
    });
    })(jQuery);

     (function ($) {
    $("#contact-form").submit(function(event){
            event.preventDefault();
            var form = $(this);
            console.log('form', form)
            $.ajax({
                type: "POST",
                url: "<?php echo get_rest_url(null, 'v1/contact-form/submit'); ?>",
                data: form.serialize(),
                success: function(res)
                {
                    form.hide();
                    $("#form_success").html(res).fadeIn();
                },
                error: function()
                {
                    $("#form_error").html("There was an error submitting your form!").fadeIn();
                }
            }) 
        });
    })(jQuery);
        </script>
<?php }

}

$advForms = new advForms;
$advForms->initialize();
}
