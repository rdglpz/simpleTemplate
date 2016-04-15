<?
include('session.php');
include('manageTables.php');
$user_check=$_SESSION['id'];

echo $user_check;

//$ses_sql=mysqli_query($db,"select * from usuarios where Nombre='$user_check'"); 

$fieldName = 'TABLE_NAME';
$query = "SELECT ". $fieldName." FROM information_schema.tables WHERE table_schema='umichccu_sistemaIncidentes'";
echo $query;
$ses_sql = mysqli_query($db,$query);
$a = array();
while($row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC)) {
    array_push($a,$row[$fieldName]);
    //echo ;
}
echo "--->".$a[0];
echo "\n --->".count($a);


$fieldName = 'Field';
$query = "describe dependencias";
$ses_sql = mysqli_query($db,$query);
$fieldsName = array();
while($row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC)) {
    array_push($fieldsName,$row[$fieldName]);
}

$query = "select * from dependencias";
$ses_sql = mysqli_query($db,$query);
$cellTable = array(array());
while($row=mysqli_fetch_array($ses_sql,MYSQLI_NUM)) {
    $newRow = array();
    foreach ($row as $r){
        array_Push($newRow,$r);
    }
    array_push($cellTable, $newRow);
}

echo $cellTable[1][1];
echo count($cellTable[1]);


$tables = new manageTables($db);

//$mainStructure = new mainStructure($rutaLogo,$nombreSistema,$nombreInstitucion,$nombre,$id,$db);
//$mainStructure->printWebPage();


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es-GB">
<head>
	<title>Notificaciones</title>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
	<meta name="description" content="Sistema de Notificaciones" />
	<meta name="keywords" content="Sistema de Notificaciones" />
	<meta name="robots" content="index, follow" />
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="screen.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="tabla.css">
</head>
<body>
			
<div class="datagrid">
    
<ul>
    <?
    foreach ($a as $value) {
        echo "<li> $value </li>";
    }
    $query = "select * from dependencias";
    
    ?>
    
    <table>
  <tr>
      <? 
      foreach ($fieldsName as $f){
          echo "<th> $f </th>";
      }
      
      
      ?>
    
  </tr>
        

     <? 
        foreach ($cellTable as $ct){
      ?> <tr> <?
            echo count($ct);
        foreach ($ct as $c){
            if ($c!=""){
            echo "<td>".$c."</td>";
            }else{
                echo "<td> s/n </td>";
            }
        }
      ?> </tr> <?
      
      } ?> 
   
  
</table>
  
</ul>
    
    
</div>
            
            
            
		

</body>
</html>
