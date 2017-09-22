<?php

namespace Drupal\snb_wishlist\Controller;

// for sending back raw response
use Symfony\Component\HttpFoundation\Response;
// to rnder the returned value withing the used theme.
use Drupal\Core\Controller\ControllerBase;
// to use dependancy injection/services
use Symfony\Component\DependencyInjection\ContainerInterface;
// use database management
use Drupal\Core\Database\Database;
use Drupal\image\Entity\ImageStyle;
//custom services
use Drupal\snb_wishlist\Service\MyWishList;
use Drupal\snb_wishlist\Service\WishTeaser;
use Drupal\snb_wishlist\Service\ExpireTime;

// use form builder
use Drupal\snb_wishlist\Form\CreateWhishListItemForm;

class WishlistController extends ControllerBase {

    // private $sendEmailPin;
    public function __construct(){
    }

    public function generateWishlistProcessPage() {

        // $args = [$tid];
        $view = \Drupal\views\Views::getView('wishes_chosen');
        if (is_object($view)) {
            // $view->setArguments($args);
            $view->setDisplay('block_1');
            $view->preExecute();
            $view->execute();
            // $content = $view->buildRenderable('block_1', $args);
            $content = $view->buildRenderable();
            // ksm($content);
        } 
        
    // $build = array(
    //   '#type' => 'markup',
    //   '#markup' => $content,
    // );
    return $content;
    }


    public function generateChosenWishesForGiveaways() {

        $titlesArray = array();
        $nidArray = array();
        $imagesArray = array();
        $ownerUID = array();
        $wishOwnerNameArray = array();
        $timeExpireArray = array();
        $thumbUrl = '';
        

        $view = \Drupal\views\Views::getView('wishes_chosen_in_region');
        if (is_object($view)) {
            $view->setDisplay('block_1');
            $view->setArguments(array('3'));
            $view->execute();
            $view->serialize();

            $result = $view->result;
            foreach ($result as $key => $value) {
                $entity = $value->_entity->toArray();

                $timeSlected = $entity['field_listing_selected_time'][0]['value'];
                $expirePeriod = $entity['field_listing_status_expire'][0]['value'];
                $timeNow = time();

                $expireTime = new ExpireTime();
                $expiresWhen = $timeSlected + $expirePeriod;

                if($timeNow < $expiresWhen){
	                // add record title to the array
	                array_push($titlesArray, $entity['title'][0]['value']);
                    array_push($nidArray, $entity['nid'][0]['value']);
	                //$expireTime = $entity['field_listing_status_expire'][0]['value'];

	                array_push($ownerUID,$entity['uid'][0]['target_id']);
	                // Loading of user picture
					$wishOwnerObj = \Drupal\user\Entity\User::load($entity['uid'][0]['target_id']);
					// $pictureUrl= $wishOwnerObj->get('user_picture')->entity->url();
					$wishOwnerName = $wishOwnerObj->getUsername();
					array_push($wishOwnerNameArray, $wishOwnerName);

					$wishOwnerArray = $wishOwnerObj->get('user_picture')->entity->toArray();
					$style = ImageStyle::load('thumbnail');
					// $uri = $style->buildUri($pictureUrl);
					$thumbUrl = $style->buildUrl($wishOwnerArray['uri'][0]['value']);
					array_push($imagesArray, $thumbUrl); 

					
					$timeTillExpireFormatted = $expireTime->timeTillExpireCal($timeSlected, $expirePeriod, $timeNow);
					// $expireOn = date('Y-m-d', $expiresWhen);
					array_push($timeExpireArray, $timeTillExpireFormatted);

				}   
            }
        }  

        return array(
            '#theme' => 'chosen_wishes',
              // '#test_var' => $this->t('Test Value'),
            '#titlesArray' => $titlesArray,
            '#nidArray' => $nidArray,
            '#imagesArray' => $imagesArray,
            '#ownerUID' => $ownerUID,
            '#wishOwnerNameArray' => $wishOwnerNameArray,
            '#timeExpireArray' => $timeExpireArray,          
        );

    } 

    public function generateTeaserWish($wishID) {

        $wishTeaser = new WishTeaser();
        $wishDetails = $wishTeaser->buildWishTeaser($wishID);
        return array(
            '#theme' => 'wish_teaser',
            '#title' => $wishDetails['title'],
            '#time_remaining' => $wishDetails['time_remaining'],
            '#description' => $wishDetails['description'],
            '#value' => $wishDetails['value'],
            '#recompense' => $wishDetails['recompense'],         
        );        

    }

    /*
     * Load the rendered form of the new whish creation form.
     */
    public function renderAddWishForm() {

        $newWishClass = new CreateWhishListItemForm;
        $form = \Drupal::formBuilder()->getForm($newWishClass);

        return $form;

    }    


}