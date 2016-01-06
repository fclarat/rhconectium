// FLEXSLIDER

$(window).load(function(){
    $('.flexslider').flexslider({
        animation: "slide",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });


// Animacion Search Home

$(".btn_busqueda_avanzada").click(function(){
	if ($(".bubble_search:visible").length == 1){
    $(".bubble_search").fadeOut();
  }else{
    $(".bubble_search").fadeIn();
  }
	$("#content_busqueda_avanzada").slideToggle(400);
})

$('.btn_trigger_busqueda').on('click', function(){
  $(this).parents('form').trigger('submit');
});

// Graficos radiales

//$('head style[type="text/css"]').attr('type', 'text/less');
//window.randomize = function() {
//	$('.radial-progress').attr('data-progress', Math.floor(Math.random() * 100));
//}
//setTimeout(window.randomize, 200);
//$('.radial-progress').click(window.randomize);


// Soporte para Checkbox en browsers antiguos

// generic tools to help with the custom checkbox
function UTIL() { }
UTIL.prototype.bind_onclick = function(o, f) { // chain object onclick event to preserve prior statements (like jquery bind)
  var prev = o.onclick;
  if (typeof o.onclick != 'function') o.onclick = f;
  else o.onclick = function() { if (prev) { prev(); } f(); };
};
UTIL.prototype.bind_onload = function(f) { // chain window onload event to preserve prior statements (like jquery bind)
  var prev = window.onload;
  if (typeof window.onload != 'function') window.onload = f;
  else window.onload = function() { if (prev) { prev(); } f(); };
};
// generic css class style match functions similar to jquery
UTIL.prototype.trim = function(h) {
  return h.replace(/^\s+|\s+$/g,'');
};
UTIL.prototype.sregex = function(n) {
  return new RegExp('(?:^|\\s+)' + n + '(?:\\s+|$)');
};
UTIL.prototype.hasClass = function(o, n) {
  var r = this.sregex(n);
  return r.test(o.className);
};
UTIL.prototype.addClass = function(o, n) {
  if (!this.hasClass(o, n))
    o.className = this.trim(o.className + ' ' + n);
};
UTIL.prototype.removeClass = function(o, n) {
  var r = this.sregex(n);
  o.className = o.className.replace(r, ' ');
  o.className = this.trim(o.className);
};
var U = new UTIL();

function getElementsByClassSpecial(node, classname) {
    var a = [];
    var re = new RegExp('(^| )'+classname+'( |$)');
    var els = node.getElementsByTagName("*");
    for(var i=0,j=els.length; i<j; i++)
        if(re.test(els[i].className))a.push(els[i]);
    return a;
}


// specific to customized checkbox

function chk_labels(obj, init) {
  var objs = document.getElementsByTagName('LABEL');
  for (var i = 0; i < objs.length; i++) {
    if (objs[i].htmlFor == obj.id) {
      if (!init) { // cycle through each label belonging to checkbox
        if (!U.hasClass(objs[i], 'chk')) { // adjust class of label to checked style, set checked
        
          if (obj.type.toLowerCase() == 'radio') {
            var radGroup = objs[i].className;
            var res = radGroup.split(" ");
            var newRes = res[0] + " " + res[1];
            var relLabels = getElementsByClassSpecial(document.body,newRes);
            for (var r = 0; r < relLabels.length; r++) {
              U.removeClass(relLabels[r], 'chk');
              U.addClass(relLabels[r], 'clr');
            }
            
            U.removeClass(objs[i], 'clr');
            U.addClass(objs[i], 'chk');
            obj.checked = true;
            
          }
          else {
            U.removeClass(objs[i], 'clr');
            U.addClass(objs[i], 'chk');
            obj.checked = true;
          }
        } else { // adjust class of label to unchecked style, clear checked
          U.removeClass(objs[i], 'chk');
          U.addClass(objs[i], 'clr');
          obj.checked = false;
        }
        return true;
      } else { // initialize on page load
        if (obj.checked) { // adjust class of label to checked style
          U.removeClass(objs[i], 'clr');
          U.addClass(objs[i], 'chk');
        } else { // adjust class of label to unchecked style
          U.removeClass(objs[i], 'chk');
          U.addClass(objs[i], 'clr')
        }
      }
    }
  }
}

function chk_events(init) {
  var objs = document.getElementsByTagName('INPUT');
  if (typeof init == 'undefined') init = false;
  else init = init ? true : false;
  for(var i = 0; i < objs.length; i++) {
    if (objs[i].type.toLowerCase() == 'checkbox' || objs[i].type.toLowerCase() == 'radio' ) {
      if (!init) {
        U.bind_onclick(objs[i], function() {
          chk_labels(this, init); // bind checkbox click event handler
        });
      }
      else chk_labels(objs[i], init); // initialize state of checkbox onload
    }
  }
}

U.bind_onload(function() { // bind window onload event
  chk_events(false); // bind click event handler to all checkboxes
  chk_events(true); // initialize
});



// Magnific PopUp

$(document).ready(function() {

  $('.ajax-popup-link').magnificPopup({
    type: 'ajax',
    mainClass: 'mfp-fade',
    closeBtnInside: true,
  
    callbacks: {
      parseAjax: function(mfpResponse) {
        mfpResponse.data = $(mfpResponse.data).find('.ajax_modal');
      }
    }
  });
 
  $('.btn_registro').magnificPopup({
    type: 'ajax',
    mainClass: 'mfp-fade',
    closeBtnInside: true,
  
    callbacks: {
      parseAjax: function(mfpResponse) {
        mfpResponse.data = $(mfpResponse.data).find('.ajax_modal');
      },
      ajaxContentAdded: function() {
        inicializarAjaxRegister();  
      }  
    }
  });

  $('.btn_registro_empresa').magnificPopup({
    type: 'ajax',
    mainClass: 'mfp-fade',
    closeBtnInside: true,
  
    callbacks: {
      parseAjax: function(mfpResponse) {
        mfpResponse.data = $(mfpResponse.data).find('.ajax_modal');
      },
      ajaxContentAdded: function() {
        inicializarAjaxRegisterEmpresa();  
      }  
    }
  });

  $('.btn_editar_empresa').magnificPopup({
    type: 'ajax',
    mainClass: 'mfp-fade',
    closeBtnInside: true,
  
    callbacks: {
      parseAjax: function(mfpResponse) {
        mfpResponse.data = $(mfpResponse.data).find('.ajax_modal');
      },
      ajaxContentAdded: function() {
        $(".btn_editar_logo").on('click', function(){
          if($(this).hasClass("a_cambiar")){
            $('.editar_logo').hide();
            $('.logo_actual').removeClass('img_a_cambiar');
            $(this).removeClass("a_cambiar");
            control = $('.logo_input');
            control.replaceWith( control = control.clone( true ) );
          }else{
            $('.editar_logo').show();
            $('.logo_actual').addClass('img_a_cambiar');
            $(this).addClass("a_cambiar");
          }
        });
        inicializarAjaxEditarEmpresa();  
      }  
    }
  });



  $('.btn_login').magnificPopup({
    type: 'ajax',
    mainClass: 'mfp-fade',
    closeBtnInside: true,
  
    callbacks: {
      parseAjax: function(mfpResponse) {
        mfpResponse.data = $(mfpResponse.data).find('.ajax_modal');
      },
      ajaxContentAdded: function() {
        inicializarAjaxLogin(); 
        inicializarAjaxRetrievePassword();
        $('.recuperar-password').on('click', function(){
          $('form#form_login_user').fadeOut(function(){$('form#form_recuperar_password').fadeIn();})
        });
        $('.volver-login').on('click', function(){
          $('form#form_recuperar_password').fadeOut(function(){$('form#form_login_user').fadeIn();})
        });
      }  
    }
  });

  $('.btn_contactar_empresa').magnificPopup({
    type: 'ajax',
    mainClass: 'mfp-fade',
    closeBtnInside: true,
  
    callbacks: {
      parseAjax: function(mfpResponse) {
        mfpResponse.data = $(mfpResponse.data).find('.ajax_modal');
      },
      ajaxContentAdded: function() {
        inicializarAjaxContactarEmpresa(); 
      }  
    }
  });


});

function inicializarAjaxContactarEmpresa() {
    $('form#form_contactar_empresa').on('submit', function(e){
        $('form#form_contactar_empresa p.status').removeClass('message_ok');
        $('form#form_contactar_empresa p.status').removeClass('message_error');
        $('form#form_contactar_empresa p.status').show().text(ajax_login_object.loadingmessage);
        e.preventDefault();   
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: ajax_contactar_empresa_object.ajaxurl,
            data: { 
                'action': 'ajaxcontactarempresa', 
                'consulta': $('form#form_contactar_empresa [name="consulta"]').val(), 
                'security': $('form#form_contactar_empresa #security').val(), 
            },
            success: function(data){
                if (data.consulta_enviada == true){
                    $('form#form_contactar_empresa p.status').addClass('message_ok');
                }else{
                    $('form#form_contactar_empresa p.status').addClass('message_error');
                }
                $('form#form_contactar_empresa p.status').text(data.message);
                if (data.consulta_enviada == true){
                    //document.location.href = ajax_login_object.redirecturl;
                }
            },
            error: function(xhr, status, error) {
              var err = eval("(" + xhr.responseText + ")");
            }
        });       
    });
}



