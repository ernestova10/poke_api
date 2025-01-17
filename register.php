<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <form action="register.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <label for="password2">Repeat Password:</label>
        <input type="password" name="password2" id="password2" required>
        <br>
        <input type="submit" value="Enviar">
    </form>

    <?php

        if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["password2"])) {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $password2 = $_POST["password2"];

            require_once("jsonhandler.php");
            if($password == $password2) {
                $usuarios = loadFromJson();
                $newUser = ["email" => $email, "password" => $password, "name" => $name];
                $usuarios[] = $newUser;
                saveToJson($usuarios);
                header("Location: login.php");
            } else {
                echo "Las contraseñas no coinciden.";
            }
        }

    ?>
</body>
</html>