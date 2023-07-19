<?php

if (get_row_layout() == 'category_display_section') :

  //$title = get_sub_field('topic_title');
  $terms = get_sub_field('category_select_a');

  $terms_b = get_sub_field('category_select_b');

?>
  <section class="block-column-wrapper">
    <div class="container">
      <h2><?php echo the_field('category_list_title'); ?></h2>
      <?php if (isset($terms)) { ?>
        <div class="row">
          <?php foreach ($terms as $term) :
            $imageIcon = get_field('homepage_icon_cat', 'term_' . $term->term_id); ?>
            <div class="col-md-4">
              <div class="item-wrap">
                <?php if (!empty($imageIcon)) : ?>
                  <img class="svg" src="<?php echo esc_url($imageIcon['url']); ?>" alt="<?php echo esc_attr($imageIcon['alt']); ?>" />
                <?php endif; ?>
                <a href="<?php echo get_category_link($term->term_id).'#catContent'; ?>" class="stretched-link"><?php echo esc_html($term->name); ?></a>
              </div><!-- item-wrap -->
            </div>
          <?php endforeach; ?>

        </div><!-- row -->
      <?php } ?>
    </div><!-- container -->
  </section><!-- block-column-wrapper -->
  <section class="icon-text-column-list">
    <div class="container">
      <?php if (isset($terms_b)) { ?>
        <div class="row">
          <?php foreach ($terms_b as $term_b) :
            $imageIconB = get_field('homepage_icon_cat', 'term_' . $term_b->term_id); ?>
            <div class="col-md-3">
              <div class="item-wrap">
                <?php if (!empty($imageIconB)) : ?>
                  <img class="svg" src="<?php echo esc_url($imageIconB['url']); ?>" alt="<?php echo esc_attr($imageIconB['alt']); ?>" />
                <?php endif; ?>
                <a href="<?php echo get_category_link($term_b->term_id).'#catContent'; ?>" class="stretched-link"><?php echo esc_html($term_b->name); ?></a>
              </div><!-- item-wrap -->
            </div><!-- col -->
          <?php endforeach; ?>

        <?php } ?>
        </div><!-- row -->
        <div class="help-contact-wrap">
            <span><?php echo the_field('homepage_contact_text');?></span>
            <?php $page_link = get_field('homepage_contact_link'); ?>
            <?php if( $page_link ): ?>
                <a href="<?php echo esc_url( $page_link['url'] ); ?>" target="<?php echo $page_link['target']; ?>"><?php echo  $page_link['title']; ?><img class="svg"  src="<?php echo get_stylesheet_directory_uri(); ?>/images/white-arrow.png" alt=""></a>
            <?php endif; ?>
            
        </div><!-- help-contact-wrap -->

    </div><!-- container -->
  </section><!-- icon-text-column-list -->

<?php

endif; ?>