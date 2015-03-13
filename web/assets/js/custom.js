							$('#categorias').change(function(e) {
						
									cate = $("#categorias option:selected").val();
									
									$('#subcategoria').find('option').remove();
									
									$.post("/backend/item/subcategorias", { padre:cate}, function(result){
									
										$.each(result, function(i,item) {
											
											$("<option value='"+item["id"]+"'>"+item["nombre"]+"</option>").appendTo("#subcategoria");
																						
										});
										
									}, "json")
							
							});


						$('.image-popup-vertical-fit').magnificPopup({
								type: 'image',
								closeOnContentClick: true,
								mainClass: 'mfp-img-mobile',
								image: {
									verticalFit: true
								}
								
							});
						
					$(document).ready(function() {

						$("#contactForm").RSV({
							  onCompleteHandler: $(this).submit(),
				  			  displayType: "alert-one",
							  errorFieldClass: "field-error",
							  rules: [
											"valid_email,datos[email],Por favor ingrese un email correcto.",
											"required,datos[email],Por favor ingrese su email.",
											"required,datos[nombre],Por favor ingrese su nombre.",
											"required,datos[mensaje],Por favor ingrese su consulta / mensaje."
							  ]
						 });
						
					});
