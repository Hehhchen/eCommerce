require 'vendor/autoload.php';
<?php
namespace SendGrid;
// If you are using Composer
require __DIR__ . '/../../../vendor/autoload.php';
// comment out the above line if not using Composer
// require("./sendgrid-php.php");
// If not using Composer, uncomment the above line
use SendGrid\Mail\To;
use SendGrid\Mail\Cc;
use SendGrid\Mail\Bcc;
use SendGrid\Mail\From;
use SendGrid\Mail\Content;
use SendGrid\Mail\Mail;
use SendGrid\Mail\Personalization;
use SendGrid\Mail\Subject;
use SendGrid\Mail\Header;
use SendGrid\Mail\CustomArg;
use SendGrid\Mail\SendAt;
use SendGrid\Mail\Attachment;
use SendGrid\Mail\Asm;
use SendGrid\Mail\MailSettings;
use SendGrid\Mail\BccSettings;
use SendGrid\Mail\SandBoxMode;
use SendGrid\Mail\BypassListManagement;
use SendGrid\Mail\Footer;
use SendGrid\Mail\SpamCheck;
use SendGrid\Mail\TrackingSettings;
use SendGrid\Mail\ClickTracking;
use SendGrid\Mail\OpenTracking;
use SendGrid\Mail\SubscriptionTracking;
use SendGrid\Mail\Ganalytics;
use SendGrid\Mail\ReplyTo;
function helloEmail()
{
    try {
        $from = new From(null, "test@example.com");
        $subject = "Hello World from the Twilio SendGrid PHP Library";
        $to = new To(null, "rp2zd@virginia.edu");
        $content = new Content("text/plain", "some text here");
        $mail = new Mail($from, $to, $subject, $content);
        $personalization = new Personalization();
        $personalization->addTo(new To(null, "test2@example.com"));
        $mail->addPersonalization($personalization);
        //echo json_encode($mail, JSON_PRETTY_PRINT), "\n";
        return $mail;
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
    return null;
}
