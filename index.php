
<?php 

include("conexion.php");?>

<?php 

// session_start();

// $destinatario = "leosombra89@gmail.com";
// 	$asunto = "Notificacion de Escuela";
// 	$mensaje = "hola leo como estas?";
	

// 	mail($destinatario,$asunto,$mensaje);	
	


if (isset($_POST['submit'])) {

  if (($_POST['usuario']=="profesor") && ($_POST['password']=="1234")) {

    // $_SESSION['Usuario'] ="profesor";

    // header("location:admin.php");
    echo'<script type="text/javascript">window.location.href="admin.php";</script>';
  }else{
//  if (isset($_SESSION['Usuario'])!="Leonardo") {

  
//   echo'<script type="text/javascript">window.location.href="index.php";</script>';
// }
   echo "login incorrecto";
  }
}


?>

<?php 

if (isset($_POST['send'])) {

    	if (isset($_POST['notificacion'])) {

	 	$nombre=$_POST['nombre'];
	 	$correo=$_POST['correo'];
		$notificacion=$_POST['notificacion'];
		$curso=$_POST['curso'];

       

	   	$objConexion = new conexion();



		$sql="INSERT INTO `alumnoslista` (`id`, `alumno`, `correo`, `curso`) VALUES (NULL, '$nombre', '$correo', '$curso');";

		$objConexion->ejecutar($sql);
		// header("location:index.php");
		echo'<script type="text/javascript">window.location.href="index.php";</script>';
   	} 	


}

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Recordatorio</title>
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
</head>
<body>
<header> 
	<nav> 
		<a id="admin" href="#"><span class="material-icons-outlined">login</span> Administrador</a>
	</nav>
</header>
<div  id="modal">
	<div id="cerrar">
		<p>X</p>
	</div>
	<form action="index.php" method="post">
		<br><br>
		<input type="" name="usuario" placeholder="Usuario">
		<br><br>
		<input type="" name="password" placeholder="Contraseña">
		<br>
		<input id="contrasenia" type="submit" name="submit" value="Entrar">
		
	</form>
</div>

<div class="container">
	

	<form class="container-form" action="index.php" method="post" autocomplete="off">

	
        <label>Nombre y Apellido:</label>
        <input type="text" autocomplete="off" name="nombre">

        <label>Correo:</label>
        <input  type="email" autocomplete="off" name="correo">
        
        <div class="notificacion">
        	
		        <label>Activar notificacion: </label>
		        <input type="checkbox" name='notificacion' >

		        	<select style="display:none;" name="curso">
		        	<option>Elegir curso</option>
					<option>5to</option>
					<option>4to</option>
					<option>3ro</option>
					<option>2do</option>
					<option>1ro</option>
					</select>
        </div>

		<br>

        <input type="submit" value="Aceptar" name="send">

	</form>

</div>
<div style=" 	background: #DDDDDD; 
   	height:599px;
   	width:100px;"></div>
<script src="script/script.js"></script>
</body>
</html>