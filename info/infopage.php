<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realtime location tracker</title>
    <link rel="stylesheet" href="../style/nav-style.css">
    <link rel="stylesheet" href="../style/index.css">

    <!-- leaflet css  -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="../style/infopage.css">
</head>

<div class="bg-image"></div>
    <section class="navigation">
        <div class="nav-container">
          <div class="brand">
            <a href="#!">Real-Time Tracking System</a>
          </div>
          <nav>
            <div class="nav-mobile"><a id="nav-toggle" href="#!"><span></span></a></div>
            <ul class="nav-list">
              <li>
                <a href="#!">Home</a>
              </li>
              <li>
                <a href="#!">Info</a>
              </li>
              <li>
                <a href="#!">Statistics</a>
              </li>
              <li>
                <a href="#!">Overview</a>
              </li>
              <li>
              <?php
  $conf = file_get_contents('../config/dbconnect.conf');
  $config = json_decode($conf,true);
  $conn=mysqli_connect($config['hostname'],$config['username'],$config['password'],$config['database']) or die("Connection Failed: " .mysqli_connect_error());
  $trackID = $_GET['trackID'];
  $table = 'tab_'.$trackID;
  $val = FALSE;
  try{
    $val = mysqli_query($conn,'select 1 from '.$table.' LIMIT 1');}
    catch(Exception $e){
        echo('<h2 style="color:red;font-size:30px;">INVALID TRACKID</h2>');
    }
    if($val !== FALSE){
      echo('<h2 style="color:green;font-size:20px;">'.$trackID.'</h2>');
    }
?>
              </li>
              <li>
                <form id="form-nav" action="../overview/overview.php" method="get">
                    <input id="nav-input" type="text" name="trackID" placeholder="enter 8 digit tracking id" required="" autofocus="" />
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Track New Item</button>
                </form>
              </li>
            </ul>
          </nav>
        </div>
      </section>
      </header>
    <div class="parent">
      <div id="map"></div>
      <div id="chartContainer"></div> 
      <div id="acc">map</div>
    </div>
</body>
</html>

<!-- leaflet js  -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="../script/map-script.js"></script>
<script src="../script/temp-script.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
