<?php

namespace Drupal\snb_user\Service;

class EmailpinGenerator{

	public function requestPIN(){
		return $this->generateSimplePin();
	}

	public function generateSimplePin(){
		$pincode = rand(0,9).rand(0,9).rand(0,9).rand(0,9);
		$alphabet = array('A','B','C','D','E','F','G','H','J','K','L','M','N','P','Q','R','S','T','U','V','W','X','Y','Z');
		$compoundPin = $pincode.$alphabet[rand(0, 25)];
		return $compoundPin;
	}

	function associateEmailToPin(){

	}

	// public function getPin(){
 //        return [
	//           'example one' => [
	//             '#markup' => '<div>This is via service container!</div>',
	//           ],
	//           ];
	// }

}