function inicializarAjaxLogin() {
    $('form#form_login_user').on('submit', function(e){
        $('form#form_login_user p.status').removeClass('message_ok');
        $('form#form_login_user p.status').removeClass('message_error');
        $('form#form_login_user p.status').show().text(ajax_login_object.loadingmessage);
        e.preventDefault();   
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: ajax_login_object.ajaxurl,
            data: { 
                'action': 'ajaxlogin', //calls wp_ajax_nopriv_ajaxlogin
                'username': $('form#form_login_user [name="usuario"]').val(), 
                'password': $('form#form_login_user [name="pass"]').val(),
                'remember': $('form#form_login_user [name="checkboxG4"]').is(':checked'), 
                'security': $('form#form_login_user #security').val(), 
            },
            success: function(data){
                if (data.loggedin == true){
                    $('form#form_login_user p.status').addClass('message_ok');
                }else{
                    $('form#form_login_user p.status').addClass('message_error');
                }
                $('form#form_login_user p.status').text(data.message);
                if (data.loggedin == true){
                    document.location.href = ajax_login_object.redirecturl;
                }
            }
        });       
    });
}


function inicializarAjaxRegister(){
    $('#form_registro_user').on('submit', function (e) {
        $('form#form_registro_user p.status').removeClass('message_ok');
        $('form#form_registro_user p.status').removeClass('message_error');
        $('form#form_registro_user p.status').show().text(ajax_register_object.loadingmessage);
        e.preventDefault();
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: ajax_register_object.ajaxurl,
            data: { 
                'action': 'ajaxregister', //calls wp_ajax_nopriv_ajaxregister
                'username': $('form#form_registro_user [name="nombre"]').val(), 
                'nickname': $('form#form_registro_user [name="nickname"]').val(),
                'password': $('form#form_registro_user [name="pass"]').val(),
                'password_confirm': $('form#form_registro_user [name="confirme_pass"]').val(),
                'email': $('form#form_registro_user [name="email_usuario"]').val(),
                'security': $('form#form_registro_user #security').val(),
                'terminos': $('form#form_registro_user [name="acepto_terminos"]').is(':checked'),
            },
            success: function(data){
                if (data.loggedin == true){
                    $('form#form_registro_user p.status').addClass('message_ok');
                }else{
                    $('form#form_registro_user p.status').addClass('message_error');
                }
                $('form#form_registro_user p.status').text(data.message);
                if (data.loggedin == true){
                    document.location.href = ajax_register_object.redirecturl;
                }
            }
        });  
    });
}


