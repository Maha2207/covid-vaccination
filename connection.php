<?php
//Connect to the database
  $server = "localhost";
  $username = "root";
  $password = "";
  $db = "covid_vac_portal";

  $con = mysqli_connect($server, $username, $password, $db);

  if(!$con)
  {
    die("connection to this database failed due to" . mysqli_connect_error());
  }

 ?>
