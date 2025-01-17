<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemon Info</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Header con Login y Sign Up -->
    <header class="header">
        <div class="header__container">
            <h1 class="header__logo">PokéInfo</h1>
            <nav class="header__nav">
                <a href="login.php" class="header__link">Login</a>
                <a href="register.php" class="header__link header__link--signup">Sign Up</a>
            </nav>
        </div>
    </header>

    <main class="body__main">
        <div class="main__container">
            <!-- Sección de Búsqueda -->
            <div class="busquedad">
                <form method="POST" action="inicio.php">
                    <div class="mb-3">
                        <label for="pokemon" class="form-label">Nombre o ID del Pokémon</label>
                        <input type="text" class="form-control" name="pokemon" id="pokemon" required>
                    </div>
                    <button type="submit" class="btn">Buscar</button>
                </form>
            </div>

            <!-- Sección de Resultados -->
            <div class="resultados">
                <div class="tarjeta">
                <?php
                    if (isset($_POST['pokemon'])) {
                        $pokemon = $_POST['pokemon'];
                        $url = "https://pokeapi.co/api/v2/pokemon/$pokemon";

                       
                            $response = file_get_contents($url);
                            $data = json_decode($response, true);

                            $name = ucfirst($data['name']);
                            $foto = $data['sprites']['front_default'];
                            $stats = $data['stats'];
                            $type = $data['types'][0]['type']['name'];
                          

                            echo "<div class='resultados $type'>";
                                echo "<div class='tarjeta'>";
                                    echo "<h1 class='tarjeta__name'>$name</h1>";
                                    echo "<img src='$foto' alt='$name' class='tarjeta__img'>";

                                    echo "<h2 class='tarjeta__stats-title'>Estadísticas</h2>";
                                    echo "<ul class='tarjeta__stats-list'>";
                                    echo "<li class='tarjeta__stat'>{$type}</li>";
                                    foreach ($stats as $stat) {
                                        echo "<li class='tarjeta__stat'>{$stat['stat']['name']}: {$stat['base_stat']}</li>";
                                    }
                                    echo "</ul>";
                                echo "</div>";
                            echo "</div>";
                       
                    } else {
                        echo "<p class='tarjeta__placeholder'>Busca un Pokémon para mostrar su información aquí.</p>";
                    }
                ?>

                </div>
            </div>
        </div>
    </main>
</body>
</html>
