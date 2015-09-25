<?php 
$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;

$return_url = "?page=ptp-video/ptp-video.php";
$data = array(
	'id' => '',
	'title' => '',
	'href' => '',
	'pic' => '',
	'category_id' => '',
	'sort'  => '',
	'display' => '',
);
$title = "添加";

if("save"==$action){
	$data = array(
		'display'	=> $_POST['display'],
		'sort'	=> $_POST['sort'],
		'title'	=> $_POST['title'],
		'href'	=> $_POST['href'],
		'pic'	=> $_POST['pic'],
		'category_id'	=> $_POST['category_id'],
	);
	PtpVideoDB::saveVideo($data, $id);  //insert or update
}else if(("del"==$action && $id) || isset($_POST['act_delete'])){
	//delete
	if($id){
		PtpVideoDB::delVideo($id);
	}else{
		$delete_id = $_POST['delete_id'];
		foreach ($delete_id as $id){
			PtpVideoDB::delVideo($id);
		}
	}
	header("Location: $return_url");
	exit;
}else if(!$action && $id){
	//select
	//URL : /wp-admin/admin.php?page=ptp-video-category&file=category_op.php&id=2
	$title = "更新";
	$data = PtpVideoDB::getVideoRow($id);
}else if(isset($_POST['act_sort'])){
	$sorts = $_POST['sort'];
	foreach ($sorts as $id => $sort){
		$data = array('sort' => $sort);
		PtpVideoDB::saveVideo($data, $id);
	}
	header("Location: $return_url");
	exit;
}

?>
<table width="100%" cellspacing="0" cellpadding="0" border="0">
    <tbody>
        <tr valign="top">
            <td class="content">
                <div class="clear" id="main_column">
                    
                    <div class="clear mainbox-title-container">
                        <h1 class="mainbox-title float-left"><?php echo $title;?>视频</h1>
                    </div>
                    <br>
                    <!--主体开始-->
                    <div class="mainbox-body">
                        <div class="cm-tabs-content">
                            <form class="cm-form-highlight cm-check-changes" method="post" action="" name="add_form" enctype="multipart/form-data">
                                <div id="content_general" style="display: block;">
                                    <fieldset>
                                    	<input name="id" type="hidden" value="<?php echo $id ?>">
                                    	<input name="action" type="hidden" value="save">
                                    	<div class="form-fields">
                                            <label class="cm-required">是否显示: </label>
                                            	显示&nbsp;&nbsp;
                                            	<input type="radio" name="display" value="1" <?php if(1==$data['display']) echo 'checked="checked"'; ?>>
                                            	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            	隐藏&nbsp;&nbsp;
                                            	<input type="radio" name="display" value="0" <?php if(0==$data['display']) echo 'checked="checked"'; ?>>
                                        </div>
                                        <br>
                                        <div class="form-field">
                                            <label class="cm-required">排序: </label>
                                            <input type="text" size="15" value="<?php echo $data["sort"]; ?>" name="sort" id="sort">
                                        </div>
                                        <br>
                                        <div class="form-field">
                                            <label class="cm-required">标题: </label>
                                            <input type="text" size="30" value="<?php echo $data["title"]; ?>" name="title" id="title">
                                        </div>
                                         <br>
                                        <div class="form-field">
                                            <label class="cm-required">地址: </label>
                                            <input type="text" size="30" value="<?php echo $data["href"]; ?>" name="href" id="href">
                                        </div>
                                         <br>
                                        <div class="form-field">
                                           <label class="cm-required">分类: </label>
                                           <select name="category_id">
                                            <option value="0">---请选分类---</option>
                                            <?php 
                                            	$rows = PtpVideoDB::getCategoryRows(1);
                                            	$cate_id = $data["category_id"];
                                            	foreach ($rows as $row){
													$sel='';
													if($cate_id == $row['id']) $sel=' selected="selected"';
                                            ?>
                                            <option value="<?php echo $row['id'] ?>"<?php echo $sel ?>><?php echo $row['name'] ?></option>
                                            <?php } ?>
                                           </select>
                                        </div>
                                        <br>
                                        <div class="form-field">
                                            <label class="cm-required">封面: </label>&nbsp;&nbsp;
                                            <a href="#" id="insert-media-button" class="button insert-media add_media" data-editor="content" title="添加媒体"><span class="wp-media-buttons-icon"></span> 添加媒体</a>
                                            <input type="text" size="30" value="<?php echo $data["pic"]; ?>" name="pic" id="pic" style="width:85%">
                                        </div>
                                        <br>
                                        <img alt="" src="<?php echo $data["pic"]; ?>" border="0" id="thum_pic">
                                    </fieldset>
                                </div>
                                <br><br>
                                <div class="buttons-container buttons-bg cm-toggle-button">
                                    <input class="button button-primary" type="submit" value="保存" name="save_form">&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="<?php echo $return_url; ?>" class="button">返回</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--主体结束-->
                </div>
            </td>
        </tr>
    </tbody>
</table>

