<?php
global $language;
$test=false;
if($vocabulaire=="tags") $test=true; // on fait un test sur les tags actu pour ne lister que ceux sélectionnés
$voc=taxonomy_vocabulary_machine_name_load($vocabulaire);
$terms = entity_load('taxonomy_term', FALSE, array('vid' => $voc->vid));
?>

<form method="get" id="form_select_tags">
<label><?php print t("filtrer par :");?></label>

<select class="selectpicker">
<option value="/<?php echo $language->language; ?>/<?=$page?>"><?php print t($label); ?></option>
<?php foreach($terms as $term) {?>
<?php if(!$test || ($test && isset($term->field_page_liste_actualites["und"][0]["value"]) && $term->field_page_liste_actualites["und"][0]["value"]==1)) { ?>
<option value="/<?php echo $language->language; ?>/<?=$page?>/<?php echo $term->name; ?>" <?php if(arg(1)==$term->name ||arg(2)==$term->name) echo "selected='selected'";?>><?php echo $term->name; ?></option>
<?php } ?>
<?php } ?>
</select>
</form>