<?php
session_start();
include("connection.php");
include("functions.php");

$user_data = check_admin_login($con);

if($_SERVER['REQUEST_METHOD'] == "POST")
{
  $centreid = $_POST['centreid'];

  if(!empty($centreid))
  {

    $query = "DELETE FROM vac_centres WHERE centreid = '$centreid'";
    mysqli_query($con, $query);
    $query = "DELETE FROM vac_bookings WHERE centreid = '$centreid'";
    mysqli_query($con, $query);

    echo "Successfully removed centre";


  }
  else
  {
    echo "Enter the centre ID";
  }
}
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Remove Vaccination Centres</title>
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
    <a href="/index.html">
      <button type="button" class="button homebutton">Home</button>
    </a>
    <h1>Remove Vaccination Centres</h1>
    <div class="text_body">
    <form method="post" action="remove_vac_centre.php">
      <label for="centreid">Centre ID</label><br>
      <input type="text" name="centreid"><br>
      <input type="submit" value="Submit">
    </form>
    </div>
  </body>
</html>
