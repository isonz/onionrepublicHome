<?php 
//$page_url = getCurrentURL();
$page_url = "?page=".PtpVideo::$_category_url;
$op_url =  "$page_url&file=category_op.php&id=";
$pagesize = 30;
$page_tab = 9;   //分页处显示的可点击分页数.
$page = isset($_GET['p']) ? (int)$_GET['p'] : 1;
if($page < 1) $page=1;
$category_table = PtpVideoDB::$category_table;

$keywords = null;
$keyword = isset($_POST['keyword']) ? $_POST['keyword'] : null;
if($keyword) $keywords = "`name` LIKE '%$keyword%'";

$total = PtpVideoDB::allCount($category_table, "*", $keywords);
$pstart = ($page-1) * $pagesize;

?>

<link rel='stylesheet' href="<?php echo PtpVideoFunc::pluginCss('video.css') ?>" type='text/css' media='all' />
<script type="text/javascript" src="<?php echo PtpVideoFunc::pluginJs('video.js')?>"></script>
<table width="100%" cellspacing="0" cellpadding="0" border="0">
    <tbody>
        <tr valign="top">
            <td class="content">
                <div class="clear" id="main_column">
                   <h1 class="mainbox-title float-left">视频分类列表</h1>
                    
                    <!--主体开始-->
                    <div class="mainbox-body">
                        <!--//搜索开始-->
                        <div class="section-border">
                          <form method="post" action="<?php echo $page_url; ?>" name="search_form">
                            <table cellspacing="0" width="95%" cellpadding="0" border="0" class="search-header">
                             <tbody><tr>
                               <td class="search-field nowrap">
                                 <input type="text" value="<?php echo $keyword; ?>" id="keyword" name="keyword">
                                 <input type="submit" value="搜索" class="button" name="search_form">&nbsp;&nbsp;&nbsp;&nbsp;
                                 <?php if($keyword){ ?><a href="<?php echo $page_url; ?>" class="button">清空</a><?php } ?>
                               </td>
                                <td align="right">
                                	<a href="<?php echo $op_url; ?>" class="button">添加视频分类</a>
                                </td>
                               </tr></tbody>
                             </table><br>
                           </form>
                        </div>
                        <!--//搜索结束-->
                        <!--列表开始-->
                        <form id="delete_form" name="delete_form" method="post" action="<?php echo $op_url ?>" class="cm-check-changes">
                            <div id="pagination_contents">
                                <table width="100%" cellspacing="1" cellpadding="0" border="0" style="background:#ddd;" class="table_pd">
                                    <tbody>
                                        <tr height="40">
                                            <th width="5%" align="left" style="background: #fff;">
                                             <input type="checkbox" value="Y" name="check_all" onclick="checkAll(this)"> 全选
                                            </th>
                                            <th width="15%" align="left" style="background: #fff;">排序</th>
                                            <th width="15%" align="left" style="background: #fff;">名称</th>
                                            <th width="15%" align="left" style="background: #fff;">是否显示</th>
                                            <th width="10%" align="left" style="background: #fff;">操作</th>
                                        </tr>
                                        <!--//循环输出管理员列表-->
                                   <?php 
                                   	foreach(PtpVideoDB::pageRows($pstart, $pagesize, $category_table, $keywords) as $row){ 
										$id = $row['id'];
                                   ?>
                                    <tr height="40">
                                            <td class="center" style="background: #fff;">
                                                <input name="delete_id[]" type="checkbox" class="checkbox cm-item" value="<?php echo $id ?>">
                                            </td>
                                            <td style="background: #fff;"><input type="text" class="input-text-short" size="3" value="<?php echo $row['sort'] ?>" name="sort[<?php echo $id ?>]"></td>
                                            <td style="background: #fff;"><?php echo $row['name'] ?></td>
                                            <td style="background: #fff;"><?php if(1==$row['display']){echo '显示';}else{echo '隐藏';} ?></td>
                                       		<td style="background: #fff;" class="nowrap">
	                                            <a href="<?php echo $op_url.$id ?>" class="tool-link">编辑</a>&nbsp;|&nbsp;
	                                            <a href="<?php echo $op_url.$id ?>&action=del" onclick="return confirm('确认删除？');">删除</a>
                                        	</td>
                                        </tr>
                                         <?php } ?>
                                        <!--//结束循环输出列表-->
                                    </tbody>
                                </table>
                               	<br><br>
                                <div class="pagination clear cm-pagination-wraper">
                                    <!--分页列表开始-->
                                    <?php echo pager($page_url, $total, $page, $pagesize, $page_tab); ?>
                                    <!--分页列表结束-->
                                </div>
                            </div>
                            <div class="buttons-container buttons-bg">
                               	<input type="submit" value="删除选中" name="act_delete" class="button" onclick="return confirm('确认删除？');">
								<input type="submit" value="更新排序" name="act_sort" class="button">
							</div>
                        </form>
                        <!--列表结束-->
                    </div>
                    <!--主体结束-->
                </div>
            </td>
        </tr>
    </tbody>
</table>
