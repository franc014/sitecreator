<?php
$profile = $data["profile"];
?>
<p class="contact-widget-intro">
    Información de contacto:<hr>
</p>
<ul class="list-unstyled">
    <li data-icon="&#xe642" > Teléfono: <a href="tel:{{$profile->phone}}">  {{$profile->phone}}</a></li>
    <li data-icon="&#xe658"> Celular: <a href="tel:{{$profile->cellular}}">{{$profile->cellular}}</a></li>
    <li data-icon="&#xe785"> Email: <a href="mailto:{{$profile->user->email}}">{{$profile->user->email}}</a></li>
    <li data-icon="&#xe648"> Quito-Ecuador</li>
</ul>