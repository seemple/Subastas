
		<div class="container">
            <div class="row">
			<!--
				<div class="container container-pagination">
					<div id="pagination-lettters" class="pagination clearfix"> 
						<ul> 
							<li class="disabled"><a href="#">Prev</a></li> 
							<li class="active"><a href="#">A</a></li> 
							<li><a href="#">B</a></li> 
							<li><a href="#">C</a></li>
							<li><a href="#">D</a></li> 
							<li><a href="#">E</a></li> 
							<li><a href="#">F</a></li> 
							<li><a href="#">F</a></li> 
							<li><a href="#">G</a></li> 
							<li><a href="#">H</a></li> 
							<li><a href="#">I</a></li> 
							<li><a href="#">J</a></li> 
							<li><a href="#">K</a></li> 
							<li><a href="#">L</a></li> 
							<li><a href="#">M</a></li>
							<li><a href="#">N</a></li> 
							<li><a href="#">Ñ</a></li> 
							<li><a href="#">O</a></li> 
							<li><a href="#">P</a></li> 
							<li><a href="#">Q</a></li> 
							<li><a href="#">R</a></li> 
							<li><a href="#">S</a></li> 
							<li><a href="#">T</a></li> 
							<li><a href="#">W</a></li> 
							<li><a href="#">X</a></li> 
							<li><a href="#">Y</a></li> 
							<li><a href="#">Z</a></li> 
							
							<li><a href="#">Next</a></li> 
						</ul> 
					</div>
				</div>-->
				<div class="clearfix"></div>
				<div class="row">
						<section id="projects">
							<ul id="thumbs" class="portfolio">
								<?php foreach($data['usuarios'] as $us){ ?>
                               <li class="item-thumbs span3" data-id="id-0" data-type="web">
									
									<a class="hover-wrap fancybox" data-fancybox-group="gallery" title="<? echo $us["nombre"]." ".$us["apellido"];?>" href="<? echo base_url();?>socios/<? echo url_title($us["nombre"]." ".$us["apellido"]);?>/<? echo $us["id"];?>">
										<span class="overlay-img"></span>
										<span class="overlay-img-thumb font-icon-plus"></span>
									</a>
									
									<? if ($us["imagen"]!="") { ?><img src="<? echo base_url();?>fotos/socios/thumb_<? echo $us["imagen"];?>" alt="<? echo $us["nombre"]." ".$us["apellido"];?>"><? } else {?>
                                    <img src="<? echo base_url();?>img/watermark-2.png" alt="<? echo $us["nombre"]." ".$us["apellido"];?>">
                                    <? } ?>
								</li>
                                <?php	} ?>
								


							</ul>

						
					</div>	
				
                <div class="container">
				<?php if (isset($data["paginador"])) { ?>
                                        <div class="pagination clearfix text-center"> 
                                            <? echo $data["paginador"];?>
                                        </div>
                <?php }?>
				</div>
                
			</div>
		</div>
	</section>