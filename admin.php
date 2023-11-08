<?php include("conexion.php");?>
<?php include("correo.php");?>
<?php 



if (isset($_POST['send'])) {
       
        $msj=$_POST['msj'];
        $date=$_POST['date'];
        // $time=$_POST['time'];
        $time='para un furturo';
        $curso=$_POST['curso'];


	$objConexion = new conexion();



	$sql="INSERT INTO `alarmaa` (`id`, `curso`, `mensaje`, `fecha`, `time`) VALUES (NULL, ' $curso', '$msj', '$date', '$time');";


	$objConexion->ejecutar($sql);
	// header("location:admin.php");
        echo'<script type="text/javascript">window.location.href="admin.php";</script>';
}
if ($_GET) {

        $id = $_GET['borrar'];

    	$objConexion = new conexion();


	$sql= "DELETE FROM `alarmaa` WHERE `alarmaa`.`id`=".$id;
	$objConexion->ejecutar($sql);
 	// header("location:admin.php");
 	echo'<script type="text/javascript">window.location.href="admin.php";</script>';

 }
   	 $objConexion= new conexion();
   	 $alarmas=$objConexion->consultar('SELECT * FROM `alarmaa`');
   	 // print_r($alarmas);

        $objConexion= new conexion();
   	$alumnoslista=$objConexion->consultar('SELECT * FROM `alumnoslista`');
   	
   	
 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="style/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
</head>
<body>
<header> 
	<nav> 
		<a href="listado.php"><span class="material-icons-outlined">view_list</span> Listado</a>

		<a href="index.php"><span class="material-icons-outlined">logout</span>  Cerrar</a>
	</nav>
</header>

<div class="container2">
	<form  class="container-form2" action="admin.php" method="post">

		<label>Mensaje:</label>
	        <input  type="text" autocomplete="off" name="msj">

	        <div class="elementos">
		
	      	   	<select style="display:none;"name="curso">
			        	<option>Elegir curso</option>
					<option>5to</option>
					<option>4to</option>
					<option>3ro</option>
					<option>2do</option>
					<option>1ro</option>
		     	</select>
            <!--<input type="time" name="time">-->
			<input type="date" name="date">
		</div>	
		<input type="submit" name="send" value="Agregar">

		
	</form>
</div>

<div class="tabla">
		
	<table>
                
			<tr>
				
				<th>Mensaje</th>
				<th>Fecha</th>
				<!--<th>hora</th>para un futuro-->
				<th>Eliminar</th>
			</tr>
				
		<?php foreach ($alarmas as $alarma) {?>

			<tr>
			    	
			    	<td><?php echo $alarma['mensaje']; ?></td>
			    	<td><?php echo $alarma['fecha']; ?></td>
			    	<!--<td><?php echo $alarma['time'];?></td>para un futuro-->
			    	<td class="btn"><a type="buttom" href="?borrar=<?php echo $alarma['id']; ?>"><span class="material-icons-outlined">delete_forever</span></a></td>
			</tr>

		<?php } ?>

	</table>
     	
</div>

<div style=" 	background: #DDDDDD; 
   	height:599px;
   	width:100px;"></div>
<script src="script/script.js"></script>

</body>
</html>