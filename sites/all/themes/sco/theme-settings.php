<?php
/**
 *
 */


function sco_form_system_theme_settings_alter(&$form, &$form_state) {
	$form['sco_settings_seo'] = array(
    '#type' => 'fieldset',
    '#title' => t('Configuration SEO'),
    '#collapsible' => FALSE,
    '#collapsed' => FALSE,
);
	$form['sco_settings_seo']["keywords"] = array(
		"#type"=>"textfield",
		"#title"=>"keywords",
		"#default_value"=>theme_get_setting("keywords","sco")
	);
	$form['sco_settings_seo']["h1"] = array(
		"#type"=>"textfield",
		"#title"=>"H1",
		"#default_value"=>theme_get_setting("h1","sco")
	);
	$form['sco_settings_seo']["h2"] = array(
		"#type"=>"textarea",
		"#title"=>"H2",
		"#default_value"=>theme_get_setting("h2","sco")
	);

	$form['sco_settings_stat']["id_team"] = array(
		"#type"=>"textfield",
		"#title"=>"Identifiant Angers SCO",
		"#default_value"=>theme_get_setting("id_team","sco")
	);


	$form['sco_settings_rs'] = array(
    '#type' => 'fieldset',
    '#title' => t('Configuration réseaux sociaux'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
);


	$form['sco_settings_rs']["facebook"] = array(
		"#type"=>"textfield",
		"#title"=>"Facebook",
		"#default_value"=>theme_get_setting("facebook","sco")
	);
	$form['sco_settings_rs']["twitter"] = array(
		"#type"=>"textfield",
		"#title"=>"Twitter",
		"#default_value"=>theme_get_setting("twitter","sco")
	);
	$form['sco_settings_rs']["instagram"] = array(
		"#type"=>"textfield",
		"#title"=>"Instagram",
		"#default_value"=>theme_get_setting("instagram","sco")
	);


}
