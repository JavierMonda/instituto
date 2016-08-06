<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Javier Jiménez García">

    <title>Tabla Salida Profesional - Administración</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<?php

    require_once "../../php/conectari.php";
        
    $mysqli = conectar();

    // SI HACEMOS CLICK EN ALTA 2
    if (isset($_POST["alta2"])){
        $idSalidaPro = $_POST["idSalidaPro"];
        $nombreSalidaPro = $_POST["nombreSalidaPro"];

        //Se describe la inserción de datos en SQL
        $sql = "INSERT INTO tSalidaProfesional VALUES ($idSalidaPro,'$nombreSalidaPro');";
        
        if ($mysqli->query($sql)) {
            echo "
            <script type ='text/javascript'>
                window.onload = function alerta() {
                    document.getElementById('error2').className='alert alert-success alert-dismissable';
                    document.getElementById('error2').innerHTML = 'Registro insertado con éxtito!';
                };
            </script>";
        } else {
            echo "Error: " .$sql ."<br>" .$mysqli->error;
        }
    } // CIERRE IF ALTA 2

    // SI HACEMOS CLICK EN GUARDAR
    if (isset($_POST["guardar"]) && (isset($_POST["seleccionar"]))) {
        $seleccionar = $_POST["seleccionar"];
        $idSalidaPro = $_POST["idSalidaPro"];
        $nombreSalidaPro = $_POST["nombreSalidaPro"];
                        
        for ($i=0;$i < count($idSalidaPro);$i++) {
            $j = 0;
            $sql = ""; 
            while ($j < count($seleccionar)) { 
                if ($seleccionar[$j ++] == $idSalidaPro[$i]){
                    $sql = "UPDATE tSalidaProfesional SET idSalidaPro= $idSalidaPro[$i], 
                    nombreSalidaPro = '$nombreSalidaPro[$i]'  
                    WHERE idSalidaPro='$idSalidaPro[$i]'";
                    if ($mysqli->query($sql)){
                        echo "Registro " .$idSalidaPro[$i] ." modificado satisfactoriamente";
                    } else if (($sql != '') && (!$mysqli->query($sql))){
                        echo "Error: " .$mysqli->error;
                    }
                }
            }
        }
    } // CIERRE IF GUARDAR

    // SI HACEMOS CLICK EN ELIMINAR
    if ((isset($_POST["eliminar"])) && (isset($_POST["seleccionar"]))) {
        
        $seleccionar = $_POST["seleccionar"];
        $idSalidaPro = $_POST["idSalidaPro"];
        $nombreSalidaPro = $_POST["nombreSalidaPro"];

        for ($i=0;$i < count($idSalidaPro);$i++) {  
            $j = 0;
            $sql = "";                  
            while ($j < count($seleccionar)){
                if ($seleccionar[$j ++] == $idSalidaPro[$i]){
                    $sql = "DELETE FROM tSalidaProfesional WHERE idSalidaPro=$idSalidaPro[$i]";
                }
            }  
            if ($sql!="" and (! $mysqli->query($sql)))
                echo "Error: " . $mysqli->error;                
        }
    } // CIERRE IF ELIMINAR

