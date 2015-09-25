<?php
/*
Template Name:产品
*/
?>

<?php  
get_header();
/*
while ( have_posts() ) : the_post(); 
	get_template_part( 'content', 'page' ); 
endwhile;
*/
$move = isset($_GET['move']) ? (int)$_GET['move'] : 0; 
echo '<script>var MOVEY = '.($move*1090).';</script>';
?>



<div id="contentbox">
  <div class="moveupbox clearfix">
	<!-- ------------------ TasteNirvana 1 --------------------------- -->
	<div id="TasteNirvana1" class="catediv clearfix d1">
		<div class="titleimg_tastenirvana"></div>
		<div class="boxs clearfix">
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
		<div class="boxs clearfix">
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
		<div class="boxs clearfix">
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
	<!-- ---------------------MilkPowder 1 ------------------------- -->
	<div id="MilkPowder1" class="catediv clearfix d4">
		<div class="titleimg_milkpowder"></div>
		<div class="boxs clearfix">
			<div class="milk_box clearfix">
				<div class="imgbox"><img src="<?php echo get_template_directory_uri(); ?>/images/pic/baby/2.png" /></div>
				<div class="wordbox">
					<h2></h2>
					<table width="220" border="0" cellpadding="0" cellspacing="0">
					  <tr>
					    <td valign="top">Brand:</td>
					    <td><b>Cow Gate</b><br><span>(first infant milk)</span></td>
					  </tr>
					  <tr>
					    <td>Catergory:</td>
					    <td><b>1</b> <span>(from newborn)</span></td>
					  </tr>
					  <tr>
					    <td>Stocks:</td>
					    <td><b>enough</b></td>
					  </tr>
					  <tr>
					    <td>country:</td>
					    <td><b>UK</b></td>
					  </tr>
					</table>
				</div>
			</div>
			
			<div class="milk_box clearfix">
				<div class="imgbox"><img src="<?php echo get_template_directory_uri(); ?>/images/pic/baby/3.png" /></div>
				<div class="wordbox">
					<h2></h2>
					<table width="220" border="0" cellpadding="0" cellspacing="0">
					  <tr>
					    <td valign="top">Brand:</td>
					    <td><b>Cow Gate</b><br><span>(follow-on milk)</span></td>
					  </tr>
					  <tr>
					    <td>Catergory:</td>
					    <td><b>2</b> <span>(from six months)</span></td>
					  </tr>
					  <tr>
					    <td>Stocks:</td>
					    <td><b>enough</b></td>
					  </tr>
					  <tr>
					    <td>country:</td>
					    <td><b>UK</b></td>
					  </tr>
					</table>
				</div>
			</div>
			
			<div class="milk_box clearfix">
				<div class="imgbox"><img src="<?php echo get_template_directory_uri(); ?>/images/pic/baby/4.png" /></div>
				<div class="wordbox">
					<h2></h2>
					<table width="220" border="0" cellpadding="0" cellspacing="0">
					  <tr>
					    <td valign="top">Brand:</td>
					    <td><b>Cow Gate</b><br><span>(growing up milk)</span></td>
					  </tr>
					  <tr>
					    <td>Catergory:</td>
					    <td><b>3</b> <span>(1-2 years)</span></td>
					  </tr>
					  <tr>
					    <td>Stocks:</td>
					    <td><b>enough</b></td>
					  </tr>
					  <tr>
					    <td>country:</td>
					    <td><b>UK</b></td>
					  </tr>
					</table>
				</div>
			</div>
			
			<div class="milk_box clearfix">
				<div class="imgbox"><img src="<?php echo get_template_directory_uri(); ?>/images/pic/baby/5.png" /></div>
				<div class="wordbox">
					<h2></h2>
					<table width="220" border="0" cellpadding="0" cellspacing="0">
					  <tr>
					    <td valign="top">Brand:</td>
					    <td><b>Cow Gate</b><br><span>(first infant milk)</span></td>
					  </tr>
					  <tr>
					    <td>Catergory:</td>
					    <td><b>4</b> <span>(2-3 years)</span></td>
					  </tr>
					  <tr>
					    <td>Stocks:</td>
					    <td><b>enough</b></td>
					  </tr>
					  <tr>
					    <td>country:</td>
					    <td><b>UK</b></td>
					  </tr>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- ---------------------RedWines 1 ------------------------- -->
	<div id="RedWines1" class="catediv clearfix d5">
		<div class="titleimg_redwines"></div>
		<div class="contentsright clearfix">
			<h1>伯 爵 领  AOC BORDEAUX SUPERIEUR</h1>
			<div class="word">
				<p>
				源地：海报60M，经度0 10 60，纬度44 48 10<br>
				血统：BORDEAUX SUPERIEUR 优级波尔多<br>
				诞生土壤：石灰石，砾石<br>
				涵盖范围：12公顷<br>
				先天树龄：45年藤<br>
				诞生时间：2009<br>
				血脉来源：80%美乐，10%赤霞珠，10%品丽珠<br>
				觉醒时间：18个月全新橡木桶<br>
				</p>
				<p>天命技能:<br>
				手工采摘，人工进行第二次采选，橡木桶内进行乳酸发酵，并且纯化至少12个月。<br>作为一款高端的优级波尔多，此款产品的全部工艺均和特级圣爱美容一致，酿制酒的葡萄来自于单一园地，坐落于多可多?涅河边的突出平地上。</p>
				<p>毫无疑问，美乐的风格在这款酒中占有支配地位，嗅觉表現出果香的甜美诱人，亦霞珠与品丽珠恰到好处点缀，使得这款酒又增加了几份性感。在嘴中，骨架丰滿是这款酒的最大特点。层次感非常分明，单宁柔顺的同时还能保留住质感，实属难得。</p>
				<p>*可以搭配各种紅肉，如要单獨品尝，建议醒酒，避光储存。</p>
			</div>
			<div class="pic">
				<img src="<?php echo get_template_directory_uri(); ?>/images/pic/wines/2.png" />
				<img src="<?php echo get_template_directory_uri(); ?>/images/pic/wines/2-1.jpg"" />
			</div>
		</div>
	</div>
	<!-- ---------------------RedWines 2 ------------------------- -->
	<div id="RedWines2" class="catediv clearfix d6">
		<div class="titleimg_redwines"></div>
		<div class="contentsright clearfix">
			<h1>侯 爵 领  AOC GRAVES</h1>
			<div class="word">
				<p>
				源地：海报60M，经度0 25 20，纬度44 41 12<br>
				血统：GRAVES 格拉芙<br>
				诞生土壤：石灰石，砾石<br>
				涵盖范围：0.5公顷<br>
				先天树龄：35年藤<br>
				诞生时间：2010<br>
				血脉来源：60%美乐，40%赤霞珠<br>
				觉醒时间：18个月全新橡木桶<br>
				</p>
				<p>天命技能:<br>在格拉芙大区里，非常罕見的进行手工采摘，全程采用车库酒的技术，在橡木桶内进行酒精以及乳酸发酵，利用电脑严格调控温度。</p>
				<p>最大限度的表現了这块只有0.5公顷的葡萄园的风土面貌: 呈現在眼前的是深红宝石色，初期萦绕鼻尖的是黑色桨果的香气，橡木以及烟熏的味道隨后到达，在其中又掺杂有烤面包，咖啡等丰富的嗅觉体现。酒体柔顺平行，单宁细腻高雅，回味悠长。</p>
				<p>*可以搭配各种紅肉，如要单獨品尝，建议醒酒，避光储存</p>
			</div>
			<div class="pic">
				<img src="<?php echo get_template_directory_uri(); ?>/images/pic/wines/3.png" />
				<img src="<?php echo get_template_directory_uri(); ?>/images/pic/wines/3-1.jpg"" />
			</div>
		</div>
	</div>
	<!-- ---------------------RedWines 3 ------------------------- -->
	<div id="RedWines3" class="catediv clearfix d7">
		<div class="titleimg_redwines"></div>
		<div class="contentsright clearfix">
			<h1>公 爵 领  AOC ST EMILION GRAND CRU</h1>
			<div class="word">
				<p>
				源地：海报60M，经度0 10 24，纬度44 51 35<br>
				血统：右岸，特级圣爱美容产区<br>
				家族：CHATEAU PLAISANCE a 33330 ST EMILION<br>
				诞生土壤：沙砾粘土<br>
				先天树龄：60年藤<br>
				诞生时间：2010<br>
				血脉来源：80%美乐，10%赤霞珠，10%品丽珠<br>
				觉醒时间：18个月全新橡木桶<br>
				</p>
				<p>天命技能:<br>完美体现绝对皇室系列产品的精髓意义-专属葡萄园领地。在独特的气候下，特级圣爱美容产区的标志性土壤孕育出高质量的葡萄，以此为血脉根基，培育出这款顶级的葡萄酒产品。</p>
				<p>诞生初期，美乐的柔美甘甜表达无疑，水果的香气干凈明了，清新可爱，随着时间变化，赤霞珠与品丽铢的血脉特点逐渐展現，不再简单，却让人有如梦如幻的感觉，水果，黄油，熏烤，香草各种香气的混合，加上到了嘴中柔顺的单宁和余味的悠长，用性感迷人来形容，也不足为过。</p>
				<p>*可以搭配各种紅肉，如要单獨品尝，建议醒酒，避光储存</p>
			</div>
			<div class="pic">
				<img src="<?php echo get_template_directory_uri(); ?>/images/pic/wines/4.png" />
				<img src="<?php echo get_template_directory_uri(); ?>/images/pic/wines/4-1.jpg"" />
			</div>
		</div>
	</div>
  </div>
  
	<div id="nextjiantou"></div>
	<div id="prejiantou"></div>
</div>


<?php get_footer(); ?>