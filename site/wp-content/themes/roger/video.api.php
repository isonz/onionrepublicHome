<?php
/*
Template Name:视频API
*/

$ykids = isset($_REQUEST['ykids']) ? $_REQUEST['ykids'] : null;  //$ykids = 'XNjg0MTk5MTk2,XNjg0MTk4ODA4';
if(!$ykids) toJson(1,'Code:001');
$ykids = explode(',', $ykids);

$info = PtpVideoDB::getInfoByYKIds($ykids);
toJson(0,'success',$info);

function toJson($status=1, $msg='', $data=array())
{
	exit(json_encode(array('error'=>$status,'msg'=>$msg, 'data'=>$data)));
}