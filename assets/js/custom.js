// JavaScript Document
$(document).ready(function() {

	$("#socios_form, #galeria_form, #item_form, #articulos_form").submit(function(){
			$("#descrip").attr("value",$("#editor1").html());
	});
	
	$("#item_form").validate({
	
		errorPlacement: function(error, element) {
    		error.appendTo( element.parent("div").next("div") );
  		},
  		errorElement: "span",
		rules: {
			"datos[idSocio]": "required",
			"datos[titulo]": "required",
			"datos[descrip_2]": "required",
			"datos[direccion]": "required",
			"datos[ciudad]": "required",
			"datos[fecha]": "required",
			"datos[provincia]": "required",
			"datos[tipo]": "required",
			"datos[sub]": "required",
			"datos[precio]": "required"
		  },
		  messages: {
			"datos[titulo]": "Por favor ingrese el titulo del item.",
			"datos[descrip_2]": "Por favor ingrese las caracteristicas destacadas.",
			"datos[idSocio]": "Por favor ingrese el Socio que publica el item.",
			"datos[fecha]": "Por favor ingrese la fecha del item.",
			"datos[direccion]": "Por favor ingrese la direccion del item.",
			"datos[ciudad]": "Por favor ingrese la localidad/barrio del item.",
			"datos[provincia]": "Por favor ingrese la provincia del item.",
			"datos[tipo]": "Por favor ingrese el tipo de item.",
			"datos[sub]": "Por favor ingrese la subcategoria del item.",
			"datos[precio]": "Por favor ingrese el precio/base del item."
		  }


	});	
	
		$("#galeria_form").validate({
	
		errorPlacement: function(error, element) {
    		error.appendTo( element.parent("div").next("div") );
  		},
  		errorElement: "span",
		rules: {
			"datos[nombre]": "required",
			"datos[item_id]": "required",
			"datos[fecha]": "required"
		  },
		  messages: {
			"datos[nombre]": "Por favor ingrese el titulo del item.",
			"datos[item_id]": "Por favor ingrese el item relacionado al album.",
			"datos[fecha]": "Por favor ingrese la fecha del item."
		  }


	});	
		
		$("#socios_form").validate({
	
		errorPlacement: function(error, element) {
    		error.appendTo( element.parent("div").next("div") );
  		},
  		errorElement: "span",
		rules: {
			"datos[nombre]": "required",
			"datos[apellido]": "required",
			"datos[email]": "required"
		  },
		  messages: {
			"datos[nombre]": "Por favor ingrese el nombre del socio.",
			"datos[apellido]": "Por favor ingrese el apellido del socio.",
			"datos[email]": "Por favor ingrese el email del socio."
		  }


	});	
		
			$("#item_id").change(function(e){
				valor = $("#item_id option:selected").text();
				$("#form-input-readonly").attr("value",valor);
			});

});