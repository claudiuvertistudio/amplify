<?php
/*
Template Name: Jetpack Portfolio - 3 cols
*/

get_header(); ?>


	<div id="primary" class="fullwidth">
		<main id="main" class="site-main" role="main">

<?php
		$r = new WP_Query( array(
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'post_type' 		  => 'jetpack-portfolio',
			'posts_per_page'	  => -1
		) );
		if ($r->have_posts()) :
?>
	
		<div class="projects">
			<?php if (post_type_exists('jetpack-portfolio')) : ?>
					
				<div id="filter">
				<?php //Create portfolio filter from custom taxonomies
					$p = array(
						'taxonomy' => 'jetpack-portfolio-type',
					);
					$categories = get_categories($p);
						echo '<a href="#" data-group="all">' . __('All', 'amplify') . '</a>';
						foreach($categories as $category) { 
							echo '<a href="#" data-group="' . $category->name . '">' . $category->name . '</a>';
						}
				?>
				</div>		
				<div class="portfolio-main clearfix">
					<?php
						$p = array(
							'post_type'      => 'jetpack-portfolio',
							'posts_per_page' => -1,
						);

						$query = new WP_Query ( $p );
					?>						

					<?php while ( $query->have_posts() ) : $query->the_post(); ?>
						<?php //Filter for the portfolio items data-groups
							global $post;
							$terms = get_the_terms( $post->ID, 'jetpack-portfolio-type' );					
							if ( $terms && ! is_wp_error( $terms ) ) : 
								$filters = array();
								foreach ( $terms as $term ) {
									$filters[] = '"' . $term->name . '"';
								}						
								$filter = join( ", ", $filters );
							else :
								$filter = null;
							endif;
						?>					
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="project col-md-4 col-sm-6 col-xs-6" data-groups='["all", <?php echo esc_attr($filter); ?>]'>
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('amplify-project'); ?></a>
								<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
								<div class="project-nav">
									<span class="project-magnify"><a href="<?php echo esc_url($url); ?>" rel="prettyPhoto"><i class="fa fa-search"></i></a></span>
									<span class="project-link"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><i class="fa fa-link"></i></a></span>								
								</div>
							</div>
						<?php endif; ?>
					<?php endwhile; ?>

				</div>
			<?php endif; ?>
		</div>	
	<?php endif; ?>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
