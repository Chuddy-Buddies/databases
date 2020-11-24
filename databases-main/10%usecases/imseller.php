<?php
 session_start();

 $_SESSION["username"] = "seller";
 header('Location:Seller_login.html');



?>