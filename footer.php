<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package resources
 */
$social_icons_title = get_field('social_icons_title', 'options');
?>
<footer id="colophon" class="site-footer">

	<div class="container">
		<div class="foot-logo">
			<?php
			$site_white_logo = get_field('site_white_logo', 'options');
			if ($site_white_logo) { ?>
				<a href="<?php echo esc_url(home_url('/')); ?>helpdesk" class="custom-logo-link" rel="home" aria-current="page"><img class="svg" src="<?php echo esc_url($site_white_logo['url']); ?>" alt="<?php echo esc_attr($site_white_logo['alt']); ?>" /></a>
			<?php } ?>
		</div><!-- footer-logo -->
		<div class="footer-content">
			<div class="footer-col footer-col-1">
				<?php $locations = get_nav_menu_locations(); ?>
				<?php if (has_nav_menu('footer_1')) {
					$menu2 = wp_get_nav_menu_object($locations['footer_1']); ?>
					<div class="footer-links">
						<h4><?php echo $menu2->name; ?><span class="expand-toggle"></span></h4>
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'footer_1',
								'menu_id'        => 'footer-menu-1',
								'fallback_cb'    => false
							)
						);
						?>
					</div>
				<?php } ?>
			</div> <!-- .footer-col-1 -->
			<div class="footer-col footer-col-2">
				<?php
				if (has_nav_menu('footer_2')) {
					$menu3 = wp_get_nav_menu_object($locations['footer_2']); ?>
					<div class="footer-links">
						<h4><?php echo $menu3->name; ?><span class="expand-toggle"></span></h4>
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'footer_2',
								'menu_id'        => 'footer-menu-2',
								'fallback_cb'    => false
							)
						);
						?>
					</div>
				<?php } ?>
			</div> <!-- .footer-col-2 -->
			<div class="footer-col footer-col-3">
				<?php
				if (has_nav_menu('footer_3')) {
					$menu4 = wp_get_nav_menu_object($locations['footer_3']); ?>
					<div class=" footer-links">
						<h4><?php echo $menu4->name; ?><span class="expand-toggle"></span></h4>
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'footer_3',
								'menu_id'        => 'footer-menu-3',
								'fallback_cb'    => false
							)
						);
						?>
					</div>
				<?php } ?>
			</div> <!-- .footer-col-3 -->
			<div class="footer-col footer-col-4">
				<?php
				if (has_nav_menu('footer_4')) {
					$menu5 = wp_get_nav_menu_object($locations['footer_4']); ?>
					<div class="footer-links">
						<h4><?php echo $menu5->name; ?><span class="expand-toggle"></span></h4>
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'footer_4',
								'menu_id'        => 'footer-menu-4',
								'fallback_cb'    => false
							)
						);
						?>
					</div>
				<?php } ?>
			</div> <!-- .footer-col-4 -->
			<div class="footer-col footer-col-5">
				<?php
				if (has_nav_menu('footer_5')) {
					$menu5 = wp_get_nav_menu_object($locations['footer_5']); ?>
					<div class="footer-links">
						<h4><?php echo $menu5->name; ?><span class="expand-toggle"></span></h4>
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'footer_5',
								'menu_id'        => 'footer-menu-5',
								'fallback_cb'    => false
							)
						);
						?>
					</div>
				<?php } ?>
				<div class="footer-links">
					<div class="foot-social-media">						
						<?php if ($social_icons_title) { ?>
							<h4><?php echo $social_icons_title; ?></h4>
						<?php } ?>
						<?php if (have_rows('social_icons_content', 'options')) : ?>
							<ul>
								<?php while (have_rows('social_icons_content', 'options')) :
									the_row();
									$social_icons_link = get_sub_field('social_icons_link');
									if ($social_icons_link) {
										$social_icon_image = get_sub_field('social_icon_image');
								?>
										<li> <a target="_blank" href="<?php echo $social_icons_link; ?>"><img class="svg" src="<?php echo $social_icon_image['url']; ?>" alt="<?php echo $social_icon_image['alt']; ?>"></a>
										</li>
								<?php }
								endwhile; ?>
							</ul>
						<?php endif; ?>
					</div><!-- foot-social-media -->
				</div> <!-- footer-col-5 -->

			</div><!-- footer-content -->
		</div><!-- container -->

		<div class="footer-copyright">
			<div class="container">
				<div class="foot-content">				
					<span><?php echo "©" . date('Y') . " Agency Height"; ?></span>
					<?php
					$privacy_policy_link = get_field('privacy_policy_link', 'options');
					if ($privacy_policy_link) :
						$privacy_policy_link_url = $privacy_policy_link['url'];
						$privacy_policy_link_title = $privacy_policy_link['title'];
						$privacy_policy_link_target = $privacy_policy_link['target'] ? $privacy_policy_link['target'] : '_self';
					?>
						<span>
							<a href="<?php echo esc_url($privacy_policy_link_url); ?>" target="<?php echo esc_attr($privacy_policy_link_target); ?>"><?php echo esc_html($privacy_policy_link_title); ?></a>
						</span>
					<?php endif; ?>
					<?php
					$terms_and_conditions_link = get_field('terms_and_conditions_link', 'options');
					if ($terms_and_conditions_link) :
						$terms_and_conditions_link_url = $terms_and_conditions_link['url'];
						$terms_and_conditions_link_title = $terms_and_conditions_link['title'];
						$terms_and_conditions_link_target = $terms_and_conditions_link['target'] ? $terms_and_conditions_link['target'] : '_self';
					?>
						<span>
							<a href="<?php echo esc_url($terms_and_conditions_link_url); ?>" target="<?php echo esc_attr($terms_and_conditions_link_target); ?>"><?php echo esc_html($terms_and_conditions_link_title); ?></a>
						</span>
					<?php endif; ?>
				</div><!-- foot-content -->
			</div>
		</div><!-- .footer-copyright -->

</footer>


</div><!-- #page -->

<?php wp_footer(); ?>
<?php

	$before_the_body_closing_tag = get_field('before_the_body_closing_tag','options');

    $useragent = $_SERVER['HTTP_USER_AGENT'];

    if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))){
        //For Mobile Devices
        if($before_the_body_closing_tag['before_the_body_closing_tag_on_mobile']){
        
            echo str_replace(['<p>', '</p>', '<br>', '<br/>'], '',  $before_the_body_closing_tag['before_the_body_closing_tag_on_mobile']);
        }
    }else{
        //For Desktop Devices
        if($before_the_body_closing_tag['before_the_body_closing_tag_on_desktop']){

            echo str_replace(['<p>', '</p>', '<br>', '<br/>'], '',  $before_the_body_closing_tag['before_the_body_closing_tag_on_desktop']);
        
        } 
    }
?>
</body>
</html>
