<?php
    include 'connect.php';

    $id = $_POST['id'];

    $sql = "DELETE FROM data_artikel WHERE id = $id";

    $query = mysqli_query($connect, $sql); 

    if ($query) {
        header('location:index.php');
    } else {
        echo "error";
    }
?>
