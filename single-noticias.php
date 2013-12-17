<?php get_header(); ?>

<div class="content_tipo2">
<div id="compass">
<em>
Está usted : <span class='compassactivo'>Noticias</span>
</em>
</div>
</div>


<div id="pactivo">
<h2 class="page_title"><?php the_title(); ?></h2>
</div>
<div id="pactivo">
<?php the_excerpt(); ?>
</div>

<div class="main_contenido">
<?php the_content(); ?>
</div>
<!--
<?php dynamic_sidebar('primary-widget-area'); ?>
-->
<?php get_footer(); ?>
