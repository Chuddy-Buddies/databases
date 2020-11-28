<?php

//database connection
$conn = new mysqli('localhost', 'root', '' ,'chuddybase');
if($conn->connect_error){
    die('connection failed: '.$conn->connect_error);
}

$sql = "select * from orders";
$result = mysqli_query($conn, $sql);
if(!$result){
    echo 'No transactions to export!';
}
else{
    $fp = fopen('transactions.csv', 'w');
    while($row = mysqli_fetch_assoc($result))
    {
        fputcsv($fp, $row);
    }
        
    fclose($fp);
    echo 'Transactions exported successfully!!';
}

mysqli_close($conn);

?>
