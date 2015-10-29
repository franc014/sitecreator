<?php
$resume = $data["resume"];
$metaInfo = $data["page_meta_info"];
$icon_item_list = '&#xe711;';

if($resume!=null){
    $experiences = $resume->experiences;
    $educations = $resume->educations;
    $skills = $resume->skills;
    $languages = $resume->languages;
    $interests = $resume->interests;
}
?>
@extends('themes.genesis.layout.app')
@include('themes.genesis.partials._header_meta_tags')
@section('page_title')
    <h1 data-icon="&#xe671">Résumé</h1>
@endsection
@section('content_intro')
    <p>
       Información profesional y habilidades
    </p>
@endsection
@section('content')


    <div class="container-fluid site-container">
        <div class="row" style="padding: 60px">
            @if($resume ===null)
                @include("themes.genesis.partials.alerts.no_items")
            @else
            <div class="col-sm-8 col-md-8">
                <ul class="media-list">
                    <section id="experience">
                    @include("themes.genesis.resume.partials.experiences")
                    </section>
                    <section id="education">
                    @include("themes.genesis.resume.partials.educations")
                    </section>
                    <section id="skills">
                    @include("themes.genesis.resume.partials.skills")
                    </section>
                    <section id="languages">
                    @include("themes.genesis.resume.partials.languages")
                    </section>
                    <section id="interests">
                    @include("themes.genesis.resume.partials.interests")
                    </section>

                </ul>
            </div>

            <div class="col-sm-4 col-md-4">
                <section style="padding: 15px">
                    @include("themes.genesis.resume.resume_menu")
                </section>
            </div>
            @endif
        </div>
    </div>


@endsection