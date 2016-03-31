<?php

/**
 * @file
 * Contains \Drupal\taboola\Plugin\Block\TaboolaBlock.
 */

namespace Drupal\taboola\Plugin\Block;

use Drupal\Core\Block\BlockBase;


/**
 * Provides a Taboola block.
 *
 * @Block(
 *   id = "taboola_block",
 *   admin_label = @Translation("Taboola"),
 * )
 */
class TaboolaBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#markup' => '',
      '#cache' => [
        'contexts' => ['user.roles']
      ],
    ];
  }

}