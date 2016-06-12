 /*!
  * Author: Russell Gordon for tryl.es
  * Code licensed under the Apache License v2.0.
  * For details, see http://www.apache.org/licenses/LICENSE-2.0.
  */

  $(window).load(function() {
        
    if ( $('#loader_wrap').length > 0 ) {
        setTimeout(function() {
            $('#loader_wrap').fadeOut(600);
        }, 1000);
    }
    
});

$(document).ready(function() {

     $(".scroll").click(function(event) {
         event.preventDefault();
         var full_url = this.href;
         var parts = full_url.split("#");
         var trgt = parts[1];
         var target_offset = $("#" + trgt).offset();
         var target_top = target_offset.top;

         $('html, body').animate({
             scrollTop: target_top
         }, 500);
     });

     var deleteLog = false;
   
     $('#pagepiling').pagepiling({
         menu: '#menu',
         // anchors: [],
         navigation: false,
         // anchors: ['page1', 'page2'],
         easingcss3: 'ease-in-out',
         sectionsColor: ['#bfda00', '#2ebe21'],
         onLeave: function(index, nextIndex, direction){
             if(deleteLog){
                 //$('#callbacksDiv').html('');
             }
             //$('#callbacksDiv').append('<p>onLeave - index:' + index + ' nextIndex:' + nextIndex + ' direction:' + direction + '</p>')
         },
         afterRender: function(){
             //$('#callbacksDiv').append('<p>afterRender</p>');
         },
         afterLoad: function(anchorLink, index){
             //$('#callbacksDiv').append('<p>afterLoad - anchorLink:' + anchorLink + " index:" + index + '</p>');

             //section 2
             if(index == 2){
                 //moving the image
                 $('#section2').find('.intro').delay(100).animate({
                     left: '0%'
                 }, 1500, 'easeOutExpo', function(){
                     $('#section2').find('img').first().fadeIn(700, function(){
                         // $('#section2').find('p').last().fadeIn(600);
                     });
                 });


             }

             deleteLog = true;
         }
     });

     $( "#next" ).on( "click", function(e) {
        e.preventDefault;
        $.fn.pagepiling.moveSectionDown();
     });

     $( "#prev" ).on( "click", function(e) {
        e.preventDefault;
        $.fn.pagepiling.moveSectionUp();
     });

 });
   
var feed = new Instafeed({
    get: 'user',
    userId: '1520017546',
    accessToken: '1520017546.1677ed0.cd4a2fa0d9704b6f9e96840fc462d8f1',
    // tagName: 'catsofinstagram',
    limit: 10,
    clientId: '90220446068b4fc181e694d9e27cf0de',
    template: '<img src="{{image}}" />',
    resolution: 'standard_resolution',
    after: function() {
        var flkty = new Flickity( '.insta-gallery', {
          wrapAround: true, 
          freeScroll: true, 
          autoPlay: true, 
          imagesLoaded: true, 
          pageDots: false 
        });
    }
});
feed.run();

// Map
var map;
var franklin = new google.maps.LatLng(49.2820875,-123.0734622);
var workshop = new google.maps.LatLng(49.2820875,-123.0734622);

var MY_MAPTYPE_ID = 'custom_style';

function initialize() {

    var featureOpts = [{
        "stylers": [{
            "saturation": -100
        }, {
            "lightness": -5
        }]
    }];

    var mapOptions = {
        zoom: 17,
        center: franklin,
        mapTypeControl: false,
        scrollwheel: false,
        zoomControl: true,
        zoomControlOptions: {
            position: google.maps.ControlPosition.RIGHT_TOP
        },
        streetViewControl: true,
        streetViewControlOptions: {
            position: google.maps.ControlPosition.RIGHT_TOP
        },
        mapTypeId: MY_MAPTYPE_ID
    };

    map = new google.maps.Map(document.getElementById('map-canvas'),
        mapOptions);

    var customMapType = new google.maps.StyledMapType(featureOpts);

    var contentString =
        '<div id="label">' +
        '<ul>' +
        '<li>The Workshop</li>' +
        '<li>1654 Franklin Street</li>' +
        '<li>Vancouver BC V5L 1P4</li>' +
        '<li style="padding-top: 10px;"><a href="tel:+16046841999">604–684–1999</a></li>' +
        '</ul>' +
        '</div>';

    var infowindow = new google.maps.InfoWindow({
        content: contentString
    });

    var icon = {
        path: "M0-165c-27.618 0-50 21.966-50 49.054C-50-88.849 0 0 0 0s50-88.849 50-115.946C50-143.034 27.605-165 0-165z",
        fillColor: '#c21f31',
        fillOpacity: .8,
        anchor: new google.maps.Point(0, 0),
        strokeWeight: 0,
        scale: 1 / 4
    }

    var marker = new google.maps.Marker({
        position: workshop,
        map: map,
        draggable: false,
        icon: icon,
        title: 'The Workshop Custom Gilding'
    });

    /*var circle = new google.maps.Circle({
        strokeColor: '#c21f31',
        strokeOpacity: 0.5,
        strokeWeight: 2,
        fillColor: '#c21f31',
        fillOpacity: 0.15,
        map: map,
        center: workshop,
        radius: 160
    });*/

    google.maps.event.addListener(marker, 'click', function() {
        infowindow.open(map, marker);
    });

    map.mapTypes.set(MY_MAPTYPE_ID, customMapType);
}

google.maps.event.addDomListener(window, 'load', initialize);

google.maps.event.addDomListener(window, "resize", function() {

    var center = map.getCenter();
    google.maps.event.trigger(map, "resize");
    map.setCenter(center);
});