<?php 
include_once "../Modelo/Conexion.php"; // Cambiado a include_once
$conexion = Conectarse();
$sql = "SELECT * FROM `producto`;";
$sqlp = $conexion->query($sql);

$sqle = "SELECT  `Num_Documento`, `Nombres` FROM `usuario`";
$sqlpe = $conexion->query($sqle);
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket-Ingreso</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../Img/icono1.jpg" type="../Img/icono1.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sevillana&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../estilos.css">
</head>
<body>
    
<body>

<body style="
  background-image: url('https://wallpapers.com/images/hd/pastel-pink-aesthetic-computer-rk29ciw3owi90jft.jpg');
  background-size: cover; /* Fills the entire body area */
  background-repeat: no-repeat; /* Image won't repeat itself */
  background-position: center; /* Image starts at the center */
">
   <head>
<!-- Enlace a Google Fonts para una fuente más moderna -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-dark bg-dark" style="background-color: pink; padding: 10px;">
    <div class="container-fluid" style="display: flex; justify-content: space-between; align-items: center;">
        <!-- Sección de Entradas, Salidas y Reporte -->
        <div class="nav-links" style="display: flex; gap: 20px;">
                <a class="navbar-brand" href="../Controlador/ControladorProductos.php">Productos</a>
            <a class="navbar-brand" href="../Controlador/ControladorIngreso.php">Entradas</a>
            <a class="navbar-brand" href="../Controlador/ControladorSalida.php">Salidas</a>
        </div>
        
        <!-- Inventario de Productos alineado a la derecha -->
        <div class="nav-title" >
            <a class="navbar-brand" href="#">
                Inventario de Productos
            </a>
        </div>
    </div>
</nav>
</body>


    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Barra de herramientas</title>
        <link rel="stylesheet" href="styles.css">

    </head>

    <head>
<!-- Enlace a Google Fonts para usar Dancing Script -->
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="sidebar" style="background: rgb(208,141,202);
background: linear-gradient(185deg, rgba(208,141,202,1) 0%, rgba(255,199,253,1) 49%, rgba(255,134,251,1) 100%);">
      
        
        <!-- Texto con letras una debajo de otra -->
        <div class="stacked-text" >
            L<br>I<br>L<br>Y<br><br>P<br>I<br>N<br>K
        </div>
    </div>
</body>

<style>
/* Estilo para la barra lateral */
.sidebar {
    width: 100px;
    height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: start;
    position: relative;
}

/* Estilo para la imagen de perfil */
.profile-image img {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    margin-top: 20px;
}

/* Estilo para el texto apilado con una fuente elegante */
.stacked-text {
    color: black; /* Color rosado */
    font-size: 24px; /* Tamaño de fuente más grande */
    font-family: 'Dancing Script', cursive; /* Fuente personalizada */
    font-weight: bold;
    margin-top: 20px;
    text-align: center;
    line-height: 1; /* Espaciado ajustado entre letras */
}
</style>


</body>

        <br>
        <!-- Fin de encabezado-->

        



</html>
<style>

.sidebar {  
    width: 200px; 
    background-color: #323232; 
    color: white; 
    padding-top: 20px;  
    display: flex;   
    flex-direction: column; 
    align-items: center;  
}  

.profile-image {  
    width: 40px;  
    height: 40px; 
    overflow: hidden;   
    border-radius: 50%;  
    margin-bottom: 350px;  
}  

.profile-image img {  
    width: 100%;   
    height: auto; 
}  

.sidebar a {  
    color: white; 
    text-decoration: none; 
    padding: 10px;
    width: 100%;  
    display: flex; 
    align-items: center;
}  

.sidebar a:hover {  
    background-color: #444;   
    display: flex;
    flex-direction: column;
    padding: 10px; 
    background-color: transparent; 
}



.sidebar {  
    width: 60px; 
    height: 100vh; 
    background-color: #333; 
    display: flex;  
    flex-direction: column;  
    justify-content: center; 
    align-items: center; 
}  


.sidebar a i {
    margin-right: 10px; 
    font-size: 16px; 
    color: #fff; 
}

.sidebar a:hover i {
    color: #e0e0e0;
}


.navbar {
    left: 50px; 
    width: calc(100% - 50px); 
    height: 100%; 
    border: 2px solid #000; 
    border-radius: 0; 
 
}


