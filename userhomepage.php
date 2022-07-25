<?php
session_start();
include("connection.php");
include("functions.php");
$user_data = check_user_login($con);
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Home Page</title>
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
  <a href="/index.html">
      <button type="button" class="button homebutton">Home</button>
    </a>
    <h1>User Vaccination Portal</h1>
    <a href="/search_vac_centres.php">
      <button class="button leftbutton">Search Vaccination Centres</button>
    </a>
    <a href="/book_vac.php">
      <button class="button centerbutton">Book a Vaccination</button>
    </a>
    <a href="/userlogin.php?option=logout">
      <button class="button rightbutton">Logout</button>
    </a>
  </body>
</html>
