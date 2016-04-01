<?php

/**
 * @file
 * Contains \Drupal\taboola\Plugin\Derivative\TaboolaBlock.
 */

namespace Drupal\taboola\Plugin\Derivative;

use Drupal\Component\Plugin\Derivative\DeriverBase;
use Drupal\Core\Plugin\Discovery\ContainerDeriverInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides block plugin definitions for mymodule blocks.
 *
 * @see \Drupal\taboola\Plugin\Block\TaboolaBlock
 */
class TaboolaBlock extends DeriverBase implements ContainerDeriverInterface {

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, $base_plugin_id) {
    return new static();
  }

  /**
   * {@inheritdoc}
   */
  public function getDerivativeDefinitions($base_plugin_definition) {
    // @todo get taboola block settings from exported entities. 
    $blocks = [
      'taboola_1' => 'Taboola 1',
      'taboola_2' => 'Taboola 2',
    ];
    foreach ($blocks as $id => $name) {
      $this->derivatives[$id] = $base_plugin_definition;
      $this->derivatives[$id]['admin_label'] = $name;
      $this->derivatives[$id]['title'] = $name;
    }
    return $this->derivatives;
  }
}
