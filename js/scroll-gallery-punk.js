$(document).ready(function() {   
var $h1 = $('.gallery-p1 > p');
var $h2 = $('.gallery-p2 > p');
var $h3 = $('.gallery-p3 > p');

var p1 = "https://cronkitenews.azpbs.org/wp-content/uploads/2019/05/3_Coolside-2000.jpg";   
var p2 = "https://cronkitenews.azpbs.org/wp-content/uploads/2019/05/5_Singing-2000.jpg";
var p3 = "https://cronkitenews.azpbs.org/wp-content/uploads/2019/05/2_Crossfire_Jose-2000.jpg";

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
});