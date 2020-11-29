<?php

$seller_id = $_GET["s_id"];

echo "This is the seller id you selected " ;
echo  $seller_id;
echo "<br>";

$sql = "select * from seller where Seller_Username = '$seller_id'";

$conn = new mysqli('localhost', 'root', '', 'chuddybase');
if($conn->connect_error)
{
    die('Connection failed : ' .$conn->connect_error);
}
else{

    
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 0)
    {

    echo " Error fetching details of this seller ";

    $conn->close();

    

    }
    else{
        $row = mysqli_fetch_assoc($result);

            echo "Seller ID          :     " . $row["Seller_Username"];
            echo "<br>";

            echo "Seller Rating          :     " .$row["Rating"];
            echo "<br>";


            echo " need to add all artworks enlisted by the seller ";
            echo "<br>";

    }
}


?>