<li class="media media-section">
    <div class="media-left">
        <a class="no-scroll media-object-icon" role="button" data-toggle="collapse"
           href="#collapseInterests" aria-expanded="false"
           aria-controls="collapseInterests" data-icon="&#xe6da" >

        </a>
    </div>
    <div class="media-body">
        <a class="no-scroll pull-right media-object-revealer" role="button" data-toggle="collapse"
           href="#collapseInterests" aria-expanded="false"
           aria-controls="collapseInterests" data-icon="&#xe6be"  ></a>
        <h4 class="media-heading">Intereses Profesionales </h4>

        <hr class="media-object-divider" >

        <div id="collapseInterests" class="collapse in">
            <!-- Nested media object -->
            @if(!$interests->isEmpty())
                @foreach($interests as $interest)
                    @if($interest->status==1)
                        <div class="media media-section-item">
                            <div class="media-left">
                                <a class="no-scroll media-object-icon" role="button" data-toggle="collapse"
                                   href="#collapseInterest-{{$interest->id}}" aria-expanded="false"
                                   aria-controls="collapseInterest-{{$interest->id}}" data-icon="{!!$icon_item_list!!}" >
                                </a>
                            </div>
                            <div class="media-body">
                                <a class="no-scroll pull-right media-object-revealer" role="button" data-toggle="collapse"
                                   href="#collapseInterest-{{$interest->id}}" aria-expanded="false"
                                   aria-controls="collapseInterest-{{$interest->id}}" data-icon="&#xe6be"  ></a>
                                <h4 class="media-heading">{{$interest->title}}</h4>
                                <div id="collapseInterest-{{$interest->id}}" class="collapse in">
                                    <hr class="media-object-divider">
                                    <div class="item-body">

                                        <p class="media-object-paragraph">
                                            {!!$interest->detail!!}
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