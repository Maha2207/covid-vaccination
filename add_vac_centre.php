<?php
session_start();
include("connection.php");
include("functions.php");

$user_data = check_admin_login($con);

if($_SERVER['REQUEST_METHOD'] == "POST")
{
  $centreid = $_POST['centreid'];
  $location = $_POST['location'];

  if(!empty($centreid) && !empty($location))
  {

    $query = "INSERT INTO vac_centres(centreid, location) VALUES ('$centreid', '$location')";
    mysqli_query($con, $query);

    echo "Successfully added centre";


  }
  else
  {
    echo "Enter all details";
  }
}
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add Vaccination Centres</title>
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
  <a href="/index.html">
      <button type="button" class="button homebutton">Home</button>
    </a>
    <h1>Add Vaccination Centres</h1>
    <div class="text_body">
    <form method="post" action="add_vac_centre.php">
      <label for="centreid">Centre ID</label><br>
      <input type="text" name="centreid"><br>
      <label for="location">Location</label><br>
      <input type="text" name="location"><br>
      <input type="submit" value="Submit">
    </form>
    </div>
  </body>
</html>
