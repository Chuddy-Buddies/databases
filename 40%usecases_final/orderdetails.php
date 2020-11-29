<?php

$order_id = $_GET["o_id"];

echo "This is the order id you selected " ;
echo  $order_id;
echo "<br>";

$sql = "select * from orders where Order_ID = '$order_id'";

$conn = new mysqli('localhost', 'root', '', 'chuddybase');
if($conn->connect_error)
{
    die('Connection failed : ' .$conn->connect_error);
}
else{

    
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 0)
    {

    echo " Error fetching details of this order ";

    $conn->close();

    

    }
    else{
        $row = mysqli_fetch_assoc($result);
        ?>
            

            <?php echo "Order ID          :     " . $row["Order_ID"];?>
            <?php echo "<br>";?>

            <?php echo "Artwork ID          :     " ?>
            <a href="viewartwork.php?a_id=<?php echo $row["Artwork_ID"]; ?>"><?php echo $row["Artwork_ID"]; ?></a>
            <?php echo "<br>";?>

            <?php echo "Seller ID     :     " ?>
            <a href="viewseller.php?s_id=<?php echo $row["Seller_Username"]; ?>"><?php echo $row["Seller_Username"]; ?></a>
            <?php echo "<br>";?>

            <?php echo "Timestamp     :     " .$row["Date_and_time"];?>
            <?php echo "<br>";?>

            <?php echo "Payment method:     " .$row["Payment_Method"];?>
            <?php echo "<br>";?>

        <?php

    }
}


?>