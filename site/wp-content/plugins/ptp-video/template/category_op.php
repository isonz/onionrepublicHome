<?php 
$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;

$data = array(
	'id' => '',
	'name' => '',
	'sort'  => '',
	'display' => '',
);
$title = "添加";

if("save"==$action){
	$data = array(
		'display'	=> $_POST['display'],
		'sort'	=> $_POST['sort'],
		'name'	=> $_POST['name'],
	);
	PtpVideoDB::saveCategory($data, $id);  //insert or update
}else if(("del"==$action && $id) || isset($_POST['act_delete'])){
	//delete
	if($id){
		PtpVideoDB::delCategory($id);
	}else{
		$delete_id = $_POST['delete_id'];
		foreach ($delete_id as $id){
			PtpVideoDB::delCategory($id);
		}
	}
	header("Location: ?page=".PtpVideo::$_category_url);
	exit;
}else if(!$action && $id){
	//select
	//URL : /wp-admin/admin.php?page=ptp-video-category&file=category_op.php&id=2
	$title = "更新";
	$data = PtpVideoDB::getCategoryRow($id);
}else if(isset($_POST['act_sort'])){
	$sorts = $_POST['sort'];
	foreach ($sorts as $id => $sort){
		$data = array('sort' => $sort);
		PtpVideoDB::saveCategory($data, $id);
	}
	header("Location: ?page=".PtpVideo::$_category_url);
	exit;
}

?>

<table width="100%" cellspacing="0" cellpadding="0" border="0">
    <tbody>
        <tr valign="top">
            <td class="content">
                <div class="clear" id="main_column">
                    
                    <div class="clear mainbox-title-container">
                        <h1 class="mainbox-title float-left"><?php echo $title;?>视频分类信息</h1>
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
                                            <span></span>
                                        </div>
                                        <br>
                                        <div class="form-field">
                                            <label class="cm-required">排序: </label>
                                            <input type="text" size="15" value="<?php echo $data["sort"]; ?>" name="sort" id="sort">
                                            <span></span>
                                        </div>
                                        <br>
                                        <div class="form-field">
                                            <label class="cm-required">名称: </label>
                                            <input type="text" size="30" value="<?php echo $data["name"]; ?>" name="name" id="name">
                                            <span></span>
                                        </div>
                                    </fieldset>
                                </div>
                                <br>
                                <div class="buttons-container buttons-bg cm-toggle-button">
                                    <input class="button button-primary" type="submit" value="保存" name="save_form">&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="?page=<?php echo PtpVideo::$_category_url; ?>" class="button">返回</a>
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

