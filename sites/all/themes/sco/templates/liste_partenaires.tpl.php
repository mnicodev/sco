
            <ul class="liste_partenaires">
            <?php $i=1;foreach($liste_partenaires as $id=>$partenaires):?>
            <li class="partenaires partenaire-<?php print $i++; ?>">
                <h4><?php print t($id); ?></h4>
                <ul >
                <?php foreach($partenaires as $id=>$partenaire): ?>
                <li><img src="<?php print $partenaire['img']; ?>" title="" alt="" /></li>
                <?php endforeach; ?>
                </ul>
            </li>
            <?php endforeach;?>
            </ul>
