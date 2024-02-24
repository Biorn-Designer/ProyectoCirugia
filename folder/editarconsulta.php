<?php

$codpaciente = $_POST['codpaciente'];
    $codconsulta = $_POST['codigoConsulta'];
    $motivoConsulta = $_POST['motivo'];
    $examenFisico = $_POST['fisico'];
    $peso = $_POST['pesop'];
    $talla = $_POST['tallap'];
    $saturacion = $_POST['sat'];
    $temperatura = $_POST['tempp'];
    $pulso = $_POST['pulsop'];
    $presion = $_POST['presionp'];
    $fat = $_POST['fat'];
    $diagonisticoPrincipal = $_POST['diagpri'];
    $diagonosticoSecundario = $_POST['diagsec'];
   
    $indicacionesGenerales = $_POST['indic'];
    $certificadoDesde = $_POST['desde'];
    $certificadoHasta = $_POST['hasta'];
    $paraPresentar = $_POST['paraprese'];
    $examenesRequeridos = array();
    $medicamentosRequeridos = array();
    for($i=0; $i < count($_POST['examenes']); $i++){
        $examenesRequeridos[] = array("nombreExamen" => $_POST['examenes'][$i]);
    }
    $examenes = json_encode($examenesRequeridos);

    for($j = 0; $j < count($_POST['prescrip']); $j++){
        $medicamentosRequeridos[] = array("Medicamento" => $_POST['prescrip'][$j]);
    }
    $medicamentos = json_encode($medicamentosRequeridos);


 $query="UPDATE consultas SET motivo_consulta_p='$motivoConsulta', examen_fisico_p='$examenFisico', peso_p='$peso',
 altura_p='$talla',sat_p='$saturacion',temperatura_p='$temperatura',pulso_p='$pulso',presion_p='$presion',fat_p='$fat'
 ,diagnostico_princ_p='$diagonisticoPrincipal',diagnostico_secun_p='$diagonosticoSecundario'
 ,ind_generales_p='$indicacionesGenerales',soli_examen_p='$examenes',cert_desde_p='$certificadoDesde'
 ,cert_hasta_p='$certificadoHasta',prescrip_med_p='$medicamentos',para_presentar_p='$paraPresentar' 
 WHERE id_consulta='$codconsulta'";
 

 $db=new PDO('mysql:host=localhost;dbname=proyecto_final',"root","");
 $ejecutar=$db->prepare($query)->execute();
 
    if($ejecutar){
        echo '<script>alert("Consulta Editada Correctamente");
        window.location.replace("verconsultapaciente.php?codConsulta='.$codconsulta.'");
        </script>';
        if(isset($_FILES["subirdocumentos"]["name"][0]) && $_FILES["subirdocumentos"]["name"][0] != ""){
            
            $destino = "archivosPacientes";
            for($k = 0; $k < count($_FILES["subirdocumentos"]["name"]); $k++)
            {
               $nombre = $_FILES["subirdocumentos"]["name"][$k];
               $source = $_FILES["subirdocumentos"]["tmp_name"][$k];
               $subir=$db->prepare("INSERT INTO archivos_paciente (codpaci, nombre_archivo) VALUES ('$codpaciente','$nombre')")->execute();
               $target_path = $destino.'/'.$nombre;
               if($subir){
                     move_uploaded_file($source, $target_path);
                  }
            }


        }
    }else{
        echo 'Ha ocurrido un error, intentelo denuevo';
    }
?>