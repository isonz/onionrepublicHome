function goTop(){ 
	var _btn = document.getElementById("goTop"); 
	if (document.documentElement && document.documentElement.scrollTop) { 
		var _con = document.documentElement; 
	} else if (document.body) { 
		var _con = document.body; 
	} 
	window.onscroll = set; 
	_btn.onclick = function (){ 
		_btn.style.display = "none"; 
		window.onscroll = null; 
		this.timer = setInterval(function() { 
			_con.scrollTop -= Math.ceil(_con.scrollTop * 0.3); 
			if (_con.scrollTop == 0) clearInterval(_btn.timer, window.onscroll = set); 
		},10); 
	}; 
	function set() { 
		_btn.style.display = _con.scrollTop ? 'block': "none"; 
	} 
}

document.write("<div id=\"goTop\" class=\"top_sub\"></div>"); 
window.onscroll = goTop; 

(function() {
    var a = ['section', 'article', 'nav', 'header', 'footer' /* 其他HTML5元素 */];
    for (var i = 0, j = a.length; i < j; i++) {
        document.createElement(a[i]);
    }	
})();
$(document).ready(function(){
	// alert($(window).width());
	show_img();
	var bvalue = $.browser.mobile;
	if(bvalue==true){
			//loadStyleFile("/wp-content/themes/roger/phoneabout.css");
			$(".catemenu").siblings("div").hide();
			$("#cat_dd_6,#cat_dd_3,#cat_dd_7,.project_left,.project_right,.switt_bg,.switt_bg1").remove();
			$(".company_l ul li").last().remove();
			if($("#cat_dd_8").css("display")=="block"){
				$(".infotitle").addClass("infot_md");
			}
			$("#cat_8>a").click(function(){
				
				$(".infotitle").addClass("infot_md");	
				$("#cat_dd_8").show();
			});
			$("#cat_6>a").click(function(){
				$("#cat_dd_8").hide();
				$(".infotitle").removeClass("infot_md");									  
			});
			$("#cat_3>a").click(function(){
				//alert(123);
				$("#lcat_dd_8").hide();
				$(".infotitle").removeClass("infot_md");									  
			});
			$("#cat_7>a").click(function(){
				$("#cat_dd_8").hide();
				$(".infotitle").removeClass("infot_md");									  
			});
			$(".videobg>a").attr("data","");
			$("#dituContent").css({width:'100%',height:'180px'})
			$(".catemenu").click(function(){
				$(this).siblings("div").slideToggle(400);							  
			});
			
			$("#phone_v li").each(function(vd){
				$(this).addClass("videoli"+vd);
				for(var i=0; i<=vd; i++){
					$(".videoli"+i).children().children("a").attr("href", "/video_phone/?id="+$(".videoli"+i).children().children("a").attr("data"));
				}
			})
	}else{
		$(".job_1").click(function(){
			$(".pop_job").show();
			var pid = $(this).attr('data');
			var tit = $(this).attr('title');
			var kongque = '若干';
			if(tit.indexOf("[")>-1){
				kongque = tit.substring(tit.indexOf("[")+1, tit.indexOf("]"));
				tit = tit.substring(0,tit.indexOf("["));
			}
			$.get("/?p="+pid,function(data){
				$("#job_content").html(data);
				var jobh= $(".pop_job").height()/2;
				$(".pop_job").css("margin-top",-jobh);
				$("#position").text(tit);
				$("#kongque").text('人数：'+kongque);
			});
		})
		$(".close_job").click(function(){
		 	$(".pop_job").hide();
		 	$("#job_content").html('');
		 	$("#position").text('');
			$("#kongque").text('');
		})
	}
	function loadStyleFile(url){
		var s = document.createElement("link");
		s.href = url;
		s.type = "text/css";
		s.rel = "stylesheet";
		document.getElementsByTagName("head")[0].appendChild(s);
		$("#twentytwelve").remove();
	}				   
	
	$("dd.show_hide").each(function(i){
		var nrnr = $(this).html().trim();
		if(''==nrnr){
			$(this).hide();
			$(this).prev("dt").hide();
		}
	});

	/*$(".videobg>a").click(function(){
		$(".nullupload").fadeIn(300);
		$(".uploaddiv").fadeIn(500);					  
	});*/
	$(".video_bg>a,.vt").click(function(){
		//alert(13);
		var url = $(this).attr("data");
		//var product_html = '<embed src="'+url+'" flashvars ="isAutoPlay=true" quality="high" width="960" height="580" align="middle" allowScriptAccess="always" allowFullScreen="true" mode="transparent" type="application/x-shockwave-flash"></embed>';
		//var product_html = '<iframe src="'+url+'" width="960" height="580" frameborder=0 allowfullscreen></iframe>';
		player = new YKU.Player('centerVideo',{
			styleid: '7',
		    client_id: 'a90a3904221d309a',
		    vid: url, //填写视频ID
		    width: 960,
		    height: 580,
		    autoplay: true,
		    show_related: false
		});
		//$("#centerVideo").html(product_html);
		$(".nullupload").fadeIn(300);
		$(".uploaddiv").fadeIn(500);
		
	});
	$(".close,.nullupload").click(function(){
		$(".uploaddiv").fadeOut(300);
		$(".nullupload").fadeOut(200);
		$("#centerVideo").html('');
	});
	
	$(".more").click(function(){
		$(this).siblings(".tt_h").show();
		$(this).siblings("strong").show();
		$(this).siblings(".hide").show();
		$(this).siblings(".more").hide();
		$(this).parent().addClass("tt_bg");
		$(this).parent().siblings().children(".tt_h").hide();
		$(this).parent().siblings().children("strong").hide();
		$(this).parent().siblings().children(".hide").hide();
		$(this).parent().siblings().children(".more").show();
		$(this).parent().siblings().removeClass("tt_bg");
		$(this).hide();
		$(this).siblings("em").show();
	}) 
	$(".hide").click(function(){
		$(this).siblings("em").hide();
		$(this).siblings(".tt_h").hide();
		$(this).siblings("strong").hide();
		$(this).siblings(".more").show();
		$(this).parent().removeClass("tt_bg");
		$(this).hide();
	});
	
	$(".bottom_a1").click(function(){
		$(".footerdiv").animate({bottom:"-155px"},500);
		$(this).hide();
		$(".bottom_a").show();
	});
	
	$(".bottom_a").click(function(){
		$(".footerdiv").animate({bottom:"0"},600);
		$(this).hide();
		$(".bottom_a1").show();
	});
	
	function show_img(){
		var defaultOpts = { interval: 5000, fadeInTime: 300, fadeOutTime: 200 };
        var _titles = $("ul#slide_b li");
        var _bodies = $(".banner_img img");
        var _count = _titles.length;
        var _current = 0;
        var _intervalID = null;
        var stop = function () { window.clearInterval(_intervalID); };
        var slide = function (opts) {
            if (opts) {
                _current = opts.current || 0;
            } else {
                _current = (_current >= (_count - 1)) ? 0 : (++_current);
            };
            _bodies.filter(":visible").fadeOut(defaultOpts.fadeOutTime, function () {
                _bodies.eq(_current).fadeIn(defaultOpts.fadeInTime);
                _bodies.removeClass("cur").eq(_current).addClass("cur");
            });
            _titles.removeClass("hover").eq(_current).addClass("hover");
        };
        var go = function () {
            stop();
            _intervalID = window.setInterval(function () { slide(); }, defaultOpts.interval);
        };
        var itemMouseOver = function (target, items) {
            stop();
            var i = $.inArray(target, items);
            slide({ current: i });
        };
        _titles.hover(function () { if ($(this).attr('class') != 'cur') { itemMouseOver(this, _titles); } else { stop(); } }, go);
        _bodies.hover(stop, go);
        go();	
	}
	
	$(".blog_view").click(function(){
		$(this).parent().siblings(".blog_font").slideDown();
		$(this).hide();
		$(this).parent().parent().siblings("dd").children(".blog_font").hide();
		$(this).parent().parent().siblings("dd").children(".blogInfo").children("a").show();
		
	});
	$(".hidedl").click(function(){
		$(this).parent().parent().parent().slideUp();
		$(this).parent().parent().parent().siblings(".blogInfo").children("a").show();	
	});
	
});

function showRs(){
	$(".notice_contactdiv").show();
	$(".notice_contact").show();
	setTimeout('showC()', 2000)
}
function showC(){
	$(".notice_contactdiv").fadeOut(500);
	$(".notice_contact").fadeOut(500);
}
