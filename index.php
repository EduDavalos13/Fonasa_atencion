<?php 
  /*
    Este include es solo para el header de la pagina, de tal forma que
    se pueda reutilizar en toda la pagina.
  */
  include "./php/secciones/headder.php";
?>

<head>
<link rel="stylesheet" href="./css/style.css">
</head>
<body class="cuerpo">
    <div class="container">
      <div class="row">
        <div class="col-sm-3">

        </div>
        <div class="col-sm-6">
          <img src="./img/01logo-fonasa.png" class="imagen img-fluid mx-auto d-block">
          <div class="tarjeta">
            <form method="POST" action="atencion.php">
              <h1 class="text-center">Seleccionar hospital</h1>
              <div class="text-center">
                <label for="hospitales"><input list="hospitales" name="hospitales" id="hospital" type="text"></label>
                <datalist id="hospitales" class="right">
                                
                </datalist><br><br>
              </div>
              <div class="d-grid gap-2" role="group">
                <button type="submit" id="selec_hospital" name="selec_hospital" class="btn btn-primary">Ingresar</button>
              </div>
            </form>
          </div>  
        </div>
        <div class="col-sm-3">

        </div>

      </div>

    </div>
    
    <script src="./JS/hospitales.js"></script>
</body>
</html>