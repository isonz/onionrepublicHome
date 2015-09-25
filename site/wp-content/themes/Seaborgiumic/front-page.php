<?php get_header(); ?>

<div id="primary">
	<div id="content" role="main">

	<?php
		$cats = Padd_Option::get('featured_categories', array('1', '2', '3', '4'));
		$i = 1;
		foreach ($cats as $cat) {
			padd_featured_categories_items($cat,$i);
			if (3 == $i) :
				$i = 0;
				?>
				<div class="clear"></div>
		<?php
			endif;
			$i++;
		}
	?>
		<div class="clear"></div>

	</div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>