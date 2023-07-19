<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
						if ( have_posts() ) :

							while ( have_posts() ) :
								the_post();

								get_template_part( 'template-parts/content', get_post_type() );							
							endwhile; // End of the loop.	
						else :

							get_template_part( 'template-parts/content', 'none' );

						endif;
						?>
					</div>
				</div>
			</div>
		</div>
	</section>		
</main><!-- #main -->

	

<?php get_footer(); ?>