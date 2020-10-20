 $(document).ready(function() {   

//Variable Declarations     
     
var $h1 = $('.heading1');
var $h2 = $('.heading2');
var $h3 = $('.heading3');
var $h4 = $('.heading4');
var $h5 = $('.heading5');
var $h6 = $('.heading6');     
var $h7 = $('.heading7');     
//var $h8 = $('.heading8');     
var $h9 = $('.heading9');
var $h10 = $('.heading10');
var $h11 = $('.heading11');
var $h12 = $('.heading12');
var $h13 = $('.heading13');
var $h14 = $('.heading14');
var $h15 = $('.heading15');
var $h16 = $('.heading16');
var $h17 = $('.heading17');
var $h18 = $('.heading18');
var $h19 = $('.heading19');
var $h20 = $('.heading20');
     
var $sh1 = $('.sheading1');
var $sh2 = $('.sheading2');
var $sh3 = $('.sheading3');
var $sh4 = $('.sheading4');
var $sh5 = $('.sheading5');     
var $sh6 = $('.sheading6');     
var $sh7 = $('.sheading7');    
//var $sh8 = $('.sheading8');      
var $sh9 = $('.sheading9');      
var $sh10 = $('.sheading10'); 
var $sh11 = $('.sheading11'); 
var $sh12 = $('.sheading12'); 
var $sh13 = $('.sheading13'); 
var $sh14 = $('.sheading14'); 
var $sh15 = $('.sheading15'); 
var $sh16 = $('.sheading16'); 
var $sh17 = $('.sheading17'); 
var $sh18 = $('.sheading18'); 
var $sh19 = $('.sheading19'); 
var $sh20 = $('.sheading20'); 
     
var image1url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/1_20.jpg";
var image2url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/2_20.jpg";   
var image3url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/3_20.jpg";
var image4url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/4_20.jpg";
var image5url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/5_20.jpg";
var image6url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/6_20.jpg";
var image7url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/7_20.jpg";
//var image8url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/8_20.jpg";
var image9url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/9_20.jpg";
var image10url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/10_20.jpg";
var image11url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/11_20.jpg";
var image12url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/12_20.jpg";
var image13url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/13_20.jpg";
var image14url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/14_20.jpg";
var image15url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/15_20.jpg";
var image16url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/16_20.jpg";
var image17url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/17_20.jpg";
var image18url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/18_20.jpg";
var image19url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/19_20.jpg";
var image20url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/20_20.jpg";
     

var mimage1url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/m1_20.jpg";
var mimage2url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/m2_20.jpg";   
var mimage3url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/m3_20.jpg";
var mimage4url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/4_20-1.jpg";
var mimage5url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/5_20-1.jpg";
var mimage6url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/6_20-1.jpg";
var mimage7url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/7_20-1.jpg";
//var mimage8url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/8_20-1.jpg";
var mimage9url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/9_20-1.jpg";
var mimage10url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/10_20-1.jpg";
var mimage11url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/11_20-1.jpg";
var mimage12url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/12_20-1.jpg";
var mimage13url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/13_20-1.jpg";
var mimage14url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/14_20-1.jpg";
var mimage15url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/15_20-1.jpg";
var mimage16url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/16_20-1.jpg";
var mimage17url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/17_20-1.jpg";
var mimage18url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/18_20-1.jpg";
var mimage19url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/19_20-1.jpg";
var mimage20url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/20_20-1.jpg";
     
     
//Begin Desktop Waypoints     
     
$h1.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
       $('.img-outer').hide();
          $('.img-outer').fadeIn(1000).css({"background-image": 'url("' + image2url + '")'});   
 
    } else
        {
            console.log('all the way up');
            $('.img-outer').hide();
             $('.img-outer').fadeIn("slow").css('background-image', 'url("' + image1url + '")');
        }
        }, {offset: '100px' });
 
    

$h2.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.img-outer').hide();
        $('.img-outer').fadeIn("slow").css({"background-image": 'url("' + image3url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.img-outer').hide();
             $('.img-outer').fadeIn("slow").css('background-image', 'url("' + image2url + '")');
        }
        }, {offset: '100px' });
     

