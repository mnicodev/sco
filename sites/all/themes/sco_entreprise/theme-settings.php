<?php
/**
 *
 */


function sco_form_system_theme_settings_alter(&$form, &$form_state) {
	$form['sco_settings'] = array(
    '#type' => 'fieldset',
    '#title' => t('Sco Theme Settings'),
    '#collapsible' => FALSE,
    '#collapsed' => FALSE,
	);

	$form['sco_settings']["facebook"] = array(
		"#type"=>"textfield",
		"#title"=>"Facebook",
		"#default_value"=>theme_get_setting("facebook","sco")
	);
	$form['sco_settings']["twitter"] = array(
		"#type"=>"textfield",
		"#title"=>"Twitter",
		"#default_value"=>theme_get_setting("twitter","sco")
	);
	$form['sco_settings']["instagram"] = array(
		"#type"=>"textfield",
		"#title"=>"Instagram",
		"#default_value"=>theme_get_setting("instagram","sco")
	);


}
