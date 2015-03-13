		<div class="container">
			<div class="row">
				
				
				
				<div class="span12" id="ficha-martilleros">
				
					<div class="span8 no-margin left-ficha-martilleros">
						<h1><? echo $data["user"][0]["nombre"]." ". $data["user"][0]["apellido"]; ?></h1>


						<div class="span8 no-margin text-martilleros">

							<div class="span1 no-margin">
								<i class="icon-quote-left icon-48"></i>
							</div>

							<div class="span6 no-margin">
								<p><? echo $data["user"][0]["descrip"]; ?></p>
							</div>

							<div class="clearfix"></div>

							<?php $cantidad = count($data); 
                            
                            if ($cantidad>0) {
                            
                            ?>
                            
							<h5>Otras operaciones del socio:</h5>
							<div class="well otras-propiedades">
                            <?
							$x = 0;  foreach($data["props"] as $item){
                            $imagen = get_imagen($item["id"]);
                            $cant = count($imagen[0]["imagen"]);
							?>
                            <div class="row-fluid">
								<div class="span12 otras-propiedades-ind">
									<? if (count($imagen[0]["imagen"])>0){ ?>
                                    <div class="span1 no-margin"><img src="<?php echo base_url("fotos-galeria")."/thumb_".$imagen[0]["imagen"];?>" /></div>
                                    <? } ?>
									<div class="span11">
										<div class="clearfix" style="margin-bottom:5px">
                                            <div class="btn btn-mini btn-blue pull-left"><b><? echo $item["tipo"];?></b></div>
                                            <a style="margin-left:10px; font-weight:bold;" href="<? echo base_url(ucfirst($item['tipo']))."/".url_title($item['titulo'])."/".$item['id'];?>" class="pull-left"><? echo $item["titulo"];?></a>
                                        </div>
										<div><? echo strip_tags($item["descrip"]);?></div>
									</div>
									<div class="clearfix"></div>
								</div>
                            </div>
                            <? } ?>
                                
							</div>
                            
                            <? } ?>
								
					</div>
                            
					</div>
					<div class="span4 right-ficha-propiedades">
									<? if ($data["user"][0]["imagen"]!="") { ?><img src="<? echo base_url();?>fotos/socios/thumb_<? echo $data["user"][0]["imagen"];?>" alt="<? echo $data["user"][0]["nombre"]." ".$data["user"][0]["apellido"];?>"><? } else {?>
                                    <img src="<? echo base_url();?>img/watermark-2.png" alt="<? echo $data["user"][0]["nombre"]." ".$data["user"][0]["apellido"];?>">
                                    <? } ?>
						<h5>Datos de contacto</h5>
						<div class="data-contact"> 
							<? if (isset( $data["user"][0]["telefono"])) { ?><div><b>Teléfono:</b> <? echo $data["user"][0]["telefono"]; ?></div><? }?>
							<div><b>Email:</b> <? echo $data["user"][0]["email"]; ?></div>
							<? if (isset( $data["user"][0]["direccion"])) { ?><div><b>Dirección:</b> <? echo $data["user"][0]["direccion"]; ?></div><? } ?>
							<? if (isset( $data["user"][0]["ciudad"])) { ?><div><b>Ciudad:</b> <? echo $data["user"][0]["localidad"]; ?></div><? } ?>
							<? if (isset( $data["user"][0]["web"])) { ?><div><b>Web:</b> <? echo $data["user"][0]["web"]; ?></div><? }?>
						</div>
					</div>

				</div>				
			</div>
		</div>