/* Barra lateral completa hasta arriba */
.sidebar {
    height: 100%;
    width: 50px; 
    position: fixed;
    top: 0;
    left: 0;
    background-color: #1C1C1C;
    z-index: 999; 
    padding-top: 0px; 
    display: flex;
    flex-direction: column;
    align-items: center;
}


.sidebar a {
    color: white;
    padding: 10px 0;
    text-align: center;
    text-decoration: none;
    display: block;
}

/* Contenido principal */
.content {
    margin-left: 60px; 
    margin-top: 40px; 
}
.containeer {  
    position: relative; 
    left: 50%;
    transform: translateX(-55%);  
    width: calc(100% - 100px); 
    max-width: 1200px; 
    height: auto; 
    border: 0px solid #000;   
    border-radius: 0;   
    padding: 15px;  
    box-sizing: border-box; 
}

</style>


        <center>

    
</div>

<br> 
<br>
<br>
<br>
<div style="text-align: center; margin-top: -80px;">
    <img 
        src="https://i.pinimg.com/736x/d9/21/08/d92108b0c12c6629e2bb50fcbd249df7.jpg" 
        class="navbar-toggler" 
        style="border-radius: 50%; /* Hace la imagen redonda */
               width: 100px; /* Aumenta el tamaño */
               height: 100px; 
               object-fit: cover; /* Asegura que la imagen se ajuste correctamente al contenedor */
               border: none; /* Elimina cualquier borde */">
</div>



<div class="container mt-3" style="
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  gap: 5px;
  padding: 10px;
  border-radius: 5px;
  margin: auto;
  max-width: 800px;
  font-size: 14px;
  height: 50px; /* Ajusta la altura según sea necesario */
"> 
   <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">
      <i class="bi bi-plus-square-dotted"></i> Agregar Entrada
   </button>
</div>

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" style="background: linear-gradient(135deg, #a3c1e6, #ffffff);">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title text-center" id="offcanvasNavbarLabel" style="font-family: 'Poppins', sans-serif; color: black; font-size: 2rem; font-weight: bold; text-shadow: 0 0 10px rgba(0, 0, 0, 0.7);">Administrador</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close" style="background-color: #1e3a8a;"></button>
  </div>
  <center>
  <div class="text-center">
    <img src="https://cdn.icon-icons.com/icons2/38/PNG/512/administrator_4960.png" class="rounded-circle shadow-lg" style="width: 250px; height: 240px; border: 5px solid #1e3a8a;" alt="...">
  </div>
  <center>
  <div class="offcanvas-body" style="margin-top: 40px;">
    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#" style="font-family: 'Roboto', sans-serif; color: black;">
          <i class="fas fa-user-tie"></i> Viviana Escobar Cortes
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="mailto:viviana0631@gmail.com" style="font-family: 'Roboto', sans-serif; color: black;">
          <i class="fas fa-envelope"></i> viviana0631@gmail.com
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="tel:+123456789" style="font-family: 'Roboto', sans-serif; color: black;">
          <i class="fas fa-phone"></i> +123456789
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-family: 'Roboto', sans-serif; color: black;">
          <i class="fas fa-cog"></i> Panel de Administración
        </a>
        <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
          <li><a class="dropdown-item" href="#" style="color: black;"><i class="fas fa-users-cog"></i> Gestión de Usuarios</a></li>
          <li><a class="dropdown-item" href="#" style="color: black;"><i class="fas fa-database"></i> Gestión de Datos</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="#" style="color: black;"><i class="fas fa-shield-alt"></i> Seguridad</a></li>
        </ul>
      </li>
    </ul>
  </div>
</div>

<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>



<style>
        /* Estilo para la tabla */
.custom-table {
    width: 100% !important;
    border-collapse: collapse !important;
    margin: 20px 0 !important;
    font-size: 16px !important;
    text-align: left !important;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1) !important;
}

/* Estilo para las celdas del encabezado */
.custom-table thead th {
    background-color: #4CAF50 !important;
    color: white !important;
    padding: 12px 15px !important;
    text-transform: uppercase !important;
}

/* Estilo para las celdas del cuerpo */
.custom-table tbody td {
    border: 1px solid #ddd !important;
    padding: 10px 15px !important;
    color: #333 !important;
}

