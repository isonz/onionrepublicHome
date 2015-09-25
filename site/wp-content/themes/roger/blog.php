<?php
/*
Template Name:博客
*/

global $post;
if('blog'==$post->post_name){
 header("Location: /blog/time/"); exit;
}
get_header();

$post_name = $post->post_name;
?>

<div class="centerdiv home_bg">
 <div class="center_topimg">
     <p class="top_img_draw"></p>
    </div>
    <div class="center_div">
     <div class="p2">
         <div class="blog_bg clearfix">
                <div class="blogdiv">
                    <div class="blogdiv_menu">
                     <ul class="clearfix" id="blogMenu">
                     <?php 
      				$pst = get_post( $post->post_parent);
                    $children = get_posts('post_parent='.$pst->ID.'&post_type=page&post_status=publish&orderby=menu_order&order=asc');
     				foreach ($children as $child){
                  ?>
                  <li>
                   <a <?php if($post_name==$child->post_name){?>class="hover"<?php }?> href="/blog/<?php echo $child->post_name ?>" title="<?php echo $child->post_title ?>">
                   <?php echo $child->post_title ?><br />
                   <em><?php echo strtoupper($child->post_name) ?></em>
                   </a>
                  </li>
                        <?php } ?>
                        </ul>
                    </div>
                    <div class="timediv">
                    <?php echo $post->post_content; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

<?php get_footer(); ?>
<script>
$("#menu-item-246").addClass("current-menu-item");
</script>