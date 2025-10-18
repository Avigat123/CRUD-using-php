<?php
$server = "localhost";
$database = "trip";
$password = "";
$username = "root";

$conn = mysqli_connect($server, $username, $password, $database);
if (!$conn) {
    die("connection failed due to " . mysqli_connect_error());
}

$row = [];

if (isset($_POST['fetch'])) {
    $id = $_POST['id'];
    $sql = "SELECT * FROM `trip` WHERE `SNo.` = $id";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];

    $updateSql = "UPDATE `trip` 
        SET `name`='$name', `age`='$age', `gender`='$gender',
            `email`='$email', `phone`='$phone', `other`='$desc' 
        WHERE `SNo.`=$id";

    if (mysqli_query($conn, $updateSql)) {
        echo "Updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Trip Record</title>
</head>
<body>
    <h2>Update Trip Record</h2>
    <form method="post">
        <label>Enter ID to fetch:</label>
        <input type="number" name="id" required>
        <button type="submit" name="fetch">Fetch Record</button>
    </form>

    <hr>

    <?php if (!empty($row)) { ?>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $row['SNo.']; ?>">

            <label>Name:</label>
            <input type="text" name="name" value="<?php echo $row['name']; ?>"><br><br>

            <label>Age:</label>
            <input type="text" name="age" value="<?php echo $row['age']; ?>"><br><br>

            <label>Gender:</label>
            <input type="text" name="gender" value="<?php echo $row['gender']; ?>"><br><br>

            <label>Email:</label>
            <input type="email" name="email" value="<?php echo $row['email']; ?>"><br><br>

            <label>Phone:</label>
            <input type="text" name="phone" value="<?php echo $row['phone']; ?>"><br><br>

            <label>Other Info:</label>
            <textarea name="desc"><?php echo $row['other']; ?></textarea><br><br>

            <button type="submit" name="update">Update</button>
        </form>
    <?php } ?>
</body>
</html>
