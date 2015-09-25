<?php
/**
 * The template for displaying Category pages
 *
 * Used to display archive-type pages for posts in a category.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); 
$cat= single_cat_title('', false);
$current_cat_id = get_cat_ID($cat);
$cate = get_category( $current_cat_id );

/*
if('blog'==$cate->slug){
	include_once 'blog.php';
	exit;
}
*/
?>

<div class="centerdiv home_bg">
	<div class="center_topimg">
    	<p class="top_img_draw"></p>
    </div>
    <div class="center_div">
    	<div class="p2">
        	<div class="p2-1 clearfix" id="videop_pt">
            	<?php get_sidebar('jobs-sidebar'); ?>            	
                <div class="video_right">
				  <div class="infotitle video_phide" style="margin-bottom:0;">
				     <div class="tlt" style="left:320px;">
				         <div class="tlt1">
				            <div class="tlt2"><?php echo $cate->name?></div>
				         </div>
				     </div>
				     <hr>
				  </div>
				  <?php if('position'==$cate->slug){ ?>
				  <div class="jobs_rbanner"><img src="<?php echo get_template_directory_uri(); ?>/images/job_banner1.jpg" /></div>
				  <div class="jobs_list">
                  	  <dl class="clearfix">
                  	  
                  	  <?php 
                  	  $terms = getCategoryOwnChildren($current_cat_id);
                  	  $cates = array();
                  	  if(!is_array($terms)) $terms = array();
                  	  foreach ($terms as $term){
                  	  	$cates[$term->description] = $term;
                  	  }
                  	  ksort($cates);
                  	  foreach ($cates as $cate){
						$cid = $cate->term_id;
                  	  ?>
                      	<dt><?php echo $cate->name ?></dt>
                        <dd class="clearfix show_hide">
                        	<?php 
                        	query_posts('cat=' . $cid . '&orderby=post_date&order=asc&showposts=100');
                        	while (have_posts()) : the_post();
                        	$pid = get_the_ID();
                        	?>
                        	<span><a href="javascript:;" class="job_1" title="<?php  the_title() ?>" data="<?php echo $pid; ?>"><?php the_title() ?></a></span>
                            <?php endwhile; wp_reset_query(); ?>
                        </dd>
                        <?php } ?>

                      </dl>
                  </div>
                <?php 
				}else{
					$cid = $cate->term_id;
                	query_posts('cat=' . $cid . '&orderby=post_date&order=asc&showposts=1');
                ?>
                <div class="jobs_rbanner"><img src="<?php echo get_template_directory_uri(); ?>/images/job_banner1.jpg" /></div>
                <?php while (have_posts()) : the_post(); ?>
                <div class="welfare">
					<?php get_template_part( 'content', get_post_format() ); ?>
				</div>
				<?php endwhile; wp_reset_query(); ?>
				<?php } ?>
			  </div>
            </div>
        </div>
    </div>
    
</div>

<!--弹出工作信息-->
<div class="pop_job">
	<div class="pop_jobdiv">
    	<h3 class="clearfix"><i id="position"></i> <span id="kongque"></span></h3>
        <div class="jobdiv_info">
        	<span id="job_content">
        	</span>
            <br /><br />
            <i>简历投放邮箱：hr@placentin.com</i>
            <div><input name="" type="submit" value="关闭窗口" class="close_job" /></div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
<script>
$("#menu-item-332").addClass("current-menu-item");
</script>