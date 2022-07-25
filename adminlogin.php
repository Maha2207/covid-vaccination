<?php
//Start the session. This persists till disconnection
session_start();
include("connection.php");
include("functions.php");

if(isset($_GET['option']) && $_GET['option'] == "logout")
{
  unset($_SESSION['admin_id']);
}

if($_SERVER['REQUEST_METHOD'] == "POST")
{
  //something was posted in the form
  $admin_id = $_POST['adminid'];
  $password = sha1($_POST['password']);

  //If nothing is missing
  if(!empty($admin_id) && !empty($password))
  {
    //search the database
    $query = "SELECT * FROM admins WHERE adminid = '$admin_id' LIMIT 1";
    $result = mysqli_query($con, $query);

    if($result && mysqli_num_rows($result) > 0)
    {
      $admin_data = mysqli_fetch_assoc($result);

      if($admin_data['password'] === $password)
      {
        $_SESSION['admin_id'] = $admin_id;
        header("Location: adminhomepage.php");
        die;
      }
    }
    echo "Admin ID or password is incorrect";
  }

  else
  {
    echo "All fields are compulsory";
  }
}
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
  <a href="/index.html">
      <button type="button" class="button homebutton">Home</button>
    </a>
    <h1>Admin Login</h1>
    <div class="text_body">
    <form method="post">
      <label for="adminid">Admin Identification Number</label><br>
      <input type="text" name="adminid"><br>
      <label for="password">Password</label><br>
      <input type="password" name="password"><br><br>
      <input type="submit" value="Submit">
    </form>
    </div>
  </body>
</html>
