<?php

class UsuariosModel extends Query {
    public function __construct()
    {
        parent::__construct();
    }

    public function getUsuario(string $usuario,string $clave){
        $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND clave = '$clave'";
        return $this->select($sql);
    }
}


?>