<div class="row">
    <h1 class="col-sm-2">Perfil </h1>
</div>
<hr>
<div ng-show="showProfileContents=!showPasswordChange">
    <div class="row" id="logo-content">
        <div class="col-md-12 col-lg-12">
            @include('admin.profile.partials._logoupload_form')
        </div>
    </div>

    <div class="row" id="basic-data-content">
        <div class="col-md-12 col-lg-12">
            @include('admin.profile.partials._basicdata_form')

        </div>
    </div>

    <div class="row" id="personal-data-content">
        <div class="col-md-12 col-lg-12">
            @include('admin.profile.partials._personaldata_form')
        </div>
    </div>

    <div class="row" id="personal-data-content">
        <div class="col-md-12 col-lg-12">
            @include('admin.profile.partials._socialdata_form')
        </div>
    </div>
</div>

<div ng-show="showPasswordChange" >
    <div class="row">
        <div class="col-md-12 col-lg-12">
            @include('admin.profile.partials._changepassword_form')
        </div>
    </div>
</div>
