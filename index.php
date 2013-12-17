<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Wp_Bootstrap
 * @since Wp Bootstrap 1.0
 */

	// Gets header.php

	get_header();?>


<?php
function show_parents_names($post, $first) {
   $str = "";

   if ($post->post_parent) {
      $str = show_parents_names(get_post($post->post_parent), $first) ."&nbsp;/&nbsp;";
   }  

   $name = get_the_title($post->ID);
   
   if ($post->ID == $first->ID) {
      return $str ."<strong>$name</strong>";
   }
   else {
      return $str ."<a href=\"" .get_permalink($post->ID) ."\">$name</a>";
   }
}

if (get_field('wpcf-menu_izq_id')) {
$menu_slug = get_field('wpcf-menu_izq_id');
?>
<div class="nav_tipo2_secL">
<?php 
#wp_nav_menu( array('menu' => $menu_slug, 'container' => false, 'menu_id'=> 'menu_izq', 'start_in'=>$post->ID, 'depth' => 2)); 
?>
</div>
<script type="text/javascript">
$(function() {
   $("div#pactivo").width("75%");
   $("ul#menu_izq ul.sub-menu").attr('id', "n3");
});
</script>
<?php } ?>
		<?php


echo '<div class="page-wrapper">';
echo '<div class="content-wrapper">';
echo '<div class="sixteen columns">';
echo '<div class="container">';
echo '<em>Está usted en ' .show_parents_names($post, $post) .'</em>';

echo '<h1 class="gdl-page-title gdl-title title-color">';
				the_title();
echo '</h1><br>';
echo '<div class="gdl-page-caption gdl-divider" > </div><br>';

if (get_field('wpcf-new_menu_page')) {
$menu_slug = get_field('wpcf-new_menu_page');
?>
<div class="nav_tipo2_secL">
<?php wp_nav_menu( array('menu' => $menu_slug, 'container' => false, 'menu_id'=> 'n2', 'start_in'=>$post->ID, 'depth' => 3)); ?>
</div>
<script type="text/javascript">
$(function() {
   $("div#pactivo").width("75%");
   $("ul#n2 ul.sub-menu").attr('id', "n3");
});
</script>
<?php } ?>

<?php 
the_content();
wp_link_pages(); 

if (get_field('wpcf-menu_title')) {
?>
<div class="modulodcha">
<div class="bcont">
<div class="sumario">
<h3 class="tipo1"><?php the_field('wpcf-menu_title');?></h3>
<div class="sumario"><?php the_field('wpcf-menu_content');?></div>
</div>
</div>
</div>
<?php } else { ?>
<script type="text/javascript">
$(function() {
   $(".moduloizda").width("100%");
});
</script>
<?php } ?>

<?php 
echo '</div>';
echo '</div>';
echo '</div>';


		?>

	<div class="clear"></div>
</div>
<?php	// Gets footer.php
	get_footer(); 
?>
