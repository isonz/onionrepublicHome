			<div class="clear"></div>
		</div><!-- #main -->
	</div><!-- #main-wrap -->

	<div id="footer-wrap">
		<div id="footer" class="clear-fix">
			<?php get_sidebar('footer'); ?>
			<div id="copyright-wrap">
				<div id="copyright">

					<div class="widget-area">
						<?php
							$args = array(
								'before_title' => '<h2 class="widget-title">',
								'after_title'  => '</h2>'
							);
							the_widget('Padd_Theme_Widget_SocialNetwork', null, $args);
						?>
					</div>

					<div id="credits">
						<?php padd_theme_credits(); ?>
					</div>

					<div class="clear"></div>
				</div>
			</div>
		</div><!-- #footer -->
	</div><!-- #footer-wrap -->

</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>