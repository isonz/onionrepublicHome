<?php
/*
Template Name: 联系我们
*/
get_header(); ?>

<?php  while ( have_posts() ) : the_post(); ?>
	<?php  get_template_part( 'content', 'page' ); ?>
<?php endwhile; // end of the loop. ?>

<?php
$post = isset($_POST['massages']) ? htmlspecialchars(nl2br(trim($_POST['massages']))) : null;
if($post){
	$data = array('content'=> $post);
	$rs = DBExt::insertByArray("rehome_contect_us", $data);
	if($rs) echo '<script>showRs();</script>';
}
?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>

