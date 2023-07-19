<?php
/* Template Name: Captive Vs Independent Comparison Page Template */
get_header('agency'); ?>
<style>
  .dropdown1,
  .dropdown2,
  .dropdown3 {
    display: none;
  }

  .no-results-A,
  .no-results-B,
  .no-results-C {
    display: none;
  }
</style>
<section class="hero-content-section-wrap">
  <div class="container">
    <div class="hero-content-section">
      <h1><?php the_title(); ?></h1>
      <?php the_content(); ?>
    </div><!-- hero-content-section -->
  </div><!-- container -->
</section>

<section class="search-dropdoun-section">
  <div class="container">
    <form>
      <div class="row">
        <div class="col-md-3 col-6">
          <div class="attribute-head">
            <h2>Attributes</h2>
          </div><!-- attribute-head -->
        </div><!-- col -->
        <div class="col-md-4 col-6">
          <div class="input-field">
            <div class="input-label" id="keyword1-label">
              <input class="example" type="text" name="keyword1" id="keyword1" placeholder="Select Captive Agency" autocomplete="off">
            </div>
            <!--<div id="datafetch">Search results will appear here</div> -->
            <div class="dropdown1 drop-class"> <?php
              $post_query = new WP_Query(['post_type' => 'capvin-agency', 'posts_per_page' => -1, 'orderby' => 'title', 'order' => 'ASC','tax_query' => array(  array(
                    'taxonomy' => 'agency_categories', 
                    'field' => 'slug', 
                    'terms' => array('captive-agency'),
                    'include_children' => true, 
                    'operator' => 'IN' ),
                ),
              ]);
              if ($post_query->have_posts()) : ?>
                <div id="myDropdown1" class="dropdown-content1 drop-down-main"><?php
                  while ($post_query->have_posts()) : $post_query->the_post(); ?>
                    <a id="<?= get_the_id(); ?>" href="javascript:void(0)" onClick="loadAgencyA(this.id,'<?= get_the_title(); ?>')"> <?php the_title(); ?>
                    </a><?php
                  endwhile;
                  wp_reset_postdata(); ?>
                  <!-- <a href="javascript:void(0)" class="no-results-A">No Results Found</a> -->
                </div><?php
              endif; ?>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-6">
          <div class="input-field">
            <div class="input-label" id="keyword2-label">
              <input class="example" type="text" name="keyword2" id="keyword2" placeholder="Select Independent Agency" autocomplete="off">
            </div>
            <!-- onkeyup ="fetch_2(this.value)" -->
            <!-- <div id="datafetch_2">Search results will appear here</div> -->
            <div class="dropdown2 drop-class"><?php
              $post_query2 = new WP_Query(['post_type' => 'capvin-agency', 'posts_per_page' => -1, 'orderby' => 'title', 'order' => 'ASC','tax_query' => array(  array(
                    'taxonomy' => 'agency_categories', 
                    'field' => 'slug', 
                    'terms' => array('independent-agency'),
                    'include_children' => true, 
                    'operator' => 'IN' ),
                ),
              ]);
              if ($post_query2->have_posts()) : ?>
                <div id="myDropdown2" class="dropdown-content2 drop-down-main"><?php
                  while ($post_query2->have_posts()) : $post_query2->the_post(); ?>
                    <a id="<?= get_the_id(); ?>" href="javascript:void(0)" onClick="loadAgencyB(this.id,'<?= get_the_title(); ?>')"> <?php the_title(); ?>
                    </a><?php
                  endwhile;
                  wp_reset_postdata(); ?>
                  <!-- <a href="javascript:void(0)" class="no-results-B">No Results Found</a> -->
                </div><?php
              endif; ?>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-6" style="display:none;">
          <div class="input-field">
            <div class="input-label" id="keyword3-label">
              <input class="example" type="text" name="keyword3" id="keyword3" placeholder="Select Agency" autocomplete="off">
            </div>
            <!-- onkeyup ="fetch_3(this.value)" -->
            <!-- onkeyup <div id="datafetch_3">Search results will appear here</div> -->
            <div class="dropdown3 drop-class"> <?php
              $post_query3 = new WP_Query(['post_type' => 'capvin-agency', 'posts_per_page' => -1, 'orderby' => 'title', 'order' => 'ASC']);
              if ($post_query3->have_posts()) : ?>
                <div id="myDropdown3" class="dropdown-content3 drop-down-main"><?php
                  while ($post_query3->have_posts()) : $post_query3->the_post(); ?>
                    <a id="<?= get_the_id(); ?>" href="javascript:void(0)" onClick="loadAgencyC(this.id,'<?= get_the_title(); ?>')"> <?php the_title(); ?>
                    </a><?php
                  endwhile;
                  wp_reset_postdata(); ?>
                  <!-- <a href="javascript:void(0)" class="no-results-C">No Results Found</a> -->
                </div><?php
              endif; ?>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</section>

