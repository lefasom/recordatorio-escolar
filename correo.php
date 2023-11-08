<?php 

 $objConexion= new conexion();
 $alarmas=$objConexion->consultar('SELECT * FROM `alarmaa`');
 $alumnoslista=$objConexion->consultar('SELECT * FROM `alumnoslista`');

function gmail($dest,$msj){


	$destinatario = $dest;
	$asunto = "Notificacion de Escuela";
	$mensaje = $msj;
	$yo = 'From: <mi_primera_aplicacion_web.com>' . "\r\n".'Cc: <notificacion_examene_escolar>'. "\r\n";



	mail($destinatario,$asunto,$mensaje,$yo);	
		

}

date_default_timezone_set('America/Argentina/Mendoza');
$fecha = "20".date('y-m-d');




foreach ($alarmas as $alarma) {

    $valor1= $fecha==$alarma['fecha'];
    // $valor2= $alumno['curso']=="5to";
    
    if( $valor1==1){

	    foreach ($alumnoslista as $alumno) { 

	        gmail($alumno['correo'],$alarma['mensaje']);

	    }
	     
           echo "<div style='position:relative;left:0;top:5px;' ><h4><b style='color: #FF8C32;'>".$alarma['mensaje']."</b>"." se envio el dia : <b style='color: #FF8C32;'>".$alarma['fecha']."</b>, fue eliminado de la tabla</h4><div>";
	        
	    
	    
    	$objConexion = new conexion();

	    $sql= "DELETE FROM `alarmaa` WHERE `alarmaa`.`id`=".$alarma['id'];
	    $objConexion->ejecutar($sql);
        

    } 


}	


?>