<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>
<?php foreach ($fields as $id => $field): ?>
<?php 
if($id=="created") {
    $tmp=explode("|",strip_tags($field->content));
    if($tmp[0]==date("d")) {
        $datetime_post=new DateTime($tmp[2]."-".$tmp[1]."-".$tmp[0]." ".$tmp[3].":".$tmp[4]);
        $datetime_now=new DateTime(date("Y-m-d H:i"));
        $interval=$datetime_post->diff($datetime_now);
        $duration=$interval->format("%Hh%I");
        $content="Il y a ".$duration." - ";
    }else {
        $datetime_post=new DateTime($tmp[2]."-".$tmp[1]."-".$tmp[0]);
        $datetime_now=new DateTime(date("Y-m-d"));
        $interval=$datetime_post->diff($datetime_now);
        $duration=$interval->format("%a");
        if((int)$duration>1) $content="Il y a ".$duration." jours - ";else $content="Il y a ".$duration." jour - ";

    }
} else $content=$field->content;
?>
  <?php if (!empty($field->separator)): ?>
    <?php print $field->separator; ?>
  <?php endif; ?>

  <?php print $field->wrapper_prefix; ?>
    <?php print $field->label_html; ?>
    <?php print $content; ?>
  <?php print $field->wrapper_suffix; ?>
<?php endforeach; ?>
