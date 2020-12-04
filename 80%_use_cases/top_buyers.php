<?php

     //database connection
    $conn = new mysqli('localhost', 'root', '' ,'chuddybase');
    if($conn->connect_error)
    {
        die('connection failed: '.$conn->connect_error);
    }
    else
    {
        $sql = "SELECT orders.Buyer_Username,SUM(artwork.Price)
        FROM artwork INNER JOIN orders ON orders.Artwork_ID = artwork.Artwork_ID 
        GROUP BY orders.Buyer_Username
        ORDER BY SUM(artwork.Price) DESC";
        $result = mysqli_query($conn, $sql);
        $counter = 1;
        echo "<table border = '1px'>";
        echo "<th>"."Ranking"."</th>"."<th>"."Buyer_Username"."</th>"."<th>"."Price"."</th>";
        while($row = mysqli_fetch_array($result))
        {
            if($counter <= 5)
            {
                $buyer_id = $row[0];
                $price = $row[1];
                echo "<tr>";
                echo "<td>". $counter . "</td>";
                echo "<td>". $buyer_id . "</td>";
                echo "<td>". $price . "</td>";
                echo "</tr>";
                $counter++;
            }
        }
        echo "</table>";
        mysqli_close($conn);
    }
?>