<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "bf46a354-71b6-4efb-a866-5f4b50ee2c0d", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>

<?
$date = DateTime::createFromFormat('Y-m-d', $data[0]["created_at"]);
$fecha = $date->format('d-m-Y');	
?>
<div class="span8">
				
					<article>
						<div class="row">
					
							<div class="span8">
								<h3 class="title-ficha-noticias"><? echo $data[0]["title"];?></h3>
								<div class="clearfix">
								<div  class="post-image  pull-left " style="width:100%">
								
									<div class="bottom-article">
										<ul class="meta-post" style="margin-top:10px;">
											<li><i class="icon-calendar"></i><? echo $fecha;?></li>
											<? if ($data[0]["adjunto"]!="") { ?>
                                            <li>
                                            <i class="icon-folder-open"></i><a href="<? echo base_url()."/descargas/".$data[0]["adjunto"];?>">Descargar adjunto</a>
                                            </li>
                                            <? } ?>
										</ul>
										<div class="pull-right">
                                        <span class='st_facebook_large' displayText='Facebook'></span>
                                        <span class='st_twitter_large' displayText='Tweet'></span>
                                        <span class='st_linkedin_large' displayText='LinkedIn'></span>
                                        <span class='st_email_large' displayText='Email'></span>

                                        </div>
									</div>
								</div>
								</div>
								
								<? if (!empty($data[0]["photo"])) {?>
                                <a href="<? echo base_url("fotos");?>/articulos/<? echo $data[0]["photo"];?>" class="fancy"><img class="image-ficha-noticias" src="<? echo base_url("fotos");?>/articulos/thumb_<? echo $data[0]["photo"];?>" /></a>
								<? } ?>
                                <div class="well"><? echo $data[0]["deck"];?></div>
                                <div><? echo $data[0]["note"];?></div>
                                <? if (!empty($data[0]["link"])) {?>
                                <div style="margin-bottom:20px; margin-top:20px;"><i class="icon-link"></i><strong>Mas info:</strong> <? echo $data[0]["link"];?></div>
								<? }?>
                            </div>
						</div>
					</article>

				</div>	