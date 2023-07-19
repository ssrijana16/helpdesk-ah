<?php
/**
 * Template Name: Helpdesk Home Page
 */

get_header();
$postsInHomepage = get_field('display_post_in_the_homepage'); 
//echo "<pre>";
//print_r($postsInHomepage);

?>


<main id="primary" class="site-main">
    <section class="banner-wrapper">
        <div class="container">
            <span class="icon-wrap">
                <?php $icon_img = get_field('banner_icon_img');    
                    if( !empty( $icon_img ) ): ?>
                        <img class="svg" src="<?php echo esc_url($icon_img['url']); ?>" alt="<?php echo esc_attr($icon_img['alt']); ?>" />
                <?php endif; ?>
 
            </span><!-- icon-wrap -->
            <h1><?php the_field('hero_section_title');?></h1>
            <div class="search-box">
            	<form method="GET" action="" name="search-form" >
	                <input type="text" name="s" class="" id="search-input" placeholder="<?php the_field('search_form_placeholder', 'options');?>">
	                <button type="submit" class="search-button"><?php the_field('search_form_submit_button_text', 'options');?></button>
	            </form>
	            <div class="searchResults"></div>
            </div>
            <?php if($postsInHomepage): ?>
            <div class="listing-wrap">
                <ul>
                    <?php foreach ($postsInHomepage as $postT):  
                        $article_image = get_field('post_icon', $postT->ID);                                           
                        $article_title = (get_field('display_title_in_homepage',$postT->ID)) ? get_field('display_title_in_homepage',$postT->ID) : $postT->post_title;
                        ?>
                        <li><?php if( !empty( $article_image ) ): ?><img class="svg" src="<?php echo esc_url($article_image['url']); ?>" alt="<?php echo esc_attr($article_image['alt']); ?>" /><?php endif; ?><a href="<?php echo get_permalink($postT->ID).'#singleContent';?>"><?php echo $article_title;?></a></li>
                        
                    <?php endforeach;?> 
                </ul>
            </div><!-- listing-wrap -->
            <?php endif;?>
        </div><!-- container -->
    </section><!-- banner-wrapper -->


    <?php 

        if( have_rows('add_site_layouts') ):
            while ( have_rows('add_site_layouts') ) : the_row();  
            get_template_part('template-parts/acf-contents/'. get_row_layout() );

            endwhile;
        endif;
    ?>


    
</main><!-- #main -->
<?php get_footer(); ?>