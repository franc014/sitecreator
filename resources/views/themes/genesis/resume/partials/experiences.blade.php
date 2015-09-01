<li class="media media-section" >
    <div class="media-left">
        <a class="no-scroll media-object-icon" role="button" data-toggle="collapse"
           href="#collapseExperiences" aria-expanded="false"
           aria-controls="collapseExperiences" data-icon="&#xe603" >

        </a>
    </div>
    <div class="media-body">
        <a class="no-scroll pull-right media-object-revealer" role="button" data-toggle="collapse"
           href="#collapseExperiences" aria-expanded="false"
           aria-controls="collapseExperiences" data-icon="&#xe6be"  ></a>
        <h4 class="media-heading" style="margin-left: 10px">Experiencia </h4>

        <hr class="media-object-divider" >

        <div id="collapseExperiences" class="collapse in">
            <!-- Nested media object -->
            @if(!$experiences->isEmpty())
                @foreach($experiences->sortByDesc('endtimestamp') as $experience)
                    @if($experience->status==1)
                        <div class="media media-section-item">
                            <div class="media-left">
                                <a class="no-scroll media-object-icon" role="button" data-toggle="collapse"
                                   href="#collapseExperience-{{$experience->id}}" aria-expanded="false"
                                   aria-controls="collapseExperience-{{$experience->id}}" data-icon="{!!$icon_item_list!!}" >
                                </a>
                            </div>
                            <div class="media-body">
                                <a class="no-scroll pull-right media-object-revealer" role="button" data-toggle="collapse"
                                   href="#collapseExperience-{{$experience->id}}" aria-expanded="false"
                                   aria-controls="collapseExperience-{{$experience->id}}" data-icon="&#xe6be"  ></a>
                                <h4 class="media-heading">{{$experience->title}}</h4>
                                <div  id="collapseExperience-{{$experience->id}}" class="collapse in">
                                    <p class="media-header-paragraph"> En {{$experience->place}}</p>
                                    <p class="media-header-paragraph"> Desde: {{$experience->initdate}}</p>
                                    <p class="media-header-paragraph"> Hasta:
                                        @if($experience->currentplace)
                                            Fecha actual
                                        @else
                                            {{$experience->enddate}}
                                        @endif
                                    </p>
                                    <hr class="media-object-divider">
                                    <div class="item-body">
                                        <h4>Detalle</h4>
                                        <p >
                                            {!!$experience->detail!!}
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