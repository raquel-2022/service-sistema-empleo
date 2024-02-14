<?php
    include 'header.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <img id="background-image" class="hidden" src="images/Imagen1.png" alt="Imagen de fondo 1">
    <img id="background-image-2" class="hidden" src="images/Imagen2.jpg" alt="Imagen de fondo 2">

 <section>
    <h2>Bienvenid@ a GhyarComputer</h5>
    <div class="explora">
        Explora nuestras oportunidades laborales y descubre como puedes formar parte de un equipo que lidera el cambio y define el futuro.
    </div>
     <div class="custom-w" onclick="window.location.href='subir-cv.php'">Ver Oportunidades</div>
   
  </section>

    <script>
  const backgroundImages = document.querySelectorAll('#background-image, #background-image-2');
       let currentIndex = 0;

        function changeBackgroundImage() {
            currentIndex = 1 - currentIndex; // Cambia entre 0 y 1
            backgroundImages[currentIndex].classList.remove('hidden');
            backgroundImages[1 - currentIndex].classList.add('hidden');
            setTimeout(changeBackgroundImage, 3000); 
        }

         changeBackgroundImage(); 
    </script>



