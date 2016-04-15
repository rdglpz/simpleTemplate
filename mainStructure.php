<?php
class mainStructure{
    // Declaración de una propiedad
    protected $rutaLogo;
    protected $nombreSistema;
    protected $idUsuario;
    protected $nombreInstitucion;
    protected $nombreUsuario;
    protected $options;
    protected $optionNames;
    protected $urlDestino;
    protected $dimension;
    protected $altura;

    // Constructor              
    public function __construct($rutaLogo, $nombreSistema, $nombreInstitucion, $idUsuario,$db) {
        $this->rutaLogo = $rutaLogo;
        $this->nombreSistema = $nombreSistema;
        $this->idUsuario = $idUsuario;
        $this->nombreInstitucion =  $nombreInstitucion;
        $this->altura = 70;
        
    }
    public function inicializarMenus($optionNames,$urlDestino){
        $this->optionNames = $optionNames;
        $this->urlDestino = $urlDestino;
        $this->dimension = getimagesize($this->rutaLogo);

       // echo " ".$this->dimension[1]; 
    }
    public function setImgLogoSize($altura){
         $this->altura = $altura;
    }
    public function printVariables(){
        echo $this->altura;
 
        
    }
    public function pestanas($opt){         
        for ($i=0; $i < sizeof($this->optionNames); $i++) {
            $this->options[$i]=' ';
        }
        $this->options[$opt] = 'class="active"';
    ?>   
    <?
    }
    
    protected function logo(){
        $ancho = round(($this->altura)*($this->dimension[0]/$this->dimension[1]));
        ?>
            <img src="<? echo $this->rutaLogo; ?>" alt="<? echo $this->rutaLogo; ?>" style="width:<?echo $ancho; ?>px;height:<? echo $this->altura; ?>px;">

        <?    
    }
    protected function scripts(){
        ?>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>            
                <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>            
                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
                <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
                
                <script src="js/jquery.min.js"></script>
                <script src="js/bootstrap.min.js"></script>
                <script src="js/scripts.js"></script>
        <?
        
    }
    protected function css(){
        ?>
        <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="simpleTemplate.css">
        <?
    }
    protected function meta(){
        ?>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?
    }    
    protected function leftMenu(){
        ?>
        <ul class="nav nav-pills nav-stacked">
        <? for ($i=0;$i<sizeof($this->options);$i++ ){ ?>
                <li <? echo $this->options[$i] ?> ><a href="<? echo $this->urlDestino[$i] ?>"><span><?echo $this->optionNames[$i]; ?></span></a></li> <?}?>
        </ul>
        <?
        
    }
    
    protected function userRol(){?>
        <div class="btn-group">
            <button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Usuario <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li ><a >Administrador</a></li>
            </ul>
        </div>   <? echo "Rodrigo"; ?>   
<?        
    }
    
    public function printHTML(){
        $this->pestanas(1);
        ?> 
        <!DOCTYPE html>
        <html>
            <head>
                <title>Page Title</title>
                <? 
                $this->meta();
                $this->css();
               
                ?>
            </head>
            <body>
                <h1>My First Heading</h1>
                <? $this->leftMenu(); 
                     $this->scripts();
                ?>
            </body>
        </html>
        <?    
    }



}


class recibidosStructure extends mainStructure{

    
    
    public function printHTML($selector){
        $this->pestanas($selector);
        ?> 
        <!DOCTYPE html>
        <html>
            <head>
                <title>Page Title</title>
                <? 
                $this->meta();
                $this->css();
                $this->scripts();
                ?>
            </head>
            <body>
                <div class="container-fluid">
    <div class="row" >
  
  <div class="row text-center " >
    <div class="col-sm-2" style="background-color:yellow;height:100px">
       <? $this->logo(); ?>
     
    </div>
    <div class="col-sm-8" style="background-color:pink; height:100px">
         
    </div>
      
      <div class="col-sm-2" style="background-color:green;height:100px">
        <? $this->userRol(); ?>  
    </div>
  </div>
      <div class="row">
    <div class="col-sm-2" style="background-color: red;">
    Left
    </div>
    <div class="col-sm-8" style="background-color: orange;">
    Center
    </div>
    <div class="col-sm-2" style="background-color: blue;">
    Right
    </div>
</div>
     <div class="row">
    <div class="col-sm-2"  id="col1" style="background-color: blue;" >
        <? $this->leftmenu(); ?>
    </div>
    <div class="col-sm-10  text-center"   style="background-color: gray;">
   <div class="panel panel-default">
        <div class="panel-heading">
          <h4>
            Fixed Header Scrolling Table 
          </h4>
        </div>
        <table class="table table-fixed">
          <thead>
            <tr>
              <th class="col-xs-2">#</th><th class="col-xs-8">Name</th><th class="col-xs-2">Points</th>
            </tr>
          </thead>
          
        </table>
      </div>
    </div>
    
</div>
    </div>
    </div>
                
                
                
                
                
                
              
       
    

    </body>

        </html>
        <?    
    }
    
}




?>