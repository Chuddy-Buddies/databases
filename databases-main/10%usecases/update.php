<?php

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$password = $_POST['password'];


session_start();

    $Username = $_SESSION["actualusername"];
    $usertype = $_SESSION["username"]; // for table identification this actually store the type of user it is admin etc



    if($_SESSION["username"] == "buyer")
    {
        $sql = "UPDATE `buyer` SET `F_name`='$firstName',`L_name`= '$lastName',`Password`='$password' WHERE Buyer_Username = '$Username'";
       
    }
    if($_SESSION["username"] == "seller")
    {
        $sql = "UPDATE `seller` SET `F_name`='$firstName',`L_name`= '$lastName',`Password`='$password' WHERE Seller_Username = '$Username'";
        
    }

    


    $conn = new mysqli('localhost', 'root', '', 'chuddybase');
    if($conn->connect_error)
    {
        die('Connection failed : ' .$conn->connect_error);
    }
    else{

        if (mysqli_query($conn, $sql)) {
            echo "Record updated successfully";
          } else {
            echo "Error updating record: " . mysqli_error($conn);
          }

        }
    


?>