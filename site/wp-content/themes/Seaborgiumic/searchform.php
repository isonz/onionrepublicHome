<?php
/**
 * The Search Form
 *
 * Optional file that allows displaying a custom search form
 * when the get_search_form() template tag is used.
 *
 */
?>
<form method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>">
	<label for="s"><?php echo __('Search', PADD_THEME_SLUG); ?> </label>
	<input type="text" value="" name="s" id="s" />
	<button type="submit"><span><?php echo __('Go', PADD_THEME_SLUG); ?></span></button>
</form>