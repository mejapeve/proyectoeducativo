$.fn.extend({
  Cubexy: function (opciones) {
    var Cubexy = this;
    var id = $(Cubexy).attr('id');
    defaults = {
      idInputColor: 'colores',
      idDownload: 'Descargar',
      CanvasSalida: 'canvas',
      attImagenGrande: 'src',
      cssDefault: true,
      cssCambioColor: 'actual',
      cssParteActiva: 'activo',
      cssParteUnica: 'seleccionado',
      cssColorPicker: 'colors'
    }

    var opciones = $.extend({}, defaults, opciones);

    var idInputColor = opciones.idInputColor;
    var idDownload = opciones.idDownload;
    

    var CanvasSalida = opciones.CanvasSalida;
    var attImagenGrande = opciones.attImagenGrande;
    var cssDefault = opciones.cssDefault;

    var cssCambioColor = opciones.cssCambioColor;
    var cssParteActiva = opciones.cssParteActiva;
    var cssParteUnica = opciones.cssParteUnica;
    var cssColorPicker = opciones.cssColorPicker;

    var Estilos = '<style>#' + cssColorPicker + ' { text-align: left;    margin-left: -12px;}#' + cssColorPicker + ' li { display: inline-table;width: 20px;height: 20px;margin: 2px;width: 20px;height: 20px; cursor: pointer;}.' + cssParteUnica + '{border: #000000 2px outset;}</style>';
    if (cssDefault) {
      $('body').before(Estilos);
    }

    $('#' + idInputColor).before('<canvas style="display:none" id="tmpCanvas" width="700" height="700"></canvas>');
    var canvas = document.getElementById(opciones.CanvasSalida);
    var ctx = canvas.getContext("2d");
    ctx.clearRect(0, 0, ctx.width, ctx.height);
    var ImagenesIniciales = [];
    var base_image = [];


    IniciarPintadoAvatar();

    $('#' + id + ' > div >img').css('cursor', 'pointer');
    $('#' + id + ' > div >img').click(function () {
      $(this).parent().children('img').removeClass(cssParteActiva);
      $(this).addClass(cssParteActiva);
      $('.' + cssCambioColor).removeClass(cssCambioColor);
      $(this).parent().addClass(cssCambioColor);
      $('.' + cssParteUnica).removeClass(cssParteUnica);
      $(this).addClass(cssParteUnica);
      IniciarPintadoAvatar();
    });

    function IniciarPintadoAvatar() {
      cimgContext = 0;
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      
      $('#' + id + ' > div').each(function () {
        idParte = $(this).attr('id');
        $('#' + idParte + ' >img').each(function () {
          if ($(this).hasClass(cssParteActiva)) {
            base_image[cimgContext] = new Image();
            base_image[cimgContext].src = $(this).attr(attImagenGrande);
            base_image[cimgContext].enabled = true;
            var top = Number($(this).attr('data-top') || $(this).parent().attr('data-top'));
            var left = Number($(this).attr('data-left') || $(this).parent().attr('data-left'));
            var width = Number($(this).attr('data-width') || $(this).parent().attr('data-width'));
            var height = Number($(this).attr('data-height') || $(this).parent().attr('data-height'));
            
            
            if($(this).parent().attr('id') === "hair" && $(this).attr("data-ears")) {
                var skinY = Number($('#skin .activo').attr('data-top') || $('#skin .activo').parent().attr('data-top'));
                var skinH = Number($('#skin .activo').attr('data-height') || $('#skin .activo').parent().attr('data-height'));
                var skinEars = Number($('#skin .activo').attr('data-ears'));
                var ears = Number($(this).attr('data-ears'));
                height = height*skinEars/ears;
            }
            else if($(this).parent().attr('id') === "accessories1") {
                var skinEars = Number($('#skin .activo').attr('data-ears'));
                var skinY = $('#skin .activo').attr('data-top') || $('#skin .activo').parent().attr('data-top');
                skinY = Number(skinY);
                top = skinY + ( skinEars - skinY )*5/12 + top;
                
            }
            else if($(this).parent().attr('id') === "accessories2") {
                var y = $('#skin .activo').attr('data-top');
                //top = Number(y) + top;
            }
            else if($(this).parent().attr('id') === "features") {
                var y = $('#skin .activo').attr('data-top');
                var x = $('#skin .activo').attr('data-mouth');
                var skinW = $('#skin .activo').attr('data-width') || $('#skin .activo').parent().attr('data-width');
                left = x - width / 8;
            }

            if ($(this).parent().attr('data-rgb')) {
              
            } else {
              base_image[cimgContext].onload = function () {
                ctx.drawImage(this, left, top, width, height);
              }
            }
            cimgContext++;
          }
        });
        
        // get the image data object
        var image = ctx.getImageData(0, 0, canvas.width, canvas.height);
        // get the image data values 
        var imageData = image.data,
        length = imageData.length;
        // set every fourth value to 50
        for(var i=0; i < length; i+=1){  
            imageData[i] = 255;
        }
        // after the manipulation, reset the data
        image.data = imageData;
        // and put the imagedata back to the canvas
        ctx.putImageData(image, 0, 0);
      });
    }

    function alterImage(imageObj, left, top, width, height, r, g, b) {
      cvstmp = document.getElementById("tmpCanvas");
      var ctxTmp = cvstmp.getContext("2d");
      
      ctxTmp.drawImage(imageObj, left, top);
      ctxTmp.clearRect(0,0, canvas.width, canvas.height);
      var id = ctxTmp.getImageData(left, top, width, height);
      for (var i = 0; i < id.data.length; i += 4) {
        id.data[i] = r;// red
        id.data[i + 1] = g;// Green
        id.data[i + 2] = b; //blue
      }
      ctxTmp.putImageData(id, 0, 0);
      ctx.drawImage(cvstmp, left, top, width, height);
    }
    var colorRGBS = $('#' + idInputColor).attr('data-colores');
    if (!colorRGBS) {
      colorRGBS = '#F2CFAF,#FFA773,#A98F6D,#693C2D,#1abc9c,#2ecc71,#3498db,#9b59b6,#34495e,#16a085,#27ae60,#2980b9,#8e44ad,#2c3e50,#f1c400,#e67e22,#e74c3c,#ecf0f1,#95a5a6,#f39c12,#d35400,#c0392b,#bdc3c7,#7f8c8d,#E51C23,#011101';
    }
    var cadena = '';
    cadena += '<div ><ul id="colors">';
    objRGBS = colorRGBS.split(',');
    $.each(objRGBS, function (key, value) {
      strgb = (hexToRgb(value));
      cadena += '<li data-rgb=' + strgb.r + ',' + strgb.g + ',' + strgb.b + ' style="background-color:rgb(' + strgb.r + ',' + strgb.g + ', ' + strgb.b + ');"></li>';
    });
    cadena += '</ul></div>';
    $('#' + idInputColor).before(cadena);
    function hexToRgb(hex) {
      var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
      return result ? {
        r: parseInt(result[1], 16),
        g: parseInt(result[2], 16),
        b: parseInt(result[3], 16)
      } : null;
    }
    $('#colors li').click(function () {

      if ($(this).attr('data-rgb') !== "1,17,1") {
        $('.' + cssCambioColor).attr("data-rgb", $(this).attr('data-rgb'));
      }
      else {
        $('.' + cssCambioColor).attr("data-rgb", $(this).attr('data-rgb'));
      }

      IniciarPintadoAvatar();
    });
    $('#' + idDownload).click(function () {
      var dataURL = canvas.toDataURL('image/png');
      $('#' + idDownload).attr('href', dataURL);
      $('#' + idDownload).attr('download', "Archivo.png");

    });
    
  }
});