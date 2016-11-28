<?php
namespace Drupal\snb_register\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

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
	      '#value' => $this->t('Save'),
	      '#button_type' => 'primary',
	    );
	    return $form;
	}

    public function validateForm(array &$form, FormStateInterface $form_state) {
      if (empty($form_state->getValue('signup_email')) == TRUE) {
        $form_state->setErrorByName('signup_email', $this->t('Enter email.'));
      }
    }

	public function submitForm(array &$form, FormStateInterface $form_state) {
	// drupal_set_message($this->t('@can_name ,Your application is being submitted!', array('@can_name' => $form_state->getValue('candidate_name'))));
		foreach ($form_state->getValues() as $key => $value) {
		  drupal_set_message($key . ': ' . $value);
		}
	}
}

// 49 29 69 68 34 J