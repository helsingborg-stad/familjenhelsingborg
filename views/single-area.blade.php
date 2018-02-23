@extends('templates.master')

@section('content')
<div class="u-block has-elements u-no-padding-top">
<div class="container u-elements">

    @include('partials.breadcrumbs')

    <div class="grid {{ implode(' ', apply_filters('Municipio/Page/MainGrid/Classes', wp_get_post_parent_id(get_the_id()) != 0 ? array('no-margin-top') : array())) }}">

        <div class="grid-lg-7 grid-sm-12 grid-xs-12 grid-print-12" id="readspeaker-read">
            @if (is_active_sidebar('content-area-top'))
                <div class="grid sidebar-content-area sidebar-content-area-top">
                    <?php dynamic_sidebar('content-area-top'); ?>
                </div>
            @endif

            @while(have_posts())
                {!! the_post() !!}

                @include('partials.article')

            @endwhile

            @if (is_active_sidebar('content-area'))
                <div class="grid sidebar-content-area sidebar-content-area-bottom">
                    <?php dynamic_sidebar('content-area'); ?>
                </div>
            @endif

            @include('partials.page-footer')
        </div>

        <aside class="grid-lg-5 grid-sm-12 grid-xs-12 grid-print-12 sidebar-right-sidebar s-secondary-content">
                <div class="box">
                <!-- Map -->
                @if(isset($location) && is_array($location) && isset($location['address']))
                    <div class="area-map c-area-map t-area-map ratio-4-3">
                        <div id="areaMap" class="ratio-4-3" style="position: absolute; top: 0; right: 0; bottom: 0; left: 0"></div>
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
                @endif

                <div class="box-content">
                <h4 class="box-title">Om {{the_title()}}</h4>
                <!-- Facts -->
                @if(isset($facts))

                    <!-- General -->
                    @if(isset($facts['general']) && !empty($facts['general']))
                        <div>
                            {{ $facts['general'] }}
                        </div>
                    @endif

                    <!-- Metadata -->
                    @if(isset($facts['metadata']) && is_array($facts['metadata']) && !empty($facts['metadata']))
                        <ul>
                            @foreach($facts['metadata'] as $metaItem)
                                <li class="area-metadata-list area-metadata-list-{{ $metaItem['area_heading']['value'] }} c-area-metadata-list t-area-metadata-list">
                                    <!-- Heading -->
                                    @if(isset($metaItem['area_heading']) && !empty($metaItem['area_heading']) && is_array($metaItem['area_heading']))
                                        <span class="area-heading c-area-heading t-area-heading">{{ $metaItem['area_heading']['label'] }}</span>
                                    @endif

                                    <!-- Area information -->
                                    @if(isset($metaItem['area_information']) && !empty($metaItem['area_information']))
                                        <span class="area-information c-area-information t-area-information">{{ $metaItem['area_information'] }}</span>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @endif
                @endif

                    @if(isset($links) && is_array($links) && !empty($links))
                        <div class="btn-group btn-stack">
                            @foreach($links as $linkItem)
                                <a href="{{$linkItem['link_url']}}" class="btn btn-primary btn-block">{{$linkItem['link_label']}}</a>
                            @endforeach
                        </div>
                    @endif
                </div>


                </div>

                <!-- Region images -->
                @if(isset($images) && is_array($images) && !empty($images))
                    <ul class="c-gallery c-gallery--sidebar">
                        @foreach($images as $image)
                            <li class="c-gallery__item">
                                <a class="box lightbox-trigger c-gallery__box" href="{{$image['large']}}">
                                    <img alt="{{$image['caption']}}" src="{{$image['thumbnail']}}"/>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
        </aside>
    </div>
</div>
</div>
@stop
