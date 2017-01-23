@extends('templates.master')

@section('content')
    <div class="container main-container">
        <div class="grid">
            @foreach ($authors as $author)
            <div class="grid-md-3">
                <a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" class="box box-filled box-author">
                    <img src="{{ get_the_author_meta('user_profile_picture', $author->ID) }}" alt="{{ get_the_author_meta('nicename', $author->ID) }}" class="box-image">

                    <div class="box-content">
                        <div class="author-name">{{ municipio_get_author_full_name($author->ID) }}</div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
@stop
