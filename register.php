<?php
//session_start();

// initializing variables
 

// connect to the database
$host = "localhost";
  $user = "root";
  $pass = "";
  $db = "wego";

  $con=mysqli_connect($host,$user,$pass)or die("Problemas al conectar"); 
  mysqli_select_db($con, $db)or die("Problemas al conectar la bd"); 



// REGISTER USER
//if (isset($_POST['reguser'])) {
  $name = $_POST['name'];
  $apellidop = $_POST['apellidop'];
  $apellidom = $_POST['apellidom'];
  $correo = $_POST['correo'];
  $password_1 = $_POST['password_1'];
  $password_2 = $_POST['password_2'];
  $username = $_POST['usuario'];

  /*if (empty($name)) { array_push($errors, "Username is required"); }
  if (empty($correo)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }*/

  $user_check_query = "SELECT * FROM usuarios WHERE correo ='$correo' LIMIT 1";
  $result = mysqli_query($con, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  //if ($user) { // if user exists
    //if ($user['username'] === $username) {
      //array_push($errors, "Username already exists");
    //}

    if ($user['correo'] === $correo) {
      echo"email already exists";
    }else{

    $query = "INSERT INTO usuarios (nombre, apellidop, apellidom, correo, password, usuario) 
          VALUES('$name', '$apellidop', '$apellidom','$correo', '$password_1', '$username')";
    mysqli_query($con, $query);
    $_SESSION['name'] = $name;
    $_SESSION['success'] = "You are now logged in";
    header('location: login.html');
  //}
    }
 // }

  /*if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database
*/

?>