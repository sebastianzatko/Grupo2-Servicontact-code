<?php


function validar($email,$codigoDeValidacion){
            require"blogic/cdata/conexion/conection.php";
            $sql="SELECT `idUSUARIO`,`HASH_VALIDACION` FROM `USUARIOS` WHERE `MAIL`=? LIMIT 1";
            if($stmt=$mysqli->prepare($sql)){
                $stmt->bind_param("s",$email);
                $stmt->execute();
                $resultado=$stmt->get_result();
                //echo json_encode($resultado);
                if(mysqli_num_rows($resultado)==0){
                    return false;
                }else{
                    
                    $row = mysqli_fetch_assoc($resultado);
                    //echo json_encode($row['HASH_VALIDACION']);
                    if($row['HASH_VALIDACION']==$codigoDeValidacion){
                        $id=$row['idUSUARIO'];
                        echo json_encode($id);
                        $sql2="UPDATE USUARIOS SET HASH_VALIDACION=NULL,ESTADO=1 WHERE idUSUARIO=?";
                        if($statement=$mysqli->prepare($sql2)){
                            $statement->bind_param('i',$id);
                            $statement->execute();
                            echo "listo";
                        }
                        else{
                            $error = $mysqli->errno . ' ' . $mysqli->error;
                            echo $error;
                        }
                        
                    }else{
                        return false;
                    }

                }
            }else{
                $error = $mysqli->errno . ' ' . $mysqli->error;
                echo $error;
            }
}
validar("diego.ba.rodriguez@gmail.com","0d566672899f54efa558e8e876197c052761cb58b6be");
?>