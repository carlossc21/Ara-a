<?php

    require ('DBConnection.php');
    require('funciones.php');

    class anuncio{

        public $titulo;
        public $precio;
        public $lugar;
        public $caracteristicas;
        public $descripcion;

        private $con;

        public function __construct($url){
            $this->con = new DBConnection();

            $pagina = file_get_contents($url);


            $this->titulo = get_the_title_of($pagina);
            $this->precio = get_precio($pagina);
            $this->lugar = get_lugar($pagina);
            $this->caracteristicas = implode(', ', get_carasteristicas($pagina));
            $this->descripcion = get_descripcion($pagina);
        }

        public function insertar(){
            $sql = "INSERT INTO `coches`(`titulo`, `precio`, `lugar`, `caracteristicas`, `descripcion`) VALUES ('$this->titulo',$this->precio,'$this->lugar','$this->caracteristicas','$this->descripcion')";

            $this->con->consulta($sql);
        }

    }