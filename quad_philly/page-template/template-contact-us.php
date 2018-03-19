<?php
/**
 * Template Name: Contact Us
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
				<div class="uk-grid">
					<div class="uk-width-medium-3-10">
						<ul class="uk-list">
							<li class="uk-margin-large-bottom uk-grid uk-flex uk-flex-middle">
								<div class="uk-width-2-10 uk-text-center">
									<img src="<?php echo get_template_directory_uri();?>/assets/images/pin.png">
								</div>
								<div class="uk-width-8-10">
									<p><?php the_field('address_cup'); ?></p>
								</div>
							</li>
							<li class="uk-margin-large-bottom uk-grid uk-flex uk-flex-middle">
								<div class="uk-width-2-10 uk-text-center">
									<img src="<?php echo get_template_directory_uri();?>/assets/images/mail.png">
								</div>
								<div class="uk-width-8-10">
									<p><?php the_field('email_cup'); ?></p>
								</div>
							</li>
							<li class="uk-margin-large-bottom uk-grid uk-flex uk-flex-middle">
								<div class="uk-width-2-10 uk-text-center">
									<img src="<?php echo get_template_directory_uri();?>/assets/images/mobile.png">
								</div>
								<div class="uk-width-8-10">
									<p>Phone: <?php the_field('phone_cup'); ?></p>
								</div>
							</li>
							<li class="uk-margin-large-bottom uk-grid uk-flex uk-flex-middle">
								<div class="uk-width-2-10 uk-text-center">
									<img src="<?php echo get_template_directory_uri();?>/assets/images/fax.png">
								</div>
								<div class="uk-width-8-10">
									<p>Fax: <?php the_field('fax_cup'); ?></p>
								</div>
							</li>
							<li class="uk-margin-large-bottom uk-grid uk-flex uk-flex-middle">
								<div class="uk-width-2-10 uk-text-center">
									<img src="<?php echo get_template_directory_uri();?>/assets/images/clock.png">
								</div>
								<div class="uk-width-8-10">
									<p>Hours: <?php the_field('opening_hours_cup'); ?></p>
								</div>
							</li>
						</ul>
					</div>
					<div class="uk-width-medium-7-10">
						<?php echo do_shortcode('[gravityform id=1 ajax="true" title="false"]'); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="map-section">
			<?php
			$location = get_field('map_cup');
			if( !empty($location) ):
			?>
				<div class="acf-map">
					<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
				</div>
			<?php endif; ?>
		</div>
	<?php endwhile;  ?>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAzlV2H6dGbxL10HnU5hYZDdONqJSeSvfE"></script>
<?php get_footer();
