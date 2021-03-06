<?php
$url=arg(0);
function view_menu($menu) {
	global $language;
	print "<ul class='dropdown-menu'>";
	foreach($menu as $key=>$smenu) if(is_numeric($key)) {
		print "<li class='".implode(", ",$smenu["#attributes"]["class"])."'>";
		if($smenu["#href"]=="<nolink>") $url=$language->language."/#";
		else $url=drupal_get_path_alias($smenu["#href"]);

		print "<a href='/".$language->language."/".$url."' class='".(isset($smenu["#localized_options"]["attributes"]["class"])?implode(", ",$smenu["#localized_options"]["attributes"]["class"]):"")."'>".$smenu["#title"]."</a>";
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
</li>
<?php endif; ?>
<?php endforeach; ?>
</ul>
