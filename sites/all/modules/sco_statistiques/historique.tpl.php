	<div class="carriere">
		<label><?php print t('career'); ?></label>
		<ul class="titre">
			<li><?php print t("season"); ?></li>
			<li><?php print t("club"); ?></li>
			<li><?php print t("championship"); ?></li>
			<li><?php print t("matchs"); ?></li>
			<li><?php print t("goals"); ?></li>
		</ul>
		<?php foreach($carriere as $saison=>$item): ?>
		<?php if($saison=="total"): ?>
		<ul class="total">
			<li>Total</li>
			<li>&nbsp;</li>
			<li>&nbsp;</li>
			<li><?php print $item["matchs"]; ?></li>
			<li><?php print $item["buts"]; ?></li>
		</ul>
		<?php else: ?>
		<ul class="item">
			<li><?php print $saison."-".($saison+1); ?></li>
			<li><?php print $item["team"]; ?></li>
			<li><?php print $item["ligue"]; ?></li>
			<li><?php print $item["apparitions"]; ?></li>
			<li><?php print $item["buts"]; ?></li>
		</ul>
		<?php endif ?>
		<?php endforeach; ?>
	</div>

