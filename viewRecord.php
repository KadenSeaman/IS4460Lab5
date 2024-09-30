<?php

require_once 'login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

$query = "SELECT * FROM classics";

$result = $conn->query($query);
if(!$result) die($conn->error);

if($result->num_rows > 0){
    while($row = $result->fetch_array(MYSQLI_ASSOC)){
echo <<< _END
        <pre>
            Author: $row[author]
            Title: $row[title]
            Category: $row[category]
            Year: $row[year]
            ISBN: $row[isbn]
        </pre>
_END;
    }
}
else{
    echo "No data found <br>";
}
$result->close();
$conn->close();

?>