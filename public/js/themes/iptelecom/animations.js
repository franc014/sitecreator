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

$('.page-info-default').addClass('rollIn animated');
var t = new Trianglify({
    x_gradient: ['#006C9B', '#009ADA'],

    noiseIntensity: 0.1,
    cellsize: 100,
    cellpadding: 10,
    fillOpacity: 0.5,
    strokeOpacity: 0.5,
    bleed: 250

});

var u = new Trianglify({
    //x_gradient: colorbrewer.RdYlBu[2],
    x_gradient: ['#2BAFE8', '#79D3FA'],

    y_gradient: ['#FFFFFF', '#FFFFFF'],
    noiseIntensity: 0.1,
    cellsize: 140,
    cellpadding: 20,
    fillOpacity: 0.5,
    strokeOpacity: 0.2,
    bleed: 240
});
var pattern = t.generate(2020, 86);
var pattern2 = u.generate(2020, 86);
$('.page-info-block').attr('style', ';background-repeat:no-repeat;background-image: ' + pattern.dataUrl);
$('.open').attr('style', ';background-repeat:no-repeat;background-image: ' + pattern.dataUrl);