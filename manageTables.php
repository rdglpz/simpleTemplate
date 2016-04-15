<?
class manageTables{
    protected $mysqlConnection;
    protected $view;
    
    
     function __construct($db){
        $view = array();
        $mysqlConnection = $db;
         
    }
    
    public function addView($v){
        push_array($view,$v);
        
    }
    
    public function printTable(){
        $fieldName = 'Field';
        $query = "describe. dependencias";
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
        
    }
    
    
    
    
    
}
?>