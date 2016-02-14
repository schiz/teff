// Carousel slider

$(document).ready(function() {

// Быстрый вход на сайт




// Анимационый слайдер
$(".banner .slide").hide();
    
    var Animate = function() {
        $(".banner .animated >").hide();
        $(".banner .animated").show();
        $(".animated .center-title").fadeIn(2000);
        $(".animated .switches").css({ "display": "block" });

        $(".banner .animated > ").each(function(i) {
            $(this).delay((i++) * 800).fadeIn(500);
            if( $(this).is('.effect') ) {
                $(".slide.animated").delay(6500).fadeOut(2000);
            }
        });
    };
    Animate();

    var SlideNum = 0;
    var slideTime;
    var hwSlideSpeed = 800;
    var hwTimeOut = 7500;

    var slideCount = $(".banner ul >").size();

    var animSlide = function(arrow) {
        //clearTimeout(slideTime);

        $(".slide").eq(SlideNum).fadeOut(hwSlideSpeed);
        if(arrow == "next") {
            if(SlideNum == (slideCount - 1)) {
                SlideNum = 0;
            } else {
                SlideNum++;
            }
        } else if (arrow == "prew") {
            if(SlideNum == 0) {
                SlideNum = (slideCount - 1);
            } else {
                SlideNum -= 1;
            }
        } else {
            SlideNum = arrow;
        }
        
        if (SlideNum === 0) {
            Animate();
        }
        
        
        $(".switches .switches-item.active").removeClass('active');
        $(".switches .switches-item").eq(SlideNum).addClass('active');
        $(".slide").eq(SlideNum).fadeIn(hwSlideSpeed, rotator);
    };

        var $adderSwitches = '';
        $(".slide").each(function(index) {
            $adderSwitches += '<li class="switches-item">'+ index +'</li>';
        });

        $($adderSwitches).appendTo('.switches');
        $(".switches-item:first").addClass("active");
/*
        $(".switches-item").click(function() {
            var goTuNum = parseFloat( $(this).text() );
            animSlide(goTuNum);
        }); */

        var pause = false;
        var rotator = function() {
            if(!pause) {
                slideTime = setTimeout(function() {
                    animSlide('next');
                }, hwTimeOut );
            }
        };

    rotator();

    // Menus
    
  $("ul.nav a").on('mouseover',function() {
  $(this).parent().find('div.sub-nav').show();
 })
 $("ul.nav li").on('mouseleave',function() {
  $(this).parent().find('div.sub-nav').hide();
 })
    

});
