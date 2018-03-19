<?php
/**
 * Template Name: FAQ
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
			<div class="spacer-v-3"></div>
			<div class="uk-accordion uk-text-center uk-width-medium-6-10 uk-container-center" data-uk-accordion="{showfirst:false}">
			<?php if(have_rows('topic_faq')): ?>
				<?php while(have_rows('topic_faq')): the_row(); ?>
					<h3 class="uk-accordion-title"><?php the_sub_field('topic_name'); ?></h3>
					<div class="uk-accordion-content">
						<?php if(have_rows('question_and_answer_faq')): ?>
							<?php while(have_rows('question_and_answer_faq')): the_row(); ?>
								<div class="tm-sub-faq">
									<h5 class="tm-sub-question"><?php the_sub_field('question_faq'); ?></h5>
									<div  class="tm-sub-answer">
										<?php the_sub_field('answer_faq'); ?>
									</div>
								</div>
							<?php endwhile;?>
						<?php endif;?>
					</div>
				<?php endwhile;?>
			<?php endif;?>
			</div>
		</div>
	</div>

<?php
get_footer();