<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User View</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        a.button {
            display: inline-block;
            padding: 6px 12px;
            margin: 4px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        a.delete-button {
            background-color: #f44336;
        }
    </style>
</head>
<body>
<?php
include 'connection.php';
$sql = 'SELECT * FROM user';
$result = $connection->query($sql);
?>

<h2>User List</h2>
<table>
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Actions</th>
    </tr>

<?php
if ($result == false) {
    echo "There is occurring an error: " . $connection->error;
} elseif ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['firstName']}</td>
                <td>{$row['lastname']}</td>
                <td>{$row['email']}</td>
                <td>
                    <a class='button' href='update.php?id={$row['id']}'>Edit</a>
                    <a class='button delete-button' href='delete.php?id={$row['id']}' onclick=\"return confirm('Are you sure you want to delete this user?');\">Delete</a>
                </td>
              </tr>";
    }
}
?>
</table>
<br>
<a href="home.html" class="button">Return to Home</a>
</body>
</html>
