<?php

namespace Drupal\snb_register\Service;

class EmailpinGenerator{
	public function getPin(){
        return [
	          'example one' => [
	            '#markup' => '<div>This is via service container!</div>',
	          ],
	          ];
	}

}