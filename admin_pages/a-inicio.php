<?php
session_start();
require '../php/verify.php';
$name = $_SESSION['name'];
$last_name = $_SESSION['last_name'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiskiMikuna - Inicio</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Italiana&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/69e84cf231.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script>
        function checker() {
            var result = confirm('¿Estás seguro de salir?');
            if (result == false) {
                event.preventDefault();
            }
        }
    </script>
</head>

<body bgcolor="#101010">
    <section class="header">

        <nav>
            <a href="../admin_pages/a-inicio.php"><img src="../img/new_logo_white_min.png"></a>
            <div class="nav-links" id="navLinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="../admin_pages/a-inicio.php">Inicio</a></li>
                    <li><a href="../admin_pages/a-nosotros.php">Nosotros</a></li>
                    <li><a href="../admin_pages/a-carta.php"> Nuestra Carta</a></li>
                    <li><a href="../admin_pages/a-integrantes.php">Nuestro Equipo</a></li>
                    <li><a href="../admin_pages/a-dashboard.php">Dashboard</li>
                </ul>
            </div>
            <div class="icons">
                <div class="cart-box">
                    <div class="cart-icon">
                        <i class="fas fa-shopping-cart" id="cart-icon"></i>
                        <a href="../pages/cart.php" onclick="checker()" id="cart-icon-phone"><i class="fas fa-shopping-cart"></i></a>
                    </div>
                    <div class="whole-cart-window hide" id="result">
                        <div class="cart-wrapper" id="cart-header"></div>
                        <div class="cart-wrapper" id="items"></div>
                        <div class="cart-wrapper" id="cart-footer">¡Carrito Vacío - Comience a Comprar!</div>
                    </div>
                </div>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>

        <div class="text-box">
            <h1>MiskiMikuna</h1><br>
            <p>
                "No hay amor más sincero que el amor por la comida"
            </p>
        </div>

    </section>

    <!-- Promociones -->

    <section class="dishes">

        <h1>Conoce Nuestras Promociones</h1>
        <p>Los platos más selectos de nuestra carta a un precio exorbitante</p>

        <div class="box-container" id="promociones">

            <div class="box">
                <img src="../img/Anticuchos/anticuchos_2.jpg" alt="">
                <h3>Anticucho con salsa a la Huancaina</h3>
                <div class="stars">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <span>S/.</span>
                <span class="precio">37</span>
                <button class="btn" data-id="12">Añadir a la Cesta</button>
            </div>

            <div class="box">
                <img src="../img/Anticuchos/anticuchos_3.jpg" alt="">
                <h3>Anticucho de Pollo</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <span>S/.</span>
                <span class="precio">38</span>
                <button class="btn" data-id="7">Añadir a la Cesta</button>
            </div>

            <div class="box">
                <img src="../img/Anticuchos/anticuchos_1.png" alt="">
                <h3>Anticuchos de Corazón de Res</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <span>S/.</span>
                <span class="precio">39</span>
                <button class="btn" data-id="18">Añadir a la Cesta</button>
            </div>
        </div>

    </section>

    <!-- Locales -->

    <section class="locales">
        <h1>Conoce Nuestros Locales</h1>
        <p>Elige el mejor lugar para tu comodidad</p>

        <div class="row">
            <div class="locales-col">
                <img src="../img/vista1.png">
                <div class="layer">
                    <h3>Miraflores</h3>
                </div>
            </div>
            <div class="locales-col">
                <img src="../img/vista2.png">
                <div class="layer">
                    <h3>Barranco</h3>
                </div>
            </div>
            <div class="locales-col">
                <img src="../img/vista3.png">
                <div class="layer">
                    <h3>San Miguel</h3>
                </div>
            </div>
        </div>

    </section>

    <!-- Review -->

    <section class="review" id="review">
        <h1>Lo que Dicen de Nosotros</h1>
        <p>Conoce la perspectiva del público sobre nosotros</p>
        <div class="swiper review-slider">

            <div class="swiper-wrapper">

                <div class="swiper-slide slide">
                    <i class="fas fa-quote-right"></i>
                    <div class="user">
                        <img src="../img/user1.jpg" alt="">
                        <div class="user-info">
                            <h3>Ignacio Medina</h3>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                    <p>Pequeño restaurante con excelente comida y buen servicio. Sus platos son espectaculares.
                        Sin duda uno de los mejores restaurantes que he visitado durante mi carrera de crítico
                        profesional.</p>
                </div>

                <div class="swiper-slide slide">
                    <i class="fas fa-quote-right"></i>
                    <div class="user">
                        <img src="../img/user2.jpg" alt="">
                        <div class="user-info">
                            <h3>Louise Glück</h3>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                        </div>
                    </div>
                    <p>Hace tiempo que no comía algo tan bueno y de tan extraordinaría calidad.
                        Sí, es cierto que el sitio es un poco pequeño, pero la experiencia es inimaginable.</p>
                </div>

                <div class="swiper-slide slide">
                    <i class="fas fa-quote-right"></i>
                    <div class="user">
                        <img src="../img/user3.jpg" alt="">
                        <div class="user-info">
                            <h3>Henry Baxter</h3>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                        </div>
                    </div>
                    <p>Este restaurante es el lugar obligado para los turistas nacionales y/o extranjeros por la calidad
                        de sus platos y esmerado servicio.</p>
                </div>

                <div class="swiper-slide slide">
                    <i class="fas fa-quote-right"></i>
                    <div class="user">
                        <img src="../img/user4.jpg" alt="">
                        <div class="user-info">
                            <h3>Martina Pérez</h3>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                    <p>Muy buena comida peruana. Cuidado con el tamaño de los platos, son enormes. Los tragos son muy
                        buenos y el ambiente es rustico / elegante. Vayan temprano pues se llena.</p>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>

    </section>

    <!-- Footer -->

    <section class="footer">
        <div class="head-section">
            <h3>Contáctanos</h3>
            <p>
                <i class="fa-solid fa-phone"></i>&nbsp;934-734-454 <br>
                <i class="fa-solid fa-phone"></i>&nbsp;923-435-322
            </p>
        </div>
        <div class="head-section">
            <h4>Síguenos en Nuestras Redes Sociales</h4>
            <div class="footer-content">
                <div class="section">
                    <a href="##" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-facebook-f"></i>&nbsp;MiskiMikuna Restaurante</a>
                    <a href="##" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-instagram"></i>&nbsp;@MiskiMikuna</a>
                </div>
            </div>
        </div>
        <div class="footer-content">
            <div class="section">
                <h4><a href=#>Libro de Reclamaciones</a></h4>
                <h4><a href=#>Política de Cookies</a></h4><br>
            </div>
        </div><br>
        <div class="head-section">
            <small>&copy; 2022 Página desarrollada por el grupo 3</small><br>
        </div>
    </section>

    <!-- JavaScript para Reviews -->

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".review-slider", {
            spaceBetween: 33,
            loop: true,
            pagination: {
            el: ".swiper-pagination",
            clickable: true,
            },
            autoplay: {
            delay: 2500,
            disableOnInteraction: false,
            },
            centeredSlides: true,
            breakpoints: {
                0: {
                    slidesPerView: 1,
                },
                640: {
                    slidesPerView: 2,
                },
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
            }
        });

    </script>

    <!-- JavaScript para el Menu -->

    <script>
        var navLinks = document.getElementById("navLinks")

        function showMenu() {
            navLinks.style.right = "0";
        }

        function hideMenu() {
            navLinks.style.right = "-200px";
        }
    </script>

    <!-- Template del Carrito -->

    <template id="template-carrito">
        <div class="cart-item">
            <img src="../img/Entradas_Criollas/entradas_1.jpeg">
            <div class="details">
                <h3>Item Name</h3>
                <span>Cantidad: </span><span class="quantity">1</span><br><br>
                <button class="cart-btn add">+</button>
                <button class="cart-btn delete">-</button><br><br>
                <span>Precio: S/.</span><span class="price">1</span>
            </div>
        </div>
    </template>

    <!-- Template del Footer Carrito -->

    <template id="template-footer">
        <div class="total-productos">Total de Productos: <span class="ncantidad">0</span></div>
        <div class="subtotal">Total: S./<span class="nprecio">0.00</span></div>
        <a class="checkout" id="comprar-carrito" href="../pages/cart.php">Comprar Carrito</a>
    </template>

    <!-- Template del Header Carrito -->

    <template id="template-header">
        <h2>Mi Carrito</h2>
        <button id="vaciar-carrito">Vaciar Todo</button>
    </template>

    <!-- Carrito -->
    <script src="../carrito/carrito.js"></script>
    <script>
        const promociones = document.getElementById('promociones')
        promociones.addEventListener('click', e => {
            addCarrito(e)
        })
    </script>
    <script src="../carrito/carrito_emergente.js"></script>
    
</body>


</html>