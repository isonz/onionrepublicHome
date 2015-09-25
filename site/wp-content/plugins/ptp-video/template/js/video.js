var $ = jQuery.noConflict();
function checkAll(obj) {
	var old_status = $(obj).attr('checked');
	if("undefined"==typeof(old_status)){
		$('input[type=checkbox]').removeAttr('checked');
	}else{
		$('input[type=checkbox]').attr('checked', old_status);
	}
}

http://192.168.77.99:8070/wp-admin/admin-ajax.php
//---------- upload media
jQuery(document).ready(function() {
	 var formfield;
    /* user clicks button on custom field, runs below code that opens new window */
    jQuery('#insert-media-button').click(function() {
        formfield = jQuery(this).next('input'); //The input field that will hold the uploaded file url
        tb_show('','media-upload.php?TB_iframe=true');
        return false;
    });
    //Please keep these line to use this code snipet in your project
    //adding my custom function with Thick box close function tb_close() .
    window.old_tb_remove = window.tb_remove;
    window.tb_remove = function() {
        window.old_tb_remove(); // calls the tb_remove() of the Thickbox plugin
        formfield=null;
    };
 
    // user inserts file into post. only run custom if user started process using the above process
    // window.send_to_editor(html) is how wp would normally handle the received data
    window.original_send_to_editor = window.send_to_editor;
    window.send_to_editor = function(html){
        if (formfield) {
            fileurl = jQuery('img',html).attr('src');
            jQuery(formfield).val(fileurl);
            $("#thum_pic").attr("src",fileurl);		//ison.zhang
            tb_remove();
        } else {
            window.original_send_to_editor(html);
        }
    };

});