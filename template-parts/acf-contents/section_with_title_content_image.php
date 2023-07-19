<?php

if(get_row_layout() == 'section_with_title_content_image'):

  $title = get_sub_field('topic_title');

  $has_description = get_sub_field('add_description_for_topic'); 

  $has_topics = get_sub_field('has_sub_topics'); 

?>
  <div class="scenario-content-item top-border">
    <h3><?php echo $title;?></h3>
    <?php 
      if($has_description == true):
        echo get_sub_field('main_topic_description'); 
        if($has_topics == true):
          $subTopicList = get_sub_field('sub_topics_list');  
          foreach ($subTopicList as $topic):
          ?>
            <ul>
              <li>
                <span><?php echo $topic['sub_topic_title'];?></span><?php echo $topic['sub_topic_content'];?>
                
                
              </li>
            </ul>
          <?php
          endforeach;
        endif;
      endif;?>
  </div>

<?php

endif; ?>