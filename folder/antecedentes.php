<?php
  // Se prendio esta mrd :v
  session_start();

  // Validamos que exista una session y ademas que el cargo que exista sea igual a 1 (Administrador)
  if(!isset($_SESSION['cargo']) || $_SESSION['cargo'] != 1){
    /*
      Para redireccionar en php se utiliza header,
      pero al ser datos enviados por cabereza debe ejecutarse
      antes de mostrar cualquier informacion en el DOM es por eso que inserto este
      codigo antes de la estructura del html, espero haber sido claro
    */
    header('location: ../login.php');
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
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
							<?php
            
            $codpaciente = $_GET['codpaci'];

			//incluimos el fichero de conexion
			include_once('../view/config/dbconect.php');
			$database = new Connection();
			$db = $database->open();
			try{	
				$id= $_GET['codpaci'];
				$sql = "SELECT * FROM customers WHERE customers.codpaci = '".$_GET['codpaci']."'";
				$sql1 = "SELECT count(*) as cant FROM consultas WHERE codpaci = '".$_GET['codpaci']."'";
				foreach ($db->query($sql1) as $row2){
					$cantidad = $row2['cant'];
				}
				foreach ($db->query($sql) as $row) {

    ?>
								<h2 class="text-white pb-2 fw-bold">Antecedentes de: <?php echo $row['nombrep'] . " ". $row['apellidop'] ?></h2>
								<h2 class="text-white pb-2 fw-bold">Cantidad de Citas Anteriores: <?php echo $cantidad;?></h2>
								<h2 class="text-white pb-2 fw-bold">Edad: <?php echo $cantidad;?></h2>
							</div>
							
						</div>
					</div>
				</div>

    
        
    <div class="container">
        <form method="POST" action="guardarantecedentes.php">   
            <div class="row">
                
                <div class="col-2">
                    <label for="dnipa">RUT</label>
                    <input type="text" maxlength="8" class="form-control" name="dnipa" value="<?php echo $row['dnipa']; ?>" readonly>
                </div>  
                <div class="col-3">
                    <label for="nombrep">Nombres</label> 
                    <input type="text" class="form-control" name="nombrep" value="<?php echo $row['nombrep']; ?>" readonly>
                </div>
                <div class="col-2">
                    <label for="apellidop">Apellidos</label>
                    <input type="text" class="form-control" name="apellidop" value="<?php echo $row['apellidop']; ?>" readonly>
                </div>
                <div class="col-2">
                    <label for="sexo">Sexo</label>
                    <select class="form-control" name="sexo" value="<?php echo $row['sexo'];?>">
			        	<option value="Masculino">Masculino</option>
			        	<option value="Femenino">Femenino</option>
			        </select>
                </div>

                
            </div>
            </br>
            <div class="row">
                
                <div class="col-3">
                    <label for="antmedicos">Antecedentes medicos</label>
                    <textarea class="form-control" name="antmedicos" rows="4" placeholder="Antecedentes medicos"><?php echo $row['antmedicos']; ?></textarea>
                </div>
                <div class="col-3">
                    <label for="antfami">Antecedentes familiares</label>
                    <textarea class="form-control" name="antfami" rows="4" placeholder="Antecedentes familiares"><?php echo $row['antfami']; ?></textarea>
                </div>
                <div class="col-3">
                    <label for="antquir">Antecedentes quirurgicos</label>
                    <textarea class="form-control" name="antquir" rows="4" placeholder="Antecedentes quirurgicos"><?php echo $row['antquir']; ?></textarea>
                </div>
                <div class="col-3">
                    <label for="alergias">Alergias</label>
                    <textarea class="form-control" name="Alergias" rows="4" placeholder="Alergias"><?php echo $row['Alergias']; ?></textarea>
                </div>   
            </div>
            </br>
            <div class="row">
                
                <div class="col-3">
                    <label for="medicamentos">Medicamentos de consumo habitual</label>
                    <textarea class="form-control" name="medicamentos" rows="4" placeholder="Medicamentos de consumo habitual"><?php echo $row['medicamentos']; ?></textarea>
                </div>
                <div class="col-3">
                    <label for="antsoc">Antecedentes sociales</label>
                    <textarea class="form-control" name="antsoc" rows="4" placeholder="Antecedentes sociales"><?php echo $row['antsoc']; ?></textarea>
                </div>
                <div class="col-3">
                    <label for="otrhabitos">Otros habitos</label>
                    <textarea class="form-control" name="otrhabitos" rows="4" placeholder="Otros habitos"><?php echo $row['otrhabitos']; ?></textarea>
                </div>
                <div class="col-3">
                    <label for="habitos">Habitos</label>
                    <div class="form-group" name="habitos">
                        
                        <div class="row"> 
                            <div class="col-sm-4">  
                                <label for="radioalc">Alcohol: </label>
                            </div>
                            <div class="col-sm-4">  
                                <input type="radio" name="radioalc" value="1" <?= $row['alcohol']==1?"checked":"" ?>>
                                <label >Si</label>
                            </div>
                            <div class="col-sm-4">  
                                <input type="radio" name="radioalc" value="2" <?= $row['alcohol']==2?"checked":"" ?>>
                                <label>No</label>
                            </div>  
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="cantalc">Cantidad: </label>
                            </div>
                            <div class="col-sm-8">
                                <input  type="text" placeholder="Frecuencia" name="frecuencia" value="<?php echo $row['cantidad_alcohol']; ?>" >
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-sm-4">  
                                <label for="radiotab">Tabaco: </label>
                            </div>
                            <div class="col-sm-4">  
                                <input type="radio" name="radiotab" value="1" <?= $row['tabaco']==1?"checked":"" ?>>
                                <label >Si</label>
                            </div>
                            <div class="col-sm-4">  
                                <input type="radio" name="radiotab" value="2" <?= $row['tabaco']==2?"checked":"" ?>>
                                <label>No</label>
                            </div>  
                        </div>
						
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="cantcig">Cig./Dia: </label>
                            </div>
                            <div class="col-sm-8">
                                <input  type="number" name="cantcig" placeholder="Cigarros al dia" value="<?php echo $row['cig_dia']; ?>"  >
                            </div>
                        </div>
						<div class="row">
                            <div class="col-sm-4">
                                <label for="cantcig">Drogas: </label>
                            </div>
                            <div class="col-sm-8">
                                <input  type="text" name="drogas" placeholder="Drogas" value="<?php echo $row['drogas']; ?>" >
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            </br>
            <div>
            <div class="row">
                
                <div class="col-3">
                    <label for="antmedicos">Formula obstetrica</label>
                    <textarea class="form-control" name="formulaobstetrica" rows="4" placeholder="Formula obstetrica"><?php echo $row['formulaobstetrica']; ?></textarea>
                </div>
                <div class="col-3">
                    <label for="antfami">Antecedentes obstetricos</label>
                    <textarea class="form-control" name="antobstetrico" rows="4" placeholder="Antecedentes obstetricos"><?php echo $row['antobstetrico']; ?></textarea>
                </div>
                <div class="col-3">
                    <label for="antquir">Ciclo de Vida</label>
                    <textarea class="form-control" id="cicloVida" name="antginecologicos" rows="4" placeholder="Ciclo de vida"><?php echo $row['antginecologicos']; ?></textarea>
                </div>
                <div class="col-3">
                
                    <div class="form-group" name="habitos">
                        
                        
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="gestas">Gestas: </label>
                            </div>
                            <div class="col-sm-9">
                                <input  type="number" id="gestas" name="gestas" placeholder="Gestas" value="<?php echo $row['gestas']; ?>" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="partos">Partos: </label>
                            </div>
                            <div class="col-sm-9">
                                <input  type="number" id="partos" name="partos" placeholder="Partos" value="<?php echo $row['partos']; ?>" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="abortos">Abortos: </label>
                            </div>
                            <div class="col-sm-9">
                                <input  type="number" id="abortos" name="abortos" onchange="llenarTextarea()" placeholder="Abortos" value="<?php echo $row['abortos']; ?>" >
                            </div>
                        </div>

                    </div>
                </div>   
            </div>
            </br>
			<input type="hidden" value="<?= $_GET['codpaci'] ?>" name="codigoPaciente">
            <div class="row">
                <div class="col-12">
                <label for="historico">Historico ficha papel</label>
                <textarea class="form-control" name="historico" rows="6" placeholder="Registre aqui el resumen de las eventuales fichas antiguas en papel que pudiese tener el paciente"><?php echo $row['historico']; ?></textarea>
                </div>
            </div>
            

            <div class="form-group text-center">   
                <input type="submit" class="btn btn-success" value="Guardar Antecedentes" name="guardarAntecedentes">
            </div>
			<div class="form-group text-center">   
                <a href="consultapaciente.php?codpaci=<?= $_GET['codpaci']; ?>" class="btn btn-primary" value="Cargar Consulta" name="cargarConsulta">Cargar Consulta</a>
            </div>
			<div class="form-group text-center">   
                <a href="customers.php" class="btn btn-danger" value="Volver" name="volver">Volver</a>
            </div>
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
	<!-- <script src="../assets/js/demo.js"></script> -->
	<script>
	function llenarTextarea(){
			$("#cicloVida").val("");
	$("#cicloVida").val(`${$("#gestas").val()} Hijos,
${$("#partos").val()} Partos,
${$("#abortos").val()} Abortos`);}

	</script>
</body>
</html>
