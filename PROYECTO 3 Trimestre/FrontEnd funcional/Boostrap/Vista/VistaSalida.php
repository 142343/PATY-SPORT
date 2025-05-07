<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../estilos.css">
</head>
<body>
    
<body style="
      background-image: url('https://img.freepik.com/vector-gratis/fondo-degradado-azul-simple-negocios_53876-113753.jpg');
      background-size: cover; /* Fills the entire body area */
      background-repeat: no-repeat; /* Image won't repeat itself */
      background-position: center; /* Image starts at the center */
    ">
        <nav class="navbar navbar-dark bg-dark">
            <!-- Navbar content -->
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.html">Inicio</a>
                <a class="navbar-brand" href="#">Deporte & Estilo</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                    aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../Inicio/logaut.php">Cerrar sesión</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Conocenos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contactenos</a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>

        
        <!-- Fin de encabezado-->

        <center>

<div class="breadcrumbs shadow-1">
    <div class="container-o">
        <div class="row">
            <i class="material-icons"> Estas aquí:</i>
            <ul>
                <li><a href="../opciones.html">Opciones</a></li>
                <li><a href="../Controlador/ControladorSalida.php">Salidas</a></li>
        
        </div>
    </div>
    
</div>

<div class="container2 ">
            <img src="../Img/imagen_products-removebg.png" alt="Mi imagen" class="imagenAnimada">
</div>

<button class="btn btn-success mt-3" data-bs-toggle="modal" data-bs-target="#addModal">Agregar Salida</button>
<!--
<button class="btn btn-success mt-3 " data-bs-toggle="modal" data-bs-target="#addModal_1">Agregar Categoría</button>
!-->


    <style>

.container-o{
    height: 45px;
}
.breadcrumbs {
  background-color:  #F3F3F3F1;
  color: #6E6E6EFF;
  line-height: 20px;
  /* vertical-align: middle; */
  padding-left: 5px;
  padding-right: 5px;
  margin-bottom: 0px;
  padding-top: 10px;
}

.breadcrumbs i {
  padding-left: 10px;
  padding-right: 10px;
  top: 8px;
  position: relative;
}

.breadcrumbs ul {
  display: inline-block;
  padding-left: 5px;
}

.breadcrumbs ul li {
  display: inline-block;
}

.breadcrumbs ul li::after {
  content: " >";
}

.breadcrumbs ul li:last-child::after {
  content: "";
}

.panel {
  margin-top: 20px;
  /*.panel-footer{
        border-top: 1px solid #e7e7e7;
    }*/
}

.panel .panel-header {
  padding: 5px 15px;
  padding-bottom: 0px;
  border-bottom: 1px solid #e7e7e7;
}

.panel .panel-header .panel-title {
  display: inline-block;
  text-transform: uppercase;
  border-bottom: 2px solid #000000;
  padding-left: 5px;
  padding-right: 5px;
}

.panel .panel-content {
  padding: 15px;
}

    .table {
        width: 100%;
        border-collapse: collapse;
    }
    .table th, .table td {
        padding: 10px;
        text-align: left;
    }
    .table thead th {
        background-color: #FACDEBF1;
        color: #000000;
        font-weight: bold;
    
    }
    .table tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    .table tbody tr:nth-child(odd) {
        background-color: #ffffff;
    }
    .table tbody tr:hover {
        background-color: #e0e0e0;
    }

    /* Estilos para los botones */
    .btn {
        padding: 5px 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        color: white;
    }
    .btn-warning {
        background-color: #64ABEC;
    }
    .btn-danger {
        background-color: #dc3545;
    }
    .btn-warning:hover {
        background-color: #FFCF3E;
    }
    .btn-danger:hover {
        background-color: #c82333;
    }

     .container {
    max-width: 100%;
    padding: 0 15px;
    margin-top: -200px;
    /*margin-top: -250px;*/
    
}


