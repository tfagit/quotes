var fullcenter = function(){
	$('.fullcenter').css({
        position:'absolute',
        left: ($(window).width() - $('.fullcenter').outerWidth())/2,
        top: ($(window).height() - $('.fullcenter').outerHeight())/2
    });
}

$(window).resize(function(){
	fullcenter();
});

var toggleform = function(){
	if($("form#largequotes").css("display") === "none"){
		$("form#largequotes").css("display","block");
		$("form#smallquotes").css("display","none");
		$("input#toggleform").val("Quote pequeno");
	}
	else {
		$("form#largequotes").css("display","none");
		$("form#smallquotes").css("display","block");
		$("input#toggleform").val("Quote grande");
	}
}

$(document).ready(function() {
	$("input#toggleform").click(function(){
		toggleform();
		fullcenter();
	});
	fullcenter();
});

