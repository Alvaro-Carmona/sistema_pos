<?php

class Usuarios extends Controller{
    public function __construct()
    {
        session_start();
        parent::__construct();
    }
    public function index(){
        $data['cajas']= $this->model->getCajas();
        $this->views->getView($this,'index',$data);
    }

    public function validar(){
       if(empty($_POST['usuario']) || empty($_POST['clave'])){
         $msj = "Los campos estan vacios";
       }else{
           $usuario = $_POST['usuario'];
           $clave   = $_POST['clave'];
           $data    = $this->model->getUsuario($usuario,$clave);
           
           if($data){
               $_SESSION['id_usuario'] = $data['id'];
               $_SESSION['usuario']    = $data['usuario'];
               $_SESSION['nombre']    =  $data['nombre'];
               $msj = 'ok';
           }else{
               $msj = 'Usuario o contraseña incorrecta';
           }
       }
       echo json_encode($msj,JSON_UNESCAPED_UNICODE);
       die();
    }

    public function registrar(){
        $usuario    = $_POST['usuario'];
        $nombre     = $_POST['Nombre'];
        $contrasenia= $_POST['Contraseña'];
        $confirmar  = $_POST['Confirmar'];
        $caja       = $_POST['caja'];
        
        if(empty($usuario)||empty($nombre)||empty($contrasenia)||empty($confirmar)||empty($caja)){
            $msj = "Todos los campos son obligatorios";
        }else if( $contrasenia!=$confirmar ){
            $msj = "las Contraseñas no coinciden";
        }else{
          $data =   $this->model->registrarUsuario($usuario,$nombre,$contrasenia,$caja);
          $data == "ok" ? $msj ="ok" : $msj = "error al registrar el usuario";

        }
        echo json_encode($msj,JSON_UNESCAPED_UNICODE);
       die();

    }

    public function listar(){
        $data = $this->model->getUsuarios();
        for($i = 0; $i<count($data);$i++){
            if($data[$i]['estado'] == 1 ){
               $data[$i]['estado'] = '<span class="badge badge-success">Activo</span>';
            }else{
                $data[$i]['estado'] = '<span class="badge badge-danger">Inactivo</span>';
            }
            $data[$i]['acciones'] = '<div>
            <button class="btn btn-primary" type="button">Editar</button>
            <button class="btn btn-danger" type="button">Eliminar</button>
        </div>';
        }

        echo json_encode($data,JSON_UNESCAPED_UNICODE);
       die();

    }
}

?>
