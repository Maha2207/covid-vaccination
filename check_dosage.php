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

    $query = "SELECT count(userid) AS no_of_users FROM vac_bookings GROUP BY centreid HAVING centreid = '$centreid'";
    $result = mysqli_query($con, $query);

    if($result && mysqli_num_rows($result) > 0)
    {
        $data = mysqli_fetch_assoc($result);
        $usercount = $data['no_of_users'];
        echo "No of doses required = ".$usercount;
    }
    else
    {
        echo "No of doses required = 0";
    }


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
    <title>Check Dosage Details</title>
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
  <a href="/index.html">
      <button type="button" class="button homebutton">Home</button>
    </a>
    <h1>Check Dosage Details</h1>
    <div class="text_body">
    <form method="post" action="check_dosage.php">
      <label for="centreid">Centre ID</label><br>
      <input type="text" name="centreid"><br>
      <input type="submit" value="Submit">
    </form>
    </div>
  </body>
</html>
