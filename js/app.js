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
$('.the-results').perfectScrollbar(); 

//Offcanvas menu
var PBA_App = function() {};

var reinitCarousel = function() {
    var main = new PBA_App();

    main.videosCarousel();
    main.popularCarousel();
    main.bloggersCarousel();
    main.relatedCarousel();
    main.carsCarousel();
};

/**
 * Inicia todos os métodos da aplicação
 **/
PBA_App.init = function() {

    $.ajaxSetup({
        url: getData.ajaxDir,
        dataType: 'html',
        type: 'GET',
        beforeSend: function() {
            $('.load-content').addClass('show');
        },
        complete: function() {
            //console.log('acabou');
            $('.load-content').removeClass('show');
            reinitCarousel();
            $('*[data-thumb]').getDataThumb();
        }
    });

    var main = new this;

    main.showSearch();
    main.moMenu();
    //main.loadSections();

    //main.videosCarousel();
    //main.popularCarousel();
    //main.bloggersCarousel();
    //main.carsCarousel();
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
    if($('#popular-carousel').html() == '') {
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
    }
};

/**
 * Carousel colunistas
 * */
PBA_App.prototype.bloggersCarousel = function() {
    if($('#bloggers-carousel').html() == '') {
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
    }
};

/**
 * Carousel carros
 * */
PBA_App.prototype.carsCarousel = function() {
    if($('#cars-carousel').html() == '') {
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
    }
};

/**
 * Carousel relacionadas
 * */
PBA_App.prototype.relatedCarousel = function() {
    if($('#carousel-related').html() == '') {
        $('.list-related').clone().appendTo('#carousel-related');
        $("li","#carousel-related").each(function() { $(this).addClass('item'); });

        var carousel = $("ul","#carousel-related");
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
    }
};

/**
 * Toggle para o input de busca
 **/
PBA_App.prototype.showSearch = function() {

  $('#pba-search').on('click',function(e) {
      e.preventDefault();
      $('#mask-white,.search-portal,#header').toggleClass('show');
      $('#home-top,#post-content').toggleClass('search-mode');
      $('.d-table-cell',this).find('span.hidden').removeClass('hidden').siblings('span').addClass('hidden');
      setTimeout(function() { $('#input-portal').focus(); },500);
  });

};

/**
 * Menu OffCanvas
 * */
PBA_App.prototype.moMenu = function () {
    var lastScrollTop = 0;

    $('.open-offcanvas,.close-offcanvas,.scroll-offcanvas').on('click',function(e) {
        e.preventDefault();
        $('#menu-offcanvas,.close-offcanvas').toggleClass('move');
    });

    $('ul','#main-menu').clone().appendTo('#mo-menu');

    $('.icon-search','#mobile-search').on('click', function () {
        $('#mobile-search').trigger('submit');
    });

    $(window).scroll(function(event){
        var st = $(this).scrollTop();
        if (st > lastScrollTop) {
            $('#mo-menu-scroll').removeClass('active');
        } else if(st <= 200) {
            $('#mo-menu-scroll').removeClass('active');
        } else {
            $('#mo-menu-scroll').addClass('active');
        }
        lastScrollTop = st;
    });
};

/**
 * Carrega elementos a partir do scroll
 * */
PBA_App.prototype.loadSections = function () {

    //var cont = 200;
    var filterByOffset = function( obj , value ) {
        for( var prop in obj ) {
            if( obj.hasOwnProperty( prop ) ) {
                if( obj[prop] >= ( value ) )
                    return prop;
            }
        }
    };

    var call_section = function($hook) {
        if($hook != 'undefined') {
            var el = $('*[data-section="'+ $hook +'"]');
            if(el.length && !el.hasClass('show-section')) {
                $.ajax({
                    data: {
                        param: $hook,
                        action: 'load_sections'
                    },
                    success: function(data) {
                        $(document).foundation();
                        el.addClass('show-section');
                        $('*[data-thumb]').getDataThumb();

                        //console.log(data);
                        if(data != '') {
                            el.html(data);
                        }
                    },
                    error: function(e) {
                        console.log(e.statusText);
                    }
                });
            }
        }
    };

    $(window).on('scroll',function(e) {
        var x = $(this).scrollTop(),
            arrSections = {};

        if(x > 200) {

            $('*[data-section]').each(function (i) {
                if(!$(this).hasClass('show-section'))
                    arrSections[$(this).data('section')] = $(this).offset().top;
            });

            var comp = filterByOffset(arrSections,x);
            //console.log(arrSections);

            if(comp != 'undefined') {
                call_section(comp);
            }
        }
    });
};

//Iniciar app
PBA_App.init();
reinitCarousel();