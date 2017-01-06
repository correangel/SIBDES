<!--PANTALLA PARA AGREGAR AREAS-->
<!DOCTYPE html>
<html lang="en">
<title>Agregar Area</title>
<link rel="stylesheet" href="vistas/estilo/css/AdminLTE.min.css">
<script src="../vistas/estilo/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="../vistas/estilo/dist/sweetalert.css">
<link rel="stylesheet" href="../vistas/estilo/css/datepicker.min.css" />
<?php   include "../vistas/barra.php"; include "../vistas/menu.php"; ?>

    <body onKeyDown="javascript:Verificar()">
        <div class="container" style="margin-top:10px;">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad">
                    <form name="" method="POST" action="">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <center>
                                    <h3 class="panel-title">DEPARTAMENTOS</h3></center>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class=" col-md-12 col-lg-12 ">
                                        <table class="table table-user-information">
                                            <tbody>
                                                <center>
                                                    <!-- <input placeholder="Ingrese Nombre del Area o Departamento" type="text" name="nombre" required size="25" />
                                                <button type="button " value="Buscar" class="btn btn-lg btn-labeled btn-primary btn-xs">
                                                    <i class='ace-icon fa fa-check'>AGREGAR</i>
                                                </button>-->
                                                </center>
                                                <tbody>
                                                    <div class="col-lg-12 col-md-12" style="margin-top:8px;">
                                                        <table id="example1" class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>Nombre del Area o Departamento</th>
                                                                    <th>
                                                                        <center>Opcion</center>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <!--AQUI HACE LA CONSULTA DE LAS AREAS PARA LLENAR LA TABLA-->
                                                                    <?php
require_once '../conexiones/Connection.php';
$conn = dbConnect();
 $sql="SELECT * from area  ORDER BY  length(nombre)";
 $result = $conn->query($sql);
    while ($row = $result->fetch(MYSQLI_ASSOC)) {
  echo "<td>$row[nombre]</td>";    
    echo "<td><center><a class='btn btn-danger btn-xs' href=''><i  class='ace-icon fa fa-times'></i>NO ELIMINABLE</a>
    </center></td></tr>";                     
    }?>
                                                                </tr>
                                                            </tbody>
                                                </tbody>
                                                </table>
                                                </div>
                                    </div>
                                </div>
                                <div class="panel-heading">
                                    <center>
                                        <a class=" btn btn-danger" href="../panel.php">VOLVER AL INICIO</a>
                                    </center>
                                </div>
                            </div>
                    </form>
                    <!--AQUI INSERTA EN BASE DE DATOS SI SE LLENO EL CAMPO AREA-->
                    <?php
$result = "";
$row = null;
$sql = "INSERT INTO area 
(nombre) VALUES
 (UPPER(:nombre))";
$q = $conn->prepare($sql);
$q->bindParam(':nombre', $_POST['nombre'], PDO::PARAM_STR);
$q->execute();
$result= $q->execute();
?>
                        </div>
                </div>
            </div>

            <!--ESTE CAMPO LLAMA LA LEYENDA Y UNOS SCIPTS-->
            <?php    include "../vistas/redes.php";  ?>
                <!--AQUI SE LLAMAN LOS SCRIPTS NECESARIOS PARA ESTE FORMULARIO-->
                <script type="text/javascript">
                    window.jQuery || document.write("<script src='../vistas/estilo/js/jquery.min.js'>" + "<" + "/script>");

                </script>
                <script type="text/javascript">
                    if ('ontouchstart' in document.documentElement) document.write("<script src='../vistas/estilo/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");

                </script>
                <!--AQUI SE LLAMAN LOS SCRIPTS JS-->
                <script src="../vistas/estilo/js/bootstrap.min.js"></script>
                <script src="../vistas/estilo/js/bootstrap-datepicker.min.js"></script>
                <script src="../vistas/estilo/js/bootstrap-formhelpers.min.js"></script>
                <script src="../vistas/estilo/js/select2.full.min.js"></script>
                <!-- ACE SCRYPTS -->
                <script src="../vistas/estilo/js/ace-elements.min.js"></script>
                <script src="../vistas/estilo/js/ace.min.js"></script>
                <!-- VALIDACIONES -->
                <script src="../vistas/estilo/js/validaciones.js"></script>
                <script>
                    $(function() {
                        //Initialize Select2 Elements
                        $(".select2").select2();
                        //iCheck for checkbox and radio inputs
                        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                            checkboxClass: 'icheckbox_minimal-blue',
                            radioClass: 'iradio_minimal-blue'
                        });
                    });

                </script>

</html>
