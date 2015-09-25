<?php

get_header();
?>

<div class="centerdiv home_bg">
	<div class="center_topimg">
    	<p class="top_img_draw"></p>
    </div>
    <div class="center_div">
    	<div class="p2">
        	<div class="p2-1 clearfix" id="jobs_pt">
            	<?php get_sidebar('jobs-sidebar'); ?>
                <div class="video_right">
				  <div class="infotitle video_phide" style="margin-bottom:0;">
				     <div class="tlt" style="left:320px;">
				         <div class="tlt1">
				            <div class="tlt2"><?php the_title() ?></div>
				         </div>
				     </div>
				     <hr>
				  </div>
				  <div class="jobs_rbanner"><img src="<?php echo get_template_directory_uri(); ?>/images/job_banner1.jpg" /></div>
				  <div class="jobs_list">
                  	  <dl class="clearfix">
                      	<dt>市场营销部</dt>
                        <dd class="clearfix">
                        	<span><a href="javascript:;" class="job_1">市场总监 [1]</a></span>
                            <span><a href="javascript:;" class="job_2">市场主管 [1]</a></span>
                            <span><a href="javascript:;" class="job_3">市场代表 [2]</a></span>
                        </dd>
                        <dt>服务部</dt>
                        <dd class="clearfix">
                        	<span><a href="javascript:;" class="job_4">店长 [1]</a></span>
                            <span><a href="javascript:;" class="job_5">高级美容师 [3]</a></span>
                            <span><a href="javascript:;" class="job_6">美容师 [5]</a></span>
                            <span><a href="javascript:;" class="job_7">美疗师 [2]</a></span>
                            <span><a href="javascript:;" class="job_8">美容顾问 [1]</a></span>
                        </dd>
                        <dt>信息技术部</dt>
                        <dd class="clearfix">
                        	<span><a href="javascript:;" class="job_9">网络运营主管 [1]</a></span>
                            <span><a href="javascript:;" class="job_10">PHP程序员 [1]</a></span>
                        </dd>
                      </dl>
                  </div>
       
			  </div>
            </div>
        </div>
    </div>
    
</div>

<!--弹出工作信息-->
<div class="pop_job">
	<div class="pop_jobdiv">
    	<h3 class="clearfix">市场总监 <span>空缺：1</span></h3>
        <div class="jobdiv_info">
        	<b>岗位职责：</b><br />
            1、开拓公司产品市场； <br />
            2、组织安排市场调研、客户开发方案； <br />
            3、团队的建立、培训、考核、管理等工作；<br /> 
            4、拟定营销方案、促销方案，保证完成部门与个人业绩指标； <br />
            5、监督跟进、分析各项市场反馈信息，充分利用有效性资源，准确制定市场定位、产品定位、客户定位、良性处理各种关系。
            <br /><br />
            <b>职位要求：</b><br />
            1、大专及以上学历，5年以上市场开拓经验和管理经验；<br />
            2、具有良好的培训能力、组织能力、市场分析、营销、推广能力；<br />
            3、具有制定市场推广、策划方案、培训方案的写作能力；<br />
            4、具有推广高端护肤品工作经验者优先考虑。<br /><br />
            薪金：面议<br />
            <br />
            <i>简历投放邮箱：hr@placentin.com</i>
            <div><input name="" type="submit" value="关闭窗口" class="close_job" /></div>
        </div>
    </div>
</div>

<script type="text/javascript" src="http://player.youku.com/jsapi"></script>
<?php get_footer(); ?>