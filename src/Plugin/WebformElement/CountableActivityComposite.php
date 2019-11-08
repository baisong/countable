<?php

namespace Drupal\countable\Plugin\WebformElement;

use Drupal\webform\Plugin\WebformElement\WebformCompositeBase;
use Drupal\webform\WebformSubmissionInterface;

/**
 * Provides a 'countable_activity_composite' element.
 *
 * @WebformElement(
 *   id = "countable_activity_composite",
 *   label = @Translation("Countable activity composite"),
 *   description = @Translation("Provides a custom webform element."),
 *   category = @Translation("Example elements"),
 *   multiline = TRUE,
 *   composite = TRUE,
 *   states_wrapper = TRUE,
 * )
 *
 * @see \Drupal\countable\Element\CountableActivityComposite
 * @see \Drupal\webform\Plugin\WebformElement\WebformCompositeBase
 * @see \Drupal\webform\Plugin\WebformElementBase
 * @see \Drupal\webform\Plugin\WebformElementInterface
 * @see \Drupal\webform\Annotation\WebformElement
 */
class CountableActivityComposite extends WebformCompositeBase {

  /**
   * {@inheritdoc}
   */
  protected function formatHtmlItemValue(array $element, WebformSubmissionInterface $webform_submission, array $options = []) {
    return $this->formatTextItemValue($element, $webform_submission, $options);
  }

  /**
   * {@inheritdoc}
   */
  protected function formatTextItemValue(array $element, WebformSubmissionInterface $webform_submission, array $options = []) {
    $value = $this->getValue($element, $webform_submission, $options);

    $headers = ["activity_type","activity_address","description","activity_social_media_chan","start_time","end_time","event_name","activity_total_material_dist","advertising_end_date","how_assisted","total_number_assisted","total_number_nudgedalerted","total_number_of_alert_sign_ups","total_number_of_calls","total_number_of_houses","total_number_of_pledge_cards","total_people_spoken_to","total_number_of_impressions","total_htc_of_impressions"];
    $lines = [];
    $line = "";
    foreach ($headers as $header) {
      if (isset($value[$header])) {
        $line .= '"' . str_replace('"', '""', $value[$header]) . '"';
      }
      $line .= ",";
    }
    $lines[] = $line;
    return $lines;
  }

}
