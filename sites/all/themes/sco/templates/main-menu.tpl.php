<?php
$url=arg(0);
function view_menu($menu) {
	global $language;
	print "<ul class='dropdown-menu'>";
	foreach($menu as $key=>$smenu) if(is_numeric($key)) {
		print "<li class='".implode(", ",$smenu["#attributes"]["class"])."'>";
		if($smenu["#href"]=="<nolink>") $url=$language->language."/#";
		else {
			preg_match("/^http/",$smenu["#href"],$reg);
			if(count($reg)) $url=$smenu["#href"];
			else $url="/".$language->language."/".drupal_get_path_alias($smenu["#href"]);
		}

		print "<a href='".$url."' class='".(isset($smenu["#localized_options"]["attributes"]["class"])?implode(", ",$smenu["#localized_options"]["attributes"]["class"]):"")."'>".$smenu["#title"]."</a>";
		if(count($smenu["#below"])) view_menu($smenu["#below"]);
		print "</li>";
	}
	print "</ul>";
}

?>

<ul class="menu nav">
<?php foreach($main_menu_tree as $key=>$menu): ?>
<?php if(is_numeric($key)): ?>
<li class="<?php print implode(', ',$menu['#attributes']['class']); ?> <?php if($url==drupal_get_path_alias($menu['#href'])) echo ', active-trail';?>">
	<a href="/<?php print $language->language."/".drupal_get_path_alias($menu['#href']); ?>"><?php print $menu["#title"]; ?></a>
	<?php if(count($menu["#below"])): ?>
	<?php view_menu($menu["#below"]); ?>
	<?php endif; ?>
<?php
if(arg(0)=="mediaclub" && (arg(1)=="fonds-ecran" || arg(1)=="wallpapers") && ($menu["#original_link"]["mlid"]==1440 || $menu["#original_link"]["mlid"]==1729) && !count($menu["#below"])) {
	$smenu=db_select("menu_links","m")
		->fields("m")
		->condition("m.plid",$menu["#original_link"]["mlid"])
		->orderBy("weight")
		//->condition("m.language",$language->language)
		->execute()->fetchAll();
	print "<ul class='dropdown-menu'>";
	foreach($smenu as $m) {
		$opions=unserialize($m->options);
		preg_match("/^http/",$m->link_path,$reg);
		if(count($reg)) $url=$m->link_path;
		else $url="/".$language->language."/".drupal_get_path_alias($m->link_path);
//		print_r($m);
		print "<li class='".(($m->link_title=="Fonds d'écran" ||$m->link_title=="Wallpapers")?"active-trail":"")."'>";
		print "<a href='".$url."'>".$m->link_title."</a>";
		print "</li>";

	}

	print "</ul>";
}
?>

</li>
<?php endif; ?>
<?php endforeach; ?>
</ul>
