<?php

    require ('anuncio.php');

    $anuncio = new anuncio('https://www.milanuncios.com/citroen-de-segunda-mano/citroen-c6-2-7-hdi-v6-cas-exclusive-439866928.htm');

    $anuncio->insertar();

    echo 'anuncio insertado';






