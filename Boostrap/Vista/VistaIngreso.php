<?php 
include_once "../Modelo/Conexion.php"; // Cambiado a include_once
$conexion = Conectarse();
$sql = "SELECT * FROM `producto`;";
$sqlp = $conexion->query($sql);
$sqle = "SELECT  `Num_Documento`, `Nombres` FROM `usuario` WHERE RolidRol=22";
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
            <div class="container-fluid">
                <a class="navbar-brand" href="#" style="font-size: 1.7rem; font-family: 'Poppins', sans-serif;">Entrada de Productos</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                    aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../Opciones.php">←  Atras</a>
                            <a class="nav-link active" aria-current="page" href="../Inicio/logaut.php">Cerrar sesión</a>
                        </li>
                       
                    </ul>

                </div>
            </div>
        </nav>

        

        <br>
        <!-- Fin de encabezado-->

        


<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barra de herramientas</title>
    <link rel="stylesheet" href="styles.css">
    
</head><body>  
    <div class="sidebar">  
        <!-- Imagen redonda en la parte superior -->  
        <div class="profile-image">  
            <img src="../Img/icono1.jpg" alt="Perfil">  
        </div>  
        <a href="../Controlador/ControladorUsuario.php"><i class="fas fa-user"></i> <span class="icon-text"></span></a>  
        <a href="../Controlador/ControladorProductos.php"><i class="fas fa-boxes"></i> <span class="icon-text"></span></a>  
        <a href="../Controlador/ControladorIngreso.php"><i class="fas fa-plus-circle"></i> <span class="icon-text"></span></a>  
        <a href="../Controlador/ControladorSalida.php"><i class="fas fa-minus-circle"></i> <span class="icon-text"></span></a>  
    </div>  
</body>

