<?php
include "connection.php";

// Handle insert
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $insert = mysqli_query($conn, "INSERT INTO `author` (name, email) VALUES ('$name', '$email')");
    if ($insert) {
        echo "<p>Data has been inserted into the database.</p>";
    } else {
        echo "<p>Data has not been connected to the database, try again.</p>";
    }
}

// Handle update
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $update = mysqli_query($conn, "UPDATE `author` SET name='$name', email='$email' WHERE authorid='$id'");
    if ($update) {
        echo "<p>Data has been updated successfully.</p>";
    } else {
        echo "<p>Update failed, try again.</p>";
    }
}

// Handle delete
if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    $delete = mysqli_query($conn, "DELETE FROM `author` WHERE authorid='$id'");
    if ($delete) {
        echo "<p>Data has been deleted successfully.</p>";
    } else {
        echo "<p>Deletion failed, try again.</p>";
    }
}

// Fetch all authors
$select = mysqli_query($conn, "SELECT * FROM `author`");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Author Management</title>
</head>
<body>
    <h1>Add New Author</h1>
    <form method="POST">
        <label>Username</label>
        <input type="text" name="name" required><br><br>
        <label>Email</label>
        <input type="email" name="email" required><br><br>
        <input type="submit" name="submit" value="Insert">
    </form>

    <h2>Authors List</h2>
    <table border="2" align="center">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        <?php 
        while ($row = mysqli_fetch_assoc($select)) {
        ?>
        <tr>
            <td><?php echo htmlspecialchars($row['authorid']); ?></td>
            <td><?php echo htmlspecialchars($row['name']); ?></td>
            <td><?php echo htmlspecialchars($row['email']); ?></td>
            <td>
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="id" value="<?php echo $row['authorid']; ?>">
                    <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
                    <input type="hidden" name="email" value="<?php echo $row['email']; ?>">
                    <input type="submit" name="edit" value="Edit">
                </form>
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="id" value="<?php echo $row['authorid']; ?>">
                    <input type="submit" name="delete" value="Delete" onclick="return confirm('Are you sure you want to delete this author?');">
                </form>
            </td>
        </tr>
        <?php 
        }
        ?>
    </table>

    <?php
    // Show the update form if an edit is triggered
    if (isset($_POST['edit'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
    ?>
    <h2>Update Author</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label>Username</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>" required><br><br>
        <label>Email</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required><br><br>
        <input type="submit" name="update" value="Update">
    </form>
    <?php
    }
    ?>

</body>
</html>
