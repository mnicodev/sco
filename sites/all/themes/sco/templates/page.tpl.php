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
?>


<div id="container">
	<section id="header_top">
		<div class="navbar">
			<div class=""><?php print render($page["header_top"]);?></div>
		</div>
	</section>
	
	
	
	<section id="content" class="">
		<aside id="left_column" class="">
		<?php if ($logo): ?>
			<div id="logo">
				<a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
				<img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
				</a>
			</div>
		<?php endif; ?>
		<div id="burger">
			<img src="/misc/logo_sco.png" class="logo" />
			<div class="burger"></div>
		</div>
		<?php //if($is_front) : ?>
			<div id="block-menu-menu-menu-institutionnel">
			<?php
				$main_menu_tree = menu_tree( 'menu-menu-institutionnel'); //menu_tree_all_data('menu-menu-institutionnel');   //menu_tree( 'menu-menu-institutionnel');//print_r( $main_menu_tree);
			//	print drupal_render($main_menu_tree);
				include "main-menu.tpl.php";

			?>
			</div>
		<?php //endif;?>
		<?php print render($page["sidebar_first"]);?>
		</aside>
		<div id="main_column" class="content ">
			<?php include("slider.tpl.php"); ?>
			<div class="container">

				<div class="content <?php if($is_front) echo '' ?>">
					<?php if($page["content_top"]): ?>
						<div id="content_top" class=""><?php print render($page["content_top"]); ?></div>
					<?php endif; ?> 
					<?php print render($page["header"]);?>
					<h1><?php print $title; ?></h1>
					<?php if(isset($fond_ecran["desc"])): ?>
					<p><?php print $fond_ecran["desc"]; ?></p>
					<?php endif; ?> 
					
					<?php $content=str_replace("#SHARE",t('Share to'),render($page["content"]));?>
					<?php $content=str_replace("show more",t('show more'),$content);?>
					<?php if($page["content_map"]): ?>
						<div id="content_map" class=""><?php print render($page["content_map"]); ?></div>
					<?php endif; ?> 
					<?php print $content; ?>
				<?php if(isset($node)): ?>
				<div class='retour'>
				<?php if($node->type=="actualite"): ?>
					<a href="/<?php print $language->language; ?>/actualites-infos"><?php print t("return to article"); ?></a>
				<?php endif;?>
				<?php if($node->type=="article"): ?>
					<a href="/<?php print $language->language; ?>/fondation"><?php print t("return to fondation"); ?></a>
				<?php endif;?>
				<?php if($node->type=="joueur"): ?>
					<a href="/<?php print $language->language; ?>/equipe-pro/effectif"><?php print t("return to list of player"); ?></a>
				<?php endif;?>
				</div>
				<?php 
				if($node->type=="joueur"){
					print $actu_joueur;
				}
				?>
				<?php endif;?>
				</div>
			</div>
			<?php if($page["content_bottom"]): ?>
				<div id="content_bottom" class=""><?php print render($page["content_bottom"]); ?></div>
			<?php endif; ?> 
            <?php if($liste_partenaires): ?>
			<div id="liste_partenaires">
			<?php include("liste_partenaires.tpl.php"); ?>
            </div>
            <?php endif; ?>

            <?php if($page["footer_top"]): ?>
                <div id="footer_top"><?php print render($page["footer"]); ?></div>
            <?php endif; ?>

            <?php if($page["footer"]): ?>
                <footer><?php print render($page["footer"]); ?></footer>
            <?php endif; ?>

			
		</div>
	</section>


</div>


