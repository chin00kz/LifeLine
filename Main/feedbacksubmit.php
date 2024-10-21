<?php 
include("../connect.php");

if(isset($_POST['submit'])) {
    $Name = $_POST['Name']; 
    $email = $_POST['email']; 
    $feedback_des = $_POST['feedback_des']; 

    
    $sql = "INSERT INTO feedback (Name, email, feedback_des) VALUES ('$Name', '$email', '$feedback_des')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>New record created successfully</p>";
    } else {
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
} else {
    echo "<p>Form not submitted!</p>";
}
?>