</body>
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
}
.sidebar a:hover{
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

<div class="breadcrumbs shadow-1" style="background-color: #FFFFFFFF;" >
    <div class="container-o" >
        <div class="row" style="background-color: #FFFFFFFF;">
            <i class="material-icons"> Estas aquí:</i>
            <ul>
                <li><a href="../Controlador/ControladorIngreso.php">Ingreso</a></li>
        
        </div>
    </div>
    
</div>
<div class="container mt-3" style="
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  gap: 5px;
  background-color: rgba(233, 233, 233, 0.99);
  padding: 10px;
  border-radius: 5px;
  margin: auto;
  max-width: 800px;
  border: 1px solid #000;
  font-size: 14px;
  height: 50px; /* Ajusta la altura según sea necesario */
"> 
   <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">
      <i class="bi bi-plus-square-dotted"></i> Agregar Entradaaaaa
   </button>
</div>

<br>
<div style="flex-grow: 1; text-align: center;">
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" style="background-color: black;  border-radius: 15px; padding: 15px 20px;">
        <i class="fas fa-user-tie" style="color: white; font-size: 1.5rem;"></i>
    </button>
</div>






<?php
$nombre = $_SESSION['nombre'] ?? 'Usuario desconocido';
$correo = $_SESSION['correo'] ?? 'correo@ejemplo.com';
$telefono = $_SESSION['telefono'] ?? '0000000000';
?>

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" style="background: linear-gradient(135deg, #a3c1e6, #ffffff);">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title text-center" id="offcanvasNavbarLabel" style="font-family: 'Poppins', sans-serif; color: black; font-size: 2rem; font-weight: bold; text-shadow: 0 0 10px rgba(0, 0, 0, 0.7);">Administrador</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close" style="background-color: #1e3a8a;"></button>
  </div>
  <center>
    <div class="text-center">
      <img src="https://cdn.icon-icons.com/icons2/38/PNG/512/administrator_4960.png" class="rounded-circle shadow-lg" style="width: 250px; height: 240px; border: 5px solid #1e3a8a;" alt="...">
    </div>
  </center>
  <div class="offcanvas-body" style="margin-top: 40px;">
    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
      


<li class="nav-item">
  <a class="nav-link active" aria-current="page" href="#" style="font-family: 'Roboto', sans-serif; color: black;">
    <i class="fas fa-user-tie"></i>
    <?php echo $datosUsuario['nombre_completo'] ?? 'Nombre no disponible'; ?>
  </a>
</li>


<li class="nav-item">
  <a class="nav-link" href="mailto:<?php echo $datosUsuario['correo'] ?? '#'; ?>" style="font-family: 'Roboto', sans-serif; color: black;">
    <i class="fas fa-envelope"></i>
    <?php echo $datosUsuario['correo'] ?? 'Correo no disponible'; ?>
  </a>
</li>


<li class="nav-item">
  <a class="nav-link" href="tel:<?php echo $datosUsuario['telefono'] ?? '#'; ?>" style="font-family: 'Roboto', sans-serif; color: black;">
    <i class="fas fa-phone"></i>
    <?php echo $datosUsuario['telefono'] ?? 'Teléfono no disponible'; ?>
  </a>
</li>

      <!-- Panel de Administración -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-family: 'Roboto', sans-serif; color: black;">
          <i class="fas fa-cog"></i> Panel de Administración
        </a>
        <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
          <li><a class="dropdown-item" href="Controlador/ControladorUsuario.php" style="color: black;"><i class="fas fa-users-cog"></i> Gestión de Usuarios</a></li>
          <li><a class="dropdown-item" href="Controlador/ControladorProductos.php" style="color: black;"><i class="fas fa-database"></i> Gestión de Productos</a></li>
          <li><hr class="dropdown-divider"></li>
        </ul>
      </li>
    </ul>
  </div>
</div>

<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>



    <style>

.container-o{
    height: 45px;
}
.breadcrumbs {
  background-color:  #F3F3F3F1;
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
    margin-top: -180px;
    /*margin-top: -250px;*/
    
}


.table-responsive {
    overflow-x: auto;
    overflow-y: auto; 
    -webkit-overflow-scrolling: touch; 
    max-height: 350px; 
}

.table {
    width: 90%;
    min-width: 600px; 
    border: 3px solid black;
    
}

thead th {
    background-color: #f8f9fa;
    position: sticky;
    top: 0;
    z-index: 2;
    border: 2px solid black; /
}


.table {
        font-size: 0.90em; 
        width: 90%; 
    }
    .table th, .table td {
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
            display: none; 
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
  
  <img src="../Img/imagen_products-removebg.png" alt="Mi imagen" class="imagenAnimada">

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
    <?php 
    if (isset($resultado) && $resultado->num_rows > 0) {
        while ($fila = mysqli_fetch_assoc($resultado)) { ?>
            <tr>
                <td><?= htmlspecialchars($fila['idTicketIngreso']) ?></td>
                <td><?= htmlspecialchars($fila['FechaIngresoProducto']) ?></td>
                <td><?= htmlspecialchars($fila['ProductoCodigoProducto']) ?></td> 
                <td><?= htmlspecialchars($fila['Cantidad']) ?></td> 
                <td><?= htmlspecialchars($fila['Descripción']) ?></td> 
                <td>$<?= number_format($fila['PrecioIngreso']) ?></td> 
                <td>$<?= htmlspecialchars(number_format($fila['PrecioTotal'])) ?></td> 
                 <td><?= htmlspecialchars($fila['Empleado']) ?></td> 

            </tr>

        <?php 
        }
    } else {
        echo '<tr><td colspan="7">No hay registros.</td></tr>';
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
    <label class="form-label" style="color: #ffffff; font-size: 0.9rem; width: 40%;">Porcentaje de Ganancia</label>
    <select name="Porcentaje" id="Porcentaje" class="form-control border-primary rounded-3 shadow-sm" style="border: 2px solid #ffffff; border-radius: 0.3rem; padding: 0.4rem; font-size: 0.9rem; width: 60%;" required>
        <option value="">Seleccione un porcentaje...</option>
        <option value="15">15%</option>
        <option value="30">30%</option>
        <option value="50">50%</option>
    </select>
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