<?php 
$hostname = "p:127.0.0.1"; 
$username = "notificacion";
$password = "notificacion";
$bdeDatos = "umichccu_sistemaIncidentes"; 
session_start();
$mysqli = new mysqli($hostname, $username, $password,$bdeDatos);
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} 

$usr=$_POST["email"];
$psw=$_POST["pswd"];
$query="select idusuarios, correoElectronico, contrasena from usuarios where correoElectronico="."'$usr'"."and contrasena="."'$psw'";
$result = mysqli_query($mysqli, $query);

if (!$result) {
    echo "Fallo al ejecutar la consulta: (" . $mysqli->errno . ") " . $mysqli->error;
}

if ($fila = $result->fetch_assoc()) {
	if (count($fila)==0){
		header('Location: login.php');

	}else{
		echo "Usuario Valido, redireccionar...";
            $_SESSION['mysqli'] = $mysqli;
        	$_SESSION['id'] = $fila['idusuarios'];
        	$_SESSION['mysqli'] = $mysqli;
            $query = "SELECT TABLE_NAME FROM information_schema.tables WHERE table_schema='umichccu_sistemaIncidentes'";
            $query = "describe dependencias";
          //  $ses_sql = mysqli_query($mysqli,$query);
            //    while($row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC)) {
                     //echo $row['TABLE_NAME'];
              //      echo $row['Field']." ".$row['Type'];
                    	

                // }
        
       
        
        
          
              
        //    while($table = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC)) { // go through each row that was returned in $result
          //      echo $table[1];    // print the table that was returned on that row.
        //    }
   	        header('Location: index.php');
    	}
}else{
	header('Location: login.php');
		$_SESSION['flag']='1'; 


}











?>
