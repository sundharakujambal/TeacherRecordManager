// update_teacher.php
<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];

    $sql = "SELECT * FROM teachers WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $teacher = $result->fetch_assoc();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];

    $sql = "UPDATE teachers SET name='$name', email='$email', subject='$subject' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Teacher updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Teacher</title>
</head>
<body>
    <h2>Update Teacher</h2>
    <form method="post" action="update_teacher.php">
        <input type="hidden" name="id" value="<?php echo $teacher['id']; ?>">
        Name: <input type="text" name="name" value="<?php echo $teacher['name']; ?>" required><br>
        Email: <input type="email" name="email" value="<?php echo $teacher['email']; ?>" required><br>
        Subject: <input type="text" name="subject" value="<?php echo $teacher['subject']; ?>" required><br>
        <input type="submit" value="Update Teacher">
    </form>
</body>
</html>
