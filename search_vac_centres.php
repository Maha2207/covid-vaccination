<?php
session_start();
include("connection.php");
include("functions.php");

$user_data = check_user_login($con);

if($_SERVER['REQUEST_METHOD'] == "POST")
{
  $location = $_POST['location'];

  if(!empty($location))
  {
    $user_id = $_SESSION['user_id'];

    $query = "SELECT * FROM vac_centres WHERE location = '$location'";
    $result = mysqli_query($con, $query);

    if($result && mysqli_num_rows($result) > 0)
    {
        while($data = mysqli_fetch_assoc($result))
        {
            echo $data['hospital']."<br>";
        }
    }

    else
    {
        echo "No vaccination centres in this location";
    }

  }
  else
  {
    echo "Enter the location";
  }
}
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Search Vaccination Centres</title>
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
  <a href="/index.html">
      <button type="button" class="button homebutton">Home</button>
    </a>
    <h1>Search Vaccination Centres</h1>
    <div class="text_body">
    <form method="post" action="details.php">
      <label for="location">Location</label><br>
      <input type="text" name="location"><br>
      <input type="submit" value="Submit">
    </form>
    </div>
  </body>
</html>
