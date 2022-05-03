<?php
    //CONNECTING TO DATABASE SERVER
    $conf = file_get_contents('../config/dbconnect.conf');
    $config = json_decode($conf,true);
    $tabcols = $config['table_cols'];
    $conn=mysqli_connect($config['hostname'],$config['username'],$config['password'],$config['database']) or die("Connection Failed: " .mysqli_connect_error());
    $val = FALSE;

    //CHECKING FOR POST REQUEST
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST['trackID'] ,$_POST['datetime'] ,$_POST['latitude'] ,$_POST['longitude'] ,$_POST['temperature'] ,$_POST['humidity'] ,$_POST['acceleration_x'] ,$_POST['acceleration_y'] ,$_POST['acceleration_z'])){
            $datetime = $_POST['datetime'];
            $lat = $_POST['latitude'];
            $lon = $_POST['longitude'];
            $temp = $_POST['temperature'];
            $hum = $_POST['humidity'];
            $accx = $_POST['acceleration_x'];
            $accy = $_POST['acceleration_y'];
            $accz = $_POST['acceleration_z'];
            $table = 'tab_'.$_POST['trackID'];
            try{
            $val = mysqli_query($conn,'select 1 from '.$table.' LIMIT 1');}
            catch(Exception $e){
                echo("3");
            }
            if($val !==FALSE){
                $sql_statement = "INSERT INTO $table($tabcols[0],$tabcols[1],$tabcols[2],$tabcols[3],$tabcols[4],$tabcols[5],$tabcols[6],$tabcols[7]) VALUES ('$datetime','$lat','$lon','$temp','$hum','$accx','$accy','$accz')";
                #echo($sql_statement);
                $sqlquery = mysqli_query($conn,$sql_statement);
                if($sqlquery){
                    echo("1");
                }
                else{
                    echo("0");
                }
            }
        }
    }
    //CHECKING FOR GET REQUESTS
    //http://localhost/fypv2/utils/insert-data.php?trackID=12345678&datetime=2021-02-10+23:22:22&latitude=10.009&longitude=12.192&temperature=12.6&humidity=13.5&acceleration_x=0&acceleration_y=0&acceleration_z=9.81
    if($_SERVER['REQUEST_METHOD']=='GET'){
        if(isset($_GET['trackID'] ,$_GET['datetime'] ,$_GET['latitude'] ,$_GET['longitude'] ,$_GET['temperature'] ,$_GET['humidity'] ,$_GET['acceleration_x'] ,$_GET['acceleration_y'] ,$_GET['acceleration_z'])){
            $datetime = $_GET['datetime'];
            $lat = $_GET['latitude'];
            $lon = $_GET['longitude'];
            $temp = $_GET['temperature'];
            $hum = $_GET['humidity'];
            $accx = $_GET['acceleration_x'];
            $accy = $_GET['acceleration_y'];
            $accz = $_GET['acceleration_z'];
            $table = "tab_".$_GET['trackID'];
            try{
            $val = mysqli_query($conn,'select 1 from '.$table.' LIMIT 1');}
            catch(Exception $e){
                echo("3");
            }
            if($val !== FALSE){
                $sql_statement = "INSERT INTO $table($tabcols[0],$tabcols[1],$tabcols[2],$tabcols[3],$tabcols[4],$tabcols[5],$tabcols[6],$tabcols[7]) VALUES ('$datetime','$lat','$lon','$temp','$hum','$accx','$accy','$accz')";
                //echo($sql_statement);
                $sqlquery = mysqli_query($conn,$sql_statement);
                if($sqlquery){
                    echo("1");
                }
                else{
                    echo("0");
                }
            }
        }
    }
?>