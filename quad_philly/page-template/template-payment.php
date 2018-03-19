<?php
/**
 * Template Name: Payment
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

<div class="uk-block">
	<div class="uk-container uk-container-center">
		<div class="tm-section-header uk-clearfix">
			<div class="tm-overflow-hidden">
				<h1>Apply</h1>
				<p>
					Please fill out all applicable items. If you have any questions, please review the Applicant section of the FAQ or give us a call.
				</p>
			</div>
		</div>
		<div class="uk-grid">
			<div class="uk-width-medium-2-10">
				<ul class="uk-nav uk-nav-side" data-uk-switcher="{connect:'#switcher-content-1'}">
					<li><a href="#">APPLICATION</a></li>
					<li><a href="#">COSIGNER APPLICATION</a></li>
					<li><a href="#">PAYMENT AUTHORIZATION</a></li>
				</ul>
			</div>
			<div class="uk-width-medium-8-10">
				<?php echo do_shortcode('[gravityform id=9]'); ?>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();
