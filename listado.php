<?php include("conexion.php");?>
<?php 
if ($_GET) {

    $id = $_GET['borrar'];

    $objConexion = new conexion();


	$sql= "DELETE FROM `alumnoslista` WHERE `alumnoslista`.`id` =".$id;
	$objConexion->ejecutar($sql);
 	// header("location:listado.php");
 	echo'<script type="text/javascript">window.location.href="listado.php";</script>';

}
   	$objConexion= new conexion();
   	$alumnoslista=$objConexion->consultar('SELECT * FROM `alumnoslista`');
   	// print_r($alumnoslista);


 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Listado</title>
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
</head>
<body>

<header style="margin: 0 0 70px 0;"> 	
	<nav> 
		<a id="admin" href="admin.php"><span class="material-icons-outlined">directions_walk</span>Salir</a>
	</nav>
</header>

<div class="container">
	
	
	<div class="tabla">
		<table>
		    <tr>
				<th>Alumno</th>
		
				<th>Correo</th>
				<th><span class="material-icons-outlined">delete_forever</span></th>
			</tr>
			<?php foreach ($alumnoslista as $alumno) {?>
			
				
			<tr>
				<td><?php echo $alumno['alumno']; ?></td>
			    
			    <td><?php echo $alumno['correo']; ?></td>
			    <td class="btn"><a type="buttom" href="?borrar=<?php echo $alumno['id']; ?>"><span class="material-icons-outlined">delete_forever</span></a></td>
			</tr>
			<?php } ?>
		</table>

	</div>
</div>
<div style=" 	background: #DDDDDD; 
   	height:599px;
   	width:100px;"></div>

<script src="script/script.js"></script>
</body>
</html>