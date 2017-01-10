<?php

use Drupal\Core\Mail\MailManagerInterface;
use Drupal\Component\Utility\SafeMarkup;
use Drupal\Component\Utility\Html;

namespace Drupal\snb_register\Service;

class EmailSender{


	public function sendCustomBuildMail($msgBody) {
		$mailManager = \Drupal::service('plugin.manager.mail');
		$module = 'snb_register';
		$key = 'node_insert'; // Replace with Your key
		$to = 'dbjaya1986@gmail.com';//\Drupal::currentUser()->getEmail();
		$from = \Drupal::currentUser()->getEmail();
		// 'reply-to' => $reply,
		$params['message'] = $msgBody;
		$params['title'] = "Shop'N'Buddies";
		$langcode = \Drupal::currentUser()->getPreferredLangcode();
		$send = true;

		$result = $mailManager->mail($module, $key, $to, $langcode, $params, $from, $send);
		// if ($result['result'] != true) {
		// $message = t('There was a problem sending your email notification to @email.', array('@email' => $to));
		// drupal_set_message($message, 'error');
		// \Drupal::logger('mail-log')->error($message);
		// return;
		// }
		if ($result['result'] != true) {
	        return [
		          'example one' => [
		            '#markup' => '<div>email was NOT sent !</div>',
		          ],
		          ];
		} else {
	        return [
		          'example one' => [
		            '#markup' => '<div>Email was sent</div>',
		          ],
		          ];
		}

		// $message = t('An email notification has been sent to '. $to);
		// drupal_set_message($message);
		// \Drupal::logger('mail-log')->notice($message);
	}

}