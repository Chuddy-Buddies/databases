<?php


session_start();

    $Username = $_POST["username"];
    $password = $_POST['pwd'];

    $path = "";

    if($_SESSION["username"] == "buyer")
    {
        $sql = "select * from buyer where Buyer_Username = '$Username'";
        $path = "Location:Buyer_updateinfo.html";
    }
    if($_SESSION["username"] == "seller")
    {
        $sql = "select * from seller where Seller_Username = '$Username'";
        $path = "Location:Seller_updateinfo.html";
    }
    if($_SESSION["username"] == "admin")
    {
        $sql = "select * from administrator where Admin_Username = '$Username'";
        $path = "Location:Seller_updateinfo.html";
    }
    


    $conn = new mysqli('localhost', 'root', '', 'chuddybase');
    if($conn->connect_error)
    {
        die('Connection failed : ' .$conn->connect_error);
    }
    else{

        
        $result = mysqli_query($conn, $sql);
 
        if(mysqli_num_rows($result) == 0)
        {

        echo " invalid username ";

        $conn->close();



        }
        else{
            $row = mysqli_fetch_assoc($result);
            //$sql2 = "select Password from buyer where Buyer_Username = '$Username'";
            $mypass = $row['Password'] ;
            // $result2 = mysqli_query($conn, $sql2);


            if ($mypass == $password)
            {
                echo " LOGIN SUCCESSFUL!!!!";
                $_SESSION["actualusername"] = $Username;
                header($path);
                
            }
            else {
                echo"PASSWORD INVALID";
            }

        }
    }


?>