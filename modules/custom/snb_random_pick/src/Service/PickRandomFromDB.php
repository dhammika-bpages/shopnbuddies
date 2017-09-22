<?php
use Drupal\Component\Utility\SafeMarkup;
use Drupal\Component\Utility\Html;
use Drupal\node\Entity\Node;

namespace Drupal\snb_random_pick\Service;

class PickRandomFromDB{


	public function getRandomWish() {
		$view = \Drupal\views\Views::getView('wish_list');
		if (is_object($view)) {
			$view->setDisplay('block_2');
			$view->execute();
			$view->serialize();
			$result = $view->result;

			$expiration = mt_rand(3600,2629800);
			$currentTime = time();

			foreach ($result as $key => $value) {

				$node = \Drupal\node\Entity\Node::load($value->nid);
				
				$node->set('field_listing_status', 1);
				$node->set('field_listing_selected_time', $currentTime);
				$node->set('field_listing_status_expire', $expiration);
				$node->save();

				$seconds = $expiration;
				$H = floor($seconds / 3600);
				$i = ($seconds / 60) % 60;
				$s = $seconds % 60;
				$timer = sprintf("%02d:%02d:%02d", $H, $i, $s);
				//ksm($timer);
				// drupal_set_message("Node has been selected");
				// drupal_set_message("Node ".$value->nid. " has been selected - will expire in " . $timer);
			}
		}

	}

}