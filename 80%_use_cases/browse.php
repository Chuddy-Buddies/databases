<?php


session_start();
    
    $sql = "select * from artwork where Status = 'available'";


    $conn = new mysqli('localhost', 'root', '', 'chuddybase');
    if($conn->connect_error)
    {
        die('Connection failed : ' .$conn->connect_error);
    }
    else{

        
        $result = mysqli_query($conn, $sql);
 
        if(mysqli_num_rows($result) == 0)
        {

        echo " We have no artworks as of yet. Please try when artworks are added! ";

        $conn->close();

        }
        else{
            echo "Following are the available artworks";
            echo "<br>";
            echo "<br>";
            while($row = mysqli_fetch_assoc($result))
            { ?>
                <a href="viewartwork.php?a_id=<?php echo $row["Artwork_ID"]; ?>"><?php echo $row["Artwork_ID"]; ?></a>
                <?php echo $row["Seller_Username"]; ?>
                <?php echo "$". $row["Price"]. "\n"; ?>
                <?php echo "<br>"; ?>

                <?php
            }
        }
    }
?>
