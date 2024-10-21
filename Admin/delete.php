<?php


include("../connect.php");

if (isset($_POST['doctor_id'])) {
    $doctor_id = $_POST['doctor_id'];

    $stmt = $conn->prepare("DELETE FROM doctor WHERE ID = ?");
    $stmt->bind_param("i", $doctor_id);

    if ($stmt->execute()) {
       
        header("Location: index.php"); 
        exit();
    } else {
        
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request";
}
?>
