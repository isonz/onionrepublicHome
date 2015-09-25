<div class="company_l">
 <ul>
 	<?php 
    $post_id = get_the_ID();
    $current_cat_id = the_category_ID(false);
	query_posts('cat=' . $current_cat_id . '&orderby=post_date&order=asc&showposts=10');
	while (have_posts()) : the_post();
	$pid = get_the_ID();
	?>
    <li <?php if($pid==$post_id){echo 'class="hover"';}?>><a href="<?php the_permalink() ?>"><?php the_title() ?></a></li>
    <?php endwhile; wp_reset_query(); ?>
    <li><a href="/category/job/placentin-people/">人本文化</a></li>
    <li><a href="#" style="line-height:1px;"></a></li>
 </ul>
 <?php //$reserve_tel = get_page(65); echo $reserve_tel->post_content; ?>
</div>
