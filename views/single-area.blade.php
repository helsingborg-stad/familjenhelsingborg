@extends('templates.master')

@section('content')

<div class="container main-container">

    @include('partials.breadcrumbs')

    <div class="blehe grid {{ implode(' ', apply_filters('Municipio/Page/MainGrid/Classes', wp_get_post_parent_id(get_the_id()) != 0 ? array('no-margin-top') : array())) }}">
        @include('partials.sidebar-left')

        <div class="grid-md-8 grid-lg-6 grid-print-12 grid-print-12" id="readspeaker-read">

            @if (is_active_sidebar('content-area-top'))
                <div class="grid sidebar-content-area sidebar-content-area-top">
                    <?php dynamic_sidebar('content-area-top'); ?>
                </div>
            @endif

            @while(have_posts())
                {!! the_post() !!}

                @include('partials.article')

                <!-- External links -->
                @if(isset($links) && is_array($links) && !empty($links))
                    <div class="grid">
                        <div class="grid-xs-12">
                            <h3 class="read-more-about-this">{{$language['readmore']}}</h3>
                            <ul class="area-link-list">
                                @foreach($links as $linkItem)
                                    <li class="{{sanitize_title($linkItem['link_label'])}} inline-block">
                                        <a class="btn btn-md btn-primary" href="{{$linkItem['link_url']}}">
                                            <span class="link-item link-item-outbound">{{$linkItem['link_label']}}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

            @endwhile

            @if (is_active_sidebar('content-area'))
                <div class="grid sidebar-content-area sidebar-content-area-bottom">
                    <?php dynamic_sidebar('content-area'); ?>
                </div>
            @endif

            <div class="hidden-xs hidden-sm hidden-md hidden-print">
                @include('partials.page-footer')
            </div>
        </div>

        <aside class="grid-lg-3 grid-md-12 sidebar-right-sidebar hidden-xs hidden-sm hidden-md">
            <div class="grid">

                <!-- Region images -->
                @if(isset($images) && is_array($images) && !empty($images))
                    <ul class="image-gallery grid grid-gallery">
                        @foreach($images as $image)
                            <li class="grid-md-6">
                                <a class="box lightbox-trigger" href="{{$image['large']}}">
                                    <img alt="{{$image['caption']}}" src="{{$image['thumbnail']}}"/>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif

                <!-- Facts -->
                @if(isset($facts))

                    <!-- General -->
                    @if(isset($facts['general']) && !empty($facts['general']))
                        {{ $facts['general'] }}
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
                        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBcTrRdDFsoCu3bNbfBMU5Me1-9iqChOM8&callback=areaInitMap">
                    </div>
                @endif

            </div>
        </aside>

    </div>

    <div class="grid hidden-lg hidden-xl">
        <div class="grid-sm-12">
            @include('partials.page-footer')
        </div>
    </div>
</div>

@stop
