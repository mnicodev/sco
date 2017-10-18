<!DOCTYPE html>
<html lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">

<head>
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  
  <?php print $styles; ?>
  <?php print $scripts; ?>
  
  <?php if($is_front): ?>
  <script>
  jQuery(document).ready(function () {
  		jQuery('.slider-home').bxSlider({
		  mode: 'fade',
		  captions: true,
		 auto: true
		});
  	
        jQuery('.view-autour-du-club ul').bxSlider({
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
  <?php endif; ?>

  
  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>

<body class="<?php print $classes; ?>" <?php print $attributes;?>>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
</body>

</html>
