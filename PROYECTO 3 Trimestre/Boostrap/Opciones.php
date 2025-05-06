
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="Img/icono1.jpg" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos.css">
    <title>Inventario - PATY SPORT</title>
</head>


<!-- Inicio de encabezado-->

<body class="top">

    <body <div style="
    background-image: url(Img/fondo.jpg);
    background-size: cover; /* Fills the entire container */
    background-repeat: no-repeat; /* Image won't repeat itself */
    background-position: center; /* Image starts at the center */
    width: 100vw; /* Full viewport width */
    height: 100vh; /* Full viewport height */
">

<style>
 
/* Inico PATY SPORT MOVIBLE */

@keyframes moverTexto {
    0% {
        transform: translateX(-20%);
        /* Inicia en el lado izquierdo */
    }

    50% {
        transform: translateX(0);
        /* Se detiene en el centro */
    }

    100% {
        transform: translateX(20%);
        /* Se mueve hacia el lado derecho */
    }
}

.texto {
    width: 100%;
    text-align: center;
    font-size: 60px;
    font-family: 'Poppins', sans-serif; /* Cambiar la fuente */
    margin-top: 70px;


    position: relative;
    animation: moverTexto 5s ease-in-out infinite;
    display: inline-block;

    /* Efecto de iluminación en color negro */
    text-shadow: 2px 2px 7px rgb(0, 0, 0);
}

@media (max-width: 768px) {
    .texto {
        font-size: 60px;
        /* Ajustar tamaño de fuente para pantallas más pequeñas */
    }

    .hero {
        background-position: center;
    }
}

/*Fin SPORT MOVIBLE*/
</style>
</div>

        <nav class="navbar navbar-dark bg-dark">
            <!-- Navbar content -->
            <div class="container-fluid">
                <a class="navbar-brand" href="">Inventario</a>
                <a class="navbar-brand" href="#">Deporte & Estilo</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                    aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./Inicio/logaut.php">Cerrar Sesión</a>
                        </li>
                        
                    </ul>

                </div>
            </div>
        </nav>


        <!-- Fin de encabezado-->

    <!--Inicio de PATY SPORT en movimiento-->
    <div class="hero">
        <h1 class="texto">Bienvenido!</h1>
    </div>
    <!--Fin de PATY SPORT en movimiento-->
<br>
    <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card menu-container">
                    <div class="card-body text-center">
                       
                        <ul class="list-unstyled">
                            <li class="menu-item"><a href="Controlador/ControladorUsuario.php" class="btn btn-primary btn-block menu-button">Usuarios</a></li><hr>  
                           <li class="menu-item"><a href="Controlador/ControladorProductos.php" class="btn btn-primary btn-block menu-button">Productos</a></li><hr>                            
                           <li class="menu-item"><a href="Controlador/ControladorIngreso.php" class="btn btn-primary btn-block menu-button">Ticket de Entrada</a></li><hr>                            
                           <li class="menu-item"><a href="Controlador/ControladorSalida.php" class="btn btn-primary btn-block menu-button">Ticket de Salida</a></li><hr>                            
                        </ul>
                    </div>
                </div>                
            </div>
        </div>

           
           

            <!--.row-->

            <footer
                style="margin-top: 50px; padding: 20px; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #000000; color: #fff;  text-align: center;">
                <h2 class="footer2" style="font-size: 17px; ">Contacto: Patysport69@gmail.com | Teléfono: 3102283419
                </h2>
            </footer>


            <script>
                function scrollToSection(id) {
                    document.getElementById(id).scrollIntoView({ behavior: 'smooth' });
                }

                let currentSlide = 0;
                const slides = document.querySelectorAll('.slides img');
                const totalSlides = slides.length;

                function showSlide(index) {
                    slides.forEach((slide, i) => {
                        slide.style.display = i === index ? 'block' : 'none';
                    });
                }

                function nextSlide() {
                    currentSlide = (currentSlide + 1) % totalSlides;
                    showSlide(currentSlide);
                }

                setInterval(nextSlide, 5000); // Cambia de imagen cada 3 segundos
                showSlide(currentSlide);
            </script>

</html>



<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>