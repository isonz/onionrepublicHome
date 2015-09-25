<?php
/*
Template Name:产品
*/
?>

<?php  
get_header();
while ( have_posts() ) : the_post(); 
	get_template_part( 'content', 'page' ); 
endwhile; 
?>



<div id="contentbox">
	<!-- ------------------ TasteNirvana 1 --------------------------- -->
	<div id="TasteNirvana1" class="catediv clearfix d1">
		<div class="titleimg_tastenirvana"></div>
		<div class="boxs">
			<div class="product_box clearfix">
				<div class="imgbox"><img src="<?php echo get_template_directory_uri(); ?>/images/pic/juices/3.png" /></div>
				<div class="wordbox">
					<h2>椰子水</h2>
					<ul>
						<li>味道最好的椰子水</li>
						<li>取自泰国优质椰青，100%新鲜原汁制成，汁清如水，晶莹透亮，口感清甜</li>
						<li>无色素、无食用香精、无防腐剂添加， 纯天然更健康</li>
						<li>零脂肪</li>
						<li>高温杀菌</li>
						<li>原产地：泰国</li>
						<li>保质期：24个月</li>
					</ul>
				</div>
			</div>
			
			<div class="product_box clearfix">
				<div class="imgbox"><img src="<?php echo get_template_directory_uri(); ?>/images/pic/juices/4.png" /></div>
				<div class="wordbox">
					<h2>摩卡咖啡饮料</h2>
					<ul>
						<li>古老的咖啡，奢华的享受</li>
						<li>由100%纯阿拉伯咖啡豆烘焙的意式香浓咖啡，完美搭配涩甜的黑巧克力、香浓的牛奶及微量的白砂糖，味道香醇，唇齿留香</li>
						<li>无色素、无食用香精、无防腐剂添加， 纯天然更健康</li>
						<li>低脂肪</li>
						<li>高温杀菌</li>
						<li>原产地：泰国</li>
						<li>保质期：18个月</li>
					</ul>
				</div>
			</div>
			
			<div class="product_box clearfix">
				<div class="imgbox"><img src="<?php echo get_template_directory_uri(); ?>/images/pic/juices/5.png" /></div>
				<div class="wordbox">
					<h2>卡布其诺咖啡饮料</h2>
					<ul>
						<li>醇厚的咖啡，奢华的享受</li>
						<li>由100%纯阿拉伯咖啡豆烘焙的意式香浓咖啡，添加香浓牛奶及微量的白砂糖，口感爆满，味道丰富，丝滑顺口</li>
						<li>低脂肪</li>
						<li>高温杀菌</li>
						<li>原产地：泰国</li>
						<li>保质期：18个月</li>
					</ul>
				</div>
			</div>
			
			<div class="product_box clearfix">
				<div class="imgbox"><img src="<?php echo get_template_directory_uri(); ?>/images/pic/juices/6.png" /></div>
				<div class="wordbox">
					<h2>泰式拿铁咖啡饮料</h2>
					<ul>
						<li>风行泰国曼谷接头的O-Liang咖啡精心煮制而成</li>
						<li>添加香浓牛奶及微量的白砂糖，口感爆满，味道丰富，丝滑顺口</li>
						<li>低脂肪</li>
						<li>冷饮沁人，热饮温心</li>
						<li>高温杀菌</li>
						<li>原产地：泰国</li>
						<li>保质期：24个月</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- ---------------------PhilippineBrand 1------------------------- -->
	<div id="PhilippineBrand1" class="catediv clearfix d2">
		<div class="titleimg_philippinebrand"></div>
		<div class="boxs">
			<div class="product_box clearfix">
				<div class="imgbox"><img src="<?php echo get_template_directory_uri(); ?>/images/pic/juices/7.png" /></div>
				<div class="wordbox">
					<h2>芒果汁饮料</h2>
					<ul>
						<li>菲壹品芒果汁选用优质芒果，经特殊加工工艺，保留芒果原汁的最鲜甜口感，具有浓厚的热带芒果芳香。是味道最好的芒果汁。</li>
						<li>非浓缩果汁还原</li>
						<li>不含脂肪的产品</li>
						<li>无填充二氧化碳，无防腐剂</li>
						<li>高维生素C</li>
						<li>采用巴氏杀菌 (加热杀菌)</li>
					</ul>
				</div>
			</div>
			
			<div class="product_box clearfix">
				<div class="imgbox"><img src="<?php echo get_template_directory_uri(); ?>/images/pic/juices/8.png" /></div>
				<div class="wordbox">
					<h2>番石榴汁饮料</h2>
					<ul>
						<li>原汁原味，非浓缩果汁还原，挥之不去的清香。</li>
						<li>零脂肪</li>
						<li>无添加食用香精</li>
						<li>含维生素C</li>
						<li>高温杀菌</li>
						<li>采用巴氏杀菌</li>
					</ul>
				</div>
			</div>
			
			<div class="product_box clearfix">
				<div class="imgbox"><img src="<?php echo get_template_directory_uri(); ?>/images/pic/juices/9.png" /></div>
				<div class="wordbox">
					<h2>菠萝果粒果汁饮料</h2>
					<ul>
						<li>菠萝果粒汁是由100%天然最优质的菲律宾全菠萝制作，每罐菠萝果粒汁新鲜制成，并非由浓缩果汁还原，口感香滑可口，菠萝果粒爽口，具有浓厚热带菠萝芳香。</li>
						<li>100%天然味道的菠萝果粒汁</li>
						<li>不含脂肪</li>
						<li>高无添加白砂糖，无填充二氧化碳</li>
						<li>无防腐剂</li>
						<li>高维生素C</li>
						<li>采用巴氏杀菌 (加热杀菌)</li>
					</ul>
				</div>
			</div>
			
			<div class="product_box clearfix">
				<div class="imgbox"><img src="<?php echo get_template_directory_uri(); ?>/images/pic/juices/10.png" /></div>
				<div class="wordbox">
					<h2>芒果果粒果汁饮料</h2>
					<ul>
						<li>芒果果粒汁是由天然最优质的菲律宾芒果制作，每罐芒果果粒汁新鲜制成，并非由浓缩果汁还原，口感香滑可口，芒果果粒爽口，具有浓厚热带芒果芳香。</li>
						<li>味道最好的芒果果粒汁</li>
						<li>不含脂肪</li>
						<li>无填充二氧化碳，无防腐剂</li>
						<li>高维生素C</li>
						<li>选用最顶级菲律宾水牛品种的新鲜芒果制成</li>
						<li>采用巴氏杀菌 (加热杀菌)</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- ---------------------PhilippineBrand 2 ------------------------- -->
	<div id="PhilippineBrand2" class="catediv clearfix d3">
		<div class="titleimg_philippinebrand"></div>
		<div class="boxs">
			<div class="product_box clearfix">
				<div class="imgbox"><img src="<?php echo get_template_directory_uri(); ?>/images/pic/juices/11.png" /></div>
				<div class="wordbox">
					<h2>四季混合果汁饮料</h2>
					<ul>
						<li>多种水果果汁精心调配而成，口感多层次</li>
						<li>零脂肪</li>
						<li>无添加食用香精</li>
						<li>采用巴氏杀菌</li>
					</ul>
				</div>
			</div>
			
			<div class="product_box clearfix">
				<div class="imgbox"><img src="<?php echo get_template_directory_uri(); ?>/images/pic/juices/12.png" /></div>
				<div class="wordbox">
					<h2>青柠饮料</h2>
					<ul>
						<li>优质的菲律宾青柠，含量经过细心调配，营造清爽口感</li>
						<li>零脂肪</li>
						<li>无添加食用香精</li>
						<li>采用巴氏杀菌</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	
	
	<div id="nextjiantou"></div>
	<div id="prejiantou"></div>
</div>


<?php get_footer(); ?>