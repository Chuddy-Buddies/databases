<?php
session_start();
    $Username = $_SESSION["actualusername"];
    
    //database connection
    $conn = new mysqli('localhost', 'root', '' ,'chuddybase');
    if($conn->connect_error)
    {
        die('connection failed: '.$conn->connect_error);
    }

    if($_SESSION["username"] == "seller")
    {
        $sql = "select * from seller where Seller_Username = '$Username'";
        $sql2 = "select Artwork_ID,Price,Description from artwork where Seller_Username = '$Username'";
        $result = mysqli_query($conn, $sql);
        $result2 = mysqli_query($conn, $sql2);

        if(mysqli_num_rows($result) == 0)
        {
            echo "THIS SELLER DOES NOT EXIST";
        }
        else
        {
            $result = $result->fetch_assoc();
            echo "Seller Username:   " . $result["Seller_Username"] . "<br>";
            echo "First Name:   " . $result["F_name"] . "<br>";
            echo "Last Name:   " . $result["L_name"] . "<br>";
            echo "Status:   " . $result["Status"] . "<br>";
            echo "Rating:   " . $result["Rating"] . "<br>";
            while($row = $result2->fetch_assoc())
            {
                echo "Artwork ID: " . $row["Artwork_ID"]. "\t" . "Price: " . $row["Price"] . "\t" . "Description: " . $row["Description"] . "<br>";
            }
        }
    }
    $conn->close();
?>