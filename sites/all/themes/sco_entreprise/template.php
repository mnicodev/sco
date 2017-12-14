<?php
/**
 * Implements hook_html_head_alter().
 * This will overwrite the default meta character type tag with HTML5 version.
 */
function sco_entreprise_html_head_alter(&$head_elements) {
  $head_elements['system_meta_content_type']['#attributes'] = array(
    'charset' => 'utf-8'
  );
}

/**
 * Insert themed breadcrumb page navigation at top of the node content.
 */
function sco_entreprise_breadcrumb($variables) {
    global $language;
    $id=arg(1);
    $node=node_load($id);
    $tmp = $variables['breadcrumb'];
//print_r($tmp);
    if (!empty($tmp)) {
        /*if(is_object($node) && $node->type=="actualite") {
            $breadcrumb[]="<a href='/".$language->language."/actualites'>".t('news')."</a>";
            $exclue="actualite";
	}*/
        $breadcrumb[]=$tmp[0];
        for($i=1;$i<count($tmp);$i++) {
            if(!is_array($tmp[$i]) && $tmp[$i]!=$exclue) $breadcrumb[]=$tmp[$i];
//            else $breadcrumb[]=$tmp[$i]["data"];
        }
    // Use CSS to hide titile .element-invisible.
    //$output = '<h3 >' . t('You are here') . '</h3>';
    // comment below line to hide current page to breadcrumb
//	$breadcrumb[] = drupal_get_title();
		$output .= '<nav class="breadcrumb">'.t('You are here').' : <a href="/'.$language->language.'">'.t('home').'</a> / '  . implode(' / ', $breadcrumb) . '</nav>';
    return $output;
  }
}

function sco_entreprise_preprocess_html(&$vars) {
	drupal_add_css(drupal_get_path("theme","sco")."/css/liste_partenaires.css",array('group'=>CSS_DEFAULT,'type'=>'file'));

}
/**
 * Override or insert variables into the page template.
 */
function sco_entreprise_preprocess_page(&$vars) {
	global $language,$user;
    $type=arg(0);
	$nid=arg(1);
    if($type=="node" && isset($nid)) $vars["node"]=node_load($nid);
	$main_menu_tree = menu_tree(variable_get('menu_main_links_source', 'main-menu')); 
    $vars["autour_du_club"]=array();
    foreach($main_menu_tree as $item) {
        if($item["#original_link"]["localized_options"]["item_attributes"]["class"])
            $vars["autour_du_club"][]=array(
                "title"=>$item["#title"],
                "class"=>$item["#original_link"]["localized_options"]["item_attributes"]["class"],
                "url"=>$item["#href"]
            );
	}
	// entete d'une page
	if(arg(0)!="user") $vars["entete"]="/".drupal_get_path("theme","sco_entreprise")."/img/fond_partenaire.jpg";
	if($nid=="term") {
		$term=taxonomy_term_load(arg(2));
		/*if($term->vocabulary_machine_name=="partenaires") 
			$vars["entete"]="/".drupal_get_path("theme","sco_entreprise")."/img/fond_partenaire.jpg";*/
		$vars["term"]=$term;
	}
	if($vars["node"]->field_fond_entete["und"][0]["uri"]) 
		$vars["entete"]=file_create_url($vars["node"]->field_fond_entete["und"][0]["uri"]);

	// vérification et récupération du slider
	if($vars["is_front"] ||isset($vars["node"]->field_tags_diapo["und"][0]["tid"]) && $user->uid) {
		$view=views_get_view("slider_home");
	  	$view->execute();
		$objects = $view->result;
		$vars["slider"]=array();
		foreach($objects as $slider) {
			$item=$slider->_field_data["nid"]["entity"];
			$vars["slider"][]=array(
				"img"=>file_create_url((isset($item->field_image[$language->language])?$item->field_image[$language->language][0]["uri"]:(isset($item->field_image["fr"])?$item->field_image["fr"][0]["uri"]:$item->field_image["und"][0]["uri"]))),
				"titre"=>$item->title,
				"url"=>(isset($item->field_link["und"][0]["url"])?$item->field_link["und"][0]["url"]:""),
				"bloc"=>$item->field_bloc_info["und"][0]["value"],
			);
		}
	}

	if($vars["node"]->type=="joueur") {
		$view=views_get_view("bloc_actualites");
		$view->set_display("block_2");
		$view->execute();
		$vars["actu_joueur"]=str_replace("#JOUEUR",$vars["node"]->title,$view->render());

	}

	
//echo count($vars["slider"]);

    $voc=taxonomy_vocabulary_machine_name_load("partenaires");
    $vars["liste_partenaires"]=array();
    foreach(taxonomy_get_tree($voc->vid) as $term) {
		$tmp=taxonomy_term_load($term->tid);
		if($tmp->language=="fr") {
			$tp=taxonomy_term_load($tmp->field_type["und"][0]["tid"]);
			$type_partner=i18n_taxonomy_term_get_translation($tp, $language->language);
    	    $vars["liste_partenaires"][trim($type_partner->name)][]=array(
        	    "img"=>file_create_url($tmp->field_image["und"][0]["uri"]),
            	"url"=>(isset($tmp->field_link["und"])?$tmp->field_link["und"][0]["url"]:"#")
			);
		}
    }
  if (isset($vars['main_menu'])) {
    $vars['main_menu'] = theme('links__system_main_menu', array(
      'links' => $vars['main_menu'],
      'attributes' => array(
        'class' => array('links', 'main-menu', 'clearfix'),
      ),
      'heading' => array(
        'text' => t('Main menu'),
        'level' => 'h2',
        'class' => array('element-invisible'),
      )
    ));
  }
  else {
    $vars['main_menu'] = FALSE;
  }
  if (isset($vars['secondary_menu'])) {
    $vars['secondary_menu'] = theme('links__system_secondary_menu', array(
      'links' => $vars['secondary_menu'],
      'attributes' => array(
        'class' => array('links', 'secondary-menu', 'clearfix'),
      ),
      'heading' => array(
        'text' => t('Secondary menu'),
        'level' => 'h2',
        'class' => array('element-invisible'),
      )
    ));
  }
  else {
    $vars['secondary_menu'] = FALSE;
  }
}

