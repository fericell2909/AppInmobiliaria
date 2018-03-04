$(document).ready(function() {

	
	
	$editar = $('#editar').val();

	if ($editar != "Editar" ) {
		$('#provincia_id option').remove();
	jQuery.ajax({
				  url: '../Zona/Listar_Provincias_x_Departamento/' + $('select[name=departamento_id]').val(),
				  type: 'POST',
				  data: {id: $('select[name=departamento_id]').val(),
						 "_token": $('meta[name="csrf-token"]').attr('content'),},
				  success: function(respuesta){

				  		$.each(respuesta, function(index, val) {

		                            $('#provincia_id').append($('<option>', { 
		                                value:respuesta[index].id,
		                                text : respuesta[index].cNomZona
		                            }));
		                        });
				  		respuesta = null;
				  		
				  		$('#provincia_id').show();
				  		$('#distrito_id option').remove();
							jQuery.ajax({
										  url: '../Zona/Listar_Distritos_x_Provincia/' + $('select[name=provincia_id]').val(),
										  type: 'POST',
										  data: {id: $('select[name=provincia_id]').val(),
												 "_token": $('meta[name="csrf-token"]').attr('content'),},
										  success: function(respuesta){

										  		$.each(respuesta, function(index, val) {

								                            $('#distrito_id').append($('<option>', { 
								                                value:respuesta[index].id,
								                                text : respuesta[index].cNomZona
								                            }));
								                        });
										  		respuesta = null;
										  		
										  		$('#distrito_id').fadeIn("slow");
										  		//$('#provincia_id').show();
										  }
										})

				  }
				});
		
	}


	$('#estilo_id option').remove();
	jQuery.ajax({
				  url: '../Estilos/Listar_Estilos_x_Tipo/' + $('select[name=tipos_id]').val(),
				  type: 'POST',
				  data: {id: $('select[name=tipos_id]').val(),
						 "_token": $('meta[name="csrf-token"]').attr('content'),},
				  success: function(respuesta){

				  		$.each(respuesta, function(index, val) {

		                            $('#estilo_id').append($('<option>', { 
		                                value:respuesta[index].id,
		                                text : respuesta[index].nombre_detalle_tipo
		                            }));
		                        });
				  		respuesta = null;
				  		
				  		$('#estilo_id').show();

				  }
				});

	$("select[name=tipos_id]").change(function(){
		$('#estilo_id option').remove();
		jQuery.ajax({
				  url: '../Estilos/Listar_Estilos_x_Tipo/' + $('select[name=tipos_id]').val(),
				  type: 'POST',
				  data: {id: $('select[name=tipos_id]').val(),
						 "_token": $('meta[name="csrf-token"]').attr('content'),},
				  success: function(respuesta){

				  		$.each(respuesta, function(index, val) {

		                            $('#estilo_id').append($('<option>', { 
		                                value:respuesta[index].id,
		                                text : respuesta[index].nombre_detalle_tipo
		                            }));
		                        });
				  		respuesta = null;
				  		
				  		$('#estilo_id').show();

				  }
				});

	});	

	// Llamada a Ajax para Carga de Provincias

	$("select[name=departamento_id]").change(function(){

		$('#provincia_id option').remove();
		jQuery.ajax({
				  url: '../Zona/Listar_Provincias_x_Departamento/' + $('select[name=departamento_id]').val(),
				  type: 'POST',
				  data: {id: $('select[name=departamento_id]').val(),
						 "_token": $('meta[name="csrf-token"]').attr('content'),},
				  success: function(respuesta){

				  		$.each(respuesta, function(index, val) {

		                            $('#provincia_id').append($('<option>', { 
		                                value:respuesta[index].id,
		                                text : respuesta[index].cNomZona
		                            }));
		                        });
				  		respuesta = null;
				  		
				  		$('#provincia_id').show();

				  		$('#distrito_id option').remove();
						jQuery.ajax({
								  url: '../Zona/Listar_Distritos_x_Provincia/' + $('select[name=provincia_id]').val(),
								  type: 'POST',
								  data: {id: $('select[name=provincia_id]').val(),
										 "_token": $('meta[name="csrf-token"]').attr('content'),},
								  success: function(respuesta){

								  		$.each(respuesta, function(index, val) {

						                            $('#distrito_id').append($('<option>', { 
						                                value:respuesta[index].id,
						                                text : respuesta[index].cNomZona
						                            }));
						                        });
								  		respuesta = null;
								  		
								  		$('#distrito_id').show();
								  		//$('#provincia_id').show();
								  }
								})
				  }
				})
				.fail(function() {
		          //console.log("error");
		    })

		      event.preventDefault();
	});

	$("select[name=provincia_id]").change(function(){

		$('#distrito_id option').remove();
		jQuery.ajax({
				  url: '../Zona/Listar_Distritos_x_Provincia/' + $('select[name=provincia_id]').val(),
				  type: 'POST',
				  data: {id: $('select[name=provincia_id]').val(),
						 "_token": $('meta[name="csrf-token"]').attr('content'),},
				  success: function(respuesta){

				  		$.each(respuesta, function(index, val) {

		                            $('#distrito_id').append($('<option>', { 
		                                value:respuesta[index].id,
		                                text : respuesta[index].cNomZona
		                            }));
		                        });
				  		respuesta = null;
				  		
				  		$('#distrito_id').show();
				  		//$('#provincia_id').show();
				  }
				})
				.fail(function() {
		          //console.log("error");
		    })

		      event.preventDefault();
	});

	$('#ConsultaBusquedaForm').on('click',function(evt)
	{
			evt.preventDefault();
			alert('Hizo Click');

	})

	$('#btnRegistrarUbicacion , #btnEditarGuardarUbicacion').on('click', function (evt) {
		
		var titulo_ubicacion = $('#titulo_ubicacion').val().trim();

	    if( titulo_ubicacion == null || titulo_ubicacion.length == 0  ) {
	       titulo_ubicacion = null;
	       $("#ErrorMensaje-titulo_ubicacion").text('El Titulo de Ubicación no puede ser vacío.');
	         $("#ErrorMensaje-titulo_ubicacion").show();
	         $("#titulo_ubicacion").focus();
	         return false;
	       }

	    var descripcion_id = $('#descripcion_id').val().trim();

	    if( descripcion_id == null || descripcion_id.length == 0  ) {
	       descripcion_id = null;
	       $("#ErrorMensaje-descripcion_id").text('La breve descripción no puede ser vacío.');
	         $("#ErrorMensaje-descripcion_id").show();
	         $("#descripcion_id").focus();
	         return false;
	       }

	    var precio_ubicacion = $('#precio_ubicacion').val().trim();
	  
	    if( precio_ubicacion == null || precio_ubicacion.length == 0 || precio_ubicacion <= 0  ) {
	       precio_ubicacion = null;
	       $("#ErrorMensaje-precio_ubicacion").text('Debe Ingresar un Precio Válido.');
	         $("#ErrorMensaje-precio_ubicacion").show();
	         $("#precio_ubicacion").focus();
	         return false;
	       }   

	    var medida_cantidad = $('#medida_cantidad').val().trim();
	  
	    if( medida_cantidad == null || medida_cantidad.length == 0 || medida_cantidad <= 0  ) {
	       medida_cantidad = null;
	       $("#ErrorMensaje-medida_cantidad").text('Debe Ingresar una Medida Válida.');
	         $("#ErrorMensaje-medida_cantidad").show();
	         $("#medida_cantidad").focus();
	         return false;
	       }

		var contacto_nombres_apellidos = $('#contacto_nombres_apellidos').val().trim();

	    if( contacto_nombres_apellidos == null || contacto_nombres_apellidos.length == 0  ) {
	       contacto_nombres_apellidos = null;
	       $("#ErrorMensaje-contacto_nombres_apellidos").text('Los Nombre y Apellidos del Contacto deben ser validos.');
	         $("#ErrorMensaje-contacto_nombres_apellidos").show();
	         $("#contacto_nombres_apellidos").focus();
	         return false;
	       }

	    var contacto_direccion = $('#contacto_direccion').val().trim();

	    if( contacto_direccion == null || contacto_direccion.length == 0  ) {
	       contacto_direccion = null;
	       $("#ErrorMensaje-contacto_direccion").text('La Direccion del contacto no puede ser vacío.');
	         $("#ErrorMensaje-contacto_direccion").show();
	         $("#contacto_direccion").focus();
	         return false;
	       }

	    var cDireccionNegocio = $('#cDireccionNegocio').val().trim();

	    if( cDireccionNegocio == null || cDireccionNegocio.length == 0  ) {
	       cDireccionNegocio = null;
	       $("#ErrorMensaje-cDireccionNegocio").text('La Direccion no puede ser vacío.');
	         $("#ErrorMensaje-cDireccionNegocio").show();
	         $("#cDireccionNegocio").focus();
	         return false;
	       }

	    
		
		var contacto_dni = $('#contacto_dni').val().trim();

	    if( contacto_dni == null || contacto_dni.length == 0  || contacto_dni.length < 8) {
	       contacto_dni = null;
	       $("#ErrorMensaje-contacto_dni").text('Debe ingresar dni valido.');
	         $("#ErrorMensaje-contacto_dni").show();
	         $("#contacto_dni").focus();
	         return false;
	       }	   	
	  
	  var contacto_celular = $('#contacto_celular').val().trim();

	    if( contacto_celular == null || contacto_celular.length == 0  || contacto_celular.length < 9) {
	       contacto_celular = null;
	       $("#ErrorMensaje-contacto_celular").text('Debe ingresar un celular valido.');
	         $("#ErrorMensaje-contacto_celular").show();
	         $("#contacto_celular").focus();
	         return false;
	       }

	   var contacto_email = $('#contacto_email').val().trim();

	    if( contacto_email == null || contacto_email.length == 0  ) {
	       contacto_email = null;
	       $("#ErrorMensaje-contacto_email").text('El email no puede ser vacio.');
	         $("#ErrorMensaje-contacto_email").show();
	         $("#contacto_email").focus();
	         return false;
	       }

	    if (!ValidarEmail(contacto_email)) {
		    	contacto_email=null;
		       $("#ErrorMensaje-contacto_email").text('Debe Ingresar un Email valido. Ejm: alguien@example.com');
  				$("#ErrorMensaje-contacto_email").show();
  				$("#contacto_email").focus();
  				return false;
		    }
		 

		$editar = $('#editar').val();
    
	    if ($editar != "Editar" ) 
	    {

	    	$('#RegistroUbicacionForm').submit();
	    } else {
	  
	    	$('#EditarUbicacionForm').submit();	
	    }

	});

	$('#titulo_ubicacion').on("keypress",function (){
		$("#ErrorMensaje-titulo_ubicacion").hide();
	})

	$('#descripcion_id').on("keypress",function (){
		$("#ErrorMensaje-descripcion_id").hide();
	})

	$('#precio_ubicacion').on("keypress",function (){
		$("#ErrorMensaje-precio_ubicacion").hide();
	})

	$('#medida_cantidad').on("keypress",function (){
		$("#ErrorMensaje-medida_cantidad").hide();
	})

	$('#contacto_nombres_apellidos').on("keypress",function (){
		$("#ErrorMensaje-contacto_nombres_apellidos").hide();
	})

	$('#contacto_direccion').on("keypress",function (){
		$("#ErrorMensaje-contacto_direccion").hide();
	})

	$('#contacto_dni').on("keypress",function (){
		$("#ErrorMensaje-contacto_dni").hide();
	})

	$('#contacto_celular').on("keypress",function (){
		$("#ErrorMensaje-contacto_celular").hide();
	})

	$('#contacto_email').on("keypress",function (){
		$("#ErrorMensaje-contacto_email").hide();
	})

	$('#cDireccionNegocio').on("keypress",function (){
		$("#ErrorMensaje-cDireccionNegocio").hide();
	})
	


	$("#contacto_celular, #contacto_dni").on("keydown", function (e) {
		//console.log(e.keyCode);

		if ( e.keyCode == 8 ||  e.keyCode == 37 ||  e.keyCode == 39 )
		{
			return true;
		}

		if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 || (e.keyCode == 65 && e.ctrlKey === true) || (e.keyCode >= 35 && e.keyCode <= 39)) 
		{
            return false;
        }
 
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105 )) {
            e.preventDefault();
        }
    })


	var map = null;
	var infoWindow = null;
 	initialize();


