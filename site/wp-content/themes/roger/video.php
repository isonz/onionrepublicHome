<?php
/*
Template Name:视频
*/

//header("Location: /video/culture/");

get_header();
$p = 'pg';
$vid = isset($_GET['vid']) ? (int)$_GET['vid'] : 0;
$page_url = "?vid=$vid";
$pagesize = 9;
$page_tab = 9;   //分页处显示的可点击分页数.
$page = isset($_GET[$p]) ? (int)$_GET[$p] : 1;
if($page < 1) $page=1;
$video_table = PtpVideoDB::$video_table;

$where = "display=1 AND category_id!=2";
if($vid) $where .= " AND category_id=$vid";
$keyword = isset($_POST['keyword']) ? $_POST['keyword'] : null;
if($keyword) $where .= " AND title LIKE '%$keyword%'";

$total = PtpVideoDB::allCount($video_table, "*", $where);
$pstart = ($page-1) * $pagesize;
?>

<div class="centerdiv home_bg">
	<div class="center_topimg">
    	<p class="top_img_draw"></p>
    </div>
    <div class="center_div">
    	<div class="p2">
        	<div class="p2-1 clearfix" id="videop_pt">
            	<?php get_sidebar('video-sidebar'); ?>
                <div class="video_right">
				  <div class="infotitle video_phide">
				     <div class="tlt" style="left:320px;">
				         <div class="tlt1">
				            <div class="tlt2"><?php the_title() ?></div>
				         </div>
				     </div>
				     <hr>
				  </div>
				  <ul class="clearfix" id="phone_v">
				  	<?php
				  	$i=0;
				  	foreach(PtpVideoDB::pageRows($pstart, $pagesize, $video_table, $where) as $video){
				  	?>
				      <li>
				        <div class="video_bg">
                        	<a class="video_play" href="javascript:;" data="<?php echo $video['href'] ?>"></a>
				        	<a href="javascript:;" data="<?php echo $video['href'] ?>">
				        		<img src="<?php echo $video['pic']; ?>" width="290" height="156">
				        	</a>
				        </div>
				         <a href="javascript:;" class="vt" data="<?php echo $video['href'] ?>"><?php echo $video['title']; ?></a>
				       </li>
				    <?php 
				    	$i++;
				    	if(0==$i%3) echo '<hr>';
					} 
					?>      
				   </ul>
				   	
                    <div class="pagination clear cm-pagination-wraper">
                     <?php echo pager($page_url, $total, $page, $pagesize, $page_tab, $p); ?>
                    </div>        
				</div>
            </div>
        </div>
    </div>
    
</div>

<!--视频弹出层-->
	<div class="uploaddiv">
    	<div class="Topleft">
        	<a href="javascript:;" class="close" title="关闭"></a>
        	<div class="Topright">
            	<div class="Topcenter"></div>
            </div>
        </div>
        <div class="CenterLeft">
        	<div class="CenterRight">
       	    	<div id="centerVideo"></div>
            </div>
        </div>
        <div class="FootLeft">
        	<div class="FootRight">
            	<div class="FootCenter"></div>
            </div>
        </div>
    </div>
<!--视频弹出层 end-->
<script type="text/javascript" src="http://player.youku.com/jsapi"></script>
<?php get_footer(); ?>