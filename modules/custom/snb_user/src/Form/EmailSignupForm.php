<?php
namespace Drupal\snb_user\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\snb_user\Controller\SignupController;
use Drupal\snb_user\Service\EmailSender;

class EmailSignupForm extends FormBase {
	public function getFormId() {
		return 'email_signup_form';
	}

	public function buildForm(array $form, FormStateInterface $form_state) {
	    $form['signup_email'] = array(
	      '#type' => 'textfield',
	      '#title' => t('Your email:'),
	      '#required' => TRUE,
	    );
	    $form['actions']['#type'] = 'actions';
	    $form['actions']['submit'] = array(
	      '#type' => 'submit',
	      '#value' => $this->t('Signup'),
	      '#button_type' => 'primary',
	    );
	    return $form;
	}

    public function validateForm(array &$form, FormStateInterface $form_state) {
      if (empty($form_state->getValue('signup_email')) == TRUE) {
        $form_state->setErrorByName('signup_email', $this->t('You need to enter an email.'));
      } else {
      	 $isvalid = \Drupal::service('email.validator')->isValid($form_state->getValue('signup_email'));
      	 if($isvalid == FALSE){
      	 	$form_state->setErrorByName('signup_email', $this->t('Please enter a valid email.'));
      	 }
      }
    }

	public function submitForm(array &$form, FormStateInterface $form_state) {
		// foreach ($form_state->getValues() as $key => $value) {
		// } 

		/* this will sends the email */
		  // $emailSenderInstance = new EmailSender;
		  // $emailSender = new SignupController($emailSenderInstance);
		  // drupal_set_message($emailSender->validateEmail());

		$emailSenderInstance = new EmailSender;
		$emailSignup = new SignupController($emailSenderInstance);
		$response = $emailSignup->sendPinToEmail($form_state->getValue('signup_email'));
		drupal_set_message($response);
	}
}