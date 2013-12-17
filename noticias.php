<?php 
/*
Template Name: News
 */
get_header();?>
<div class="page-wrapper">
<div class="content-wrapper">
<div class="sixteen columns">
<div class="container">
<h1 class="gdl-page-title gdl-title title-color">
		<?php the_title(); ?>
</h1><br><div class="gdl-page-caption gdl-divider" ></div><br>


		<!-- Muestra las noticias de forma aleatoria -->
		<ul>
		  	<?php
			$args = array('offset'=> 0, 'category' => get_cat_ID( "Noticia destacada") );

			$myposts = get_posts( $args );
			
			foreach ( $myposts as $post ) : setup_postdata( $post );?>
				<li>
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					<p><?php the_date('d/m/Y'); ?></p>
					<?php the_excerpt(); ?>
					<div class="gdl-page-caption gdl-divider" ></div>
				</li>
			<?php endforeach; 


			$args = array( 'posts_per_page' => 5, 'offset'=> 0, 'category' => get_cat_ID( "Noticias") );

			$myposts = get_posts( $args );
			
			foreach ( $myposts as $post ) : setup_postdata( $post );?>
				<li>
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					<p><?php the_date('d/m/Y'); ?></p>
					<?php the_excerpt(); ?>
					<div class="gdl-page-caption gdl-divider" ></div>
				</li>
			<?php endforeach; 
			wp_reset_postdata();?>
				</ul>

</div>
</div>
</div>
</div>
<div class="clear"></div>

<?php get_footer(); ?>
