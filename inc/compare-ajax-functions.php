<?php
// The ajax function
  add_action('wp_ajax_data_fetch', 'data_fetch');
  add_action('wp_ajax_nopriv_data_fetch', 'data_fetch');
  function data_fetch(){
    $the_query = new WP_Query(array('posts_per_page' => -1, 's' => esc_attr($_POST['keyword']), 'post_type' => 'agency'));
    if ($the_query->have_posts()) :
      while ($the_query->have_posts()) : $the_query->the_post(); ?>
        <h2><a href="<?php echo esc_url(post_permalink()); ?>"><?php the_title(); ?></a></h2><?php
      endwhile; wp_reset_postdata();
    else : ?>
      <script>
        document.getElementById("keyword").placeholder = "Select Agency";
      </script><?php
    endif;
    die();
  }
  add_action('wp_ajax_data_fetch_2', 'data_fetch_2');
  add_action('wp_ajax_nopriv_data_fetch_2', 'data_fetch_2');
  function data_fetch_2(){
    global $wpdb;
    $keyword_2 = $_POST['key'];
    $results = $wpdb->get_results("SELECT * FROM ahcmp_posts WHERE post_type = 'agency' AND post_status = 'publish' AND post_title LIKE '%$keyword_2%' ORDER BY post_title ASC");
    if ($results) :
      foreach ($results as $rows) { ?>
        <h2>
          <a href="<?php echo get_the_permalink($rows->ID); ?>"><?php echo $rows->post_title; ?></a>
        </h2><?php
      }
    else : ?>
      <script>
        document.getElementById("keyword2").placeholder = "Select Agency";
      </script><?php
    endif;
    die();
  }
  add_action('wp_ajax_data_fetch_3', 'data_fetch_3');
  add_action('wp_ajax_nopriv_data_fetch_3', 'data_fetch_3');
  function data_fetch_3(){
    global $wpdb;
    $keyword_3 = $_POST['key'];
    $results = $wpdb->get_results("SELECT * FROM ahcmp_posts WHERE post_type = 'agency' AND post_status = 'publish' AND post_title LIKE '%$keyword_3%' ORDER BY post_title ASC");
    if ($results):
      foreach ($results as $rows) { ?>
        <h2>
          <a href="<?php echo get_the_permalink($rows->ID); ?>"><?php echo $rows->post_title; ?></a>
        </h2><?php
      }
    else : ?>
      <script>
        document.getElementById("keyword3").placeholder = "Select Agency";
      </script><?php
    endif; 
    die();
  }
//The AJAX Function Clear
  add_action('wp_ajax_data_clear', 'data_clear');
  add_action('wp_ajax_nopriv_data_clear', 'data_clear');
  function data_clear(){
    $the_query = new WP_Query(array('posts_per_page' => -1, 's' => esc_attr($_POST['keyword']), 'post_type' => 'agency'));
    if ($the_query->have_posts()):
      while ($the_query->have_posts()) : $the_query->the_post();
      endwhile; wp_reset_postdata();
    else : ?>
      <script>
        document.getElementById("keyword").placeholder = "Select Agency";
      </script><?php
    endif;
    die();
  }
  add_action('wp_ajax_data_clear_2', 'data_clear_2');
  add_action('wp_ajax_nopriv_data_clear_2', 'data_clear_2');
  function data_clear_2(){ ?>
    <script>
      document.getElementById("keyword2").placeholder = "Select Agency";
    </script><?php
    die(); 
  }
  add_action('wp_ajax_data_clear_3', 'data_clear_3');
  add_action('wp_ajax_nopriv_data_clear_3', 'data_clear_3');
  function data_clear_3(){ ?>
    <script>
      document.getElementById("keyword3").placeholder = "Select Agency";
    </script><?php
    die();
  }

