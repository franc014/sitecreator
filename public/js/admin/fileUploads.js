$(window).bind('load',function(){
    $(document).ready(function()
    {
        var setStatusBar = function(progress){
            var progressStr = progress + "%";
            $('#progress .bar').empty();
            $('#progress .bar').css(
                'width',
                progressStr
            );
            $('#progress .bar').append("<span style='margin-left:20px'>"+progressStr+"</span>");

        }
        var setAlert = function(type, message){
            $('#load-result').append("<div class='alert alert-"+type+"'>"+message+"</div>");
        }
        var clearAlerts = function(){
            $('#load-result').empty();
        }
        var unsetAlert = function(unsetAfter){
            setTimeout(clearAlerts, unsetAfter);
        }
        var spinner = ['<div id="spinner" class="sk-spinner sk-spinner-double-bounce">',
            '<div class="sk-double-bounce1"></div>',
            '<div class="sk-double-bounce2"></div>',
            '</div>'].join('');

        setStatusBar(0);
        $('#fileupload').fileupload({
            dataType: 'json',
            progressall: function (e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                setStatusBar(progress);
                if(progress==100){
                    //alert("done, wait");
                    $('#photo_box').empty();
                    $('#photo_box').prepend(spinner);
                }
            },
            success: function (result, status,xhr) {
                var x_size = result.width;
                var y_size = result.height;
                //console.log(result);
                //var data = xhr;
                setStatusBar(0);
                setAlert('success',result.message);
                unsetAlert(4000);
                $('#photo_box').empty();
                $('#photo_box').append('<img width="'+x_size+'" height="'+y_size+'" class="thumbnail" src="data:image/png;base64,'+result.img+'">');
            },
            error: function (jqXHR, textStatus, errorThrown) {
                setStatusBar(0);
                setAlert('danger',jqXHR.responseJSON.photo + ". Por favor trata nuevamente.");
                unsetAlert(4000);
            }

        });

        var ajaxObject = {
            type:"GET",
            url:imageLoadPath,
            beforeSend:function(){
                $('#photo_box').append(spinner);
            }
        }
        //load bio photo
        $.ajax(ajaxObject).done(function(data,a){

            var x_size = data.width;
            var y_size = data.height;
            $('#photo_box').empty('#antes');
            $('#photo_box').append('<img width="'+x_size+'" height="'+y_size+'" class="thumbnail" src="data:image/jpeg;base64,'+data.img+'">');
        })
            .success(function(data,a,b){
                //console.log(b)
            })
            .error(function(data){
                $('#photo_box').empty("#spinner");
                $('#photo_box').append("<div class='alert alert-warning'>"+data.responseText+/*+". Por favor <a href="admin/"></a>"+*/"</div>");
            });

    });


});

