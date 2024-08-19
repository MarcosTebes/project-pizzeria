<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Sankofa+Display&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Welcome</title>
</head>

<body>
    <nav class="navtop">
        <div>
            <h1>Área privada</h1>
            <a href="logout.php">Logout</a>
        </div>

    </nav>
    <div class="content">
        <?php
        session_start();
        if ($_SESSION['logueado']) {
            echo "Bienvenido/a " . $_SESSION['username'];
        }
        echo "<br>";
        echo "horario de conexion " . $_SESSION['time'];


        ?>

    </div>


</body>

</html>