<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="shortcut icon" href="../Img/icono1.jpg" type="../Img/icono1.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
                <a class="navbar-brand" href="#" style="font-size: 1.7rem; font-family: 'Poppins', sans-serif;">Inventario de Productos</a>

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


        <html lang="es">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Barra de herramientas</title>
            <link rel="stylesheet" href="styles.css">

        </head>

        <body>
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


<!-- Fin de encabezado-->
<br>
<center>
    <div class="breadcrumbs shadow-1">
        <div class="container-o">
            <div class="row" style="background-color: #FFFFFFFF;">
                <i class="material-icons"> Estas aquí:</i>
                <ul>
                    <li><a href="../Controlador/ControladorProductos.php">Inv.Productos</a></li>
            </div>
        </div>
    </div><!-- Contenedor principal más pequeño -->
<!-- Contenedor principal más pequeño -->
<div class="container mt-3" style="
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  gap: 5px;
  background-color: rgba(233, 233, 233, 0.99);
  padding: 8px;
  border-radius: 5px;
  margin: auto;
  max-width: 600px;
  border: 1px solid #000;
  font-size: 13px;
  height: 90px;
  overflow: auto;
">
    <!-- Formulario de búsqueda -->
    <div style="position: relative; display: inline-block;">
        <form action="../Controlador/ControladorProductos.php" method="post" style="display: flex; align-items: center;">
            <i class="fas fa-box" style="position: absolute; left: 8px; top: 50%; transform: translateY(-50%); color: #6c757d;"></i>
            <input class="form-control"
                style="width: 250px;  padding-left: 30px; padding-right: 40px; border-radius: 5px; border: 1px solid #ced4da;"
                type="number" name="CodigoProducto" placeholder="Código Producto" required>
            <button style="position: absolute; right: 5px; top: 50%; transform: translateY(-50%); background-color: #4A90E2; color: white; border-radius: 5px; padding: 5px 8px; border: none; font-size: 13px;"
                type="submit" name="Acciones" value="Buscar Producto">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>
    <br>

    <!-- Botón Agregar Producto -->
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal" style="padding: 5px 10px; font-size: 13px;">
        <i class="bi bi-plus-square-dotted"></i> Agregar Producto
    </button>

    <!-- Botón Opciones con modal emergente -->
    <button class="btn btn-primary" style="padding: 5px 10px; font-size: 13px;"
        data-bs-toggle="modal" data-bs-target="#optionsModal">
        <i class="fas fa-cog"></i> Opciones
    </button>
</div>

<!-- Modal para Opciones -->
<div class="modal fade" id="optionsModal" tabindex="-1" aria-labelledby="optionsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="background-color: #f8f9fa;">
      <div class="modal-header">
        <h5 class="modal-title" id="optionsModalLabel">Opciones</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body d-grid gap-2">
        <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addModall">
            <i class="fas fa-tshirt"></i> Agregar Categoría
        </button>
        <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addModalll">
            <i class="fas fa-ruler"></i> Agregar Talla
        </button>
        <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addModallll">
            <i class="fas fa-tag"></i> Agregar Marca
        </button>
      </div>
    </div>
  </div>
