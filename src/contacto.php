<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - Vida Sana</title>
    <link rel="shortcut icon" href="../img/logo4.webp" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/contacto.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <img src="../img/logo4.webp" alt="Vida Sana Logo">
            </div>
            <ul class="nav-links">
                <li><a href="../index.php">Inicio</a></li>
                <li><a href="quienessomos.php">Quienes Somos</a></li>
                <li><a href="ConsultasMedicas.php">Consultas Médicas</a></li>
                <li><a href="contacto.php">Contacto</a></li>
            </ul>
            <div class="nav-buttons">
                <button onclick="location.href='FormularioRegistrarse.php'">Registrarse</button>
                <button onclick="location.href='#'">Iniciar Sesión</button>
            </div>
        </nav>
    </header>
    <main>
        <section class="about-us">
        <div class="container mt-5">
        <div class="formulario">
            <h1>C O N T A C T A N O S</h1>
            <form id="contactForm">
                <div>
                    <div class="form-group">
                        <label class="control-label">Nombre y Apellido</label>
                        <div>    
                            <input name="name" type="text" class="form-control input-form-contact" placeholder="Ingrese su Nombre y Apellido" required>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="control-label">Teléfono</label>
                        <div>
                            <input name="phone" type="text" class="form-control input-form-contact" placeholder="Ingrese su número de teléfono" required>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="control-label">Correo</label>
                        <div>
                            <input name="email" type="email" class="form-control input-form-contact" placeholder="Ingrese su correo electrónico" required>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="control-label">Mensaje</label>
                        <div>    
                            <textarea name="message" class="form-control input-form-contact" rows="3" placeholder="Escribe tu mensaje" required></textarea>
                        </div>
                    </div>
                    <br>
                    <input type="submit" class="btn btn-primary pull-right" value="Enviar" id="BtnEnviar">
                    <br><br>
                </div>
            </form>
            <div id="response"></div>
        </div>
    </div>

            <div class="services-list">
                <h2>Ubicanos En:</h2>
                <hr><br>
                <p>¿Necesitas llegar? <a target="_blank" id="llegarMapa" href="https://www.google.com/maps/place/Universidad+T%C3%A9cnica+Federico+Santa+Mar%C3%ADa+(Sede+Concepci%C3%B3n)/@-36.7847314,-73.0810736,16z/data=!4m6!3m5!1s0x9669b562304e7983:0x85615e2a22fcf48!8m2!3d-36.7848002!4d-73.0851169!16s%2Fg%2F1v8329sm?authuser=0&entry=ttu"> Dar Clic Aqui!</a></p>
                <div class="mapa">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3195.4066153336885!2d-73.08769181370735!3d-36.7848001844818!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9669b562304e7983%3A0x85615e2a22fcf48!2sUniversidad%20T%C3%A9cnica%20Federico%20Santa%20Mar%C3%ADa%20(Sede%20Concepci%C3%B3n)!5e0!3m2!1ses-419!2scl!4v1718125598726!5m2!1ses-419!2scl" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="team">
                
                    <h2>Información de Contacto</h2>
                    <br>
                    <div class="infoContacto">
                        <div>
                            <h3>Correo:</h3>
                            <p>consultas@vidasana.cl</p>
                        </div>
                        <div>
                            <h3>Telefono:</h3>
                            <p>56 22 8293 2131</p>
                        </div>
                        <div>
                            <h3>WhatsApp:</h3>
                            <p>569 2831 9482</p>
                        </div>
                    </div>
                    
            </div>
            </div>
        </section>
    </main>
    <script src="../js/contacto.js"></script>
</body>
</html>
