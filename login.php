<?php


session_start();
if ((isset($_SESSION['flag']))) {
    $_SESSION['flag']==NULL;
    session_write_close();
    $recuperarPswd = "<div><a href='url'>Recuperar Contraseña</a></div>";
}else{
    echo isset($_SESSION['flag']);
    $_SESSION['flag']=NULL;
    $recuperarPswd = "";
}
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Inicio Sesion Reportes de Incidentes</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>

<body>
    <h1 class="form-signin-heading">Reportes de Incidentes<br> Institucional</h1>
    <div class="container">
        <form action="conectar.php" class="form-signin" method="post">   
            <h2 class="form-signin-heading">Iniciar Sesión</h2>
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Correo electronico Institucional" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="pswd" id="inputPassword" class="form-control" placeholder="Contraseña" required>
            <div class="row" >
                <div class="col-sm-7 text-left"><? echo $recuperarPswd ?></div>
                <div class="col-sm-5 text-right"><div><a href="url">Nuevo usuario</a></div>
                </div>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
        </form>
    </div>
</body>
</html>
<?


?>

