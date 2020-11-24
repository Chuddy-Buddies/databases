<?php
session_start();
    $username = $_POST['username'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $password = $_POST['password'];

    if($_SESSION["username"] == "buyer")
    {
        $class = $_POST['optradio'];
    }
    $Status = "Active";
    $Rating = 0;


    



    // session_start();
    // if($_SESSION["username"] == "buyer")
    // {
    //     $sql = "select * from buyer where Buyer_Username = '$Username'";
    // }

    //database connection
    $conn = new mysqli('localhost', 'root', '' ,'chuddybase');
    if($conn->connect_error){
        die('connection failed: '.$conn->connect_error);
    }


    if($_SESSION["username"] == "buyer")
    {

        $sql = "select Buyer_Username from buyer where Buyer_Username = '$username'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) == 0)
        {
            $stmt = $conn->prepare("INSERT INTO buyer (`Buyer_Username`, `F_name`, `L_name`, `Password`, `Buyer_Class`, `Status`)
            values(?,?,?,?,?,?)");
            $stmt->bind_param("ssssss",$username,$firstName ,$lastName ,$password , $class, $Status);
            $stmt->execute();
            echo "SIGN UP SUCCESSFUL!!!!";

            header("Location:Buyer_updateinfo.html");
        }
        else{
        echo "BUYER PLEASE SELECT ANOTHER USERNAME";
        }
    }
    else
    {
        $sql = "select Seller_Username from seller where Seller_Username = '$username'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) == 0)
        {
            $stmt = $conn->prepare("INSERT INTO seller (`Seller_Username`, `F_name`, `L_name`, `Password`, `Status`,`Rating`)
            values(?,?,?,?,?,?)");
            $stmt->bind_param("sssssi",$username,$firstName ,$lastName ,$password ,  $Status,$Rating);


            $stmt->execute();
            echo "SIGN UP SUCCESSFUL!!!!";

            header("Location:Seller_updateinfo.html");
        }
        else{
        echo "SELLER PLEASE SELECT ANOTHER USERNAME";
        }

    }

        $conn->close();

?>