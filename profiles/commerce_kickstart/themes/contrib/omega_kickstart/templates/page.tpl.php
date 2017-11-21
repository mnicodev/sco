<?php 
/**
 * @file
 * Alpha's theme implementation to display a single Drupal page.
 */
?>

<div<?php print $attributes; ?>>
  <?php if (isset($page['header'])) : ?>
    <?php print render($page['header']); ?>
    <!-- <div class="couv-boutique"></div> -->
  <?php endif; ?>
  
  <?php if (isset($page['content'])) : ?>
    <?php print render($page['content']); ?>
  <?php endif; ?>  
  
  <?php if (isset($page['footer'])) : ?>

<!-- FOOTER BOUTIQUE -->

  	<section id="zone-footer-wrapper" class="zone-wrapper zone-footer-wrapper clearfix reassurance">
  		<div id="zone-footer" class="zone zone-footer clearfix container-24">
  			<div class="reassurance-item">
  				<div class="cb"></div>
  				<p>Paiement <br/>100% sécurisé</p>
  			</div>

  			<div class="reassurance-item">
  				<div class="colis"></div>
  				<p>Livraison offerte<br/> dès 80€ d’achat<br/><span style="text-transform:none; font-weight:300;">Hors billetterie</span></p>
  			</div>

  			<div class="reassurance-item">
  				<div class="sco-footer"></div>
  				<p>Produits <br/>100% officiels</p>
  			</div>

  			<div class="reassurance-item">
  				<div class="phone"></div>
  				<p>Paiement <br/>100% sécurisé</p>
  			</div>

  		</div>
  	</section>

  	<section id="zone-footer-wrapper" class="zone-wrapper zone-footer-wrapper clearfix reassurance">
  		<div id="zone-footer" class="zone zone-footer clearfix container-24" style="text-align: center;">
  			<div class="footer-center">
	  			<h4 class="footer">Suivez-nous</h4>
	  			<ul class="social-footer">
	  				<li class="facebook"><a href="#"></a></li>
	  				<li class="twitter"><a href="#"></a></li>
	  				<li class="insta"><a href="#"></a></li>
	  			</ul>
  			</div>
  		</div>
  	</section>
  	
		<?php if(isset($liste_partenaires)): ?>
       <section id="liste_partenaires">
            <ul class="liste_partenaires">
            <?php foreach($liste_partenaires as $id=>$partenaires):?>
            <li class="partenaires <?php print str_replace(" ","-",$id); ?>">
                <h4><?php print $id; ?></h4>
                <ul >
                <?php foreach($partenaires as $id=>$partenaire): ?>
                <li><img src="<?php print $partenaire['img']; ?>" title="" alt="" /></li>
                <?php endforeach; ?>
                </ul>
            </li>
            <?php endforeach;?>
            </ul>
       </section>
    	<?php endif; ?>
    	  	
    	<section id="menu-footer">
  		<?php
				$footer_menu_tree = menu_tree( 'menu-menu-footer');
				print drupal_render($footer_menu_tree);
			?>
		</section>
  	
  <?php endif; ?>

  <!-- FOOTER SITE VITRINE -->

<!--     <div id="liste_partenaires">
            <ul class="liste_partenaires">
              <li class="partenaires partenaires-majeurs">
                <h4>partenaires majeurs</h4>
                <ul >
                  <li><img src="http://angers-sco.test-sites.fr/sites/default/files/partenaire_scania.png" title="" alt="" /></li>
                  <li><img src="http://angers-sco.test-sites.fr/sites/default/files/partenaire_legaulois.png" title="" alt="" /></li>
                </ul>
              </li>
              <li class="partenaires partenaires-officiels">
                <h4>partenaires officiels</h4>
                <ul >
                  <li><img src="http://angers-sco.test-sites.fr/sites/default/files/partenaire_pasquier.png" title="" alt="" /></li>
                  <li><img src="http://angers-sco.test-sites.fr/sites/default/files/partenaire_atoll.png" title="" alt="" /></li>
                  <li><img src="http://angers-sco.test-sites.fr/sites/default/files/partenaire_alginouss.png" title="" alt="" /></li>
                  <li><img src="http://angers-sco.test-sites.fr/sites/default/files/partenaire_u.png" title="" alt="" /></li>
                  <li><img src="http://angers-sco.test-sites.fr/sites/default/files/partenaire_orange.jpg" title="" alt="" /></li>
                  <li><img src="http://angers-sco.test-sites.fr/sites/default/files/partenaire_kappa.png" title="" alt="" /></li>
                  <li><img src="http://angers-sco.test-sites.fr/sites/default/files/partenaire_winamax.png" title="" alt="" /></li>
                  <li><img src="http://angers-sco.test-sites.fr/sites/default/files/partenaire_boucherie.png" title="" alt="" /></li>
                </ul>
            </li>
            <li class="partenaires media-officiel">
                <h4>media officiel</h4>
                <ul >
            <li><img src="http://angers-sco.test-sites.fr/sites/default/files/partenaire_media.png" title="" alt="" /></li>
                </ul>
            </li>
                </ul>
            </div>
            
    <footer>
      <div class="region region-footer">
        <div id="block-menu-menu-menu-footer" class="block block-menu contextual-links-region">

          <div class="contextual-links-wrapper"><ul class="contextual-links"><li class="menu-list first"><a href="/fr/admin/structure/menu/manage/menu-menu-footer/list?destination=node">Lister les liens</a></li>
          <li class="menu-edit"><a href="/fr/admin/structure/menu/manage/menu-menu-footer/edit?destination=node">Modifier le menu</a></li>
          <li class="block-configure last"><a href="/fr/admin/structure/block/manage/menu/menu-menu-footer/configure?destination=node">Configurer le bloc</a></li>
          </ul></div>
            <div class="content">
              <ul class="menu nav"><li class="first leaf"><a href="/fr/nous-contacter">Nous contacter</a></li>
          <li class="leaf active"><a href="/fr" class="active">Mentions légales</a></li>
          <li class="leaf active"><a href="/fr" class="active">Conditions générales de vente</a></li>
          <li class="last leaf active"><a href="/fr" class="active">©2017 Angers Sco</a></li>
          </ul>  </div>
        </div>
      </div>

      </footer> -->

</div>