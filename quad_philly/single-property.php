<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package quad_philly
 */

get_header(); ?>
<?php while ( have_posts() ) : the_post();?>
	<div class="uk-block">
		<div class="uk-container uk-container-center">
			<div class="tm-breadcrumb">
				<?php //echo do_shortcode('[breadcrumb]'); ?>
			</div>

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

			<?php $images = get_field('images_of_property_av');?>

			<?php $size = 'full';?>
			<div class="uk-grid" data-uk-margin="{cls:'uk-margin-large-top'}">
				<div class="uk-width-medium-2-3">
					<div data-uk-switcher="{connect:'#property-blocks'}" class="property-tabs">
						<a href="#"><img src="<?php echo get_template_directory_uri();?>/assets/images/tab-gallery.png"></a>
						<a href="#"><img src="<?php echo get_template_directory_uri();?>/assets/images/tab-video.png"></a>
						<a href="#"><img src="<?php echo get_template_directory_uri();?>/assets/images/tab-3d.png"></a>
						<a href="#"><img src="<?php echo get_template_directory_uri();?>/assets/images/tab-map.png"></a>
					</div>
					<div id="property-blocks" class="uk-switcher property-tabs-content">
						<div class="tm-slideshow-section">
							<ul id="imageGallery">
							<?php foreach( $images as $image ): ?>
								<?php
									$sf_image = $image['ID'];
									$sf_image  = wp_get_attachment_image_src( $sf_image,array(808,542));
									$sf_image = $sf_image[0];
									$sf_image_small = $image['ID'];
									$sf_image_small  = wp_get_attachment_image_src( $sf_image_small,array(199,131));
									$sf_image_small = $sf_image_small[0];
								  ?>
								<li data-thumb="<?php echo $sf_image_small; ?>" data-src="<?php echo $sf_image_small; ?>">
									<a href="<?php echo $sf_image; ?>" data-uk-lightbox="{group:'group1'}">
										<img class="uk-width-1-1" src="<?php echo $sf_image; ?>">
									</a>
								</li>
							<?php endforeach; ?>
							</ul>
						</div>

						<div><?php the_field('video'); ?></div>

						<div><img src="<?php the_field('property_3d'); ?>"></div>

						<div>
							<?php
								$location = get_field('location_av');

								if( !empty($location) ):
								?>
								<div class="acf-map">
									<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
								</div>
							<?php endif; ?>
						</div>



					</div>
					<div class="spacer-v-5"></div>
					<div class="uk-grid tm-property-data" data-uk-grid-match="{target:'.uk-panel'}">
						<div class="uk-width-medium-6-10">
							<div class="uk-panel">
								<ul class="uk-list">
									<li>Location: <strong><?php the_field('address_av'); ?></strong></li>
									<li>Bedroom: <strong><?php the_field('bedroom_av'); ?></strong></li>
									<li>Bathroom: <strong><?php the_field('bathroom_av'); ?></strong></li>
									<li>Sq. Ft: <strong><?php the_field('sq_ft_av'); ?></strong></li>
									<li>Features: <strong><?php the_field('features_av'); ?></strong></li>
								</ul>
							</div>
						</div>
						<div class="uk-width-medium-4-10">
							<div class="uk-panel uk-flex uk-flex-middle">
								<ul class="uk-list">
									<li>Rent: <strong><?php the_field('rent_av'); ?></strong></li>
									<li>Start: <strong><?php the_field('date_of_availability'); ?></strong></li>
								</ul>
							</div>
						</div>
					</div>
					<hr class="uk-margin-large-top uk-margin-large-bottom">
					<h2>Description</h2>
					<div class="uk-column-medium-1-2">
						<?php the_content();?>
					</div>
				</div>
				<div class="uk-width-medium-1-3">
					<div class="uk-panel tm-request-tour" data-uk-sticky="{media: 640, top:50, boundary: true}">
						<h2>Request A Tour</h2>
						<hr class="tm-decorated-hr left">
						<p>
							Want to learn more about this property? Fill out the form we will get in contact with you as soon as possible.
						</p>
						<hr>
						<?php echo do_shortcode("[gravityform id=2 ajax='true' title='false']"); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="map-section">
		<?php
			$location = get_field('location_av');

			if( !empty($location) ):
			?>
			<div class="acf-map">
				<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
			</div>
		<?php endif; ?>
	</div>
	<div class="uk-block tm-available-section">
		<div class="uk-container uk-container-center">
			<h2>Also Available</h2>
			<hr class="tm-decorated-hr left uk-margin-large-bottom">
			<div class="tm-slideset-section">
				<div data-uk-slideset="{small: 1, medium: 3, large: 3, autoplay: true}">
					<div class="uk-slidenav-position uk-margin">
						<ul class="uk-slideset uk-grid uk-flex-center">
							<?php
								$current_post_id = $post->ID;
								$args = array(
								'post_type'         =>  'property',
								'post__not_in' =>  array ($current_post_id),
								'posts_per_page'    =>  -1

								);
								$query = new WP_Query($args);
								if ($query->have_posts()) :
								while ($query->have_posts()) : $query->the_post();
							?>
							<li>
								<div class="tm-property-block uk-position-relative uk-text-center">
									<div class="uk-width-1-1 uk-overlay uk-overlay-hover">
										<?php the_post_thumbnail(array('365','245')); ?>
										<div class="uk-overlay-panel uk-flex uk-flex-middle uk-flex-center">
											<div class="tm-info-tag uk-text-center">
												<h5 class="uk-margin-remove">$<?php the_field('rent_av'); ?></h5>
												<h6 class="uk-margin-remove"><?php the_field('description_av'); ?></h6>
											</div>
										</div>
										<div class="uk-block-secondary uk-contrast tm-property-info">
											<h6 class="uk-margin-remove"><?php the_title(); ?></h6>
										</div>
										<a href="<?php the_permalink(); ?>" class="uk-position-cover"></a>
									</div>
								</div>
							</li>
							<?php endwhile; ?>
							<?php endif; wp_reset_query(); ?>
						</ul>
						<a href="#" class="uk-slidenav uk-slidenav-previous" data-uk-slideset-item="previous"></a>
						<a href="#" class="uk-slidenav uk-slidenav-next" data-uk-slideset-item="next"></a>
					</div>
				</div>
			</div>
		</div>
	</div>


<?php endwhile; ?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAzlV2H6dGbxL10HnU5hYZDdONqJSeSvfE"></script>
<?php get_footer();
