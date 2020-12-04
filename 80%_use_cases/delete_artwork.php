<?php

$del_artid = $_POST['del_artid'];




session_start();

    $Username = $_SESSION["actualusername"];
    $usertype = $_SESSION["username"]; // for table identification this actually store the type of user it is admin etc

  
    $conn = new mysqli('localhost', 'root', '', 'chuddybase');
    if($conn->connect_error)
    {
        die('Connection failed : ' .$conn->connect_error);
    }

    $sql2 = "SELECT * FROM `artwork` WHERE Artwork_ID='$del_artid' AND Seller_Username='$Username'";
    $sql3 = "SELECT * FROM `artwork` WHERE Artwork_ID='$del_artid' AND Seller_Username='$Username' AND Status='available'";

    $result = mysqli_query($conn, $sql2);
    $result2 = mysqli_query($conn, $sql3);

    
    if($_SESSION["username"] == "seller")
    {
      if(mysqli_num_rows($result) == 0)
      {
        echo "Record doesn't exist";
        
      }
    elseif (mysqli_num_rows($result2) == 0) {
      echo "Error: Sold Artwork-Can't be deleted";
    }
      else{

        $sql = "UPDATE `artwork` SET `Status`='deleted'  WHERE `Artwork_ID`='$del_artid'";
        if (mysqli_query($conn, $sql)) {
          echo "Record Delete successfully";
        } else {
          echo "Error Deleting record: " . mysqli_error($conn);
        }
      }
    }

    




?>