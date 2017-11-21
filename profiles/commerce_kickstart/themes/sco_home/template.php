<?php
/**
 * Implements hook_html_head_alter().
 * This will overwrite the default meta character type tag with HTML5 version.
 */
function sco_home_html_head_alter(&$head_elements) {
  $head_elements['system_meta_content_type']['#attributes'] = array(
    'charset' => 'utf-8'
  );
}

/**
 * Override or insert variables into the page template.
 */
function sco_home_preprocess_page(&$vars) {

	global $language;


    $voc=taxonomy_vocabulary_machine_name_load("partenaires");
    $vars["liste_partenaires"]=array();
    foreach(taxonomy_get_tree($voc->vid) as $term) {
        $tmp=taxonomy_term_load($term->tid);
        $vars["liste_partenaires"][trim($tmp->field_type["und"][0]["value"])][]=array(
            "img"=>file_create_url($tmp->field_image["und"][0]["uri"]),
            "url"=>$tmp->field_link["und"][0]["url"]
        );
	}


}

/**
 * Duplicate of theme_menu_local_tasks() but adds clearfix to tabs.
 */
function sco_home_menu_local_tasks(&$variables) {
  $output = '';
  if (!empty($variables['primary'])) {
    $variables['primary']['#prefix'] = '<h2 class="element-invisible">' . t('Primary tabs') . '</h2>';
    $variables['primary']['#prefix'] .= '<ul class="tabs primary clearfix">';
    $variables['primary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['primary']);
  }
  if (!empty($variables['secondary'])) {
    $variables['secondary']['#prefix'] = '<h2 class="element-invisible">' . t('Secondary tabs') . '</h2>';
    $variables['secondary']['#prefix'] .= '<ul class="tabs secondary clearfix">';
    $variables['secondary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['secondary']);
  }
  return $output;
}

/**
 * Override or insert variables into the node template.
 */
function sco_home_preprocess_node(&$variables) {
  $variables['submitted'] = t('By !username on !datetime', array('!username' => $variables['name'], '!datetime' => $variables['date']));
  if ($variables['view_mode'] == 'full' && node_is_page($variables['node'])) {
    $variables['classes_array'][] = 'node-full';
  }
}

