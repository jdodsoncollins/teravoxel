  <!DOCTYPE html>
  <head>
  	<!--
  	Hello source-code visitor!
  	
  	This is a home-brew WordPress theme, orignally created about 2-3 years ago but gradually updated over time.
  	
  	Please do not judge the slightly messy markup you may see. Getting WordPress to cooperate was occasionally a challenge
  	for me years ago when I first put the barebones components together. If I were to re-do this domain's contents today, I would go
  	a totally different route. But life is busy, and this WordPress & theme install is relatively lean and works fine for now. 
  
  	You may notice entries go back years, and this is because I've been migrating my better posts from when this was originally
  	teravoxel.wordpress.com, which built up a surprisingly high rank in Google for certain search terms.  
  	-->
    <meta charset="utf-8">
    <title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="//use.typekit.net/uqv8kjj.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script type="text/javascript">
	/* fix nav to top after scroll on larger devices */
	$(document).ready(function(){
		if($(window).width() > 767) {
			$(document).scroll(function(){
			 	$('nav').toggleClass('fixed_nav', $(this).scrollTop() > 240);
			 });
		}
	});
    </script>
    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
    <!-- styles -->
    <link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <?php wp_enqueue_script("jquery"); ?>
    <?php wp_head(); ?>
  </head>
  <body>
  <div id="wrap">
	<header class="wrap_pattern">
		<div class="logo" alt="<?php bloginfo('description'); ?>" id="logo" title="<?php bloginfo('name'); ?>" />
		</div>
		<nav>
			<ul>
			<li id="navbar"><?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'container_class' => 'menu-header' ) ); ?></li>
			</ul>
		</nav>
	</header>
	<div class="container">

  	