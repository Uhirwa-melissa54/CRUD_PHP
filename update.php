<?php
include 'connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM user WHERE id=$id";
    $result = $connection->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        echo "User not found.";
        exit;
    }
} else {
    echo "Invalid request.";
    exit;
}

if (isset($_POST['update'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];

    $sql = "UPDATE user SET firstName='$firstName', lastname='$lastName', email='$email' WHERE id=$id";
    $result = $connection->query($sql);

    if ($result === TRUE) {
        header("Location: view.php");
    } else {
        echo "Error updating record: " . $connection->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <style>
        form {
            max-width: 400px;
            margin: 40px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"], a.button {
            padding: 8px 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            margin-right: 10px;
        }
        a.button {
            background-color: #555;
        }
    </style>
</head>
<body>
    <form method="post">
        <h2>Edit User</h2>
        <label>First Name:</label>
        <input type="text" name="firstName" value="<?php echo $row['firstName']; ?>" required>

        <label>Last Name:</label>
        <input type="text" name="lastName" value="<?php echo $row['lastname']; ?>" required>

        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $row['email']; ?>" required>

        <input type="submit" name="update" value="Update">
        <a href="view.php" class="button">Cancel</a>
    </form>
</body>
</html>
