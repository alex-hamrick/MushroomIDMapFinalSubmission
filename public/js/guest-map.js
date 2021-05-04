  /**
   * Create new map
   */
  var infowindow;
  var currentWindow = null;
  var map;
  var red_icon =  '../images/red-mushroom2.png' ;
  var purple_icon =  '../images/purple-mushroom2.png' ;

  var myOptions = {
      zoom: 7,
      center: new google.maps.LatLng(35.5713, -82.5535),

      mapTypeId: 'roadmap'
  };
  map = new google.maps.Map(document.getElementById('map'), myOptions);

  /**
   * Global marker object that holds all markers.
   * @type {Object.<string, google.maps.LatLng>}
   */
  var markers = [];

  /**
   * Concatenates given lat and lng with an underscore and returns it.
   * This id will be used as a key of marker to cache the marker in markers object.
   * 
   * @param {number} lat Latitude.
   * @param {number} lng Longitude.
   * @return {string} Concatenated marker id.
   */
  var getMarkerUniqueId= function(lat, lng) {
      return lat + '_' + lng;
  };

  /**
   * Creates an instance of google.maps.LatLng by given lat and lng values and returns it.
   * This function can be useful for getting new coordinates quickly.
   * @param {!number} lat Latitude.
   * @param {!number} lng Longitude.
   * @return {google.maps.LatLng} An instance of google.maps.LatLng object
   */
  var getLatLng = function(lat, lng) {
      return new google.maps.LatLng(lat, lng);
  };


  /**
   * Binds  click event to given marker and invokes a callback function that will remove the marker from map.
   * 
   * @param {google.maps.Marker} marker - A google.maps.Marker instance that the handler will binded.
   *                                     
   */
  var bindMarkerinfo = function(marker) {
      google.maps.event.addListener(marker, "click", function (point) {
          var markerId = getMarkerUniqueId(point.latLng.lat(), point.latLng.lng()); // get marker id by using clicked point's coordinate
          var marker = markers[markerId]; // find marker
          infowindow = new google.maps.InfoWindow();
          infowindow.setContent(marker.html);

          infowindow.open(map, marker);


          // removeMarker(marker, markerId); // remove it
      });
  };

  /**
   * Binds right click event to given marker and invokes a callback function that will remove the marker from map.
   * 
   * @param {google.maps.Marker} marker - A google.maps.Marker instance that the handler will binded.
   *                                      
   */
  var bindMarkerEvents = function(marker) {
      google.maps.event.addListener(marker, "rightclick", function (point) {
          var markerId = getMarkerUniqueId(point.latLng.lat(), point.latLng.lng()); // get marker id by using clicked point's coordinate
          var marker = markers[markerId]; // find marker
          removeMarker(marker, markerId); // remove it
      });
  };

  /**
   * Removes given marker from map.
   * 
   * @param {google.maps.Marker} marker - A google.maps.Marker instance that will be removed.
   * @param {string} markerId - Id of marker.
   */
  var removeMarker = function(marker, markerId) {
      marker.setMap(null); // set markers setMap to null to remove it from map
      delete markers[markerId]; // delete marker instance from markers object
  };


  /**
   * loop through (Mysql) dynamic locations to add markers to map.
   */
  var i ; var confirmed = 0;
  for (i = 0; i < locations.length; i++) {
      marker = new google.maps.Marker({
          position: new google.maps.LatLng(locations[i][1], locations[i][2]),
          map: map,
          icon :   locations[i][4] >0 ?  red_icon  : purple_icon,
          html:"<div class='map1' id='guest-IW'>\n" +                
                "<div id='item-1-guest'><button class='left-arrow' onclick='plusDivs(-1)'>&#10094;</button>" +
                "<button class='right-arrow' onclick='plusDivs(+1)'>&#10095;</button></div>" +
                "<div id='item-2-guest'><img class='mySlides confirmInfoWindow' id='image1' src='../images/" +locations[i][7]+"' alt='First image of mushroom'/>"+
                "<img class='mySlides confirmInfoWindow' id='image2'  src='../images/" +locations[i][8]+"' style='display: none;' alt='Second image of mushroom'/></div>"+
                "<div id='item-3-guest'><h4 class='mush-head' class='infoWindowDesc'>Description:</h4>\n" +
                "<span id='manual_description'>"+locations[i][3]+"</span></div>\n" +
                "<div id='item-4-guest'><h4 class='mush-head'>Date Found: </h4><span id='dateFoundSub'>"+locations[i][9]+"</span></div>" +
                "<div id='item-5-guest'><h4 class='mush-head'>Scientific Name: </h4><span id='guestFieldName'>" +locations[i][5]+" </span></div>" +
                "<div id='item-6-guest'><h4 class='mush-head'>Common Name:</h4><span id='guestFieldName'> "+locations[i][6]+"</span></div>" +
                "</div>"
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
          return function() {
            console.log(locations[i][5]);
            if (currentWindow !=null)
            {
              currentWindow.close();
            }
              infowindow = new google.maps.InfoWindow();
              currentWindow=infowindow;
              confirmed =  locations[i][4] >0 ?  'checked'  :  0;
              $("#confirmed").prop(confirmed,locations[i][4]);
              $("#id").val(locations[i][0]);
              $("#description").val(locations[i][5]+"<br/>"+locations[i][3]);
              $("#image1").attr("src","../images/" +locations[i][7]);
              $("#image2").attr("src","../images/" +locations[i][8]);   
              $("#dateFoundSub").text(locations[i][9]);
              $("#form").show();
              infowindow.setContent(marker.html);
              infowindow.open(map, marker);
          }
      })(marker, i));
  }
