<?php
 session_start();

 $_SESSION["username"] = "buyer";
 header('Location:Buyer_login.html');


?>