//Load Agenciess Data On Dropdown Select
  add_action('wp_ajax_agency_load_function1', 'agency_load_function1');
  add_action('wp_ajax_nopriv_agency_load_function1', 'agency_load_function1');
  function agency_load_function1(){
    $id = $_POST['id'];
    $post_data = get_post($id);
    if($post_data->post_type == 'agency'):
      //For Agency Comparison
      $agency_logo = get_field('agency_logo', $id);
      $line_of_business = get_field('line_of_business', $id);
      $other_line_of_business = get_field('other_line_of_business', $id);
      $lines = get_field('lines', $id);
      $agency_rating = get_field('agency_rating', $id);
      $number_of_carriers = get_field('number_of_carriers', $id);
      $operating_states = get_field('operating_states', $id);
      $servicing_assistance = get_field('servicing_assistance', $id);
      $retail_requirement = get_field('retail_requirement', $id);
      $technology = get_field('technology', $id);
      $fees = get_field('fees', $id);
      $agency_link = get_field('agency_link', $id); ?>
      <div class="common-list-element">
        <div class="common-leads-logo">
            <img src="<?php echo $agency_logo['url']; ?>" alt="<?php echo $agency_logo['alt']; ?>">
        </div><!-- common-leads-logo -->
        <ul>
          <li class="list-0"><?php 
            if ($agency_rating) { ?>
              <div class="star-icons">
                  <div>
                      <img src="<?php echo get_template_directory_uri() . '/images/stars-blank.png'; ?>" alt="stars-blank">
                  </div>
                  <div class="cornerimage" style="width:<?php echo $agency_rating * 20; ?>%;">
                      <img src="<?php echo get_template_directory_uri() . '/images/stars-full.png'; ?>" alt="stars-full">
                  </div>
                  <span><?php echo $agency_rating . " out of 5"; ?></span>
              </div><?php 
            } ?>
          </li>
          <li class="list-1"><?php echo $line_of_business; ?></li>
          <li class="list-2"><?php
            if($lines):
              $counter = 0;
              foreach ($lines as $rows):
                echo '<span class="commision-split-data list-2-row-' . $counter . '"><strong>' . $rows['splits_title'] . '</strong>' . $rows['splits_description'] . '</span>';
                $counter++;
              endforeach;
            else:
              echo '-'; 
            endif;?>
          </li>
          <li class="list-3"><?php echo $number_of_carriers; ?></li>
          <li class="list-4"><?php echo $operating_states; ?></li>
          <li class="list-5"><?php 
            if($servicing_assistance){ echo $servicing_assistance; } 
            else { echo '-'; } ?>
          </li>
          <li class="list-6"><?php 
            if($retail_requirement){ echo $retail_requirement; } 
            else { echo '-'; } ?>
          </li>
          <li class="list-7"><?php 
            if($technology){ echo $technology; } 
            else { echo '-'; } ?>
          </li>
          <li class="list-8"><?php 
            if($fees){ echo $fees; } 
            else { echo '-'; } ?> 
          </li>
        </ul><?php 
        if ($agency_link) {
          $agency_link_url = $agency_link['url'];
          $agency_link_title = $agency_link['title'] ? $agency_link['title'] : "Contact The Agency";
          $agency_link_target = $agency_link['target'] ? $agency_link['target'] : '_self'; ?>
          <div class="common-button light-red">
              <a href="<?php echo $agency_link_url; ?>" target="<?php echo esc_attr($agency_link_target); ?>" rel="nofollow"><?php echo esc_html($agency_link_title); ?></a>
          </div><?php 
        } ?>
      </div><?php
    elseif($post_data->post_type == 'capvin-agency'):
      //For Active Vs Independent Agency Comparison
      $agency_logo = get_field('agency_logo', $id);
      $business_rating = get_field('business_rating', $id);
      $insurance_agent_type = get_field('insurance_agent_type', $id);
      $number_of_agents = get_field('number_of_agents', $id);
      $commission_splits = get_field('commission_splits', $id);
      $operating_states = get_field('operating_states', $id);
      $servicing_assistance = get_field('servicing_assistance', $id);
      $average_agency_sales = get_field('average_agency_sales', $id);
      $technology = get_field('technology', $id);
      $training_and_mentorship = get_field('training_and_mentorship', $id);
      $office_requirement = get_field('office_requirement', $id);
      $joining_fees = get_field('joining_fees', $id);
      $sales_quota = get_field('sales_quota', $id);
      $product_types_to_sell = get_field('product_types_to_sell', $id);
      $carriers_access = get_field('carriers_access', $id);
      $life_financial_quotes = get_field('life_financial_quotes', $id);
      $agency_link = get_field('agency_link', $id); ?>
      <div class="common-list-element">
        <div class="common-leads-logo">
            <img src="<?php echo $agency_logo['url']; ?>" alt="<?php echo $agency_logo['alt']; ?>">
        </div><!-- common-leads-logo -->
        <ul>
          <li class="list-0"><?php 
            if ($business_rating) { ?>
            <div class="star-icons">
                <div>
                    <img src="<?php echo get_template_directory_uri() . '/images/stars-blank.png'; ?>" alt="stars-blank">
                </div>
                <div class="cornerimage" style="width:<?php echo $business_rating * 20; ?>%;">
                    <img src="<?php echo get_template_directory_uri() . '/images/stars-full.png'; ?>" alt="stars-full">
                </div>
                <span><?php echo $business_rating . " out of 5"; ?></span>
              </div><?php 
            } ?>
          </li>
           <li class="list-1"><?php 
            if($insurance_agent_type){ echo $insurance_agent_type; }
            else{ echo '-';} ?>
          </li>
          <li class="list-2"><?php 
            if($number_of_agents){ echo $number_of_agents; }
            else{ echo '-';} ?>            
          </li>
          <li class="list-3"><?php 
            if($commission_splits){ echo $commission_splits; }
            else{ echo'-';} ?>              
          </li>
          <li class="list-4"><?php 
            if($operating_states){ echo $operating_states; }
            else{ echo '-';} ?>              
          </li>
          <li class="list-5"><?php 
            if($servicing_assistance){ echo $servicing_assistance; }
            else{ echo'-';} ?>              
          </li>
          <li class="list-6"><?php 
            if($average_agency_sales){ echo $average_agency_sales; }
            else{ echo '-';} ?>              
          </li>
          <li class="list-7"><?php 
            if($technology){ echo $technology; }
            else{ echo "-";} ?>
          </li>
          <li class="list-8"><?php 
            if($training_and_mentorship){ echo $training_and_mentorship; }
            else{ echo'-'; } ?>              
          </li>
          <li class="list-9"><?php 
            if($office_requirement){ echo $office_requirement; }
            else{ echo "-";} ?>
          </li>
          <li class="list-10"><?php 
            if($joining_fees){ echo $joining_fees; }
            else{ echo "-";} ?>              
          </li>
          <li class="list-11"><?php 
            if($sales_quota){ echo $sales_quota; }
            else{ echo"-";}?>
          </li>
          <li class="list-12"><?php 
            if($product_types_to_sell){ echo $product_types_to_sell; }
            else{ echo"-";} ?>
          </li>
          <li class="list-13"><?php 
            if($carriers_access){ echo $carriers_access; }
            else{ echo"-";} ?>
          </li>
          <li class="list-14"><?php 
            if($life_financial_quotes){ echo $life_financial_quotes; }
            else{ echo"-";} ?>
          </li>
        </ul><?php 
        if ($agency_link) {
          $agency_link_url = $agency_link['url'];
          $agency_link_title = $agency_link['title'] ? $agency_link['title'] : "Contact The Agency";
          $agency_link_target = $agency_link['target'] ? $agency_link['target'] : '_self'; ?>
          <div class="common-button light-red">
              <a href="<?php echo $agency_link_url; ?>" target="<?php echo esc_attr($agency_link_target); ?>" rel="nofollow"><?php echo esc_html($agency_link_title); ?></a>
          </div><?php 
        } ?>
      </div><?php
    else:
      //Do Nothing
    endif;
    wp_die();
  }

  add_action('wp_ajax_agency_load_function2', 'agency_load_function2');
  add_action('wp_ajax_nopriv_agency_load_function2', 'agency_load_function2');
  function agency_load_function2(){
    $id = $_POST['id'];
    $post_data = get_post($id);
    if($post_data->post_type == 'agency'):
      //For Agency Comparison
      $agency_logo = get_field('agency_logo', $id);
      $line_of_business = get_field('line_of_business', $id);
      $other_line_of_business = get_field('other_line_of_business', $id);
      $lines = get_field('lines', $id);
      $agency_rating = get_field('agency_rating', $id);
      $number_of_carriers = get_field('number_of_carriers', $id);
      $operating_states = get_field('operating_states', $id);
      $servicing_assistance = get_field('servicing_assistance', $id);
      $retail_requirement = get_field('retail_requirement', $id);
      $technology = get_field('technology', $id);
      $fees = get_field('fees', $id);
      $agency_link = get_field('agency_link', $id); ?>
      <div class="common-list-element">
        <div class="common-leads-logo">
            <img src="<?php echo $agency_logo['url']; ?>" alt="<?php echo $agency_logo['alt']; ?>">
        </div><!-- common-leads-logo -->
        <ul>
          <li class="list-0"><?php 
            if ($agency_rating) { ?>
              <div class="star-icons">
                  <div>
                      <img src="<?php echo get_template_directory_uri() . '/images/stars-blank.png'; ?>" alt="stars-blank">
                  </div>
                  <div class="cornerimage" style="width:<?php echo $agency_rating * 20; ?>%;">
                      <img src="<?php echo get_template_directory_uri() . '/images/stars-full.png'; ?>" alt="stars-full">
                  </div>
                  <span><?php echo $agency_rating . " out of 5"; ?></span>
              </div><?php 
            } ?>
          </li>
          <li class="list-1"><?php echo $line_of_business; ?></li>
          <li class="list-2"><?php
            if($lines):
              $counter = 0;
              foreach ($lines as $rows):
                echo '<span class="commision-split-data list-2-row-' . $counter . '"><strong>' . $rows['splits_title'] . '</strong>' . $rows['splits_description'] . '</span>';
                $counter++;
              endforeach;
            else:
              echo '-'; 
            endif;?>
          </li>
          <li class="list-3"><?php echo $number_of_carriers; ?></li>
          <li class="list-4"><?php echo $operating_states; ?></li>
          <li class="list-5"><?php 
            if($servicing_assistance){ echo $servicing_assistance; } 
            else { echo '-'; } ?>
          </li>
          <li class="list-6"><?php 
            if($retail_requirement){ echo $retail_requirement; } 
            else { echo '-'; } ?>
          </li>
          <li class="list-7"><?php 
            if($technology){ echo $technology; } 
            else { echo '-'; } ?>
          </li>
          <li class="list-8"><?php 
            if($fees){ echo $fees; } 
            else { echo '-'; } ?> 
          </li>
        </ul><?php 
        if ($agency_link) {
          $agency_link_url = $agency_link['url'];
          $agency_link_title = $agency_link['title'] ? $agency_link['title'] : "Contact The Agency";
          $agency_link_target = $agency_link['target'] ? $agency_link['target'] : '_self'; ?>
          <div class="common-button light-red">
              <a href="<?php echo $agency_link_url; ?>" target="<?php echo esc_attr($agency_link_target); ?>" rel="nofollow"><?php echo esc_html($agency_link_title); ?></a>
          </div><?php 
        } ?>
      </div><?php
    elseif($post_data->post_type == 'capvin-agency'):
      //For Active Vs Independent Agency Comparison
      $agency_logo = get_field('agency_logo', $id);
      $business_rating = get_field('business_rating', $id);
      $insurance_agent_type = get_field('insurance_agent_type', $id);
      $number_of_agents = get_field('number_of_agents', $id);
      $commission_splits = get_field('commission_splits', $id);
      $operating_states = get_field('operating_states', $id);
      $servicing_assistance = get_field('servicing_assistance', $id);
      $average_agency_sales = get_field('average_agency_sales', $id);
      $technology = get_field('technology', $id);
      $training_and_mentorship = get_field('training_and_mentorship', $id);
      $office_requirement = get_field('office_requirement', $id);
      $joining_fees = get_field('joining_fees', $id);
      $sales_quota = get_field('sales_quota', $id);
      $product_types_to_sell = get_field('product_types_to_sell', $id);
      $carriers_access = get_field('carriers_access', $id);
      $life_financial_quotes = get_field('life_financial_quotes', $id);
      $agency_link = get_field('agency_link', $id); ?>
      <div class="common-list-element">
        <div class="common-leads-logo">
            <img src="<?php echo $agency_logo['url']; ?>" alt="<?php echo $agency_logo['alt']; ?>">
        </div><!-- common-leads-logo -->
        <ul>
          <li class="list-0"><?php 
            if ($business_rating) { ?>
            <div class="star-icons">
                <div>
                    <img src="<?php echo get_template_directory_uri() . '/images/stars-blank.png'; ?>" alt="stars-blank">
                </div>
                <div class="cornerimage" style="width:<?php echo $business_rating * 20; ?>%;">
                    <img src="<?php echo get_template_directory_uri() . '/images/stars-full.png'; ?>" alt="stars-full">
                </div>
                <span><?php echo $business_rating . " out of 5"; ?></span>
              </div><?php 
            } ?>
          </li>
           <li class="list-1"><?php 
            if($insurance_agent_type){ echo $insurance_agent_type; }
            else{ echo '-';} ?>
          </li>
          <li class="list-2"><?php 
            if($number_of_agents){ echo $number_of_agents; }
            else{ echo '-';} ?>            
          </li>
          <li class="list-3"><?php 
            if($commission_splits){ echo $commission_splits; }
            else{ echo'-';} ?>              
          </li>
          <li class="list-4"><?php 
            if($operating_states){ echo $operating_states; }
            else{ echo '-';} ?>              
          </li>
          <li class="list-5"><?php 
            if($servicing_assistance){ echo $servicing_assistance; }
            else{ echo'-';} ?>              
          </li>
          <li class="list-6"><?php 
            if($average_agency_sales){ echo $average_agency_sales; }
            else{ echo '-';} ?>              
          </li>
          <li class="list-7"><?php 
            if($technology){ echo $technology; }
            else{ echo "-";} ?>
          </li>
          <li class="list-8"><?php 
            if($training_and_mentorship){ echo $training_and_mentorship; }
            else{ echo'-'; } ?>              
          </li>
          <li class="list-9"><?php 
            if($office_requirement){ echo $office_requirement; }
            else{ echo "-";} ?>
          </li>
          <li class="list-10"><?php 
            if($joining_fees){ echo $joining_fees; }
            else{ echo "-";} ?>              
          </li>
          <li class="list-11"><?php 
            if($sales_quota){ echo $sales_quota; }
            else{ echo"-";}?>
          </li>
          <li class="list-12"><?php 
            if($product_types_to_sell){ echo $product_types_to_sell; }
            else{ echo"-";} ?>
          </li>
          <li class="list-13"><?php 
            if($carriers_access){ echo $carriers_access; }
            else{ echo"-";} ?>
          </li>
          <li class="list-14"><?php 
            if($life_financial_quotes){ echo $life_financial_quotes; }
            else{ echo"-";} ?>
          </li>
        </ul><?php 
        if ($agency_link) {
          $agency_link_url = $agency_link['url'];
          $agency_link_title = $agency_link['title'] ? $agency_link['title'] : "Contact The Agency";
          $agency_link_target = $agency_link['target'] ? $agency_link['target'] : '_self'; ?>
          <div class="common-button light-red">
              <a href="<?php echo $agency_link_url; ?>" target="<?php echo esc_attr($agency_link_target); ?>" rel="nofollow"><?php echo esc_html($agency_link_title); ?></a>
          </div><?php 
        } ?>
      </div><?php
    else:
      //Do Nothing
    endif;
    wp_die();
  }

  add_action('wp_ajax_agency_load_function3', 'agency_load_function3');
  add_action('wp_ajax_nopriv_agency_load_function3', 'agency_load_function3');
  function agency_load_function3(){
    $id = $_POST['id'];
    $post_data = get_post($id);
    if($post_data->post_type == 'agency'):
      //For Agency Comparison
      $agency_logo = get_field('agency_logo', $id);
      $line_of_business = get_field('line_of_business', $id);
      $other_line_of_business = get_field('other_line_of_business', $id);
      $lines = get_field('lines', $id);
      $agency_rating = get_field('agency_rating', $id);
      $number_of_carriers = get_field('number_of_carriers', $id);
      $operating_states = get_field('operating_states', $id);
      $servicing_assistance = get_field('servicing_assistance', $id);
      $retail_requirement = get_field('retail_requirement', $id);
      $technology = get_field('technology', $id);
      $fees = get_field('fees', $id);
      $agency_link = get_field('agency_link', $id); ?>
      <div class="common-list-element">
        <div class="common-leads-logo">
            <img src="<?php echo $agency_logo['url']; ?>" alt="<?php echo $agency_logo['alt']; ?>">
        </div><!-- common-leads-logo -->
        <ul>
          <li class="list-0"><?php 
            if ($agency_rating) { ?>
              <div class="star-icons">
                  <div>
                      <img src="<?php echo get_template_directory_uri() . '/images/stars-blank.png'; ?>" alt="stars-blank">
                  </div>
                  <div class="cornerimage" style="width:<?php echo $agency_rating * 20; ?>%;">
                      <img src="<?php echo get_template_directory_uri() . '/images/stars-full.png'; ?>" alt="stars-full">
                  </div>
                  <span><?php echo $agency_rating . " out of 5"; ?></span>
              </div><?php 
            } ?>
          </li>
          <li class="list-1"><?php echo $line_of_business; ?></li>
          <li class="list-2"><?php
            if($lines):
              $counter = 0;
              foreach ($lines as $rows):
                echo '<span class="commision-split-data list-2-row-' . $counter . '"><strong>' . $rows['splits_title'] . '</strong>' . $rows['splits_description'] . '</span>';
                $counter++;
              endforeach;
            else:
              echo '-'; 
            endif;?>
          </li>
          <li class="list-3"><?php echo $number_of_carriers; ?></li>
          <li class="list-4"><?php echo $operating_states; ?></li>
          <li class="list-5"><?php 
            if($servicing_assistance){ echo $servicing_assistance; } 
            else { echo '-'; } ?>
          </li>
          <li class="list-6"><?php 
            if($retail_requirement){ echo $retail_requirement; } 
            else { echo '-'; } ?>
          </li>
          <li class="list-7"><?php 
            if($technology){ echo $technology; } 
            else { echo '-'; } ?>
          </li>
          <li class="list-8"><?php 
            if($fees){ echo $fees; } 
            else { echo '-'; } ?> 
          </li>
        </ul><?php 
        if ($agency_link) {
          $agency_link_url = $agency_link['url'];
          $agency_link_title = $agency_link['title'] ? $agency_link['title'] : "Contact The Agency";
          $agency_link_target = $agency_link['target'] ? $agency_link['target'] : '_self'; ?>
          <div class="common-button light-red">
              <a href="<?php echo $agency_link_url; ?>" target="<?php echo esc_attr($agency_link_target); ?>" rel="nofollow"><?php echo esc_html($agency_link_title); ?></a>
          </div><?php 
        } ?>
      </div><?php
    elseif($post_data->post_type == 'capvin-agency'):
      //For Active Vs Independent Agency Comparison
      $agency_logo = get_field('agency_logo', $id);
      $business_rating = get_field('business_rating', $id);
      $insurance_agent_type = get_field('insurance_agent_type', $id);
      $number_of_agents = get_field('number_of_agents', $id);
      $commission_splits = get_field('commission_splits', $id);
      $operating_states = get_field('operating_states', $id);
      $servicing_assistance = get_field('servicing_assistance', $id);
      $average_agency_sales = get_field('average_agency_sales', $id);
      $technology = get_field('technology', $id);
      $training_and_mentorship = get_field('training_and_mentorship', $id);
      $office_requirement = get_field('office_requirement', $id);
      $joining_fees = get_field('joining_fees', $id);
      $sales_quota = get_field('sales_quota', $id);
      $product_types_to_sell = get_field('product_types_to_sell', $id);
      $carriers_access = get_field('carriers_access', $id);
      $life_financial_quotes = get_field('life_financial_quotes', $id);
      $agency_link = get_field('agency_link', $id); ?>
      <div class="common-list-element">
        <div class="common-leads-logo">
            <img src="<?php echo $agency_logo['url']; ?>" alt="<?php echo $agency_logo['alt']; ?>">
        </div><!-- common-leads-logo -->
        <ul>
          <li class="list-0"><?php 
            if ($business_rating) { ?>
            <div class="star-icons">
                <div>
                    <img src="<?php echo get_template_directory_uri() . '/images/stars-blank.png'; ?>" alt="stars-blank">
                </div>
                <div class="cornerimage" style="width:<?php echo $business_rating * 20; ?>%;">
                    <img src="<?php echo get_template_directory_uri() . '/images/stars-full.png'; ?>" alt="stars-full">
                </div>
                <span><?php echo $business_rating . " out of 5"; ?></span>
              </div><?php 
            } ?>
          </li>
           <li class="list-1"><?php 
            if($insurance_agent_type){ echo $insurance_agent_type; }
            else{ echo '-';} ?>
          </li>
          <li class="list-2"><?php 
            if($number_of_agents){ echo $number_of_agents; }
            else{ echo '-';} ?>            
          </li>
          <li class="list-3"><?php 
            if($commission_splits){ echo $commission_splits; }
            else{ echo'-';} ?>              
          </li>
          <li class="list-4"><?php 
            if($operating_states){ echo $operating_states; }
            else{ echo '-';} ?>              
          </li>
          <li class="list-5"><?php 
            if($servicing_assistance){ echo $servicing_assistance; }
            else{ echo'-';} ?>              
          </li>
          <li class="list-6"><?php 
            if($average_agency_sales){ echo $average_agency_sales; }
            else{ echo '-';} ?>              
          </li>
          <li class="list-7"><?php 
            if($technology){ echo $technology; }
            else{ echo "-";} ?>
          </li>
          <li class="list-8"><?php 
            if($training_and_mentorship){ echo $training_and_mentorship; }
            else{ echo'-'; } ?>              
          </li>
          <li class="list-9"><?php 
            if($office_requirement){ echo $office_requirement; }
            else{ echo "-";} ?>
          </li>
          <li class="list-10"><?php 
            if($joining_fees){ echo $joining_fees; }
            else{ echo "-";} ?>              
          </li>
          <li class="list-11"><?php 
            if($sales_quota){ echo $sales_quota; }
            else{ echo"-";}?>
          </li>
          <li class="list-12"><?php 
            if($product_types_to_sell){ echo $product_types_to_sell; }
            else{ echo"-";} ?>
          </li>
          <li class="list-13"><?php 
            if($carriers_access){ echo $carriers_access; }
            else{ echo"-";} ?>
          </li>
          <li class="list-14"><?php 
            if($life_financial_quotes){ echo $life_financial_quotes; }
            else{ echo"-";} ?>
          </li>
        </ul><?php 
        if ($agency_link) {
          $agency_link_url = $agency_link['url'];
          $agency_link_title = $agency_link['title'] ? $agency_link['title'] : "Contact The Agency";
          $agency_link_target = $agency_link['target'] ? $agency_link['target'] : '_self'; ?>
          <div class="common-button light-red">
              <a href="<?php echo $agency_link_url; ?>" target="<?php echo esc_attr($agency_link_target); ?>" rel="nofollow"><?php echo esc_html($agency_link_title); ?></a>
          </div><?php 
        } ?>
      </div><?php
    else:
      //Do Nothing
    endif;
    wp_die();
  }

