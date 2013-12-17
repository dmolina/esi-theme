<?php 
/*
Template Name: Front Page
 */
get_header(); ?>
<div class="page-wrapper">
<div class="content-wrapper">
<div class="sixteen columns">
<div class="container">
<script>
$('.carousel').carousel({
        interval:3000
})
</script>
	<br>
	<section id="slide" class="carousel slide">
		<ol class="carousel-indicators">
			<li data-target="#slide" data-slide-to="0" class="active"></li>
			<li data-target="#slide" data-slide-to="1"></li>
			<li data-target="#slide" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner">
			<div class="item active">
				<img src="<?php print IMAGES; ?>/bolivar.png" class="adapt">
			</div>
			<div class="item">
				<img src="<?php print IMAGES; ?>/esi.png" class="adapt">
			</div>
			<div class="item">
				<img src="<?php print IMAGES; ?>/ESI-3.jpg" class="adapt">
			</div>
		</div>
		<a href="#slide" class="left carousel-control" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
		<a href="#slide" class="right carousel-control" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
	</section><br>
</div>
</div>
</div>
</div>

<div class="flexslider">
  <ul class="slides">
    <li>
      <img src="<?php print IMAGES; ?>/bolivar.png" />
    </li>
    <li>
      <img src="<?php print IMAGES; ?>/esi.png" />
    </li>
    <li>
      <img src="<?php print IMAGES; ?>/ESI-3.jpg" />
    </li>
  </ul>
</div>

<?php get_footer(); ?>
