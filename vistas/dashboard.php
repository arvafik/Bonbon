<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css" />
    <link rel="stylesheet" href="vistas/dashboard.css" />
    <title>Bonbon</title>
</head>

<body>
    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item">
                <img src="vistas/images/bonbonnx.png" width="112" height="28">
            </a>
        </div>
            <div class="navbar-end">
                <div class="navbar-item">
                    <div class="buttons">
                        <a >
                            <strong>Hola <?php echo $user->getNombre();  ?></strong>
                        </a>
                        <a class="button is-light" href="includes/logout.php">
                            Cerrar sesión
                        </a>
                    </div>
                </div>
            </div>
        </div>
  
    </nav>


        <!-- <h1>Hola <?php echo $user->getNombre();  ?> estas adentroooo</h1>-->
</body>

</html>