@if(isset($data) && is_array($data) && !empty($data))
    <script>
      var jsonPlots = {!!json_encode($data)!!}
    </script>
    <div class="grid-xs-12">
      <div class="area-map c-area-map t-area-map">
          <div id="areaMap" style="height: 300px;"></div>
          <script>
            function areaInitMap() {
              var map;
              var infoWindow = new google.maps.InfoWindow(), marker, item;

              //Create new map
              map = new google.maps.Map(document.getElementById('areaMap'), {
                zoom: 9,
                center: {lat: {{$center['lat']}}, lng: {{$center['lng']}}},
                disableDefaultUI: false
              });

              for(var item in jsonPlots) {

                //Get details about pin
                lat   = jsonPlots[item].geo.lat;
                lng   = jsonPlots[item].geo.lng;
                name  = jsonPlots[item].location;
                info  = jsonPlots[item].excerpt;
                link  = jsonPlots[item].permalink;

                //Create new marker
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(lat,lng),
                    name: name,
                    map: map
                });

                //Add infowindow trigger
                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                  return function() {
                      infoWindow.setContent(
                        '<div class="info_content">' +
                        '<h3>' + name + '</h3>' +
                        '<p>' + info + '</p>' +
                        '<br><a target="_top" class="btn btn-md btn-primary" href="' + link + '"><?php _e("Read more about ", 'familjen-hbg') ?> ' + name + '</a>' +
                        '</div>'
                      );
                      infoWindow.open(map, marker);
                  }
                })(marker, item));

              }
            }
          </script>
          <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBcTrRdDFsoCu3bNbfBMU5Me1-9iqChOM8&callback=areaInitMap">
      </div>
    </div>
@endif
