<li class="media media-section">
    <div class="media-left">
        <a class="no-scroll media-object-icon" role="button" data-toggle="collapse"
           href="#collapseLanguages" aria-expanded="false"
           aria-controls="collapseLanguages" data-icon="&#xe61a" >

        </a>
    </div>
    <div class="media-body">
        <a class="no-scroll pull-right media-object-revealer" role="button" data-toggle="collapse"
           href="#collapseLanguages" aria-expanded="false"
           aria-controls="collapseLanguages" data-icon="&#xe6be"  ></a>
        <h4 class="media-heading">Idiomas </h4>

        <hr class="media-object-divider" >

        <div id="collapseLanguages" class="collapse in">
            <!-- Nested media object -->
            @if(!$languages->isEmpty())
                @foreach($languages as $language)
                    @if($language->status==1)
                        <div class="media media-section-item">
                            <div class="media-left">
                                <a class="no-scroll media-object-icon" role="button" data-toggle="collapse"
                                   href="#collapseLanguage-{{$language->id}}" aria-expanded="false"
                                   aria-controls="collapseLanguage-{{$language->id}}" data-icon="{!!$icon_item_list!!}" >
                                </a>
                            </div>
                            <div class="media-body">
                                <a class="no-scroll pull-right media-object-revealer" role="button" data-toggle="collapse"
                                   href="#collapseLanguage-{{$language->id}}" aria-expanded="false"
                                   aria-controls="collapseLanguage-{{$language->id}}" data-icon="&#xe6be"  ></a>
                                <h4 class="media-heading">{{$language->title}}</h4>
                                <div id="collapseLanguage-{{$language->id}}" class="collapse in">
                                    <hr class="media-object-divider">
                                    <div class="item-body">

                                        <p class="media-object-paragraph">
                                            {{$language->detail}}
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