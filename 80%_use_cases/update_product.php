<?php

$art_id = $_POST['art_id'];
$art_price = $_POST['art_price'];
$art_description = $_POST['art_description'];


session_start();

    $Username = $_SESSION["actualusername"];
    $usertype = $_SESSION["username"]; // for table identification this actually store the type of user it is admin etc

  
    $conn = new mysqli('localhost', 'root', '', 'chuddybase');
    if($conn->connect_error)
    {
        die('Connection failed : ' .$conn->connect_error);
    }


    $sql2 = "SELECT * FROM `artwork` WHERE Artwork_ID='$art_id' AND Seller_Username='$Username'";
    $result = mysqli_query($conn, $sql2);
    if(mysqli_num_rows($result) == 0)
    {
       echo "Error: Artwork ID does not exist/belong to you";
        
    }

    else{
      $sql = "UPDATE `artwork` SET `Price`=$art_price,`Description`='$art_description'  WHERE `Artwork_ID`='$art_id'";

      if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully";
      } else {
        echo "Error updating record: " . mysqli_error($conn);
      }


    }
    


    


?>