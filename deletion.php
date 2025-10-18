<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "trip";
$conn = mysqli_connect($server, $username, $password, $database);
if(!$conn){
    die("Connection failed due to". mysqli_connect_error());
}
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $deleteSql = "DELETE FROM `trip` WHERE `SNo.` = $id";
    mysqli_query($conn, $deleteSql);
}
$sql = "SELECT * FROM `trip`";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Trip Records</title>
    <style>
        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #aaa;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #eee;
        }
        a.button {
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        a.delete {
            background-color: #f44336;
        }
    </style>
</head>
<body>
    <h2 style="text-align:center;">All Trip Registrations</h2>
    <table>
        <tr>
            <th>SNo.</th>
            <th>Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Other Info</th>
            <th>Date & Time</th>
            <th>Actions</th>
        </tr>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['SNo.']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['age']}</td>
                        <td>{$row['gender']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['phone']}</td>
                        <td>{$row['other']}</td>
                        <td>{$row['dt']}</td>
                        <td>
                            <a class='button' href='update.php?id={$row['SNo.']}'>Edit</a>
                            <a class='button delete' href='display.php?delete={$row['SNo.']}' onclick=\"return confirm('Are you sure you want to delete this record?');\">Delete</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='9'>No records found</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php mysqli_close($conn); ?>