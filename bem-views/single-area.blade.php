@extends('templates.single')
@section('content')
    @include('components.dynamic-sidebar', ['id' => 'content-area-top'])

    @while(have_posts())
        {!! the_post() !!}
        @section('loop')
            @include('partials.article')
        @show
    @endwhile

    @include('components.dynamic-sidebar', ['id' => 'content-area'])
@endsection
@section('sidebar-left')
@endsection
@section('sidebar-right')

    <div class="box">
        <img  class="box-image" src="{{ municipio_get_thumbnail_source(null, array(700,700)) }}" alt="{{ the_title() }}">
    </div>

    <!-- Region images -->
    @if(isset($images) && is_array($images) && !empty($images))
        <ul class="c-gallery c-gallery--sidebar u-mb-2">
            @foreach($images as $image)
                <li class="c-gallery__item">
                    <a class="box lightbox-trigger c-gallery__box" href="{{$image['large']}}">
                        <img alt="{{$image['caption']}}" src="{{$image['thumbnail']}}"/>
                    </a>
                </li>
            @endforeach
        </ul>
    @endif

    @if(isset($links) && is_array($links) && !empty($links))
        <div class="btn-group btn-stack">
            @foreach($links as $linkItem)
                <a href="{{$linkItem['link_url']}}" class="btn btn-primary btn-block">{{$linkItem['link_label']}}</a>
            @endforeach
        </div>
    @endif

@endsection
@section('below')
<div class="grid">
            <div class="grid-xs-12">
                <div class="box">
                    <div class="grid no-margin">
                        <!-- Map -->
                        @if(isset($location) && is_array($location) && isset($location['address']))
                        <div class="grid-lg-4 no-margin no-padding">
                            <div class="box-content no-padding">
                            <div class="area-map c-area-map t-area-map ratio-1-1">
                                <div id="areaMap" class="ratio-1-1" style="position: absolute; top: 0; right: 0; bottom: 0; left: 0"></div>
                                <script>
                                  function areaInitMap() {
                                    var map = new google.maps.Map(document.getElementById('areaMap'), {
                                      zoom: 11,
                                      center: {lat: {{$location['lat']}}, lng: {{$location['lng']}}},
                                      disableDefaultUI: true
                                    });

                                    var marker = new google.maps.Marker({
                                      position: {lat: {{$location['lat']}}, lng: {{$location['lng']}}},
                                      map: map,
                                      title: '!'
                                    });

                                  }
                                </script>
                                <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBcTrRdDFsoCu3bNbfBMU5Me1-9iqChOM8&callback=areaInitMap"></script>
                            </div>
                            </div>
                        </div>
                        @endif

                        <!-- Metadata -->
                        @if(isset($facts['metadata']) && is_array($facts['metadata']) && !empty($facts['metadata']))
                            <div class="grid-lg-4 no-margin">
                                <div class="box-content">
                                    <h4 class="box-title">Fakta</h4>
                                    <ul class="unordered-list">
                                        @foreach($facts['metadata'] as $metaItem)
                                            <li class="area-metadata-list area-metadata-list-{{ $metaItem['area_heading']['value'] }} c-area-metadata-list t-area-metadata-list">
                                                <!-- Heading -->
                                                @if(isset($metaItem['area_heading']) && !empty($metaItem['area_heading']) && is_array($metaItem['area_heading']))
                                                    <strong class="area-heading c-area-heading t-area-heading">{{ $metaItem['area_heading']['label'] }}: </strong>
                                                @endif

                                                <!-- Area information -->
                                                @if(isset($metaItem['area_information']) && !empty($metaItem['area_information']))
                                                    <span class="area-information c-area-information t-area-information">{{ $metaItem['area_information'] }}</span>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif

                        <!-- General -->
                        @if(isset($facts['general']) && !empty($facts['general']))
                            <div class="grid-lg-4 no-margin no-padding">
                                <div class="box-content">
                                    <h4 class="box-title">Om <?php the_title(); ?></h4>
                                    <p>
                                        {{ $facts['general'] }}
                                    </p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

       @include('components.dynamic-sidebar', ['id' => 'content-area-bottom'])
@endsection
