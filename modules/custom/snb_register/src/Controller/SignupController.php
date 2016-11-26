<?php

namespace Drupal\snb_register\Controller;

use Symfony\Component\HttpFoundation\Response;
use Drupal\Core\Controller\ControllerBase;

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

class SignupController extends ControllerBase {
    public function validateEmail() {
        return [
          'example one' => [
            '#markup' => '<div>Markup Example</div>',
          ],
          'example two' => [
            '#type' => 'my_element',
            '#label' => $this->t('Example Label'),
            '#description' => $this->t('This is the description text.'),
          ],
        ];
    }    
}