function inicializarAjaxRetrievePassword() {
    $('form#form_recuperar_password').on('submit', function(e){
        $('form#form_recuperar_password p.status').removeClass('message_ok');
        $('form#form_recuperar_password p.status').removeClass('message_error');
        $('form#form_recuperar_password p.status').show().text(ajax_retrieve_object.loadingmessage);
        e.preventDefault();   
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: ajax_retrieve_object.ajaxurl,
            data: { 
                'action': 'ajaxretrievepassword', //calls wp_ajax_nopriv_ajaxretrievepasswordn
                'email': $('form#form_recuperar_password [name="email"]').val(), 
                'security': $('form#form_recuperar_password #security').val(), 
            },
            success: function(data){
              if (data.loggedin == true){
                  $('form#form_recuperar_password p.status').addClass('message_ok');
              }else{
                  $('form#form_recuperar_password p.status').addClass('message_error');
              }
              $('form#form_recuperar_password p.status').text(data.message);
            }
        });       
    });
}


function inicializarAjaxRegisterEmpresa(){
  $('form#form_registro_empresa').on('submit', function(e){
      $('form#form_registro_empresa p.status').removeClass('message_ok');
      $('form#form_registro_empresa p.status').removeClass('message_error');
      $('form#form_registro_empresa p.status').show().text(ajax_register_empresa_object.loadingmessage);
      e.preventDefault();
      var rubros = [];
      $('form#form_registro_empresa [name="rubro"]').each(function(){
        if($(this).is(':checked')){
          rubros.push($(this).val());
        }
      });
      datos = { 
        'action': 'ajaxregisterempresa', //calls wp_ajax_ajaxregisterempresa
        'nombre_fantasia': $('form#form_registro_empresa [name="nombre_fantasia"]').val(), 
        'razon_social': $('form#form_registro_empresa [name="razon_social"]').val(),
        'email_empresa': $('form#form_registro_empresa [name="email_empresa"]').val(),
        'web': $('form#form_registro_empresa [name="web"]').val(),
        'domicilio': $('form#form_registro_empresa [name="domicilio"]').val(),
        'numero': $('form#form_registro_empresa [name="numero"]').val(),
        'piso': $('form#form_registro_empresa [name="piso"]').val(),
        'localidad': $('form#form_registro_empresa [name="localidad"]').val(),    
        'cp': $('form#form_registro_empresa [name="cp"]').val(),
        'provincia': $('form#form_registro_empresa [name="provincia"]').val(),
        'telefono': $('form#form_registro_empresa [name="telefono"]').val(),
        'descripcion': $('form#form_registro_empresa [name="descripcion"]').val(), 
        'rubros' : rubros,
        'security': $('form#form_registro_empresa #signonsecurity').val(),
        'terminos': $('form#form_registro_empresa [name="terminos"]').is(':checked'),
      };


      var formData = new FormData();
      
      $.each($('form#form_registro_empresa [name="logo_empresa"]')[0].files, function(i, file) {
          formData.append('logo_empresa', file);
        }); 
      
      $.each(datos, function(index, value) {
          formData.append(index, value);
      });

      $.ajax({
          type: 'POST',
          dataType: 'json',
          url: ajax_register_empresa_object.ajaxurl,       
          data: formData,
          //data: formData,       
          processData: false,
          contentType: false,
          success: function(data){
            if (data.registrer_empresa == true){
                $('form#form_registro_empresa p.status').addClass('message_ok');
            }else{
                $('form#form_registro_empresa p.status').addClass('message_error');
            }
            $('form#form_registro_empresa p.status').text(data.message);
          }
      }); 
  });
}



