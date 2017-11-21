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
 */
//print_r($content);
?>
<div id="taxonomy-term-<?php print $term->tid; ?>" class="<?php print $classes; ?>">
<?php if(isset($club)):?>
<div class="field-description"><?php print $club["content"]; ?></div>
<div class="club">
<?php foreach($club["child"] as $child): ?>
<div class="child" style="background-image:url(<?php print $child['img'];?>)">
<a href="<?php print $child['url'];?>"><?php print $child["title"]; ?></a>
</div>
<?php endforeach; ?>
</div>

<?php else: ?>
  <?php if (!$page || $term->vocabulary_machine_name): ?>
    <h2><?php print $term_name; ?></h2>
  <?php endif; ?>

  <div class="content">
	<?php if($term->vocabulary_machine_name): ?>
	<?php print render($content["description"]); ?>
	<?php $adresse=render($content["field_adresse"]); ?>
	<?php print render($content["field_images_fiche_partenaires"]); ?>
	<?php print str_replace($content["field_entreprise"]["#title"].":",$content["field_entreprise"]["#title"],render($content["field_entreprise"])); ?>
	<?php print str_replace(":","",render($content["field_activite"])); ?>
	<?php print str_replace($content["field_expertise"]["#title"].":",$content["field_expertise"]["#title"],render($content["field_expertise"])); ?>
	<?php print str_replace($content["field_dirigeant"]["#title"].":",$content["field_dirigeant"]["#title"],render($content["field_dirigeant"])); ?>
	<?php print str_replace($content["field_adresse"]["#title"].":",$content["field_adresse"]["#title"],$adresse); ?>
	<?php print str_replace($content["field_telephone"]["#title"].":",$content["field_telephone"]["#title"],render($content["field_telephone"])); ?>
	<?php print str_replace($content["field_email"]["#title"].":",$content["field_email"]["#title"],render($content["field_email"])); ?>
	<?php else: ?>
	<?php print render($content); ?>
	<?php endif; ?>
  </div>
<?php endif; ?>
</div>
