<?php
//----------------------------------------------------------------------
/*
 add_action('generate_rewrite_rules', 'downloadByEmail_rewrite_rules' );
function downloadByEmail_rewrite_rules( $wp_rewrite )
{
$new_rules = array(
		//'my-account/?$' => 'index.php?my_custom_page=hello_page',
		'download-by-email-form/?$' => 'index.php?download_by_email=download-by-email-form',
);
$wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
}

add_action('load-themes.php', 'downloadByEmail_flush_rewrite_rules' );
function downloadByEmail_flush_rewrite_rules()
{
global $pagenow, $wp_rewrite;
echo 'asdfsd';
if ( 'themes.php' == $pagenow && isset( $_GET['activated'] ) )
	$wp_rewrite->flush_rules();
}
*/
//---------------------------------------------------------------------
//add_filter( 'the_content',  'display_copyright' );

/* 这个函数在日志正文结尾处添加一段版权信息，并且只在 single 页面才添加
function display_copyright( $content ) {
	if( is_single() )
		$content = $content . "<p style='color:red'>本站点所有文章均为原创，转载请指明出处！</p>";

return $content;
}
*/

/*
 // 注册激活插件时要调用的函数
 register_activation_hook(__FILE__,'display_copyright_install');

 // 注册停用插件时要调用的函数
 register_deactivation_hook( __FILE__, 'display_copyright_remove' );

 function display_copyright_install() {
 //在数据库的 wp_options 表中添加一条记录，第二个参数为默认值
 add_option("display_copyright_text", "<p style='color:red'>本站点所有文章均为原创，转载请注明出处！</p>", '', 'yes');
 }
 function display_copyright_remove() {
 // 删除 wp_options 表中的对应记录
 delete_option('display_copyright_text');
 }
 */

/*
 //判断是否在 WordPress 后台
 if( is_admin() ) {
 // 利用 admin_menu 钩子，添加菜单
 add_action('admin_menu', 'display_copyright_menu');
 }
 function display_copyright_menu() {
 // add_options_page( $page_title, $menu_title, $capability, $menu_slug, $function);
 //页名称，菜单名称，访问级别，菜单别名，点击该菜单时的回调函数（用以显示设置页面）
 add_options_page('版权设置页面', '版权设置菜单', 'administrator','display_copyright', 'display_copyright_html_page');
 }
 */

/*
 function display_copyright_html_page() {
 ?>
 <div>
 <h2>版权信息设置</h2>
 <form method="post" action="options.php">
 <?php //下面这行代码用来保存表单中内容到数据库  ?>
 <?php wp_nonce_field('update-options'); ?>

 <p>
 <textarea
 name="display_copyright_text"
 id="display_copyright_text"
 cols="40"
 rows="6"><?php echo get_option('display_copyright_text'); ?></textarea>
 </p>

 <p>
 <?php // 下面这两个隐藏字段为必须，其中第二个字段的值为要修改的字段名 ?>
 <input type="hidden" name="action" value="update" />
 <input type="hidden" name="page_options" value="display_copyright_text" />

 <input type="submit" value="保存设置" class="button-primary" />
 </p>
 </form>
 </div>
 }
 */


/*
 //这个函数在日志正文结尾处添加一段版权信息，并且只在 single 页添加
 //将原来的静态化文本，改成动态的，之所以要这么改，是因为我们已经将数据存到数据库里面了，这里要从数据库里面取出数据。
 function display_copyright( $content ) {
 if( is_single() )
 	$content = $content . get_option('display_copyright_text');

 return $content;
 }
 */

/**
 * Template Name: download-by-email-post
 */

//---------------------------------------------------------------- 分页
/*
function par_pagenavi($range = 9){
	global $paged, $wp_query;
	if ( !$max_page ) {$max_page = $wp_query->max_num_pages;}
	if($max_page > 1){if(!$paged){$paged = 1;}
	if($paged != 1){echo "<a href='" . get_pagenum_link(1) . "' class='extend' title='跳转到首页'> 返回首页 </a>";}
	previous_posts_link(' 上一页 ');
	if($max_page > $range){
		if($paged < $range){for($i = 1; $i <= ($range + 1); $i++){echo "<a href='" . get_pagenum_link($i) ."'";
		if($i==$paged)echo " class='current'";echo ">$i</a>";}}
		elseif($paged >= ($max_page - ceil(($range/2)))){
			for($i = $max_page - $range; $i <= $max_page; $i++){echo "<a href='" . get_pagenum_link($i) ."'";
			if($i==$paged)echo " class='current'";echo ">$i</a>";}}
			elseif($paged >= $range && $paged < ($max_page - ceil(($range/2)))){
				for($i = ($paged - ceil($range/2)); $i <= ($paged + ceil(($range/2))); $i++){echo "<a href='" . get_pagenum_link($i) ."'";if($i==$paged) echo " class='current'";echo ">$i</a>";}}}
				else{for($i = 1; $i <= $max_page; $i++){echo "<a href='" . get_pagenum_link($i) ."'";
				if($i==$paged)echo " class='current'";echo ">$i</a>";}}
				next_posts_link(' 下一页 ');
				if($paged != $max_page){echo "<a href='" . get_pagenum_link($max_page) . "' class='extend' title='跳转到最后一页'> 最后一页 </a>";}}
}

.page_navi{width:100%;height:36px;line-height:36px;text-align:center;overflow:hidden;padding-top:1em;}
.page_navi a{padding:3px 8px;margin:2px;text-decoration:none;color:#888;border:1px solid #ccf;}
.page_navi a:hover,.page_navi a.current{border:1px solid #356aa0;color:#356aa0;font-weight:bolder;}

添加调用代码至主题index.php、archive.php、category.php、search.php
<div class="page_navi"><?php par_pagenavi(9); ?></div>

*/