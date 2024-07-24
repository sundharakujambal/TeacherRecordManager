// delete_teacher.php
<?php
include 'db_connect.php';

$id = $_GET['id'];

$sql = "DELETE FROM teachers WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Teacher deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
