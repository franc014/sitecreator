<div  >

    <!--form role="form" class="dropzone" id="photoForm" name="photoForm" action="/user/photo"  -->
        <h4>Fotografía</h4> <span class="bg-warning" style="padding: 3px">OPCIONAL</span> <span class="intro-text ">: Coloca o actualiza la foto que será mostrada en tu biografía :</span>
        <hr>
        <div class="row">
            <!--div class="col-md-6 col-lg-6 "  >
                    <div id="fileuploader" style="width: 50px !important;">Carga</div>
            </div-->
            <div class="col-md-6 col-lg-6 "  >
                <p class="btn btn-info fileinput-button">
                    <span>Seleccionar Foto</span>
                    <input id="fileupload" type="file" name="photo" data-url="/biography/photo" >

                </p>
                <hr>
                <div class="progress" id="progress">
                    <div class="bar" style="width: 0%; "></div>
                </div>
                <div id="load-result">

                </div>
            </div>
            <div class="col-md-6 col-lg-6"  >
                <div id="photo_box" ></div>
            </div>
        </div>

    <!--/form-->

</div>