function inicializarAjaxEditarEmpresa(){
  $('form#form_editar_empresa').on('submit', function(e){
      $('form#form_editar_empresa p.status').removeClass('message_ok');
      $('form#form_editar_empresa p.status').removeClass('message_error');
      $('form#form_editar_empresa p.status').show().text(ajax_edit_empresa_object.loadingmessage);
      e.preventDefault();
      var rubros = [];
      $('form#form_editar_empresa [name="rubro"]').each(function(){
        if($(this).is(':checked')){
          rubros.push($(this).val());
        }
      });
      datos = { 
        'action': 'ajaxeditempresa', //calls wp_ajax_ajaxeditempresa
        'id_empresa': $('form#form_editar_empresa [name="id_empresa"]').val(),
        'nombre_fantasia': $('form#form_editar_empresa [name="nombre_fantasia"]').val(), 
        'email_empresa': $('form#form_editar_empresa [name="email_empresa"]').val(),
        'web': $('form#form_editar_empresa [name="web"]').val(),
        'domicilio': $('form#form_editar_empresa [name="domicilio"]').val(),
        'numero': $('form#form_editar_empresa [name="numero"]').val(),
        'piso': $('form#form_editar_empresa [name="piso"]').val(),
        'localidad': $('form#form_editar_empresa [name="localidad"]').val(),    
        'cp': $('form#form_editar_empresa [name="cp"]').val(),
        'provincia': $('form#form_editar_empresa [name="provincia"]').val(),
        'telefono': $('form#form_editar_empresa [name="telefono"]').val(),
        'descripcion': $('form#form_editar_empresa [name="descripcion"]').val(), 
        'rubros' : rubros,
        'security': $('form#form_editar_empresa #signonsecurity').val(),
        'terminos': $('form#form_editar_empresa [name="terminos"]').is(':checked'),
      };


      var formData = new FormData();
      
      $.each($('form#form_editar_empresa [name="logo_empresa"]')[0].files, function(i, file) {
          formData.append('logo_empresa', file);
        }); 
      
      $.each(datos, function(index, value) {
          formData.append(index, value);
      });

      $.ajax({
          type: 'POST',
          dataType: 'json',
          url: ajax_edit_empresa_object.ajaxurl,       
          data: formData,
          //data: formData,       
          processData: false,
          contentType: false,
          success: function(data){
            if (data.edit_empresa == true){
                $('form#form_editar_empresa p.status').addClass('message_ok');
            }else{
                $('form#form_editar_empresa p.status').addClass('message_error');
            }
            $('form#form_editar_empresa p.status').text(data.message);
          }
      }); 
  });
}


