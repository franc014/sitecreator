@extends('themes.genesis.layout.app')
<?php
    $project = $data["project"];
?>
@section('page_title_window'){{$project->title}}@endsection
@section('page_description'){{str_limit(strip_tags($project->description),160,"")}}@endsection
@section('page_title')
    <h1 data-icon="&#xe6ae">Proyecto: {{--$project->title--}}</h1>
@endsection
@section('content_intro')

    <p >
         {!!str_limit($project->description,20,"...")!!}
    </p>
@endsection

@section('content')
    <?php
    $isDedicated = Config::get("app_parametters.isDedicated");
    ?>
    @include('themes.genesis.portfolio._detail.characteristics')
    @include('themes.genesis.portfolio._detail.other_projects')
    <div class="container-fluid form-container-option-one" id="contact-form">
        <div class="row">
            <div class="col-sm-9 col-md-9 form-content-section">
                @include("themes.genesis.partials.contact_info._contact_form")
            </div>
        </div>
    </div>


@endsection