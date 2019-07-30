
// Navigation
$(window).resize(function() {
	var ww = $(window).width();
    var menuSize = 700;
    if (ww > menuSize) {
        $(".toggle > span").addClass("close");
        $("nav").css("display", "block");
		$("header").removeClass("x");
    } else if (ww <= menuSize) {
        if ($(".toggle > span").hasClass("close")) {
            $("nav").css("display", "none");
        }
    }
});

$(".toggle-menu").click(function() {
	$("header").toggleClass("x");
    $(".toggle > span").toggleClass("close");
    $("nav").slideToggle();
});

$("nav > ul > li > a").click(function() {
	$("header").removeClass("x");
    $(".toggle > span").addClass("close");

	var ww = $(window).width();
    if (ww <= 700) {
        $("nav").slideToggle();
    };
});

// change_text
$(document).ready(function(){
	$("#comment").attr('placeholder','コメント');
	$("#author").attr('placeholder','名前');
	$("#email").attr('placeholder','メールアドレス');
	$("#url").attr('placeholder','URL');
    $("label[for='wp-comment-cookies-consent']").text('次回のコメントで使用するためブラウザーに自分の名前を保存する。');
});
