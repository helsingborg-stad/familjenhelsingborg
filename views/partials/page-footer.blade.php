<?php do_action('customer-feedback'); ?>

<footer class="page-footer">
    @if (get_field('post_show_share', get_the_id()) !== false && get_field('page_show_share', 'option') !== false)
    <div class="grid">
        <div class="grid-xs-6">
            @include('partials.social-share')
        </div>
        <div class="grid-xs-6 text-right">
            @if(!empty(get_the_content()))
            <a href="#customer-feedback" class="btn btn-lg btn-outline btn-primary" onclick="jQuery(this).toggleClass(\'is-open\');"><?php _e("Submit feedback on this page", 'familjen-hbg'); ?></a>
            @endif
        </div>
    </div>
    @endif

    <div class="grid">
        <div class="grid-xs-12">
            @include('partials.timestamps')
        </div>
    </div>
</footer>
