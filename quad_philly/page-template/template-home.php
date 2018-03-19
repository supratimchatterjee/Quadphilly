<?php
/**
 * Template Name: Home
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package quad_philly
 */

get_header(); ?>
	<section class="uk-block" id="home-apartment">
		<div class="uk-container uk-container-center">
			<div class="uk-text-center">
				<h2 class="uk-h1"><?php the_field('title_h_a'); ?></h2>
				<hr class="tm-decorated-hr">
				<div class="spacer-v-2"></div>
				<img src="<?php the_field('image_h_a'); ?>">
				<div class="spacer-v-6"></div>
				<h2 class="uk-h1"><?php the_field('title_a_pro'); ?></h2>
				<hr class="tm-decorated-hr">
				<div class="uk-width-medium-1-2 uk-container-center tm-text-lead">
					<p>
						<?php the_field('description_a_pro'); ?>
					</p>
				</div>
				<div class="spacer-v-1"></div>
				<p>
					<a href="<?php the_field('button_link_a_pro'); ?>" class="uk-button uk-button-primary"><?php the_field('button_label_a_pro'); ?></a>
				</p>
				<div class="spacer-v-5"></div>
				<a class="tm-hidden-small" href="#feature-section-title" data-uk-smooth-scroll><i class="uk-icon-angle-down"></i></a>
				<a class="tm-visible-small" href="#feature-section-title-mob" data-uk-smooth-scroll><i class="uk-icon-angle-down"></i></a>
			</div>
		</div>
	</section>
	<section class="uk-width-1-1" id="feature-section">
		<img class="banner-curve uk-width-1-1" src="<?php echo get_template_directory_uri();?>/assets/images/curve-two-part1.png">
	</section>
	<section class="uk-overlay uk-width-1-1" id="feature-section-two">
		<img class="banner-curve uk-width-1-1" src="<?php echo get_template_directory_uri();?>/assets/images/curve-two-part2.png">
		<div class="uk-overlay-panel uk-contrast uk-flex uk-flex-middle uk-flex-center tm-hidden-small">
			<div class="uk-text-center tm-margin-large-bottom">
				<h2 class="uk-h1" id="feature-section-title"><?php the_field('title_fe'); ?></h2>
				<hr class="tm-decorated-hr">
			</div>
		</div>
	</section>
	<section class="uk-block uk-contrast uk-padding-remove uk-block-primary tm-visible-small">
		<div class="uk-container uk-container-center">
			<div class="uk-text-center">
				<h2 id="feature-section-title-mob" class="uk-h1">Our Unique Features</h2>
				<hr class="tm-decorated-hr">
			</div>
		</div>
	</section>
	<section class="uk-block uk-contrast uk-padding-remove">
		<div class="uk-grid uk-grid-width-medium-1-3 uk-grid-collapse">
			<?php if(have_rows('features_home')):?>
				<?php while(have_rows('features_home')): the_row(); ?>
					<div>
						<figure class="uk-overlay">
							<?php $sf_image = get_sub_field('image_feah'); ?>
							<?php $sf_image  = wp_get_attachment_image_src( $sf_image, array(765,510) ); ?>
							<?php $sf_image = $sf_image[0]; ?>
							<img class="uk-width-1-1" src="<?php echo $sf_image; ?>" alt="Image">
							<div class="uk-overlay-panel uk-flex uk-flex-middle uk-flex-center">
								<h3 class="uk-h2 tm-overlay-title"><?php the_sub_field('title_feah'); ?></h3>
							</div>
							<a class="uk-position-cover" href="<?php the_sub_field('link_feah'); ?>"></a>
						</figure>
					</div>
				<?php endwhile;?>
			<?php endif;?>
		</div>
	</section>
	<section class="uk-block uk-block-large">
		<div class="uk-container uk-container-center">
			<h2 class="uk-h1"><?php the_field('title_c_u'); ?></h2>
			<hr class="tm-decorated-hr left">
			<div class="tm-text-lead">
				<p><?php the_field('short_description_c_u'); ?></p>
			</div>
			<div class="uk-grid uk-margin-large-top">
				<div class="uk-width-medium-3-10">
					<ul class="uk-list">
						<li class="uk-margin-large-bottom uk-grid uk-flex uk-flex-middle">
							<div class="uk-width-2-10 uk-text-center">
								<img src="<?php echo get_template_directory_uri();?>/assets/images/pin.png">
							</div>
							<div class="uk-width-8-10">
								<p><?php the_field('address_c_u'); ?></p>
							</div>
						</li>
						<li class="uk-margin-large-bottom uk-grid uk-flex uk-flex-middle">
							<div class="uk-width-2-10 uk-text-center">
								<img src="<?php echo get_template_directory_uri();?>/assets/images/mail.png">
							</div>
							<div class="uk-width-8-10">
								<p><?php the_field('email_c_u'); ?></p>
							</div>
						</li>
						<li class="uk-margin-large-bottom uk-grid uk-flex uk-flex-middle">
							<div class="uk-width-2-10 uk-text-center">
								<img src="<?php echo get_template_directory_uri();?>/assets/images/mobile.png">
							</div>
							<div class="uk-width-8-10">
								<p>Phone: <?php the_field('phone_number_c_u'); ?></p>
							</div>
						</li>
						<li class="uk-margin-large-bottom uk-grid uk-flex uk-flex-middle">
							<div class="uk-width-2-10 uk-text-center">
								<img src="<?php echo get_template_directory_uri();?>/assets/images/fax.png">
							</div>
							<div class="uk-width-8-10">
								<p>Fax: <?php the_field('fax_c_u'); ?></p>
							</div>
						</li>
						<li class="uk-margin-large-bottom uk-grid uk-flex uk-flex-middle">
							<div class="uk-width-2-10 uk-text-center">
								<img src="<?php echo get_template_directory_uri();?>/assets/images/clock.png">
							</div>
							<div class="uk-width-8-10">
								<p>Hours: <?php the_field('opening_hour_c_u'); ?></p>
							</div>
						</li>
					</ul>
				</div>
				<div class="uk-width-medium-7-10"><?php echo do_shortcode('[gravityform id=1 ajax="true" title="false"]'); ?></div>
			</div>
		</div>
	</section>
	<div class="map-section">
		<?php
		$location = get_field('location_map');
		if( !empty($location) ):
		?>
			<div class="acf-map">
				<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
			</div>
		<?php endif; ?>
	</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAzlV2H6dGbxL10HnU5hYZDdONqJSeSvfE"></script>
<?php get_footer();
