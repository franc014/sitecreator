<?php
$profile = $data["profile"];

?>

<!-- Contact Form -->
<div class="contact-form home-contact" id="contact">

    <!-- Wrapper -->
    <div class="clearfix">

        <!-- Left Col -->
        <div class="pull-left col">

            <form id="contact-form" name="contactForm" action="/lead" method="post">
                <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                <input type="hidden" name="status" value="0">
                <input type="hidden" name="recipient" value="<?php echo $profile->user->username ?>">

                <div class=" form-group">
                    <input type="text" id="names" name="names" class="form-control form-input"
                           placeholder=" Nombre y Apellido">
                </div>

                <div class=" form-group">
                    <input type="text" id="email" name="email" class="form-control form-input" placeholder="Email">
                </div>
                <div class=" form-group">
                    <textarea rows="5" id="inquiry" name="inquiry" cols="150" class="form-control paragraph-textarea"
                              placeholder="Tu consulta"></textarea>
                </div>
                <div class="form-group">
                    <input placeholder="Teléfono" type="text" id="phone" name="phone" class="form-control form-input">
                </div>

                <div class="form-group ">
                    <input type="text" id="cellular" name="cellular" class="form-control form-input"
                           placeholder="Celular">
                </div>

                <button type="submit" class="btn btn-primary fa fa-paper-plane"> Enviar consulta</button>
            </form>

        </div>
        <!-- /Left Col -->

        <!-- Right Col -->
        <div class="pull-right col">
            <div class="panel panel-default contact-card">
                <div class="panel-body">
                    <p class="header-contact">También puedes contactarnos con la siguiente información:</p>
                    <hr class="contact-top-separator">
                    <p class="contact-item "><i class="fa fa-phone"> Teléfono:</i> <a href="tel:{{$profile->phone}}">{{$profile->phone}}</a>
                    </p>

                    <p class="contact-item "><i class="fa fa-mobile"> Celular:</i> <a href="tel:{{$profile->cellular}}">
                            {{$profile->cellular}}</a></p>

                    <p class="contact-item "><i class="fa fa-envelope"> Email: </i> <a
                            href="mailto:{{$profile->user->email}}">{{$profile->user->email}}</a></p>
                    <hr class="contact-top-separator">
                    <p class="contact-item "><i class="fa fa-map-marker"> Quito-Ecuador</i></p>
                </div>
            </div>

        </div>
        <!-- /Right Col -->
    </div>
    <!-- /Wrapper -->
</div>
<!-- /Contact Form -->