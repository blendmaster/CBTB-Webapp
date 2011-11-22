<?php
  include "includes/db.inc.php";

  $myusername=$_POST['username'];
  $mypassword=$_POST['password'];

  $myusername = mysql_real_escape_string(stripslashes($myusername));
  $mypassword = mysql_real_escape_string(stripslashes($mypassword));

  $sql="SELECT * FROM users WHERE username ='$myusername' and password='$mypassword'";
  $result=mysql_query($sql);

  $count=mysql_num_rows($result);

  if($count==1) {
    session_register("myusername");
    session_register("mypassword");
    header("location:login.php");
  } else {
    echo "Wrong Username or Password";
  }
?>
