<?php

    //database connection
    $conn = new mysqli('localhost', 'root', '' ,'chuddybase');
    if($conn->connect_error)
    {
        die('connection failed: '.$conn->connect_error);
    }
    else
    {
        $sql = "select Order_ID, Buyer_Username, Artwork_ID, Seller_Username from orders where MONTH(Date_and_Time) > 0 and MONTH(Date_and_Time) <= 3 and YEAR(Date_and_Time) = YEAR(current_date)";
        $sql2 = "select Order_ID, Buyer_Username, Artwork_ID, Seller_Username from orders where MONTH(Date_and_Time) > 3 and MONTH(Date_and_Time) <= 6 and YEAR(Date_and_Time) = YEAR(current_date)";
        $sql3 = "select Order_ID, Buyer_Username, Artwork_ID, Seller_Username from orders where MONTH(Date_and_Time) > 6 and MONTH(Date_and_Time) <= 9 and YEAR(Date_and_Time) = YEAR(current_date)";
        $sql4 = "select Order_ID, Buyer_Username, Artwork_ID, Seller_Username from orders where MONTH(Date_and_Time) > 9 and MONTH(Date_and_Time) <= 12 and YEAR(Date_and_Time) = YEAR(current_date)";
        $result = mysqli_query($conn, $sql);
        $result2 = mysqli_query($conn, $sql2);
        $result3 = mysqli_query($conn, $sql3);
        $result4 = mysqli_query($conn, $sql4);
        while(1)
        {
            echo "<h2>"."PHASE 1:"."</h2>";
            if(mysqli_num_rows($result) != 0)
            {    
                echo "<table border = '1px'>";
                echo "<th>"."Order_ID"."</th>"."<th>"."Buyer_Username"."</th>"."<th>"."Artwork_ID"."</th>"."<th>"."Seller_Username"."</th>";
                while($row = mysqli_fetch_array($result))
                {
                    $order_id = $row[0];
                    $buyer_id = $row[1];
                    $art_id = $row[2];
                    $seller_id = $row[3];
                    echo "<tr>";
                    echo "<td>". $order_id . "</td>";
                    echo "<td>". $buyer_id . "</td>";
                    echo "<td>". $art_id . "</td>";
                    echo "<td>". $seller_id . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            echo "<br>"."<br>";
            echo "<h2>"."PHASE 2:"."</h2>";
            if(mysqli_num_rows($result2) != 0)
            {
                echo "<table border = '1px'>";
                echo "<th>"."Order_ID"."</th>"."<th>"."Buyer_Username"."</th>"."<th>"."Artwork_ID"."</th>"."<th>"."Seller_Username"."</th>";
                while($row = mysqli_fetch_array($result2))
                {
                    $order_id = $row[0];
                    $buyer_id = $row[1];
                    $art_id = $row[2];
                    $seller_id = $row[3];
                    echo "<tr>";
                    echo "<td>". $order_id . "</td>";
                    echo "<td>". $buyer_id . "</td>";
                    echo "<td>". $art_id . "</td>";
                    echo "<td>". $seller_id . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            echo "<br>"."<br>";
            echo "<h2>"."PHASE 3:"."</h2>";
            if(mysqli_num_rows($result3) != 0)
            {
                echo "<table border = '1px'>";
                echo "<th>"."Order_ID"."</th>"."<th>"."Buyer_Username"."</th>"."<th>"."Artwork_ID"."</th>"."<th>"."Seller_Username"."</th>";
                while($row = mysqli_fetch_array($result3))
                {
                    $order_id = $row[0];
                    $buyer_id = $row[1];
                    $art_id = $row[2];
                    $seller_id = $row[3];
                    echo "<tr>";
                    echo "<td>". $order_id . "</td>";
                    echo "<td>". $buyer_id . "</td>";
                    echo "<td>". $art_id . "</td>";
                    echo "<td>". $seller_id . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            echo "<br>"."<br>";
            echo "<h2>"."PHASE 4:"."</h2>";
            if(mysqli_num_rows($result4) != 0)
            {
                echo "<table border = '1px'>";
                echo "<th>"."Order_ID"."</th>"."<th>"."Buyer_Username"."</th>"."<th>"."Artwork_ID"."</th>"."<th>"."Seller_Username"."</th>";
                while($row = mysqli_fetch_array($result4))
                {
                    $order_id = $row[0];
                    $buyer_id = $row[1];
                    $art_id = $row[2];
                    $seller_id = $row[3];
                    echo "<tr>";
                    echo "<td>". $order_id . "</td>";
                    echo "<td>". $buyer_id . "</td>";
                    echo "<td>". $art_id . "</td>";
                    echo "<td>". $seller_id . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "<br>"."<br>";
            }
            break;
        }
        mysqli_close($conn);
    }
?>