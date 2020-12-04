<?php


$add_price = $_POST['add_price'];
$add_desc = $_POST['add_desc'];
$add_year= $_POST['add_year'];
$add_style = $_POST['add_style'];


$artist_fullname= $_POST['artist_fullname'];
$artist_style = $_POST['artist_style'];



session_start();

    $Username = $_SESSION["actualusername"];
    $usertype = $_SESSION["username"]; // for table identification this actually store the type of user it is admin etc
    
    $conn = new mysqli('localhost', 'root', '', 'chuddybase');
    if($conn->connect_error)
    {
        die('Connection failed : ' .$conn->connect_error);
    }

//Find max artwork id
    $sql3 = "SELECT MAX(`Artwork_ID`) AS max_id  FROM `artwork`";
    $result1=mysqli_query($conn, $sql3);
    $row3 = mysqli_fetch_array($result1);
    $new_artworkid= $row3['max_id']+1;



    $sql5 = "SELECT * FROM `artist` WHERE Full_Name='$artist_fullname'";
    $result3 = mysqli_query($conn, $sql5);

    if(mysqli_num_rows($result3) == 0)
    {

    $sql3 = "SELECT MAX(`Artist_ID`) AS max_artistid  FROM `artist`";
    $result1=mysqli_query($conn, $sql3);
    $row = mysqli_fetch_array($result1);
    $new_artistid= $row['max_artistid']+1;
 
  
    $sql2 = "INSERT INTO `artist`(`Artist_ID`, `Full_Name`, `Painting_Style`) VALUES ($new_artistid,'$artist_fullname','$artist_style')";  
    $sql1 = "INSERT INTO `artwork`(`Artwork_ID`, `Seller_Username`, `Artist_ID`, `Price`, `Description`, `Year`, `Status`, `Painting_Style`) VALUES ('$new_artworkid','$Username','$new_artistid',$add_price, '$add_desc' ,'$add_year','available','$artist_style')";

    if (mysqli_query($conn, $sql2) && mysqli_query($conn, $sql1)) {
      echo "Artwork successfully";
      echo "<br>";
      echo "Artwork_ID     :";
      echo $new_artworkid;
    } else {
      echo "Error adding record: " . mysqli_error($conn);
    }

    }


    else 
    {
      $row2 = mysqli_fetch_assoc($result3);
      $artist_id= $row2["Artist_ID"];
     
      $sql1 = "INSERT INTO `artwork`(`Artwork_ID`, `Seller_Username`, `Artist_ID`, `Price`, `Description`, `Year`, `Status`, `Painting_Style`) VALUES ('$new_artworkid','$Username','$artist_id',$add_price, '$add_desc' ,'$add_year','available','$artist_style')";

   

      if ( mysqli_query($conn, $sql1)) {
        echo "Artwork Added successfully";

        echo "<br>";
        echo "Artwork_ID     :";
        echo $new_artworkid;
      } else {
        echo "Error adding record: " . mysqli_error($conn);
      }




    }
 




/*
     $sql = "INSERT INTO `artwork`(`Artwork_ID`, `Seller_Username`, `Artist_ID`, `Price`, `Description`, `Year`, `Status`, `Painting_Style`) VALUES ('$add_artid','$Username','$artist_id',$add_price, '$add_desc' ,'$add_year','available','$artist_style')";
     $sql2 = "INSERT INTO `artist`(`Artist_ID`, `Full_Name`, `Painting_Style`) VALUES ($artist_id,'$artist_fullname','$artist_style')";
        
    

       $sql3 = "SELECT MAX(`Artwork_ID`) AS max_id  FROM `artwork`";
    $result1=mysqli_query($conn, $sql3);
    $row = mysqli_fetch_array($result1);

    $temp= $row['max_id']+1;
    echo $temp;



   
    else{

   
        if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql2)) {
            echo "Record Added successfully";
          } else {
            echo "Error adding record: " . mysqli_error($conn);
          }

        }
  */  


?>