?>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Administración</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="pages/login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="../index.html"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-dashboard fa-fw"></i> Tablas <i class="fa fa-caret-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li>
                                    <a href="#"><i class="fa fa-user fa-fw"></i> Ciclos</a>
                                </li>
                                <li>
                                    <a href="tablaAsignatura.php"><i class="fa fa-gear fa-fw"></i> Asignaturas</a>
                                </li>
                                <li>
                                    <a href="tablaCapacitacion.php"><i class="fa fa-gear fa-fw"></i> Capacitacion</a>
                                </li>
                                <li>
                                    <a href="tablaCurso.php"><i class="fa fa-gear fa-fw"></i> Cursos</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-gear fa-fw"></i> Salida Profesional</a>
                                </li>
                                <li>
                                    <a href="tablaUT.php"><i class="fa fa-gear fa-fw"></i> Unidades de Trabajo</a>
                                </li>
                            </ul>
                            <!-- /.dropdown-user -->
                        </li>
                        <!-- /.dropdown -->
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tabla Salida Profesional
                    <small>Tablas - Administración</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <div class="row">

                <!-- /.col-lg-12 -->
                <div class="col-lg-12">
                    <?php
                        // SI HACEMOS CLICK EN ALTA
                        if (isset($_POST["alta"])){
                            // FORMULARIO DE ALTA
                    ?>
                            <div class="form-group">
                                <fieldset>
                                    <legend><span>Alta de Salida Profesional</span></legend>
                                    <form class="form" method="POST" enctype="multipart/form-data"
                                     action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                        
                                        <label for="idSalidaPro">ID de la Salida Profesional </label><a name="idSalidaPro"></a>
                                        <input class="form-control" tabindex="1" type="number" name="idSalidaPro" placeholder="ID Salida Profesional" required>

                                        <label for="nombreSalidaPro">Nombre de la Salida Profesional </label><a name="nombreSalidaPro"></a>
                                        <input class="form-control" tabindex="1" type="text" name="nombreSalidaPro" placeholder="Nombre Salida Profesional" required>

                                        <label for="alta2"></label><a name="alta2"></a>
                                        <button type="submit" name="alta2" class="btn btn-default"/>Alta</button>

                                    </form> 

                                </fieldset>                     
                                
                            </div>

                    <?php 
                        } // CIERRE IF ALTA
                                
                    ?>
                </div>

            </div>

            <div class="row">

                <!-- FORMULARIO -->
                    
                <div class="form-group">
                    <fieldset>

                    <?php 
                        // LANZAMOS LA CONSULTA DE TODOS LOS DATOS DE LA TABLA MANUALES
                        // PARA MOSTRARLOS EN EL FORMULARIO
                        
                        $sql = "SELECT * FROM  tSalidaProfesional";                       
                        $resultado = $mysqli -> query($sql);                        
                    ?>
                        <legend><span>Alta, baja y modificación de Salidas Profesionales</span></legend> 

                        <form class="form" method="POST" enctype="multipart/form-data" 
                            action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                            <table class="table-hover table-responsive table-striped">
                                <tr><td colspan="6">Dar de alta una nueva Salida Profesional: </td></tr>
                                <tr><td colspan="6"><button type="submit" name="alta" class="btn btn-default" />Alta</button></td></tr>
                                <tr>
                                    <th>Seleccionar</th>
                                    <th>ID Salida Profesional</th>
                                    <th>Nombre Salida Profesional</th>
                                </tr>
                        <?php
                            while ($fila = $resultado -> fetch_assoc()){
                                echo '
                                <tr>
                                    <td><input type="checkbox" name="seleccionar[]" class="form-control" value="' .$fila['idSalidaPro'] .'"/></td>
                                    <td><input type="number" name="idSalidaPro[]" class="form-control" value="' .$fila['idSalidaPro'] .'"/></td>
                                    <td><input type="text" name="nombreSalidaPro[]" class="form-control" value="' .$fila['nombreSalidaPro'] .'"/></td>
                                </tr>';      
                            }
                            echo '<tr><td colspan="2"><button type="submit" name="guardar" class="btn btn-default"/>Modificar</button></td>';
                            echo '<td colspan="2"><button type="submit" name="eliminar" class="btn btn-default"/>Eliminar</button></td>';
    
                            echo "</table>";
                            echo "</form>"
                        ?> 
                    
                    </fieldset>
                    <div id="error" class="" role="alert">
                        <button type="button" class="close" data-dismiss="alert">X</button>
                    </div>
                </div>
                <!-- /FORMULARIO -->
            
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- CIERRE DE CONEXIÓN MYSQL -->
    <?php
        $mysqli -> close();
    ?>

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../bower_components/raphael/raphael-min.js"></script>
    <script src="../bower_components/morrisjs/morris.min.js"></script>
    <script src="../js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
