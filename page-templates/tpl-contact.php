<?php

/**
 * Template Name: Contact Us Page
 */

get_header();
$get_parent_cats = array('orderby' => 'id', 'order' => 'ASC', 'hide_empty' => 0, 'parent' => '0' );             
//$all_categories = get_categories( $get_parent_cats );//get parent categories 
$all_categories = get_terms('hd-category',$get_parent_cats);
?>

<main id="primary" class="site-main">
    <div id="toTop">
        <img src="<?php echo get_template_directory_uri(); ?>/images/white-arrow.png" alt="">
    </div>
	<section class="contact-banner">
        <div class="container">
            <span class="icon-wrap">
                <?php $icon_img = get_field('banner_icon_img');    
                    if( !empty( $icon_img ) ): ?>
                        <img class="svg" src="<?php echo esc_url($icon_img['url']); ?>" alt="<?php echo esc_attr($icon_img['alt']); ?>" />
                <?php endif; ?>
            </span><!-- icon-wrap -->
            <h1><?php the_title();?></h1>
        </div><!-- container -->
    </section><!-- contact-banner -->
    <section class="how-help-wrapper" id="section">
        <div class="listing-main-wrapper">
            <div class="container">
                <h2><?php echo get_field('sub_title_contact');?></h2>
                <div class="block-listing-wrap">
                    <ul>
                         <?php foreach ($all_categories as $category): 
                            $image = get_field('homepage_icon_cat','term_'.$category->term_id);?>
                            <li data-id='<?php echo $category->term_id;?>'><a href="#content" class="contact-cat"><?php if( !empty( $image ) ): ?> <img class="svg" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /><?php endif; ?><span><?php echo $category->name;?></span></a></li>
                        <?php endforeach;?>
                    </ul>
                </div><!-- block-listing-wrap -->
            </div>
        </div><!-- listing-main-wrapper -->
        <div class="three-column-wrapper" id="content">
            <div class="container">
                <h2><?php echo the_field('second_sub_title_contact');?></h2>
                <div class="row">
                    <?php $args = array( 'posts_per_page'   => 3, 'post_type' => 'help', 'post_status'  => 'publish');
                        $postsList = get_posts( $args ); 
                        if ( $postsList ) { 
                            foreach ($postsList as $posts) {
                                $excerpt = get_the_excerpt($posts->ID); 
                                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $posts->ID ), 'post-thumbnails' );
                                //print_r($image[0]);
                            ?>
                            <div class="col-md-4">
                                <div class="item-wrapper">
                                    <?php if(!empty($image[0])) { ?>
                                        <img class="svg" src="<?php echo $image[0]; ?>" alt="<?php echo $posts->post_title;?>">
                                    <?php } else { ?>
                                        <img class="svg" src="<?php echo get_template_directory_uri(); ?>/images/placeholder-image.jpg" alt="AH default image">
                                        
                                    <?php } ?>
                                    <div class="text-wrap">
                                        <h3><?php echo $posts->post_title;?></h3>
                                        <p><?php echo esc_html( $excerpt );?></p>
                                        <a href="<?php echo get_the_permalink($posts->ID); ?>">Read more<img src="<?php echo get_template_directory_uri(); ?>/images/red-arrow.svg" alt=""></a>
                                    </div>
                                </div><!-- item-wrapper -->
                            </div><!-- col-md-4 -->


                            <?php
                            } 
                    }  ?>

                    
                </div><!-- row -->
            </div><!-- container -->
        </div><!-- three-column-wrapper -->
    </section><!-- how-help-wrapper -->
    <?php 
        $has_agentLogin = get_field('has_agent_login_details_section');
        $agent_login_link = get_field('agent_login_link');
        $schedule_a_call_link = get_field('schedule_a_call_link');
        //print_r($schedule_a_call_link);
        if($has_agentLogin){
    ?>
    <section class="common-section-wrap">
        <div class="container">
            <div class="help-contact-wrap next-line-button">
                <span><?php echo the_field('third_sub_title_contact');?></span>
                <?php if( $agent_login_link ): ?>
                    <a href="<?php echo esc_url( $agent_login_link['url'] ); ?>" target="<?php echo $agent_login_link['target'];?>" ><?php echo $agent_login_link['title'];?><img class="svg" src="<?php echo get_template_directory_uri(); ?>/images/white-arrow.png" alt=""></a>
                <?php endif; ?>
            </div>
        </div>
    </section><!-- common-section-wrap -->
    <?php } ?>

    <section class="info-text-wrapper">
        <div class="container">
            <h2><?php echo the_field('fourth_sub_title_contact');?></h2>
            <ul>
                <li><img class="svg"  src="<?php echo get_template_directory_uri(); ?>/images/mail-icon.svg" alt=""><a href="mailto:<?php echo the_field('email_info');?>"><?php echo the_field('email_info');?></a></li>
                <li><img class="svg" src="<?php echo get_template_directory_uri(); ?>/images/phone-icon.svg" alt="">
                     <?php if( $schedule_a_call_link ): ?>
                        <a href="<?php echo esc_url( $schedule_a_call_link['url'] ); ?>" target="<?php echo $schedule_a_call_link['target'];?>"><?php echo  $schedule_a_call_link['title']; ?></a>
                    <?php endif; ?>
                </li>
            </ul>
        </div><!-- container -->
    </section><!-- info-text-wrapper -->
    
</main><!-- #main -->

<?php
get_footer();
