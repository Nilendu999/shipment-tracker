<?php
$conf = file_get_contents('../config/dbconnect.conf');
     $config = json_decode($conf,true);
     $conn=mysqli_connect($config['hostname'],$config['username'],$config['password'],$config['database']) or die("Connection Failed: " .mysqli_connect_error());
     $val = FALSE;
    $flag = FALSE;
    $tabcols = $config['table_cols'];
//change hardcoding of table columns
     if($_SERVER['REQUEST_METHOD']=='GET'){
        if(isset($_GET['trackID'])){
            $table = 'tab_'.$_GET['trackID'];
            $sql = "select * from ".$config['database'].".".$table." order by ".$tabcols[0]." DESC LIMIT 1";
            //echo($sql);
            try{
                $res = mysqli_query($conn, $sql);
                //echo("<br>");
                //print_r(mysqli_fetch_row($res));
                echo(json_encode(mysqli_fetch_row($res)));
            }
            catch(Exception $e){
                echo('101');
              }
            }
              mysqli_close($conn);
        }
        //http://localhost/fypv2/utils/get-data.php?trackID=1111111
?>

