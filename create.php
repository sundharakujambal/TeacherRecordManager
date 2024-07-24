// create_teacher.php
<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];

    $sql = "INSERT INTO teachers (name, email, subject) VALUES ('$name', '$email', '$subject')";

    if ($conn->query($sql) === TRUE) {
        echo "New teacher added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Teacher</title>
</head>
<body>
    <h2>Add Teacher</h2>
    <form method="post" action="create_teacher.php">
        Name: <input type="text" name="name" required><br>
        Email: <input type="email" name="email" required><br>
        Subject: <input type="text" name="subject" required><br>
        <input type="submit" value="Add Teacher">
    </form>
</body>
</html>
