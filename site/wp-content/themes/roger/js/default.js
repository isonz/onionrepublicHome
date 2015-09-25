$(document).ready(function(){
	productChangPage();
	if(MOVEY>0) nextJianTou();	//打开页面自动切换到页面
});

var MOVEWIDTH = 1090;
function productChangPage()
{
	$("#nextjiantou").click(function(){
		MOVEY = MOVEY + MOVEWIDTH;
		nextJianTou();
	});
	$("#prejiantou").click(function(){
		MOVEY = MOVEY - MOVEWIDTH;
		preJianTou();
	});
}

function nextJianTou()
{
	var obj=$("#contentbox .moveupbox");
	var divw = obj.width();
	//console.log(divw,MOVEY);
	if((divw-MOVEWIDTH) <= MOVEY){
		$("#nextjiantou").hide();
	}
	var n = MOVEY/MOVEWIDTH;
	obj.animate({"margin-left": -MOVEY +"px"}, 600, function(){
		$("#prejiantou").show();
	});
}
function preJianTou()
{
	var obj=$("#contentbox .moveupbox");
	var divw = obj.width();
	if(0 >= MOVEY){
		$("#prejiantou").hide();
	}
	var n = MOVEY/MOVEWIDTH;
	obj.animate({"margin-left": -MOVEY +"px"}, 600, function(){
		$("#nextjiantou").show();
	});
}