<?php

namespace Drupal\snb_user\Controller;

// for sending back raw response
use Symfony\Component\HttpFoundation\Response;
// to rnder the returned value withing the used theme.
use Drupal\Core\Controller\ControllerBase;
// to use dependancy injection/services
use Symfony\Component\DependencyInjection\ContainerInterface;
// use database management
use Drupal\Core\Database\Database;

// use form builder
use Drupal\snb_user\Form\EmailSignupForm;
//custom services
use Drupal\snb_user\Service\EmailpinGenerator;
use Drupal\snb_user\Service\EmailSender;

/*
Raw response
*/
/*class SignupController{
    public function validateEmail(){

//    $response = new Response(
//  "<p>Hi there</p>",
//  Response::HTTP_OK,
//  array('content-type' => 'text/html')
//);
//        return $response;
        
        //return new Response($response);

}*/

/*
controller base/ theme rendered
*/
// class SignupController extends ControllerBase {
//     public function validateEmail() {
//         ////use rendering withing the theme
//         // return [
//         //   'example one' => [
//         //     '#markup' => '<div>Markup Example</div>',
//         //   ],
//         //   'example two' => [
//         //     '#type' => 'my_element',
//         //     '#label' => $this->t('Example Label'),
//         //     '#description' => $this->t('This is the description text.'),
//         //   ],
//         // ];

//         //// use form builder
//         // $signupClass = new EmailSignupForm;
//         // $form = \Drupal::formBuilder()->getForm($signupClass);
//         // return $form;

//     }
// }

/*
service container
*/
class SignupController extends ControllerBase {

    private $sendEmailPin;
    public function __construct(EmailSender $sendEmailPin){
        $this->sendEmailPin = $sendEmailPin;
    }
    public static function create(ContainerInterface $container){
        // $srvReturn = $container->get('snb_user.emailpingenerator');
        $srvReturn = $container->get('snb_user.emailpingenerator');
        return new static ($srvReturn);
    }


    public function getPin() {
        $emailpinGnerator = new EmailpinGenerator();
        return $emailpinGnerator->requestPIN();
    }

    public function buildEmailTemplate($genpin){
        $emailBody = "<html><body>"."You have mail from SnB\n\n\n"."your PIN is ". "<h1>".$genpin."</h1></body></html>";
        return $emailBody;
    }

    public function sendPinToEmail($email) {
//         //// use service
        // $emailpinGnerator = new EmailpinGenerator();
        // return $emailpinGnerator->getPin();
        // $service = \Drupal::service('snb_user.emailpingenerator');
        // return [$service;
        //$markupFromService = $this->sendEmailPin->getPin();

        $generatedPin = $this->getPin();
        $markupWithPIN = $this->buildEmailTemplate($generatedPin);
        $this->writeEmailtoPin($email,$generatedPin);
        //// sends the email
        $response = $this->sendEmailPin->sendCustomBuildMail($email,$markupWithPIN);
        return new Response("Email with PIN is sent.");
        // \Drupal::logger('snb_user')->debug($response);

    }

    public function writeEmailtoPin($email,$pin){
        $data = db_insert('email_to_pin')
        ->fields(
        array(
        'email' => $email,
        'PIN' => $pin,
        )
        )->execute();
    }

    public function readEmailtoPin($email){
        $query = \Drupal::database()->select('email_to_pin', 'emailList');
        $query->fields('emailList', ['email', 'PIN']);
        $query->condition('emailList.email', $email);
        $query->range(0, 1);
        $emailAndPin = $query->execute()->fetchAssoc();

        return $emailAndPin;
    }

    public function removeReurnedEmailtoPin($email){
        $query = \Drupal::database()->delete('email_to_pin');
        $query->condition('email', $email);
        $query->execute();
    }


    public function createEmailtoPinTBL(){
        $spec = array(
            'description' => 'Table to store registered email and PIN numbers sent to them.',
            'fields' => array(
              'email' => array(
                'description' => 'Email.',
                'type' => 'varchar',
                'length' => 128,
                'not null' => TRUE,
                'default' => '',
              ),
              'PIN' => array(
                'description' => 'Random pin number',
                'type' => 'varchar',
                'length' => 128,
                'not null' => TRUE,
              ),
            ),
            'primary key' => array('email'),
          ); 
         $schema = Database::getConnection()->schema();
         $schema->createTable('email_to_pin', $spec);
         \Drupal::logger('snb_user')->debug("email pin table created");
         return new Response("Email-to-pin table created.");
    }
}