<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package resources
 */
$display_title = (get_field('display_heading', get_the_ID())) ? get_field('display_heading', get_the_ID()) : get_the_title(get_the_ID());

?>

<div class="top-content">
	<?php if (is_singular()) : ?>
		<h1><?php echo $display_title; ?></h1>
		<?php echo the_content(); ?>

	<?php else :
		the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
	endif; ?>
</div>
<div class="inner-content-wrap">
	<?php
	//Including Related Flexible Contents	
	if (have_rows('additional_fields_for_article_post')) :
		while (have_rows('additional_fields_for_article_post')) : the_row();
			get_template_part('template-parts/acf-contents/' . get_row_layout());
		endwhile;
	endif;
	?>
</div>

<?php get_template_part('template-parts/content', 'related-posts'); ?>
<?php
$currentPageId = get_the_ID();
$class = '';
if (isset($_COOKIE['likeClass' . "&" . $currentPageId])) {
	$likestr =  $_COOKIE['likeClass' . "&" . $currentPageId];
	$array = explode("&", $likestr);
	if ($array[0] == $currentPageId) {
		$class = $array[1];
	} else {
		$class = '';
	}
}
$disClass = '';
if (isset($_COOKIE['dislikeClass' . "&" . $currentPageId])) {
	$dislikestr = $_COOKIE['dislikeClass' . "&" . $currentPageId];
	$array = explode("&", $dislikestr);
	if ($array[0] == $currentPageId) {
		$disClass = $array[1];
	} else {
		$disClass = '';
	}
}
?>
<div class="like-unlike-text top-border">
	<h3>Was this article helpful?</h3>
	<ul>
		<li class="like <?php echo $class; ?>" data-id="<?php echo get_the_ID(); ?>"><img class=" svg" src="<?php echo get_stylesheet_directory_uri(); ?>/images/dislike.svg" alt=""></li>
		<li class="dislike <?php echo $disClass; ?>" data-id="<?php echo get_the_ID(); ?>"><img class=" svg" src="<?php echo get_stylesheet_directory_uri(); ?>/images/dislike.svg" alt=""></li>
	</ul>
</div><!-- like-unlike-text -->