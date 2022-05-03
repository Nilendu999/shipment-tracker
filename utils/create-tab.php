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
            $sql = "CREATE TABLE fyp_database.$table ( datetime DATETIME NOT NULL , latitude FLOAT NOT NULL , longitude FLOAT NOT NULL , temperature FLOAT NOT NULL , humidity FLOAT NOT NULL , acceleration_x FLOAT NOT NULL , acceleration_y FLOAT NOT NULL , acceleration_z FLOAT NOT NULL , PRIMARY KEY (datetime)) ENGINE = InnoDB;";
            try{
                mysqli_query($conn, $sql);
                echo('<script>alert("Created table  '.$table.'.")</script>');
                header("Location: ../index.html");
            }
            catch(Exception $e){
                echo($e);
                echo('
                <script>alert("Error creating table  '.$table.' !");
                    window.location="../index.html";
                </script>');
              }
            }
              mysqli_close($conn);
        }
?>