function openInfoWindow(marker) {
    var markerLatLng = marker.getPosition();
    $('#nLatitudNegocio').val(markerLatLng.lat());
    $('#nLongitudNegocio').val(markerLatLng.lng());
}

function ValidarEmail(email){
		var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
		 if (!regex.test(email)) {
		 	return false; //email incorrecto
		 }
		 else
		 {
		 	return true; // email correcto
		 }
}

function initialize() {

    $editar = $('#editar').val();
    
    if ($editar != "Editar" ) 
    {

    	var myLatlng = new google.maps.LatLng(-9.123218781402, -78.53048789703);	
    } else {
    	var myLatlng = new google.maps.LatLng($('#nLatitudNegocio').val(), $('#nLongitudNegocio').val());	
    }

    var myOptions = {
      zoom: 12,
      center: myLatlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
 
    map = new google.maps.Map($('#map_canvas').get(0), myOptions);
    

    infoWindow = new google.maps.InfoWindow({});
 
    var marker = new google.maps.Marker({
        position: myLatlng,
        draggable: true,
        map: map,
        title:'Arrastre el Marcador Hasta Ubicar su Negocio.'
    });
 
    google.maps.event.addListener(marker, 'dragend', function(){ openInfoWindow(marker); });
    google.maps.event.addListener(marker, 'click', function(){ openInfoWindow(marker); });
}

	
});