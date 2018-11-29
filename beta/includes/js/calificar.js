// Starrr plugin (https://github.com/dobtco/starrr)
var __slice = [].slice;
//$(".button-checkbox").hide();

(function($, window) {
  var Starrr;

  Starrr = (function() {
    Starrr.prototype.defaults = {
      rating: void 0,
      numStars: 5,
      change: function(e, value) {}
    };

    function Starrr($el, options) {
      var i, _, _ref,
        _this = this;

      this.options = $.extend({}, this.defaults, options);
      this.$el = $el;
      _ref = this.defaults;
      for (i in _ref) {
        _ = _ref[i];
        if (this.$el.data(i) != null) {
          this.options[i] = this.$el.data(i);
        }
      }
      this.createStars();
      this.syncRating();
      this.$el.on('mouseover.starrr', 'span', function(e) {
        return _this.syncRating(_this.$el.find('span').index(e.currentTarget) + 1);
      });
      this.$el.on('mouseout.starrr', function() {
        return _this.syncRating();
      });
      this.$el.on('click.starrr', 'span', function(e) {
        return _this.setRating(_this.$el.find('span').index(e.currentTarget) + 1);
      });
      this.$el.on('starrr:change', this.options.change);
    }

    Starrr.prototype.createStars = function() {
      var _i, _ref, _results;

      _results = [];
      for (_i = 1, _ref = this.options.numStars; 1 <= _ref ? _i <= _ref : _i >= _ref; 1 <= _ref ? _i++ : _i--) {
        _results.push(this.$el.append("<span class='glyphicon .glyphicon-star-empty'></span>"));
      }
      return _results;
    };

    Starrr.prototype.setRating = function(rating) {
      if (this.options.rating === rating) {
        rating = void 0;
      }
      this.options.rating = rating;
      this.syncRating();
      return this.$el.trigger('starrr:change', rating);
    };

    Starrr.prototype.syncRating = function(rating) {
      var i, _i, _j, _ref;

      rating || (rating = this.options.rating);
      if (rating) {
        for (i = _i = 0, _ref = rating - 1; 0 <= _ref ? _i <= _ref : _i >= _ref; i = 0 <= _ref ? ++_i : --_i) {
          this.$el.find('span').eq(i).removeClass('glyphicon-star-empty').addClass('glyphicon-star');
        }
      }
      if (rating && rating < 5) {
        for (i = _j = rating; rating <= 4 ? _j <= 4 : _j >= 4; i = rating <= 4 ? ++_j : --_j) {
          this.$el.find('span').eq(i).removeClass('glyphicon-star').addClass('glyphicon-star-empty');
        }
      }
      if (!rating) {
        return this.$el.find('span').removeClass('glyphicon-star').addClass('glyphicon-star-empty');
      }
    };

    return Starrr;

  })();
  return $.fn.extend({
    starrr: function() {
      var args, option;

      option = arguments[0], args = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
      return this.each(function() {
        var data;

        data = $(this).data('star-rating');
        if (!data) {
          $(this).data('star-rating', (data = new Starrr($(this), option)));
        }
        if (typeof option === 'string') {
          return data[option].apply(data, args);
        }
      });
    }
  });
})(window.jQuery, window);

$(function() {
  return $(".starrr").starrr();
});

$( document ).ready(function() {
  
  $('#hearts-existing').on('starrr:change', function(e, value){
    $('#count-existing').html(value);
  });
});

function finalizado(id,idnot){
    $.ajax({
        url: "https://beta.changero.online/includes/php/calificar.php",
        type: "post",
        data: {cita:id,idnotificacion:idnot} ,
        success: function (response) {
            var respuesta = jQuery.parseJSON(response);
            console.log(respuesta);
            if (respuesta!==false){
                var nombre = respuesta[1];
                var idprofesional = respuesta[0][0];
                var servicios = respuesta[2];
                var idnot = respuesta[3];
                $("#descripcion").html("Califique a este profesional por sus servicios a continuacion.");
                $("#puntuacion").html("Calificar a "+nombre);
                $('#puntuar').children().remove();
                $("#cita").val(id);
                $("#idnot").val(idnot);
                $("#profes").val(idprofesional);
                $("#calificarcliente").removeAttr("onclick"); 
                $('#calificarcliente').attr('id','submitcalificacion');
                for (var i = 0; i < servicios.length; i++){
                    $('#puntuar').append($('<h3>'+servicios[i][1]+'<h3/><input id="serv'+i+'" value="'+servicios[i][0]+'" type="hidden"><div id="star'+i+'" class="row lead evaluation"><div id="colorstar" class="starrr ratable"></div><span id="count">0</span> estrellas(s) - <span id="meaning"></span></div>'));
                    $(".starrr").starrr();
                    actualizar();
                    $('#formpuntuar').modal('show');
                }
            }
        }
    });
}



