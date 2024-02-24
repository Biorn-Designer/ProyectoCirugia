<?php

function getPlantilla($row){




$plantilla='<body>
<header class="clearfix">
  <div id="logo">
    <img src="img/login-logo.png">
  </div>
  <div id="company">
    <h2 class="name">Clinica Médica Quirurgica Fenix SpA</h2>
    <div>Cirugia Menor, Medicina y Cirugía Estética</div>
    <div>Cano y Aponte #1004, Providencia, Santiago</div>
    <div><strong>Web: </strong>clinicaesteticafenix.cl, cirugiamenor.cl</div>
    <div><strong>Whatsapp: </strong>+56956320127 <strong>Fono: </strong>+56352295037</div>
    <div><a href="mailto:company@example.com">reservas@cirugiamenor.cl, dr.cuadrado@cirugiamenor.cl</a></div>
  </div>
  </div>
</header>


<main>
    <div id="thanks">Certificado Médico</div>
    <div id="details" class="clearfix">
        <div id="client">
          <p>El Médico que suscribe certifica asistir profesionalmente al paciente:</p>
          <div class="address">Nombre:' . $row["nombrep"] . " " . $row["apellidop"] . '</div>
          <div class="address">Cuyo diagnostico es: ' . $row["diagnostico_princ_p"] .'</div>
          <div class="address">Quien deberá permanecer en reposo :</div>
          <div class="address">Desde:'. date("d/m/Y" , strtotime($row["cert_desde_p"]))  .'</div>
          <div class="address">Hasta:'. date("d/m/Y", strtotime($row["cert_hasta_p"]))  .'</div>
          <div class="address">Extiende el siguiente certificado para ser presentado en:</div>
          <div class="address">' . $row["para_presentar_p"] .'</div>
        </div>
       
      </div>

    <div id="details" class="clearfix">
        <div id="client">
        <div class="address">__________________________</div>
        <div class="address">NOMBRE Y FIRMA DEL MEDICO</div>
    </div>
   
  </div>


  <div id="details" class="clearfix">
    <div id="client">
      <div class="address">FECHA DE REMISIÓN'. date("d/m/Y", strtotime($row["fecha_consulta"]))  .'</div>
    </div>
   
  </div>


  


  </main>
<footer>
 Cano y Aponte #1004, Providencia, Santiago
</footer>
</body>';

return $plantilla;

}