<?php if($content): ?>
<?php print $content; ?>
<?php else: ?>
<div class="saison">
<?php print t("season"); ?> <?php print $saison; ?>/<?php print $saison+1; ?>
<br>
<?php print $date; ?>
<br>
<?php print $ligue;?>
</div>

<?php
	$team_1=current($teams);
	$team_2=next($teams);
?>

<div class="fiche">
	<ul class="teams bloc">
		<li>&nbsp;</li>
		<li class="team team1"><?php print $team_1["name"]; ?></li>
		<li class="score"><?php print $team_1["score"]; ?> - <?php print $team_2["score"]; ?></li>
		<li class="team team2"><?php print $team_2["name"]; ?></li>
		<li>&nbsp;</li>
	</ul>


	<ul class="goals bloc">
		<li>&nbsp;</li>
		<li class="team1">
		<?php if(!count($team_1["goals"])): ?>&nbsp;<?php endif ?>
		<?php foreach($team_1["goals"] as $goal): ?>
		<span class="temps"><?php print $goal["time"]; ?>'</span>:<?php print $goal["joueur"]; ?><br>
		<?php endforeach; ?>
		<br>
		<?php foreach($team_1["joueurs"] as $joueur): ?>
		<?php if($joueur["carton_jaune"]) print "<div class='joueur'><span class='carton-jaune'></span>".$joueur["name"]."</div>"; ?>
		<?php endforeach; ?>
		<br>
		<?php foreach($team_1["joueurs"] as $joueur): ?>
		<?php if($joueur["carton_rouge"]) print "<div class='joueur'><span class='carton-rouge'></span>".$joueur["name"]."</div>"; ?>
		<?php endforeach; ?>
		</li>
		<li>&nbsp;</li>
		<li class="team2">
		<?php if(!count($team_2["goals"])): ?>&nbsp;<?php endif ?>
		<?php foreach($team_2["goals"] as $goal): ?>
		<span class="temps"><?php print $goal["time"]; ?>'</span>:<?php print $goal["joueur"]; ?><br>
		<?php endforeach; ?>
		<br>
		<?php foreach($team_2["joueurs"] as $joueur): ?>
		<?php if($joueur["carton_jaune"]) print "<div class='joueur'><span class='carton-jaune'></span>".$joueur["name"]."</div>"; ?>
		<?php endforeach; ?>
		<br>
		<?php foreach($team_2["joueurs"] as $joueur): ?>
		<?php if($joueur["carton_rouge"]) print "<div class='joueur'><span class='carton-rouge'></span>".$joueur["name"]."</div>"; ?>
		<?php endforeach; ?>
		</li>
		<li>&nbsp;</li>
	</ul>

	<div class="titulaires">
		<p class="titre"><?php print t("incumbents"); ?></p>
		<ul class="bloc">
			<li>&nbsp;</li>
			<li class="team1">
			<?php foreach($team_1["joueurs"] as $joueur): ?>
			<?php if($joueur["in_match"] && $joueur["game_start"]) print "<div class='joueur'>".($joueur["time_substitution"]?"<span class='temps'>(".$joueur["time_substitution"]."')</span>":"")." ".$joueur["name"]." ".$joueur["numero"]."</div>"; ?>
			<?php endforeach; ?>
			</li>
			<li>&nbsp;</li>
			<li class="team2">
			<?php foreach($team_2["joueurs"] as $joueur): ?>
			<?php if($joueur["in_match"] && $joueur["game_start"]) print "<div class='joueur'>".($joueur["time_substitution"]?"<span class='temps'>(".$joueur["time_substitution"]."')</span>":"")." ".$joueur["name"]." ".$joueur["numero"]."</div>"; ?>
			<?php endforeach; ?>
			</li>
			<li>&nbsp;</li>
		</ul>
	</div>
	<div class="remplacents">
		<p class="titre"><?php print t("replacements"); ?></p>
		<ul class="bloc">
			<li>&nbsp;</li>
			<li class="team1">
			<?php foreach($team_1["joueurs"] as $joueur): ?>
			<?php if($joueur["in_match"] && !$joueur["game_start"]) print "<div class='joueur'>".($joueur["time_substitution"]?"<span class='temps'>(".$joueur["time_substitution"]."')</span>":"")." ".$joueur["name"]." ".$joueur["numero"]."</div>"; ?>
			<?php endforeach; ?>
			</li>
			<li>&nbsp;</li>
			<li class="team2">
			<?php foreach($team_2["joueurs"] as $joueur): ?>
			<?php if($joueur["in_match"] && !$joueur["game_start"]) print "<div class='joueur'>".($joueur["time_substitution"]?"<span class='temps'>(".$joueur["time_substitution"]."')</span>":"")." ".$joueur["name"]." ".$joueur["numero"]."</div>"; ?>
			<?php endforeach; ?>
			</li>
			<li>&nbsp;</li>
		</ul>
	</div>

	<div class="officiels">
		<p class="titre"><?php print t("officials"); ?></p>
		<div class="arbitre"><span><?php print t("referee"); ?> : </span><?php print $arbitres["referee"]; ?></div>
		<?php foreach($arbitres["referee_assistant"] as $arb): ?>
		<div class="arbitres_assistants"><span><?php print t("referee assistants"); ?> : </span><?php print $arb; ?></div>
		<?php endforeach; ?>
		<div class="arbitre4"><span><?php print t("fourth referee"); ?> : </span><?php print $arbitres["fourth"]; ?></div>
		
	</div>

</div>

<?php endif ?>

