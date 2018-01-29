<?php do_action('customer-feedback'); ?>

<footer class="page-footer">
    @if (get_field('post_show_share', get_the_id()) !== false && get_field('page_show_share', 'option') !== false)
    <div class="grid">
        <div class="grid-xs-8">
            @include('partials.social-share')
        </div>
        <div class="grid-xs-4 text-right">
            <a href="#customer-feedback" class="btn btn-lg btn-outline btn-primary"><?php _e("Submit feedback on this page", 'familjen-hbg'); ?></a>
        </div>
    </div>
    @endif

    <div class="grid">
        <div class="grid-xs-12">
            @include('partials.timestamps')
        </div>
    </div>
</footer>
