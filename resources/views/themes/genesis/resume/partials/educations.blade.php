<li class="media media-section">
    <div class="media-left">
        <a class="no-scroll media-object-icon" role="button" data-toggle="collapse"
           href="#collapseEducations" aria-expanded="false"
           aria-controls="collapseEducations" data-icon="&#xe621" >

        </a>
    </div>
    <div class="media-body">
        <a class="no-scroll pull-right media-object-revealer" role="button" data-toggle="collapse"
           href="#collapseEducations" aria-expanded="false"
           aria-controls="collapseEducations" data-icon="&#xe6be"  ></a>
        <h4 class="media-heading">Estudios </h4>

        <hr class="media-object-divider" >

        <div id="collapseEducations" class="collapse in">
            <!-- Nested media object -->
            @if(!$educations->isEmpty())
                @foreach($educations->sortByDesc('endtimestamp') as $education)
                    @if($education->status==1)
                        <div class="media media-section-item">
                            <div class="media-left">
                                <a class="no-scroll media-object-icon" role="button" data-toggle="collapse"
                                   href="#collapseEducation-{{$education->id}}" aria-expanded="false"
                                   aria-controls="collapseEducation-{{$education->id}}" data-icon="{!!$icon_item_list!!}" >
                                </a>
                            </div>
                            <div class="media-body">
                                <a class="no-scroll pull-right media-object-revealer" role="button" data-toggle="collapse"
                                   href="#collapseEducation-{{$education->id}}" aria-expanded="false"
                                   aria-controls="collapseEducation-{{$education->id}}" data-icon="&#xe6be"  ></a>
                                <h4 class="media-heading">{{$education->title}}</h4>
                                <div id="collapseEducation-{{$education->id}}" class="collapse in">
                                    <p class="media-header-paragraph"> En {{$education->place}}</p>
                                    <p class="media-header-paragraph"> Desde: {{$education->initdate}}</p>
                                    <p class="media-header-paragraph"> Hasta:
                                        @if($education->currentplace)
                                            Fecha actual
                                        @else
                                            {{$education->enddate}}
                                        @endif
                                    </p>
                                    <hr class="media-object-divider">
                                    <div class="item-body">
                                        <h4>Detalle</h4>
                                        <p >
                                            {!!$education->detail!!}
                                        </p>
                                    </div>
                                    <div class="item-body">
                                        <h4>Otras actividades</h4>
                                        <p >
                                            {!!$education->activities!!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @else
                @include("themes.genesis.resume.partials.alert_no_records")
            @endif
        </div>


    </div>
</li>