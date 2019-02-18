<?php
	
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "wego";

	$usuario  = $_POST['user'];
	$password  = $_POST['pwd'];
	$IDuser = 0;

	$con=mysqli_connect($host,$user,$pass)or die("Problemas al conectar"); 
	mysqli_select_db($con, $db)or die("Problemas al conectar la bd"); 

	  if(!$resultado = mysqli_query($con, "SELECT idUsuario, usuario, password FROM usuarios")){

		 echo "Lo sentimos, este sitio web está experimentando problemas.";

		}else{

			while ($datos = $resultado->fetch_assoc()) {

				if($datos['usuario'] == "admin"){
					if ($usuario == $datos['usuario'] && $password == $datos['password']) {
						header("Location: admin.php");
					}
					
				}
				else if($usuario == $datos['usuario'] && $password == $datos['password']){
					$IDuser = $datos['idUsuario'];
						session_start();
						$_SESSION['login'] = "Ok";
						header("Location: inicio.html?mensaje=$IDuser");
				}else{
						echo"<script type='application/javascript'>";
						echo"alert('Ingresa un empleado existente');";
						echo"alert('$usuario');";
						echo"alert('$password');";
						echo"window.location='login.html';";
						echo"</script>";
					}
			}

		}

?>