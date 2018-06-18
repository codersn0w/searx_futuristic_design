var imgq = document.sform.q.value;
var URL = "https://pixabay.com/api/?key=YOUR_PIXABAY_API_KEY&lang=en&per_page=48&q="+encodeURIComponent(imgq);
$('#footer').css({
	position: "fixed",
	bottom: "0"
});
$.getJSON(URL, function(data){
	 if (parseInt(data.totalHits) > 0)
 $.each(data.hits, function(i, hit){ $("#imageresult").append('<a target="_blank" href="'+hit.pageURL+'"><div class="bgimage"><img src="'+hit.previewURL+'"></div></a>'); 
$(".bgimage").css({
	position: "relative",
	float: "left",
	width: "150px",
	height: "150px",
	margin: "2px",
	backgroundColor: "rgba(0,0,0,.2)"
	});

$("img").css({
	position: "absolute",
	lineHeight: "150px",
	display: "block",
	top: "0",
	right: "0",
	bottom: "0",
	left: "0",
	margin: "auto",
	});


$(".bgimage").hover(
	function () {
		$(this).css("boxShadow", "3px 3px 3px rgba(0, 0, 0, .8)");	
	},
	function () {
		$(this).css("boxShadow", "");	
	});
if(parseInt(data.totalHits)<48){
var row = Math.ceil(parseInt(data.totalHits)/4);
var imheight = 154 * row + 'px';
console.log(imheight);
$('#imageresult').css("height", imheight);
}




});
    else
        $("#imageresult").html('<div style="margin-top:100px; margin-bottom:100px; text-align:center;" class="erpix">No Result</div>');
       
});