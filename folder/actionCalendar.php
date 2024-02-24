<?php 
session_start();
if(isset($_SESSION["estado_sesion"]) && $_SESSION["estado_sesion"] == 'ACTIVA'){
    include("../../conexion/abrirconexion.php");
    include("../inc/validaciones.php");
    include("../inc/funciones_generales.php");
    $id_categoria = $_SESSION['categoria_agenda'];
   if(isset($_GET['action'])){
      
            $accion = $_GET['action'];
                switch($accion){
                    case 'agregar':
                    $id_cliente = mysqli_real_escape_string($conexion, htmlentities($_POST['idCliente']));
                    $fecha_hora = mysqli_real_escape_string($conexion, htmlentities($_POST['start']));
                    $telefonoCliente = mysqli_real_escape_string($conexion, htmlentities($_POST['telefonoCliente']));
                    $nombreMedico = mysqli_real_escape_string($conexion, htmlentities($_POST['nombreMedico']));
                    $nombreMedicoReferente = mysqli_real_escape_string($conexion, htmlentities($_POST['nombreMedicoReferente']));
                    $serviciosRequeridos = mysqli_real_escape_string($conexion, htmlentities($_POST['serviciosRequeridos']));
                    $observacion = mysqli_real_escape_string($conexion, htmlentities($_POST['observacion']));
                    $clinicaUtilizar = mysqli_real_escape_string($conexion, htmlentities($_POST['clinicaUtilizar'])); 
                    $id_categoria = mysqli_real_escape_string($conexion, htmlentities($_POST['idCategoria']));
                    $idUsuario = $_SESSION['id_usuario'];
                    if(!isset($_SESSION['id_usuario']) || $_SESSION['id_usuario'] <=0 || $_SESSION['id_usuario'] == ""){
                        echo json_encode("ID USUARIO INDEFINIDO, CONTACTE AL ADMINISTRADOR");
                            break;
                    }

                    $estadoCita = mysqli_real_escape_string($conexion, htmlentities($_POST['estadoCita']));

                    $queryVerificarCliente =  mysqli_query($conexion, "SELECT * FROM citas WHERE id_cliente = '$id_cliente' AND fecha_cita = '$fecha_hora' AND id_categoria = '$id_categoria'");
                        if(mysqli_num_rows($queryVerificarCliente) > 0){
                            echo json_encode("ESTE CLIENTE YA ESTA AGENDADO");
                            break;
                        }else{
                             $queryVerificarMedico =  mysqli_query($conexion, "SELECT * FROM citas WHERE medico_tratante = '$nombreMedico' AND fecha_cita = '$fecha_hora'");
                            if(mysqli_num_rows($queryVerificarMedico) > 0){
                                    echo json_encode("ESTE MEDICO YA ESTA AGENDADO");
                                    break;
                            }else{
                                
                                if($clinicaUtilizar ==  "N/A"){
                                    $resultado = mysqli_query($conexion, "INSERT INTO citas (id_cliente, fecha_cita, telefono_cliente, medico_tratante, medico_referente, servicios_requeridos, observcion, clinicaUtilizar, id_categoria, id_usuario, estado_cita) VALUES ('$id_cliente','$fecha_hora', '$telefonoCliente', '$nombreMedico',  '$nombreMedicoReferente', '$serviciosRequeridos', '$observacion', '$clinicaUtilizar', '$id_categoria', '$idUsuario', '$estadoCita')");
                                     echo json_encode($resultado);
                                     break;
                                }else{
                                     $queryVerificarClinica =  mysqli_query($conexion, "SELECT * FROM citas WHERE clinicaUtilizar = '$clinicaUtilizar' AND fecha_cita = '$fecha_hora'");
                                    
                                     if(mysqli_num_rows($queryVerificarClinica) > 0){
                                         echo json_encode("ESTA CLINICA YA ESTA UTILIZANDOSE");
                                         break;
                                     }else{
                                          $resultado = mysqli_query($conexion, "INSERT INTO citas (id_cliente, fecha_cita, telefono_cliente, medico_tratante, medico_referente, servicios_requeridos, observcion, clinicaUtilizar, id_categoria, id_usuario, estado_cita) VALUES ('$id_cliente','$fecha_hora', '$telefonoCliente', '$nombreMedico',  '$nombreMedicoReferente', '$serviciosRequeridos', '$observacion', '$clinicaUtilizar', '$id_categoria', '$idUsuario', '$estadoCita')");
                                          echo json_encode($resultado);
                                          break;
                                     }
                                }
                                 
                            }
                        }
                    break;   
                    case 'editar':
                    $id = mysqli_real_escape_string($conexion, htmlentities($_POST['id']));
                    $id_cliente = mysqli_real_escape_string($conexion, htmlentities($_POST['idCliente']));
                    $fecha_hora = mysqli_real_escape_string($conexion, htmlentities($_POST['start']));
                    $telefonoCliente = mysqli_real_escape_string($conexion, htmlentities($_POST['telefonoCliente']));
                    $nombreMedico = mysqli_real_escape_string($conexion, htmlentities($_POST['nombreMedico']));
                    $nombreMedicoReferente = mysqli_real_escape_string($conexion, htmlentities($_POST['nombreMedicoReferente']));
                    $serviciosRequeridos = mysqli_real_escape_string($conexion, htmlentities($_POST['serviciosRequeridos']) );
                    $observacion = mysqli_real_escape_string($conexion, htmlentities($_POST['observacion']));
                    $clinicaUtilizar = mysqli_real_escape_string($conexion, htmlentities($_POST['clinicaUtilizar']));
                    $estadoCita = mysqli_real_escape_string($conexion, htmlentities($_POST['estadoCita']));

                    $resultado = mysqli_query($conexion, "UPDATE citas SET id_cliente='$id_cliente', fecha_cita='$fecha_hora', telefono_cliente='$telefonoCliente', medico_tratante='$nombreMedico', medico_referente='$nombreMedicoReferente', servicios_requeridos='$serviciosRequeridos', observcion='$observacion', clinicaUtilizar='$clinicaUtilizar', estado_cita = '$estadoCita' WHERE id_citas='$id' LIMIT 1");
                    echo json_encode($resultado);
                    break;
                        
                        
                    case 'eliminar':
                    $id = mysqli_real_escape_string($conexion, htmlentities($_POST['id']));
                    $resultado = mysqli_query($conexion, "DELETE FROM citas WHERE id_citas = '$id' LIMIT 1");
                        echo json_encode($resultado);
                    break;
                    
                }
        }   

        
    }else{
        $return_arr = array();
        $db=new PDO('mysql:host=localhost;dbname=proyecto_final',"root","");
        $consulta="SELECT A.codcit, A.estado, A.dates, A.hour, C.codpaci, C.tele, C.dnipa, C.nombrep, C.apellidop, D.nomdoc, D.apedoc, S.nombrees FROM appointment A JOIN customers C ON A.codpaci = C.codpaci JOIN doctor D ON A.coddoc = D.coddoc JOIN specialty S ON A.codespe = S.codespe; ";   
        $resultado= $db->query($consulta);
        $citas = $resultado->fetchAll(PDO::FETCH_ASSOC);
        foreach ($citas as $cita){
            if($cita['estado'] == 0){
                $row_array['color']='#FF0000';
                $estado = "PENDIENTE";
            }elseif($cita['estado'] == 2){
                $row_array['color']='#48abf7';
                $estado = "EN ESPERA";
            }else{
                $row_array['color']='#008F39';
                $estado = "ATENDIDO";
            }

                $row_array['id'] = $cita['codcit'];
                $row_array['idPaciente'] = $cita['codpaci'];
                $row_array['title']= $estado ." | ".$cita['dnipa'] ." | ".$cita['nombrep'] ."  ".$cita['apellidop']. " | ". $cita['tele'] . " | " . $cita['nomdoc'] ."  ". $cita['apedoc']." | ".$cita['nombrees'];
                        $row_array['start']=$cita['dates']." ".$cita['hour'];
                       
                        
                        $row_array['editable']='true';
                        $row_array['textColor']='#ffffff';
                        $row_array['allDay']=false;
                        array_push($return_arr,$row_array);
                    }
                        echo json_encode($return_arr);
    }