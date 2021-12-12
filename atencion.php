<?php 
    include "./php/secciones/headder.php";
    
    /**
     * Una vez seleccionado un hospital en la pagina de inicio, se redirije hacia atencion,
     * y se almacena el valor del hospital para que solo se muestren los pacientes y consultas
     * del hospital seleccionado.
     */
    if(isset($_POST['hospitales'])){
        $hospital = "hospital";
        $hospitalValor = $_POST['hospitales'];
        setcookie($hospital, $hospitalValor);

        //echo $_COOKIE['hospital'];
      }
?>
<body class="cuerpo">
   <h1 class="text-center">Atencion</h1>
    <div class="container">
        <div class="row">
        <div class="col-md-6" id="tablaPacientes">
            <div class="tarjeta">
                <h2>Tabla de pacientes</h2>
                <div class="scroll">
                    <table class="table table-bordered table-striped mb-0">
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

            <div class="col-md-6">
                <div class="tarjeta">
                <h2>Tabla de consultas</h2>
                <div class="scroll">
                <table class="table table-bordered table-striped mb-0">
                    <thead class="table-primary">
                    <tr class="cabecera">
                        <th>ID</th>
                        <th>Nombre especialista</th>
                        <th>Cant. pacientes</th>
                        <th>Consulta</th>
                        <th>Estado</th>
                        <th>Hospital</th>
                    </tr>
                    </thead>
                    <tbody id="consultas" class="tabla">
                        <tr>
                            <td></td>
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
        <br>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="tarjeta">
                            <h2>Sala de espera</h2>
                            <div>
                                <table class="table table-bordered table-striped mb-0">
                                    <thead class="table-primary">
                                    <tr class="cabecera">
                                    <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Edad</th>
                                                <th>N° Historia Clinica</th>
                                                <th>Prioridad</th>
                                    </tr>
                                    </thead>
                                    <tbody id="en_espera" class="tabla">
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
            <br>

            <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="tarjeta">
                        <h2>Acciones</h2>
                            <div class="btn-group" role="group" aria-label="">
                                <button id="mayor_riesgo" type="button" name="action" value="mayor_riesgo" class="btn btn-primary">Listar paciente mayor riesgo</button>
                                <button id="atender_paciente" type="button" name="action" value="atender_paciente" class="btn btn-primary">Atender paciente</button>
                                <button id="liberar_consultas" type="button" name="action" value="liberar_consultas" class="btn btn-danger">Liberar consultas</button>
                                <button id="fumadores_urgentes" type="button" name="action" value="fumadores_urgentes" class="btn btn-primary">Listar fumadores urgentes</button>
                                <button id="consulta_mayor" type="button" name="action" value="consulta_mayor" class="btn btn-primary">Consulta mayor pacientes</button>
                                <button id="mas_anciano" type="button" name="action" value="mas_anciano" class="btn btn-primary">Paciente mas anciano</button>
                                <button id="optimizar" type="button" name="action" value="optimizar" class="btn btn-danger">Optimizar atencion</button>
                            </div>


                            <h2>Tabla de resultados</h2>
                            <div>
                                <table class="table table-bordered table-striped mb-0">
                                    <thead class="table-primary">
                                    <tr class="cabecera">
                                    <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Edad</th>
                                                <th>N° Historia Clinica</th>
                                                <th>Prioridad</th>
                                    </tr>
                                    </thead>
                                    <tbody id="resultado" class="tabla">
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

    </div>
    <script src="./JS/atencion.js"></script>
</body>


