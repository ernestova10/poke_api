<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/login.css">
    <title>Login</title>
</head>
<body>

    <form action="inicio.php" method="POST">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <input type="submit" value="Enviar">
    </form>

    <?php

        require_once "jsonhandler.php";

        $usuarios = loadFromJson();
        
        if(isset($_POST["email"]) && isset($_POST["password"]))  {
            $email = $_POST["email"];
            $password = $_POST["password"];
            
            require_once 'funciones.php';
            $flag = isLogin($email, $password, $usuarios);
            isLogin($email, $password);

            
            if($flag) {
                require_once "inicio.php";
            }else{
                echo "Login incorrecto";
            }
        }
        
    ?>
</body>
</html>


