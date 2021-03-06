@if (!empty($enabledHeaderFilters) || !empty($enabledTaxonomyFilters))
    <form method="get" action="{{ $archiveUrl }}" class="c-archive-filter c-archive-filter--left js-submit-form" id="archive-filter">
        @if (isset($enabledTaxonomyFilters->highlighted) && !empty($enabledTaxonomyFilters->highlighted))
            @foreach ($enabledTaxonomyFilters->highlighted as $taxKey => $taxonomy)
                @if(count($taxonomy->values) > 1)
                    <ul>
                        <li class="highlighted-title"><h3>{{ $taxonomy->label }}</h3></li>
                            <ul class="nav nav-pills nav-horizontal nav-pills--badge">
                                @foreach ($taxonomy->values as $term)
                                    <li>
                                        <input id="segment-id-{{ $taxKey }}-{{ $term->slug }}" type="checkbox" name="filter[{{ $taxKey }}][]" value="{{ $term->slug }}" {{ checked(true, isset($_GET['filter'][$taxKey]) && is_array($_GET['filter'][$taxKey]) && in_array($term->slug, $_GET['filter'][$taxKey])) }}>
                                        <a>
                                            <label for="segment-id-{{ $taxKey }}-{{ $term->slug }}" class="checkbox inline-block">{{ $term->name }}</label>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                    </ul>
                @endif
            @endforeach
        @endif

        <div class="grid">
            @if (in_array('text_search', $enabledHeaderFilters))
            <div class="grid-sm-12 grid-md-auto">
                <label for="filter-keyword" class="text-sm sr-only"><strong><?php _e('Search', 'municipio'); ?>:</strong></label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input type="text" name="s" id="filter-keyword" class="form-control" value="{{ $searchQuery }}" placeholder="<?php _e('Search', 'municipio'); ?>">
                </div>
            </div>
            @endif

            @if (isset($enabledTaxonomyFilters->primary) && !empty($enabledTaxonomyFilters->primary))
                <div class="grid-sm-12">
                    <div class="u-elements">
                    @foreach ($enabledTaxonomyFilters->primary as $taxKey => $tax)
                        <section class="c-filter c-filter--{{ $taxKey }}">
                            <label for="filter-{{ $taxKey }}" class="text-sm sr-only">{{ $tax->label }}</label>
                            <header class="c-filter__heading">
                                <h4 class="c-filter__title"><?php printf(__('Select') . ' %s', $tax->label); ?></h4>
                            </header>
                            <div class="c-filter__options">
                                @if ($tax->type === 'single')
                                    @include('partials.archive-filters.select')
                                @else
                                    @include('partials.archive-filters.button-stack')
                                @endif
                            </div>
                        </section>
                    @endforeach
                    </div>
                </div>
            @endif

            @if($queryString)
                <div class="grid-sm-12 hidden-sm hidden-xs grid-md-fit-content">
                    <a class="btn btn-block pricon pricon-close pricon-space-right" href="{{ $archiveUrl }}"><?php _e('Clear filters', 'municipio'); ?></a>
                </div>
            @endif
            <div class="grid-sm-12 grid-md-fit-content">
                <input type="submit" value="<?php _e('Search', 'municipio'); ?>" class="btn btn-primary btn-block">
            </div>
        </div>

        @if (isset($enabledTaxonomyFilters->row) && !empty($enabledTaxonomyFilters->row))
            @foreach ($enabledTaxonomyFilters->row as $taxKey => $taxonomy)
                @if(count($taxonomy->values) > 1)
                    <div class="gutter gutter-top">
                        <div class="grid">
                            <div class="grid-xs-12">
                                <ul class="segmented-control">
                                    <li class="title">{{ $taxonomy->label }}:</li>
                                    @foreach ($taxonomy->values as $term)
                                        <li>
                                            <input id="segment-id-{{ $taxKey }}-{{ $term->slug }}" type="{{ $taxonomy->type === 'single' ? 'radio' : 'checkbox' }}" name="filter[{{ $taxKey }}][]" value="{{ $term->slug }}" {{ checked(true, isset($_GET['filter'][$taxKey]) && is_array($_GET['filter'][$taxKey]) && in_array($term->slug, $_GET['filter'][$taxKey])) }}>
                                            <label for="segment-id-{{ $taxKey }}-{{ $term->slug }}" class="checkbox inline-block">{{ $term->name }}</label>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @endif

        @if (isset($enabledTaxonomyFilters->folded) && !empty($enabledTaxonomyFilters->folded))
            <div class="gutter gutter-top" id="options" style="display: none;">
                <div class="grid" data-equal-container>
                    @foreach ($enabledTaxonomyFilters->folded as $taxKey => $taxonomy)
                        <div class="grid-md-4">
                            <div class="box box-panel box-panel-secondary" data-equal-item>
                                <h4 class="box-title">{{ $taxonomy->label }}</h4>
                                <div class="box-content">
                                    <?php $taxonomy->slug = $taxKey; $dropdown = \Municipio\Content\PostFilters::getMultiTaxDropdown($taxonomy, 0, 'list-hierarchical'); ?>
                                    {!! $dropdown !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        @if (isset($enabledTaxonomyFilters->folded) && !empty($enabledTaxonomyFilters->folded))
            <div class="grid no-margin gutter gutter-top gutter-sm">
                <div class="grid-xs-12">
                    <button type="button" data-toggle="#options" class="btn btn-plain pricon pricon-plus-o pricon-space-right" data-toggle-text="Visa färre sökalternativ…" data-toggle-class="btn btn-plain pricon pricon-minus-o pricon-space-right">Visa fler sökalternativ…</a>
                </div>
            </div>
        @endif
        <div class="c-archive-filter__loader">
            <div class="spinner spinner-dark"></div>
        </div>
    </form>
@endif
