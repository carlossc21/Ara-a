<?php

    class DBConnection{

        private $con;

        public function __construct(){

            $user = 'u5quntamrdodaqir';
            $pass = '0oeOb6PLBnfenSSHHq94';
            $server = 'bitfxnkmpzkpwuktdpwt-mysql.services.clever-cloud.com';
            $bbdd = 'bitfxnkmpzkpwuktdpwt';

            $this->con = mysqli_connect($server, $user, $pass, $bbdd) or die('No se ha podido establecer la conexión a la base de datos');

        }

        function consulta($sql){
            $this->con->query($sql);

            echo $this->con->error;
        }

    }