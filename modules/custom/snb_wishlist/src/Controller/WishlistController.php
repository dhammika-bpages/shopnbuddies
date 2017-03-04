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
//custom services
use Drupal\snb_wishlist\Service\MyWishList;

class WishlistController extends ControllerBase {

    // private $sendEmailPin;
    public function __construct(){
    }

    public function generateWishlistProcessPage() {

        // $args = [$tid];
        $view = \Drupal\views\Views::getView('wish_list');
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

}