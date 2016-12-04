<?php

namespace Drupal\snb_register\Controller;

// for sending back raw response
use Symfony\Component\HttpFoundation\Response;
// to rnder the returned value withing the used theme.
use Drupal\Core\Controller\ControllerBase;
// to use dependancy injection/services
use Symfony\Component\DependencyInjection\ContainerInterface;

// use form builder
use Drupal\snb_register\Form\EmailSignupForm;
//custom services
use Drupal\snb_register\Service\EmailpinGenerator;
use Drupal\snb_register\Service\EmailSender;

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
        // $srvReturn = $container->get('snb_register.emailpingenerator');
        $srvReturn = $container->get('snb_register.emailpingenerator');
        return new static ($srvReturn);
    }
    public function validateEmail() {
//         //// use service
        // $emailpinGnerator = new EmailpinGenerator();
        // return $emailpinGnerator->getPin();
        // $service = \Drupal::service('snb_register.emailpingenerator');
        // return [$service;
        //$markupFromService = $this->sendEmailPin->getPin();
        $markupFromService = $this->sendEmailPin->custom_function_name();
        return $markupFromService;
    }
}