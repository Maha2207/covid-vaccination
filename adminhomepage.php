<?php
session_start();
include("connection.php");
include("functions.php");
$admin_data = check_admin_login($con);
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Home Page</title>
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
  <a href="/index.html">
      <button type="button" class="button homebutton">Home</button>
    </a>
    <h1>Admin Vaccination Portal</h1>
    <a href="/add_vac_centre.php">
      <button class="button leftbutton">Add a Vaccination Centre</button>
    </a>
    <a href="/remove_vac_centre.php">
      <button class="button centreleft">Remove Vaccination Centre</button>
    </a>
    <a href="/check_dosage.php">
      <button class="button centreright">Check Dosage Details</button>
    </a>
    <a href="/adminlogin.php?option=logout">
      <button class="button rightbutton">Logout</button>
    </a>
  </body>
</html>
