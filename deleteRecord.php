<?php

require_once 'login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

if(isset($_POST['delete'])){
    $isbn = $_POST['isbn'];

    $query = "DELETE FROM classics WHERE isbn='$isbn' ";
    
    $result = $conn->query($query);
    if(!$result) die($conn->error);
    
    header("Location: viewRecord.php");
}


?>