<?php

/**
 * @file
 * Default theme implementation to display a term.
 *
 * Available variables:
 * - $name: (deprecated) The unsanitized name of the term. Use $term_name
 *   instead.
 * - $content: An array of items for the content of the term (fields and
 *   description). Use render($content) to print them all, or print a subset
 *   such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $term_url: Direct URL of the current term.
 * - $term_name: Name of the current term.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the following:
 *   - taxonomy-term: The current template type, i.e., "theming hook".
 *   - vocabulary-[vocabulary-name]: The vocabulary to which the term belongs to.
 *     For example, if the term is a "Tag" it would result in "vocabulary-tag".
 *
 * Other variables:
 * - $term: Full term object. Contains data that may not be safe.
 * - $view_mode: View mode, e.g. 'full', 'teaser'...
 * - $page: Flag for the full page state.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the term. Increments each time it's output.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * @see template_preprocess()
 * @see template_preprocess_taxonomy_term()
 * @see template_process()
 *
 * @ingroup themeable
 *
 */
global $language;
?>
<div id="taxonomy-term-<?php print $term->tid; ?>" class="<?php print $classes; ?>">
<?php if(isset($menu_bloc)):?>
<div class="field-description"><?php print $menu_bloc["content"]; ?></div>
<div class="club">
<?php foreach($menu_bloc["child"] as $child): ?>
<?php
preg_match("/^http/",$child["url"],$reg);
if(count($reg)) $url=$child['url'];
else $url="/".$language->language.'/'.$child['url'];
?>
<div class="item">
	<a href="<?php print $url;?>">
	<div class="child" style="">
		<img src="<?php print $child['img'];?>" />
		<div class="titre"><a href="<?php print $url;?>" <?php if(count($reg)) print "target='blank'";?>><?php print $child["title"]; ?></a></div>
		<div class="survol"></div>
	</div>
	</a>
</div>
<?php endforeach; ?>
</div>

<?php else: ?>
  <?php if (!$page && $term->vocabulary_machine_name!="entete"): ?>
    <h2><a href="<?php print $term_url; ?>"><?php print $term_name; ?></a></h2>
  <?php endif; ?>

  <div class="content">
    <?php print render($content); ?>
  </div>
<?php endif; ?>
</div>
