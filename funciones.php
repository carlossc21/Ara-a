<?php

    function get_the_title_of($anuncio){

        $fin ='<div data-testid="AD_DETAIL_FAVORITE_BUTTON"';
        $inicio = '<h1 class="ma-AdDetail-title ma-AdDetail-title-size-heading-m">';

        $titulo = contenido($anuncio, $inicio, $fin);

        return $titulo;
    }

    function get_lugar($anuncio){
        $inicio = '<address';
        $fin ='</address';


        $address = contenido($anuncio, $inicio, $fin, -(strlen($fin)));
        //echo $address;

        $lugar = contenido($address, '</span>', $fin, strlen($fin)+5, 14);

        return $lugar;
    }

    function get_precio($anuncio){

        $inicio = '<span class="ma-AdPrice-value ma-AdPrice-value--default ma-AdPrice-value--heading--l">';
        $fin ='€</';


        $precio = contenido($anuncio, $inicio, $fin, 2);

        return intval(str_replace('.', '', $precio));
    }

    function get_carasteristicas($anuncio){

        $car = array();

        $inicio ='<div class="ma-ContentAdDetail-attributes">';
        $fin ='<p class="ma-AdDetail-description';

        $c = contenido($anuncio, $inicio, $fin);

        $v = substr_count($c,'<li class="ma-AdTagList-item">');


        for ($i = 0; $i < $v; $i++){

            $car[] = get_first_carac($c);

            $c = '<ul>'.contenido($c, '</li>','</ul>', -5);


        }

        return $car;

    }

    function get_descripcion($anuncio){

        $inicio = '<p class="ma-AdDetail-description">';
        $fin = '</html>';

        $html = contenido($anuncio, $inicio, $fin);

        $desc = contenido($html, '', '</p>');

        return $desc;

    }


    function get_first_carac($lista){
        $fspan = contenido($lista, '<li class="ma-AdTagList-item">', '</li>');



        $sspan = contenido($fspan, '<span class="ma-AdTag ma-AdTag-small">', '</span>');

        $caracteristica = substr($sspan, strpos($sspan, '>')+1);


        return $caracteristica;
    }


    function contenido($pagina, $e1, $e2, $len=0, $b=0){

        $fin = strpos($pagina,$e2)-$len;

        $contenido = substr($pagina, (strpos($pagina, $e1)+strlen($e1))+$b, $fin-(strpos($pagina, $e1)+strlen($e1)));

        return $contenido;

    }



/*
    function get_url_anuncios($pagina){


        $urls = array();

        $arts = array();

        $inicio = '<h2 class="ma-AdCard-title-text"><a href="';
        $fin ='" class="ma-AdCard-titleLink"';

        $v = substr_count($pagina, '<article class="ma-AdCard" data-testid="AD_CARD"', 3);
        $aux = $pagina;

        for ($i = 0; $i < $v; $i++){

            $e = contenido($aux, $inicio, $fin);
            $urls[] = 'https://www.milanuncios.com'.$e;

            $aux = substr($aux, (strpos($aux, $fin)+strlen($fin)+300));

        }
        echo $v;
        foreach ($urls as $h){
            echo ($h.'<br>');
        }

        return $urls;
    }
*/

