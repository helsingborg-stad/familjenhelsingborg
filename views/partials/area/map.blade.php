@if(isset($data) && is_array($data) && !empty($data))
    <div class="area-map c-area-map t-area-map ratio-4-3">
        <div id="areaMap" class="ratio-4-3" style="position: absolute; top: 0; right: 0; bottom: 0; left: 0"></div>
        <script>
          function areaInitMap() {
            var map = new google.maps.Map(document.getElementById('areaMap'), {
              zoom: 11,
              center: {lat: {{$center['lat']}}, lng: {{$center['lng']}}},
              disableDefaultUI: false
            });

            @foreach($data as $point)
              new google.maps.Marker({
                position: {lat: {{$point['geo']['lat']}}, lng: {{$point['geo']['lng']}}},
                map: map,
                title: '{{ $point['location'] }}'
              });
            @endforeach

          }
        </script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBcTrRdDFsoCu3bNbfBMU5Me1-9iqChOM8&callback=areaInitMap">
    </div>
@endif
