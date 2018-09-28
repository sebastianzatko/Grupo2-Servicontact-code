<?php
    

    class b_user

    {
        public $idusuario;
        public $nombre;
        public $apellido;
        public $fotoperfil;
        public $mail;
        public $telefono;
        public $direccion;
        



        public function ingresar($email,$contrasena){
            include "cdata/datauser.php";

            $datos=new d_user;
            if(strlen($email)<120){
                if($datos->dataIngresar($email,$contrasena)){
                    return true;
                }else{
                    return false;
                }
            }
        }
        public function registrar($nombre,$apellido,$telefono,$mail,$contrasena,$fotoperfil,$direccion,$provincia,$localidad){
            include "cdata/datauser.php";

            function obtenerExtencion($str){
                $nose=explode('.',$str);
                $se=end($nose);
                return $se;
            }

            $datos=new d_user;

            if(strlen($nombre)<100 and strlen($apellido)<100 and strlen($mail)<150 and strlen($direccion)<100 and strlen($provincia)<100 and strlen($localidad)<100 ){
                if($datos->verificarUsuarioExistente($mail)){
                    //subir foto
                    $ruta='files/user/'.$mail."/";
                    mkdir($ruta,0777,true);
                    $extension=obtenerExtencion($fotoperfil['name']);
                    $archivo=$ruta."perfil.".$extension;
                    @move_uploaded_file($fotoperfil["tmp_name"],$archivo);
                    
                    
                    $datos->registrarNuevoUsuario($nombre,$apellido,$telefono,$archivo,$mail,$contrasena,$direccion,$provincia,$localidad);
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }
        public function confirmaremail($mail,$codigo){
            include "cdata/datauser.php";

            $datos=new d_user;
            
            if(strlen($mail)<120 and strlen($codigo)<200){
                if($datos->verificarCuenta($mail,$codigo)){
                    return true;
                }else{
                    return false;
                }
            }
        }
        public function modificarUsuario($nombre,$apellido,$telefono,$fotoperfil,$direccion,$provincia,$localidad){
            include "cdata/datauser.php";
            session_start();
            function obtenerExtencion($str){
                $nose=explode('.',$str);
                $se=end($nose);
                return $se;
            }
			$datos=new d_user;
			if($fotoperfil['name']!="" and $fotoperfil['size']!=0){
				unlink($_SESSION["foto"]);
				$ruta='files/user/'.$_SESSION["email"]."/";
				mkdir($ruta,0777,true);
				$extension=obtenerExtencion($fotoperfil['name']);
				$archivo=$ruta."perfil.".$extension;
				@move_uploaded_file($fotoperfil["tmp_name"],$archivo);
				$_SESSION["foto"]=$archivo;
			}else{
				$archivo=$_SESSION["foto"];
			}
			if(strlen($nombre)<45 and strlen($apellido)<45 and strlen($direccion)<80 and strlen($provincia)<80 and strlen($localidad)<80){
				$datos->modificarDatosUsuario($nombre,$apellido,$telefono,$archivo,$direccion,$provincia,$localidad);
				return true;
			}else{
				return false;
			}
        }
        public function obtenerDatosDeUsuario($idUsuario){
			
			function obtenerExtencion($str){
				$nose=explode('.',$str);
				$se=end($nose);
				return $se;
			}
            include "cdata/datauser.php";
            $datos=new d_user;
            $resultado=$datos->obtenerDatosDeUsuario($idUsuario);
            return $resultado;
        }

    }





?>