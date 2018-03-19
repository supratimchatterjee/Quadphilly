<?php
/**
 * Template Name: Application
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
<?php while ( have_posts() ) : the_post(); ?>
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
			<div class="uk-width-medium-1-4">
					<?php wp_nav_menu( array( 'theme_location' => 'application-menu','menu_class' => 'uk-list uk-list tm-side-menu','container' => false ) ); ?>
			</div>
			<div class="uk-width-medium-3-4">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
</div>
<?php endwhile; ?>
<?php
get_footer();
