<?php

//this is just for the admin so we will simply print the transaction table
//if its empty then im just printing that there are no transactions to show


//database connection
$conn = new mysqli('localhost', 'root', '' ,'chuddybase');
if($conn->connect_error){
    die('connection failed: '.$conn->connect_error);
}


//lets make the sql statement first 
$stmt = "select * from orders";
$res = mysqli_query($conn,$stmt);
$num = $res->num_rows;

if($num >0){
    while($row = $res->fetch_assoc()){
        echo 'Order_ID: '.$row['Order_ID'] . ' - Buyer_Username: '.$row['Buyer_Username']. ' - Artwork_ID: '.$row['Artwork_ID']. ' - Seller_Username: '.$row['Seller_Username'].' - Date and Time: '.$row['Date_and_time']. ' - "Payment Method: '.$row['Payment_Method'];
        echo "<br>";
    }
}
else{
    echo 'No Transactions to show';
}

$conn->close();
?>