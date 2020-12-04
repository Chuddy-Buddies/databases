<?php

$username = $_POST['username'];
$account_type = $_POST['accttype'];


if($account_type == "Buyer"){
    $sql = "select * from buyer where Buyer_Username = '$username'";
}
else if ($account_type == "Seller"){
    $sql = "select * from seller where Seller_Username = '$username' ";
}

//database connection
$conn = new mysqli('localhost', 'root', '' ,'chuddybase');
if($conn->connect_error){
    die('connection failed: '.$conn->connect_error);
}
$res = mysqli_query($conn, $sql);

if(mysqli_num_rows($res) == 0){
    echo 'No User with this username is found';
}
else{
    if($account_type == 'Buyer'){
        $sql2 = "update buyer set Status = 'Blocked' where Buyer_Username = '$username' ";
        $res2 = mysqli_query($conn,$sql2);
        echo 'User Blocked Successfully';
    }
    else if($account_type == 'Seller'){
        $sql2 = "update seller set Status = 'Blocked' where Seller_Username = '$username' ";
        $res2 = mysqli_query($conn,$sql2);
        echo 'User Blocked Successfully';
    }
}


?>
