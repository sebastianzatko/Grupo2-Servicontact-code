<?php
require_once("blogic/Services.php");
require_once("blogic/Professional.php");

session_start();
if(isset($_SESSION["nombre"]) and isset($_SESSION["foto"]) and isset($_SESSION["id"])){
    $id=$_REQUEST["id"];
    $cont=$_REQUEST["in"];
    if(isset($id) and isset($cont)){
        if(((int)$id<=17 and (int)$id>=1) and ((int)$cont==1 or (int)$cont==0)){
            if($_SESSION["tipo"]!=1 and !isset($_SESSION["idpro"])){
                $p=new Professional;
                $p->nuevo($_SESSION["id"]);
                $_SESSION['idpro']=$p->getid($_SESSION["id"]);
                $_SESSION["tipo"]=1;
            }
            else{
                
            }
            $id_prof = $_SESSION['idpro'];
            $s = new Services();
            if((int)$cont==1){
                $res = $s->activar_servicio((int)$id_prof,(int)$id);
            }else{
                $s->deshabilitar_servicio((int)$id_prof,(int)$id);
            }
        }
    }
}
else{
    header("Location:principal.php");
}
?>