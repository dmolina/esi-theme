<?php 
/**
 * Default Header
 *
 * @package WordPress
 * @subpackage Wp_Bootstrap
 * @since Wp Bootstrap 1.0
 *
 */?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php wp_title( '|', true, 'right' ); bloginfo('name'); ?></title>
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
<!-- Place somewhere in the <head> of your document -->
<link rel="stylesheet" href="flexslider.css" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script src="jquery.flexslider.js"></script>

<!-- Place in the <head>, after the three links -->
<script type="text/javascript" charset="utf-8">
  $(window).load(function() {
    $('.flexslider').flexslider();
  });
</script>
 
  <?php 
  // Fires the 'wp_head' action and gets all the scripts included by wordpress, wordpress plugins or functions.php 
  // using wp_enqueue_script if it has $in_footer set to false (which is the default)
  wp_head(); ?>
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/respond.min.js"></script>
  <![endif]-->
</head>
<body <?php body_class(); ?>>
  <div class="container">
	<div class="row">
		<div class="col-md-8">
			<h1><a href=<?php the_permalink(); ?> ><img src="<?php print IMAGES; ?>/LogoESI.png" alt="Escuela Superior de Ingeniería de Cádiz"></a></h1>
		</div>
		<div class="col-md-4">
			  <!-- Mobile display -->
			  
			  <div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				  <span class="sr-only">Toggle navigation</span>
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				</button>
			  </div>
				   
			  <!-- Collect the nav links for toggling -->

		
			<div class="top-navigation-left">
			  <?php // Loading WordPress Custom Menu

				 wp_nav_menu( array(
				    'menu_id'         => 'main-menu'
				) );
			  ?>
	
			
			</div>
			<div class="header-wrapper">
			<div class="inner-header-wrapper">
<!-- Get Search -->
				<?php if(get_option(THEME_SHORT_NAME.'_enable_top_search','enable') == 'enable'){?>
				<div class="search-wrapper"><?php get_search_form(); ?></div> 
				<?php } ?>
			</div>
			</div>
		</div>
	</div>


  
      <!-- Mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
           
      <!-- Collect the nav links for toggling -->
<div class="row">
	<div class="header-wrapper">
		<div class="inner-header-wrapper">
			<div class="sixteen columns mb0">
			<div class="navigation-wrapper">
			  <?php // Loading WordPress Custom Menu
/*
				 wp_nav_menu( array(
				    'container' => 'div',
					'container_class' => 'menu-wrapper',
					'container_id' => 'main-superfish-wrapper',
				    'menu_class'      => 'sf-menu',
				    'menu'         => 'Nuevo secundario',
					'depth' => 4,
				    'walker'          => new Cwd_wp_bootstrapwp_Walker_Nav_Menu()
				) );
*/
if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Menu Widget') ) : endif;
			  ?>
			<div class="social-wrapper">
						<div class="social-icon-wrapper">
						</div>
			</div>
			</div>
		</div>
		</div>
	</div>
	  <div class="social-icon">
		<a href="' . $social_link . '" target="_blank">
			<img src="" alt=""/>
		</a>
	  </div>
</div>
    
