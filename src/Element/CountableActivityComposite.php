<?php

namespace Drupal\countable\Element;

use Drupal\Component\Utility\Html;
use Drupal\webform\Element\WebformCompositeBase;

/**
 * Provides a 'webform_example_composite'.
 *
 * Webform composites contain a group of sub-elements.
 *
 *
 * IMPORTANT:
 * Webform composite can not contain multiple value elements (i.e. checkboxes)
 * or composites (i.e. webform_address)
 *
 * @FormElement("countable_activity_composite")
 *
 * @see \Drupal\webform\Element\WebformCompositeBase
 * @see \Drupal\countable\Element\CountableActivityComposite
 */
class CountableActivityComposite extends WebformCompositeBase {

  /**
   * {@inheritdoc}
   */
  public function getInfo() {
    return parent::getInfo() + ['#theme' => 'countable_activity_composite'];
  }

  /**
   * {@inheritdoc}
   */
  public static function getCompositeElements(array $element) {
    // Generate an unique ID that can be used by #states.
    $html_id = Html::getUniqueId('countable_activity_composite');

    $elements = [
        //'flexxx' => [
        //'#type' => 'webform_flexbox',
        'activity_type' => [
          '#type' => 'select',
          '#required' => TRUE,
          '#title' => t('Type'),
          '#prefix' => '<div class="countable webform-flexbox js-webform-flexbox js-form-wrapper form-group form-wrapper"><div class="webform-flex webform-flex--3"><div class="webform-flex--container">',
          '#suffix' => '</div></div>',
          '#attached' => ['library' => ['webform/webform.element.flexbox']],
          '#attributes' => ['data-webform-composite-id' => $html_id . '--type'],
          '#options' => [
            'Events' => [
              'booths' => t('Booths'),
              'census_action_kiosk' => t('Census Action Kiosk'),
              'convening' => t('Convening'),
              'education_forum' => t('Education forum'),
              'implementation_planning_worksho' => t('Impl. Planning Workshop'),
              'meeting' => t('Meeting (includes one-to-one)'),
              'qac' => t('QAC'),
              'speaking_engagement' => t('Speaking engagement'),
              'training_delivery' => t('Training delivery'),
              'webinar' => t('Webinar'),
              'event' => t('Event (other)'),
            ],
            'Communication' => [
              'advertising' => t('Advertising'),
              'alert_sign_up' => t('Alert sign up'),
              'collateral' => t('Collateral'),
              'flyers' => t('Flyers'),
              'nudgealert' => t('Nudge/alert'),
              'social_media' => t('Social media'),
              'media_other' => t('Media (other)'),
            ],
            'Field'  => [
              'canvassing' => t('Canvassing'),
              'form_filling_assistance' => t('Form-filling assistance'),
              'phone_banking' => t('Phone banking'),
              'pledge_cards' => t('Pledge cards'),
              'other' => t('Other'),
            ],
          ],
        ],
        'total_number_of_impressions' => [ '#type' => 'number', '#title' => t('Total impressions'), '#wrapper_attributes' => ['class' => ['js-form-wrapper']],
          '#states' => [ 'enabled' => [ '[data-webform-composite-id="' . $html_id . '--type"]' => ['filled' => TRUE], ], ],
          '#required' => TRUE,
          '#min' => 0,
          '#title_display' => 'before',
          '#prefix' => '<div class="webform-flex webform-flex--2 adjust-label-margin"><div class="webform-flex--container">',
          '#suffix' => '</div></div>',
        ],
        'total_htc_of_impressions' => [ '#type' => 'number', '#title' => t('% HTC'), '#wrapper_attributes' => ['class' => ['js-form-wrapper']],
          '#states' => [ 'enabled' => [ '[data-webform-composite-id="' . $html_id . '--type"]' => ['filled' => TRUE], ], ],
          '#required' => TRUE,
          '#min' => 0,
          '#max' => 100,
          '#title_display' => 'before',
          '#input_mask' => '099%',
          '#prefix' => '<div class="webform-flex webform-flex--1 adjust-label-margin"><div class="webform-flex--container">',
          '#suffix' => '</div></div></div>',
        ],
      //],
        'activity_address' => [
          '#type' => 'textfield',
          '#country__access' => FALSE,
          '#title' => t('Address'),
          '#prefix' => '<div class="webform-flex webform-flex--3"><div class="webform-flex--container">',
          '#suffix' => '</div></div>',
          '#wrapper_attributes' => ['class' => ['js-form-wrapper']],
          '#states' => [
            'visible' => [
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'booths']],
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'census_action_kiosk']],
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'convening']],
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'education_forum']],
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'implementation_planning_worksho']],
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'meeting']],
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'qac']],
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'speaking_engagement']],
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'training_delivery']],
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'event']],
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'form_filling_assistance']],
            ],
            'required' => [
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'booths']],
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'census_action_kiosk']],
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'convening']],
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'education_forum']],
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'qac']],
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'speaking_engagement']],
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'training_delivery']],
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'event']],
            ],
          ],
        ],
        'description' => [
          '#type' => 'textfield',
          '#title' => t('Description'),
          '#prefix' => '<div class="webform-flex webform-flex--3"><div class="webform-flex--container">',
          '#suffix' => '</div></div>',
          // Add .js-form-wrapper to wrapper (ie td) to prevent #states API from
          // disabling the entire table row when this element is disabled.
          '#wrapper_attributes' => ['class' => ['js-form-wrapper']],
          '#states' => [
            'visible' => [
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'advertising']],
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'alert_sign_up']],
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'collateral']],
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'flyers']],
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'nudgealert']],
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'media_other']],
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'pledge_cards']],
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'other']],
            ],
            'required' => [
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'advertising']],
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'alert_sign_up']],
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'collateral']],
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'nudgealert']],
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'media_other']],
            ],
          ],
        ],
        'activity_social_media_chan' => [
          '#prefix' => '<div class="webform-flex webform-flex--3"><div class="webform-flex--container">',
          '#suffix' => '</div></div>',
          '#type' => 'webform_select_other',
          '#title' => t('Channel'),
          '#options' => [
            'facebook' => t('Facebook'),
            'instagram' => t('Instagram'),
            'twitter' => t('Twitter'),
            'snapchat' => t('Snapchat'),
          ],
          // Add .js-form-wrapper to wrapper (ie td) to prevent #states API from
          // disabling the entire table row when this element is disabled.
          '#wrapper_attributes' => ['class' => ['js-form-wrapper']],
          '#states' => [
            'visible' => [
              '[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'social_media'],
            ],
            'required' => [
              '[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'social_media'],
            ],
          ],
        ],
        'start_time' => [ '#type' => 'date', '#title' => t('Start date'), '#wrapper_attributes' => ['class' => ['js-form-wrapper']],
          '#prefix' => '<div class="webform-flex webform-flex--3"><div class="webform-flex--container">',
          '#suffix' => '</div></div>',
          '#states' => [
            'visible' => [
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'convening']],
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'education_forum']],
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'implementation_planning_worksho']],
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'meeting']],
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'qac']],
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'speaking_engagement']],
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'training_delivery']],
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'event']],
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'webinar']],
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'canvassing']],
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'phone_banking']],
            ],
          ],
        ],
        'end_time' => [ '#type' => 'date', '#title' => t('End date'), '#wrapper_attributes' => ['class' => ['js-form-wrapper']],
          '#prefix' => '<div class="webform-flex webform-flex--3"><div class="webform-flex--container">',
          '#suffix' => '</div></div>',
          '#states' => [
            'visible' => [
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'convening']],
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'education_forum']],
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'implementation_planning_worksho']],
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'meeting']],
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'qac']],
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'speaking_engagement']],
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'training_delivery']],
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'event']],
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'webinar']],
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'canvassing']],
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'phone_banking']],
            ],
          ],
        ],
        'event_name' => [ '#type' => 'textfield', '#title' => t('Event name'), '#wrapper_attributes' => ['class' => ['js-form-wrapper']],
          '#prefix' => '<div class="webform-flex webform-flex--3"><div class="webform-flex--container">',
          '#suffix' => '</div></div>',
          '#states' => [
            'visible' => [
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'convening']],
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'education_forum']],
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'implementation_planning_worksho']],
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'meeting']],
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'speaking_engagement']],
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'training_delivery']],
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'event']],
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'webinar']],
            ],
          ],
        ],
        'activity_total_material_dist' => [ '#type' => 'number', '#title' => t('Total material distributed'), '#wrapper_attributes' => ['class' => ['js-form-wrapper']],
          '#prefix' => '<div class="webform-flex webform-flex--3"><div class="webform-flex--container">',
          '#suffix' => '</div></div>',
          '#states' => [
            'visible' => [
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'collateral']],
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'flyers']],
            ],
          ],
        ],
        'advertising_end_date' => [ '#type' => 'date', '#title' => t('Advertising end date'), '#wrapper_attributes' => ['class' => ['js-form-wrapper']],
          '#prefix' => '<div class="webform-flex webform-flex--3"><div class="webform-flex--container">',
          '#suffix' => '</div></div>',
          '#states' => [
            'visible' => [
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'advertising']],
            ],
          ],
        ],
        'how_assisted' => [ '#type' => 'textfield', '#title' => t('How assisted'), '#wrapper_attributes' => ['class' => ['js-form-wrapper']],
          '#prefix' => '<div class="webform-flex webform-flex--3"><div class="webform-flex--container">',
          '#suffix' => '</div></div>',
          '#states' => [
            'visible' => [
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'form_filling_assistance']],
            ],
          ],
        ],
        'total_number_assisted' => [ '#type' => 'number', '#title' => t('Total assisted'), '#wrapper_attributes' => ['class' => ['js-form-wrapper']],
          '#prefix' => '<div class="webform-flex webform-flex--3"><div class="webform-flex--container">',
          '#suffix' => '</div></div>',
          '#states' => [
            'visible' => [
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'form_filling_assistance']],
            ],
          ],
        ],
        'total_number_nudgedalerted' => [ '#type' => 'number', '#title' => t('Total nudged/alerted'), '#wrapper_attributes' => ['class' => ['js-form-wrapper']],
          '#prefix' => '<div class="webform-flex webform-flex--3"><div class="webform-flex--container">',
          '#suffix' => '</div></div>',
          '#states' => [
            'visible' => [
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'nudgealert']],
            ],
          ],
        ],
        'total_number_of_alert_sign_ups' => [ '#type' => 'number', '#title' => t('Total alert sign-ups'), '#wrapper_attributes' => ['class' => ['js-form-wrapper']],
          '#prefix' => '<div class="webform-flex webform-flex--3"><div class="webform-flex--container">',
          '#suffix' => '</div></div>',
          '#states' => [
            'visible' => [
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'alert_sign_up']],
            ],
          ],
        ],
        'total_number_of_calls' => [ '#type' => 'number', '#title' => t('Total calls'), '#wrapper_attributes' => ['class' => ['js-form-wrapper']],
          '#prefix' => '<div class="webform-flex webform-flex--3"><div class="webform-flex--container">',
          '#suffix' => '</div></div>',
          '#states' => [
            'visible' => [
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'phone_banking']],
            ],
          ],
        ],
        'total_number_of_houses' => [ '#type' => 'number', '#title' => t('Total houses'), '#wrapper_attributes' => ['class' => ['js-form-wrapper']],
          '#prefix' => '<div class="webform-flex webform-flex--3"><div class="webform-flex--container">',
          '#suffix' => '</div></div>',
          '#states' => [
            'visible' => [
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'canvassing']],
            ],
          ],
        ],
        'total_number_of_pledge_cards' => [ '#type' => 'number', '#title' => t('Total pledge cards'), '#wrapper_attributes' => ['class' => ['js-form-wrapper']],
          '#prefix' => '<div class="webform-flex webform-flex--3"><div class="webform-flex--container">',
          '#suffix' => '</div></div>',
          '#states' => [
            'visible' => [
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'pledge_cards']],
            ],
          ],
        ],
        'total_people_spoken_to' => [ '#type' => 'number', '#title' => t('Total spoken to'), '#wrapper_attributes' => ['class' => ['js-form-wrapper']],
          '#prefix' => '<div class="webform-flex webform-flex--3"><div class="webform-flex--container">',
          '#suffix' => '</div></div>',
          '#states' => [
            'visible' => [
              ['[data-webform-composite-id="' . $html_id . '--type"]' => ['value' => 'booths']],
            ],
          ],
        ],
        //'ending_markup' => ['#type' => 'markup', '#suffix' => "</div><div class=\"non-countable\"></div>"],
    ];
    return $elements;
  }

}
