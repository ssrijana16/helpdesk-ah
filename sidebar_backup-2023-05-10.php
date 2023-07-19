<?php



/**

 * The sidebar containing the main widget area

 *

 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials

 *

 * @package resources

 */





if (get_queried_object()) {

  $post_obj = get_queried_object();
  //print_r($post_obj);
 

  if ($post_obj->term_id) {
    $categoryId = $post_obj->term_id;
  } else {
    $categoryId = '';
  }

  if ($post_obj->ID) {
    $postId = $post_obj->term_id;
  } else {
    $postId = '';
  }

}

?>

<div class="fixed-menus-wrap">

  <div class="search-wrap">

    <div class="search">

      <form method="GET" action="<?php echo site_url();?>" name="search-form">

        <input type="text" name="s" class="searchTerm" id="search-input" placeholder="<?php the_field('search_form_placeholder', 'options'); ?>">

        <button type="submit" class="searchButton">

          <img src="<?php echo get_template_directory_uri(); ?>/images/search-icon.png" alt="">

        </button>

      </form>

      <div class="searchResults"></div>

    </div>

  </div>

  <ul>

    <li><img class="svg" src="<?php echo get_template_directory_uri(); ?>/images/home-helpdesk.svg" alt="home" /> <a href="<?php echo esc_url(home_url('/')); ?>helpdesk">Help Desk Home</a></li>

    <?php

    $get_parent_cats = array('orderby' => 'term_id', 'order' => 'ASC', 'hide_empty' => 0, 'parent' => '0');

    //$all_categories = get_categories($get_parent_cats); //get parent categories 

    $all_categories = get_terms('hd-category',$get_parent_cats);

    foreach ($all_categories as $single_category) :

      //For each category, get the ID
      $catID = $single_category->term_id;

      $image = get_field('sidebar_icon_cat', 'term_' . $catID);
     
      if(isset($categoryId)){  
        $term = get_term($categoryId, 'hd-category');
        $parent_id = $term->parent;        
      }
  
      if ($parent_id == $catID) {
        $class = "active";
      } else if(isset($postId) && has_term($catID, 'hd-category', $postId)){     
        $class = "active";
      } else {
        $class = "";
      }

      $hashClassCat = "#catContent";



    ?>

      <li class="<?php echo $class; ?>">

        <?php if (!empty($image)) : ?>

          <img class="svg" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />

        <?php endif; ?>

        <?php echo $single_category->name; ?><?php

        //Get children of this parent using the catID variable from earlier         
        $args = array(
          'child_of'     => $catID,
          'hide_empty'   => false,
          'taxonomy'     => 'hd-category'
        );   

        $child_cats = get_categories($args);
        //print_r($child_cats);

        if($child_cats) { ?>

          <ul><?php

              foreach ($child_cats as $child_cat) :

                //For each child category, get the ID
                $childID = $child_cat->term_id;                

                if(isset($postId) && has_term($childID, 'hd-category', $postId)){  
                  $subClass = "has-content";
                } else if ($categoryId == $childID) {
                  $subClass = 'has-content';
                } else {
                  $subClass = "";
                }

                $hashClass = "#singleContent";


                //For each child category, give us the link and name 

              ?>

              <li class="<?php echo $subClass; ?>"><a href="<?php echo get_category_link($childID) . $hashClassCat; ?>"><?php echo $child_cat->name; ?></a>

                <ul><?php
                    $query = new WP_Query(array(
                      'post_type' => 'help',                     
                      'posts_per_page' => 10,
                      'tax_query' => array(
                            array(
                                'taxonomy' => 'hd-category',
                                'field' => 'term_id',
                                'terms' => $childID,
                            )
                        )
                    ));

                   // $query = new WP_Query(array('cat' => $childID, 'posts_per_page' => 10));

                    while ($query->have_posts()) : $query->the_post(); ?>

                    <li><a class="js-anchor-link" href="<?php echo get_the_permalink() . $hashClass; ?>"><?php echo get_the_title(); ?></a></li><?php

                    endwhile;

                    wp_reset_postdata(); ?>     

                </ul>

              </li><?php



                  endforeach; ?>

          </ul>

        <?php } else { ?>

          <ul><?php

              $querys = new WP_Query(array(
                'post_type' => 'help',
                //'cat' => $catID, 
                'posts_per_page' => 10,
                'tax_query' => array(
                      array(
                          'taxonomy' => 'hd-category',
                          'field' => 'term_id',
                          'terms' => $catID,
                      )
                  )
              ));

              while ($querys->have_posts()) : $querys->the_post(); ?>

              <li><a class="js-anchor-link" href="<?php echo get_the_permalink() . $hashClass; ?>"><?php echo get_the_title(); ?></a></li>

            <?php endwhile; wp_reset_postdata(); ?>



          </ul>

        <?php } ?>

      </li><?php

          endforeach; ?>

  </ul>

</div>