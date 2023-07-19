<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package resources
 */

get_header();
?>

	<main id="primary" class="site-main">
		<section class="helpdesk-article-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-xl-3 col-md-6"><?php get_sidebar();?></div>
					<div class="col-xl-9 col-md-6"  id="singleContent">
						<div class="content-wrap">
							<?php
							while ( have_posts() ) :
								the_post();

								get_template_part( 'template-parts/content', get_post_type() );

								/*the_post_navigation(
									array(
										'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'resources' ) . '</span> <span class="nav-title">%title</span>',
										'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'resources' ) . '</span> <span class="nav-title">%title</span>',
									)
								);*/

								// If comments are open or we have at least one comment, load up the comment template.
								//if ( comments_open() || get_comments_number() ) :
									//comments_template();
								//endif;

							endwhile; // End of the loop.
							?>
						</div>
					</div>
				</div>
			</div>
		</section>		
		<?php 
			$has_agentLogin = get_field('has_agent_login_details_section', "options");
			$agent_login_link = get_field('agent_login_link', "options");
			$schedule_a_call_link = get_field('schedule_a_call_link', "options");
			//print_r($schedule_a_call_link);
			if($has_agentLogin){
		?>
		<section class="common-section-wrap">
			<div class="container">
				<div class="help-contact-wrap next-line-button">
					<span><?php echo the_field('third_sub_title_contact', "options");?></span>
					<?php if( $agent_login_link ): ?>
						<a href="<?php echo esc_url( $agent_login_link['url'] ); ?>" target="<?php echo $agent_login_link['target'];?>" ><?php echo $agent_login_link['title'];?><img class="svg" src="<?php echo get_template_directory_uri(); ?>/images/white-arrow.png" alt=""></a>
					<?php endif; ?>
				</div>
			</div>
		</section><!-- common-section-wrap -->
		<?php } ?>
	</main><!-- #main -->

<?php get_footer(); ?>