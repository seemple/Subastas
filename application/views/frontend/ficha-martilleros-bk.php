
	<section id="content">
		<div class="container">
			<div class="row">
				
				
				
				<div class="span12" id="ficha-martilleros">
				
					<div class="span8 no-margin">
						<h1><? echo $data[0]["nombre"]." ".$data[0]["apellido"];?></h1>
						<div class="span8 no-margin text-martilleros">
							<div class="span1 no-margin">
								<i class="icon-quote-left icon-48"></i>
							</div>
							<div class="span6 no-margin">
								<p><? echo $data[0]["descrip"];?></p>
							</div>
							<div class="clear"></div>
							<div class="span6  perfil-martillero">
								<div class="span1 no-margin">
                                <img src="<? echo base_url();?>fotos/socios/<? echo $data[0]["imagen"];?>" class=" bordered" alt=""></div>
								<div class="span4 no-margin">
									<p class="name"><? echo $data[0]["nombre"]." ".$data[0]["apellido"];?></p>
									<span class="info"><a target="_blank" href="<? echo $data[0]["web"];?>"><? echo $data[0]["web"];?></a></span>
								</div>
							</div>
						</div>
					</div>

				</div>				
			</div>
		</div>
	</section>
