<?php

$host = 'redlock-db-1';
$user = 'user';
$pass = 'password';
$db = 'redlock';
$port = 3400;

$conn = new mysqli($host, $user, $pass, $db, $port);
if ($conn->connect_error) {
    echo "failed";
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected to MySQL server successfully!";
}


$tableName="users";
$columns= ['id', 'name','address','position'];
$msg="";

$columnName = implode(", ", $columns);
$query = "SELECT ".$columnName." FROM $tableName";
$result = $db->query($query);
if($result== true){ 
    if ($result->num_rows > 0) {
        $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
        $msg= $row;
    } else {
        $msg= "No Data Found"; 
    }
}else{
    $msg= mysqli_error($db);
}
echo $msg;
?>