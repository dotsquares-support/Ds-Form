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
use ds\dsform\resources\DsformAsset;
use craft\mail\Message;




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
       
      $view = Craft::$app->getView();
      $view->registerAssetBundle(DsformAsset::class);
      // get setting main file
      $settings = dsform::getInstance()->getSettings();

      $heading  = $settings->gettitle();
      $adminemail  = $settings->getemail();
      $fromemail  = $settings->getfromemail();?>




      <div class="form-container dscontactform">
          <?php if($heading){?>
                     <h1><?php echo $heading;?></h1><?php }else{?><h1>Contact Us</h1><?php }?>
              <form name="frmContact" id="send" frmContact"" method="post" action="" enctype="multipart/form-data"
                  onsubmit="return validateContactForm()">
      
                  <div class="input-row">
                      <label style="padding-top: 20px;">First Name*</label>  <input
                          type="text" class="input-field" name="fname" id="fname" />
                  </div>
                  <div class="input-row">
                      <label>Last Name*</label>  <input
                          type="text" class="input-field" name="lname" id="lname" />
                  </div>
                  <div class="input-row">
                      <label>Email*</label><input type="text"
                          class="input-field" name="userEmail" id="userEmail" />
                  </div>
                  <div class="input-row">
                      <label>Phone Number*</label>
                      <input type="text" class="input-field" name="phone" id="phone" />
                  </div>
                  <div class="input-row">
                      <label>Subject*</label> <input type="text"
                          class="input-field" name="subject" id="subject" />
                  </div>
                  <div class="input-row">
                      <label>Message*</label>
                      <textarea name="content" id="content"
                          class="input-field" cols="90" rows="6"></textarea>
                  </div>
                  <div>
                      <input type="submit" name="send" class="btn-submit" value="Send" />
      
                      
                  </div>
              </form>
          </div>
          <?php
          if(!empty($_POST["send"])) {

            $from = $fromemail;
            $to = $adminemail;
            if($heading){$title =$heading;}else{$title ="Contact Form";}
            
             $fname = $_POST["fname"];
             $lname = $_POST["lname"];
             $email = $_POST["userEmail"];
             $phone = $_POST["phone"];
             $subject = $_POST["subject"];
             $content = $_POST["content"];
             $date = date('m/d/Y');
         
             
         
             if (strlen($fname) > 0 && strlen($email) > 0 && strlen($phone) > 0 && strlen($subject) > 0 && strlen($content) > 0){
         
             $html = '<html><body>';
         
         $html .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
         $html .= "<tr><td><strong>First Name:</strong> </td><td>" . $fname . "</td></tr>";
         $html .= "<tr><td><strong>Last Name:</strong> </td><td>" . $lname . "</td></tr>";
         $html .= "<tr><td><strong>Email Address:</strong> </td><td>" . $email . "</td></tr>";
         $html .= "<tr><td><strong>Phone Number:</strong> </td><td>" . $phone . "</td></tr>";
         $html .= "<tr><td><strong>Subject:</strong> </td><td>" . $subject . "</td></tr>";
         $html .= "<tr><td><strong>Message:</strong> </td><td>" . $content . "</td></tr>";
         $html .= "<tr><td><strong>Date:</strong> </td><td>" . $date . "</td></tr>";
         
         
         $html .= "</table>";
         $html .= "</body></html>";
         
         
        
      $settings = Craft::$app->systemSettings->getSettings('email');
      $message = new Message();
      $mail    = $adminemail ;
      $message->setFrom($fromemail);
      $message->setTo($mail);
      $message->setSubject($heading);
      $message->setHtmlBody($html);
      
  
    return Craft::$app->mailer->send($message); 


    echo '<p class="Message" style="color: green";>Your contact information is send successfully.</p>';

      
    
          
    }
  }
    
  }
}
  ?>
    