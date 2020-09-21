var myFullpage = new fullpage('#fullpage', {
        anchors: ['main', 'about', 'video', 'contact', 'lastPage'],
        menu: '#menu',
        lazyLoad: true
    });

$('#closemodal').click(function() {
    $('#modalNavigation').modal('hide');
});


$('.owl-carousel-box').owlCarousel({
  center: true,
    items:1,
    loop:true,
    margin:10,
    responsive:{
        600:{
            items:2
        }
    }
});


$(function() {
    $(".navbar-set li > a").each(function() {
        var href = $(this).attr('href');
        var heading = $(this).text();
        $('.sidenav').append('<a href="' + href + '">' + heading + '<\/a>');
    });
});



function openNav() {
    document.getElementById("mySidenav").style.left = "0px";
}

function closeNav() {
    document.getElementById("mySidenav").style.left = "-250px";
}

