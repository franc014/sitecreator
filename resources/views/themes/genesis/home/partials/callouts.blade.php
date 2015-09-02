
@foreach($callouts as $callout)
<div>
    <div id="bg">
        <img class="img-responsive" src="{{$callout->photo->cloudpath}}" alt="{{$callout->message}}">
        <div class="after">This is some content</div>
    </div>
    <div class="row">

        <div class="col-sm-12 col-md-12">
            <div class="home-jumbotron" >
                <p >
                    {{$callout->message}}
                </p>
                <div class="home-jumbotron-callouts">
                    @if($isDedicated)
                        <a data-icon="&#xe6ae" href="/{{$callout->buttonlink}}" class="btn
                            btn-default btn-lg btn-warning
                            ">{{$callout->buttonmessage}}</a>
                        <a data-icon="&#xe645" href="/contacto" class="btn btn-default
                             btn-lg btn-success
                            ">Contactar</a>
                    @else
                        <a data-icon="&#xe6ae" href="/{{$profile->user->username}}/{{$callout->buttonlink}}" class="btn btn-default btn-lg btn-warning col-sm-offset-1 col-sm-4 col-md-4">{{$callout->buttonmessage}}</a>
                        <a data-icon="&#xe645" href="/contacto" class="btn btn-default btn-lg btn-success col-sm-offset-1 col-sm-4 col-md-4">Contactar</a>
                    @endif
                </div>
            </div>

        </div>

    </div>
</div>
@endforeach