$(function () {
    $('.button-checkbox').each(function () {

        // Settings
        var $widget = $(this),
            $button = $widget.find('button'),
            $checkbox = $widget.find('input:checkbox'),
            color = $button.data('color'),
            settings = {
                on: {
                    icon: 'glyphicon glyphicon-check'
                },
                off: {
                    icon: 'fa fa-square-o'
                }
            };

        // Event Handlers
        $button.on('click', function () {
            $checkbox.prop('checked', !$checkbox.is(':checked'));
            $checkbox.triggerHandler('change');
            updateDisplay();
        });
        $checkbox.on('change', function () {
            updateDisplay();
        });

        // Actions
        function updateDisplay() {
            var isChecked = $checkbox.is(':checked');

            // Set the button's state
            $button.data('state', (isChecked) ? "on" : "off");

            // Set the button's icon
            $button.find('.state-icon')
                .removeClass()
                .addClass('state-icon ' + settings[$button.data('state')].icon);

            // Update the button's color
            if (isChecked) {
                $button
                    .removeClass('btn-default')
                    .addClass('btn-' + color + ' active');
            }
            else {
                $button
                    .removeClass('btn-' + color + ' active')
                    .addClass('btn-default');
            }
        }

        // Initialization
        function init() {

            updateDisplay();

            // Inject the icon if applicable
            if ($button.find('.state-icon').length === 0) {
                $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i> ');
            }
        }
        init();
    });
});

$('.starrr').starrr({
  change: function(e, value){
    alert('new rating is ' + value)
  }
})

function actualizar(){
	var correspondence=["","Muy malo","Regular","Bueno","Muy bueno","Excelente"];
    $('.ratable').on('starrr:change', function(e, value){
    $(".button-checkbox").show();
     $(this).closest('.evaluation').children('#count').html(value);
     $(this).closest('.evaluation').children('#meaning').html(correspondence[value]);
     
    var currentval=  $(this).closest('.evaluation').children('#count').html();
     
    var target=  $(this).closest('.evaluation').children('.indicators');
    target.css("color","black");
    target.children('.rateval').val(currentval);
    target.children('#textwr').html(' ');
   
    
    if(value<3){
     target.css("color","red").show(); 
     target.children('#textwr').text('Muy mal servicio');
    }
    else{
        if(value>3){    
            target.css("color","green").show(); 
            target.children('#textwr').html('Excelente Servicio');
        }else{
       target.hide();  
        }
    }
    
 });
$(document).on('click', "#submitcalificacion", function() {
    var stars = $('.ratable').closest('.evaluation').children('#count').html();
    var cant = document.getElementsByClassName("evaluation").length;
    var puntuaciones = [];
    var servicio;
    var puntos;
    for (var i = 0; i < cant; i++){
        puntos = $('div#star'+i+' .ratable').closest('.evaluation').children('#count').html();
        servicio = $('#serv'+i+'').val();
        var sp = [puntos,servicio];
        puntuaciones.push(sp);
    }
        console.log(puntuaciones);
        var idprofesional = $("#profes").val();
        var idcita = $("#cita").val();
        var idnot = $("#idnot").val();
        $.ajax({
        url: "https://beta.changero.online/includes/php/calificar.php",
        type: "post",
        data: {puntuacion:puntuaciones,profesional:idprofesional,cita:idcita,idnotificacion:idnot} ,
        success: function (response) {
            var respuesta = jQuery.parseJSON(response);
            console.log(respuesta);
            $('#puntuar').children().remove();
          }
        });
    });
}

function puntuarcliente(id,idnot){
  $.ajax({
        url: "https://beta.changero.online/includes/php/calificar.php",
        type: "post",
        data: {getname:id} ,
        success: function (response) {
            var respuesta = jQuery.parseJSON(response);
            console.log(respuesta);
            $('#puntuar').children().remove();
            $("#puntuacion").html("Calificar a "+respuesta);
            $("#descripcion").html("Califique a continuación el trato con este cliente.");
            $('#puntuar').append($('<div id="star" class="row lead evaluation"><div id="colorstar" class="starrr ratable"></div><span id="count">0</span> estrellas(s) - <span id="meaning"></span></div>'));
            $(".starrr").starrr();
            actualizar();
            $('#submitcalificacion').attr('id','calificarcliente');
            $('#calificarcliente').attr('onclick','sendcalificacion('+id+','+idnot+')'); 
            $('#formpuntuar').modal('show');
          }
  }); 
}

function sendcalificacion(id,idnot){
  var stars = $('div#star .ratable').closest('.evaluation').children('#count').html();
  $.ajax({
        url: "https://beta.changero.online/includes/php/calificar.php",
        type: "post",
        data: {puntuarcliente:id,idnotificacion:idnot,p:stars} ,
        success: function (response) {
          var respuesta = jQuery.parseJSON(response);
          console.log(respuesta);
          $('#puntuar').children().remove();
          $("#puntuacion").html("Calificar");
          $("#calificarcliente").removeAttr("onclick"); 
  }
});
}
