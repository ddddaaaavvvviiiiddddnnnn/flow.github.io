<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ken_stock";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS allstocks (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    quantity VARCHAR(50) NOT NULL,
    brand VARCHAR(15) NOT NULL,
    price VARCHAR(10) NOT NULL
)";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission for adding new user
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'add') {
    $name = $_POST['uname'];
    $quantity = $_POST['qnt'];
    $brand = $_POST['brand'];
    $price = $_POST['price'];
    $sql = "INSERT INTO allstocks (username, quantity, brand, price) VALUES ('$name', '$quantity', '$brand', '$price')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Handle form submission for updating user
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'update') {
    $id = $_POST['id'];
    $name = $_POST['uname'];
    $quantity = $_POST['qnt'];
    $brand = $_POST['brand'];
    $price = $_POST['price'];
    $sql = "UPDATE allstocks SET username='$name', quantity='$quantity', brand='$brand', price='$price' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Handle deletion of user
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'delete') {
    $id = $_POST['id'];
    $sql = "DELETE FROM allstocks WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Fetch all users
$result = $conn->query("SELECT * FROM allstocks");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage stocks</title>
</head>
<body>
    <h2>New Users</h2>
    <form method="POST" action="">
        <input type="hidden" name="action" value="add">
        <label>UserName:</label>
        <input type="text" name="uname"><br><br>
        <label>Quantity:</label>
        <input type="text" name="qnt"><br><br>
        <label>Brand:</label>
        <input type="text" name="brand"><br><br>
        <label>Price:</label>
        <input type="text" name="price"><br><br>
        <input type="submit" value="Add User">
    </form>

    <h2>Users</h2>
    <table border="1">
        <tr>
            <th>UserName</th>
            <th>Quantity</th>
            <th>Brand</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['quantity']; ?></td>
            <td><?php echo $row['brand']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td>
                <form method="POST" action="" style="display:inline;">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <input type="submit" value="Delete">
                </form>
                <form method="POST" action="" style="display:inline;">
                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <input type="text" name="uname" value="<?php echo $row['username']; ?>"><br>
                    <input type="text" name="qnt" value="<?php echo $row['quantity']; ?>"><br>
                    <input type="text" name="brand" value="<?php echo $row['brand']; ?>"><br>
                    <input type="text" name="price" value="<?php echo $row['price']; ?>"><br>
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

