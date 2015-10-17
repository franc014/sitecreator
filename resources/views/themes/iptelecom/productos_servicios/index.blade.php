@extends('themes.iptelecom.layout.contentmaster')

@section('page_title_window')
    Productos y Servicios
@endsection
@section('page_info_title')
    Productos y servicios:
@stop

@section('page_content')
    <?php
    $saleables = $data["saleables"];
    $username = $data["username"];
    $isContactPage = false;
    $isDedicated = Config::get("app_parametters.isDedicated");
    $in_home = false;



    ?>

    {{--<div class="container site-container2" >

        @include('themes.iptelecom.productos_servicios._detail.partials._cat_tabs')

        <div class="row">
            <div class="col-sm-9 col-md-9 service-content">
                @if(!$saleables->isEmpty())
                    <div id="content-filtered">
                        @include('themes.iptelecom.productos_servicios.partials._services_list')
                    </div>
                @else
                    @include("themes.iptelecom.partials.alerts.no_items")
                @endif
            </div>
            <div class="col-sm-3 col-md-3" >
                <div class="contact-widget row-gap-when-top"  >
                    --}}{{--@include("themes.iptelecom.partials.contact_info._contact_widget")--}}{{--
                </div>
            </div>

        </div>

    </div>
    <div class="container-fluid form-container-option-one" id="contact-form">
        <div class="row">
            <div class="col-sm-9 col-md-9 form-content-section">
                --}}{{--@include("themes.iptelecom.partials.contact_info._contact_form")--}}{{--
            </div>
        </div>
    </div>--}}
    <section class="content-block default-bg content-display"  >
        <div class="container" style="height: 768px">
            <h1>Ip Telecom te ofrece una gama amplia de productos y servicios tecnológicos.
            </h1>
            {{--<ul class="nav nav-pills nav-justified {{$content->disablecategory}}" id="contents-tab">
                @foreach($categories as $key=>$category)

                    @if($key == 0)
                        <li class="active">
                    @else
                        <li>
                            @endif
                            <a href="{{$category->pagelink}}" role="tab"><span data-icon="&#x{{$category->icon}}"
                                                                               class="category-icon"></span>  {{$category->name}}
                            </a>
                            <input type="hidden" value="{{$category->pagelink}}" id="category">
                        </li>
                        @endforeach
            </ul>--}}

            <!-- Tab panes -->
            @include('themes.iptelecom.productos_servicios.partials._services_list')
        </div>
    </section>

@endsection