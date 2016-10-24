<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title('&raquo;', true, 'right'); ?><?php bloginfo('name'); ?></title>
	
	<?php wp_head(); ?>
	
</head>

<body>

<header>
	<div class="container">
		<div class="row">
			<div class="col-xs-3 col-md-4">
				<h1><?php bloginfo('name'); ?></h1>
			</div>

			<div class="col-xs-12 col-md-8">
				<div class="header__nav">
					
					<nav class="navbar navbar-default">
					    <div class="navbar-header">
					      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					        <span class="sr-only">Toggle navigation</span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					      </button>
					      
					    </div>
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						    <?php
						        wp_nav_menu( array(
						            'theme_location' => 'menu-principal',
						            'depth' => 2,
						            'container' => false,
						            'menu_class' => 'nav navbar-nav',
						            'fallback_cb' => 'wp_page_menu',
						            //Process nav menu using our custom nav walker
						            'walker' => new wp_bootstrap_navwalker())
						        );
						    ?>
						</div><!-- /.navbar-collapse --> 		 
						    
					</nav> 
				</div>
			</div>
		</div>
	</div>
</header>


				