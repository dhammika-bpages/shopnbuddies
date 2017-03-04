<?php
namespace Drupal\snb_wishlist\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\node\Entity\Node;
// use Drupal\snb_user\Controller\SignupController;
// use Drupal\snb_user\Service\EmailSender;

class CreateWhishListItemForm extends FormBase {
	public function getFormId() {
		return 'create_whishlist_item_form';
	}

	public function buildForm(array $form, FormStateInterface $form_state) {
	    $form['newitem'] = array(
	      '#type' => 'fieldset',
	      '#title' => t('Create a wish'),
	    );

	    $form['newitem']['wish'] = array(
	      '#type' => 'textfield',
	      '#title' => t('My wish'),
	      '#required' => TRUE,
	    );

	    $form['newitem']['item_desc'] = array(
	      '#type' => 'textarea',
	      '#title' => t('Description'),
	      '#required' => TRUE,
	    );

	    $form['newitem']['item_val'] = array(
	      '#type' => 'textfield',
	      '#title' => t('Value'),
	      '#required' => TRUE,
	    );

	    $form['newitem']['actions']['#type'] = 'actions';
	    $form['newitem']['actions']['submit'] = array(
	      '#type' => 'submit',
	      '#value' => $this->t('Save'),
	      '#button_type' => 'primary',
	    );

	    // $form['actions2'] = array(
	    //   '#markup' => "<a href='google.com'>Wishlist</a>",
	    // );
	    return $form;
	}

    public function validateForm(array &$form, FormStateInterface $form_state) {

    }

	public function submitForm(array &$form, FormStateInterface $form_state) {

		$node = Node::create(['type' => 'wish']);
		$node->set('title', $form_state->getValue('wish'));
		$node->set('field_wish_description', $form_state->getValue('item_desc'));
		$node->set('field_wish_value', $form_state->getValue('item_val'));
		$node->enforceIsNew();
		$node->save();

		drupal_set_message("Your wish card was created.");

		 // ksm($form_state->getValue('wish'));
		 // ksm($form_state->getValue('item_desc'));
		 // ksm($form_state->getValue('item_val'));
	}
}