<?php
session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    //database connection
    $conn = new mysqli('localhost', 'root', '' ,'chuddybase');
    if($conn->connect_error)
    {
        die('connection failed: '.$conn->connect_error);
    }

    if($_SESSION["username"] == "admin")
    {
        $sql = "select Admin_Username from administrator where Admin_Username = '$username'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) == 0)
        {
            $stmt = $conn->prepare("INSERT INTO administrator (`Admin_Username`, `Password`)
            values(?,?)");
            $stmt->bind_param("ss",$username, $password);
            $stmt->execute();
            echo "SIGN UP SUCCESSFUL!!!!";
            header("Location:Admin_dashboard.html"); 
            $stmt->close();
        }
        else
        {
            echo "USERNAME ALREADY IN USE. PLEASE SELECT ANOTHER USERNAME";
        }
        $conn->close();
    }
?>