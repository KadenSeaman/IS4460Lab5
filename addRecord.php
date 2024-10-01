<html>
    <head>

    </head>
    <body>
        <form method="POST" action="addRecord.php">
            <pre>
                ISBN: <input type="text" name="isbn">
                Author: <input type="text" name="author">
                Title: <input type="text" name="title">
                Category: <input type="text" name="category">
                Year: <input type="text" name="year">
                <input type="submit" value="Add Record">
            </pre>
        </form>
    </body>
</html>

<?php

require_once 'login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

//check if ISBN exists
if(isset($_POST['isbn'])){
    $isbn = $_POST['isbn'];
    $author = $_POST['author'];
    $title = $_POST['title'];
    $category = $_POST['category'];
    $year = $_POST['year'];


    $query = "INSERT INTO classics(isbn,author,title,category,year)
    VALUES ('$isbn','$author','$title','$category','$year')";

    $result = $conn->query($query);
    if(!$result) die($conn->error);

    header("Location: viewRecord.php");
}
$conn->close();


?>