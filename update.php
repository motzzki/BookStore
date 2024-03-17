<?php
include_once("database.php");

if(isset($_POST['update-submit'])){
    // Retrieve the bookId from the form
    $id = $_POST['bookId'];
    
    // Retrieve other fields from the form
    $title = $_POST["update-title"];
    $category = $_POST["update-category"];
    $author = $_POST["update-author"];
    $publisher = $_POST["update-publisher"];

   
    $update_result = mysqli_query($mysqli, "UPDATE tblbooks SET bookTitle ='$title', bookCategory='$category', author='$author', publisher = '$publisher' WHERE bookId = $id");

    if($update_result){
        
        header("Location: index.php");
        exit(); 
    } else {
       
        echo "Error updating record: " . mysqli_error($mysqli);
    }
}
?>
