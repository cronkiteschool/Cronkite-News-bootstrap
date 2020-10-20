$(document).foundation()


var imageURL = 'https://cronkitenews.azpbs.org/wp-content/uploads/2020/07/mlk-7.jpg';
$('.slideshow .top').css("background-image", "url(" + imageURL + ")").css("z-index", "1");
$('.slideshow .top').find('.photo-credit').html('<a href="https://commons.wikimedia.org/wiki/File:Martin_Luther_King_Jr_NYWTS.jpg" target="_blank">Photo</a> by Dick DeMarsico / <a href="https://commons.wikimedia.org/wiki/File:Martin_Luther_King_Jr_NYWTS.jpg" target="_blank">Library of Congress via Wikimedia Commons</a>');

var waypoint = new Waypoint({
  element: document.getElementById('jose-juarez'),
  handler: function(direction) {
    //$.notify('Jose Juarez waypoint triggered');
    var imageURL = 'images/mlk-2.jpg';
  },
  context: document.getElementById('story')
});

var waypoint1 = new Waypoint({
  element: document.getElementById('jose-audio'),
  handler: function(direction) {
    //$.notify('Jose Audio waypoint triggered');
    if (direction == 'up') {
      var imageURL = 'https://cronkitenews.azpbs.org/wp-content/uploads/2020/07/mlk-7.jpg';
      $('.slideshow .bottom').fadeOut();
      $('.slideshow .top').css("background-image", "url(" + imageURL + ")").delay(300).fadeIn();
      $('.slideshow .top').find('.photo-credit').html('<a href="https://commons.wikimedia.org/wiki/File:Martin_Luther_King_Jr_NYWTS.jpg" target="_blank">Photo</a> by Dick DeMarsico / <a href="https://commons.wikimedia.org/wiki/File:Martin_Luther_King_Jr_NYWTS.jpg" target="_blank">Library of Congress via Wikimedia Commons</a>');
    } else {
      var imageURL = 'https://cronkitenews.azpbs.org/wp-content/uploads/2020/07/mlk-10.jpg';
      $('.slideshow .top').fadeOut();
      $('.slideshow .bottom').css("background-image", "url(" + imageURL + ")").delay(300).fadeIn();
      $('.slideshow .bottom').find('.photo-credit').html('<a href="https://www.flickr.com/photos/geoliv/41022179730/" target="_blank">Photo</a> by <a href="https://www.flickr.com/photos/geoliv/" target="_blank">Geoff Livingston</a>/<a href="https://creativecommons.org/licenses/by-sa/2.0/legalcode" target="_blank">Flickr</a>');
    }
  },
  context: document.getElementById('story')
});

var waypoint2 = new Waypoint({
  element: document.getElementById('reshauna-intro'),
  handler: function(direction) {
    //$.notify('Reshauna rest waypoint triggered');
    if (direction == 'up') {
      var imageURL = 'https://cronkitenews.azpbs.org/wp-content/uploads/2020/07/mlk-10.jpg';
      $('.slideshow .bottom').fadeOut();
      $('.slideshow .top').css("background-image", "url(" + imageURL + ")").delay(300).fadeIn();
      $('.slideshow .top').find('.photo-credit').html('<a href="https://www.flickr.com/photos/geoliv/41022179730/" target="_blank">Photo</a> by <a href="https://www.flickr.com/photos/geoliv/" target="_blank">Geoff Livingston</a>/<a href="https://www.flickr.com/photos/geoliv/41022179730/" target="_blank">Flickr</a>');
    } else {
      var imageURL = 'https://cronkitenews.azpbs.org/wp-content/uploads/2020/07/mlk-6.jpg';
      $('.slideshow .top').fadeOut();
      $('.slideshow .bottom').css("background-image", "url(" + imageURL + ")").delay(300).fadeIn();
      $('.slideshow .bottom').find('.photo-credit').html('<a href="https://commons.wikimedia.org/wiki/File:Aankomst_van_Martin_Luther_King_jr._op_Schiphol,_NL-HlmNHA_1478_01926_A.JPG" target="_blank">Photo</a> by <a href="https://commons.wikimedia.org/wiki/File:Aankomst_van_Martin_Luther_King_jr._op_Schiphol,_NL-HlmNHA_1478_01926_A.JPG" target="_blank">Fotoburo de Boer</a> / <a href="https://commons.wikimedia.org/wiki/File:Aankomst_van_Martin_Luther_King_jr._op_Schiphol,_NL-HlmNHA_1478_01926_A.JPG" target="_blank">Noord-Hollands Archief via Wikimedia Commons</a>');
    }

  },
  context: document.getElementById('story')
});

