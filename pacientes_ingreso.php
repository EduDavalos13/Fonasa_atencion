<?php
    include "./php/secciones/headder.php";
    //echo $_COOKIE['hospital'];
?>

<head>
    <!--
        Esta funcion oculta filtra las casillas de texto a ingresar de cada paciente,
        de tal forma que si es un niño, solo se pida la informacion necesaria.
        Lo mismo si es que el paciente es un joven o anciano.
    -->
    <!--importando jquery cdn-->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script>
        // Funcion JQuery que muestra y oculta el div
        $(document).ready(function () {
            $("select").change(function () {
                $(this).find("#paciente:selected")
                       .each(function () {
                    var optionValue = $(this).attr("value");
                    if (optionValue) {
                        $(".box").not("." + optionValue).hide();
                        $("." + optionValue).show();
                    } else {
                        $(".box").hide();
                    }
                });
            }).change();
        });
    </script>
</head>

<body class="cuerpo">
    <h1 class="text-center">Caso fonasa</h1>

    <div class="container">
        <div class="row">
            <div class="col-sm-5">
                <div class="tarjeta">
                <div class="card">
                    <div class="card-header bg-primary blanco">
                        Datos de paciente
                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">
                            <label>Nombre paciente: </label>
                            <input class="right" type="text" name="nombrePaciente" id="nombrePaciente"><br>
                            <br>
                            <label>Edad: </label>
                            <input class="right" type="number" name="edadPaciente" id="edadPaciente"><br>
                            <br>
                            <label>Numero historia clinica</label>
                            <input class="right" type="text" name="nroHistoriaClinica" id="nroHistoriaClinica"><br>
                            
                            <!--Seccion de seleccion-->
                            <div>
                            <!--Opciones de la lista-->
                            <br>
                            <label>Tpo paciente: </label>   
                            <select class="right">
                                <option id="paciente" value="Anciano">Anciano</option>
                                <option id="paciente" value="Nino">Niño</option>
                                <option id="paciente" value="Joven">Joven</option>
                            </select>
                            </div>
                            <!--divs que se muestran y ocultan-->
                            <!--Seccion Ancianos-->
                            <div class="Anciano box">
                                <hr>
                                <h4>Ancianos</h4>
                                <label for="dieta">Tiene dieta: </label>
                                <select class="right" name="dieta" id="dieta">
                                    <option value="1">Si</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                            <!--Seccion Niños-->

                            <div class="Nino box">
                                <hr>
                                <h4>Niños</h4>
                                <label>Relacion Peso-Estatura: </label>
                                <input class="right" type="number" name="pesoEstatura" id="pesoEstatura">
                            </div>

                            <!--Seccion jovenes-->
                            <div class="Joven box">
                                <hr>
                                <h4>Jovenes</h4>
                                <label for="fumador">Fumador: </label>
                                <select class="right" name="fumador" id="fumador">
                                    <option value="1">Si</option>
                                    <option value="0">No</option>
                                </select><br>
                                <br>
                                <label>Años fumando: </label>
                                <input class="right" type="number" name="anhos" id="anhos">
                            </div>
                            <!--Seccion de seleccion-->
                            
                            <hr>
                            <div class="btn-group " role="group">
                                <button id="agregar" type="button" name="action" value="Agregar" class="btn btn-primary">Agregar</button>
                            </div>
                        </form>

                    </div>
                    
                </div>
                </div>

            </div>

            <div class="col-md-7" id="tablaPacientes">
                <div class="tarjeta">
                <h2>Tabla de pacientes</h2>
                <div class="scroll">
                <table class="table table-striped mb-0">
                    <thead class="table-primary">
                        <tr class="cabecera">
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Edad</th>
                            <th>N° Historia Clinica</th>
                            <th>Prioridad</th>
                        </tr>
                    </thead>
                    <tbody id="registros" class="tabla">
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                </div>
                </div>
            </div>
            
            

        </div>
    </div>
    <script src="./JS/pacientes_ingreso.js"></script>
</body>
</html>