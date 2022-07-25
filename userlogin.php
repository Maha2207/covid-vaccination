<?php

session_start();
include("connection.php");
include("functions.php");

if(isset($_GET['option']) && $_GET['option'] == "logout")
{
  unset($_SESSION['user_id']);
}

if($_SERVER['REQUEST_METHOD'] == "POST")
{
  
  $user_id = $_POST['userid'];
  $password = sha1($_POST['password']);

  
  if(!empty($user_id) && !empty($password))
  {
    
    $query = "SELECT * FROM users WHERE userid = '$user_id' LIMIT 1";
    $result = mysqli_query($con, $query);

    if($result && mysqli_num_rows($result) > 0)
    {
      $user_data = mysqli_fetch_assoc($result);

      if($user_data['password'] === $password)
      {
        $_SESSION['user_id'] = $user_id;
        header("Location: userhomepage.php");
        die;
      }
    }
    echo "User ID or password is incorrect";
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
    <title>User Login</title>
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
  <a href="/index.html">
      <button type="button" class="button homebutton">Home</button>
    </a>
    <h1>User Login</h1>
    <div class="text_body">
    <form method="post">
      <label for="userid">User Identification Number</label><br>
      <input type="text" name="userid"><br>
      <label for="password">Password</label><br>
      <input type="password" name="password"><br><br>
      <input type="submit" value="Submit">
    </form>
    <br>
    New here?
    <a href="/register.php">
      <button class="smallbutton">Register Here!</button>
    </a>
    </div>
  </body>
</html>
