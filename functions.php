<?php
  function check_user_login($con)
  {
    //If the register number has been set in the session
    if(isset($_SESSION['user_id']))
    {
      $id = $_SESSION['user_id'];
      $query = "SELECT * FROM users WHERE userid = '$id' LIMIT 1";

      $result = mysqli_query($con, $query);

      //Positive result and more than 0 rows
      if($result && mysqli_num_rows($result) > 0)
      {
        $user_data = mysqli_fetch_assoc($result);
        return $user_data;
      }
    }

    //If it didn't work, redirect to login page
    header("Location: userlogin.php");
    die;
  }

  function check_admin_login($con)
  {
    //If the register number has been set in the session
    if(isset($_SESSION['admin_id']))
    {
      $id = $_SESSION['admin_id'];
      $query = "SELECT * FROM admins WHERE adminid = '$id' LIMIT 1";

      $result = mysqli_query($con, $query);

      //Positive result and more than 0 rows
      if($result && mysqli_num_rows($result) > 0)
      {
        $admin_data = mysqli_fetch_assoc($result);
        return $admin_data;
      }
    }

    //If it didn't work, redirect to login page
    header("Location: adminlogin.php");
    die;
  }
 ?>