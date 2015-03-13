                        <!-- Oportunidad -->

								<? if (count($oportunidades) > 0 ) {?>
						   		<span class="label label-danger fsize18 col-md-12 bdr_recto" >Oportunidad!</span>

                                <div class="white-row">

                                    <ul class="nav  nav-stacked  fsize14 margin-top30">
                                  
                              			<? foreach ($oportunidades as $item) {?>
                                         <li><a href="<? echo base_url(ucfirst($item['tipo']))."/".url_title($item['titulo'])."/".$item['id'];?>" class="color-gris"><?php echo $item['titulo']; ?></a></li>
                                    	<? }?>
                                    </ul>
                                    
                                  </div>
                                  
                                  <? }?>
