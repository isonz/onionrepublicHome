<?php 
$vid = isset($_GET['vid']) ? (int)$_GET['vid'] : 0;
$where = "display=1";
$videoCat = PtpVideoDB::getCategoryRows($where);
?>
		
<div class="company_l">
  <ul>
  <?php   
  foreach ($videoCat as $cat){
	if(2==$cat['id']) continue;
  ?>
   <li id="video_cate_<?php echo $cat['id'] ?>"<?php if($vid == $cat['id']) echo ' class="hover"';?>>
   	<a href="?vid=<?php echo $cat['id'] ?>"><?php echo $cat['name'] ?></a>
   </li>
   <?php } ?>
   <li><a href="#" style="line-height:1px;"></a></li>          
  </ul>
</div>
 <?php //$reserve_tel = get_page(65); echo $reserve_tel->post_content; ?>
 
