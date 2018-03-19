<?php
/**
 * Template Name: Features
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
<?php while ( have_posts() ) : the_post();?>
	<div class="uk-block">
		<div class="uk-container uk-container-center">
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
			<div class="uk-grid um-margin-large-bottom" data-uk-margin="{cls:'uk-margin-large-top'}">
				<div class="uk-width-medium-2-10">
					<div data-uk-sticky="{top:100}" class="uk-hidden-small">
						<ul class="uk-list tm-side-menu" data-uk-switcher="{connect:'#features-list'}">
							<?php wp_nav_menu( array( 'theme_location' => 'features-menu', 'items_wrap' => '%3$s', 'container' => false ) ); ?>
						</ul>
					</div>
					<div class="uk-visible-small">
						<ul class="uk-list tm-side-menu" data-uk-switcher="{connect:'#features-list'}">
							<?php wp_nav_menu( array( 'theme_location' => 'features-menu', 'items_wrap' => '%3$s', 'container' => false ) ); ?>
						</ul>

					</div>
				</div>
				<div class="uk-width-medium-8-10 uk-switcher" id="features-list" data-uk-margin="{cls:'uk-margin-large-top tm-section-divider'}">
				<?php if(have_rows('features_description')): ?>
					<?php while(have_rows('features_description')): the_row(); ?>
					<div id="<?php the_sub_field('section_id'); ?>">
						<div id="switcher-content-1">
							<div class="">
								<?php $images = get_sub_field('images'); ?>
								<div class="uk-grid uk-margin-top" data-uk-grid="{gutter: 15}" data-uk-check-display>
									<div class="uk-width-1-1">
										<div class="uk-grid uk-grid-collapse" data-uk-margin="{cls:'uk-margin-large-top'}">
											<div class="uk-width-medium-6-10 uk-panel tm-feature-hero">
												<div class="">
													<h4><?php the_sub_field('title'); ?></h4>
													<h2><?php the_sub_field('subtitle'); ?></h2>
												</div>
											</div>
											<div class="uk-width-medium-4-10">
												<?php $first_image = $images[0];?>
												<?php
												  $sf_image = $first_image['ID'];
												  $sf_image  = wp_get_attachment_image_src( $sf_image,array(640,480));
												  $sf_image = $sf_image[0];
												  ?>
												<img class="uk-width-medium-1-1" src="<?php echo $sf_image; ?>" alt="">
											</div>
										</div>
									</div>
									<?php array_shift($images); ?>
									<?php foreach( $images as $image ): ?>
										<?php
											$s_image = $image['ID'];
											$f_image  = wp_get_attachment_image_src( $s_image, 'full' );
											$s_image = wp_get_attachment_image_src( $s_image,array(640,480) );
											$s_image = $s_image[0];
											$f_image = $f_image[0];
										?>
									<div class="uk-width-medium-1-2">
										<a href="<?php echo $f_image; ?>" data-uk-lightbox><img class="uk-width-1-1" src="<?php echo $s_image; ?>" alt=""></a>
									</div>
								<?php endforeach; ?>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			<?php endif;?>
				</div>
			</div>
			<div class="spacer-v-5"></div>
		</div>
	</div>
<?php endwhile;?>
<?php get_footer();
