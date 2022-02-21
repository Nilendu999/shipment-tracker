<?php
    $conf = file_get_contents('dbconnect.conf');
    $config = json_decode($conf,true);
    $conn=mysqli_connect($config['hostname'],$config['username'],$config['password'],$config['database']) or die("Connection Failed: " .mysqli_connect_error());
    /*$time = "1999-9-11 23:24:21";
    $temp = "11.6";
    $humidity = "11.9";
    $jerk = "1.1";
    $table = $config['table'];

    $sql_statement = "INSERT INTO $table(time,temp,humidity,jerk) VALUES ('$time','$temp','$humidity','$jerk')";
    echo($sql_statement);
    $sqlquery = mysqli_query($conn,$sql_statement);
    if($sqlquery){
        echo("Entry success");
     }
    else{
        echo("Entry failed");
    }*/
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST['time']) && isset($_POST['temp']) && isset($_POST['humidity']) && isset($_POST['jerk'])){
            $time = $_POST['time'];
            $temp = $_POST['temp'];
            $humidity = $_POST['humidity'];
            $jerk = $_POST['jerk'];
            $table = $config['table'];

            $sql_statement = "INSERT INTO $table(time,temp,humidity,jerk) VALUES ('$time','$temp','$humidity','$jerk')";
            $sqlquery = mysqli_query($conn,$sql_statement);
            if($sqlquery){
                echo("1");
            }
            else{
                echo("0");
            }
        }
    }
    //http://localhost/fyp/insertdata.php?time=2021-02-21+23:22:22&temp=12.6&humidity=13.5&jerk=2.0
    if($_SERVER['REQUEST_METHOD']=='GET'){
        if(isset($_GET['time']) && isset($_GET['temp']) && isset($_GET['humidity']) && isset($_GET['jerk'])){
            $time = $_GET['time'];
            $temp = $_GET['temp'];
            $humidity = $_GET['humidity'];
            $jerk = $_GET['jerk'];
            $table = $config['table'];

            $sql_statement = "INSERT INTO $table(time,temp,humidity,jerk) VALUES ('$time','$temp','$humidity','$jerk')";
            $sqlquery = mysqli_query($conn,$sql_statement);
            if($sqlquery){
                echo("1");
            }
            else{
                echo("0");
            }
        }
    }
?>