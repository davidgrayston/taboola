<?php

/**
 * @file
 * Contains \Drupal\taboola\Plugin\Block\TaboolaBlock.
 */

namespace Drupal\taboola\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;

/**
 * Provides a Taboola block.
 *
 * @Block(
 *   id = "taboola_block",
 *   admin_label = @Translation("Taboola"),
 *   deriver = "Drupal\taboola\Plugin\Derivative\TaboolaBlock"
 * )
 */
class TaboolaBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * {@inheritdoc}
   */
  public function build() {
    // @todo get taboola block settings from exported entities.
    $block_id = $this->getDerivativeId();
    return [
      '#markup' => 'Block ' . $block_id,
      '#cache' => [
        'contexts' => ['user.roles']
      ],
    ];
  }

}