<?php

use Drupal\Core\Mail\MailManagerInterface;
use Drupal\Component\Utility\SafeMarkup;
use Drupal\Component\Utility\Html;

namespace Drupal\snb_wishlist\Service;

class ExpireTime{


	public function timeTillExpireCal($startTime, $duration, $endtime) {
		$expireTimeinSeconds = $startTime + $duration;
		$timeTillExpire = $expireTimeinSeconds - $endtime;
		$timeTillExpireReadable = $this->time_elapsed_expire($timeTillExpire);
		
		return $timeTillExpireReadable;
	}

	function time_elapsed_expire($secs){
	    $bit = array(
	        'y' => $secs / 31556926 % 12,
	        'w' => $secs / 604800 % 52,
	        'd' => $secs / 86400 % 7,
	        'h' => $secs / 3600 % 24,
	        'm' => $secs / 60 % 60,
	        's' => $secs % 60
	        );  
	    foreach($bit as $k => $v)
	        if($v > 0)$ret[] = $v . $k;
	       
	    return join(' ', $ret);
    } 


}