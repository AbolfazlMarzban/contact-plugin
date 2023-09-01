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
    var passport = null;
    var daneshNameh = null;
    var rizNomarat = null;
    $("#advForm").hide();
    $("#codeBox").hide();

    (function($){
        $("#passport").change(function(event){
            passport = event.target.files[0]
        });
        $("#daneshNameh").change(function name(event) {
            daneshNameh =event.target.files[0]
        });
        $("#rizNomarat").change(function name(event) {
            rizNomarat =event.target.files[0]
        });
        $("#firstNext").click(function(event){
            event.preventDefault();
           $("#firstStep").hide();
           $("#secondStep").fadeIn();
           $("#thirdStep").hide();
           $("#fourthStep").hide();
           $("#fifthStep").hide();
           $("#sixthStep").hide();
           $("#seventhStep").hide();
           $("#eighthStep").hide();
           $("#ninethStep").hide();
        });
        $("#secondNext").click(function(event){
            event.preventDefault();
           $("#firstStep").hide();
           $("#secondStep").hide();
           $("#thirdStep").fadeIn();
           $("#fourthStep").hide();
           $("#fifthStep").hide();
           $("#sixthStep").hide();
           $("#seventhStep").hide();
           $("#eighthStep").hide();
           $("#ninethStep").hide();
        });
        $("#secondPrev").click(function(event){
            event.preventDefault();
           $("#firstStep").fadeIn();
           $("#secondStep").hide();
           $("#thirdStep").hide();
           $("#fourthStep").hide();
           $("#fifthStep").hide();
           $("#sixthStep").hide();
           $("#seventhStep").hide();
           $("#eighthStep").hide();
           $("#ninethStep").hide();
        });
        $("#thirdNext").click(function(event){
            event.preventDefault();
           $("#firstStep").hide();
           $("#secondStep").hide();
           $("#thirdStep").hide();
           $("#fourthStep").fadeIn();
           $("#fifthStep").hide();
           $("#sixthStep").hide();
           $("#seventhStep").hide();
           $("#eighthStep").hide();
           $("#ninethStep").hide();
        });
        $("#thirdPrev").click(function(event){
            event.preventDefault();
           $("#firstStep").hide();
           $("#secondStep").fadeIn();
           $("#thirdStep").hide();
           $("#fourthStep").hide();
           $("#fifthStep").hide();
           $("#sixthStep").hide();
           $("#seventhStep").hide();
           $("#eighthStep").hide();
           $("#ninethStep").hide();
        });
        $("#fourthNext").click(function(event){
            event.preventDefault();
           $("#firstStep").hide();
           $("#secondStep").hide();
           $("#thirdStep").hide();
           $("#fourthStep").hide();
           $("#fifthStep").fadeIn();
           $("#sixthStep").hide();
           $("#seventhStep").hide();
           $("#eighthStep").hide();
           $("#ninethStep").hide();
        });
        $("#fourthPrev").click(function(event){
            event.preventDefault();
           $("#firstStep").hide();
           $("#secondStep").hide();
           $("#thirdStep").fadeIn();
           $("#fourthStep").hide();
           $("#fifthStep").hide();
           $("#sixthStep").hide();
           $("#seventhStep").hide();
           $("#eighthStep").hide();
           $("#ninethStep").hide();
        });
        $("#fifthNext").click(function(event){
            event.preventDefault();
           $("#firstStep").hide();
           $("#secondStep").hide();
           $("#thirdStep").hide();
           $("#fourthStep").hide();
           $("#fifthStep").hide();
           $("#sixthStep").fadeIn();
           $("#seventhStep").hide();
           $("#eighthStep").hide();
           $("#ninethStep").hide();
        });
        $("#fifthPrev").click(function(event){
            event.preventDefault();
           $("#firstStep").hide();
           $("#secondStep").hide();
           $("#thirdStep").hide();
           $("#fourthStep").fadeIn();
           $("#fifthStep").hide();
           $("#sixthStep").hide();
           $("#seventhStep").hide();
           $("#eighthStep").hide();
           $("#ninethStep").hide();
        });
        $("#sixthNext").click(function(event){
            event.preventDefault();
           $("#firstStep").hide();
           $("#secondStep").hide();
           $("#thirdStep").hide();
           $("#fourthStep").hide();
           $("#fifthStep").hide();
           $("#sixthStep").hide();
           $("#seventhStep").fadeIn();
           $("#eighthStep").hide();
           $("#ninethStep").hide();
        });
        $("#sixthPrev").click(function(event){
            event.preventDefault();
           $("#firstStep").hide();
           $("#secondStep").hide();
           $("#thirdStep").hide();
           $("#fourthStep").hide();
           $("#fifthStep").fadeIn();
           $("#sixthStep").hide();
           $("#seventhStep").hide();
           $("#eighthStep").hide();
           $("#ninethStep").hide();
        });
        $("#seventhNext").click(function(event){
            event.preventDefault();
           $("#firstStep").hide();
           $("#secondStep").hide();
           $("#thirdStep").hide();
           $("#fourthStep").hide();
           $("#fifthStep").hide();
           $("#sixthStep").hide();
           $("#seventhStep").hide();
           $("#eighthStep").fadeIn();
           $("#ninethStep").hide();
        });
        $("#seventhPrev").click(function(event){
            event.preventDefault();
           $("#firstStep").hide();
           $("#secondStep").hide();
           $("#thirdStep").hide();
           $("#fourthStep").hide();
           $("#fifthStep").hide();
           $("#sixthStep").fadeIn();
           $("#seventhStep").hide();
           $("#eighthStep").hide();
           $("#ninethStep").hide();
        });
        $("#eighthNext").click(function(event){
            event.preventDefault();
           $("#firstStep").hide();
           $("#secondStep").hide();
           $("#thirdStep").hide();
           $("#fourthStep").hide();
           $("#fifthStep").hide();
           $("#sixthStep").hide();
           $("#seventhStep").hide();
           $("#eighthStep").hide();
           $("#ninethStep").fadeIn();
        });
        $("#eighthPrev").click(function(event){
            event.preventDefault();
           $("#firstStep").hide();
           $("#secondStep").hide();
           $("#thirdStep").hide();
           $("#fourthStep").hide();
           $("#fifthStep").hide();
           $("#sixthStep").hide();
           $("#seventhStep").fadeIn();
           $("#eighthStep").hide();
           $("#ninethStep").hide();
        });
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
    $("#submitCode").click(function(event){
        var code = $("#sentCode").val();
        if(code == otp){
           phone = phoneNum;
           $("#codeBox").hide();
           $("#advForm").fadeIn();
           $("#secondStep").hide();
           $("#thirdStep").hide();
           $("#fourthStep").hide();
           $("#fifthStep").hide();
           $("#sixthStep").hide();
           $("#seventhStep").hide();
           $("#eighthStep").hide();
           $("#ninethStep").hide();

        } else {
            $("#form_errorr").html("کد وارد شده اشتباه است!").fadeIn();
            $("#codeBox").hide();
            $("#signupForm").fadeIn();
        }
    });
    $("#advForm").submit(function(event){
            event.preventDefault();
            var form = new FormData(event.target);
            if(passport){
                form.append('passport_file', passport)
            }
            if(daneshNameh){
                form.append('daneshNameh_file', daneshNameh);
            }
            if(rizNomarat){
                form.append('rizNomarat_file', rizNomarat);
            }
            form.append('phoneNumber', phone);
            var sendData =Object.fromEntries(form.entries())
            console.log('sendData', JSON.stringify(sendData))
            $.ajax({
                type: "POST",
                url: "<?php echo get_rest_url(null, 'v1/contact-form/submit'); ?>",
                data: {"data": JSON.stringify(sendData)},
                processData: false,
                success: function(res)
                {   
                    console.log('res', res , typeof(res))                 
                    // form.hide();
                    $("#form_success").html(res).fadeIn();
                },
                error: function()
                {
                    console.log('poop')
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
