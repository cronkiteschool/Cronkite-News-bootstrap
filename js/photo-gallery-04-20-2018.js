 $(document).ready(function() {   

//Variable Declarations     
     
var $0418h1 = $('.0418heading1');
var $0418h2 = $('.0418heading2');
var $0418h3 = $('.0418heading3');
var $0418h4 = $('.0418heading4');
var $0418h5 = $('.0418heading5');
var $0418h6 = $('.0418heading6');     
var $0418h7 = $('.0418heading7');     
var $0418h8 = $('.0418heading8');     
var $0418h9 = $('.0418heading9');
var $0418h10 = $('.0418heading10');
var $0418h11 = $('.0418heading11');
var $0418h12 = $('.0418heading12');
var $0418h13 = $('.0418heading13');
var $0418h14 = $('.0418heading14');
var $0418h15 = $('.0418heading15');
var $0418h16 = $('.0418heading16');
var $0418h17 = $('.0418heading17');

     
var $0418sh1 = $('.flsheading1');
var $0418sh2 = $('.flsheading2');
var $0418sh3 = $('.flsheading3');
var $0418sh4 = $('.flsheading4');
var $0418sh5 = $('.flsheading5');     
var $0418sh6 = $('.flsheading6');     
var $0418sh7 = $('.flsheading7');    
var $0418sh8 = $('.flsheading8');      
var $0418sh9 = $('.flsheading9');      
var $0418sh10 = $('.flsheading10'); 
var $0418sh11 = $('.flsheading11'); 
var $0418sh12 = $('.flsheading12'); 
var $0418sh13 = $('.flsheading13'); 
var $0418sh14 = $('.flsheading14'); 
var $0418sh15 = $('.flsheading15'); 
var $0418sh16 = $('.flsheading16'); 
var $0418sh17 = $('.flsheading17');

     
var image1url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/0.jpg";
var image2url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/1.jpg";   
var image3url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/2.jpg";
var image4url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/3.jpg";
var image5url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/4.jpg";
var image6url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/5.jpg";
var image7url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/6.jpg";
var image8url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/7.jpg";
var image9url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/8.jpg";
var image10url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/9.jpg";
var image11url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/10.jpg";
var image12url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/11.jpg";
var image13url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/12.jpg";
var image14url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/13.jpg";
var image15url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/14.jpg";
var image16url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/15.jpg";
var image17url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/16.jpg";
var image18url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/17.jpg";


var mimage1url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/0-1.jpg";
var mimage2url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/1-1.jpg";   
var mimage3url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/2-1.jpg";
var mimage4url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/3-1.jpg";
var mimage5url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/4-1.jpg";
var mimage6url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/5-1.jpg";
var mimage7url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/6-1.jpg";
var mimage8url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/7-1.jpg";
var mimage9url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/8-1.jpg";
var mimage10url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/9-1.jpg";
var mimage11url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/10-1.jpg";
var mimage12url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/11-1.jpg";
var mimage13url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/12-1.jpg";
var mimage14url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/13-1.jpg";
var mimage15url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/14-1.jpg";
var mimage16url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/15-1.jpg";
var mimage17url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/16-1.jpg";
var mimage18url = "https://cronkitenews.azpbs.org/wp-content/uploads/2018/04/17-1.jpg";

     
     
//Begin Desktop Waypoints     
     
$0418h1.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
       $('.flimg-outer').css({"background-image": 'url("' + image2url + '")'});   
 
    } else
        {
            console.log('all the way up');
            $('.flimg-outer').css('background-image', 'url("' + image1url + '")');
        }
        }, {offset: '100px' });
 
    

$0418h2.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.flimg-outer').css({"background-image": 'url("' + image3url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.flimg-outer').css('background-image', 'url("' + image2url + '")');
        }
        }, {offset: '100px' });
     

$0418h3.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.flimg-outer').css({"background-image": 'url("' + image4url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.flimg-outer').css('background-image', 'url("' + image3url + '")');
        }
        }, {offset: '100px' });
     
     

$0418h4.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.flimg-outer').css({"background-image": 'url("' + image5url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.flimg-outer').css('background-image', 'url("' + image4url + '")');
        }
        }, {offset: '100px' });
     

$0418h5.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.flimg-outer').css({"background-image": 'url("' + image6url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.flimg-outer').css('background-image', 'url("' + image5url + '")');
        }
        }, {offset: '100px' });
     

$0418h6.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.flimg-outer').css({"background-image": 'url("' + image7url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.flimg-outer').css('background-image', 'url("' + image6url + '")');
        }
        }, {offset: '100px' });
     

$0418h7.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.flimg-outer').css({"background-image": 'url("' + image8url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.flimg-outer').css('background-image', 'url("' + image7url + '")');
        }
        }, {offset: '100px' });
     

$0418h8.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.flimg-outer').css({"background-image": 'url("' + image9url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.flimg-outer').css('background-image', 'url("' + image8url + '")');
        }
        }, {offset: '100px' });
     

