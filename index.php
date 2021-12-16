<?php
require_once 'config/Config.php';
$ruta       = !empty($_GET['url']) ? $_GET['url'] : 'Home/index';
$array      = explode('/',$ruta);
$controller = $array[0];
$metodo     = 'index' ;
$parametro  = '';
// asignar valor al metodo
if (!empty($array[1])){
    if($array[1] != ''){
        $metodo = $array[1]; 
    }
}
// asignar valor al parametro

if (!empty($array[2])){
    if ($array[2] != ''){
        for($i = 2 ; $i < count($array); $i++){
            $parametro .= $array[$i].',' ; 
        }
        $parametro =  trim($parametro,',');
    }
}
require_once "config/app/autoload.php";
$dircontroller  = 'controllers/'.$controller.'.php';

if( file_exists($dircontroller) ){
    require_once $dircontroller;
     $controller = new $controller();
     if(method_exists($controller,$metodo)){
         $controller->$metodo($parametro);
     }else{
         echo "no existe el metodo";
     }
}else{
    echo  " no existe el controllador ";
}








?>