.table-responsive {
    overflow-x: auto;
    overflow-y: auto; 
    -webkit-overflow-scrolling: touch; 
    max-height: 400px; 
}

.table {
    width: 90%;
    min-width: 500px; 
    border: 2px solid black;
    
}

thead th {
    background-color: #f8f9fa;
    position: sticky;
    top: 0;
    z-index: 2;
    border: 2px solid black; /
}


.table {
        font-size: 0.90em; /* Tamaño de fuente más pequeño */
        width: 90%; /* Ajusta el ancho de la tabla */
    }
    .table th, .table td {
        padding: 5px; /* Reduce el padding de las celdas */
        
    }

@media (max-width: 100%) {
    .table {
        min-width: 100%; 
    }


        body {
            background-color: pink;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h1, h3 {
            color: #343a40;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        .btn {
            border-radius: 5px;
        }
        table {
            margin-top: 20px;
        }
        th, td {
            vertical-align: middle !important;
            text-align: center;
        }
        #additionalFields {
            display: none; /* Oculta los campos adicionales inicialmente */
        }

.form-label {
    border: 2px 
    solid #ffffff; 
    border-radius: 0.3rem;
    padding: 0.4rem; 
    font-size: 0.9rem;
    width: 60%
}

    </style>
    

    <div class="container mt-12">
        <div class="table-responsive mt-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No° Salida</th>
                        <th>Fecha de Salida</th>
                        <th>Precio Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if (isset($resultado) && $resultado->num_rows > 0) {
                        while ($fila = mysqli_fetch_assoc($resultado)) { ?>
                            <tr>
                                <td><?= htmlspecialchars($fila['IdTicketSalida']) ?></td>
                                <td><?= htmlspecialchars($fila['FechaSalida']) ?></td>
                                <td><?= htmlspecialchars($fila['PrecioTotal']) ?></td>
                            </tr>
                        <?php 
                        }
                    } else {
                        echo '<tr><td colspan="3">No hay registros.</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal para agregar Salida -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" style="max-width: 40%; margin: 1rem auto;">
            <div class="modal-content rounded-3 shadow-lg" style="background: rgba(0, 0, 0, 0.6); color: #fff;">
                <div class="modal-header" style="background-color: #FACDEBF1; color: #000;">
                    <h5 class="modal-title" id="addModalLabel">Agregar Ticket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../Controlador/ControladorSalida.php" method="post">
                        <div class="mb-3 d-flex align-items-center">
                            <label for="FechaSalida" class="form-label" style="color: #ffffff; font-size: 0.9rem; width: 40%;">Fecha De Salida</label>
                            <input class="form-control border-primary rounded-3 shadow-sm" id="FechaSalida" name="FechaSalida" type="date" required style="border: 2px solid #ffffff; border-radius: 0.3rem; padding: 0.4rem; font-size: 0.9rem; width: 60%;">
                        </div>
                        <div class="mb-3 d-flex align-items-center">
                            <label for="PrecioTotal" class="form-label" style="color: #ffffff; font-size: 0.9rem; width: 40%;">Precio Total</label>
                            <input class="form-control border-primary rounded-3 shadow-sm" id="PrecioTotal" name="PrecioTotal" type="number" step="0.01" required style="border: 2px solid #ffffff; border-radius: 0.3rem; padding: 0.4rem; font-size: 0.9rem; width: 60%;">
                        </div>
                        <button class="btn btn-primary w-100 rounded-3 shadow-sm" type="submit" name="Acciones" value="Agregar Salida" style="background-color: #64ABEC; border-color: #64ABEC; padding: 0.6rem; font-size: 0.9rem;">Agregar Ticket</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer style="margin-top: 50px; padding: 20px; background-color: #000000; color: #fff; text-align: center;">
        <h2 style="font-size: 17px;">Contacto: Patysport69@gmail.com | Teléfono: 3102283419</h2>
    </footer>
</body>
</html>