</div>


    <?php if (isset($productosEncontrados) && !empty($productosEncontrados)): ?>
        <br>
        <form action="../Controlador/ControladorProductos.php" method="post">
            <button class="btn btn-primary mb-3" type="submit" name="Acciones" value="Refrescar tabla">Refrescar</button>
        </form>
        <h3 style="color: black; font-size: 13px; text-align: center; margin-top: 20px; font-weight: bold; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);">
            Resultados:
        </h3>

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Codigo Producto</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>IVA</th>
                        <th>Categoria</th>
                        <th>Estado</th>
                        <th>Descripción</th>
                        <th>Marca</th>
                        <th>Talla</th>
                        <th>Proveedor</th>
                        <th>Actualizar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($productosEncontrados as $producto): ?>
                        <tr>
    <td><?= !empty($producto['CodigoProducto']) ? htmlspecialchars($producto['CodigoProducto']) : 'No registra' ?></td>
    <td><?= !empty($producto['Nombre']) ? htmlspecialchars($producto['Nombre']) : 'No registra' ?></td>
    <td><?= isset($producto['Precio']) && $producto['Precio'] !== '' ? '$' . htmlspecialchars(number_format($producto['Precio'])) : 'No registra' ?></td>
    <td><?= !empty($producto['Stock']) ? htmlspecialchars($producto['Stock']) : 'No registra' ?></td>
    <td><?= !empty($producto['IVA']) ? htmlspecialchars($producto['IVA']) : 'No registra' ?></td>
    <td><?= !empty($producto['categoria']) ? htmlspecialchars($producto['categoria']) : 'No suministra' ?></td>
    <td><?= !empty($producto['estado']) ? htmlspecialchars($producto['estado']) : 'No suministra' ?></td>
    <td><?= !empty($producto['Descripcion']) ? htmlspecialchars($producto['Descripcion']) : 'No registra' ?></td>
    <td><?= !empty($producto['marcas']) ? htmlspecialchars($producto['marcas']) : 'No registra' ?></td>
    <td><?= !empty($producto['tallas']) ? htmlspecialchars($producto['tallas']) : 'No registra' ?></td>
    <td><?= !empty($producto['Nombres']) ? htmlspecialchars($producto['Nombres']) : 'No registra' ?></td>

    <td>
        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateModal<?= $producto['CodigoProducto'] ?>">Editar</button>
    </td>