<section class="flex-layouts">
  <div class="container">
    <div class="row">
      <div class="col-3">
        <div class="common-list-element">

          <div class="common-leads-logo">
            <h2>Agency</h2>

          </div><!-- common-leads-logo -->
          <ul>
            <li class="list-0">Business Rating*</li>
            <li class="list-1">Insurance Agent Type</li>
            <li class="list-2">Number of Agents</li>
            <li class="list-3">Commission Splits</li>
            <li class="list-4">Operating States </li>
            <li class="list-5">Servicing Assistance</li>
            <li class="list-6">Average Agency Sales</li>
            <li class="list-7">Technology</li>
            <li class="list-8">Training & Mentorship</li>
            <li class="list-9">Office Requirement</li>
            <li class="list-10">Joining Fees</li>
            <li class="list-11">Sales Quota</li>
            <li class="list-12">Product Types to Sell</li>
            <li class="list-13">Carriers access</li>
            <li class="list-14">Life / Financial Quotes</li>
          </ul>

        </div>
      </div><!-- col -->

      <div class="col-4 agency-value-container-A" id="agency-value-container-A">
        <div class="common-list-element" id="default-A">
          <div class="common-leads-logo">
            <span> - </span>
            <img src="https://agencyheight.com/compare/wp-content/uploads/2022/10/default-logo.png" alt="defaut-logo">
          </div><!-- common-leads-logo -->
          <ul>
            <li class="list-0"> - </li>
            <li class="list-1"> - </li>
            <li class="list-2"> - </li>
            <li class="list-3"> - </li>
            <li class="list-4"> - </li>
            <li class="list-5"> - </li>
            <li class="list-6"> - </li>
            <li class="list-7"> - </li>
            <li class="list-8"> - </li>
            <li class="list-9"> - </li>
            <li class="list-10"> - </li>
            <li class="list-11"> - </li>
            <li class="list-12"> - </li>
            <li class="list-13"> - </li>
            <li class="list-14"> - </li>
          </ul>
        </div><!-- common-list-element -->
      </div><!-- col -->

      <div class="col-4 agency-value-container-B" id="agency-value-container-B">
        <div class="common-list-element" id="default-B">
          <div class="common-leads-logo">
            <span> - </span>
            <img src="https://agencyheight.com/compare/wp-content/uploads/2022/10/default-logo.png" alt="defaut-logo">
          </div><!-- common-leads-logo -->
          <ul>
            <li class="list-0"> - </li>
            <li class="list-1"> - </li>
            <li class="list-2"> - </li>
            <li class="list-3"> - </li>
            <li class="list-4"> - </li>
            <li class="list-5"> - </li>
            <li class="list-6"> - </li>
            <li class="list-7"> - </li>
            <li class="list-8"> - </li>
            <li class="list-9"> - </li>
            <li class="list-10"> - </li>
            <li class="list-11"> - </li>
            <li class="list-12"> - </li>
            <li class="list-13"> - </li>
            <li class="list-14"> - </li>
          </ul>
        </div><!-- common-list-element -->
      </div><!-- col -->

      <div class="col-3 agency-value-container-C" id="agency-value-container-C" style="display:none;">
        <div class="common-list-element" id="default-C">
          <div class="common-leads-logo">
            <span> - </span>
            <img src="https://agencyheight.com/compare/wp-content/uploads/2022/10/default-logo.png" alt="defaut-logo">
          </div><!-- common-leads-logo -->
          <ul>
           <li class="list-0"> - </li>
            <li class="list-1"> - </li>
            <li class="list-2"> - </li>
            <li class="list-3"> - </li>
            <li class="list-4"> - </li>
            <li class="list-5"> - </li>
            <li class="list-6"> - </li>
            <li class="list-7"> - </li>
            <li class="list-8"> - </li>
            <li class="list-9"> - </li>
            <li class="list-10"> - </li>
            <li class="list-11"> - </li>
            <li class="list-12"> - </li>
            <li class="list-13"> - </li>
            <li class="list-14"> - </li>
          </ul>
        </div><!-- common-list-element -->
      </div><!-- col -->
      
      <!--<div class="col-xs-12 col-md-12">
        <div class="ratings-preview-text"> 
          <i>*- Ratings are from public review sites.</i>
        </div>
      </div> -->

    </div><!-- row -->
  </div><!-- comtainer -->
