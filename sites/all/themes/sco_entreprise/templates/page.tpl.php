<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/garland.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 */
global $language;
$voir_h1=1;
if(isset($node->field_voir_h1["und"][0]["value"]) && $node->field_voir_h1["und"][0]["value"]=="non") $voir_h1=0;
?>


<div id="container">
	<section id="header_top">
		<div class="navbar">
			<div class=""><?php print render($page["header_top"]);?></div>
		</div>
	</section>
	
	<section id="header">
		<div class="container">
			<div id="logo"><a href="/<?php print $language->language; ?>/espace-entreprise"><img src="<?php print $logo; ?>" /></a></div>
			<div id="burger">
			<img src="/<?php print drupal_get_path('theme','sco_entreprise'); ?>/img/logo.png" />
				<div class="burger"></div>
			</div>
		<?php print render($page["header"]);?>
		</div>
	</section>
	
	<section id="header_bottom">
		<?php if(isset($entete) && !isset($slider)): ?>
		<div class="entete" style="background-image: url(<?php print $entete; ?>)">
		<h1><?php print $title; ?></h1>
		</div>
		<?php endif; ?>
		
		<?php include("slider.tpl.php"); ?>
		<div class=""><?php print render($page["header_bottom"]);?></div>
	</section>
	
	<?php if($page["content_top"]): ?>
	<section id="content_top">
		<div  class="container"><?php print render($page["content_top"]); ?></div>
	</section>
	<?php endif; ?> 
	
	<section id="content" class="">
		
	         
			<div class="container">
				
				<?php if(!isset($entete) && $title && $voir_h1): ?>
				<h1><?php print $title; ?></h1>
				<?php endif; ?>
					
					<?php $content=str_replace("#SHARE",t('Share to'),render($page["content"]));?>
					<?php print $content; ?>


					<?php if(isset($term) && $term->vocabulary_machine_name=="partenaires"): $url["fr"]="fr/espace-entreprise/annuaire";$url["en"]="en/corporate-space/directory";?>
					<div class="retour">
					<a href="/<?php print $url[$language->language]; ?>"><?php print t("return to list of partners"); ?></a>
					</div>
					<?php endif; ?>
					<?php if(isset($node) && $node->type=="actualite_espace_entreprise"): ?>
					<div class="retour">
						<a href="/<?php print $language->language; ?>/espace-entreprise/actualites"><?php print t("return to article"); ?></a>
					</div>
					<?php endif; ?>
					<?php if(isset($node) && $node->type=="offre"): ?>
					<div class="retour">
						<a href="/<?php print $language->language; ?>/espace-entreprise/nos-offres"><?php print t("return to our offers"); ?></a>
					</div>
					<?php endif; ?>
				

				</div>
	
	</section>
	
	<?php if($page["content_bottom"]): ?>
		<section id="content_bottom">
				<div  class="container"><?php print render($page["content_bottom"]); ?></div>
		</section>
	<?php endif; ?> 
            
            

     <?php if($page["footer_top"]): ?>
            <section id="footer_top">
                <div class="container"><?php print render($page["footer_top"]); ?></div>
              </section>
     <?php endif; ?>

            <?php if($page["footer"]): ?>
		<footer>
		<div class="">
			<div class="force-du-sco">
			<div class="network">
				<div class="item suivez-nous"><?php print t("follow us"); ?></div>
				<div class="item facebook"><a href="<?php echo theme_get_setting('facebook','sco'); ?>">Facebook</a></div>
				<div class="item twitter"><a href="<?php echo theme_get_setting('twitter','sco'); ?>">Twitter</a></div>
				<div class="item instagram"><a href="<?php echo theme_get_setting('instagram','sco'); ?>">Instagram</a></div>
			</div>
			</div>

			
            <?php if($liste_partenaires): ?>
            <div id="liste_partenaires">
            <ul class="liste_partenaires">
            <?php $i=1;foreach($liste_partenaires as $id=>$partenaires):?>
            <li class="partenaires partenaire-<?php print $i++; ?>">
                <h4><?php print $id; ?></h4>
                <ul >
                <?php foreach($partenaires as $id=>$partenaire): ?>
                <li><img src="<?php print $partenaire['img']; ?>" title="" alt="" /></li>
                <?php endforeach; ?>
                </ul>
            </li>
            <?php endforeach;?>
            </ul>
            </div>
            <?php endif; ?>
			<?php print render($page["footer"]); ?>
		</div>
		</footer>
            <?php endif; ?>

		 <?php if(isset($page["footer_bottom"])): ?>
            <section id="footer_bottom">
                <div class="container"><?php print render($page["footer_bottom"]); ?></div>
              </section>
     <?php endif; ?>	
	

</div>


