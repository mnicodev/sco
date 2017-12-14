<form id="form_saison">
<select name="journee" onchange="window.location='/<?php print $url; ?>?j='+this.value;" class="selectpicker">
<?php foreach($matchs as $key=>$item): ?>
<option <?php if($journee==$key) print "selected='selected'"; ?>value="<?php print $key; ?>"><?php print $key.($key==1?t("st"):($key==2?t("nd"):($key==3?t("rd"):t("th"))))." ".t("day"); ?></option>
<?php endforeach; ?>
</select>
</form>
<?php if($content): ?>
<?php print $content; ?>
<?php else: ?>
<?php $les_matchs=$matchs[$journee]; ?>

<ul class="resultats">
<?php foreach($les_matchs as $date=>$item): ?>
	<li class="mois date"><?php print $date; ?></li>
	<?php foreach($item as $match): ?>
	<li class="item match">
	<div class="ligue1"></div>
	<div class="heure"><?php print $match["heure"]; ?></div>
	<div class="team1"><?php print $match["team_1"]["name"]; ?></div>
	<div class="score"><?php print $match["team_1"]["score"]." - ".$match["team_2"]["score"]; ?></div>
	<div class="team2"><?php print $match["team_2"]["name"]; ?></div>
	</li>
	<?php endforeach; ?>
<?php endforeach; ?>
</ul>
<?php endif ?>
