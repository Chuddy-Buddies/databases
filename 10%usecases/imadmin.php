<?php
 

 session_start();

 $_SESSION["username"] = "admin";

 header('Location:Admin_login.html');

?>