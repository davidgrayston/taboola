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
 * )
 */
class TaboolaBlock extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function blockForm($form, \Drupal\Core\Form\FormStateInterface $form_state) {
    $form = parent::blockForm($form, $form_state);
    $configuration = $this->getConfiguration();

    $form['mode'] = array(
      '#type' => 'textfield',
      '#title' => t('Mode'),
      '#default_value' => isset($configuration['mode']) ? $configuration['mode'] : '',
    );

    $form['placement'] = array(
      '#type' => 'textfield',
      '#title' => t('Placement'),
      '#default_value' => isset($configuration['placement']) ? $configuration['placement'] : '',
    );

    $form['target_type'] = array(
      '#type' => 'textfield',
      '#title' => t('Target Type'),
      '#default_value' => isset($configuration['target_type']) ? $configuration['target_type'] : '',
    );

    $form['container'] = array(
      '#type' => 'textfield',
      '#title' => t('Container'),
      '#default_value' => isset($configuration['container']) ? $configuration['container'] : '',
    );

    return $form;
  }

  /**
   * Overrides \Drupal\block\BlockBase::blockSubmit().
   */
  public function blockSubmit($form, \Drupal\Core\Form\FormStateInterface $form_state) {
    $this->setConfigurationValue('mode', $form_state->getValue('mode'));
    $this->setConfigurationValue('placement', $form_state->getValue('placement'));
    $this->setConfigurationValue('target_type', $form_state->getValue('target_type'));
    $this->setConfigurationValue('container', $form_state->getValue('container'));
  }

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