var waypoint3 = new Waypoint({
  element: document.getElementById('reshauna-rest'),
  handler: function(direction) {
    //$.notify('Reshauna rest waypoint triggered');
    if (direction == 'up') {
      var imageURL = 'https://cronkitenews.azpbs.org/wp-content/uploads/2020/07/mlk-6.jpg';
      $('.slideshow .bottom').fadeOut();
      $('.slideshow .top').css("background-image", "url(" + imageURL + ")").delay(300).fadeIn();
      $('.slideshow .top').find('.photo-credit').html('<a href="https://commons.wikimedia.org/wiki/File:Aankomst_van_Martin_Luther_King_jr._op_Schiphol,_NL-HlmNHA_1478_01926_A.JPG" target="_blank">Photo</a> by <a href="https://commons.wikimedia.org/wiki/File:Aankomst_van_Martin_Luther_King_jr._op_Schiphol,_NL-HlmNHA_1478_01926_A.JPG" target="_blank">Fotoburo de Boer</a> / <a href="https://commons.wikimedia.org/wiki/File:Aankomst_van_Martin_Luther_King_jr._op_Schiphol,_NL-HlmNHA_1478_01926_A.JPG" target="_blank">Noord-Hollands Archief via Wikimedia Commons</a>');
    } else {
      var imageURL = 'https://cronkitenews.azpbs.org/wp-content/uploads/2020/07/mlk-4.jpg';
      $('.slideshow .top').fadeOut();
      $('.slideshow .bottom').css("background-image", "url(" + imageURL + ")").delay(300).fadeIn();
      $('.slideshow .bottom').find('.photo-credit').html('<a href="https://www.flickr.com/photos/7633518@N08/39390995650" target="_blank">Photo</a> by <a href="https://www.flickr.com/photos/7633518@N08" target="_blank">Sarah Stierch</a>/<a href="https://www.flickr.com/photos/7633518@N08/39390995650" target="_blank">Flickr</a>');
    }

  },
  context: document.getElementById('story')
});

var waypoint4 = new Waypoint({
  element: document.getElementById('percy-intro'),
  handler: function(direction) {
    //$.notify('Percy rest waypoint triggered');
    if (direction == 'up') {
      var imageURL = 'https://cronkitenews.azpbs.org/wp-content/uploads/2020/07/mlk-4.jpg';
      $('.slideshow .bottom').fadeOut();
      $('.slideshow .top').css("background-image", "url(" + imageURL + ")").delay(300).fadeIn();
      $('.slideshow .top').find('.photo-credit').html('<a href="https://www.flickr.com/photos/7633518@N08/39390995650" target="_blank">Photo</a> by <a href="https://www.flickr.com/photos/7633518@N08" target="_blank">Sarah Stierch</a>/<a href="https://www.flickr.com/photos/7633518@N08/39390995650" target="_blank">Flickr</a>');
    } else {
      var imageURL = 'https://cronkitenews.azpbs.org/wp-content/uploads/2020/07/mlk-5.jpg';
      $('.slideshow .top').fadeOut();
      $('.slideshow .bottom').css("background-image", "url(" + imageURL + ")").delay(300).fadeIn();
      $('.slideshow .bottom').find('.photo-credit').html('<a href="https://www.flickr.com/photos/bswise_/49551058501/in/photolist-2iuE8mR-2ihMWTY-QHdrqA-xGC3V-2ihM6tq-R4UzTE-2iG5YF8-2ekRzoe-2ihRgn1-aLXTrr-bnazFy-xHiNW-u256zj-bnazxS-2cXoQv6-2fvFyVH-Q3RGHx-ZGsdHS-KC7yZg-dj7kRx-4CXo8q-2dt8C4w-2jd4StF-u2d6hZ-27Y4uh2-5xMrCC-Ri2xvp-5QBkVa-5EDffe-2gwGoWD-9XQd2t-9XT5VW-27Y4tdt-EZTrgW-KX2Qi2-QHfqhu-4nbEJt-aKLEgg-oNBbMH-uEMXV-2ihDqrx-23JtwnR-mAJjh-ex94pT-AdK3Yz-c2yAkh-aKLEca-8rT585-8LgYn-5aaJBm" target="_blank">Photo</a> by <a href="https://www.flickr.com/photos/bswise_/" target="_blank">bswise</a>/<a href="https://www.flickr.com/photos/bswise_/49551058501/in/photolist-2iuE8mR-2ihMWTY-QHdrqA-xGC3V-2ihM6tq-R4UzTE-2iG5YF8-2ekRzoe-2ihRgn1-aLXTrr-bnazFy-xHiNW-u256zj-bnazxS-2cXoQv6-2fvFyVH-Q3RGHx-ZGsdHS-KC7yZg-dj7kRx-4CXo8q-2dt8C4w-2jd4StF-u2d6hZ-27Y4uh2-5xMrCC-Ri2xvp-5QBkVa-5EDffe-2gwGoWD-9XQd2t-9XT5VW-27Y4tdt-EZTrgW-KX2Qi2-QHfqhu-4nbEJt-aKLEgg-oNBbMH-uEMXV-2ihDqrx-23JtwnR-mAJjh-ex94pT-AdK3Yz-c2yAkh-aKLEca-8rT585-8LgYn-5aaJBm" target="_blank">Flickr</a>');
    }

  },
  context: document.getElementById('story')
});

