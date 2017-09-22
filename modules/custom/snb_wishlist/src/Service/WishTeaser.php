<?php

use Drupal\Core\Mail\MailManagerInterface;
use Drupal\Component\Utility\SafeMarkup;
use Drupal\Component\Utility\Html;

namespace Drupal\snb_wishlist\Service;

class WishTeaser{


	public function buildWishTeaser($nid) {
		$node = \Drupal\node\Entity\Node::load($nid);

		$timeSlected = $node->get('field_listing_selected_time')->getString();
		$expirePeriod = $node->get('field_listing_status_expire')->getString();
		$timeNow = time();
		$expireTime = new ExpireTime();
		$timeRemain = $expireTime->timeTillExpireCal($timeSlected, $expirePeriod, $timeNow);
		
		$allowed_values = $node->field_wish_recompense->getFieldDefinition()->getFieldStorageDefinition()->getSetting('allowed_values');
		$state_value = $node->get('field_wish_recompense')->value;
		$info['field_wish_recompense'] = $allowed_values[$state_value];

		$wishteaser = array(
				'title' => $node->get('title')->getString(),
				'time_remaining' => $timeRemain,
				'description' => $node->get('field_wish_description')->getString(),
				'value' => $node->get('field_wish_value')->getString(),
				'recompense' => $info['field_wish_recompense'],
		);
		
		return $wishteaser;
	}

}