@extends('templates.master')

@section('content')
    <div class="container main-container">
        <div class="grid">
            <div class="grid-md-12">
                <h1><?php _e('Authors', 'familjen-hbg'); ?></h1>
            </div>
        </div>
        <div class="grid">
            <?php $i = 1; ?>
            @foreach ($authors as $author)
            <?php $i++; if ($i > 5) $i = 1; ?>
            <div class="grid-md-3">
                <a href="{{ get_author_posts_url($author->ID) }}" class="box box-filled box-filled-{{ $i }} box-author">
                    @if (get_the_author_meta('user_profile_picture', $author->ID))
                    <img src="{{ get_the_author_meta('user_profile_picture', $author->ID) }}" alt="{{ municipio_get_author_full_name($author->ID) }}" class="box-image">
                    @else
                    <figure class="box-image image-placeholder" style="width: 150px;height: 150px;padding-bottom: 0;color: #000;"></figure>
                    @endif

                    <div class="box-content">
                        <div class="author-name">{{ municipio_get_author_full_name($author->ID) }}</div>

                        @if (get_the_author_meta('description', $author->ID))
                        <div class="author-description">{{ get_the_author_meta('description', $author->ID) }}</div>
                        @endif
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
@stop
