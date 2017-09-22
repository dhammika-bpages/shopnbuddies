<?php
namespace Drupal\snb_user\Plugin\rest\resource;

use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ResourceResponse;

/**
 * Provides a snb user Resources
 *
 * @RestResource(
 *   id = "snb_user_resource",
 *   label = @Translation("SnB user Resource"),
 *   uri_paths = {
 *     "canonical" = "/api/v1/user/isloggedin"
 *   }
 * )
 */

class UserResource extends ResourceBase {
  /**
   * Responds to entity GET requests.
   * @return \Drupal\rest\ResourceResponse
   */
  public function get() {
  	$logged_in = \Drupal::currentUser()->getUsername();
    $response = ['message' => $logged_in];
    return new ResourceResponse($response);
  }
}