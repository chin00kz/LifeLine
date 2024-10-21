<?php
session_start(); 

include '../connect.php';

if(isset($_POST['submit'])) {
   
    $doctor = $_POST['doctor']; 
    $patientName = $_POST['patientName']; 
    $description = $_POST['reason']; 
    $date_time = $_POST['dateTime']; 
    $telephone = $_POST['telephone'];

    
    $sql = "INSERT INTO appointments (doctor,patient_Name, description, date_time, telephone) VALUES ('$doctor','$patientName', '$description', '$date_time', '$telephone')";

    
    if ($conn->query($sql) === TRUE) {
        echo "<p>New record created successfully</p>";
    } else {
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
}


?>
