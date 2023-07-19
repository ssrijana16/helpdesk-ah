<?php

/**

 * The template for displaying archive pages

 *

 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/

 *

 * @package resources

 */



get_header();

$term = get_queried_object();
$children = get_terms( $term->taxonomy, array(
        'parent'    => $term->term_id,
        'hide_empty' => false
    ) );


?>



<main id="primary" class="site-main">

	<section class="helpdesk-article-wrapper">

		<div class="container">

			<div class="row">

				<div class="col-xl-3 col-md-6"><?php get_sidebar();?></div>

				<div class="col-xl-9 col-md-6"  id="catContent">

					<div class="content-wrap">

						<?php 

						if ( $children ) {

						?>

							

							<h2><?php echo $term->name;?></h2>										

				                        <div class="content-wrapper">

				                    		<?php foreach ($children as $subcat) { ?>

					                    		<div class="repeated-item">

						                            <h3><?php echo $subcat->name;?></h3>

						                            <?php $args = array( 
							                            	'posts_per_page'   => -1, 
							                            	'post_type' => 'help',
							                            	'post_status'  => 'publish',
							                            	'tax_query' => array(
									                      array(
									                          'taxonomy' => 'hd-category',
									                          'field' => 'term_id',
									                          'terms' => $subcat->term_id,
									                      )
									                )
						                            	);

						                            $subcat_posts = get_posts( $args ); 

						                            if ( $subcat_posts ) { ?>

						                            <ul>

						                            	<?php foreach ($subcat_posts as $posts) { ?>

						                            		<li><a href="<?php echo get_the_permalink($posts).'#singleContent'; ?>"><?php echo $posts->post_title;?></a></li>



						                            	<?php } ?>	

																                                

						                               

						                            </ul>

						                            <?php } ?>	

						                        </div><!-- repeated-item -->

				                    		<?php } ?>		                        

		                        

		                    			</div><!-- content-wrapper -->

								

							

						<?php } else { ?>

							<!--<h2><?php //echo $term->name;?></h2>-->

							<div class="content-wrapper">				                    		

				                    		<div class="repeated-item">

				                    			<h3><?php echo $term->name;?></h3>					                            

					                            <?php $args = array( 
							                            	'posts_per_page'   => -1, 
							                            	'post_type' => 'help',
							                            	'post_status'  => 'publish',
							                            	'tax_query' => array(
									                      array(
									                          'taxonomy' => 'hd-category',
									                          'field' => 'term_id',
									                          'terms' => $term->term_id,
									                      )
									                )
						                            	);

					                            $subcat_posts = get_posts( $args ); 

					                            if ( $subcat_posts ) { ?>

					                            <ul>

					                            	<?php foreach ($subcat_posts as $posts) { ?>

					                            		<li><a href="<?php echo get_the_permalink($posts).'#singleContent'; ?>"><?php echo $posts->post_title;?></a></li>



					                            	<?php } ?>			                                

					                               

					                            </ul>

					                            <?php } ?>	

					                        </div><!-- repeated-item -->		                        

		                    			</div><!-- content-wrapper -->

						<?php } ?>

						<div class="help-contact-wrap right-content">

							<span><?php echo the_field('cat_footer_content', 'options');?></span>

							<?php $page_link = get_field('category_page_footer_button_link', 'options'); ?>

							<?php if( $page_link ): ?>

								<a href="<?php echo esc_url( $page_link['url'] ); ?>" target="<?php echo $page_link['target']; ?>"><?php echo the_field('category_page_footer_button_text','options');?><img class="svg"  src="<?php echo get_stylesheet_directory_uri(); ?>/images/white-arrow.png" alt=""></a>

							<?php endif; ?>

							

						</div>

					</div>

				</div>



		 	</div>

		</div>

	</section>



</main><!-- #main -->



<?php get_footer(); ?>