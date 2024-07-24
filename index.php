// index.php
<?php
include 'db_connect.php';

$sql = "SELECT id, name, email, subject, created_at FROM teachers";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Teachers List</title>
</head>
<body>
    <h2>Teachers List</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id"]. "</td>
                        <td>" . $row["name"]. "</td>
                        <td>" . $row["email"]. "</td>
                        <td>" . $row["subject"]. "</td>
                        <td>" . $row["created_at"]. "</td>
                        <td><a href='update_teacher.php?id=" . $row["id"]. "'>Edit</a> | <a href='delete_teacher.php?id=" . $row["id"]. "'>Delete</a></td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No teachers found</td></tr>";
        }
        ?>
    </table>
</body>
</html>
