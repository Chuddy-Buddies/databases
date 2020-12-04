<?php

session_start();

    $Username = $_SESSION["actualusername"];

    $sql = "UPDATE `buyer` SET `Buyer_Class`='Premium' WHERE Buyer_Username = '$Username'";

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