</section>

<section class="flex-layouts mobile">
  <div class="container mobile-display-container">

    <div class="mobile-table-layout-wrap">
      <div class="flex-mobile-head">
        <h2>Agency</h2>
      </div><!-- flex-mobile-head -->
      <div class="row">
        <div class="col-6">
          <div class="common-list-element" id="default-A">
            -
            <img src="https://agencyheight.com/compare/wp-content/uploads/2022/10/default-logo.png" alt="defaut-logo">
          </div><!-- common-list-element -->
        </div>
        <div class="col-6">
          <div class="common-list-element" id="default-B">
            -
            <img src="https://agencyheight.com/compare/wp-content/uploads/2022/10/default-logo.png" alt="defaut-logo">
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
              <li class="list-0"> - </li>
            </ul>
          </div><!-- common-list-element -->
        </div>
        <div class="col-6">
          <div class="common-list-element">
            <ul>
              <li class="list-0"> - </li>
            </ul>
          </div><!-- common-list-element -->
        </div>
        <!-- col -->
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
              <li class="list-1"> - </li>
            </ul>
          </div><!-- common-list-element -->
        </div>
        <div class="col-6">
          <div class="common-list-element">
            <ul>
              <li class="list-1"> - </li>
            </ul>
          </div><!-- common-list-element -->
        </div>
        <!-- col -->
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
              <li class="list-2"> - </li>
            </ul>
          </div><!-- common-list-element -->
        </div>
        <div class="col-6">
          <div class="common-list-element">
            <ul>
              <li class="list-2"> - </li>
            </ul>
          </div><!-- common-list-element -->
        </div>
        <!-- col -->
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
              <li class="list-3"> - </li>
            </ul>
          </div><!-- common-list-element -->
        </div>
        <div class="col-6">
          <div class="common-list-element">
            <ul>
              <li class="list-3"> - </li>
            </ul>
          </div><!-- common-list-element -->
        </div>
        <!-- col -->
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
              <li class="list-4"> - </li>
            </ul>
          </div><!-- common-list-element -->
        </div>
        <div class="col-6">
          <div class="common-list-element">
            <ul>
              <li class="list-4"> - </li>
            </ul>
          </div><!-- common-list-element -->
        </div>
        <!-- col -->
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
              <li class="list-5"> - </li>
            </ul>
          </div><!-- common-list-element -->
        </div>
        <div class="col-6">
          <div class="common-list-element">
            <ul>
              <li class="list-5"> - </li>
            </ul>
          </div><!-- common-list-element -->
        </div>
        <!-- col -->
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
              <li class="list-6"> - </li>
            </ul>
          </div><!-- common-list-element -->
        </div>
        <div class="col-6">
          <div class="common-list-element">
            <ul>
              <li class="list-6"> - </li>
            </ul>
          </div><!-- common-list-element -->
        </div>
        <!-- col -->
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
              <li class="list-7"> - </li>
            </ul>
          </div><!-- common-list-element -->
        </div>
        <div class="col-6">
          <div class="common-list-element">
            <ul>
              <li class="list-7"> - </li>
            </ul>
          </div><!-- common-list-element -->
        </div>
        <!-- col -->
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
              <li class="list-8"> - </li>
            </ul>
          </div><!-- common-list-element -->
        </div>
        <div class="col-6">
          <div class="common-list-element">
            <ul>
              <li class="list-8"> - </li>
            </ul>
          </div><!-- common-list-element -->
        </div>
        <!-- col -->
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
              <li class="list-9"> - </li>
            </ul>
          </div><!-- common-list-element -->
        </div>
        <div class="col-6">
          <div class="common-list-element">
            <ul>
              <li class="list-9"> - </li>
            </ul>
          </div><!-- common-list-element -->
        </div>
        <!-- col -->
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
              <li class="list-10"> - </li>
            </ul>
          </div><!-- common-list-element -->
        </div>
        <div class="col-6">
          <div class="common-list-element">
            <ul>
              <li class="list-10"> - </li>
            </ul>
          </div><!-- common-list-element -->
        </div>
        <!-- col -->
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
              <li class="list-11"> - </li>
            </ul>
          </div><!-- common-list-element -->
        </div>
        <div class="col-6">
          <div class="common-list-element">
            <ul>
              <li class="list-11"> - </li>
            </ul>
          </div><!-- common-list-element -->
        </div>
        <!-- col -->
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
              <li class="list-12"> - </li>
            </ul>
          </div><!-- common-list-element -->
        </div>
        <div class="col-6">
          <div class="common-list-element">
            <ul>
              <li class="list-12"> - </li>
            </ul>
          </div><!-- common-list-element -->
        </div>
        <!-- col -->
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
              <li class="list-12"> - </li>
            </ul>
          </div><!-- common-list-element -->
        </div>
        <div class="col-6">
          <div class="common-list-element">
            <ul>
              <li class="list-12"> - </li>
            </ul>
          </div><!-- common-list-element -->
        </div>
        <!-- col -->
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
              <li class="list-13"> - </li>
            </ul>
          </div><!-- common-list-element -->
        </div>
        <div class="col-6">
          <div class="common-list-element">
            <ul>
              <li class="list-13"> - </li>
            </ul>
          </div><!-- common-list-element -->
        </div>
        <!-- col -->
      </div><!-- row -->
    </div><!-- mobile-table-layout-wrap -->

  </div><!-- container -->
