
<div class="company_l">
	<ul id="leftMenu">
		<?php 
		  	$cat= single_cat_title('', false);
			$current_cat_id = get_cat_ID($cat);
		    $terms = getCategoryOwnChildren(3);
		    $cates = array();
		    if(!is_array($terms)) $terms = array();
		    foreach ($terms as $term){
				$cates[$term->description] = $term;
		    }
		    ksort($cates);
		    foreach ($cates as $cate){
				$pid = $cate->term_id;
		?>
		<li <?php if($pid==$current_cat_id){echo 'class="hover"';}?>>
			<a href="/category/job/<?php echo $cate->slug ?>/"><?php echo $cate->cat_name; ?></a>
		</li>
    	<?php } ?>
    	<li><a href="#" style="line-height:1px;"></a></li>
    </ul>
   <?php //$reserve_tel = get_page(65); echo $reserve_tel->post_content; ?>
</div>

 
