<?php

//in this the admin gives us 2 specific dates and we filter transactions and provide the transactions between those dates

$start_date = $_POST['Date'];
$end_date = $_POST['Time'];
$date = $start_date.' '. $end_date;


$sql = "select * from orders where Date_and_time > '$date' ";
//database connection
$conn = new mysqli('localhost', 'root', '' ,'chuddybase');
if($conn->connect_error){
    die('connection failed: '.$conn->connect_error);
}

$res = mysqli_query($conn,$sql);

if($res){
    while($row = $res->fetch_assoc()){
        echo 'Order_ID: '.$row['Order_ID'] . ' - Buyer_Username: '.$row['Buyer_Username']. ' - Artwork_ID: '.$row['Artwork_ID']. ' - Seller_Username: '.$row['Seller_Username'].' - Date and Time: '.$row['Date_and_time']. ' - "Payment Method: '.$row['Payment_Method'];
        echo "<br>";
    }
}
else{
    echo 'No transactions to show'; 
}




/*
$index = 0;
$stmt = 'select * from orders';

//database connection
$conn = new mysqli('localhost', 'root', '' ,'chuddybase');
if($conn->connect_error){
    die('connection failed: '.$conn->connect_error);
}

$res = mysqli_query($conn,$stmt);


while($row = $res->fetch_assoc()){
    if($row['Date_and_time'] < $date){
        $index = $index+1;
        echo 'Order_ID: '.$row['Order_ID'] . ' - Buyer_Username: '.$row['Buyer_Username']. ' - Artwork_ID: '.$row['Artwork_ID']. ' - Seller_Username: '.$row['Seller_Username'].' - Date and Time: '.$row['Date_and_time']. ' - "Payment Method: '.$row['Payment_Method'];
        echo "<br>";
    }
}

if(!$res || $index == 0){
    echo "No transactions to show";
}

*/
?>