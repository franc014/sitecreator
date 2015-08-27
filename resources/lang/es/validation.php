<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| as the size rules. Feel free to tweak each of these messages here.
	|
	*/

	"accepted"         => "El campo :attribute debe ser aceptado.",
	"active_url"       => "El campo :attribute no es una URL válida.",
	"after"            => "El campo :attribute debe ser una fecha después de :date.",
	"alpha"            => "El campo :attribute debe contener solo letras.",
	"alpha_dash"       => "El campo :attribute debe contener solo letras, números, y guiones.",
	"alpha_num"        => "El campo :attribute debe contener letras y números.",
	"array"            => "El campo :attribute debe ser un arreglo.",
	"before"           => "El campo :attribute debe ser una fecha antes de :date.",
	"between"          => array(
		"numeric" => "El campo :attribute debe ser entre :min y :max.",
		"file"    => "El campo :attribute debe ser entre :min y :max kilobytes.",
		"string"  => "El campo :attribute debe ser entre :min y :max caracteres.",
		"array"   => "El campo :attribute debe tener entre :min y :max ítems.",
	),
	"confirmed"        => "El campo :attribute de confirmación no existe.",
	"date"             => "El campo :attribute no es una fecha válida.",
	"date_format"      => "El campo :attribute no corresponde al formato :format.",
	"different"        => "Los campos :attribute y :other deben ser diferentes.",
	"digits"           => "El campo :attribute debe tener :digits dígitos.",
	"digits_between"   => "El campo :attribute debe tener entre :min y :max dígitos.",
	"email"            => "El formato del campo :attribute es inválido.",
	"exists"           => "El :attribute seleccionado es inválido.",
	"image"            => "El :attribute debe ser una imagen.",
	"in"               => "El :attribute seleccionado es inválido.",
	"integer"          => "El campo :attribute debe ser un entero.",
	"ip"               => "El campo :attribute debe ser una dirección IP válida.",
	"max"              => array(
		"numeric" => "El campo :attribute no debe ser mayor que :max.",
		"file"    => "El campo :attribute no debe ser mayor que :max kilobytes.",
		"string"  => "El campo :attribute no debe ser mayor que :max characters.",
		"array"   => "El campo :attribute no debe ser mayor que :max ítems.",
	),
	"mimes"            => "El campo :attribute debe ser un archivo de tipo: :values.",
	"min"              => array(
		"numeric" => "El campo :attribute debe ser al menos :min.",
		"file"    => "El campo :attribute debe ser al menos :min kilobytes.",
		"string"  => "El campo :attribute debe ser al menos :min characters.",
		"array"   => "El campo :attribute debe ser al menos :min ítems.",
	),
	"not_in"           => "El :attribute seleccionado es inválido.",
	"numeric"          => "El :attribute debe ser un número.",
	"regex"            => "El formato de :attribute es inválido.",
	"required"         => "El campo :attribute es requerido.",
	"required_if"      => "El campo :attribute es requerido cuando :other es :value.",
	"required_with"    => "El campo :attribute es requerido cuando :values es presente.",
	"required_without" => "El campo :attribute es requerido cuando :values no está presente.",
	"same"             => "El campo :attribute y :other deben ser iguales.",
	"size"             => array(
		"numeric" => "El campo :attribute debe ser :size.",
		"file"    => "El campo :attribute debe ser :size kilobytes.",
		"string"  => "El campo :attribute debe ser :size caracteres.",
		"array"   => "El campo :attribute debe contener :size ítems.",
	),
	"unique"           => "El campo :attribute ya ha sido tomado.",
	"url"              => "El formato de:attribute es inválido.",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => array(),

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => array(
        "names"=>"Nombres",
        "phone"=>"teléfono",
        "file"=>"archivo"
    ),

);