/**
 * Duplicate of theme_menu_local_tasks() but adds clearfix to tabs.
 */
function sco_entreprise_menu_local_tasks(&$variables) {
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
function sco_entreprise_preprocess_node(&$variables) {
  $variables['submitted'] = t('By !username on !datetime', array('!username' => $variables['name'], '!datetime' => $variables['date']));
  if ($variables['view_mode'] == 'full' && node_is_page($variables['node'])) {
    $variables['classes_array'][] = 'node-full';
  }
}

function sco_entreprise_preprocess_taxonomy_term(&$variables) {
    $tid=$variables["tid"];
    $name=$variables["name"];
    if(strtolower($name)=="club") {
        $childrens=taxonomy_get_children($tid);
        $variables["club"]=array();
        $variables["club"]["content"]=$variables["content"]["description"]["#markup"];
       foreach($childrens as $children){ 
            $variables["club"]["child"][]=array(
                "title"=>$children->name,
                "url"=>(isset($children->field_link["und"])?$children->field_link["und"][0]["url"]:""),
                "img"=>file_create_url($children->field_image["und"][0]["uri"])
            );
        }

    }
}


function sco_entreprise_theme(&$existing, $type, $theme, $path) {
	$hooks['user_login'] = array(
    	'template' => 'templates/user_login',
	    'render element' => 'form',
  	);
	$hooks['user_register_form'] = array(
    	'template' => 'templates/user_register',
		'render element' => 'form',
		 'preprocess functions' => array('sco_entreprise_preprocess_user_register')
	 );

	$hooks['user_pass'] = array(
	    'render element' => 'form',
    	'template' => 'templates/user_password',
	    'preprocess functions' => array('sco_entreprise_preprocess_user_pass'),
  	);
  return $hooks;
}

function sco_entreprise_preprocess_user_pass(&$variables) {
  $variables['intro_text'] = t('request a new password');
  $variables['form']["name"]["#prefix"]="";
}


function sco_entreprise_preprocess_user_login(&$variables) {
  $variables['intro_text'] = t('log in with your company account');
  $variables['form']["name"]["#prefix"]="";
}
function sco_entreprise_preprocess_user_register(&$variables) {
  $variables['intro_text'] = $variables['form']["account"]["name"]["#prefix"]; //t("register");
  $variables['form']["account"]["name"]["#prefix"]="";
}