$h3.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.img-outer').hide();
        $('.img-outer').fadeIn("slow").css({"background-image": 'url("' + image4url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.img-outer').hide();
             $('.img-outer').fadeIn("slow").css('background-image', 'url("' + image3url + '")');
        }
        }, {offset: '100px' });
     
     

$h4.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.img-outer').hide();
        $('.img-outer').fadeIn("slow").css({"background-image": 'url("' + image5url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.img-outer').hide();
             $('.img-outer').fadeIn("slow").css('background-image', 'url("' + image4url + '")');
        }
        }, {offset: '100px' });
     

$h5.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.img-outer').hide();
        $('.img-outer').fadeIn("slow").css({"background-image": 'url("' + image6url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.img-outer').hide();
             $('.img-outer').fadeIn("slow").css('background-image', 'url("' + image5url + '")');
        }
        }, {offset: '100px' });
     

$h6.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.img-outer').hide();
        $('.img-outer').fadeIn("slow").css({"background-image": 'url("' + image7url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.img-outer').hide();
             $('.img-outer').fadeIn("slow").css('background-image', 'url("' + image6url + '")');
        }
        }, {offset: '100px' });
     

$h7.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.img-outer').hide();
        $('.img-outer').fadeIn("slow").css({"background-image": 'url("' + image9url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.img-outer').hide();
             $('.img-outer').fadeIn("slow").css('background-image', 'url("' + image7url + '")');
        }
        }, {offset: '100px' });


$h9.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.img-outer').hide();
        $('.img-outer').fadeIn("slow").css({"background-image": 'url("' + image10url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.img-outer').hide();
             $('.img-outer').fadeIn("slow").css('background-image', 'url("' + image9url + '")');
        }
        }, {offset: '100px' });
     

$h10.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.img-outer').hide();
        $('.img-outer').fadeIn("slow").css({"background-image": 'url("' + image11url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.img-outer').hide();
             $('.img-outer').fadeIn("slow").css('background-image', 'url("' + image10url + '")');
        }
        }, {offset: '100px' });
     

$h11.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.img-outer').hide();
        $('.img-outer').fadeIn("slow").css({"background-image": 'url("' + image12url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.img-outer').hide();
             $('.img-outer').fadeIn("slow").css('background-image', 'url("' + image11url + '")');
        }
        }, {offset: '100px' });
     

$h12.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.img-outer').hide();
        $('.img-outer').fadeIn("slow").css({"background-image": 'url("' + image13url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.img-outer').hide();
             $('.img-outer').fadeIn("slow").css('background-image', 'url("' + image12url + '")');
        }
        }, {offset: '100px' });
     

$h13.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.img-outer').hide();
        $('.img-outer').fadeIn("slow").css({"background-image": 'url("' + image14url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.img-outer').hide();
             $('.img-outer').fadeIn("slow").css('background-image', 'url("' + image13url + '")');
        }
        }, {offset: '100px' });
     

$h14.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.img-outer').hide();
        $('.img-outer').fadeIn("slow").css({"background-image": 'url("' + image15url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.img-outer').hide();
             $('.img-outer').fadeIn("slow").css('background-image', 'url("' + image14url + '")');
        }
        }, {offset: '100px' });
     

$h15.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.img-outer').hide();
        $('.img-outer').fadeIn("slow").css({"background-image": 'url("' + image16url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.img-outer').hide();
             $('.img-outer').fadeIn("slow").css('background-image', 'url("' + image15url + '")');
        }
        }, {offset: '100px' });
     

$h16.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.img-outer').hide();
        $('.img-outer').fadeIn("slow").css({"background-image": 'url("' + image17url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.img-outer').hide();
             $('.img-outer').fadeIn("slow").css('background-image', 'url("' + image16url + '")');
        }
        }, {offset: '100px' });
     

$h17.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.img-outer').hide();
        $('.img-outer').fadeIn("slow").css({"background-image": 'url("' + image18url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.img-outer').hide();
             $('.img-outer').fadeIn("slow").css('background-image', 'url("' + image17url + '")');
        }
        }, {offset: '100px' });
     

$h18.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.img-outer').hide();
        $('.img-outer').fadeIn("slow").css({"background-image": 'url("' + image19url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.img-outer').hide();
             $('.img-outer').fadeIn("slow").css('background-image', 'url("' + image18url + '")');
        }
        }, {offset: '100px' });
     

