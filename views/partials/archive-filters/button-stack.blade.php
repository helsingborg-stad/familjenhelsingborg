<?php $tax->slug = $taxKey; $dropdown = \Municipio\Content\PostFilters::getFilterOptionsByTax($tax, 0, 'c-check-buttons c-check-buttons--stack c-check-buttons--'. $taxKey); ?>
    {!! $dropdown !!}


