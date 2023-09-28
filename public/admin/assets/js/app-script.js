
$(function() {
    "use strict";


//sidebar menu js
$.sidebarMenu($('.sidebar-menu'));

// === toggle-menu js
$(".toggle-menu").on("click", function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

// === sidebar menu activation js

$(function() {
        for (var i = window.location, o = $(".sidebar-menu a").filter(function() {
            return this.href == i;
        }).addClass("active").parent().addClass("active"); ;) {
            if (!o.is("li")) break;
            o = o.parent().addClass("in").parent().addClass("active");
        }
    }),


/* Top Header */

$(document).ready(function(){
    $(window).on("scroll", function(){
        if ($(this).scrollTop() > 60) {
            $('.topbar-nav .navbar').addClass('bg-dark');
        } else {
            $('.topbar-nav .navbar').removeClass('bg-dark');
        }
    });

 });


/* Back To Top */

$(document).ready(function(){
    $(window).on("scroll", function(){
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn();
        } else {
            $('.back-to-top').fadeOut();
        }
    });

    $('.back-to-top').on("click", function(){
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });
});


$(function () {
  $('[data-toggle="popover"]').popover()
})


$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})


	 // theme setting
	 $(".switcher-icon").on("click", function(e) {
        e.preventDefault();
        $(".right-sidebar").toggleClass("right-toggled");
    });


    $('#theme1').click(function() {
        theme(1);
    });
    $('#theme2').click(function() {
        theme(2);
    });
    $('#theme3').click(function() {
        theme(3);
    });
    $('#theme4').click(function() {
        theme(4);
    });
    $('#theme5').click(function() {
        theme(5);
    });
    $('#theme6').click(function() {
        theme(6);
    });
    $('#theme7').click(function() {
        theme(7);
    });
    $('#theme8').click(function() {
        theme(8);
    });
    $('#theme9').click(function() {
        theme(9);
    });
    $('#theme10').click(function() {
        theme(10);
    });
    $('#theme11').click(function() {
        theme(11);
    });
    $('#theme12').click(function() {
        theme(12);
    });
    $('#theme13').click(function() {
        theme(13);
    });
    $('#theme14').click(function() {
        theme(14);
    });
    $('#theme15').click(function() {
        theme(15);
    });
    function theme($num){
        let background = `bg-theme bg-theme${$num} `;
        $.post('/admin_/account/themes', {'background' : background }).done(function(response){
            location.reload();
        });
    }
    // function theme1() {
    //   $('body').attr('class', 'bg-theme bg-theme1');
    // }

    // function theme2() {
    //   $('body').attr('class', 'bg-theme bg-theme2');
    // }

    // function theme3() {
    //   $('body').attr('class', 'bg-theme bg-theme3');
    // }

    // function theme4() {
    //   $('body').attr('class', 'bg-theme bg-theme4');
    // }

	// function theme5() {
    //   $('body').attr('class', 'bg-theme bg-theme5');
    // }

	// function theme6() {
    //   $('body').attr('class', 'bg-theme bg-theme6');
    // }

    // function theme7() {
    //   $('body').attr('class', 'bg-theme bg-theme7');
    // }

    // function theme8() {
    //   $('body').attr('class', 'bg-theme bg-theme8');
    // }

    // function theme9() {
    //   $('body').attr('class', 'bg-theme bg-theme9');
    // }

    // function theme10() {
    //   $('body').attr('class', 'bg-theme bg-theme10');
    // }

    // function theme11() {
    //   $('body').attr('class', 'bg-theme bg-theme11');
    // }

    // function theme12() {
    //   $('body').attr('class', 'bg-theme bg-theme12');
    // }

	// function theme13() {
    //   $('body').attr('class', 'bg-theme bg-theme13');
    // }

	// function theme14() {
    //   $('body').attr('class', 'bg-theme bg-theme14');
    // }

	// function theme15() {
    //   $('body').attr('class', 'bg-theme bg-theme15');
    // }




});
