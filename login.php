<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sankofa+Display&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Document</title>
</head>

<body>
    <?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include_once("config_login.php");
        //https://www.php.net/manual/es/pdo.connections.php
        try {
            // Conexion a la Base de Datos
            $conn = new PDO("mysql:host=" . SERVER_NAME . ";dbname=" . DATABASE_NAME, USER_NAME, PASSWORD);
            //echo "Conexion Exitosa";
            $usr = $_POST['username'];
            $pass = $_POST['password'];
            $hashed_pass = hash('sha256', $pass);
            $sql = "select * from users where (username=:usr or email=:usr) and (active='SI') and (password=:hashed_pass)";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':usr', $usr);
            $stmt->bindValue(':hashed_pass', $hashed_pass);
            //https://www.php.net/manual/en/pdostatement.execute.php
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row == 0) {
                //echo "Login Incorrecto";
    ?>
                <div class="alert alert-danger">
                    <a href="login.html" class="close" data-dismiss="alert">×</a>
                    <div class="text-center">
                        <h5><strong>¡Error!</strong> Login Invalido.</h5>
                    </div>
                </div>
    <?php
            } else {
                session_start();
                //echo "Login Correcto";
                date_default_timezone_set('America/Argentina/Buenos_Aires');
                $_SESSION["time"] = date('H:i:s');
                $_SESSION["username"] = $usr;
                $_SESSION['logueado'] = true;
                header("location:welcome.php");
            }
        } catch (PDOException $e) {
            echo "¡Error!: ";
            die();
        }
    } else {
        exit("Error");
    }




    ?>




</body>

</html>