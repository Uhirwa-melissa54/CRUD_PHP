<?php
include 'connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM user WHERE id=$id";
    $result = $connection->query($sql);

    if ($result === TRUE) {
        header("Location: view.php");
    } else {
        echo "Error deleting record: " . $connection->error;
    }
} else {
    echo "Invalid request.";
}

$connection->close();
?>