<form id="form_saison">
<select name="saison" onchange="window.location='/<?php print $url; ?>?s='+this.value;" class="selectpicker">
<?php foreach($saisons as $key=>$item): ?>
<option <?php if($saison==$key) print "selected='selected'"; ?>value="<?php print $key; ?>"><?php print t("Season")." ".$item; ?></option>
<?php endforeach; ?>
</select>

<ul class="resultats">
<?php $i=1;foreach($matchs as $key=>$mois): ?>
<li class="mois"><?php print $key; ?></li>

	<?php foreach($mois as $id=>$match): ?>
	<li class="item" onclick="window.location='/<?php print $url; ?>/<?php print $saison; ?>/<?php print $id; ?>'">
		<div class="ligue"><img src='/<?php print drupal_get_path('module','sco_statistiques').'/img/'.$match["ligue"].'.png'; ?>' /></div>
		<div class="journee"><?php if($match["ligue"]!="francup") {print $i;if($i==1) print t("st");else print t("th");?> <?php print t("day"); }else print "&nbsp;"; ?></div>
		<div class="date"><?php print $match["date"]; ?></div>
		<?php if($match["location"]=="home"): ?>
		<div class="equipe1">ANGERS SCO</div>
		<div class="score <?php if($match['sco_score']<$match['adv_score']) print 'perdu';else if($match['sco_score']>$match['adv_score']) print 'gagne'; else print 'null';?>"><?php print $match["sco_score"]; ?> - <?php print $match["adv_score"]; ?></div>
		<div class="equipe2"><?php print $match["adversaire"]; ?></div>
		<?php else: ?>
		<div class="equipe1"><?php print $match["adversaire"]; ?></div>
		<div class="score <?php if($match['sco_score']<$match['adv_score']) print 'perdu';else if($match['sco_score']>$match['adv_score']) print 'gagne'; else print 'null';?>"><?php print $match["adv_score"]; ?> - <?php print $match["sco_score"]; ?></div>
		<div class="equipe2">ANGERS SCO</div>

		<?php endif; ?>
	</li>
	<?php if($match["ligue"]!="francup") $i++; ?>
	<?php endforeach; ?>
<?php endforeach; ?>

</ul>
</form>
