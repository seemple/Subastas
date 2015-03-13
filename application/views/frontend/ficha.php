<div class="col-md-9">
		    <? 
						$equal= array("id"=>$data[0]["categoria"]);
						$categoria = get_string("categorias",NULL,$equal);
						$equal= array("id"=>$data[0]["sub"]);
						$sub = get_string("subcategorias",NULL,$equal);
			;?>
	
            <div class="white-row">
                        
                   
			<h5 class="font400 color-rojo"><b><? echo ucfirst(utf8_decode($sub[0]["nombre"]));?> en <? echo $data[0]["tipo"];?> en <? echo $data[0]["ciudad"];?></b>, <? echo $data[0]["provincia"];?></h5>
			<h3 class="margin-bottom10"><strong><? echo $data[0]["titulo"];?></strong> </h3>
			<hr />
		    <div style="margin-bottom:20px;"><? echo strip_tags($data[0]["descrip"]);?></div>

            <div class="row-fluid label-danger fsize14 col-lg-12 margin-bottom20" style="padding: 15px 20px 0px 20px;">
                       <div class="color-white col-md-3 text-center"><h5 class="color-white">Superficie: <strong>(<? echo $data[0]["superficie"];?>)</strong></h5></div>
                       <div class="color-white col-md-3 text-center"><h5 class="color-white">Ambientes: <strong><? echo $data[0]["ambientes"];?>.</strong></h5></div>
                       <div class="color-white col-md-6 text-center"><h5 class="color-white">Direcci&oacute;n: <strong><? echo $data[0]["direccion"];?>, <? echo $data[0]["ciudad"];?>, <? echo $data[0]["provincia"];?></strong></h5></div>
            </div>
                   
            <h4 class="col-md-12 text-center margin-bottom20"><b><? echo strip_tags($data[0]["descrip_2"]);?></b></h4>
                   
            
            <div class="row">
                       <div class="col-md-3">
                       <h4>Venta:<b> <? echo $data[0]["precio"];?></b></h4>
                       </div>
                   
                    <div class="col-md-9">
                      <a href="#contactar" class="btn btn-default pull-right mrg_left">M&aacute;s informaci&oacute;n</a>
                      <a href="#mapa" class="btn btn-default pull-right mrg_left">Ver en mapa</a>              
                      <a href="#contactar" class="btn btn-primary pull-right">Consultar precio</a>
                   </div>
            </div>
            
            <div class="row list-style-none margin-top30">

                    <? $imagenes = get_galeria($data[0]["id"]);
					?>

			  <? foreach ($imagenes as $item) { ?>

              <div class="col-md-6">
                <a href="<? echo base_url("fotos-galeria")."/thumb_".$item["nombre"];?>" class="thumbnail image-popup-vertical-fit"><img src="<? echo base_url("fotos-galeria")."/thumb_".$item["nombre"];?>" class="img-responsive"></a>
              </div>
			  
			  <? } ?>


            </div>
     				

							


			</div><!-- /.white-row -->




						


					

								<!-- MAPA -->
                                <div class="row">
                                
                                    <div class="col-md-6" id="mapa">
                                    	<div class="white-row">
										<? $mapa = getMap($data[0]["direccion"].",".$data[0]["ciudad"].",".$data[0]["provincia"].", Argentina");?>
                                        <h4><b>Direccion / Ubicaci&oacute;n</b></h4>
                                        <div id="gmap_default"><!-- google map --></div>

										<script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=true&amp;#038;ver=3.8.1"></script>
                                        <script type="text/javascript">
                                            function initialize_property_map(){
                                                var propertyLocation = new google.maps.LatLng(<? echo $mapa["lat"];?>, <? echo $mapa["lng"];?>);
                                                var propertyMapOptions = {
                                                    center: propertyLocation,
                                                    zoom: 15,
                                                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                                                    scrollwheel: false
                                                };
                                                var propertyMap = new google.maps.Map(document.getElementById("gmap_default"), propertyMapOptions);
                                                var propertyMarker = new google.maps.Marker({
                                                    position: propertyLocation,
                                                    map: propertyMap
                                                    //, icon: "assets/images/icons/realestate/map.png"
                                                });
                                            }
            
                                            window.onload = initialize_property_map();
                                        </script>
                                        </div>
                                    </div>
    
                                    <!-- CONTACTO-->
                                    <div class="col-md-6" id="contactar">
                                        <div class="red-row">
                                            <p>
                                                <strong class="styleSecondColor fsize17 color-white">&iexcl;Me interesa esta propiedad!</strong>
                                            </p>
        
                                            <form method="post" action="<? echo base_url();?>contacto/clasificado" class="input-group fullwidth" id="contactForm">
        										<input type="hidden" name="datos[clasificado]" value="<? echo $data[0]["titulo"];?>" />
                                                <div class="form-group">
                                                    <input type="text" value="" placeholder="Su Nombre" maxlength="30" class="form-control" name="datos[nombre]">
                                                </div>
        
                                                <div class="form-group">
                                                    <input  type="email" value="" placeholder="Email" maxlength="30" class="form-control" name="datos[email]">
                                                </div>
        
                                                <div class="form-group">
                                                    <textarea maxlength="300" placeholder="Mensaje" rows="3" class="form-control" name="datos[mensaje]"></textarea>
                                                </div>
        <button class="btn fullwidth" style="background-color:#000000; !important; color:#CCCCCC;">Enviar mensaje</button>
                                                
                                            </form>
        
                                        </div>
                                    </div>
                                
                                </div>

						


						




					</div>