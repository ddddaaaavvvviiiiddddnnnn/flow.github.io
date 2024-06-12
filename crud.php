<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    phone VARCHAR(15) NOT NULL
)";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission for adding new user
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'add') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $sql = "INSERT INTO users (name, email, phone) VALUES ('$name', '$email', '$phone')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Handle form submission for updating user
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'update') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $sql = "UPDATE users SET name='$name', email='$email', phone='$phone' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Handle deletion of user
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'delete') {
    $id = $_POST['id'];
    $sql = "DELETE FROM users WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Fetch all users
$result = $conn->query("SELECT * FROM users");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Manage Users</title>
</head>

<body>

    <h2>Add New User</h2>
    <form method="POST" action="">
        <input type="hidden" name="action" value="add">
        <label>Name:</label><br>
        <input type="text" name="name"><br>
        <label>Email:</label><br>
        <input type="email" name="email"><br>
        <label>Phone:</label><br>
        <input type="text" name="phone"><br><br>
        <input type="submit" value="Add User">
    </form>

    <h2>Users</h2>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td>
                <form method="POST" action="" style="display:inline;">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <input type="submit" value="Delete">
                </form>
                <form method="POST" action="" style="display:inline;">
                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <input type="text" name="name" value="<?php echo $row['name']; ?>">
                    <input type="text" name="email" value="<?php echo $row['email']; ?>">
                    <input type="text" name="phone" value="<?php echo $row['phone']; ?>">
                    <input type="submit" value="Update">
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>

</body>

</html>

<?php
$conn->close();
?>