<?php
  // Se prendio esta mrd :v
  session_start();
  require '../model/conexion.php';

  // Validamos que exista una session y ademas que el cargo que exista sea igual a 1 (Administrador)
  if(!isset($_SESSION['cargo']) || $_SESSION['cargo'] != 1){
    /*
      Para redireccionar en php se utiliza header,
      pero al ser datos enviados por cabereza debe ejecutarse
      antes de mostrar cualquier informacion en el DOM es por eso que inserto este
      codigo antes de la estructura del html, espero haber sido claro
    */
    header('location: ../login.php');
  }else{
	echo '<script>
	var pacienteGlobal='.$_GET['codConsulta'].';
	</script>';
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>

	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Citas médicas</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../assets/img/logo.png" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="../assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/atlantis.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="../assets/css/demo.css">
</head>
<body>
	

	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">
				
				<a href="../view/admin/admin.php" class="logo">
				<img src="../assets/img/login-logo.png" width="50" alt="navbar brand" class="navbar-brand">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
				
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Search ..." class="form-control">
							</div>
						</form>
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-envelope"></i>
							</a>
							<ul class="dropdown-menu messages-notif-box animated fadeIn" aria-labelledby="messageDropdown">
								<li>
									<div class="dropdown-title d-flex justify-content-between align-items-center">
										Messages 									
										<a href="#" class="small">Mark all as read</a>
									</div>
								</li>
								<li>
									
								</li>
								<li>
									<a class="see-all" href="javascript:void(0);">See all messages<i class="fa fa-angle-right"></i> </a>
								</li>
							</ul>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-bell"></i>
								<span class="notification">0</span>
							</a>
							<ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
								<li>
									<div class="dropdown-title">You have 0 new notification</div>
								</li>
								<li>
								
									
								</li>
								<li>
									<a class="see-all" href="javascript:void(0);">See all notifications<i class="fa fa-angle-right"></i> </a>
								</li>
							</ul>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
								<i class="fas fa-layer-group"></i>
							</a>
							<div class="dropdown-menu quick-actions quick-actions-info animated fadeIn">
								<div class="quick-actions-header">
									<span class="title mb-1">Quick Actions</span>
									<span class="subtitle op-8">Shortcuts</span>
								</div>
								<div class="quick-actions-scroll scrollbar-outer">
									<div class="quick-actions-items">
										<div class="row m-0">
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-file-1"></i>
													<span class="text">Generated Report</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-database"></i>
													<span class="text">Create New Database</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-pen"></i>
													<span class="text">Create New Post</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-interface-1"></i>
													<span class="text">Create New Task</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-list"></i>
													<span class="text">Completed Tasks</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-file"></i>
													<span class="text">Create New Invoice</span>
												</div>
											</a>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="../assets/img/Doctor.png" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
										
											<div class="avatar-lg"><img src="../assets/img/Doctor.png" alt="image profile" class="avatar-img rounded"></div>
											<div class="u-text">
												<h4><?php echo ucfirst($_SESSION['nombre']); ?></h4>
												<p class="text-muted">Administrador</p><a href="profile.html" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">My Profile</a>
										<a class="dropdown-item" href="#">My Balance</a>
										<a class="dropdown-item" href="#">Inbox</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">Account Setting</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="../controller/cerrarSesion.php">Logout</a>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="../assets/img/Doctor.png" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<?php echo ucfirst($_SESSION['nombre']); ?>
									<span class="user-level">Administrador</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="#profile">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
									<li>
										<a href="#edit">
											<span class="link-collapse">Edit Profile</span>
										</a>
									</li>
									<li>
										<a href="#settings">
											<span class="link-collapse">Settings</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav nav-primary">
						<li class="nav-item active">
							<a data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
								<i class="fas fa-home"></i>
								<p>Home</p>
								<span class="caret"></span>
							</a>
							
						<li class="nav-item">
							<a data-toggle="collapse" href="#base">
								<i class="fas fa-layer-group"></i>
								<p>Citas</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="base">
								<ul class="nav nav-collapse">
									
									<li>
										<a href="../folder/appointment.php">
											<span class="sub-item">Mostrar</span>
										</a>
										<a href="fullcalendar.php">
											<span class="sub-item">Agenda Medica</span>
										</a>
										
									</li>
									
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#sidebarLayouts">
								<i class="fas fa-male"></i>
								<p>Pacientes</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="sidebarLayouts">
								<ul class="nav nav-collapse">
									<li>
										<a href="../folder/customers.php">
											<span class="sub-item">Mostrar</span>
										</a>
									</li>
									
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#forms">
								<i class="fas fa-user-md"></i>
								<p>Médicos</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="forms">
								<ul class="nav nav-collapse">
									<li>
										<a href="../folder/doctor.php">
											<span class="sub-item">Mostrar</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#tables">
								<i class="fas fa-table"></i>
								<p>Áreas médicas</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="tables">
								<ul class="nav nav-collapse">
									<li>
										<a href="../folder/specialty.php">
											<span class="sub-item">Mostrar</span>
										</a>
									</li>
									
								</ul>
							</div>
						</li>
						
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

		<div class="main-panel">
			<!-- Modal IMC -->
<div class="modal fade" id="modalImc" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">TABLA DE IMC</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <img style="width:100%" src="../assets/img/tabla-imc.jpg" class="img-responsive">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--Fin Modal IMC -->


			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
							<?php
								$codpaciente = $_GET['codConsulta'];

								//incluimos el fichero de conexion
								include_once('funcionesGenerales.php');
								include_once('../view/config/dbconect.php');
								$database = new Connection();
								$db = $database->open();
								try{	
									$sql = "SELECT * FROM customers C JOIN consultas CON ON C.codpaci = CON.codpaci WHERE CON.id_consulta = '".$_GET['codConsulta']."'";
									foreach ($db->query($sql) as $row) {
										$idPaciente = $row['codpaci'];
										$idPacienteImpresion = $row['codpaci'];
										$imc = $row['peso_p'] / ($row['altura_p'] * $row['altura_p']);

										$sql1 = "SELECT * FROM `archivos_paciente` WHERE codpaci = '$idPaciente'";
				
				$tabla = '<table class="table">
				<thead>
				  <tr>
					<th scope="col">#</th>
					<th scope="col">Fecha</th>
					<th scope="col">Nombre Documento</th>
					<th scope="col">Eliminar</th>
				  </tr>
				</thead>
				<tbody>';
				$n = 1;
				foreach ($db->query($sql1) as $rw){
					$tabla .= '
						<tr id="A'.$rw['id_archivo'].'">
							<td>'.$n.'</td>
							<td>'.date("d/m/Y", strtotime($rw['fecha_archivo'])).'</td>
							<td><a href="archivosPacientes/'.$rw['nombre_archivo'].'" target="_blank">'.$rw['nombre_archivo'].'</a></td>
							<td><button type="button" class="btn btn-danger btn-xs btn-xs" onclick="preguntarEliminar(\''.$rw['id_archivo'].'\')">Eliminar</button></td>
						</tr>';
					$n++;
				}
				$tabla .= '</tbody></table>';




								?>
							<h2 class="text-white pb-2 fw-bold">Paciente: <?php echo $row['nombrep']." ".$row['apellidop'] ?></h2>
								<h2 class="text-white pb-2 fw-bold">Edad: <?php echo edadPaciente($row['fecha_nacimiento'])?> | RUT: <?php echo $row['dnipa'] ?> | PREVISION: <?php echo $row['prevision'] ?></h2>
								
							</div>
							
						</div>
					</div>
				</div>

				



            <div class="container">
			<div class="modal fade" id="listaDocumentoModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Documentos</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<?php echo $tabla; ?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				</div>
				</div>
			</div>
			</div>





			<form method="POST" enctype="multipart/form-data" action="editarconsulta.php">
                <div class="row">
					<div class="col-3">
						<label for="ante">Antecedentes</label>
                    	<textarea id="ante" class="form-control" name="ante" rows="12" readonly="readonly"></textarea>
					</div>
					<div class="col-7">
						<div class="row">
							<label for="ante">Motivo consulta</label>
                    		<textarea class="form-control" id="motivo" name="motivo" rows="5"><?php echo $row['motivo_consulta_p']; ?></textarea>
						</div>
						<div class="row">
							<label for="ante">Examen físico</label>
                    		<textarea class="form-control" id="fisico" name="fisico" rows="5"><?php echo $row['examen_fisico_p']; ?></textarea>
						</div>
						<div class="row form-group">
							<div class="col-3">
								<input type="number" class="form-control input-sm" id="peso" placeholder="Peso" name="pesop" value=<?php echo $row['peso_p']; ?>><p style="text-align:center;">KG</p>
							</div>	
							<div class="col-3">
								<input type="number" step="0.01" id="talla" class="form-control" placeholder="Talla" name="tallap" value=<?php echo $row['altura_p']; ?>><p style="text-align:center;">Metros</p>
							</div>	
							<div class="col-3">
								<input type="text" value="<?php echo number_format($imc, 2); ?>" class="form-control" id="imc" placeholder="I.M.C." name="imcp"  readonly ><p style="text-align:center;">KG/M2</p>
							</div>
							<div class="col-3">
								<div id="resultadoIMC" height="4rem">

									
								</div>
							</div>
							<div class="col-3">
								<input type="number" class="form-control" placeholder="SAT O2" name="sat" value=<?php echo $row['sat_p']; ?>><p style="text-align:center;">SpO2</p>
							</div>		
							<div class="col-3">
								<input type="number" step="0.01" class="form-control" placeholder="Temp. (C°)" name="tempp" value=<?php echo $row['temperatura_p']; ?>><p style="text-align:center;">°C</p>
							</div>	
							<div class="col-3">
								<input type="number" class="form-control" placeholder="Pulso" name="pulsop" value=<?php echo $row['pulso_p']; ?>><p style="text-align:center;">FREC. C</p>
							</div>	
							<div class="col-3">
								<input type="text" class="form-control" placeholder="Presión" name="presionp" value=<?php echo $row['presion_p']; ?>><p style="text-align:center;">mmHg</p>
							</div>	
							<div class="col-3">
								<input type="number" class="form-control" placeholder="FAT %" name="fat" value=<?php echo $row['fat_p']; ?>><p style="text-align:center;">FAT%</p>
							</div>
						</div>
					</div>
					<div class="col-2 text-center">
							<div class="form-group">
							<a href="customers.php" class="btn btn-primary">Escritorio medico</a>
							</div>
							<div class="form-group">
							<a href="fullcalendar.php" class="btn btn-primary">Agenda medica</a>
							</div>
							<div class="form-group">
							<button type="button" data-toggle="modal" data-target="#listaDocumentoModal"  class="btn btn-primary">Ver documentos</button>
							</div>
							<br><br><br><br><br>
							<div class="col-6" style="width:2000px"> 
								<button type="button"  data-toggle="modal" data-target="#modalImc" class="btn btn-secondary">Tabla IMC</button>
							</div>	
					</div>
				</div>
				<div class="row">
					<div class="col-6">

						<div class="row">
							<label for="diagpri">Diagnostico principal</label>
							<input type="text" class="form-control" placeholder="Diagnostico principal" name="diagpri" value="<?php echo $row['diagnostico_princ_p']; ?>">
							
						</div>
						<hr />
						<a href="" class="btn btn-info">Añadir Diagnostico</a>
						<hr />
						<div class="row">
							<label for="diagsec">Diagnostico secundario</label>
							<textarea class="form-control" name="diagsec" rows="2"><?php echo $row['diagnostico_secun_p']; ?></textarea>
						</div>


						
					</div>
					<div class="col-6">
						<div class="row">
							<div class="col-10">
								<label for="exams">Solicitud de examenes <a class="btn btn-primary" href="javascript:void(0)" id="addInput">
						<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
						Adicionar Campo
					</a></label>
					<div class="form-group" id="dynamicDiv" style="padding-left:10px;">
					
							<?php 
							$examenes = json_decode($row['soli_examen_p']);
							for($i = 0; $i < count($examenes); $i++){
								if($i == 0){
									echo '<div class="input-group mb-3">
								<input type="text" id="examenes[] " value="'.$examenes[$i]->nombreExamen.'" name="examenes[]" class="form-control" >
								<div class="input-group-append">
									<button class="btn btn-outline-danger"  href="javascript:void(0)" type="button" id="remInput">Eliminar</button>
								</div>
							</div>';
								}else{
									echo '<aside>
									<div class="input-group mb-3">
										<input type="text" id="examenes[]" value="'.$examenes[$i]->nombreExamen.'"  name="examenes[]" class="form-control" >
										<div class="input-group-append">
											<button class="btn btn-outline-danger"  href="javascript:void(0)" type="button" id="remInput">Eliminar</button>
										</div>
									</div>
									</aside>';
								}
								
							}
							?>
					
				
				</div>
								<br>
							</div>
							
                        
						</div>
					</div>

				</div>

				<div class="row">
					<div class="col-6">
						<label for="indic">Indicaciones generales 
						</label>
						<textarea class="form-control textarea" name="indic" rows="4" placeholder="Indicaciones generales"><?php echo $row['ind_generales_p']; ?></textarea>
						<hr/>
						<div class="col-6"> 
							<label for="indic">Subir Documentos 
							</label>
								<input type="file" multiple="" name="subirdocumentos[]" id="subirdocumentos">
						</div>
						<hr>
						<br>




						<div class="row">
							<div class=""> 
							<a target="_blank" href="../app/consulta.php?codconsulta=<?php echo $_GET['codConsulta'] ?>" class="btn btn-primary">Vista Consulta</a>
							</div>
							<div class="">
								<a target="_blank" href="../app/ordenExamen.php?codconsulta=<?php echo $_GET['codConsulta'] ?>" class="btn btn-primary">Vista Examen</a>
							</div>
							<div class="">
								<a target="_blank" href="../app/certificado.php?codconsulta=<?php echo $_GET['codConsulta'] ?>" class="btn btn-primary">Vista certificado</a>
							</div>
							<div class="">
								<a target="_blank" href="../app/consentimiento.php?codconsulta=<?php echo $_GET['codConsulta'] ?>" class="btn btn-primary">Vista concentimiento</a>
							</div>
							<div class="">
								<a target="_blank" href="../app/consentimiento.php?codconsulta=<?php echo $_GET['codConsulta'] ?>" class="btn btn-primary">Vista Orden Unica</a>
							</div>
							<div class="">
								<a target="_blank" href="../app/consentimiento.php?codconsulta=<?php echo $_GET['codConsulta'] ?>" class="btn btn-primary">Vista Interconsulta</a>
							</div>
							
						</div>
						
					</div>
					<div class="col-6">
                    <div class="row">
							<div class="col-12">
								<label for="meds">Preescripcion medicamentos <a class="btn btn-primary" href="javascript:void(0)" id="addTextarea">
								<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
									Adicionar Campo
								</a></label>
								<div class="form-group" id="dynamicTextarea" style="padding-left:10px;">
								<?php 
							$medicamentos = json_decode($row['prescrip_med_p']);
							for($i = 0; $i < count($medicamentos); $i++){
								if($i == 0){
									echo '<textarea class="form-control" name="prescrip[]" rows="4" placeholder="Prescripcion de Medicamentos">'.$medicamentos[$i]->Medicamento.'</textarea>';
								}else{
									echo '<aside>
									<div class="input-group mb-3">
									<textarea class="form-control" name="prescrip[]" rows="4" placeholder="Prescripcion de Medicamentos">'.$medicamentos[$i]->Medicamento.'</textarea>
										<div class="input-group-append">
											<button class="btn btn-outline-danger"  href="javascript:void(0)" type="button" id="remTextarea">Eliminar</button>
										</div>
									</div>
									</aside>';
								}
								
							}
							?>
									
								</div>
							</div>					
					</div>
                    <div class="row form-group">
                        <div class="col-6">
                            <label for="desde">Certificado desde: </label>
                            <input type="date" class="form-control" value = "<?php echo date("Y-m-d"); ?>" id="desde" name="desde" placeholder="Desde">
                        </div>
                        <div class="col-6">
                            <label for="hasta">Hasta: </label>
                            <input type="date" class="form-control"  value = "<?php echo date("Y-m-d"); ?>" id="hasta" name="hasta" placeholder="Hasta">
                        </div>
                    </div>
					<input type="hidden" value="<?= $_GET['codConsulta'] ?>" name="codigoConsulta">
					<input type="hidden" value="<?= $idPaciente ?>" name="codpaciente">
					<input type="hidden" value="<?= $_GET['codConsulta'] ?>" name="codpacienteImpresion">
                    <div class="row form-group">
                        <div class="col-12">
                            <label for="paraprese">Para presentar en: </label>
                            <input type="text" class="form-control" id="paraprese" name="paraprese" placeholder="">
                        </div>
                        
                    </div>
				</div>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-success">Guardar Cambios</button>
				<a href="customers.php" class="btn btn-danger">Cerrar atencion</a>
			</div>
			<?php
                }}
                catch(PDOException $e){
                    echo "Hubo un problema en la conexión: " . $e->getMessage();
                }

                //Cerrar la Conexion
                $database->close();
                ?>
        </form>

			</div>
           
           
           
           
            </div>
        </div>

        </div>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="../assets/js/core/popper.min.js"></script>
	<script src="../assets/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


	<!-- Chart JS -->
	<script src="../assets/js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="../assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="../assets/js/plugin/chart-circle/circles.min.js"></script>

	<!-- Datatables -->
	<script src="../assets/js/plugin/datatables/datatables.min.js"></script>

	<!-- Bootstrap Notify -->
	

	<!-- jQuery Vector Maps -->
	<script src="../assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="../assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Sweet Alert -->
	<script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="../assets/js/atlantis.min.js"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="../assets/js/setting-demo.js"></script>
	<!--	<script src="../assets/js/demo.js"></script> -->
	<script>
		$( document ).ready(function() {
			
			$.getJSON("../model/modelantecedents.php?codpaci="+ <?php echo $idPaciente; ?>, function(result){
					var AntecedentesResult="Antecedentes Medicos:"
					+"\n"
					+result[0][0]['antmedicos']
					+"\n"
					+"\n"
					+"Antecedentes Familiares:"
					+"\n"
					+result[0][0]['antfami']
					+"\n"
					+"\n"
					+"Antecedentes Quirurgicos:"
					+"\n"
					+result[0][0]['antquir']
					+"\n"
					+"\n"
					+"Alergias:"
					+"\n"
					+result[0][0]['Alergias']
					+"\n"
					+"\n"
					+"Ciclo de Vida:"
					+"\n"
					+result[0][0]['antginecologicos']
					var FisicoResult=result[0][0]['codpaci'];
					$("#ante").val(AntecedentesResult);
					//$("#motivo").val(AntecedentesResult);
					//$("#fisico").val(FisicoResult);
  			});

			  $(function () {
			    var scntDiv = $('#dynamicDiv');
			    $(document).on('click', '#addInput', function () {
			        $(`<aside>
					<div class="input-group mb-3">
						<input type="text" id="examenes[] " name="examenes[]" class="form-control" >
						<div class="input-group-append">
							<button class="btn btn-outline-danger"  href="javascript:void(0)" type="button" id="remInput">Eliminar</button>
						</div>
					</div>
					</aside>`).appendTo(scntDiv);
			        return false;
			    });
			    $(document).on('click', '#remInput', function () {
		            $(this).parents('aside').remove();
			        return false;
			    });
			});

			$(function () {
			    var scntDiv = $('#dynamicTextarea');
			    $(document).on('click', '#addTextarea', function () {
			        $(`<aside>
					<div class="input-group mb-3">
					<textarea class="form-control" name="prescrip[]" rows="4" placeholder="Prescripcion de Medicamentos"></textarea>
						<div class="input-group-append">
							<button class="btn btn-outline-danger"  href="javascript:void(0)" type="button" id="remTextarea">Eliminar</button>
						</div>
					</div>
					</aside>`).appendTo(scntDiv);
			        return false;
			    });
			    $(document).on('click', '#remTextarea', function () {
		            $(this).parents('aside').remove();
			        return false;
			    });
			});

		})


		//INICIO ELIMINAR DOCUMENTO 
function preguntarEliminar(idDocumento)
{
	if(window.confirm("¿Está seguro de Eliminar Este Docuemnto?")){
		formData = new FormData();
		formData.append("idDocumento", idDocumento);
		$.ajax({
			type: "POST",
			url:"eliminarDocumento.php",
			data:formData,
			processData: false,
  			contentType: false,
			dataType: "json",
			success: function (data) {
				if(data.respuesta == "true"){
					alert("SE ELIMINO CON EXITO");
					$("#A"+idDocumento).remove();
				}else{
					alert(data.mensaje);
				}
			}
		})
		
	}else{
		alert("SE ANULO LA ELIMINACION");
	}
}
//FIN ELIMINAR DOCUMENTO
	</script>

	<!--SCRIPT CALCULO IMC CON COLORES -->
	<script>
		$("#talla").keyup(function () {
			let peso = $("#peso").val();
			let talla = $("#talla").val();
			let imc = peso/(talla * talla);

			if(parseFloat(imc) < 18.5){
				$("#resultadoIMC").html("BAJO PESO");
				$("#imc").val(parseFloat(imc).toFixed(1));
				$("#resultadoIMC").css("background-color","blue");
				$("#resultadoIMC").css("color","white");
			}
		})
		$("#talla").keyup(function () {
			let peso = $("#peso").val();
			let talla = $("#talla").val();
			let imc = peso/(talla * talla);

			if(parseFloat(imc) > 18.5 && parseFloat(imc) <24.9){
				$("#resultadoIMC").html("ADECUADO");
				$("#imc").val(parseFloat(imc).toFixed(1));
				$("#resultadoIMC").css("background-color","green");
				$("#resultadoIMC").css("color","white");
			}
		})
		$("#talla").keyup(function () {
			let peso = $("#peso").val();
			let talla = $("#talla").val();
			let imc = peso/(talla * talla);

			if(parseFloat(imc) > 25.0 && parseFloat(imc) <29.9){
				$("#resultadoIMC").html("SOBREPESO");
				$("#imc").val(parseFloat(imc).toFixed(1));
				$("#resultadoIMC").css("background-color","yellow");
				$("#resultadoIMC").css("color","white");
			}
		})
		$("#talla").keyup(function () {
			let peso = $("#peso").val();
			let talla = $("#talla").val();
			let imc = peso/(talla * talla);

			if(parseFloat(imc) > 30.0 && parseFloat(imc) <34.9){
				$("#resultadoIMC").html("OBESIDAD GRADO 1");
				$("#imc").val(parseFloat(imc).toFixed(1));
				$("#resultadoIMC").css("background-color","orange");
				$("#resultadoIMC").css("color","white");
			}
		})
		$("#talla").keyup(function () {
			let peso = $("#peso").val();
			let talla = $("#talla").val();
			let imc = peso/(talla * talla);

			if(parseFloat(imc) > 35.0 && parseFloat(imc) <39.9){
				$("#resultadoIMC").html("OBESIDAD GRADO 2");
				$("#imc").val(parseFloat(imc).toFixed(1));
				$("#resultadoIMC").css("background-color","red");
				$("#resultadoIMC").css("color","white");
			}
		})
		$("#talla").keyup(function () {
			let peso = $("#peso").val();
			let talla = $("#talla").val();
			let imc = peso/(talla * talla);

			if(parseFloat(imc) > 40.0){
				$("#resultadoIMC").html("OBESIDAD GRADO 3");
				$("#imc").val(parseFloat(imc).toFixed(1));
				$("#resultadoIMC").css("background-color","darkred");
				$("#resultadoIMC").css("color","white");
			}
		})
	</script>
	<script>
		
	</script>
</body>
</html>
