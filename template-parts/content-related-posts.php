<?php
//Related post of the current post
$post_obj = get_queried_object();
$related_categories = wp_get_post_terms( $post_obj->ID, 'hd-category');

$related_categories_list = array();
foreach($related_categories as $rows){
   array_push($related_categories_list, $rows->term_id);
}

$related_post_list = new WP_Query(['post_type'=>'help', 'posts_per_page'=>5, 'orderby'=>'date', 'order'=>'DESC', 'tax_query'=>[
        array(
            'taxonomy'         => 'hd-category', 
            'field'            => 'term_id',
            'include_children' => true,
            'operator'         => 'IN',
            'terms'            => $related_categories_list,
        ),
    ],
]);

$count_post = $related_post_list->found_posts;
if($related_post_list->have_posts() && $count_post >= 2 ): 
  echo "<div class='learn-text top-border'>
    <h3>Learn More</h3>";
  echo "<ul>";
  while($related_post_list->have_posts()): $related_post_list->the_post();
    $id2 = get_the_id(); 
    if($post_obj->ID != $id2){
    ?>
      <li><a href="<?php echo get_permalink().'#singleContent';?>"><?php if(get_field('display_heading',$id2)){ echo get_field('display_heading',$id2); }else{ echo get_the_title($id2); } ?></a></li>
    <?php
    }
  endwhile;
   echo "</ul></div>";
  wp_reset_postdata();
endif;
?>