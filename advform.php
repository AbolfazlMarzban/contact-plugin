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
    var otp = '';
    var phone = '';
    var phoneNum = '';
    // $("#advForm").hide();
    // $("#codeBox").hide();
    (function ($) {
    $("#signUpBtn").click(function(event){
         phoneNum = $("#phoneNumber").val();
        $.ajax({
                type: "POST",
                url: "<?php echo get_rest_url(null, 'v1/contact-form-sms/submit'); ?>",
                data: {
                    "phoneNum": phoneNum,
                    "nonce": "<?php echo wp_create_nonce(); ?>"
                },
                complete: function(res)
                {
                    otp = res.responseJSON.substr(res.responseJSON.length - 4);
                    console.log('otp', otp)
                    $("#signupForm").hide();
                    $("#form_errorr").hide();
                    $("#codeBox").fadeIn();
                },
            })
    });
    })(jQuery);
    
    (function ($) {
    $("#submitCode").click(function(event){
        var code = $("#sentCode").val();
        if(code == otp){
           phone = phoneNum;
           $("#codeBox").hide();
           $("#advForm").fadeIn();
        } else {
            $("#form_errorr").html("کد وارد شده اشتباه است!").fadeIn();
            $("#codeBox").hide();
            $("#signupForm").fadeIn();
        }
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