</tr>

                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php elseif (isset($errorMensaje)): ?>
        <div class="alert alert-warning"><?php echo $errorMensaje; ?></div>
    <?php endif; ?>



    <br>
    <br>


    <div style="flex-grow: 1; text-align: center;  margin-top: -20px;">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" style="background-color: black;  border-radius: 15px; padding: 15px 20px;">
            <i class="fas fa-user-tie" style="color: white; font-size: 1.5rem;"></i>
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
                        <!-- Nombre del Administrador -->
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#" style="font-family: 'Roboto', sans-serif; color: black;">
                                <i class="fas fa-user-tie"></i> Viviana Escobar Cortes
                            </a>
                        </li>
                        <!-- Correo -->
                        <li class="nav-item">
                            <a class="nav-link" href="mailto:viviana0631@gmail.com" style="font-family: 'Roboto', sans-serif; color: black;">
                                <i class="fas fa-envelope"></i> viviana0631@gmail.com
                            </a>
                        </li>
                        <!-- Teléfono -->
                        <li class="nav-item">
                            <a class="nav-link" href="tel:+123456789" style="font-family: 'Roboto', sans-serif; color: black;">
                                <i class="fas fa-phone"></i> +123456789
                            </a>
                        </li>
                        <!-- Panel de Administración -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-family: 'Roboto', sans-serif; color: black;">
                                <i class="fas fa-cog"></i> Panel de Administración
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
                                <li><a class="dropdown-item" href="#" style="color: black;"><i class="fas fa-users-cog"></i> Gestión de Usuarios</a></li>
                                <li><a class="dropdown-item" href="#" style="color: black;"><i class="fas fa-database"></i> Gestión de Datos</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#" style="color: black;"><i class="fas fa-shield-alt"></i> Seguridad</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <style>
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
            margin-top: -150px;
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
            border: 2px solid black;

        }

        thead th {
            background-color: #f8f9fa;
            position: sticky;
            top: 0;
            z-index: 2;
            border: 2px solid black;/
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
                border-radius: 10px;
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
    </style>

    <div class="container mt-9">
        <!-- Imagen centrada -->
        <div class="col-md-3 mt-1 text-center mx-auto"> <!-- Añadido mx-auto para centrar la imagen -->
            <img src="../Img/imagen_products-removebg.png" alt="Mi imagen" class="imagenAnimada" style="width: 230px; height: auto;">



        </div>

        <div class="table-responsive mt-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Codigo Producto</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>IVA</th>
                        <th>Categoria</th>
                        <th>Estado</th>
                        <th>Descripción</th>
                        <th>Marca</th>
                        <th>Talla</th>
                        <th>Proveedor</th>
                        <th>Actualizar</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    if (isset($resultado) && $resultado->num_rows > 0) {
                        while ($fila = mysqli_fetch_assoc($resultado)) { ?>

<tr>
    <td><?= htmlspecialchars($fila['CodigoProducto']) ?></td>
    <td><?= htmlspecialchars($fila['Nombre']) ?></td>
    <td>$<?= htmlspecialchars(number_format($fila['Precio'])) ?></td>
    <td>
        <?php if (isset($fila['Stock']) && $fila['Stock'] !== null && $fila['Stock'] !== ''): ?>
            <?= htmlspecialchars($fila['Stock']) ?>
        <?php else: ?>
            <span class="text-primary fw-bold"><i class="fas fa-info-circle"></i> Pendiente por administrador</span>
        <?php endif; ?>
    </td>
    <td><?= htmlspecialchars($fila['IVA']) ?></td>
    <td><?= htmlspecialchars($fila['categoria']) ?></td>
    <td>
        <?php if (isset($fila['estado']) && $fila['estado'] !== null && $fila['estado'] !== ''): ?>
            <?= htmlspecialchars($fila['estado']) ?>
        <?php else: ?>
            <span class="text-primary fw-bold"><i class="fas fa-info-circle"></i> Pendiente por administrador</span>
        <?php endif; ?>
    </td>
    <td><?= htmlspecialchars($fila['Descripcion']) ?></td>
    <td><?= htmlspecialchars($fila['marcas']) ?></td>
    <td><?= htmlspecialchars($fila['tallas']) ?></td>
    <td><?= htmlspecialchars($fila['Nombres']) ?></td>
    <td>
        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateModal<?= $fila['CodigoProducto'] ?>">Editar</button>
    </td>
</tr>





                            <!-- Modal para actualizar producto -->
                            <div class="modal fade" id="updateModal<?= $fila['CodigoProducto'] ?>" tabindex="-1"
                                aria-labelledby="updateModalLabel<?= $fila['CodigoProducto'] ?>" aria-hidden="true">
                                <div class="modal-dialog" style="max-width: 35%; margin: 5rem auto;">
                                    <div class="modal-content" style="background: rgba(0, 0, 0, 0.6) center; background-size: cover; color: #fff;">
                                        <div class="modal-header" style="background-color:  #FACDEBF1; color: #000000FF;">
                                            <h5 class="modal-title">Actualizar Producto - ID: <?= $fila['CodigoProducto'] ?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="../Controlador/ControladorProductos.php" method="post">
                                                <input type="hidden" name="CodigoProducto" value="<?= $fila['CodigoProducto'] ?>">
                                                <div class="mb-3">
                                                    <label class="form-label" style="color: #ffffff; font-size: 0.9rem; width: 40%;">Nombre</label>
                                                    <input type="text" class="form-control"
                                                        required style="border: 2px solid #ffffff; border-radius: 0.3rem; padding: 0.4rem; font-size: 0.9rem; width: 60%;" name="Nombre"
                                                        value="<?= $fila['Nombre'] ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" style="color: #ffffff; font-size: 0.9rem; width: 40%;">Precio</label>
                                                    <input type="number" class="form-control"
                                                        required style="border: 2px solid #ffffff; border-radius: 0.3rem; padding: 0.4rem; font-size: 0.9rem; width: 60%;" name="Precio"
                                                        value="<?= $fila['Precio'] ?>" required>
                                                </div>



                                                <div class="mb-3">
                                                    <label class="form-label" style="color: #ffffff; font-size: 0.9rem; width: 40%;">IVA</label>
                                                    <input type="number" class="form-control"
                                                        required style="border: 2px solid #ffffff; border-radius: 0.3rem; padding: 0.4rem; font-size: 0.9rem; width: 60%;" name="IVA"
                                                        value="<?= $fila['IVA'] ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" style="color: #ffffff; font-size: 0.9rem; width: 40%;">Categoria</label>
                                                    <select name="CategoriaCodigoCategoría" id="CategoriaCodigoCategoría" class="form-control"
                                                        required style="border: 2px solid #ffffff; border-radius: 0.3rem; padding: 0.4rem; font-size: 0.9rem; width: 60%;">

                                                        <?php foreach ($categorias as $categoria): ?>
                                                            <option value="<?= $categoria['CodigoCategoría']; ?>" <?= ($categoria['Nombre'] == $fila['categoria'] ? 'selected' : '') ?>>
                                                                <?= $categoria['Nombre']; ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>



                                                <div class="mb-3">
                                                    <label class="form-label" style="color: #ffffff; font-size: 0.9rem; width: 40%;">Estado</label>
                                                    <select name="EstadoCodigoEstado" id="EstadoCodigoEstado" class="form-control"
                                                        required style="border: 2px solid #ffffff; border-radius: 0.3rem; padding: 0.4rem; font-size: 0.9rem; width: 60%;">

                                                        <?php foreach ($estados as $estado): ?>
                                                            <option value="<?= $estado['CodigoEstado']; ?>" <?= ($estado['tipoEstado'] == $fila['estado'] ? 'selected' : '') ?>>
                                                                <?= $estado['tipoEstado']; ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" style="color: #ffffff; font-size: 0.9rem; width: 40%;">Descripción</label>
                                                    <textarea class="form-control" required style="border: 2px solid #ffffff; border-radius: 0.3rem; padding: 0.4rem; font-size: 0.9rem; width: 60%;" name="Descripcion"
                                                        required><?= $fila['Descripcion'] ?></textarea>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" style="color: #ffffff; font-size: 0.9rem; width: 40%;">Marca</label>
                                                    <select name="MarcasCodigoMarca" id="MarcasCodigoMarca" class="form-control"
                                                        required style="border: 2px solid #ffffff; border-radius: 0.3rem; padding: 0.4rem; font-size: 0.9rem; width: 60%;">

                                                        <?php foreach ($marcas as $marca): ?>
                                                            <option value="<?= $marca['CodigoMarca']; ?>" <?= ($marca['Nombre'] == $fila['marcas'] ? 'selected' : '') ?>>
                                                                <?= $marca['Nombre']; ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" style="color: #ffffff; font-size: 0.9rem; width: 40%;">Talla</label>
                                                    <select name="TallasCodigoTallas" id="TallasCodigoTallas" class="form-control"
                                                        required style="border: 2px solid #ffffff; border-radius: 0.3rem; padding: 0.4rem; font-size: 0.9rem; width: 60%;">
                                                        <?php foreach ($tallas as $talla): ?>
                                                            <option value="<?= $talla['CodigoTallas']; ?>" <?= ($talla['Tallas'] == $fila['tallas'] ? 'selected' : '') ?>>
                                                                <?= $talla['Tallas']; ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" style="color: #ffffff; font-size: 0.9rem; width: 40%;">Proveedor</label>
                                                    <select name="Num_Documento" id="Num_Documento" class="form-control"
                                                        required style="border: 2px solid #ffffff; border-radius: 0.3rem; padding: 0.4rem; font-size: 0.9rem; width: 60%;">

                                                        <?php foreach ($usuarios as $usuario): ?>
                                                            <option value="<?= $usuario['Num_Documento']; ?>" <?= ($usuario['Nombres'] == $fila['Nombres'] ? 'selected' : '') ?>>
                                                                <?= $usuario['Nombres']; ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>

                                                <button type="submit" class="btn btn-primary" name="Acciones"
                                                    value="ActualizarProducto" style="background-color: #64ABEC; border-color: #64ABEC; padding: 0.6rem; font-size: 0.9rem;">Actualizar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }
                    } else { ?>
                        <tr>
                            <td colspan="13">No se encontraron resultados.</td>
                        </tr>
                    <?php } ?>

                </tbody>

            </table>

        </div>


    </div>









    <!-- Modal para agregar producto -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" style="max-width: 40%; margin: 1rem auto;">
        <div class="modal-content rounded-3 shadow-lg" style="background: rgba(0, 0, 0, 0.6) center; background-size: cover; color: #fff;">
            <div class="modal-header" style="background-color:  #FACDEBF1; color: #000000FF;">
                <h5 class="modal-title" id="addModalLabel">Agregar Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../Controlador/ControladorProductos.php" method="post" enctype="multipart/form-data">
                    <!-- Nombre Producto (solo letras) -->
                    <div class="mb-3 d-flex align-items-center">
                        <label for="Nombre" class="form-label" style="color: #ffffff; font-size: 0.9rem; width: 40%;">Nombre Producto</label>
                        <input class="form-control border-primary rounded-3 shadow-sm" id="Nombre" name="Nombre" type="text"
                            required pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ ]{1,50}" title="Solo letras y espacios"
                            oninput="this.value = this.value.replace(/[^A-Za-zÁÉÍÓÚáéíóúÑñ ]/g, '')"
                            style="border: 2px solid #ffffff; border-radius: 0.3rem; padding: 0.4rem; font-size: 0.9rem; width: 60%;">
                    </div>

                    <!-- Precio Producto (solo números y punto) -->
                    <div class="mb-3 d-flex align-items-center">
                        <label for="Precio" class="form-label" style="color: #ffffff; font-size: 0.9rem; width: 40%;">Precio Producto</label>
                        <input class="form-control border-primary rounded-3 shadow-sm" id="Precio" name="Precio" type="number" step="0.01"
                            required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/^0+(?!\.|$)/, '')"
                            style="border: 2px solid #ffffff; border-radius: 0.3rem; padding: 0.4rem; font-size: 0.9rem; width: 60%;">
                    </div>

                    <!-- IVA (solo números y punto) -->
                    <div class="mb-3 d-flex align-items-center">
                        <label for="IVA" class="form-label" style="color: #ffffff; font-size: 0.9rem; width: 40%;">IVA</label>
                        <input class="form-control border-primary rounded-3 shadow-sm" id="IVA" name="IVA" type="number" step="0.01"
                            required oninput="this.value = this.value.replace(/[^0-9.]/g, '')"
                            style="border: 2px solid #ffffff; border-radius: 0.3rem; padding: 0.4rem; font-size: 0.9rem; width: 60%;">
                    </div>

                    <!-- Imagen -->
                    <div class="mb-3 d-flex align-items-center">
                        <label for="Imagen" class="form-label" style="color: #ffffff; font-size: 0.9rem; width: 40%;">Imagen</label>
                        <input class="form-control border-primary rounded-3 shadow-sm" id="Imagen" name="Imagen" type="file"
                            required style="border: 2px solid #ffffff; border-radius: 0.3rem; padding: 0.4rem; font-size: 0.9rem; width: 60%;"
                            accept="image/*" onchange="previewImage(event)">
                    </div>
                    <img id="imagePreview" src="" alt="Vista previa" style="display:none; max-width: 150px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3); margin-top: 10px;">

                    <script>
                        function previewImage(event) {
                            const imagePreview = document.getElementById('imagePreview');
                            imagePreview.src = URL.createObjectURL(event.target.files[0]);
                            imagePreview.style.display = 'block';
                        }
                    </script>

                    <br>

                    <!-- Categoria -->
                    <div class="mb-3 d-flex align-items-center">
                        <label class="form-label" style="color: #ffffff; font-size: 0.9rem; width: 40%;">Categoria</label>
                        <select name="CategoriaCodigoCategoría" id="CategoriaCodigoCategoría" class="form-control border-primary rounded-3 shadow-sm"
                            style="border: 2px solid #ffffff; border-radius: 0.3rem; padding: 0.4rem; font-size: 0.9rem; width: 60%;">
                            <option value="">Seleccione Categoria...</option>
                            <?php foreach ($categorias as $categoria): ?>
                                <option value="<?= $categoria['CodigoCategoría']; ?>"><?= $categoria['Nombre']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Estado -->
                    <div class="mb-3 d-flex align-items-center">
                        <label class="form-label" style="color: #ffffff; font-size: 0.9rem; width: 40%;">Estado</label>
                        <select name="EstadoCodigoEstado" id="EstadoCodigoEstado" class="form-control border-primary rounded-3 shadow-sm"
                            style="border: 2px solid #ffffff; border-radius: 0.3rem; padding: 0.4rem; font-size: 0.9rem; width: 60%;">
                            <option value="">Seleccione Estado...</option>
                            <?php foreach ($estados as $estado): ?>
                                <option value="<?= $estado['CodigoEstado']; ?>"><?= $estado['tipoEstado']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Descripcion -->
                    <div class="mb-3 d-flex align-items-center">
                        <label for="Descripcion" class="form-label" style="color: #ffffff; font-size: 0.9rem; width: 40%;">Descripcion</label>
                        <textarea class="form-control border-primary rounded-3 shadow-sm" id="Descripcion" name="Descripcion" required
                            style="border: 2px solid #ffffff; border-radius: 0.3rem; padding: 0.4rem; font-size: 0.9rem; width: 60%;"></textarea>
                    </div>

                    <!-- Marcas -->
                    <div class="mb-3 d-flex align-items-center">
                        <label class="form-label" style="color: #ffffff; font-size: 0.9rem; width: 40%;">Marcas</label>
                        <select name="MarcasCodigoMarca" id="MarcasCodigoMarca" class="form-control border-primary rounded-3 shadow-sm"
                            style="border: 2px solid #ffffff; border-radius: 0.3rem; padding: 0.4rem; font-size: 0.9rem; width: 60%;">
                            <option value="">Seleccione Marca...</option>
                            <?php foreach ($marcas as $marca): ?>
                                <option value="<?= $marca['CodigoMarca']; ?>"><?= $marca['Nombre']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Tallas -->
                    <div class="mb-3 d-flex align-items-center">
                        <label class="form-label" style="color: #ffffff; font-size: 0.9rem; width: 40%;">Tallas</label>
                        <select name="TallasCodigoTallas" id="TallasCodigoTallas" class="form-control border-primary rounded-3 shadow-sm"
                            style="border: 2px solid #ffffff; border-radius: 0.3rem; padding: 0.4rem; font-size: 0.9rem; width: 60%;">
                            <option value="">Seleccione Tallas...</option>
                            <?php foreach ($tallas as $talla): ?>
                                <option value="<?= $talla['CodigoTallas']; ?>"><?= $talla['Tallas']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Proveedor -->
                    <div class="mb-3 d-flex align-items-center">
                        <label class="form-label" style="color: #ffffff; font-size: 0.9rem; width: 40%;">Proveedor</label>
                        <select name="Num_Documento" id="Num_Documento" class="form-control border-primary rounded-3 shadow-sm"
                            style="border: 2px solid #ffffff; border-radius: 0.3rem; padding: 0.4rem; font-size: 0.9rem; width: 60%;">
                            <option value="">Seleccione Proveedor...</option>
                            <?php foreach ($usuarios as $usuario): ?>
                                <option value="<?= $usuario['Num_Documento']; ?>"><?= $usuario['Nombres']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Botón -->
                    <button class="btn btn-primary w-100 rounded-3 shadow-sm" type="submit" name="Acciones" value="Agregar Producto"
                        style="background-color: #64ABEC; border-color: #64ABEC; padding: 0.6rem; font-size: 0.9rem;">
                        Agregar Producto
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>


    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('status') === 'success') {
            Swal.fire({
                title: '¡Producto agregado!',
                text: 'El producto se agregó exitosamente al inventario.',
                icon: 'success',
                confirmButtonColor: '#64ABEC',
                background: '#fefefe',
                backdrop: `
                    rgba(0,0,123,0.4)
                    url("https://media.giphy.com/media/3oEjI6SIIHBdRxXI40/giphy.gif")
                    center top
                    no-repeat
                `
            });
        }
    });