$h19.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.img-outer').hide();
        $('.img-outer').fadeIn("slow").css({"background-image": 'url("' + image20url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.img-outer').hide();
             $('.img-outer').fadeIn("slow").css('background-image', 'url("' + image19url + '")');
        }
        }, {offset: '100px' });
     


   
//Begin Mobile Waypoints     
     
$sh1.waypoint(function(direction) {
    
    if(direction == 'down')
        {
           console.log('waypoint');
          $('.slide-container ').css({"background-image": 'url("' + mimage2url + '")'});   
 
    } else
        {
            console.log('all the way up');
            $('.slide-container ').css('background-image', 'url("' + mimage1url + '")');
        }
        }, {offset: '-50px' });
 
    
    
$sh2.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.slide-container ').css({"background-image": 'url("' + mimage3url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.slide-container ').css('background-image', 'url("' + mimage2url + '")');
        }
        }, {offset: '-50px' });     

$sh3.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.slide-container ').css({"background-image": 'url("' + mimage4url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.slide-container ').css('background-image', 'url("' + mimage3url + '")');
        }
        }, {offset: '-50px' });  
     
$sh4.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.slide-container ').css({"background-image": 'url("' + mimage5url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.slide-container ').css('background-image', 'url("' + mimage4url + '")');
        }
        }, {offset: '-50px' });  
     
$sh5.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.slide-container ').css({"background-image": 'url("' + mimage6url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.slide-container ').css('background-image', 'url("' + mimage5url + '")');
        }
        }, {offset: '-50px' });

$sh6.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.slide-container ').css({"background-image": 'url("' + mimage7url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.slide-container ').css('background-image', 'url("' + mimage6url + '")');
        }
        }, {offset: '-50px' });   
     
$sh7.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.slide-container ').css({"background-image": 'url("' + mimage9url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.slide-container ').css('background-image', 'url("' + mimage7url + '")');
        }
        }, {offset: '-50px' }); 
      
     
$sh9.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.slide-container ').css({"background-image": 'url("' + mimage10url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.slide-container ').css('background-image', 'url("' + mimage9url + '")');
        }
        }, {offset: '-50px' });  
     
$sh10.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.slide-container ').css({"background-image": 'url("' + mimage11url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.slide-container ').css('background-image', 'url("' + mimage10url + '")');
        }
        }, {offset: '-50px' });  
$sh11.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.slide-container ').css({"background-image": 'url("' + mimage12url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.slide-container ').css('background-image', 'url("' + mimage11url + '")');
        }
        }, {offset: '-50px' });  
     
$sh12.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.slide-container ').css({"background-image": 'url("' + mimage13url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.slide-container ').css('background-image', 'url("' + mimage12url + '")');
        }
        }, {offset: '-50px' });  
     
$sh13.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.slide-container ').css({"background-image": 'url("' + mimage14url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.slide-container ').css('background-image', 'url("' + mimage13url + '")');
        }
        }, {offset: '-50px' });  

$sh14.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.slide-container ').css({"background-image": 'url("' + mimage15url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.slide-container ').css('background-image', 'url("' + mimage14url + '")');
        }
        }, {offset: '-50px' });  
  
$sh15.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.slide-container ').css({"background-image": 'url("' + mimage16url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.slide-container ').css('background-image', 'url("' + mimage15url + '")');
        }
        }, {offset: '-50px' });  
     
$sh16.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.slide-container ').css({"background-image": 'url("' + mimage17url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.slide-container ').css('background-image', 'url("' + mimage16url + '")');
        }
        }, {offset: '-50px' });  
$sh17.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.slide-container ').css({"background-image": 'url("' + mimage18url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.slide-container ').css('background-image', 'url("' + mimage17url + '")');
        }
        }, {offset: '-50px' });  

$sh18.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.slide-container ').css({"background-image": 'url("' + mimage19url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.slide-container ').css('background-image', 'url("' + mimage18url + '")');
        }
        }, {offset: '-50px' });  
     
$sh19.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.slide-container ').css({"background-image": 'url("' + mimage20url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.slide-container ').css('background-image', 'url("' + mimage19url + '")');
        }
        }, {offset: '-50px' });  
     
     
  });  