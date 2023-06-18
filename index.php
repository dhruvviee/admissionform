<?php         
$insert = false;
if(isset($_POST['name'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $tenthpercentage = $_POST['tenthpercentage'];
    $twelvethpercentage = $_POST['twelvethpercentage'];
    $sql = "INSERT INTO `registration`.`registration` (`name`, `age`, `gender`, `email`, `phone`, `address`,`tenthpercentage`,`twelvethpercentage`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$address','$tenthpercentage','$twelvethpercentage', current_timestamp());";
    if($con->query($sql) == true){
        $insert = true;}
    else{
        echo "ERROR: $sql <br> $con->error";
    }
        $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Application Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="https://images.unsplash.com/photo-1605470207062-b72b5cbe2a87?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8dW5pdmVyc2l0eSUyMG9mJTIwY2FtYnJpZGdlfGVufDB8fDB8fHww&w=1000&q=80" alt="Cambridge University">
    <div class="container">
        <h1>Admission Registration Portal</h3>
        <p>Fill up this Admission form with your details so that you are a registered user and can take part in Admission Process</p>
    <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for your Registration </p>";
        }
    ?>   
    
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name"required>
            <input type="text" name="age" id="age" placeholder="Enter your Age"required>
            <input type="text" name="gender" id="gender" placeholder="Enter your gender"required>
            <input type="email" name="email" id="email" placeholder="Enter your email"required>
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone"required>
            <input type="address" name="address" id="address" placeholder="Enter your address"required>
            <input type="tenthpercentage" name="tenthpercentage" id="tenthpercentage" placeholder="Enter your 10th %"required>
            <input type="twelvethpercentage" name="twelvethpercentage" id="twelvethpercentage" placeholder="Enter your 12th %"required>
            
            <button class="btn">Submit</button> 
        </form>
    </div>
    <script src="index.js"></script>
    
</body>
</html>