$0418h9.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.flimg-outer').css({"background-image": 'url("' + image10url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.flimg-outer').css('background-image', 'url("' + image9url + '")');
        }
        }, {offset: '100px' });
     

$0418h10.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.flimg-outer').css({"background-image": 'url("' + image11url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.flimg-outer').css('background-image', 'url("' + image10url + '")');
        }
        }, {offset: '100px' });
     

$0418h11.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.flimg-outer').css({"background-image": 'url("' + image12url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.flimg-outer').css('background-image', 'url("' + image11url + '")');
        }
        }, {offset: '100px' });
     

$0418h12.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.flimg-outer').css({"background-image": 'url("' + image13url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.flimg-outer').css('background-image', 'url("' + image12url + '")');
        }
        }, {offset: '100px' });
     

$0418h13.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.flimg-outer').css({"background-image": 'url("' + image14url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.flimg-outer').css('background-image', 'url("' + image13url + '")');
        }
        }, {offset: '100px' });
     

$0418h14.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.flimg-outer').css({"background-image": 'url("' + image15url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.flimg-outer').css('background-image', 'url("' + image14url + '")');
        }
        }, {offset: '100px' });
     

$0418h15.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.flimg-outer').css({"background-image": 'url("' + image16url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.flimg-outer').css('background-image', 'url("' + image15url + '")');
        }
        }, {offset: '100px' });
     

$0418h16.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.flimg-outer').css({"background-image": 'url("' + image17url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.flimg-outer').css('background-image', 'url("' + image16url + '")');
        }
        }, {offset: '100px' });
     

     


   
//Begin Mobile Waypoints     
     
$0418sh1.waypoint(function(direction) {
    
    if(direction == 'down')
        {
           console.log('waypoint');
          $('.flslide-container ').css({"background-image": 'url("' + mimage2url + '")'});   
 
    } else
        {
            console.log('all the way up');
            $('.flslide-container ').css('background-image', 'url("' + mimage1url + '")');
        }
        });
 
    
    
$0418sh2.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.flslide-container ').css({"background-image": 'url("' + mimage3url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.flslide-container ').css('background-image', 'url("' + mimage2url + '")');
        }
        });     

$0418sh3.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.flslide-container ').css({"background-image": 'url("' + mimage4url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.flslide-container ').css('background-image', 'url("' + mimage3url + '")');
        }
        });  
     
$0418sh4.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.flslide-container ').css({"background-image": 'url("' + mimage5url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.flslide-container ').css('background-image', 'url("' + mimage4url + '")');
        }
        });  
     
$0418sh5.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.flslide-container ').css({"background-image": 'url("' + mimage6url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.flslide-container ').css('background-image', 'url("' + mimage5url + '")');
        }
        });

$0418sh6.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.flslide-container ').css({"background-image": 'url("' + mimage7url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.flslide-container ').css('background-image', 'url("' + mimage6url + '")');
        }
        });   
     
$0418sh7.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.flslide-container ').css({"background-image": 'url("' + mimage8url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.flslide-container ').css('background-image', 'url("' + mimage7url + '")');
        }
        }); 
     
$0418sh8.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.flslide-container ').css({"background-image": 'url("' + mimage9url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.flslide-container ').css('background-image', 'url("' + mimage8url + '")');
        }
        });  
     
$0418sh9.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.flslide-container ').css({"background-image": 'url("' + mimage10url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.flslide-container ').css('background-image', 'url("' + mimage9url + '")');
        }
        });  
     
$0418sh10.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.flslide-container ').css({"background-image": 'url("' + mimage11url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.flslide-container ').css('background-image', 'url("' + mimage10url + '")');
        }
        });  
$0418sh11.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.flslide-container ').css({"background-image": 'url("' + mimage12url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.flslide-container ').css('background-image', 'url("' + mimage11url + '")');
        }
        });  
     
$0418sh12.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.flslide-container ').css({"background-image": 'url("' + mimage13url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.flslide-container ').css('background-image', 'url("' + mimage12url + '")');
        }
        });  
     
$0418sh13.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.flslide-container ').css({"background-image": 'url("' + mimage14url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.flslide-container ').css('background-image', 'url("' + mimage13url + '")');
        }
        });  

$0418sh14.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.flslide-container ').css({"background-image": 'url("' + mimage15url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.flslide-container ').css('background-image', 'url("' + mimage14url + '")');
        }
        });  
  
$0418sh15.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.flslide-container ').css({"background-image": 'url("' + mimage16url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.flslide-container ').css('background-image', 'url("' + mimage15url + '")');
        }
        });  
     
$0418sh16.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.flslide-container ').css({"background-image": 'url("' + mimage17url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.flslide-container ').css('background-image', 'url("' + mimage16url + '")');
        }
        });  
  
     
$0418sh17.waypoint(function(direction) {
    
    if(direction == 'down')
        {
        console.log('waypoint');
        $('.flslide-container ').css({"background-image": 'url("' + mimage18url + '")'});  
         
    } else
        {
            console.log('all the way up');
              $('.flslide-container ').css('background-image', 'url("' + mimage17url + '")');
        }
        });  


     
     
  });  