<?php 
$post_id = get_the_ID();
$post = get_post($post_id);
$post_content = $post->post_content;
echo $post_content;

?>
