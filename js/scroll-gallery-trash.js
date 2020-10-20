$(document).ready(function() {   
var $h1 = $('.gallery-p1 > p');
var $h2 = $('.gallery-p2 > p');
var $h3 = $('.gallery-p3 > p');
var $h5 = $('.gallery-p5 > p');
var $h6 = $('.gallery-p6 > p');
var $h8 = $('.gallery-p8 > p');
var $h12 = $('.gallery-p12 > p');
var $h15 = $('.gallery-p15 > p');

var p1 = "https://cronkitenews.azpbs.org/wp-content/uploads/2017/11/story_01.jpg";   
var p2 = "https://cronkitenews.azpbs.org/wp-content/uploads/2017/11/story_02.jpg";
var p3 = "https://cronkitenews.azpbs.org/wp-content/uploads/2017/11/story_03.jpg";

var p5 = "https://cronkitenews.azpbs.org/wp-content/uploads/2017/11/story_05.jpg";
var p6 = "https://cronkitenews.azpbs.org/wp-content/uploads/2017/11/story_06.jpg";

var p8 = "https://cronkitenews.azpbs.org/wp-content/uploads/2017/11/story_08.jpg";

var p12 = "https://cronkitenews.azpbs.org/wp-content/uploads/2017/11/story_12.jpg";

var p15 = "https://cronkitenews.azpbs.org/wp-content/uploads/2017/11/story_15.jpg";

$(window).scroll(function() {
    var top_of_element = $("#main-headline").offset().top;
    console.log(top_of_element);
    top_of_element -= 75;
    console.log(top_of_element);
    var bottom_of_element = $("#main-headline").offset().top + $("#main-headline").outerHeight();
    var bottom_of_screen = $(window).scrollTop() + $(window).height();
    var top_of_screen = $(window).scrollTop();

    if((bottom_of_screen > top_of_element) && (top_of_screen < bottom_of_element)){
        // The element is visible, do something
        $('#headline_over_image').fadeOut("1000");
        
    }
    else {
        // The element is not visible, do something else
        
        $('#headline_over_image').fadeIn("slow");
    }
});
    
$h1.waypoint(function(direction) {
    
    if(direction == 'down')
        {
       $('.gallery-p1').css('background-image', 'url("' + p2 + '")');   
    } else
        {
             $('.gallery-p1').css('background-image', 'url("' + p1 + '")');
        }
        }, {offset: '-30px' });  
$h2.waypoint(function(direction) {
    
    if(direction == 'down')
        {
       $('.gallery-p2').css('background-image', 'url("' + p3 + '")');   
    } else
        {
             $('.gallery-p2').css('background-image', 'url("' + p2 + '")');
        }
        }, {offset: '-30px' });
$h3.waypoint(function(direction) {
    
    if(direction == 'down')
        {
       $('.gallery-p3').css('background-image', 'url("' + p5 + '")');   
    } else
        {
        $('.gallery-p3').css('background-image', 'url("' + p3 + '")');
        }
        }, {offset: '-30px' });
$h5.waypoint(function(direction) {
    
    if(direction == 'down')
        {
       $('.gallery-p5').css('background-image', 'url("' + p6 + '")');   
    } else
        {
        $('.gallery-p5').css('background-image', 'url("' + p5 + '")');
        }
        }, {offset: '-30px' });
$h6.waypoint(function(direction) {
    
    if(direction == 'down')
        {
       $('.gallery-p6').css('background-image', 'url("' + p8 + '")');   
    } else
        {
        $('.gallery-p6').css('background-image', 'url("' + p6 + '")');
        }
        }, {offset: '-30px' });

$h8.waypoint(function(direction) {
    
    if(direction == 'down')
        {
       $('.gallery-p8').css('background-image', 'url("' + p12 + '")');   
    } else
        {
        $('.gallery-p8').css('background-image', 'url("' + p8 + '")');
        }
        }, {offset: '-30px' });

$h12.waypoint(function(direction) {
    
    if(direction == 'down')
        {
       $('.gallery-p12').css('background-image', 'url("' + p15 + '")');   
    } else
        {
        $('.gallery-p12').css('background-image', 'url("' + p12 + '")');
        }
        }, {offset: '-30px' });

});