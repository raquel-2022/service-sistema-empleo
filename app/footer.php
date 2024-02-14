     <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0; /* Elimina el margen predeterminado del cuerpo */
            padding: 0; /* Elimina el relleno predeterminado del cuerpo */
//overflow-x: hidden; /* Evita la barra de desplazamiento horizontal */
// margin: 0 40px;
//position:relative;
        }
 .content {
        flex: 1; /* Hace que el contenido ocupe el espacio restante */
    }
//        section {
//            padding: 20px;
//            margin-bottom: 80px; /* Espacio entre el contenido y el pie de pagina */
//     }

        .contact-info {
//          position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #333;
            color: #fff;
            padding: 2px;
            display: flex;
            justify-content: space-between;


            align-items: center;
font-size: 10px;
// margin-top: 20px;
        }

       .social-icons img {
            width: 30px;
            height: 30px;
            margin-right: 10px;
            cursor: pointer; /* Agrega un cursor de puntero para indicar que son enlaces */

        }

       footer {
            background-color: #000;
            color: #fff;
            padding: 7px;
            text-align: center;
  //         position: fixed;
  //          bottom: 0;

            width: 100%;
//           margin-top: 0px;
 font-size: 10px;
        }
    </style>

 <!-- Informacion de contactos, redes sociales y ubicacion -->
    <div class="contact-info">
        <div>
            <p>Contactos</p>
            <p>Cel: 9383837373</p>
        </div>

        <div class="social-icons">
            <!-- Agrega tus iconos de redes sociales con las rutas adecuadas -->
            <img src="ruta/imagen-facebook.png" alt="Facebook">
            <img src="ruta/imagen-twitter.png" alt="Twitter">
            <!-- Agrega m      s iconos seg      n tus necesidades -->
        </div>

        <div>
            <p>Ubicacion</p>
            <p>3 Tingo-Maria, thyght</p>
        </div>
    </div>
 
    <footer>
    <!-- Linea que distingue la seccion de contactos y derechos reservados -->
<!--    <hr>-->
               2024 Jobs. Todos los derechos reservados.
    </footer>
</body>


