<?php 

    $conn = mysqli_connect("localhost", "root", "", "shop2hand");

    if (!$conn) {
        die("Failed to connec to databse " . mysqli_error($conn));
    }

?>