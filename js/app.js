// Foundation JavaScript
// Documentation can be found at: http://foundation.zurb.com/docs
$(document).foundation();

//plugins
$.fn.getDataThumb = function(options) {
    options = $.extend({
        bgClass: 'bg-cover'
    }, options || {});
    return this.each(function() {
        var th = $(this).data('thumb');
        if (th) {
            $(this).css('background-image', 'url(' + th + ')').addClass(options.bgClass);
        }
    });
};
$('*[data-thumb]').getDataThumb(); // data-thumb para esses elementos

//Offcanvas menu
var PBA_App = function() {};

/**
 * Inicia todos os métodos da aplicação
 **/
PBA_App.init = function() {
    var main = new this;

    main.showSearch();
    main.moMenu();
    main.loadSections();
    main.videosCarousel();
    main.popularCarousel();
    main.bloggersCarousel();
    main.carsCarousel();
};

/**
 * Carousel videos
 * */
PBA_App.prototype.videosCarousel = function() {
    var videos = $(".nav-videos");
    videos.owlCarousel({
        responsiveBaseWidth: $(".row"),
        responsive: true,
        responsiveRefreshRate: 200,
        pagination: true,
        itemsCustom: [
            [200, 2],
            [700, 2],
            [800, 3],
        ],
        rewindNav: false,
        rewindSpeed: 300
    });
};

/**
 * Carousel mais lidas
 * */
PBA_App.prototype.popularCarousel = function() {
    $('#list-popular').clone().appendTo('#popular-carousel');
    $("li","#popular-carousel").each(function() { $(this).addClass('item'); });

    var carousel = $("ul","#popular-carousel");
    carousel.owlCarousel({
        responsiveBaseWidth: $(".row"),
        responsive: true,
        responsiveRefreshRate: 200,
        pagination: true,
        itemsCustom: [
            [200, 1]
        ],
        rewindNav: false,
        rewindSpeed: 300
    });
};

/**
 * Carousel colunistas
 * */
PBA_App.prototype.bloggersCarousel = function() {
    $('#list-bloggers').clone().appendTo('#bloggers-carousel');
    $("li","#bloggers-carousel").each(function() { $(this).addClass('item'); });

    var carousel = $("ul","#bloggers-carousel");
    carousel.owlCarousel({
        responsiveBaseWidth: $(".row"),
        responsive: true,
        responsiveRefreshRate: 200,
        pagination: true,
        itemsCustom: [
            [200, 1]
        ],
        rewindNav: false,
        rewindSpeed: 300
    });
};

/**
 * Carousel carros
 * */
PBA_App.prototype.carsCarousel = function() {
    $('.list-cars').clone().appendTo('#cars-carousel');
    $("li","#cars-carousel").each(function() { $(this).addClass('item'); });

    var carousel = $("ul","#cars-carousel");
    carousel.owlCarousel({
        responsiveBaseWidth: $(".row"),
        responsive: true,
        responsiveRefreshRate: 200,
        pagination: true,
        itemsCustom: [
            [200, 1]
        ],
        rewindNav: false,
        rewindSpeed: 300
    });
};

/**
 * Toggle para o input de busca
 **/
PBA_App.prototype.showSearch = function() {

  $('#pba-search').on('click',function(e) {
      e.preventDefault();
      $('#mask-white,.search-portal').toggleClass('show');
      $('.d-table-cell',this).find('span.hidden').removeClass('hidden').siblings('span').addClass('hidden');
      setTimeout(function() { $('#input-portal').focus(); },500);
  });

};

/**
 * Menu OffCanvas
 * */
PBA_App.prototype.moMenu = function () {
    $('.open-offcanvas,.close-offcanvas').on('click',function() {
        $('#menu-offcanvas,.close-offcanvas').toggleClass('move');
    });
    $('ul','#main-menu').clone().appendTo('#mo-menu');
    $('.icon-search','#mobile-search').on('click', function () {
        $('#mobile-search').trigger('submit');
    });
};

/**
 * Carrega elementos a partir do scroll
 * */
PBA_App.prototype.loadSections = function () {

    var filterByOffset = function( obj , value ) {
        for( var prop in obj ) {
            if( obj.hasOwnProperty( prop ) ) {
                if( obj[ prop ] >= value )
                    return prop;
            }
        }
    };

    $(window).on('scroll',function(e) {
        var x = $(this).scrollTop(),
            arrSections = {};

        if(x > 400) {
            $('*[data-section]').each(function (i) {
                arrSections[$(this).data('section')] = $(this).offset().top;
            });

            var comp = filterByOffset(arrSections,x);

            if(comp != 'undefined') {
                var el = $('div[data-section="'+ comp +'"]');
                if(el.length && !el.hasClass('show-section'))
                    el.addClass('show-section');
            }
        }
    });

};

//Iniciar app
PBA_App.init();