/* Colores de fondo alternos para las filas */
.custom-table tbody tr:nth-child(even) {
    background-color: #f9f9f9 !important;
}

.custom-table tbody tr:nth-child(odd) {
    background-color: #fff !important;
}

/* Efecto hover */
.custom-table tbody tr:hover {
    background-color: #f1f1f1 !important;
    transition: background-color 0.3s ease !important;
}

/* Botón personalizado */
.custom-btn {
    background-color: #ff9800 !important;
    color: white !important;
    border: none !important;
    padding: 5px 10px !important;
    border-radius: 5px !important;
    cursor: pointer !important;
    font-size: 14px !important;
}

.custom-btn:hover {
    background-color: #e68900 !important;
    transition: background-color 0.3s ease !important;
}
        .navbar-custom {
            max-width: 800px;
            margin: 0 auto;
        }

        .container-o {
            height: 45px;
            background-color: #FFFFFFFF;
        }

        .breadcrumbs {
            background-color: #FFFFFFF1;
            color: #6E6E6EFF;
            line-height: 20px;
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
        }

        .panel .panel-header {
            padding: 5px 15px;
            padding-bottom: 0px;
            border-bottom: 1px solid #FFFFFFFF;
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

        .table th,
        .table td {
            border: 3px solid #7c4e78;
            padding: 10px;
            text-align: left;
        }

        .table thead th {
            background: rgb(208,141,202);
            background: linear-gradient(90deg, rgba(208,141,202,1) 0%, rgba(255,199,253,1) 49%, rgba(255,134,251,1) 100%);
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
            margin-top: -100px;
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
            min-width: 400px;
            border: 10px solid #7c4e78;

        }

        thead th {
            background-color: #f8f9fa;
            position: sticky;
            top: 0;
            z-index: 2;
            border: 20px solid black;/
        }


        .table {
            font-size: 0.90em;
            width: 86%;
        }

        .table th,
        .table td {
            padding: 5px;

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
                border-radius: 1px;
                box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            }

            h1,
            h3 {
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

            th,
            td {
                vertical-align: middle !important;
                text-align: center;
            }

            #additionalFields {
                display: none;
            }

            .form-label {
                border: 2px solid #ffffff;
                border-radius: 0.3rem;
                padding: 0.4rem;
                font-size: 0.9rem;
                width: 60%
            }
        }
    </style>


    

    <div class="container mt-12">

        <div class="table-responsive mt-3">
            <table class="table table-bordered">
                <thead>
                
                    <tr>
                        
                        <th>No° Entrada</th>
                        <th>Fecha de Ingreso</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Descripcion</th>
                        <th>Valor de Ingreso </th>
                        <th>Precio Total</th>
                        <th>Personal</th>
                    </tr>
                </thead>
                <tbody>
                <tbody>
    <?php 
    if (isset($resultado) && $resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) { ?>
            <tr>
                <td><?= htmlspecialchars($fila['idTicketIngreso']) ?></td>
                <td><?= htmlspecialchars($fila['FechaIngresoProducto']) ?></td>
                <td><?= $fila['ProductoCodigoProducto'] ?></td>
                <td><?= $fila['Cantidad'] ?></td>
                <td><?= $fila['Descripción'] ?></td>
                <td>$<?= number_format($fila['PrecioIngreso']) ?></td>
                <td>$<?= number_format($fila['PrecioTotal']) ?></td>
                <td><?= $fila['Empleado'] ?></td>
            </tr>
    <?php 
        }
    } else {
        echo '<tr><td colspan="8">No hay registros.</td></tr>';
    }
    ?>

