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
    <div id="thanks">Inidicaciones Generales | Comprobante de consulta</div>
    <div id="details" class="clearfix">
        <div id="client">
          <div class="address">Rut: ' . $row["dnipa"] .'</div>
          <div class="address">Nombre:' . $row["nombrep"] . " " . $row["apellidop"] . '</div>
        </div>
      </div>
  <div id="details" class="clearfix">
    <div id="client">
      <div class="address">' . nl2br($row["ind_generales_p"]) .'</div>
    </div>
   
  </div>

  <div id="details" class="clearfix">
    <div id="client">
    <div class="address">' . $row["fecha_consulta"] .'</div>
    </div>
   
  </div>
  


  </main>
<footer>
 Cano y Aponte #1004, Providencia, Santiago
</footer>
</body>';

return $plantilla;

}