$(function(){
    $('#content-filtered').mixItUp({
        animation: {
            animateChangeLayout: false
        }
    });
    $(".lighterbox").lighterbox({ overlayColor : "white" });

});


var t = new Trianglify({
    x_gradient: ['#ECF8F1','#EEB868'],

    noiseIntensity: 0.1,
    cellsize: 150,
    cellpadding:20,
    fillOpacity:0.5,
    strokeOpacity:0.2,
    bleed:250

});
var pattern = t.generate(2020, 300);
$('.subheader').attr('style',';background-repeat:no-repeat;background-image: '+pattern.dataUrl);

/*smooth scroll*/

$('a[href*=#]').not(".no-scroll").click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
        && location.hostname == this.hostname) {
        var $target = $(this.hash);
        $target = $target.length && $target
        || $('[name=' + this.hash.slice(1) +']');
        if ($target.length) {
            var targetOffset = $target.offset().top;
            $('html,body')
                .animate({scrollTop: targetOffset}, 1000);
            return false;
        }
    }
});