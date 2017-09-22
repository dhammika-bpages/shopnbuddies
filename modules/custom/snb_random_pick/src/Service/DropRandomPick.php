<?php
use Drupal\Component\Utility\SafeMarkup;
use Drupal\Component\Utility\Html;
use Drupal\node\Entity\Node;

namespace Drupal\snb_random_pick\Service;

class DropRandomPick{

	public function selectExpiredWshes(){
		$timeNow = time();
		$view = \Drupal\views\Views::getView('wishes_expired');
		if (is_object($view)) {
			$view->setDisplay('block_1');
            // $view->preExecute();
            $view->execute();
			// $view->serialize();
			$result = $view->result;
			

			// if expire upon time enabled
			$resultArray = array();
			foreach ($result as $key => $value) {
				$entity = $value->_entity->toArray();
				// $title = $entity->get('title')->getValue()[0]['value'];
				$expireTime = $entity['field_listing_status_expire'][0]['value'];
				$selectTime = $entity['field_listing_selected_time'][0]['value'];
				$nowTime = time();

				if($nowTime > ($expireTime + $selectTime)){
					array_push($resultArray, $entity['nid'][0]['value']);
				}				
			}
			foreach ($resultArray as $value) {
				// self::dropWish(4);
			    $this->dropWish($value[0]);
			    // ksm($value[0]);
			}		
		}


	}

	public function dropWish($nodeID) {
		$node = \Drupal\node\Entity\Node::load($nodeID);
		
		$node->set('field_listing_status', 0);
		$node->save();
	}

}