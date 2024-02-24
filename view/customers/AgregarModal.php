<!-- Agregar Nuevos Registros -->
<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
	
        <div class="modal-content">
            <div class="modal-header">
               
            <h4 class="modal-title-center" id="myModalLabel">Nuevo Registro</h4>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			
                <div class="card-body">
						<form method="POST" autocomplete="off"  action="../folder/nuevopaciente.php">
					<div class="row">
						<div class="col-sm-7">
							<div class="form-group form-group-default">
								<label>RUT</label>
								<input name="dnipa" type="text" required class="form-control" maxlength="8" placeholder="Ingrese RUT">
							</div>
						</div>
						<div class="col-sm-5">
							<div class="form-group form-group-default">
								<label>Dígito Verificador</label>
								<input name="digito" type="text" class="form-control" placeholder="K" readonly>
							</div>
						</div>
						<div class="col-md-6 pr-0">
							<div class="form-group form-group-default">
								<label>Nombre</label>
								<input name="nombrep" type="text" class="form-control" required placeholder="Ingrese nombre">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group form-group-default">
								<label>Apellidos</label>
								<input name="apellidop" type="text" class="form-control" required placeholder="Ingrese apellidos">
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group form-group-default">
								<label>Fecha de Nacimiento</label>
								<input type="date" name="fechanacimiento" required>
							</div>
						</div>

						
						
						<div class="col-md-6">
							<div class="form-group form-group-default">
								<label>Sexo</label>
								<select class="form-control" name="sexo" required>
									<option value="masculino">Masculino</option>
									<option value="femenino">Femenino</option>
									<option value="sinDefinir">Sin Definir</option>
								</select>
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group form-group-default">
								<label>Dirección</label>
								<input name="dire" type="text" class="form-control" required placeholder="Ingrese dirección">
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group form-group-default">
								<label>Comuna</label>
								<select class="form-control" name="comuna" required>
										<option value="santiago">Santiago</option>
										<option value="altojahuel">Alto Jahuel</option>
										<option value="batuco">Batuco</option>
										<option value="buin">Buin</option>
										<option value="cerrillos">Cerrillos</option>
										<option value="cerronavia">Cerro Navia</option>
										<option value="colina">Colina</option>
										<option value="conchali">Conchali</option>
										<option value="curacavi">Curacaví</option>
										<option value="elbosque">El Bosque</option>
										<option value="elmonte">El Monte</option>
										<option value="estacioncentral">Estación Central</option>
										<option value="hospitalmaipo">Hospital - Maipo</option>
										<option value="huechuraba">Huechuraba</option>
										<option value="independencia">Independencia</option>
									</select>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group form-group-default">
								<label>Teléfono</label>
								<input name="tele" type="number" class="form-control" required placeholder="Ingrese dirección">
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group form-group-default" required>
								<label>Prevision</label>
									<select class="form-control" name="prevision">
										<option value="Fonasa">Fonasa</option>
										<option value="Isapre">Isapre</option>
										<option value="Capredena">Capredena</option>
										<option value="CruzBlanca">Cruz Blanca</option>
										<option value="BanMedica">Ban Medica</option>
										<option value="VidaTres">Vida Tres</option>
										<option value="Consalud">Consalud</option>
										<option value="Dipreca">Dipreca</option>
										<option value="Colmena">Colmena</option>
										<option value="Optima">Optima</option>
										<option value="MasVida">Mas Vida</option>
										<option value="Fundacion">Fundación</option>
										<option value="Isalud">Isalud</option>
										<option value="CruzDelNorte">Cruz del Norte</option>
										<option value="Ferrosalud">Ferrosalud</option>
									</select>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group form-group-default">
								<label>Prestación</label>
									<select class="form-control" name="prestacion" required>
										<option value="consulta">Consulta</option>
										<option value="evaluacion">Evaluación</option>
										<option value="control">Control</option>
										<option value="cirugia">Cirugia</option>
										<option value="examenes">Examenes</option>
									</select>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group form-group-default" required>
								<label>Forma de Pago</label>
									<select class="form-control" name="pago">
										<option value="institucion">Institución</option>
										<option value="garantia">Garantía</option>
										<option value="gratuito">Gratuito</option>
										<option value="particular">Particular</option>
									</select>
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group form-group-default" required>
								<label>Correo Electrónico</label>
								<input name="correo" type="email" class="form-control" required placeholder="correo">
							</div>
						</div>


						<div class="col-md-12">
							<div class="form-group form-group-default" required>
								<label>Observación</label>
								<textarea name="observacion" class="form-control" placeholder="Ingrese observaciones"></textarea>
							</div>
						</div>
						
						
						<div class="col-md-6" style="display:none;">
							<div class="form-group form-group-default">
								<label>Cargo</label>
								<select class="form-control" name="cargo">
							<option value="2">2</option>
							</select>
							</div>
						</div>
						
						<div class="col-md-6" style="display:none;">
							<div class="form-group form-group-default">
								<label>Estado</label>
								<select class="form-control" name="estado">
							<option value="1">1</option>
							</select>
							</div>
						</div>
						
					</div>
			</div>
        </div>
		 <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                <button type="submit" name="agregar" onclick="funcionAlerta()" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar Registro</button>
			</form>
                </div>
			
            </div>

        </div>
		
    </div>
</div>
</div>
<!-- -->