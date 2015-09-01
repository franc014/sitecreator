<?php
    $cats = $data['portfoliocategories'];
?>

@if(!$cats->isEmpty())
    <div class="row cat-filters">
        <div class="col-sm-12 col-md-12">
    @foreach($cats as $cat)
        <a href="" class="btn btn-default filter cat-filter" data-filter=".category-{{$cat->id}}">{{$cat->name}}</a>
    @endforeach
        </div>
    </div>
@endif
