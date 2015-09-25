<?php
/*
Template Name: 首页
*/

get_header(); ?>

<?php 
query_posts('page_id=2');
while ( have_posts() ) : the_post(); 

?>
<?php get_template_part( 'content', 'page' ); ?>
<?php endwhile;  ?>

<?php get_footer(); ?>