<?php

    $antMedicos = $_POST['antmedicos'];
    $codigoPaciente = $_POST['codigoPaciente'];
    $antFamiliar = $_POST['antfami'];
    $antQuirurgico = $_POST['antquir'];
    $alergias = $_POST['Alergias'];
    $medicamentos = $_POST['medicamentos'];
    $antSociales = $_POST['antsoc'];
    $otrosHabitos = $_POST['otrhabitos'];
    $formulaObstetrica = $_POST['formulaobstetrica'];
    $antObstetrico = $_POST['antobstetrico'];
    $antGinicologico = $_POST['antginecologicos'];
    $historicoFichaPapel = $_POST['historico'];
    $alcohol = $_POST['radioalc'];
    $cant_alcohol = $_POST['frecuencia'];
    $tabaco = $_POST['radiotab'];
    $cant_cigarros = $_POST['cantcig'];
    $drogas = $_POST['drogas'];
    $gestas = $_POST['gestas'];
    $partos = $_POST['partos'];
    $abortos = $_POST['abortos'];

 $query="UPDATE customers SET antmedicos='$antMedicos', antfami='$antFamiliar', antquir='$antQuirurgico',
 Alergias='$alergias',medicamentos='$medicamentos',antsoc='$antSociales',otrhabitos='$otrosHabitos',
 formulaobstetrica='$formulaObstetrica',antobstetrico='$antObstetrico',antginecologicos='$antGinicologico',
 historico='$historicoFichaPapel',alcohol='$alcohol',cantidad_alcohol='$cant_alcohol',tabaco='$tabaco',cig_dia='$cant_cigarros',
 drogas='$drogas',gestas='$gestas',partos='$partos',abortos='$abortos'
 where codpaci=$codigoPaciente";

 //var_dump($query);
 //die();
 $db=new PDO('mysql:host=localhost;dbname=proyecto_final',"root","");
 $ejecutar=$db->prepare($query)->execute();

    if($ejecutar){
        echo "<script>alert('Antecedentes guardados correctamente');</script>";
        header('Location: antecedentes.php?codpaci='.$codigoPaciente);
    }else{
        echo 'Ha ocurrido un error, intentelo denuevo';
    }
?>