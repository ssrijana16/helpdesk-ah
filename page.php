<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
					<div class="col-xl-9 col-md-6">
						<div class="content-wrap">
							<?php
							while ( have_posts() ) :
								the_post();

								get_template_part( 'template-parts/content', 'page' );								
							endwhile; // End of the loop.
							?>
						</div>
					</div>
				</div>
			</div>
		</section>		
	</main><!-- #main -->

	

<?php get_footer(); ?>