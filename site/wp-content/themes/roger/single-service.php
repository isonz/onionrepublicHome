<?php get_header(); ?>

<div class="centerdiv home_bg">

	<div class="center_topimg">
    	<p class="top_img_draw"></p>
    </div>
    
    <div class="center_div">
    	<div class="p2">
        	<div class="p2-1 clearfix" id="about_pt">
            	<?php get_sidebar('about-sidebar'); ?>
            	
                <div class="company_info">
                	<div class="infotitle">
                    	<div class="tlt">
                        	<div class="tlt1">
                            	<div class="tlt2"><?php the_title() ?></div>
                            </div>
                        </div>
                    	<hr>
                    </div>
              		<!-- main -->
              		<?php get_template_part( 'content', get_post_format() ); ?>
              		<!-- end main -->
                </div>
            </div>
            
            
        </div>
    </div>
    
</div>

<?php get_footer(); ?>
<script>
$("#menu-item-30").addClass("current-menu-item");
</script>
