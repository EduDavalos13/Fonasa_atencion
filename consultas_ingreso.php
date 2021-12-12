<?php 
    include "./php/secciones/headder.php";
?>

<body class="cuerpo">
    <h1 class="text-center">Caso fonasa</h1>

    <div class="container">
        <div class="row">
            <div class="col-sm-5">
                <div class="tarjeta">
                <div class="card">
                    <div class="card-header bg-primary blanco">
                        Datos de consulta
                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">
                            
                            <label>Nombre especialista: </label>
                            <input class="right" type="text" name="nombreEspecialista" id="nombreEspecialista"><br>
                            <br>

                            <label>Cantidad de pacientes: </label>
                            <input class="right" type="number" name="cantPacientes" id="cantPacientes"><br>
                            <br>

                            <label>Estado de consulta: </label>
                            <select class="right" name="estado" id="estado">
                                <option value="Ocupada">Ocupada</option>
                                <option value="Espera">En espera</option>
                            </select><br>
                            <br>

                            <label for="tipo">Tipo de consulta: </label>
                            <select class="right" name="tipo" id="tipo">
                                <option value="Pediatria">Pediatria</option>
                                <option value="Urgencia">Urgencia</option>
                                <option value="CGI">CGI</option>
                            </select><br>
                            <hr>

                            <div class="btn-group" role="group" aria-label="">
                            <button id="agregar" type="button" name="action" value="Agregar" class="btn btn-primary">Agregar</button>
                            </div>
                        </form>
                    </div>
                    
                </div>
                </div>
                

            </div>

            <div class="col-md-7">
                <div class="tarjeta">
                    <div class="scroll">
                        <table class="table table-striped mb-0">
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
    </div>
    
    <script src="./JS/consultas_ingreso.js"></script>
    
</body>