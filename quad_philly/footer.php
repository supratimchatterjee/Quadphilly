<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package quad_philly
 */

?>


	<footer class="site-footer uk-block-secondary uk-contrast">
		<div class="uk-container uk-container-center">
			<div class="uk-position-relative">
				<div class="uk-grid uk-grid-width-medium-1-3 uk-flex uk-flex-middle" data-uk-margin="{cls:'uk-margin-large-top'}">
					<div>
						<a href="<?php the_field('button_link_footer','option'); ?>" class="uk-button"><?php the_field('button_label_footer','option'); ?></a>
					</div>
					<div class="uk-text-center">
						<a class="" href="<?php bloginfo('url') ?>"><img src="<?php echo get_template_directory_uri();?>/assets/images/site-logo.png"></a>
					</div>
					<div class="tm-copyright">
						<?php the_field('copyright_text_footer','option'); ?>
					</div>
				</div>
				<a class="uk-position-absolute uk-position-top-right scroll-to-top-link" href="#top" data-uk-smooth-scroll><i class="uk-icon-angle-up"></i></a>
			</div>
		</div>
	</footer>

<?php wp_footer(); ?>

</body>
</html>
