<html>
    <head>
    </head>
    <body>
    <table>
        <tr>          
        </tr>      
            <?php
            session_start();
                $artwork1 = $_POST["artwork1"];
                $artwork2 = $_POST["artwork2"];

                //database connection
                $conn = new mysqli('localhost', 'root', '' ,'chuddybase');
                if($conn->connect_error)
                {
                    die('connection failed: '.$conn->connect_error);
                }

                $sql2 = "select * from artwork where Artwork_ID = '$artwork1'";
                $sql1 = "select * from artwork where Artwork_ID = '$artwork2'";
                $result1 = mysqli_query($conn, $sql1);
                $result2 = mysqli_query($conn, $sql2);

                //assuming that the comparison won't take place if either of the ID's don't exist
                if(mysqli_num_rows($result1) != 0)
                {
                    if(mysqli_num_rows($result2) != 0)
                    {
                        
                        $row = $result1->fetch_assoc();
                        $row2 = $result2->fetch_assoc();
                        echo "<tr>" . "<td>" . "Artwork ID:" . "</td><td>" . $row["Artwork_ID"] . "</td><td>" .  $row2["Artwork_ID"] . "</td></tr>" .
                        "<tr>" . "<td>" . "Seller Username: " . "</td><td>" . $row["Seller_Username"] . "</td><td>" . $row2["Seller_Username"] . "</td></tr>" .
                        "<tr>" . "<td>" . "Artist ID: " . "</td><td>" . $row["Artist_ID"] . "</td><td>" . $row2["Artist_ID"] . "</td></tr>" .
                        "<tr>" . "<td>" . "Price($):" . "</td><td>" . $row["Price"] . "</td><td>" . $row2["Price"] . "</td></tr>" .
                        "<tr>" . "<td>" . "Description:" . "</td><td>" . $row["Description"] . "</td><td>" . $row2["Description"] . "</td></tr>" .
                        "<tr>" . "<td>" . "Year: " . "</td><td>" . $row["Year"] . "</td><td>" . $row2["Year"] . "</td></tr>" .
                        "<tr>" . "<td>" . "Artwork Status" . "</td><td>" . $row["Status"] . "</td><td>" . $row2["Status"] . "</td></tr>" .
                        "<tr>" . "<td>" . "Painting Style" . "</td><td>" . $row["Painting_Style"] . "</td><td>" . $row2["Painting_Style"] . "</td></tr>";
                        
                    }
                    else
                    {
                        echo "ARTWORK WITH ID '$artwork2' DOES NOT EXIST";
                    }
                }
                else
                {
                    echo "ARTWORK WITH ID '$artwork1' DOES NOT EXIST";
                }
                $conn->close();
            ?>
        </table>
    </body>
</html>