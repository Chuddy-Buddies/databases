<?php

$art_id = $_GET["a_id"];



session_start();
    $Username = $_SESSION["actualusername"];
    //echo $Username;

    $conn = new mysqli('localhost', 'root', '', 'chuddybase');
    if($conn->connect_error)
    {
        die('Connection failed : ' .$conn->connect_error);
    }
   
 

    $sql9 = "SELECT * FROM `artwork` WHERE Artwork_ID='$art_id'  AND Status='available'";
            $result9=mysqli_query($conn, $sql9);

            if(mysqli_num_rows($result9) != 0)
            {
              $date = date('y-m-d h:i:s'); //date

              $row = mysqli_fetch_assoc($result9);
              $seller_username=$row["Seller_Username"]; //got seller User name


              //Get highest order ID
              $sql3 = "SELECT MAX(`Order_ID`) AS max_id  FROM `orders`";
              $result3=mysqli_query($conn, $sql3);
              $row3 = mysqli_fetch_array($result3);
              $new_orderid= $row3['max_id']+1;

              $sql55 = "INSERT INTO `orders`(`Order_ID`, `Buyer_Username`, `Artwork_ID`, `Seller_Username`, `Date_and_time`, `Payment_Method` ) VALUES ($new_orderid,'$Username','$art_id', '$seller_username', '$date', 'card')"; 
              //mysqli_query($conn, $sql55);
              $sql56="UPDATE `artwork` SET `Status`='sold'  WHERE `Artwork_ID`='$art_id'";
              //mysqli_query($conn, $sql56);

              if (mysqli_query($conn, $sql55) && mysqli_query($conn, $sql56) ) 
              {
                echo "Artwork bought successfully";
                echo "<br>";
                echo "OrderID     :";
                echo $new_orderid;
              
              
              } else {
                echo "Error adding record: " . mysqli_error($conn);
              }




            }

            else
            {

              echo "Artwork already Sold";
            }



    




?>