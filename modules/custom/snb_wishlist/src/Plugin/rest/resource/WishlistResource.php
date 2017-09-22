<?php
namespace Drupal\snb_wishlist\Plugin\rest\resource;

use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ResourceResponse;

/**
 * Provides a Wishlist Resources
 *
 * @RestResource(
 *   id = "whishlist_resource",
 *   label = @Translation("Wishlist Resource"),
 *   uri_paths = {
 *     "canonical" = "/api/v1/todo"
 *   }
 * )
 */

class WishlistResource extends ResourceBase {
  /**
   * Responds to entity GET requests.
   * @return \Drupal\rest\ResourceResponse
   */
  public function get() {
    $response = ['message' => 'Hello, this is a rest service'];
    return new ResourceResponse($response);
  }
}