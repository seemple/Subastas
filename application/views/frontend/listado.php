<div class="col-md-9">

						<!-- CATEGORY TITLE -->

						<?php $cantidad = count($data["clasificados"]); 
                        
                        if ($cantidad>0) {
                        
						?>

						<h3 class="page-header nomargin-top">
							<strong class="styleColor"><? echo $data["clasificados"][0]["tipo"];?></strong> 
						</h3>

                        <?
						
                        $x = 0;  foreach($data["clasificados"] as $item){
                
                        $imagen = get_imagen($item["id"]);
                        $cant = count($imagen);
                        
                        ?>
						
                        <!-- FEATURED -->
						<div class="row">
							
                            <div class="col-md-6">
								<!-- carousel -->
								<div class="owl-carousel controlls-over nomargin" data-plugin-options='{"items": 1, "singleItem": true, "navigation": true, "pagination": true, "transitionStyle":"fadeUp", "itemsScaleUp":true}'>
                                
								<? if ($cant>0){ ?>
                                <div><img src="<?php echo base_url("fotos-galeria")."/thumb_".$imagen[0]["imagen"];?>" class="img-responsive" /></div>
                                <? } else { ?>
                                <div><img src="<?php echo base_url("img")."/watermark.png";?>" class="img-responsive" /></div>
                                <? } ?>
								</div>
								<!-- /carousel -->
							</div>
							
                            <div class="col-md-6">
								<h2><a class="styleColor" href="<? echo base_url(ucfirst($item['tipo']))."/".url_title($item['titulo'])."/".$item['id'];?>"><?php echo $item['titulo']; ?></a></h2>
								<small class="block styleSecondColor fsize20"><?php echo $item['precio']; ?></small>
								<p><?php $descrip = strip_tags($item['descrip']); echo word_limiter($descrip,50); ?></p>
								<p class="clearfix">
									<span class="fsize12 pull-right">
										<i class="fa fa-dollar" title="Precio"></i> Precio: <?php echo $item['precio']; ?> -&nbsp;&nbsp;
										<i class="fa fa-flag" title="Ambientes"></i> Ambientes: <?php echo $item['ambientes']; ?> -&nbsp;&nbsp;  
										<i class="fa fa-expand" title="Superficie"></i> Superficie: <?php echo $item['superficie']; ?>
									</span>
                                    
								</p>
								<a href="<? echo base_url(ucfirst($item['tipo']))."/".url_title($item['titulo'])."/".$item['id'];?>" class="btn btn-default">VER DETALLES</a>
							</div>
						</div>
                        
                        <hr class="half-margins" />



                        
						<?php $x++; } } else {?>
                        
						<div class="row">
							<div class="col-md-12">
                                <h3 class="page-header nomargin-top">
                                    <strong class="styleColor">Resultado de b&uacute;squeda</strong> 
                                </h3>
                                <p class="lead">No se encontraron operaciones con los criterios seleccionados.</p>
                                <p><a href="<? echo base_url();?>home" class="btn btn-danger">< VOLVER</a></p>            
                            </div>
                        </div>
                        
                        <?php } ?>
                        
						<?php if (!empty($data["paginador"])) { ?>
						<!-- PAGINATION -->
						<div class="row">

							<div class="col-md-6 text-left responsive-text-center">
								<p class="hidden-xs pull-left nomargin padding30"><strong>Mostrando</strong> <? echo $data["actual"];?> de <? echo $data["total"];?> resultados.</p>
							</div>


						</div>

                        <div class="col-md-6 text-right">
            						<? echo $data["paginador"];?>
						</div>

						 <?php }?>

				
					</div>