<?php if(isset($slider) && count($slider)):?>
           <div id="slider_home">
			<ul class="slider-home">
				<?php foreach($slider as $item): ?>
				<?php $img=$item['img']; ?>
				<li style="background-image: url(<?php echo $img;?>);background-position: top center;">
					<!--<img src="<?php echo $img;?>" />	-->
					<?php if($item["bloc"]!="non"): ?>
					<div class="bloc_info">
					<?php echo substr($item["titre"],0,70)." ..."; ?>
						<div class="htag">#FCLSCO</div>
						<a href="<?php print $item['url'];?>"><?php print t('more infos'); ?></a>
					</div>
					<?php endif; ?>
				</li>
				<?php endforeach; ?>
            </ul>
           </div>
<?php endif; ?>
