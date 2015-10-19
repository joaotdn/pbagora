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
var PBA_App = function() {

};

/**
 * Inicia todos os métodos da aplicação
 **/
PBA_App.init = function() {
    var main = new this;
    main.showSearch();
    main.moMenu();
    main.loadSections();
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