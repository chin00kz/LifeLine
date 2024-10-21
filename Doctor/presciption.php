<?php
include '../connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $patient_name = $_POST['patient_name'];
    $description = $_POST['description'];

    
    $sql = "INSERT INTO prescriptions (patient_Name, description) VALUES (?, ?)";
    
    
    $stmt = $conn->prepare($sql);
    
    
    $stmt->bind_param("ss", $patient_name, $description);
    
   
    if ($stmt->execute()) {
        echo "Prescription added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
  
    $stmt->close();
    mysqli_close($conn);
}
?>