</section><?php

/* Agency Comparison Page Additional Fields */
  $review_basis_text      = get_field('review_basis_text');
  $newsletter_heading     = get_field('newsletter_heading');
  $newsletter_sub_heading = get_field('newsletter_sub_heading');
  $paper_form_script      = get_field('paper_form_script');
  $show_hide_paperform    = get_field('show_hide_paperform'); 

if($review_basis_text): ?>
  <section class="rating-review-description">
    <div class="container">
      <div class="ratings-preview-text"> 
        <i><?php echo  $review_basis_text ; ?></i>
      </div>
    </div>
  </section><?php
endif; 

if($show_hide_paperform == true): ?>
  <section class="form-section-paper">
    <div class="container">
      <div class="form-wrapper">
        <div class="form-head">
          <h2><?php echo $newsletter_heading; ?></h2>
          <p><?php echo $newsletter_sub_heading; ?></p>
        </div>

        <div class="paper-form-custom">
          <div data-paperform-id="compare-agency" data-prefill-inherit="1">
          </div><?php echo $paper_form_script; ?>
        </div>
      </div>
    </div>
  </section><?php
endif; ?>

<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="<?= get_template_directory_uri() . '/js/compare-keyup-search.js'; ?>"></script><?php
get_footer('agency'); ?>