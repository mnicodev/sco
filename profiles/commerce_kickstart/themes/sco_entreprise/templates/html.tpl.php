<!DOCTYPE html>
<html lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">

<head>
<meta name="google-site-verification" content="" />
  <meta name="viewport" content="width=device-width, minimum-scale=0.25, maximum-scale=1.6, initial-scale=1.0" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="robots" content="index,follow" />
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <?php print $styles; ?>
  <?php print $scripts; ?>
  
  <?php //if($is_front): ?>
<script>
  	jQuery(document).ready(function () {
		if(jQuery(".slider-home > *").length>1)
  			jQuery('.slider-home').bxSlider({
			  mode: 'fade',
			  captions: true,
			 auto: true
			});
  	
        jQuery('#autour_du_club ul').bxSlider({
            mode: 'horizontal',
            minSlides: 1,
            maxSlides: 4,
            moveSlides: 1,
            slideWidth: 218,
            pager: false,
            slideMargin: 1
        })
  })
  	
  </script>
  <?php //endif; ?>

  
  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>

<body class="<?php print $classes; ?> sco-entreprise" <?php print $attributes;?>>
<a id="retour_haut" style=""></a>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
</body>

</html>