var waypoint5 = new Waypoint({
  element: document.getElementById('percy-rest'),
  handler: function(direction) {
    //$.notify('Percy rest waypoint triggered');
    if (direction == 'up') {
      var imageURL = 'https://cronkitenews.azpbs.org/wp-content/uploads/2020/07/mlk-5.jpg';
      $('.slideshow .bottom').fadeOut();
      $('.slideshow .top').css("background-image", "url(" + imageURL + ")").delay(300).fadeIn();
      $('.slideshow .top').find('.photo-credit').html('<a href="https://www.flickr.com/photos/bswise_/49551058501/in/photolist-2iuE8mR-2ihMWTY-QHdrqA-xGC3V-2ihM6tq-R4UzTE-2iG5YF8-2ekRzoe-2ihRgn1-aLXTrr-bnazFy-xHiNW-u256zj-bnazxS-2cXoQv6-2fvFyVH-Q3RGHx-ZGsdHS-KC7yZg-dj7kRx-4CXo8q-2dt8C4w-2jd4StF-u2d6hZ-27Y4uh2-5xMrCC-Ri2xvp-5QBkVa-5EDffe-2gwGoWD-9XQd2t-9XT5VW-27Y4tdt-EZTrgW-KX2Qi2-QHfqhu-4nbEJt-aKLEgg-oNBbMH-uEMXV-2ihDqrx-23JtwnR-mAJjh-ex94pT-AdK3Yz-c2yAkh-aKLEca-8rT585-8LgYn-5aaJBm" target="_blank">Photo</a> by <a href="https://www.flickr.com/photos/bswise_/" target="_blank">bswise</a>/<a href="https://www.flickr.com/photos/bswise_/49551058501/in/photolist-2iuE8mR-2ihMWTY-QHdrqA-xGC3V-2ihM6tq-R4UzTE-2iG5YF8-2ekRzoe-2ihRgn1-aLXTrr-bnazFy-xHiNW-u256zj-bnazxS-2cXoQv6-2fvFyVH-Q3RGHx-ZGsdHS-KC7yZg-dj7kRx-4CXo8q-2dt8C4w-2jd4StF-u2d6hZ-27Y4uh2-5xMrCC-Ri2xvp-5QBkVa-5EDffe-2gwGoWD-9XQd2t-9XT5VW-27Y4tdt-EZTrgW-KX2Qi2-QHfqhu-4nbEJt-aKLEgg-oNBbMH-uEMXV-2ihDqrx-23JtwnR-mAJjh-ex94pT-AdK3Yz-c2yAkh-aKLEca-8rT585-8LgYn-5aaJBm" target="_blank">Flickr</a>');
    } else {
      var imageURL = 'https://cronkitenews.azpbs.org/wp-content/uploads/2020/07/mlk-3.jpg';
      $('.slideshow .top').fadeOut();
      $('.slideshow .bottom').css("background-image", "url(" + imageURL + ")").delay(300).fadeIn();
      $('.slideshow .bottom').find('.photo-credit').html('<a href="https://ccsearch.creativecommons.org/photos/daf67edc-4f34-4efc-99de-9882ba66ae8b" target="_blank">Photo</a> by <a href="https://www.flickr.com/photos/70414856@N00" target="_blank">Pictoscribe</a>/<a href="https://creativecommons.org/licenses/by-nc-nd/2.0/legalcode" target="_blank">Creative Commons</a>');
    }

  },
  context: document.getElementById('story')
});
