<?php 
$input = false;
$server = "localhost";
$password = "";
$username = "root";
$database = "trip";
$con = mysqli_connect($server, $username , $password, $database);
if(!$con){
    die("an error has occurred, couldnt connect to database". mysqli_connect_error());
}
$sql = "SELECT * FROM `trip`";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
*{
    margin:0px;
    padding:0px;
}
 table {
      border-collapse: collapse;
      width: 80%;
      margin: 40px auto;
    }
    th, td {
      padding: 10px;
      border: 1px solid #ddd;
      text-align: center;
    }
    th {
      background-color: #f4f4f4;
    }
    h1 {
      text-align: center;
      margin-top: 20px;
    }

</style>
</head>
<body>
    <h1>Trip Display</h1>
  <div class="container">
    <table>
        <tr>
      <th>S.No</th>
      <th>Name</th>
      <th>Age</th>
      <th>Gender</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Other Info</th>
      <th>Date & Time</th>
        </tr>
        <?php
    if (mysqli_num_rows($result) > 0){

        while($rows = mysqli_fetch_assoc($result)){
            echo "<tr>
            <td>{$rows['SNo.']}</td>
                    <td>{$rows['name']}</td>
                    <td>{$rows['age']}</td>
                    <td>{$rows['gender']}</td>
                    <td>{$rows['email']}</td>
                    <td>{$rows['phone']}</td>
                    <td>{$rows['other']}</td>
                    <td>{$rows['dt']}</td>
            </tr>";
        }
    }
    else{
        echo "<tr><td colspan = '8'>data not found</td></tr>";
    }
        ?>      
    </table>
  </div>    
    
</body>
</html>
<?php
$con->close();
?>

