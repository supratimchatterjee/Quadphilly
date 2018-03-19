<?php
/**
 * Template Name: Properties
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package quad_philly
 */

get_header(); ?>

	<div class="uk-block">		<div class="uk-container uk-container-center">
			<div class="tm-page-header uk-clearfix">
				<?php if(get_field('button_label')) :  ?>
				<div class="uk-float-right">
					<a class="uk-button uk-button-primary" href="<?php the_field('button_link'); ?>"><?php the_field('button_label'); ?></a>
				</div>
				<?php endif;?>
				<div class="tm-overflow-hidden">
					<h1><?php echo (get_field('custom_page_title') ? get_field('custom_page_title') : get_the_title()) ; ?></h1>
					<div class="tm-text-lead">
						<?php the_field('subtitle'); ?>
					</div>
				</div>
			</div>
			<div class="spacer-v-5"></div>
			<div class="uk-grid" data-uk-margin="{cls:'uk-margin-large-top'}">
			<?php $args = array( 'post_type'=>'property', 'posts_per_page'=>-1); ?>
			<?php $query = new WP_Query($args); ?>
			<?php if ($query->have_posts()) : ?>
				<?php while ($query->have_posts()) : $query->the_post(); ?>
					<?php $id = $query->post->ID; ?>
					<div class="uk-width-medium-1-3">
						<div class="tm-property-block uk-position-relative uk-text-center">
							<div class="uk-hidden-small uk-width-1-1 uk-overlay uk-overlay-hover">
								<?php the_post_thumbnail(array('365','245')); ?>
								<div class="uk-overlay-panel uk-flex uk-flex-middle uk-flex-center">
									<div class="tm-info-tag uk-text-center">
										<h5 class="uk-margin-remove">$<?php the_field('rent_av'); ?></h5>
										<h6 class="uk-margin-remove"><?php the_field('description_av'); ?></h6>
									</div>
								</div>
								<div class="uk-block-secondary uk-contrast tm-property-info">
									<h6 class="uk-margin-remove"><?php the_title(); ?></h6>
									<?php $date = get_field('date_of_availability', false, false);?>
									<?php $date = new DateTime($date); ?>
									<span class="tm-tag">Available: <?php echo $date->format('m/d/Y'); ?></span>
								</div>
								<a href="<?php the_permalink(); ?>" class="uk-position-cover"></a>
							</div>
							<div class="uk-visible-small uk-width-1-1 uk-overlay">
								<?php the_post_thumbnail(array('365','245')); ?>
								<div class="uk-overlay-panel uk-flex uk-flex-middle uk-flex-center">
									<div class="tm-info-tag uk-text-center">
										<h5 class="uk-margin-remove">$<?php the_field('rent_av'); ?></h5>
										<h6 class="uk-margin-remove"><?php the_field('description_av'); ?></h6>
									</div>
								</div>
								<div class="uk-block-secondary uk-contrast tm-property-info">
									<h6 class="uk-margin-remove"><?php the_title(); ?></h6>
									<?php $date = get_field('date_of_availability', false, false);?>
									<?php $date = new DateTime($date); ?>
									<span class="tm-tag">Available: <?php echo $date->format('m/d/Y'); ?></span>
								</div>
								<a href="<?php the_permalink(); ?>" class="uk-position-cover"></a>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			<?php endif;  ?>			</div>
		</div>
	</div>
<?php

get_footer();