</script>




    <!-- Modal para agregar Categoría -->
    <div class="modal fade" id="addModall" tabindex="-1" aria-labelledby="addModallLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" style="max-width: 40%; margin: 1rem auto;">
            <div class="modal-content rounded-3 shadow-lg" style="background: rgba(0, 0, 0, 0.6) center; background-size: cover; color: #fff;">
                <div class="modal-header" style="background-color:  #FACDEBF1; color: #000000FF;">
                    <h5 class="modal-title" id="addModalLabel">Agregar Categoria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../Controlador/ControladorProductos.php" method="post">

                        <div class="mb-3 d-flex align-items-center">
                            <label for="Nombre" class="form-label" style="color: #ffffff; font-size: 0.9rem; width: 40%;">Nombre</label>
                            <input class="form-control border-primary rounded-3 shadow-sm" id="Nombre" name="Nombre" type="text"
                                required style="border: 2px solid #ffffff; border-radius: 0.3rem; padding: 0.4rem; font-size: 0.9rem; width: 60%;">
                        </div>

                        <div class="mb-3 d-flex align-items-center">
                            <label class="form-label" style="color: #ffffff; font-size: 0.9rem; width: 40%;">Genero</label>
                            <select name="GeneroidGenero" id="GeneroidGenero" class="form-control border-primary rounded-3 shadow-sm"
                                style="border: 2px solid #ffffff; border-radius: 0.3rem; padding: 0.4rem; font-size: 0.9rem; width: 60%;">
                                <option value="">Seleccione el Genero...</option>
                                <?php foreach ($genero as $genero): ?>
                                    <option value="<?= $genero['idGenero']; ?>">
                                        <?= $genero['Nombre']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>



                        <button class="btn btn-primary w-100 rounded-3 shadow-sm" type="submit" name="Acciones" value="Agregar Categoria" style="background-color: #64ABEC; border-color: #64ABEC; padding: 0.6rem; font-size: 0.9rem;">Agregar Categoria</button>
                    </form>
                </div>
            </div>
        </div>
    </div>




    <!-- Modal para agregar Talla -->
    <div class="modal fade" id="addModalll" tabindex="-1" aria-labelledby="addModalllLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" style="max-width: 40%; margin: 1rem auto;">
            <div class="modal-content rounded-3 shadow-lg" style="background: rgba(0, 0, 0, 0.6) center; background-size: cover; color: #fff;">
                <div class="modal-header" style="background-color:  #FACDEBF1; color: #000000FF;">
                    <h5 class="modal-title" id="addModalLabel">Agregar Talla</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../Controlador/ControladorProductos.php" method="POST">

                        <div class="mb-3 d-flex align-items-center">
                            <label for="Tallas" class="form-label" style="color: #ffffff; font-size: 0.9rem; width: 40%;">Nombre de la Talla</label>
                            <input class="form-control border-primary rounded-3 shadow-sm" id="Tallas" name="Tallas" type="text"
                                required style="border: 2px solid #ffffff; border-radius: 0.3rem; padding: 0.4rem; font-size: 0.9rem; width: 60%;">
                        </div>





                        <button class="btn btn-primary w-100 rounded-3 shadow-sm" type="submit" name="Acciones" value="Agregar Talla" style="background-color: #64ABEC; border-color: #64ABEC; padding: 0.6rem; font-size: 0.9rem;">Agregar Talla</button>
                    </form>
                </div>
            </div>
        </div>
    </div>





    <!-- Modal para agregar Marca -->
    <div class="modal fade" id="addModallll" tabindex="-1" aria-labelledby="addModallllLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" style="max-width: 40%; margin: 1rem auto;">
            <div class="modal-content rounded-3 shadow-lg" style="background: rgba(0, 0, 0, 0.6) center; background-size: cover; color: #fff;">
                <div class="modal-header" style="background-color:  #FACDEBF1; color: #000000FF;">
                    <h5 class="modal-title" id="addModalLabel">Agregar Marca</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../Controlador/ControladorProductos.php" method="POST">

                        <div class="mb-3 d-flex align-items-center">
                            <label for="Nombre" class="form-label" style="color: #ffffff; font-size: 0.9rem; width: 40%;">Nombre de la Marca</label>
                            <input class="form-control border-primary rounded-3 shadow-sm" id="Nombre" name="Nombre" type="text"
                                required style="border: 2px solid #ffffff; border-radius: 0.3rem; padding: 0.4rem; font-size: 0.9rem; width: 60%;">
                        </div>





                        <button class="btn btn-primary w-100 rounded-3 shadow-sm" type="submit" name="Acciones" value="Agregar Marca" style="background-color: #64ABEC; border-color: #64ABEC; padding: 0.6rem; font-size: 0.9rem;">Agregar Marca</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </body>

    </html>