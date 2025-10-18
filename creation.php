<?php
$insert = false;
if (isset($_POST['name'])) { 
  $server = "localhost";
  $username = "root";
  $password = "";

  $con = mysqli_connect($server, $username, $password);  
  if (!$con) {
    die("connection to this database failed due to" . mysqli_connect_error());
  }

  $name = $_POST['name'];
  $gender = $_POST['gender'];
  $age = $_POST['age'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $desc = $_POST['desc'];
  $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
  if ($con->query($sql) == true) {
    $insert = true;
  } else {
    echo "error: $sql <br> $con->error";
  }
  $con->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome to travel form</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <img src="sunset-6516870_1280.jpg">
  <div class="container">
    <h1>Welcome to Trip form</h1>
    <p>Enter your details and submit this form to confirm your participation in the trip </p>
    <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the US trip</p>";
        }
    ?>
    <form action="index.php" method="post">
      <input type="text" name="name" id="name" placeholder="Enter your name">
      <input type="text" name="age" id="age" placeholder="Enter your age">
      <input type="text" name="gender" id="gender" placeholder="Enter your gender">
      <input type="email" name="email" id="email" placeholder="Enter your email">
      <input type="phone" name="phone" id="phone" placeholder="Enter your phone number">
      <textarea name="desc" id="desc" placeholder="Enter any other important information"></textarea>
      <button class="btn">Submit</button>

    </form>
  </div>
  <script src="index.js"></script>
  <!-- INSERT INTO `trip` (`SNo.`, `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('1', 'testname', '23', 'male', 'kdsfj@gmail.com', '9999999999', 'first php ', current_timestamp()); -->
</body>

</html>