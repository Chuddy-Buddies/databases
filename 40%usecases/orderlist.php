<?php


session_start();

    $Username = $_SESSION["actualusername"];
    //$Username = "buyer1";
    //$sql = "select * from orders where Buyer_Username = '$Username'";


    if($_SESSION["username"] == "buyer")
    {
        $sql = "select * from orders where Buyer_Username = '$Username'";
    }



    if($_SESSION["username"] == "seller")
    {
        $sql = "select * from seller where Seller_Username = '$Username'";
        $path = "Location:Seller_updateinfo.html";
    }

    
    


    $conn = new mysqli('localhost', 'root', '', 'chuddybase');
    if($conn->connect_error)
    {
        die('Connection failed : ' .$conn->connect_error);
    }
    else{

        
        $result = mysqli_query($conn, $sql);
 
        if(mysqli_num_rows($result) == 0)
        {

        echo " You have no recorded orders as of yet. Please buy something! ";

        $conn->close();



        }
        else{
            echo "Here is your oder history";
            echo "<br>";
            echo "<br>";
            while($row = mysqli_fetch_assoc($result))
            { ?>

                
                <a href="orderdetails.php?o_id=<?php echo $row["Order_ID"]; ?>"><?php echo $row["Order_ID"]; ?></a>
                

                <?php echo $row["Artwork_ID"]; ?>
                
                

                <?php echo "<br>"; ?>

                <?php
            }
        }
    }
?>
