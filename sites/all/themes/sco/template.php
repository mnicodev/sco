<?php
/**
 * Implements hook_html_head_alter().
 * This will overwrite the default meta character type tag with HTML5 version.
 */
function sco_html_head_alter(&$head_elements) {
  $head_elements['system_meta_content_type']['#attributes'] = array(
    'charset' => 'utf-8'
  );
}

/**
 * Insert themed breadcrumb page navigation at top of the node content.
 */
function sco_breadcrumb($variables) {
    global $language;
	$id=arg(1);
	$node=node_load($id);
	$tmp = $variables['breadcrumb'];
//	print_r($tmp);
	if(strip_tags($tmp[1])=="Médiathèque") {
		$tmp[1]=str_replace("Médiathèque","Vidéos",$tmp[1]);
	}
    if (!empty($tmp)) {
		$term=current(taxonomy_get_term_by_name(arg(2)));
		if($term->vocabulary_machine_name=="tags_album") {

		}
        /*if(is_object($node) && $node->type=="actualite") {
            $breadcrumb[]="<a href='/".$language->language."/actualites'>".t('news')."</a>";
            $exclue="actualite";
	}*/
		if($id=="fonds-ecran" && arg(2)) {
			$tmp[1]="<a href='/".$language->language."/".arg(0)."/".arg(1)."'>".(is_array($tmp[1])?$tmp[1]["data"]:$tmp[1])."</a>";
			$tmp[2]=arg(2);
		}
		if(arg(0)=="actualites-infos" && arg(1)) {
			$tmp[0]="<a href='/".$language->language."/".arg(0)."'>".$tmp[0]."</a>";
			$tmp[1]=arg(1);

		}
		$breadcrumb[]=$tmp[0];
        for($i=1;$i<count($tmp);$i++) {
            if(!is_array($tmp[$i]) && $tmp[$i]!=$exclue) $breadcrumb[]=$tmp[$i];
//            else $breadcrumb[]=$tmp[$i]["data"];
        }
    // Use CSS to hide titile .element-invisible.
    //$output = '<h3 >' . t('You are here') . '</h3>';
    // comment below line to hide current page to breadcrumb
//	$breadcrumb[] = drupal_get_title();
		$output .= '<nav class="breadcrumb">'.t('You are here').' : <a href="/'.$language->language.'">'.t("home").'</a> / '  . implode(' / ', $breadcrumb) . '</nav>';
    return $output;
  }
}

function sco_preprocess_html(&$vars) {
	drupal_add_css(drupal_get_path("theme","sco")."/css/liste_partenaires.css",array('group'=>CSS_DEFAULT,'type'=>'file'));

}
/**
 * Override or insert variables into the page template.
 */
