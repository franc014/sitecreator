<div class="row">
    <h1 class="col-sm-2">Résumé </h1>
</div>
<hr>
<div ng-show="showProfileContents=!showPasswordChange">
    <div class="row" id="logo-content">
        <div class="col-md-12 col-lg-12">
            @include('admin.resume.partials._resume_chooser')
            <div resume></div>
        </div>
    </div>

    <div class="row" id="basic-data-content">
        <div class="col-md-12 col-lg-12">
            <div resume-sections></div>

        </div>
    </div>


</div>


