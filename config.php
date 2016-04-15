<?php
    define('DB_SERVER', 'p:127.0.0.1');
    define('DB_USERNAME', 'notificacion');
    define('DB_PASSWORD', 'notificacion');
    define('DB_DATABASE',"umichccu_sistemaIncidentes");
    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>
