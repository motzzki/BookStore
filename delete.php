<?php
include_once("database.php");
if(isset($_GET['bookId'])) {
    $id = $_GET['bookId'];

    $query = "DELETE FROM tblbooks WHERE bookId = $id";
    $delete_result = mysqli_query($mysqli, $query);

    if($delete_result) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($mysqli);
    }
} else {
    header("Location: index.php");
    exit();
}
?>
