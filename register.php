<?php
  session_start();
  include("connection.php");
  include("functions.php");

  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    //something was posted in the form
    $user_id = $_POST['userid'];
    $name = $_POST['name'];
    $phno = $_POST['phno'];
    $password = sha1($_POST['password']);

    //If nothing is missing
    if(!empty($user_id) && !empty($name) && !empty($phno) && !empty($password))
    {
      //save to database
      $query = "INSERT INTO users (userid, name, phone, password) VALUES ('$user_id', '$name', '$phno', '$password')";
      mysqli_query($con, $query);
      header("Location: userlogin.php");
      die;
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
    <title>Register</title>
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
    <a href="/index.html">
      <button type="button" class="button homebutton">Home</button>
    </a>
    <h1>User Registration</h1>
    <div class="text_body">
    <form method="post">
      <label for="userid">User Identification Number</label><br>
      <input type="text" name="userid"><br>
      <label for="name">Name</label><br>
      <input type="text" name="name"><br>
      <label for="phno">Phone Number</label><br>
      <input type="text" name="phno"><br>
      <label for="password">Password</label><br>
      <input type="password" name="password"><br><br>
      <input type="submit" value="Submit">
    </form>
    </div>
  </body>
</html>
