<?php
//require_once('email.php');
    
    class d_User{

        public function verificarUsuarioExistente($email){
            require "conexion/conection.php";
            $sql="SELECT idUSUARIO from USUARIOS WHERE MAIL=? LIMIT 1";    
            if($stmt=$mysqli->prepare($sql)){
                
                $stmt->bind_param('s',$email);
                $stmt->execute();
                $resultado=$stmt->get_result();
                if(mysqli_num_rows($resultado)>=1){
                    return false;
                }else{
                    return true;
                }
             }else{
                $error = $mysqli->errno . ' ' . $mysqli->error;
                echo $error;
             }
        }
        public function registrarNuevoUsuario($nombre,$apellido,$telefono,$fotoperfil,$mail,$password,$direccion,$provincia,$localidad){
            require "conexion/conection.php";
            $randomsalt=uniqid('', true);;
            $hashcontrasena=sha1($password.$randomsalt);
            $contrasenafinal=$hashcontrasena.",".$randomsalt;

            $validacionHash=bin2hex(mcrypt_create_iv(22, MCRYPT_DEV_URANDOM));

            $sql="INSERT INTO `USUARIOS` (`NOMBRE`,`APELLIDO`,`TELEFONO`,`MAIL`,`CONTRASENA`,`FOTO_DE_PERFIL`,`HASH_VALIDACION`,`DIRECCION`,`PROVINCIA`,`LOCALIDAD`,`ESTADO`) VALUES (?,?,?,?,?,?,?,?,?,?,0)";
            if($stmt=$mysqli->prepare($sql)){
                $stmt->bind_param('ssssssssss',$nombre,$apellido,$telefono,$mail,$contrasenafinal,$fotoperfil,$validacionHash,$direccion,$provincia,$localidad);
                
                
                if($stmt->execute()){
                    
                    /*$s_email = new changeromail();
                   
                    $url = 'http://beta.changero.online/verify.php?mail='.$mail.'&codigo='.$validacionHash;
                    
                    $nombreusuario = $nombre.' '.$apellido;
                   
                    $s_email->validaremail($mail,$nombreusuario,$url);*/

                }else{
                   
                }

                
            }else{
                $error = $mysqli->errno . ' ' . $mysqli->error;
                echo $error;
            }
        }
        public function verificarCuenta($email,$condigoDeValidacion){
            require "conexion/conection.php";
            $sql="SELECT `idUSUARIO`,`HASH_VALIDACION` FROM `USUARIOS` WHERE `MAIL`=? LIMIT 1";
            if($stmt=$mysqli->prepare($sql)){
                $stmt->bind_param("s",$email);
                $stmt->execute();
            

                $resultado=$stmt->get_result();
                
                if(mysqli_num_rows($resultado)==0){
                    return false;
                }else{
                    $row = mysqli_fetch_assoc($resultado);
                    
                    if($row['HASH_VALIDACION']==$condigoDeValidacion){
                        $id=$row['idUSUARIO'];
                        $sql2="UPDATE USUARIOS SET HASH_VALIDACION=NULL,ESTADO=1 WHERE idUSUARIO=? ";
                        if($statement=$mysqli->prepare($sql2)){
                            $statement->bind_param("i",$id);
                            $statement->execute();
                            return true;
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
        public function dataIngresar($email,$contrasena,$lat,$long){
            require "conexion/conection.php";
            $sql="SELECT idUSUARIO,CONTRASENA,NOMBRE,FOTO_DE_PERFIL,TIPO_USUARIO FROM USUARIOS WHERE MAIL=? AND ESTADO<>0 LIMIT 1";
            if($stmt=$mysqli->prepare($sql)){
                $stmt->bind_param("s",$email);
                $stmt->execute();

                $resultado=$stmt->get_result();
                if(mysqli_num_rows($resultado)==0){
                    return false;
                }else{
                    $row = mysqli_fetch_assoc($resultado);
                    $arr=explode(",",$row['CONTRASENA']);
                    $salt=$arr[1];
                    $pass=$arr[0];

                    $contrasenatemporal=sha1($contrasena.$salt);
                    if($contrasenatemporal==$pass){
                        session_start();
                        $_SESSION["nombre"]=$row['NOMBRE'];
                        $_SESSION["foto"]=$row['FOTO_DE_PERFIL'];
                        $_SESSION["id"]=$row['idUSUARIO'];
                        $_SESSION["tipo"]=$row['TIPO_USUARIO'];
                        if($_SESSION["tipo"]==1){
                            require "dataprofessional.php";
                            $profesional=new dataprofessional;
                            $_SESSION['idpro']=$profesional->get_idprofesional($_SESSION["id"]);
                            $profesional->actualizarcoordenadas($lat,$long,$_SESSION['idpro']);
                        }
						$_SESSION["email"]=$email;
                        return true;
                    }else{
                        return false;
                    }

                }
            }else{
                $error = $mysqli->errno . ' ' . $mysqli->error;
                echo $error;
            }
        }
        public function obtenerDatosDeUsuario($idUsuario){
            require "conexion/conection.php";
            $sql="SELECT idUSUARIO,NOMBRE,APELLIDO,TELEFONO,MAIL,FOTO_DE_PERFIL,DIRECCION,LOCALIDAD,PROVINCIA FROM USUARIOS WHERE idUSUARIO=?";
            if($stmt=$mysqli->prepare($sql)){
                $stmt->bind_param("i",$idUsuario);
                $stmt->execute();
                $resultado=$stmt->get_result();
                return $resultado;
            }else{
                $error = $mysqli->errno . ' ' . $mysqli->error;
                echo $error;
            }
        }
		public function modificarDatosUsuario($nombre,$apellido,$telefono,$fotoperfil,$direccion,$provincia,$localidad){
			require "conexion/conection.php";
			$sql="UPDATE USUARIOS SET NOMBRE=?,APELLIDO=?,TELEFONO=?,FOTO_DE_PERFIL=?,DIRECCION=?,PROVINCIA=?,LOCALIDAD=? WHERE idUSUARIO=?";
			
			if($stmt=$mysqli->prepare($sql)){
    			$stmt->bind_param('sssssssi',$nombre,$apellido,$telefono,$fotoperfil,$direccion,$provincia,$localidad,$_SESSION['id']);
    			$stmt->execute();
			}else{
                $error = $mysqli->errno . ' ' . $mysqli->error;
                echo $error;
                exit();
            }
		}

    }


?>