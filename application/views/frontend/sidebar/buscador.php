	<? $attributes = array('name' => 'form1', 'id' => 'form1', "method"=>"POST", "class"=>"white-row"); echo form_open('buscar/remates',$attributes);?>

							<!-- FILTER / SEARCH -->
							<h3 class="page-header nomargin-top margin-bottom40">
								 <strong class="styleColor">BUSCAR</strong>
							</h3>

							<div class="row">
								<div class="form-group">

									
									<div class="col-md-12 col-sm-6">
										<label>Ubicaci&oacute;n</label>
										<select class="form-control" name="datos[provincia]" id="provincia">
                                            <option value="">Indistinto</option>
                                            <option>Capital Federal</option>
                                            <option>Buenos Aires</option>
                                            <option>Gran Buenos Aires</option>
                                            <option>Catamarca</option>
                                            <option>Chaco</option>
                                            <option>Chubut</option>
                                            <option>C&oacute;rdoba</option>
                                            <option>Corrientes</option>
                                            <option>Entre R&iacute;os</option>
                                            <option>Formosa</option>
                                            <option>Jujuy</option>
                                            <option>La Pampa</option>
                                            <option>La Rioja</option>
                                            <option>Mendoza</option>
                                            <option>Misiones</option>
                                            <option>Neuqu&eacute;n</option>
                                            <option>R&iacute;o Negro</option>
                                            <option>Salta</option>
                                            <option>San Juan</option>
                                            <option>San Luis</option>
                                            <option>Santa Cruz</option>
                                            <option>Santa Fe</option>
                                            <option>Santiago Del Estero</option>
                                            <option>Tierra Del Fuego</option>
                                            <option>Tucum&aacute;n</option>
										</select>
									</div>
									<div class="col-md-12 col-sm-6 margin-top10">
										<label>Tipo de Operaci&oacute;n</label>
										<select class="form-control" name="datos[tipo]">
											<option value="Alquiler">Alquiler</option>
											<option value="Venta">Venta</option>
											<option value="Remate">Remate</option>
										</select>
									</div>
									<div class="col-md-12 col-sm-6 margin-top10">
										<label>Categor&iacute;a</label>
										<select class="form-control" name="datos[categoria]" id="categorias">
                							<option value="">Seleccione...</option>
											<? foreach ($buscador as $item) {?>
                                            <option value="<? echo $item["id"];?>"><? echo ucfirst($item["nombre"]);?></option>
                                            <? }?>
										</select>
									</div>
                                    <div class="col-md-12 col-sm-6 margin-top10">
										<label>Subcategor&iacute;a</label>
                                        <select name="datos[sub]" id="subcategoria">
                                        <option value="" selected="selected">Indistinto</option>
                                        </select>
									</div>
								</div>
                                
                                	<div class="col-md-12">
										<label>&nbsp;</label>
									    <button class="btn fullwidth" style="background-color:#000000 !important; color:#CCCCCC; ">Ver resultados</button>
									</div>
							</div>

							

	<? echo form_close(); ?>
                        