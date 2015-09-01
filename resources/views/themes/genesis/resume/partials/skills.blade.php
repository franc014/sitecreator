<li class="media media-section">
    <div class="media-left">
        <a class="no-scroll media-object-icon" role="button" data-toggle="collapse"
           href="#collapseSkills" aria-expanded="false"
           aria-controls="collapseSkills" data-icon="&#xe697" >

        </a>
    </div>
    <div class="media-body">
        <a class="no-scroll pull-right media-object-revealer" role="button" data-toggle="collapse"
           href="#collapseSkills" aria-expanded="false"
           aria-controls="collapseSkills" data-icon="&#xe6be"  ></a>
        <h4 class="media-heading">Habilidades </h4>

        <hr class="media-object-divider" >

        <div id="collapseSkills" class="collapse in">
            <!-- Nested media object -->
            @if(!$skills->isEmpty())
                @foreach($skills as $skill)
                    @if($skill->status==1)
                        <div class="media media-section-item">
                            <div class="media-left">
                                <a class="no-scroll media-object-icon" role="button" data-toggle="collapse"
                                   href="#collapseSkill-{{$skill->id}}" aria-expanded="false"
                                   aria-controls="collapseSkill-{{$skill->id}}" data-icon="{!!$icon_item_list!!}" >
                                </a>
                            </div>
                            <div class="media-body">
                                <a class="no-scroll pull-right media-object-revealer" role="button" data-toggle="collapse"
                                   href="#collapseSkill-{{$skill->id}}" aria-expanded="false"
                                   aria-controls="collapseSkill-{{$skill->id}}" data-icon="&#xe6be"  ></a>
                                <h4 class="media-heading">{{$skill->title}}</h4>
                                <div id="collapseSkill-{{$skill->id}}" class="collapse in">
                                    <hr class="media-object-divider">
                                    <div class="item-body">

                                        <p class="media-object-paragraph">
                                            {!!$skill->detail!!}
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