function inicializarVotacion() {
    vote_params ={};
    vote_params.voto = 0;
    vote_params.calidad = 0;
    vote_params.cumplimiento = 0;
    vote_params.administrativo = 0;
    $(".btn_no_recomiendo").on('click', function(){
      $(this).toggleClass('active');
      $(".content_motivos_no_recomiendo").find('.clr').removeClass('btn_rotate');
      if($(this).hasClass('active')){
        $(".content_motivos_no_recomiendo").slideDown();  
      }else{
        $(".content_motivos_no_recomiendo").slideUp();  
      }
      if($(".btn_recomiendo").hasClass('active')){
        $(".btn_recomiendo").removeClass('active');

      }
      if($(this).hasClass('active') &&  !$(".content_motivos_no_recomiendo").is(":visible") ){
        $(".content_motivos_no_recomiendo").slideToggle();  
      }

      if($(this).hasClass('active')){
        vote_params.voto = -1;
      }else{
        vote_params.voto = 0;
      }
    });

    //Botones opciones no recomieno

    $('.calidad_servicio').on('click', function(){
      $(this).toggleClass('active');
      if($(this).hasClass('active')){
        vote_params.calidad = 1;
      }else{
        vote_params.calidad = 0;
      }
    });

    $('.cumplimiento_plazos').on('click', function(){
      $(this).toggleClass('active');
      if($(this).hasClass('active')){
        vote_params.cumplimiento = 1;
      }else{
        vote_params.cumplimiento = 0;
      }
    });

    $('.aspectos_administrativos').on('click', function(){
      $(this).toggleClass('active');
      if($(this).hasClass('active')){
        vote_params.administrativo = 1;
      }else{
        vote_params.administrativo = 0;
      }
    });

    //Boton recomiendo
    $(".btn_recomiendo").on('click', function(){
      $(this).toggleClass('active');
      $(".content_motivos_no_recomiendo").find('.clr').addClass('btn_rotate');
      if($(".btn_no_recomiendo").hasClass('active')){
        $(".btn_no_recomiendo").removeClass('active');
        //$(".content_motivos_no_recomiendo").slideToggle();
      }
      if($(this).hasClass('active')){
        $(".content_motivos_no_recomiendo").slideDown();
      }else{
        $(".content_motivos_no_recomiendo").slideUp();
      }
      
      if($(this).hasClass('active')){
        vote_params.voto = 1;
      }else{
        vote_params.voto = 0;
      }
    });

    $('form#form_recomendacion_empresa').on('submit', function(e){
        //$('form#form_recomendacion_empresa p.status').removeClass('message_ok');
        //$('form#form_recomendacion_empresa p.status').removeClass('message_error');
        //$('form#form_recomendacion_empresa p.status').show().text(ajax_login_object.loadingmessage);
        e.preventDefault();   
        
        vote_params.mensaje = $('form#form_recomendacion_empresa [name="comentarios"]').val();
        
        datos = { 
          'action': 'ajaxvoteop', //calls wp_ajax_nopriv_ajaxvoteop
          'voto': vote_params.voto, 
          'mensaje': vote_params.mensaje, 
          'calidad': vote_params.calidad*vote_params.voto,
          'cumplimiento': vote_params.cumplimiento*vote_params.voto,
          'administrativos': vote_params.administrativo*vote_params.voto, 
          'check_empresa' : $("input[name='trabaje_con_empresa']").is(":checked"),
          'security': $('form#form_recomendacion_empresa #signonsecurity').val(), 
        };

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: ajax_voteop_object.ajaxurl,
            data: datos,
            success: function(data){
                if (data.vote_ok == true){
                    $('form#form_recomendacion_empresa p.status').addClass('message_ok');
                }else{
                    $('form#form_recomendacion_empresa p.status').addClass('message_error');
                }
                $('form#form_recomendacion_empresa p.status').text(data.message);
                if (data.vote_ok == true){
                  if(datos.voto > 0){
                    $( "a[data-task='like']" ).trigger('click');    
                  }
                  if(datos.voto < 0){
                    $( "a[data-task='unlike']" ).trigger('click');    
                  }
                  setTimeout(function(){
                    window.location.href = data.redirect;
                  }, 3000);
                }
            }
        });      
    });
}

inicializarVotacion();













