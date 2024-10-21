<?php
include 'connect.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['signUp'])) {
    $firstName = $_POST['fName'];
    $lastName = $_POST['lName'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $telephone = $_POST['telephone'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $gender = $_POST['gender'];

    $checkEmail = "SELECT * FROM patient WHERE email='$email'";
    $result = $conn->query($checkEmail);

    if ($result->num_rows > 0) {
        echo "Email Already Exists !";
    } else {
        $insertQuery = "INSERT INTO patient (firstName, lastName, email,username,password, telephone, weight, height, gender)
                        VALUES ('$firstName', '$lastName', '$email','$username','$password', '$telephone', '$weight', '$height', '$gender')";

        if ($conn->query($insertQuery) === TRUE) {
            echo " register successsfully  ";
            header("Location:loginin.php"); 
            exit(); 
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
