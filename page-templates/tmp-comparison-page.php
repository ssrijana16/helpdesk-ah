<?php

/* Template Name: Comparison Page Template */

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

        <div class="col-md-3 col-6">

          <div class="input-field">

            <div class="input-label" id="keyword1-label">

              <input class="example" type="text" name="keyword1" id="keyword1" placeholder="Select Agency">

            </div>

            <!--<div id="datafetch">Search results will appear here</div> -->

            <div class="dropdown1 drop-class"> <?php

              $post_query = new WP_Query(['post_type' => 'agency', 'posts_per_page' => -1, 'orderby' => 'title', 'order' => 'ASC']);

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

        <div class="col-md-3 col-6">

          <div class="input-field">

            <div class="input-label" id="keyword2-label">

              <input class="example" type="text" name="keyword2" id="keyword2" placeholder="Select Agency">

            </div>

            <!-- onkeyup ="fetch_2(this.value)" -->

            <!-- <div id="datafetch_2">Search results will appear here</div> -->

            <div class="dropdown2 drop-class"><?php

              $post_query2 = new WP_Query(['post_type' => 'agency', 'posts_per_page' => -1, 'orderby' => 'title', 'order' => 'ASC']);

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

        <div class="col-md-3 col-6">

          <div class="input-field">

            <div class="input-label" id="keyword3-label">

              <input class="example" type="text" name="keyword3" id="keyword3" placeholder="Select Agency">

            </div>

            <!-- onkeyup ="fetch_3(this.value)" -->

            <!-- onkeyup <div id="datafetch_3">Search results will appear here</div> -->

            <div class="dropdown3 drop-class"> <?php

              $post_query3 = new WP_Query(['post_type' => 'agency', 'posts_per_page' => -1, 'orderby' => 'title', 'order' => 'ASC']);

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

            <li class="list-0">Rating*</li>

            <li class="list-1">Line of business</li>

            <li class="list-2">Commission splits</li>

            <li class="list-3">Number of carriers</li>

            <li class="list-4"> Operating states </li>

            <li class="list-5"> Servicing assistance </li>

            <li class="list-6"> Retail requirement </li>

            <li class="list-7"> Technology </li>

            <li class="list-8"> Fees </li>

          </ul>



        </div>

      </div><!-- col -->



      <div class="col-3 agency-value-container-A" id="agency-value-container-A">

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

          </ul>

        </div><!-- common-list-element -->

      </div><!-- col -->



      <div class="col-3 agency-value-container-B" id="agency-value-container-B">

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

          </ul>

        </div><!-- common-list-element -->

      </div><!-- col -->



      <div class="col-3 agency-value-container-C" id="agency-value-container-C">

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

        <h2>Rating</h2>

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

        <h2>Line of business</h2>

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

        <h2>Commission splits</h2>

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

        <h2>Number of carriers</h2>

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

        <h2>Retail requirement</h2>

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

        <h2>Fees</h2>

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

<script type="text/javascript" src="<?= get_template_directory_uri() . '/js/compare-keyup-search.js'; ?>"></script>

<script type="text/javascript">

  //var url = window.location.href;

  //console.log(url);



  // const urlParams = new URLSearchParams(window.location.search);

  // urlParams.set('order', 'date');

  // urlParams.set('order2', 'date2');

  // window.location.search = urlParams;

  // console.log(urlParams);

</script>



<?php

get_footer('agency'); ?>