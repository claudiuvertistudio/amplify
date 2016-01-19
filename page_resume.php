<?php
/*
Template Name: Resume
 */

get_header(); ?>

<?php if ( function_exists('cfs') ) : //Check if the Custom Fields Suite plugin is active ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class('resume clearfix'); ?>>
			
		<?php while ( have_posts() ) : the_post(); ?>
		<div class="resume-intro clearfix">
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="resume-thumb col-md-4">
					<?php the_post_thumbnail(); ?>
				</div>	
			<?php endif; ?>
			<div class="col-md-8">
					<?php the_content(); ?>
			</div>
		</div>
		<?php endwhile; ?>

		<?php if ( $cfs->get('jobs') !='' || $cfs->get('education') !='' || $cfs->get('skills') !='' ) : ?>
		<nav class="resume-nav clearfix">
			<?php if ( $cfs->get('jobs') !='' ) : ?>
				<span class="nav-experience col-md-4"><?php echo __('Experience', 'amplify'); ?></span>
			<?php endif; ?>
			<?php if ( $cfs->get('education') !='' ) : ?>
				<span class="nav-education col-md-4"><?php echo __('Education', 'amplify'); ?></span>
			<?php endif; ?>
			<?php if ( $cfs->get('skills') !='' ) : ?>
				<span class="nav-skills col-md-4"><?php echo __('Skills', 'amplify'); ?></span>
			<?php endif; ?>								
		</nav>
		<?php endif; ?>
		<?php
			if ( $cfs->get('jobs') !='' ) {
				echo amplify_pro_exp();
			}
			if ( $cfs->get('education') !='' ) {
				echo amplify_edu();
			}
			if ( $cfs->get('skills') !='' ) {
				echo amplify_skills();
			}						
		?>										
	</article>			
<?php endif; ?>

<?php get_footer(); ?>
