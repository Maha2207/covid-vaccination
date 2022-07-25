<?php
session_start();
include("connection.php");
include("functions.php");

$student_data = check_user_login($con);

if($_SERVER['REQUEST_METHOD'] == "POST")
{
  $centreid = $_POST['centreid'];

  if(!empty($centreid))
  {
    $user_id = $_SESSION['user_id'];

    $query = "SELECT count(userid) AS no_of_users FROM vac_bookings GROUP BY centreid HAVING centreid = '$centreid'";
    $result = mysqli_query($con, $query);

    if($result && mysqli_num_rows($result) > 0)
    {
        $data = mysqli_fetch_assoc($result);
        $user_count = $data['no_of_users'];
        if($user_count >= 10)
        {
            echo "Vaccination Centre is full";
        }
        else
        {
            $query = "INSERT INTO vac_bookings(centreid, userid) VALUES ('$centreid', '$user_id')";
            mysqli_query($con, $query);
            echo "Successfully booked centre";
        }
    }
    else
    {
        $query = "INSERT INTO vac_bookings(centreid, userid) VALUES ('$centreid', '$user_id')";
        mysqli_query($con, $query);
        echo "Successfully booked centre";
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
    <title>Book Vaccination Centres</title>
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
  <a href="/index.html">
      <button type="button" class="button homebutton">Home</button>
    </a>
    <h1>Book Vaccination Centres</h1>
    <div class="text_body">
    <form method="post" action="book_vac.php">
      <label for="centreid">Centre ID</label><br>
      <input type="text" name="centreid"><br>
      <input type="submit" value="Submit">
    </form>
    </div>
  </body>
</html>
