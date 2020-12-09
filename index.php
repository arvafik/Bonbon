<!doctype html>
<head>
  <link rel="shortcut icon" href="#" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>bonbon</title>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
  <link rel="stylesheet" href="bulma.min.css"/>
  <link rel="stylesheet" href="index.css">
  <link rel="icon" type="image/png" href="vistas/images/favicon1.ico"/>
  <script src="https://kit.fontawesome.com/a81368914c.js"></script>

</head>

  <body>
    <section id="cover">
      <div class="cont">
        <nav>
          <img id="logo" src="vistas/images/bonbonnx.png" alt="bonbon*">
          <!-- <img id="logo" src="vistas/images/bonbonnxDark.png" alt="bonbon*"> -->
          <ul>
            <div class="theme-switch-wrapper">
              <label class="theme-switch" for="checkbox">
                <input type="checkbox" id="checkbox" />
                  <div class="slider round"></div>
              </label>
            </div>
            <li><a id="login" onclick="document.getElementById('id01').style.display='block'">Login</a></li>
          </ul>
      </div>
      </nav>
      <div class="convtent">
        <p>¡Comparte tus recetas de cocina! </p>
        <p id="mini">Aquí encontrarás todas las recetas más deliciosas del internet..</p>
      </div>
      <svg id="curve" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <!-- #375A7F #ff9e80-->
        <path fill="var(--primary)" fill-opacity="1" d="M0,96L26.7,101.3C53.3,107,107,117,160,106.7C213.3,96,267,64,320,53.3C373.3,43,427,53,480,85.3C533.3,117,587,171,640,208C693.3,245,747,267,800,229.3C853.3,192,907,96,960,96C1013.3,96,1067,192,1120,208C1173.3,224,1227,160,1280,138.7C1333.3,117,1387,139,1413,149.3L1440,160L1440,0L1413.3,0C1386.7,0,1333,0,1280,0C1226.7,0,1173,0,1120,0C1066.7,0,1013,0,960,0C906.7,0,853,0,800,0C746.7,0,693,0,640,0C586.7,0,533,0,480,0C426.7,0,373,0,320,0C266.7,0,213,0,160,0C106.7,0,53,0,27,0L0,0Z"></path>
      </svg>

      </div>
    </section>

    <section id="acerca">
      <p id="titulo">ACERCA</p>
      <div id="acerca1">
        <img id="imagen1" src="vistas/images/orangehair.png" alt="chico cocinando">
        <div id="texto1">
          <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cum dolor et amet sed sequi ad voluptas facere, aliquam neque magni aliquid iure, vel, quidem adipisci. Reiciendis dolore omnis sequi earum?</p>
        </div>
      </div>
      <div id="acerca2">
        <div id="texto2">
          <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fugiat obcaecati nobis suscipit ipsam doloremque, eaque est. Tempora vero nam totam explicabo, aut neque voluptatum, corporis voluptatem temporibus assumenda in possimus.</p>
        </div>
        <img id="imagen2" src="vistas/images/cookin.png" alt="cocinando">
      </div>
      <div id="creds">
        <h1>made with <3 </h1> </div> </section> <section id="login">

            <div id="id01" class="modal">
              <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Cerrar">&times;</span>
              <!-- content -->
              <form id="formLogin" class="modal-content animate" action="" method="POST" autocomplete="off">
                <?php                ?>
                <div class="container">
                  <div class="login-content">
                    <img src="vistas/images/undraw_collaborating_g8k8.svg">
                    <div class="login-form">

                      <div class="field">
                        <label class="label">Usuario</label>
                        <div class="control has-icons-left has-icons-right">
                          <input type="text" class="input" id="usuario" name="username" required placeholder="Escribe tu usuario">
                          <span class="icon is-small is-left">
                            <i class="fas fa-user"></i>
                          </span>
                        </div>
                      </div>
                      <div class="field">
                        <label class="label">Contraseña</label>
                        <div class="control has-icons-left has-icons-right">
                          <input type="password" class="input" id="password" name="password" required placeholder="Escribe tu contraseña">
                          <span class="icon is-small is-left">
                            <i class="fas fa-lock"></i>
                          </span>
                        </div>
                      </div>
                      <button class="button is-danger is-rounded" type="submit" value="Login">Iniciar Sesión</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
    </section>
  </body>

  <script src="jquery/jquery-3.3.1.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="popper/popper.min.js"></script>
  <script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>
  <script src="codigo.js"></script>

</html>