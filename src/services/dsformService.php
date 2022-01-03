<?php
/**
 * DS Form plugin for Craft CMS 3.x
 *
 * DS Form
 * 
 * @link      https://www.dotsquares.com/
 * @copyright Copyright (c) 2021 Dotsquares
 */


namespace ds\dsform\services;
use Craft;
use craft\base\Component;
use ds\dsform\dsform;



/**
 * DS Form Service
 *
 * All of your plugin’s business logic should go in services, including saving data,
 * retrieving data, etc. They provide APIs that your controllers, template variables,
 * and other plugins can interact with.
 *
 * https://craftcms.com/docs/plugins/services
 *
 * @author    Dotsquares
 */


class dsformService extends  Component

{
  
    // Public Methods
    // =========================================================================

    public function dsforms(){
       
      
      // get setting main file
      $settings = dsform::getInstance()->getSettings();

      $heading  = $settings->gettitle();
      $adminemail  = $settings->getemail();
      $fromemail  = $settings->getfromemail();
  
?>




<div class="form-container dscontactform">
    <?php if($heading){?>
               <h1><?php echo $heading;?></h1><?php }else{?><h1>Contact Us</h1><?php }?>
        <form name="frmContact" id="send" frmContact"" method="post" action="" enctype="multipart/form-data"
            onsubmit="return validateContactForm()">
            <input type="hidden" name="toEmail" value="{{ 'raubi.gaur@dotsquares.com'|hash }}">

            <div class="input-row">
                <label style="padding-top: 20px;">First Name</label>  <input
                    type="text" class="input-field" name="fname" id="fname" />
            </div>
            <div class="input-row">
                <label>Last Name</label>  <input
                    type="text" class="input-field" name="lname" id="lname" />
            </div>
            <div class="input-row">
                <label>Email</label><input type="text"
                    class="input-field" name="userEmail" id="userEmail" />
            </div>
            <div class="input-row">
                <label>Phone Number</label>
                <input type="text" class="input-field" name="phone" id="phone" />
            </div>
            <div class="input-row">
                <label>Subject</label> <input type="text"
                    class="input-field" name="subject" id="subject" />
            </div>
            <div class="input-row">
                <label>Message</label>
                <textarea name="content" id="content"
                    class="input-field" cols="90" rows="6"></textarea>
            </div>
            <div>
                <input type="submit" name="send" class="btn-submit" value="Send" />

                
            </div>
        </form>
    </div>

  
    <script type="text/javascript">
        function validateContactForm() {
            var valid = true;

            $(".info").html("");
            $(".input-field").css('border', '#e0dfdf 1px solid');
            var fname = $("#fname").val();
            var lname = $("#lname").val();
            var userEmail = $("#userEmail").val();
            var phone = $("#phone").val();
            var subject = $("#subject").val();
            var content = $("#content").val();
            
            if (fname == "") {
                $("#fname-info").html("Required.");
                $("#fname").css('border', '#e66262 1px solid');
                valid = false;
            }
            if (lname == "") {
                $("#lname-info").html("Required.");
                $("#lname").css('border', '#e66262 1px solid');
                valid = false;
            }
            if (userEmail == "") {
                $("#userEmail-info").html("Required.");
                $("#userEmail").css('border', '#e66262 1px solid');
                valid = false;
            }
            if (!userEmail.match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/))
            {
                $("#userEmail-info").html("Invalid Email Address.");
                $("#userEmail").css('border', '#e66262 1px solid');
                valid = false;
            }
            if (phone == "") {
                $("#phone-info").html("Required.");
                $("#phone").css('border', '#e66262 1px solid');
                valid = false;
            }
            if(!phone.match(/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/)){
               $("#phone-info").html("Invalid Phone Number.");
               $("#phone").css('border', '#e66262 1px solid');
               valid = false;
               }

            if (subject == "") {
                $("#subject-info").html("Required.");
                $("#subject").css('border', '#e66262 1px solid');
                valid = false;
            }
            if (content == "") {
                $("#userMessage-info").html("Required.");
                $("#content").css('border', '#e66262 1px solid');
                valid = false;
            }
             return valid;
        }
</script>

<style type="text/css">
.form-container.dscontactform {
    margin: 20px 0;
}
  .dscontactform h1{font-size: 20px; font-weight: bold; text-align: center;}
  .dscontactform #content{ height: auto; padding: 25px;} 
  .dscontactform .btn-submit{ width: 100%;   
    border: 0;
    height: 50px;
    border-radius: 0;
    margin-bottom: 25px;
    background-color: #dc373d;
    border: 1px solid #bbbbbb;
    outline: none;
    color: #fff;
     font-size: 18px;
    font-weight: bold;
}
  .dscontactform .btn-submit:hover{background-color: transparent; color: #000;} 
  .dscontactform .input-field {
    width: 100%;   
    border: 0;
    height: 50px;
    border-radius: 0;
    margin-bottom: 25px;
    padding-left: 25px;
    background-color: transparent;
    border: 1px solid #bbbbbb;
    outline: none;
    color: #101010;
   
}
</style>
<?php
if(!empty($_POST["send"])) {

   $from = $fromemail;
   $to = $adminemail;
   if($heading){$title =$heading;}else{$title ="Contact Form";}
   
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $mail = $_POST["userEmail"];
    $phone = $_POST["phone"];
    $subject = $_POST["subject"];
    $content = $_POST["content"];
    $date = date('m/d/Y, h-i-s', time());

    

    if (strlen($fname) > 0 && strlen($mail) > 0 && strlen($phone) > 0 && strlen($subject) > 0 && strlen($content) > 0){

    $message = '<html><body>';

$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
$message .= "<tr style='background: #eee;'><td><strong>FUll Name:</strong> </td><td>" . $fname .' '.$lname. "</td></tr>";
$message .= "<tr><td><strong>Email Address:</strong> </td><td>" . $mail . "</td></tr>";
$message .= "<tr><td><strong>Phone Number:</strong> </td><td>" . $phone . "</td></tr>";
$message .= "<tr><td><strong>Subject:</strong> </td><td>" . $subject . "</td></tr>";
$message .= "<tr><td><strong>Message:</strong> </td><td>" . $content . "</td></tr>";
$message .= "<tr><td><strong>Date:</strong> </td><td>" . $date . "</td></tr>";


$message .= "</table>";
$message .= "</body></html>";


$headers = "From: " . $from  . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

     mail($to, $title, $message, $headers);
      



 //echo "Yes";
 echo '<p class="Message" style="color: green";>Your contact information is send successfully.</p>';

}}else{

   //echo "no";

}
      
}

}
?>