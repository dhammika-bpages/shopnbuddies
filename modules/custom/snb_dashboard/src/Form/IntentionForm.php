<?php
namespace Drupal\snb_dashboard\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
// use Drupal\snb_user\Controller\SignupController;
// use Drupal\snb_user\Service\EmailSender;

class IntentionForm extends FormBase {
	public function getFormId() {
		return 'intention_form';
	}

	public function buildForm(array $form, FormStateInterface $form_state) {
	    $form['intention'] = array(
	        '#type' => 'fieldset',
  			'#title' => $this->t('What do you like to do ?'),
	    );

	    $form['actions'] = array(
	      '#markup' => "<div><a href='google.com'>Give away</a></div>",
	    );

	    $form['actions2'] = array(
	      '#markup' => "<div><a href='/whishlist'>Wishlist</a></div>",
	    );	    
	    return $form;
	}

    public function validateForm(array &$form, FormStateInterface $form_state) {

    }

	public function submitForm(array &$form, FormStateInterface $form_state) {

	}
}