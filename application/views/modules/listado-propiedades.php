<div class="row">

							<? foreach ($data as $item) {
                            
                            $imagen = get_imagen($item["id"]);
                        	$cant = count($imagen);

                            ?>
                            
                            
                            <div class="col-md-4 col-sm-6 col-xs-12">

								<!-- item -->
								<div class="item-box">
                                
									<figure>
										<a class="item-hover" href="<? echo base_url(ucfirst($item['tipo']))."/".url_title($item['titulo'])."/".$item['id'];?>">
											<span class="overlay color2"></span>
											<span class="inner">
												<span class="block fa fa-plus fsize20"></span>
												<strong>AMPLIAR</strong>
										</span>
										</a>
                                <? if ($cant>0){ ?>
                                        <img src="<?php echo base_url("fotos-galeria")."/thumb_".$imagen[0]["imagen"];?>" class="img-responsive" />
                                        <? } else { ?>
                                        <img src="<?php echo base_url("img")."/watermark.png";?>" class="img-responsive" />
                                <? } ?>
                                	
                                    </figure>
									<div class="item-box-desc">
										<h4><? echo $item["titulo"];?></h4>
								    <span class="label <?php echo  ($item['tipo'] == 'Alquiler')? 'label-info' : ( $item['tipo'] == 'Venta' ? 'label-danger': 'label-default');  ?> fsize12 margin-top10"><? echo ucfirst($item["tipo"]);?></span>
										<p><? echo strip_tags($item["descrip"]);?></p>
									</div>
								</div>
								<!-- /item -->

							</div>
                            
                            <? } ?>

</div>