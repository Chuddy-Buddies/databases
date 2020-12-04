<?php  
session_start(); 
    $buyer_id = $_SESSION["actualusername"];
    $rating = $_POST["rating"];
    $seller_id = $_POST["seller_id"];
    if(isset($_SESSION['counter']) == 0 or $_SESSION['user'] != $buyer_id) 
        $_SESSION['counter'] = 1;
        $_SESSION['user'] = $buyer_id;
    $rating_count = $_SESSION['counter']; 

    $conn = new mysqli('localhost', 'root', '', 'chuddybase');
    if($conn->connect_error)
    {
        die('Connection failed : ' .$conn->connect_error);
    }
    else
    {
        if($rating_count < 2)
        {
            $sql = "select count(Order_ID) as num_artwork from orders where Seller_Username = '$seller_id' and Buyer_Username = '$buyer_id'";
            $result = mysqli_query($conn, $sql);
            $num_artwork = mysqli_fetch_assoc($result);
            $num_artwork = $num_artwork['num_artwork'];
            $_SESSION["num_artworks"] = $num_artwork;
        }
        $num_artwork = $_SESSION["num_artworks"];
        if($num_artwork == 0)
        {
            echo "YOU HAVE TO PURCHASE AN ARTWORK FROM THIS SELLER BEFORE YOU CAN RATE.";
            $conn->close();
        }
        else
        {
            $sql2 = "select Rating as seller_rating from seller where Seller_Username = '$seller_id'";
            $result2 = mysqli_query($conn, $sql2);
            $seller_rating = mysqli_fetch_assoc($result2);
            $seller_rating = $seller_rating['seller_rating'];
            if($rating < 1 or $rating > 5)
            {
                echo "INVALID RATING.";
                $conn->close();
            }
            else
            {
                $data = ($rating + $seller_rating)/$rating_count;
                $stmt = "UPDATE seller SET Rating = '$data'
                where Seller_Username = '$seller_id'";
                if(mysqli_query($conn, $stmt))
                {
                    echo "RATING UPDATED SUCCESSFULLY!!!";
                    $_SESSION['counter']++;
                    $_SESSION["num_artworks"]--;
                }
            }
        }
    }
?>