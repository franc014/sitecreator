<p class="content-intro" >Escriba una sugerencia, comentario o requerimiento de servicio.</p>
<p class="content-sub-intro">Será magnífico conocer su feedback .</p>
<?php
$profile = $data["profile"];

?>
<div class="form-wrapper" id="contactFormSection">
    <form   id="contactForm" name="contactForm" action="/lead" method="post" >
        <p class="form-group form-paragraph">
            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
            <input type="hidden" name="status" value="0">
            <input type="hidden" name="recipient" value="<?php echo $profile->user->username ?>">
            <span class="label-phrase">Hola. Mi nombre es </span>
            <input type="text" id="names" name="names" class="form-control form-input" >
            <span class="label-phrase">. Puede contactarme al email: </span>
            <input type="text" id="email" name="email" class="form-control form-input">
            <span class="label-phrase">o a los teléfonos; (Fijo):</span>
            <input type="text" id="phone" name="phone" class="form-control form-input">
            <span class="label-phrase">, (Celular): </span><br>
            <input type="text" id="cellular" name="cellular" class="form-control form-input">

            <span class="label-phrase"> A continuación mis comentarios:</span><br><br>
            <textarea rows="5" id="inquiry" name="inquiry" cols="150" class="form-control paragraph-textarea"></textarea>


        </p>
        <button style="margin-left: 40px" type="submit" data-icon="&#xe645"class="btn btn-success btn-lg ">Enviar</button>
        <?php //if(!$isContactPage) {?>
            <!--a href="" ng-click="showContactForm=false" style="margin-left: 300px">Cancelar</a-->
        <?php //}?>
    </form>

</div>