$(function(){
	var select = decodeURIComponent(location.search.match(/type=(.*?)(&|$)/)[1]);
	if(select == 'web'){
		$("#type li:nth-child(2)").css("border-bottom", "2px solid #0bf");
	}else if(select == 'news'){
	$("#type li:nth-child(3)").css("border-bottom", "2px solid #0bf");	
	}else if(select == 'image'){
	$("#type li:nth-child(4)").css("border-bottom", "2px solid #0bf");	
	}else if(select == 'video'){
	$("#type li:nth-child(5)").css("border-bottom", "2px solid #0bf");	
    }
});