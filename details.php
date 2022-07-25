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
        echo '<center><br><br><br>';
        echo '<table border="2"><tr>';
        echo '<th>Hospital</th><th>centreid</th><th>location</th></tr><tr>';
        while($data = mysqli_fetch_assoc($result))
        {
            echo '<td>'.$data['hospital'].'</td><td>'.$data['centreid'].'</td><td>'.$data['location'].'</td>';
        }
        echo '</tr></table>';
        echo '</center>';
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