add_action('wp_ajax_mobile_agency_load_function', 'mobile_agency_load_function');
  add_action('wp_ajax_nopriv_mobile_agency_load_function', 'mobile_agency_load_function');
  function mobile_agency_load_function(){
    if (!$_POST['idA'] == 0) {
      $_SESSION['idA'] = $_POST['idA'];
      $post_dataA = get_post($_SESSION['idA']);
    }
    if (!$_POST['idB'] == 0) {
      $_SESSION['idB'] = $_POST['idB'];
      $post_dataB = get_post($_SESSION['idB']);      
    }
    if($post_dataA->post_type == 'agency' || $post_dataB->post_type == 'agency'):
      //echo '1st';

      //Assigning all the values for First Dropdown Filter for post_type agency  
        $agency_logo_A = get_field('agency_logo', $_SESSION['idA']);
        $line_of_business_A = get_field('line_of_business', $_SESSION['idA']);
        $lines_A = get_field('lines', $_SESSION['idA']);
        $personal_lines_A = get_field('personal_lines', $_SESSION['idA']);
        $commercial_lines_A = get_field('commercial_lines', $_SESSION['idA']);
        $number_of_carriers_A = get_field('number_of_carriers', $_SESSION['idA']);
        $operating_states_A = get_field('operating_states', $_SESSION['idA']);
        $servicing_assistance_A = get_field('servicing_assistance', $_SESSION['idA']);
        $retail_requirement_A = get_field('retail_requirement', $_SESSION['idA']);
        $technology_A = get_field('technology', $_SESSION['idA']);
        $fees_A = get_field('fees', $_SESSION['idA']);
        $agency_link_A = get_field('agency_link', $_SESSION['idA']);
        $agency_rating_A = get_field('agency_rating', $_SESSION['idA']);

      //Assigning all the values for Second Dropdown Filter for post_type agency 
        $agency_logo_B = get_field('agency_logo', $_SESSION['idB']);
        $line_of_business_B = get_field('line_of_business', $_SESSION['idB']);
        $lines_B = get_field('lines', $_SESSION['idB']);
        $personal_lines_B = get_field('personal_lines', $_SESSION['idB']);
        $commercial_lines_B = get_field('commercial_lines', $_SESSION['idB']);
        $number_of_carriers_B = get_field('number_of_carriers', $_SESSION['idB']);
        $operating_states_B = get_field('operating_states', $_SESSION['idB']);
        $servicing_assistance_B = get_field('servicing_assistance', $_SESSION['idB']);
        $retail_requirement_B = get_field('retail_requirement', $_SESSION['idB']);
        $technology_B = get_field('technology', $_SESSION['idB']);
        $fees_B = get_field('fees', $_SESSION['idB']);
        $agency_link_B = get_field('agency_link', $_SESSION['idB']);
        $agency_rating_B = get_field('agency_rating', $_SESSION['idB']); 

      //Data Population ?>  
        <div class="mobile-table-layout-wrap">
          <div class="flex-mobile-head">
            <h2>Agency</h2>
          </div><!-- flex-mobile-head -->
          <div class="row">
            <div class="col-6">
              <div class="common-list-element"><?php
                if ($agency_logo_A) { ?>
                  <img src="<?php echo $agency_logo_A['url']; ?>" alt="<?php echo $agency_logo_A['alt']; ?>"><?php
                } else { ?>
                  <img src="https://agencyheight.com/compare/wp-content/uploads/2022/10/default-logo.png" alt=""><?php
                } ?>
              </div><!-- common-list-element -->
            </div>
            <div class="col-6">
              <div class="common-list-element"><?php
                if ($agency_logo_B) { ?>
                  <img src="<?php echo $agency_logo_B['url']; ?>" alt="<?php echo $agency_logo_B['alt']; ?>"><?php
                }else{ ?>
                  <img src="https://agencyheight.com/compare/wp-content/uploads/2022/10/default-logo.png" alt=""><?php
                } ?>    
              </div><!-- common-list-element -->
            </div>
            <!-- col -->
          </div><!-- row -->
        </div><!-- mobile-table-layout-wrap -->

        <div class="mobile-table-layout-wrap">
          <div class="flex-mobile-head">
            <h2>Rating</h2>
          </div><!-- flex-mobile-head -->
          <div class="row">
            <div class="col-6">
              <div class="common-list-element">
                <ul>
                  <li class="list-0"><?php 
                    if ($agency_rating_A) { ?>
                      <div class="star-icons">
                        <div>
                          <img src="<?php echo get_template_directory_uri() . '/images/stars-blank.png'; ?>" alt="stars-blank">
                        </div>
                        <div class="cornerimage" style="width:<?php echo $agency_rating_A * 20; ?>%;">
                          <img src="<?php echo get_template_directory_uri() . '/images/stars-full.png'; ?>" alt="stars-full">
                        </div>
                        <span><?php echo $agency_rating_A . " out of 5"; ?></span>
                      </div><?php 
                    } ?>
                  </li>
                </ul>
              </div><!-- common-list-element -->
            </div>
            <div class="col-6">
              <div class="common-list-element">
                <ul>
                  <li class="list-0">
                      <?php if ($agency_rating_B) { ?>
                          <div class="star-icons">
                              <div>
                                  <img src="<?php echo get_template_directory_uri() . '/images/stars-blank.png'; ?>" alt="stars-blank">
                              </div>
                              <div class="cornerimage" style="width:<?php echo $agency_rating_B * 20; ?>%;">
                                  <img src="<?php echo get_template_directory_uri() . '/images/stars-full.png'; ?>" alt="stars-full">
                              </div>
                              <span><?php echo $agency_rating_B . " out of 5"; ?></span>
                          </div>
                      <?php } ?>
                  </li>
                </ul>
              </div><!-- common-list-element -->
            </div><!-- col -->
          </div><!-- row -->
        </div><!-- mobile-table-layout-wrap -->

        <div class="mobile-table-layout-wrap">
          <div class="flex-mobile-head">
            <h2>Line of business</h2>
          </div><!-- flex-mobile-head -->
          <div class="row">
            <div class="col-6">
              <div class="common-list-element">
                <ul>
                  <li class="list-1"><?php
                    if ($line_of_business_A) {
                      echo $line_of_business_A;
                    } else {
                      echo '-';
                    } ?>
                  </li>
                </ul>
              </div><!-- common-list-element -->
            </div>
            <div class="col-6">
              <div class="common-list-element">
                <ul>
                  <li class="list-1"><?php
                    if ($line_of_business_B) {
                      echo $line_of_business_B;
                    } else {
                      echo '-';
                    } ?>
                  </li>
                </ul>
              </div><!-- common-list-element -->
            </div><!-- col -->
          </div><!-- row -->
        </div><!-- mobile-table-layout-wrap -->

        <div class="mobile-table-layout-wrap">
          <div class="flex-mobile-head">
            <h2>Commission splits</h2>
          </div><!-- flex-mobile-head -->
          <div class="row">
            <div class="col-6">
              <div class="common-list-element">
                <ul>
                  <li class="list-2"><?php
                    if ($lines_A) {
                      $counter_A = 0;
                      foreach ($lines_A as $rows): 
                        echo '<span class="commision-split-data list-2-row-' . $counter_A . '"><strong>' . $rows['splits_title'] . '</strong>' . $rows['splits_description'] . '<br></span>';
                      endforeach;
                    } else {
                      echo '-';
                    } ?>
                  </li>
                </ul>
              </div><!-- common-list-element -->
            </div>
            <div class="col-6">
              <div class="common-list-element">
                <ul>                        
                  <li class="list-2"><?php
                    if ($lines_B) {
                      $counter_B = 0;
                      foreach ($lines_B as $rows):
                       echo '<span class="commision-split-data list-2-row-' . $counter_B . '"><strong>' . $rows['splits_title'] . '</strong>' . $rows['splits_description'] . '<br></span>';
                      endforeach;
                    } else {
                      echo '-';
                    } ?>
                  </li>
                </ul>
              </div><!-- common-list-element -->
            </div><!-- col -->
          </div><!-- row -->
        </div><!-- mobile-table-layout-wrap -->

        <div class="mobile-table-layout-wrap">
          <div class="flex-mobile-head">
            <h2>Number of carriers</h2>
          </div><!-- flex-mobile-head -->
          <div class="row">
            <div class="col-6">
              <div class="common-list-element">
                <ul>
                  <li class="list-3"><?php
                    if ($number_of_carriers_A) {
                      echo $number_of_carriers_A;
                    } else {
                      echo '-';
                    } ?>
                    </li>
                  </ul>
                </div><!-- common-list-element -->
              </div>
              <div class="col-6">
                <div class="common-list-element">
                  <ul>
                    <li class="list-3"><?php
                      if ($number_of_carriers_B) {
                        echo $number_of_carriers_B;
                      } else {
                        echo '-';
                      } ?>
                    </li>
                  </ul>
                </div><!-- common-list-element -->
              </div><!-- col -->
            </div><!-- row -->
        </div><!-- mobile-table-layout-wrap -->

        <div class="mobile-table-layout-wrap">
          <div class="flex-mobile-head">
            <h2>Operating states</h2>
          </div><!-- flex-mobile-head -->
          <div class="row">
            <div class="col-6">
              <div class="common-list-element">
                <ul>
                  <li class="list-4"><?php
                    if ($operating_states_A) {
                      echo $operating_states_A;
                    } else {
                      echo '-';
                    } ?>
                  </li>
                </ul>
              </div><!-- common-list-element -->
            </div>
            <div class="col-6">
              <div class="common-list-element">
                <ul>
                  <li class="list-4"><?php
                    if ($operating_states_B) {
                      echo $operating_states_B;
                    } else {
                      echo '-';
                    } ?>
                  </li>
                </ul>
              </div><!-- common-list-element -->
            </div><!-- col -->
          </div><!-- row -->
        </div><!-- mobile-table-layout-wrap -->

        <div class="mobile-table-layout-wrap">
          <div class="flex-mobile-head">
            <h2>Servicing assistance</h2>
          </div><!-- flex-mobile-head -->
          <div class="row">
            <div class="col-6">
              <div class="common-list-element">
                <ul>
                  <li class="list-5"><?php
                    if ($servicing_assistance_A) {
                      echo $servicing_assistance_A;
                    } else {
                      echo '-';
                    } ?>
                  </li>
                </ul>
              </div><!-- common-list-element -->
            </div>
            <div class="col-6">
              <div class="common-list-element">
                <ul>
                  <li class="list-5"><?php
                    if ($servicing_assistance_B) {
                      echo $servicing_assistance_B;
                    } else {
                      echo '-';
                    } ?>
                  </li>
                </ul>
              </div><!-- common-list-element -->
            </div><!-- col -->
          </div><!-- row -->
        </div><!-- mobile-table-layout-wrap -->

        <div class="mobile-table-layout-wrap">
          <div class="flex-mobile-head">
            <h2>Retail Requirement</h2>
          </div><!-- flex-mobile-head -->
          <div class="row">
            <div class="col-6">
              <div class="common-list-element">
                <ul>
                  <li class="list-5"><?php
                    if ($retail_requirement_A) {
                      echo $retail_requirement_A;
                    } else {
                      echo '-';
                    } ?>
                  </li>
                </ul>
              </div><!-- common-list-element -->
            </div>
            <div class="col-6">
              <div class="common-list-element">
                <ul>
                  <li class="list-5"><?php
                    if ($retail_requirement_B) {
                      echo $retail_requirement_B;
                    } else {
                      echo '-';
                    } ?>
                  </li>
                </ul>
              </div><!-- common-list-element -->
            </div><!-- col -->
          </div><!-- row -->
        </div><!-- mobile-table-layout-wrap -->

        <div class="mobile-table-layout-wrap">
          <div class="flex-mobile-head">
            <h2>Technology</h2>
          </div><!-- flex-mobile-head -->
          <div class="row">
            <div class="col-6">
              <div class="common-list-element">
                <ul>
                  <li class="list-6"><?php
                    if ($technology_A) {
                      echo $technology_A;
                    } else {
                      echo '-';
                    } ?>
                  </li>
                </ul>
              </div><!-- common-list-element -->
            </div>
            <div class="col-6">
              <div class="common-list-element">
                <ul>
                  <li class="list-6"><?php
                    if ($technology_B) {
                      echo $technology_B;
                    } else {
                      echo '-';
                    } ?>
                  </li>
                </ul>
              </div><!-- common-list-element -->
            </div><!-- col -->
          </div><!-- row -->
        </div><!-- mobile-table-layout-wrap -->

        <div class="mobile-table-layout-wrap">
          <div class="flex-mobile-head">
            <h2>Fees</h2>
          </div><!-- flex-mobile-head -->
          <div class="row">
            <div class="col-6">
              <div class="common-list-element">
                <ul>
                  <li class="list-6"><?php
                    if ($fees_A) {
                      echo $fees_A;
                    } else {
                      echo '-';
                    } ?>
                  </li>
                </ul>
              </div><!-- common-list-element -->
              <div class="common-button light-red"><?php 
                if ($agency_link_A) {
                  $agency_link_url = $agency_link_A['url'];
                  $agency_link_title = $agency_link_A['title'] ? $agency_link_A['title'] : "Contact The Agency";
                  $agency_link_target = $agency_link_A['target'] ? $agency_link_A['target'] : '_self'; ?>
                  <a href="<?php echo $agency_link_url; ?>" target="<?php echo esc_attr($agency_link_target); ?>" rel="nofollow">  <?php echo esc_html($agency_link_title); ?>
                  </a><?php 
                } ?>
              </div>
            </div>
            <div class="col-6">
              <div class="common-list-element">
                <ul>
                  <li class="list-6"><?php
                    if ($fees_B) {
                      echo $fees_B;
                    } else {
                      echo '-';
                    } ?>
                  </li>
                </ul>
              </div><!-- common-list-element -->
              <div class="common-button light-red"><?php 
                if ($agency_link_B) {
                  $agency_link_url = $agency_link_B['url'];
                  $agency_link_title = $agency_link_B['title'] ? $agency_link_B['title'] : "Contact The Agency";
                  $agency_link_target = $agency_link_B['target'] ? $agency_link_B['target'] : '_self'; ?>
                    <a href="<?php echo $agency_link_url; ?>" target="<?php echo esc_attr($agency_link_target); ?>" rel="nofollow"><?php echo esc_html($agency_link_title); ?></a><?php 
                } ?>
              </div>
            </div><!-- col -->
          </div><!-- row -->
        </div><!-- mobile-table-layout-wrap --><?php

    elseif($post_dataA->post_type == 'capvin-agency' || $post_dataB->post_type == 'capvin-agency'):
      //echo '2nd';

      //Assigning all the values for First Dropdown Filter for post_type capvin-agency
        $agency_logo_A = get_field('agency_logo', $_SESSION['idA']);
        $business_rating_A = get_field('business_rating', $_SESSION['idA']);
        $insurance_agent_type_A = get_field('insurance_agent_type', $_SESSION['idA']);
        $number_of_agents_A = get_field('number_of_agents', $_SESSION['idA']);
        $commission_splits_A = get_field('commission_splits', $_SESSION['idA']);
        $operating_states_A = get_field('operating_states', $_SESSION['idA']);
        $servicing_assistance_A = get_field('servicing_assistance', $_SESSION['idA']);
        $average_agency_sales_A = get_field('average_agency_sales', $_SESSION['idA']);
        $technology_A = get_field('technology', $_SESSION['idA']);
        $training_and_mentorship_A = get_field('training_and_mentorship', $_SESSION['idA']);
        $office_requirement_A = get_field('office_requirement', $_SESSION['idA']);
        $joining_fees_A = get_field('joining_fees', $_SESSION['idA']);
        $sales_quota_A = get_field('sales_quota', $_SESSION['idA']);
        $product_types_to_sell_A = get_field('product_types_to_sell', $_SESSION['idA']);
        $carriers_access_A = get_field('carriers_access', $_SESSION['idA']);
        $life_financial_quotes_A = get_field('life_financial_quotes', $_SESSION['idA']);
        $agency_link_A = get_field('agency_link', $_SESSION['idA']);

      //Assigning all the values for Second Dropdown Filter for post_type capvin-agency
        $agency_logo_B = get_field('agency_logo', $_SESSION['idB']);
        $business_rating_B = get_field('business_rating', $_SESSION['idB']);
        $insurance_agent_type_B = get_field('insurance_agent_type', $_SESSION['idB']);
        $number_of_agents_B = get_field('number_of_agents', $_SESSION['idB']);
        $commission_splits_B = get_field('commission_splits', $_SESSION['idB']);
        $operating_states_B = get_field('operating_states', $_SESSION['idB']);
        $servicing_assistance_B = get_field('servicing_assistance', $_SESSION['idB']);
        $average_agency_sales_B = get_field('average_agency_sales', $_SESSION['idB']);
        $technology_B = get_field('technology', $_SESSION['idB']);
        $training_and_mentorship_B = get_field('training_and_mentorship', $_SESSION['idB']);
        $office_requirement_B = get_field('office_requirement', $_SESSION['idB']);
        $joining_fees_B = get_field('joining_fees', $_SESSION['idB']);
        $sales_quota_B = get_field('sales_quota', $_SESSION['idB']);
        $product_types_to_sell_B = get_field('product_types_to_sell', $_SESSION['idB']);
        $carriers_access_B = get_field('carriers_access', $_SESSION['idB']);
        $life_financial_quotes_B = get_field('life_financial_quotes', $_SESSION['idB']);
        $agency_link_B = get_field('agency_link', $_SESSION['idB']); ?>

      <div class="mobile-table-layout-wrap">
        <div class="flex-mobile-head">
          <h2>Agency</h2>
        </div><!-- flex-mobile-head -->
        <div class="row">
          <div class="col-6">
            <div class="common-list-element"><?php
              if ($agency_logo_A) { ?>
                <img src="<?php echo $agency_logo_A['url']; ?>" alt="<?php echo $agency_logo_A['alt']; ?>"><?php
              } else { ?>
                <img src="https://agencyheight.com/compare/wp-content/uploads/2022/10/default-logo.png" alt=""><?php
              } ?>
            </div><!-- common-list-element -->
          </div>
          <div class="col-6">
            <div class="common-list-element"><?php
              if ($agency_logo_B) { ?>
                <img src="<?php echo $agency_logo_B['url']; ?>" alt="<?php echo $agency_logo_B['alt']; ?>"><?php
              }else{ ?>
                <img src="https://agencyheight.com/compare/wp-content/uploads/2022/10/default-logo.png" alt=""><?php
              } ?>    
            </div><!-- common-list-element -->
          </div>
          <!-- col -->
        </div><!-- row -->
      </div><!-- mobile-table-layout-wrap -->

      <div class="mobile-table-layout-wrap">
        <div class="flex-mobile-head">
          <h2>Business Rating*</h2>
        </div><!-- flex-mobile-head -->
        <div class="row">
          <div class="col-6">
            <div class="common-list-element">
              <ul>
                <li class="list-0"><?php 
                  if ($business_rating_A) { ?>
                    <div class="star-icons">
                      <div>
                        <img src="<?php echo get_template_directory_uri() . '/images/stars-blank.png'; ?>" alt="stars-blank">
                      </div>
                      <div class="cornerimage" style="width:<?php echo $business_rating_A * 20; ?>%;">
                        <img src="<?php echo get_template_directory_uri() . '/images/stars-full.png'; ?>" alt="stars-full">
                      </div>
                      <span><?php echo $business_rating_A . " out of 5"; ?></span>
                    </div><?php 
                  } ?>
                </li>
              </ul>
            </div><!-- common-list-element -->
          </div>
          <div class="col-6">
            <div class="common-list-element">
              <ul>
                <li class="list-0">
                    <?php if ($business_rating_B) { ?>
                        <div class="star-icons">
                            <div>
                                <img src="<?php echo get_template_directory_uri() . '/images/stars-blank.png'; ?>" alt="stars-blank">
                            </div>
                            <div class="cornerimage" style="width:<?php echo $business_rating_B * 20; ?>%;">
                                <img src="<?php echo get_template_directory_uri() . '/images/stars-full.png'; ?>" alt="stars-full">
                            </div>
                            <span><?php echo $business_rating_B . " out of 5"; ?></span>
                        </div>
                    <?php } ?>
                </li>
              </ul>
            </div><!-- common-list-element -->
          </div><!-- col -->
        </div><!-- row -->
      </div><!-- mobile-table-layout-wrap -->

      <div class="mobile-table-layout-wrap">
        <div class="flex-mobile-head">
          <h2>Insurance Agent Type</h2>
        </div><!-- flex-mobile-head -->
        <div class="row">
          <div class="col-6">
            <div class="common-list-element">
              <ul>
                <li class="list-1"><?php
                  if ($insurance_agent_type_A) {
                    echo $insurance_agent_type_A;
                  } else {
                    echo '-';
                  } ?>
                </li>
              </ul>
            </div><!-- common-list-element -->
          </div>
          <div class="col-6">
            <div class="common-list-element">
              <ul>
                <li class="list-1"><?php
                  if ($insurance_agent_type_B) {
                    echo $insurance_agent_type_B;
                  } else {
                    echo '-';
                  } ?>
                </li>
              </ul>
            </div><!-- common-list-element -->
          </div><!-- col -->
        </div><!-- row -->
      </div><!-- mobile-table-layout-wrap -->

      <div class="mobile-table-layout-wrap">
        <div class="flex-mobile-head">
          <h2>Number of Agents</h2>
        </div><!-- flex-mobile-head -->
        <div class="row">
          <div class="col-6">
            <div class="common-list-element">
              <ul>
                <li class="list-1"><?php
                  if ($number_of_agents_A) {
                    echo $number_of_agents_A;
                  } else {
                    echo '-';
                  } ?>
                </li>
              </ul>
            </div><!-- common-list-element -->
          </div>
          <div class="col-6">
            <div class="common-list-element">
              <ul>
                <li class="list-1"><?php
                  if ($number_of_agents_B) {
                    echo $number_of_agents_B;
                  } else {
                    echo '-';
                  } ?>
                </li>
              </ul>
            </div><!-- common-list-element -->
          </div><!-- col -->
        </div><!-- row -->
      </div><!-- mobile-table-layout-wrap -->

      <div class="mobile-table-layout-wrap">
        <div class="flex-mobile-head">
          <h2>Commission Splits</h2>
        </div><!-- flex-mobile-head -->
        <div class="row">
          <div class="col-6">
            <div class="common-list-element">
              <ul>
                <li class="list-1"><?php
                  if ($commission_splits_A) {
                    echo $commission_splits_A;
                  } else {
                    echo '-';
                  } ?>
                </li>
              </ul>
            </div><!-- common-list-element -->
          </div>
          <div class="col-6">
            <div class="common-list-element">
              <ul>
                <li class="list-1"><?php
                  if ($commission_splits_B) {
                    echo $commission_splits_B;
                  } else {
                    echo '-';
                  } ?>
                </li>
              </ul>
            </div><!-- common-list-element -->
          </div><!-- col -->
        </div><!-- row -->
      </div><!-- mobile-table-layout-wrap -->

      <div class="mobile-table-layout-wrap">
        <div class="flex-mobile-head">
          <h2>Operating States</h2>
        </div><!-- flex-mobile-head -->
        <div class="row">
          <div class="col-6">
            <div class="common-list-element">
              <ul>
                <li class="list-1"><?php
                  if ($operating_states_A) {
                    echo $operating_states_A;
                  } else {
                    echo '-';
                  } ?>
                </li>
              </ul>
            </div><!-- common-list-element -->
          </div>
          <div class="col-6">
            <div class="common-list-element">
              <ul>
                <li class="list-1"><?php
                  if ($operating_states_B) {
                    echo $operating_states_B;
                  } else {
                    echo '-';
                  } ?>
                </li>
              </ul>
            </div><!-- common-list-element -->
          </div><!-- col -->
        </div><!-- row -->
      </div><!-- mobile-table-layout-wrap -->

      <div class="mobile-table-layout-wrap">
        <div class="flex-mobile-head">
          <h2>Servicing Assistance</h2>
        </div><!-- flex-mobile-head -->
        <div class="row">
          <div class="col-6">
            <div class="common-list-element">
              <ul>
                <li class="list-1"><?php
                  if ($servicing_assistance_A) {
                    echo $servicing_assistance_A;
                  } else {
                    echo '-';
                  } ?>
                </li>
              </ul>
            </div><!-- common-list-element -->
          </div>
          <div class="col-6">
            <div class="common-list-element">
              <ul>
                <li class="list-1"><?php
                  if ($servicing_assistance_B) {
                    echo $servicing_assistance_B;
                  } else {
                    echo '-';
                  } ?>
                </li>
              </ul>
            </div><!-- common-list-element -->
          </div><!-- col -->
        </div><!-- row -->
      </div><!-- mobile-table-layout-wrap -->

      <div class="mobile-table-layout-wrap">
        <div class="flex-mobile-head">
          <h2>Average Agency Sales</h2>
        </div><!-- flex-mobile-head -->
        <div class="row">
          <div class="col-6">
            <div class="common-list-element">
              <ul>
                <li class="list-1"><?php
                  if ($average_agency_sales_A) {
                    echo $average_agency_sales_A;
                  } else {
                    echo '-';
                  } ?>
                </li>
              </ul>
            </div><!-- common-list-element -->
          </div>
          <div class="col-6">
            <div class="common-list-element">
              <ul>
                <li class="list-1"><?php
                  if ($average_agency_sales_B) {
                    echo $average_agency_sales_B;
                  } else {
                    echo '-';
                  } ?>
                </li>
              </ul>
            </div><!-- common-list-element -->
          </div><!-- col -->
        </div><!-- row -->
      </div><!-- mobile-table-layout-wrap -->

      <div class="mobile-table-layout-wrap">
        <div class="flex-mobile-head">
          <h2>Technology</h2>
        </div><!-- flex-mobile-head -->
        <div class="row">
          <div class="col-6">
            <div class="common-list-element">
              <ul>
                <li class="list-1"><?php
                  if ($technology_A) {
                    echo $technology_A;
                  } else {
                    echo '-';
                  } ?>
                </li>
              </ul>
            </div><!-- common-list-element -->
          </div>
          <div class="col-6">
            <div class="common-list-element">
              <ul>
                <li class="list-1"><?php
                  if ($technology_B) {
                    echo $technology_B;
                  } else {
                    echo '-';
                  } ?>
                </li>
              </ul>
            </div><!-- common-list-element -->
          </div><!-- col -->
        </div><!-- row -->
      </div><!-- mobile-table-layout-wrap -->

      <div class="mobile-table-layout-wrap">
        <div class="flex-mobile-head">
          <h2>Training & Mentorship</h2>
        </div><!-- flex-mobile-head -->
        <div class="row">
          <div class="col-6">
            <div class="common-list-element">
              <ul>
                <li class="list-1"><?php
                  if ($training_and_mentorship_A) {
                    echo $training_and_mentorship_A;
                  } else {
                    echo '-';
                  } ?>
                </li>
              </ul>
            </div><!-- common-list-element -->
          </div>
          <div class="col-6">
            <div class="common-list-element">
              <ul>
                <li class="list-1"><?php
                  if ($training_and_mentorship_B) {
                    echo $training_and_mentorship_B;
                  } else {
                    echo '-';
                  } ?>
                </li>
              </ul>
            </div><!-- common-list-element -->
          </div><!-- col -->
        </div><!-- row -->
      </div><!-- mobile-table-layout-wrap -->

      <div class="mobile-table-layout-wrap">
        <div class="flex-mobile-head">
          <h2>Office Requirement</h2>
        </div><!-- flex-mobile-head -->
        <div class="row">
          <div class="col-6">
            <div class="common-list-element">
              <ul>
                <li class="list-1"><?php
                  if ($office_requirement_A) {
                    echo $office_requirement_A;
                  } else {
                    echo '-';
                  } ?>
                </li>
              </ul>
            </div><!-- common-list-element -->
          </div>
          <div class="col-6">
            <div class="common-list-element">
              <ul>
                <li class="list-1"><?php
                  if ($office_requirement_B) {
                    echo $office_requirement_B;
                  } else {
                    echo '-';
                  } ?>
                </li>
              </ul>
            </div><!-- common-list-element -->
          </div><!-- col -->
        </div><!-- row -->
      </div><!-- mobile-table-layout-wrap -->

      <div class="mobile-table-layout-wrap">
        <div class="flex-mobile-head">
          <h2>Joining Fees</h2>
        </div><!-- flex-mobile-head -->
        <div class="row">
          <div class="col-6">
            <div class="common-list-element">
              <ul>
                <li class="list-1"><?php
                  if ($joining_fees_A) {
                    echo $joining_fees_A;
                  } else {
                    echo '-';
                  } ?>
                </li>
              </ul>
            </div><!-- common-list-element -->
          </div>
          <div class="col-6">
            <div class="common-list-element">
              <ul>
                <li class="list-1"><?php
                  if ($joining_fees_B) {
                    echo $joining_fees_B;
                  } else {
                    echo '-';
                  } ?>
                </li>
              </ul>
            </div><!-- common-list-element -->
          </div><!-- col -->
        </div><!-- row -->
      </div><!-- mobile-table-layout-wrap -->

      <div class="mobile-table-layout-wrap">
        <div class="flex-mobile-head">
          <h2>Sales Quota</h2>
        </div><!-- flex-mobile-head -->
        <div class="row">
          <div class="col-6">
            <div class="common-list-element">
              <ul>
                <li class="list-1"><?php
                  if ($sales_quota_A) {
                    echo $sales_quota_A;
                  } else {
                    echo '-';
                  } ?>
                </li>
              </ul>
            </div><!-- common-list-element -->
          </div>
          <div class="col-6">
            <div class="common-list-element">
              <ul>
                <li class="list-1"><?php
                  if ($sales_quota_B) {
                    echo $sales_quota_B;
                  } else {
                    echo '-';
                  } ?>
                </li>
              </ul>
            </div><!-- common-list-element -->
          </div><!-- col -->
        </div><!-- row -->
      </div><!-- mobile-table-layout-wrap -->

      <div class="mobile-table-layout-wrap">
        <div class="flex-mobile-head">
          <h2>Product Types to Sell</h2>
        </div><!-- flex-mobile-head -->
        <div class="row">
          <div class="col-6">
            <div class="common-list-element">
              <ul>
                <li class="list-1"><?php
                  if ($product_types_to_sell_A) {
                    echo $product_types_to_sell_A;
                  } else {
                    echo '-';
                  } ?>
                </li>
              </ul>
            </div><!-- common-list-element -->
          </div>
          <div class="col-6">
            <div class="common-list-element">
              <ul>
                <li class="list-1"><?php
                  if ($product_types_to_sell_B) {
                    echo $product_types_to_sell_B;
                  } else {
                    echo '-';
                  } ?>
                </li>
              </ul>
            </div><!-- common-list-element -->
          </div><!-- col -->
        </div><!-- row -->
      </div><!-- mobile-table-layout-wrap -->

      <div class="mobile-table-layout-wrap">
        <div class="flex-mobile-head">
          <h2>Carriers access</h2>
        </div><!-- flex-mobile-head -->
        <div class="row">
          <div class="col-6">
            <div class="common-list-element">
              <ul>
                <li class="list-1"><?php
                  if ($carriers_access_A) {
                    echo $carriers_access_A;
                  } else {
                    echo '-';
                  } ?>
                </li>
              </ul>
            </div><!-- common-list-element -->
          </div>
          <div class="col-6">
            <div class="common-list-element">
              <ul>
                <li class="list-1"><?php
                  if ($carriers_access_B) {
                    echo $carriers_access_B;
                  } else {
                    echo '-';
                  } ?>
                </li>
              </ul>
            </div><!-- common-list-element -->
          </div><!-- col -->
        </div><!-- row -->
      </div><!-- mobile-table-layout-wrap -->        

      <div class="mobile-table-layout-wrap">
        <div class="flex-mobile-head">
          <h2>Life / Financial Quotes</h2>
        </div><!-- flex-mobile-head -->
        <div class="row">
          <div class="col-6">
            <div class="common-list-element">
              <ul>
                <li class="list-6"><?php
                  if ($life_financial_quotes_A) {
                    echo $life_financial_quotes_A;
                  } else {
                    echo '-';
                  } ?>
                </li>
              </ul>
            </div><!-- common-list-element -->
            <div class="common-button light-red"><?php 
              if ($agency_link_A) {
                $agency_link_url = $agency_link_A['url'];
                $agency_link_title = $agency_link_A['title'] ? $agency_link_A['title'] : "Contact The Agency";
                $agency_link_target = $agency_link_A['target'] ? $agency_link_A['target'] : '_self'; ?>
                <a href="<?php echo $agency_link_url; ?>" target="<?php echo esc_attr($agency_link_target); ?>" rel="nofollow">  <?php echo esc_html($agency_link_title); ?>
                </a><?php 
              } ?>
            </div>
          </div>
          <div class="col-6">
            <div class="common-list-element">
              <ul>
                <li class="list-6"><?php
                  if ($life_financial_quotes_B) {
                    echo $life_financial_quotes_B;
                  } else {
                    echo '-';
                  } ?>
                </li>
              </ul>
            </div><!-- common-list-element -->
            <div class="common-button light-red"><?php 
              if ($agency_link_B) {
                $agency_link_url = $agency_link_B['url'];
                $agency_link_title = $agency_link_B['title'] ? $agency_link_B['title'] : "Contact The Agency";
                $agency_link_target = $agency_link_B['target'] ? $agency_link_B['target'] : '_self'; ?>
                  <a href="<?php echo $agency_link_url; ?>" target="<?php echo esc_attr($agency_link_target); ?>" rel="nofollow"><?php echo esc_html($agency_link_title); ?></a><?php 
              } ?>
            </div>
          </div><!-- col -->
        </div><!-- row -->
      </div><!-- mobile-table-layout-wrap --><?php

    else:
        
      //Do Nothing

    endif;

    wp_die();
  }