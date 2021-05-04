    var map;
    var marker;
    var infowindow;
    var red_icon =  '../images/red-mushroom2.png' ;
    var purple_icon =  '../images/purple-mushroom2.png' ;
  
    

    /**
     * Creates map and adds all location
     */  
    function initMap() {
        var asheville = {lat: 35.5713, lng: -82.5535};
        infowindow = new google.maps.InfoWindow();
        map = new google.maps.Map(document.getElementById('map'), {
            center: asheville,
            zoom: 10
        });


        var i ; var confirmed = 0;
        for (i = 0; i < locations.length; i++) {

            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                map: map,
                icon :   locations[i][4] > 0 ?  red_icon  : purple_icon,
                html: document.getElementById('form')
            });

            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    confirmed =  locations[i][4] >0 ?  'checked'  :  0;
                    $("#confirmed").prop(confirmed,locations[i][4]);
                    $("#id").val(locations[i][0]);
                    $("#description").html(locations[i][3]);
                    $("#image1").attr("src","../images/" +locations[i][5]);
                    $("#image2").attr("src","../images/" +locations[i][6]);
                    $("#dateFoundSub").html(locations[i][7]);
                    $("#form").show();
                    infowindow.setContent(marker.html);
                    infowindow.open(map, marker);
                }
            })(marker, i));
        }
    }

    /**
     * Saves data input from form and updates database
     */
    function saveData() {
        var confirmed = document.getElementById('mushroomList').value;//'.checked ? 1 : 0;
      
        var id = document.getElementById('id').value;
        var url = 'locations_model.php?confirm_location&id=' + id + '&confirmed=' + confirmed ;
        downloadUrl(url, function(data, responseCode) {
            if (responseCode === 200  && data.length > 1) {
              
                infowindow.close();
                window.location.reload(true);
            }else{
                infowindow.setContent("<div class='setContentAdmin'>Inserting Errors</div>");
            }
        });
    }

    /**
     * Function that sends request to database to update
     * 
     * @param {string} url      Url created to update database
     * @param {string} callback message returned if update is successful or failed
     */
    function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
            if (request.readyState == 4) {
                callback(request.responseText, request.status);
            }
        };

        request.open('GET', url, true);
        request.send(null);
    }
