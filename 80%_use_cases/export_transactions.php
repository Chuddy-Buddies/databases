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
    $file_name = "transactions.csv";
    $fp = fopen('transactions.csv', 'w+');
    while($row = mysqli_fetch_assoc($result))
    {
        fputcsv($fp, $row);
    }
        
    fclose($fp);
    // Download the SQL backup file to the browser
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . basename($file_name));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file_name));
    ob_clean();
    flush();
    readfile($file_name);
    exec('rm ' . $file_name);

    //echo 'Transactions exported successfully!!';
}

mysqli_close($conn);

?>
