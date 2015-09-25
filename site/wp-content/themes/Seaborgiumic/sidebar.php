
<div id="secondary" class="sidebar">
	<?php
		$args = array(
			'before_title' => '<h2 class="widget-title">',
			'after_title'  => '</h2>'
		);
		if (!dynamic_sidebar('sidebar')) {
		
			the_widget('Padd_Theme_Widget_Recent_Posts', array('title' => __('Latest News', PADD_THEME_SLUG)), $args);
			
			the_widget('Padd_Theme_Widget_Tweets', null, $args);
			
			the_widget('WP_Widget_Archives'            , null                                                          , $args);
		}
	?>
</div>