<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "bf46a354-71b6-4efb-a866-5f4b50ee2c0d", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>

<div class="span8">
					
                    <? $imagenes = get_galeria($data[0]["id"]);
					?>
                	
                    <div class="row">
                    
					<div class="span3" >
						<? if (!empty($imagenes)) {?>
                        <div class="flexslider">
								<ul class="slides">
									<? foreach ($imagenes as $item) { ?>
                                    <li>
									<img src="<? echo base_url("fotos-galeria")."/thumb_".$item["nombre"];?>" alt="" />
									</li>
									<? } ?>
                                </ul>
						</div>
						<div class="clearfix"></div>
                        <? }?>
						<div class="google-map " style="margin-top:50px">
								<? echo getMap($data[0]["direccion"].",".$data[0]["ciudad"].",".$data[0]["provincia"].", Argentina");?>
						</div>
					</div>
					<div class="span5">
						
                        <div>
                        <span class="label <?php echo  ($data[0]['tipo'] == 'Venta')? 'label-info' : 'label-important';  ?>"><? echo $data[0]["tipo"];?></span>
                        <? 
						$equal= array("id"=>$data[0]["categoria"]);
						$categoria = get_string("categorias",NULL,$equal);
						$equal= array("id"=>$data[0]["sub"]);
						$sub = get_string("subcategorias",NULL,$equal);
;?>
                        <span class="label"><? echo ucfirst(utf8_decode($categoria[0]["nombre"]));?></span>
                        <span class="label"><? echo ucfirst(utf8_decode($sub[0]["nombre"]));?></span>
                        </div>
						
                        <h3 style="margin-bottom:0px !important;"><? echo $data[0]["titulo"];?></h3>
						<p><? echo $data[0]["descrip"];?></p>
						
                        <div class="well">
                            <h6 style="margin-bottom:5px !important;"><b>Ubicación:</b></h6>
                            <p class="no_margin"><b><? echo $data[0]["direccion"];?></b> - <? echo $data[0]["ciudad"];?> - <? echo $data[0]["provincia"];?></p>
						</div>
						
						<div class="info-remate">
							
							<div style="margin-bottom:10px;">
                            	<? if (!empty($data[0]["ambientes"])) {?><i class="icon-home"></i> <b>Superficie:</b> <? echo $data[0]["ambientes"];?> <? }?> 
							</div>
							<div style="margin-bottom:10px;">

                            	<? if (!empty($data[0]["expediente"])) {?><i class="icon-folder-open-alt"></i> <b>Expediente:</b> <? echo $data[0]["juzgado"]. "-".$data[0]["expediente"]."-".$data[0]["ano"];?> <? }?>
                            	<? if (!empty($data[0]["expediente"])) {?><a href="http://www.pjn.gov.ar/" target="_blank" class="btn btn-blue btn-mini">Ver Expediente</a><? }?>
                            	<? if (!empty($data[0]["link_edicto"])) {?><a href="<? echo base_url("descargas");?>/<? echo $data[0]["link_edicto"];?>" target="_blank" class="btn btn-red btn-mini">Ver Edicto</a><? }?>
                            </div>
							
                            <? if ($data[0]["tipo"] =="Remate") { 
							
							//formateo la fecha
							$date = DateTime::createFromFormat('Y-m-d', $data[0]["fecha"]);
							$fecha = $date->format('d-m-Y');	


							?>
                            <div style="margin-bottom:10px;">
                                <i class="icon-calendar"></i><b>Fecha del Remate:</b> <? echo $fecha;?> | <? echo $data[0]["horario"];?>
                            </div>
                            <div style="margin-bottom:10px;">
                                <i class="icon-legal"></i><b>Dirección del Remate:</b> <? echo $data[0]["dire_remate"];?>
                            </div>
							<? }; ?>
                            
                            <div class="precio-base" style="margin-bottom:10px;">
                                <i class="icon-money"></i><b>Precio <? echo ($data[0]["tipo"]=="Remate") ? "base" : ""; ?>:</b> <? echo $data[0]["precio"];?>
                            </div>
							
                            <div style="margin-bottom:10px;">
                                <i class="icon-barcode">
                                </i> <b>Codigo:</b> <? echo $data[0]["codigo"];?>
                            </div>
						
                        </div>


                        <? $socio = get_socio($data[0]["idSocio"]);?>
						<div class="span5">
                        
                            <div class="row">
                            
                                <div class="span2 text-center">
                                <? if (!empty($socio[0]["imagen"])) {?>
                                    <img src="<? echo base_url("fotos");?>/socios/<? echo $socio[0]["imagen"];?>" style="border:1px solid #9b9b9b" alt="<? echo $socio[0]["nombre"]." ".$socio[0]["apellido"];?>" />
                                <? } else {?>
									<img src="<? echo base_url();?>/img/watermark.png" style="border:1px solid #9b9b9b" alt="" />
                                <? }?>
                                </div>
                                
                                <div class="span3 text-center">
                                	<div class="row" style="margin-bottom:0px !important;">
                                    <a class="btn btn-large btn-danger btn-rounded contact-martillero" href="mailto:<? echo $socio[0]["email"];?>">Contactar martillero</a></div>
                                    
                                    <div class="row">
                                        <div class="span3 text-center">
                                        <span class='st_facebook_large' displayText='Facebook'></span>
                                        <span class='st_twitter_large' displayText='Tweet'></span>
                                        <span class='st_linkedin_large' displayText='LinkedIn'></span>
                                        <span class='st_email_large' displayText='Email'></span>
                                        </div>
                                	</div>
                                
                                </div>
                            </div>
                        
						</div>


                      </div>
                      
                      <div class="span8">
                          <div class="well">El contenido y veracidad de los avisos que se publiquen en esta página web son de exclusiva responsabilidad de los Socios anunciantes. La Corporación no se hace responsable de los mismos, siendo esta página web sólo un medio que ofrece la Corporación a sus Socios para que publiquen avisos.</div>
                      </div>
						
				</div>
				<script src="<? echo base_url();?>/js/jquery.flexslider.js"></script> 
				<script type="text/javascript" charset="utf-8">
				  $(window).load(function() {
					$('.flexslider').flexslider();
				  });
				</script>