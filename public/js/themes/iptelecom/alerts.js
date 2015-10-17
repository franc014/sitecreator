if($("#messageSet").hasClass("flash-success-message")){

    sweetAlert({
        title: title,
        text: body,
        type: "success",
        timer: 4000
    });
}

if($("#noItemsMessage").hasClass("flash-noitems-message")){

    swal({
        title: "Sin info...?",
        text: "No se encontró información para desplegar en esta sección. " +
        "Si eres Administrador del sitio, se recomienda que la ingreses ahora. " +
        "También puedes intentar configurando otra sección como página principal.",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Soy Admin y quiero configurar mi cuenta ahora",
        cancelButtonText: "Cancelar",
        closeOnConfirm: false,
        closeOnCancel:false
        },
        function(isConfirm) {
            if (isConfirm) {
                location.href="/auth/login";
            } else {
                location.href=document.referrer;
            }
        }
)
}

if($("#errorsSet").length){
    $(".errors-list").show();
    var err = $("#errorsSet").html();
    $(".errors-list").hide();
    sweetAlert({
        title: "Oops! Por favor corrija los siguientes errores",
        text: err,
        type: "error",
        html:true
    },function(){
        $(this).empty();
        console.log("hi");
        $(".errors-list").hide();
    });
}