</tbody>
            </table>
        
    </div>




    <!-- Modal para agregar Entrada -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" style="max-width: 40%; margin: 1rem auto;">
        <div class="modal-content rounded-3 shadow-lg" style="background: rgba(0, 0, 0, 0.6); color: #fff;">
            <div class="modal-header" style="background-color: #FACDEBF1; color: #000;">
                <h5 class="modal-title" id="addModalLabel">Agregar Ticket</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../Controlador/ControladorIngreso.php" method="post">
                    <div class="mb-3 d-flex align-items-center">
                        <label for="FechaIngresoProducto" class="form-label" style="color: #ffffff; font-size: 0.9rem; width: 40%;">Fecha De Entrada</label>
                        <input class="form-control border-primary rounded-3 shadow-sm" id="FechaIngresoProducto" name="FechaIngresoProducto" type="date" required style="border: 2px solid #ffffff; border-radius: 0.3rem; padding: 0.4rem; font-size: 0.9rem; width: 60%;">
                    </div>

                    <div class="mb-3 d-flex align-items-center">
                        <label class="form-label" style="color: #ffffff; font-size: 0.9rem; width: 40%;">Producto</label>
                        <select name="ProductoCodigoProducto" id="ProductoCodigoProducto" class="form-control border-primary rounded-3 shadow-sm" style="border: 2px solid #ffffff; border-radius: 0.3rem; padding: 0.4rem; font-size: 0.9rem; width: 60%;" required>
                            <option value="">Seleccione Producto...</option>
                            <?php while($row=mysqli_fetch_assoc($sqlp)){?>
                                <option value="<?php echo $row['CodigoProducto']; ?>">
                                    <?php echo $row['Nombre']; ?>
                                </option> 
                            <?php } ?>  
                        </select>
                    </div>

                    <div class="mb-3 d-flex align-items-center">
                        <label for="Cantidad" class="form-label" style="color: #ffffff; font-size: 0.9rem; width: 40%;">Cantidad</label>
                        <input class="form-control border-primary rounded-3 shadow-sm" id="Cantidad" name="Cantidad" type="number" required style="border: 2px solid #ffffff; border-radius: 0.3rem; padding: 0.4rem; font-size: 0.9rem; width: 60%;" min="1" max="99999999999" oninput="validarLongitud(this)" inputmode="numeric">
                       
                    </div>

                    <div class="mb-3 d-flex align-items-center">
                        <label for="Descripción" class="form-label" style="color: #ffffff; font-size: 0.9rem; width: 40%;">Descripción</label>
                        <input class="form-control border-primary rounded-3 shadow-sm" id="Descripción" name="Descripción" type="text" required style="border: 2px solid #ffffff; border-radius: 0.3rem; padding: 0.4rem; font-size: 0.9rem; width: 60%;" min="1" max="99999999999" oninput="validarLongitud(this)" inputmode="numeric">
                       
                    </div>


                    <div class="mb-3 d-flex align-items-center">
                        <label for="PrecioIngreso" class="form-label" style="color: #ffffff; font-size: 0.9rem; width: 40%;">Precio</label>
                        <input class="form-control border-primary rounded-3 shadow-sm" id="PrecioIngreso" name="PrecioIngreso" type="number" required style="border: 2px solid #ffffff; border-radius: 0.3rem; padding: 0.4rem; font-size: 0.9rem; width: 60%;" min="1" max="99999999999" oninput="validarLongitud(this)" inputmode="numeric">
                       
                    </div>


                    <div class="mb-3 d-flex align-items-center">
                        <label class="form-label" style="color: #ffffff; font-size: 0.9rem; width: 40%;">Empleado</label>
                        <select name="Empleado" id="Empleado" class="form-control border-primary rounded-3 shadow-sm" style="border: 2px solid #ffffff; border-radius: 0.3rem; padding: 0.4rem; font-size: 0.9rem; width: 60%;" required>
                            <option value="">Seleccione Empleado...</option>
                            <?php while($row=mysqli_fetch_assoc($sqlpe)){?>
                                <option value="<?php echo $row['Num_Documento']; ?>">
                                    <?php echo $row['Nombres']; ?>
                                </option> 
                            <?php } ?>  
                        </select>
                    </div>

                    <!-- Botón para enviar el formulario -->
                    <div class="mb-3 text-center">
                        <button type="submit" name="Acciones" value="Agregar Ingreso" class="btn btn-primary">Agregar Ingreso</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>





                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>





                    </form>
                </div>
            </div>
        </div>
    </div>

     
     
<script>
          // Obtener la fecha actual
          const today = new Date();
          const year = today.getFullYear();
          const month = String(today.getMonth() + 1).padStart(2, '0'); // Mes entre 01 y 12
          const day = String(today.getDate()).padStart(2, '0'); // Día entre 01 y 31

          // Formatear la fecha en el formato YYYY-MM-DD
          const formattedDate = `${year}-${month}-${day}`;

          // Asignar la fecha al input
          document.getElementById('FechaIngresoProducto').value = formattedDate;
        </script>

</body>
</html>
