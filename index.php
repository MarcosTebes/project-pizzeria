<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="css/style.css">
    <title>PIZZE IL NAPOLITANO</title>
</head>

<body>
    <header>
        <div id="header-container">
            <div id="logo">
                <img src="img/pizza.svg" alt="logo de pizza">
                <div class="logo-text">
                    <img src="img/text.svg" alt="logo de texto ">
                </div>
            </div>



            <nav>
                <ul>
                    <li><a href="#">HOME</a></li>
                    <li><a href="#">NOSOTROS</a></li>
                    <li><a href="#">SUCURSALES & DELIVERY</a></li>
                    <li><a href="#">CONTACTO</a></li>
                </ul>
            </nav>
        </div>
        <div class="main-content">
            <h2 class="animate__animated  animate__backInLeft">NUESTRAS PIZZAS</h2>
            <div id="cart">
                <i class="fa badge" id="badge" value=0><i class="fa-solid fa-cart-shopping fa-lg"></i></i>
            </div>
            <ul class="gallery">
                <?php
                include_once("config_products.php");
                try {
                    // Conexion a la Base de Datos
                    $conn = new PDO("mysql:host=" . SERVER_NAME . ";dbname=" . DATABASE_NAME, USER_NAME, PASSWORD);
                    echo "Conexion Exitosa";
                    $sql = "select c.category_name,p.image,p.product_name,p.price, date_format(p.start_date,'%d/%m/%Y') as date from products p inner join categories c on p.id_category=c.id_category order by p.price";
                    $stmt->execute();
                } catch (PDOException $e) {
                    echo "¡Error!: ";
                    die();
                }
                ?>
                <li>
                    <div class="box">
                        <figure>
                            <img src="<?php ?>" alt="fugazzeta" class="img-jpg">
                            <figcaption>
                                <h3><?php  ?></h3>
                                <p><?php ?></p>
                                <time><?php ?></time>
                            </figcaption>
                        </figure>
                        <button class="button" value="1">
                            Añadir al carrito <i class="fa-solid fa-cart-shopping"></i>
                        </button>
                    </div>
                </li>
            </ul>
        </div>
        <footer>
            <p>Copyright &copy;
                <script>
                    document.write(new Date().getFullYear());
                </script> Todos los derechos reservados
            </p>
        </footer>
        <nav id="social">
            <a href="#"> <i class="fa-brands fa-twitter"></i></a>
            <a href="#"><i class="fa-brands fa-facebook"></i></a>
            <a href="#"><i class="fa-brands fa-square-instagram"></i></a>
        </nav>
    </header>




    <script src="js/main.js"></script>
</body>

</html>