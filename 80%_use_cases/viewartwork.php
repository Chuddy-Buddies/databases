<?php
session_start();

 $Username = $_SESSION["actualusername"];
$art_id = $_GET["a_id"];

echo "This is the art id you selected " ;
echo  $art_id;
echo "<br>";

//$sql = "select * from artwork where Artwork_ID = '$art_id'";

$sql = "SELECT `Artwork_ID`, `Price`,`Year`, artwork.Painting_Style, `Description`, Full_Name, F_name, L_name FROM `artwork`INNER JOIN artist ON artwork.Artist_ID = artist.Artist_ID INNER JOIN seller ON artwork.Seller_Username = seller.Seller_Username WHERE Artwork_ID = \"$art_id\"";

$conn = new mysqli('localhost', 'root', '', 'chuddybase');
if($conn->connect_error)
{
    die('Connection failed : ' .$conn->connect_error);
}
else{

    
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 0)
    {

    echo " Error fetching details of available artworks ";

    $conn->close();

    

    }
    else{
        $row = mysqli_fetch_assoc($result);

            echo "Artwork ID          :     " . $row["Artwork_ID"];
            echo "<br>";

            echo "Seller Name          :     " .$row["F_name"].$row["L_name"];
            echo "<br>";

            echo "Artist Name          :     " .$row["Full_Name"];
            echo "<br>";

            echo "Price          :     " .$row["Price"];
            echo "<br>";

            echo "Year          :     " .$row["Year"];
            echo "<br>";

            echo "Painting style          :     " .$row["Painting_Style"];
            echo "<br>";

            echo "Description          :     " .$row["Description"];
            echo "<br>";
            echo "<br>";echo "<br>";


            /////Hamza work//////

            $sql9 = "SELECT * FROM `artwork` WHERE Artwork_ID='$art_id'  AND Status='available'";
            $result9=mysqli_query($conn, $sql9);

            if(mysqli_num_rows($result9) != 0)
            {


   // echo $Username;

                
                ?>

                <a href="buy_artwork.php?a_id=<?php echo $row["Artwork_ID"]; ?>"><?php echo "Buy Now"; ?></a>
                    <?php

                
           // echo "Buy Now " ;
            echo "<br>";
            }



            

    }
}


?>