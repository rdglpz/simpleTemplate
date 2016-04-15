<?php
    include('config.php');
    session_start();
    $user_check=$_SESSION['id'];
    $ses_sql=mysqli_query($db,"select * from usuarios where idusuarios='$user_check'");
    $row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
    $login_session=$row['idusuarios'];
    if(!isset($row['idusuarios'])){
        header("location:login.php");
    }
?>
