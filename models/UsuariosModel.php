<?php

class UsuariosModel extends Query {
    private $usuario,$nombre,$clave,$id_caja;
      
       
     
    public function __construct()
    {
        parent::__construct();
    }

    public function getUsuario(string $usuario,string $clave){
        $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND clave = '$clave'";
        return $this->select($sql);
    }
    public function getCajas(){
        $sql = "SELECT * FROM caja WHERE estado = 1";
        return $this->selectAll($sql);
    }
    public function getUsuarios(){
        $sql = "SELECT u.*, c.id as id_caja,c.caja  FROM usuarios u INNER JOIN caja c WHERE u.id_caja = c.id";
        return $this->selectAll($sql);
    }

    public function registrarUsuario($usuario,$nombre,$contrasenia,$caja){
        $this->usuario = $usuario;
        $this->nombre  = $nombre;
        $this->clave   = $contrasenia;
        $this->id_caja = $caja;
        $sql = "INSERT INTO usuarios (usuario,nombre,clave,id_caja) VALUES (?,?,?,?)";
        $datos = array($this->usuario,$this->nombre,$this->clave,$this->id_caja);
        $data = $this->save($sql,$datos);
        $data == 1 ? $res ="ok" : $res = "error";
        return $res;
    }
}


?>