function sco_preprocess_page(&$vars) {

	global $language;
	$term=current(taxonomy_get_term_by_name(arg(2)));
	$vars["fond_ecran"]=array();
	if(is_object($term)) {
		$vars["fond_ecran"]=array("titre"=>$term->name,"desc"=>$term->description);
		$vars["title"]=$term->name;
	}
    $type=arg(0);
    $nid=arg(1);
    if($type=="node" && isset($nid)) $vars["node"]=node_load($nid);
	$main_menu_tree = menu_tree(variable_get('menu_main_links_source', 'main-menu')); 
    $vars["autour_du_club"]=array();
    foreach($main_menu_tree as $item) {
        if(isset($item["#original_link"]["localized_options"]["item_attributes"]["class"]) && $item["#original_link"]["localized_options"]["item_attributes"]["class"])
            $vars["autour_du_club"][]=array(
                "title"=>$item["#title"],
                "class"=>$item["#original_link"]["localized_options"]["item_attributes"]["class"],
                "url"=>$item["#href"]
            );
	}
	$alias=drupal_get_path_alias("node/".arg(1));
	if($vars["is_front"] || $alias=="fondation") {
		$view=views_get_view("diaporama");
		if($alias=="fondation"){ $view->set_display("fondation");}
	  	$view->execute();
		$objects = $view->result;
		$vars["slider"]=array();
		foreach($objects as $slider) {
			$item=$slider->_field_data["nid"]["entity"];
			$url="#";
			$url="/".$language->language."/".drupal_get_path_alias("node/".$item->nid);
			$vars["slider"][]=array(
				"img"=>file_create_url((isset($item->field_image[$language->language])?$item->field_image[$language->language][0]["uri"]:(isset($item->field_image["fr"])?$item->field_image["fr"][0]["uri"]:$item->field_image["und"][0]["uri"]))),
				"titre"=>$item->title,
				"url"=>$url
			);
		}
	}

	if($vars["is_front"]) {
		$view=views_get_view("autour_du_club");
	  	$view->execute();
		$objects = $view->result;
		$vars["autour_du_club"];
		$url="";
		foreach($objects as $slider) {
			$url="#";
			$item=$slider->_field_data["tid"]["entity"];
			$url=$item->field_link["und"][0]["url"];
			$vars["autour_du_club"][]=array(
				"img"=>file_create_url((isset($item->field_image[$language->language])?$item->field_image[$language->language][0]["uri"]:(isset($item->field_image["fr"])?$item->field_image["fr"][0]["uri"]:$item->field_image["und"][0]["uri"]))),
				"titre"=>$item->name,
				"url"=>$url
			);


		}
		//print_r($vars["autour_du_club"]);
	}

	if(isset($vars["node"]) && $vars["node"]->type=="joueur") {
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


  if(isset($vars["node"])) {
	  $suggests = &$vars['theme_hook_suggestions'];

    	$args = arg();
    	unset($args[0]);

    // Set type.
	    $type = "page__type_{$vars['node']->type}";

    // Bring it all together.
	    $suggests = array_merge(
    		$suggests,
		    array($type),
		    theme_get_suggestions($args, $type)
    	);
  }
}

/**
 * Duplicate of theme_menu_local_tasks() but adds clearfix to tabs.
 */
function sco_menu_local_tasks(&$variables) {
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
function sco_preprocess_node(&$variables) {
  $variables['submitted'] = t('By !username on !datetime', array('!username' => $variables['name'], '!datetime' => $variables['date']));
  if ($variables['view_mode'] == 'full' && node_is_page($variables['node'])) {
    $variables['classes_array'][] = 'node-full';
  }
  
  if($variables['node']->type=="joueur") {
	  	$carriere=null;
	
		$total=array(
			"matchs"=>0,
			"buts"=>0
		);
		if(date("m")>=8 && date("m")<=12) $saison=date("Y");
		else $saison=date("Y")-1;
		
		if(isset($variables['node']->field_id_player["und"][0]["value"]))$player_id=$variables['node']->field_id_player["und"][0]["value"];
		else $player_id=search_id_player($variables['node']->title);
		//echo $player_id;exit;
		$ligue[0]="fran";
		$ligue[1]="fran2";
		$id_ligue=0;
	
		while(true){
			$saison--;
			$json=json_decode(get_json("http://api.stats.com/v1/stats/soccer/".$ligue[$id_ligue]."/stats/players/".$player_id."?season=".$saison."&",$ligue[$id_ligue]));
			if(isset($json->message) && $json->message=="Data not found") {
				$id_ligue++;
				if($id_ligue>=count($ligue)) break;
			} else {
	
				$rs=current(current(current(current(current($json->apiResults)->league->players)->seasons)->eventType)->splits);
				$carriere[$saison]=array(
					"buts"=>$rs->playerStats->goals->total,
					"passes"=>$rs->playerStats->assists->total,
					"apparitions"=>$rs->playerStats->gamesPlayed,
					"minutes_jouees"=>$rs->playerStats->minutesPlayed,
					"team"=>$rs->team->displayName,
					"ligue" => current($json->apiResults)->league->displayName,
				);
	
				$total["matchs"]+=$total["matchs"]+$rs->playerStats->gamesPlayed;
				$total["buts"]+=$total["buts"]+$rs->playerStats->goals->total;
	
				//sleep(1);
			}
	
		}
		$carriere["total"]=$total;	
		$data["carriere"]=$carriere;
		
		
	
	 	$variables["carriere"]=theme("sco_statistiques_historique",$data);
	 	//print_r($variables["carriere"]);exit;
 	}
}

function sco_preprocess_taxonomy_term(&$variables) {
    $tid=$variables["tid"];
    $name=$variables["name"];
	$childrens=taxonomy_get_children($tid);//echo count($childrens);
    if(count($childrens) || strtolower($name)=="club") {
        $childrens=taxonomy_get_children($tid);
        $variables["menu_bloc"]=array();
        if(isset($variables["content"]["description"])) $variables["menu_bloc"]["content"]=$variables["content"]["description"]["#markup"];
        foreach($childrens as $children){ 
            $variables["menu_bloc"]["child"][]=array(
                "title"=>$children->name,
                "url"=>(isset($children->field_link["und"])?$children->field_link["und"][0]["url"]:""),
                "img"=>file_create_url($children->field_image["und"][0]["uri"])
            );
        }

    }
}


