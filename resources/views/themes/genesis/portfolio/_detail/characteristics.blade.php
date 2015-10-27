<?php
$gallery = $data["gallery"];
?>
<div class="container-fluid service-main-details" id="characteristics">
    <div class="row">

        <div class="col-sm-7 col-md-7 service-description">
            <h1>
                {{$project->title}}

            </h1>


            <div class="saleable-labeling">
                @if(!$project->categories->isEmpty())
                    @foreach($project->categories as $category)
                        <span class="label label-producto" style="background-color: {{$category->labelcolor}}">{{$category->name}}</span>
                    @endforeach
                @endif

                <span>@include('themes.genesis.portfolio._detail.partials._section_nav')</span>
            </div>

            <div class="project-body-description">
                {!! $project->description !!}

            </div>

            <br>

            <div>
                <a href="#contact-form" class="btn btn-success btn-lg " data-icon="&#xe645" href="#">Dejar un
                    comentario</a>
                @include('themes.genesis.partials.share_links')
            </div>
        </div>

        <div class="col-sm-5 col-md-5 targets">
            <img class="img-responsive thumbnail" src="{{$project->photo['cloudpath']}}">
        </div>

    </div>

    {{--<div class="row ">
        <div class="col-sm-12 service-content">
            @if(!$gallery->isEmpty())
                <div id="links">


                @foreach($gallery as $image)
                    --}}{{--<a href="{{$image->cloudpath}}" class="lighterbox">
                        <img src="{{$image->cloudpath}}" />

                    </a>--}}{{--
                    <a href="{{$image->cloudpath}}" title="Banana" data-gallery>
                        <img src="{{$image->cloudpath}}" alt="Banana">
                    </a>
                    @endforeach

                </div>
            @endif
        </div>
    </div>--}}
    <hr class="separator">
    <div class="row portfolio-gallery-container">
        <div class="col-sm-12 service-content" id="project-gallery">
            @if(!$gallery->isEmpty())
                <h3>Más sobre este trabajo en imágenes</h3>
                @foreach(array_chunk($gallery->all(), 3) as $row)
                    <div class="row " id="links">
                        @foreach($row as $image)
                            <div class="col-sm-4 ">
                                <a href="{{$image->cloudpath}}" data-gallery class="thumbnail box overlay red">
                                    <img src="{{$image->cloudpath}}" class="img-responsive ">
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row ">
        <div class="col-sm-12 service-content">
            <div class="form-content animate-show" ng-show="showContactForm">
                @include("themes.genesis.partials.contact_info._contact_form")
            </div>
        </div>
    </div>

</div>
@include("themes.genesis.portfolio.partials.bootsgallerysnippet")

