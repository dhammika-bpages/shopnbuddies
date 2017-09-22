<?php

namespace Drupal\snb_user\Service;

use Drupal\image\Entity\ImageStyle;

class WishOwnerDetails{

	public function loadUserObject($userUID){
		$userObj = \Drupal\user\Entity\User::load($userUID);
		$userTeaser = $this->wishOwnerSummerySheet($userObj);
		// $html = array(
  //         '#type' => 'markup',
  //         '#markup' => '<p>Priyaaa</p>',
  //       );

  //       return $html;
		return $userTeaser;
	}


	public function wishOwnerSummerySheet($userObject){

		$name = $userObject->getUsername();

		$profilePic = $userObject->get('user_picture')->entity->toArray();
		$userObArray = $userObject->toArray();
		// ksm($userObArray);
		$style = ImageStyle::load('thumbnail');
		$profilePicthumbUrl = $style->buildUrl($profilePic['uri'][0]['value']);

	    // $html = array(
     //      '#type' => 'markup',
     //      '#markup' => $block,
     //    );

     //    return $html;
        return array(
            '#theme' => 'owner_teaser',
              // '#test_var' => $this->t('Test Value'),
            '#name' => $name,
            '#profilePicture' => $profilePicthumbUrl,
            '#city' => $userObArray['field_city'][0]['value'],
            '#sexualAttraction' => $userObArray['field_sexual_attraction'][0]['value'],
            '#biologicalSex' => $userObArray['field_biological_sex'][0]['value'],          
        );

	}

}