<?php
include_once("database.php");

if (isset($_POST['submit'])) {
    $title = $_POST["title"];
    $category = $_POST["category"];
    $author = $_POST["author"];
    $publisher = $_POST["publisher"];
   

    $result = mysqli_query($mysqli, "INSERT INTO tblbooks (bookTitle, bookCategory, author, publisher) VALUES ('$title', '$category','$author','$publisher')");
    
    header("Location: index.php");
    exit();

}
?>