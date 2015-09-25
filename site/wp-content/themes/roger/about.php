<?php
/*
Template Name: 关于
*/
?>

<?php 
get_header();

query_posts('page_id=4');
while ( have_posts() ) : the_post(); 
	get_template_part( 'content', 'page' );  
endwhile;

get_footer(); 
?>