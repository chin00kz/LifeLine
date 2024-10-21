<?php

include("../connect.php");

if(isset($_POST['submit'])) {
    
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $gender = $_POST['gender'];

    
    $conn = mysqli_connect("localhost", "your_username", "your_password", "medical");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $fName = mysqli_real_escape_string($conn, $fName);
    $lName = mysqli_real_escape_string($conn, $lName);
    $username = mysqli_real_escape_string($conn, $username);
   

    $sql = "INSERT INTO doctor (firstName, lastName, username, password, age, email,telephone, gender)
            VALUES ('$fName', '$lName', '$username', '$password', '$age', '$email','$telephone', '$gender')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
