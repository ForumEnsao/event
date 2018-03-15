    
    //GOOGLE MAPS
          
    // Creating a LatLng object containing the coordinate for the center of the map
    var latlng = new google.maps.LatLng(34.650506, -1.896863);
      
    // Creating an object literal containing the properties we want to pass to the map  
    var options = {  
        zoom: 16, // This number can be set to define the initial zoom level of the map
        center: latlng,
        scrollwheel: false,
        styles: [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}],
        mapTypeId: google.maps.MapTypeId.ROADMAP, // This value can be set to define the map type ROADMAP/SATELLITE/HYBRID/TERRAIN
        disableDefaultUI: true
    };  
    // Calling the constructor, thereby initializing the map  
    var map = new google.maps.Map(document.getElementById('gmap_canvas'), options);  
    
    // Define Marker properties
    var image = new google.maps.MarkerImage('img/map-logo.png',
        // This marker is 129 pixels wide by 42 pixels tall.
        new google.maps.Size(125, 75),
        // The origin for this image is 0,0.
        new google.maps.Point(0,0),
        // The anchor for this image is the base of the flagpole at 18,42.
        new google.maps.Point(18, 42)
    );
    
    // Add Marker
    var marker1 = new google.maps.Marker({
        position: new google.maps.LatLng(34.650506, -1.896863), 
        map: map,       
        icon: image // This path is the custom pin to be shown. Remove this line and the proceeding comma to use default pin
    }); 
    
    // Add listener for a click on the pin
    google.maps.event.addListener(marker1, 'click', function() {  
        infowindow1.open(map, marker1);  
    });
        
    // Add information window
    var infowindow1 = new google.maps.InfoWindow({  
        content:  createInfo('Ensao', 'Universite Mohammed premier,<br />Oujda<br />')
    }); 
    
    // Create information window
    function createInfo(title, content) {
        return '<div class="infowindow"><h4>'+ title +'</h4>'+content+'</div>';
    } 

});
