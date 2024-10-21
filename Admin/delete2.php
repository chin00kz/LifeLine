<?php


include("../connect.php");

if (isset($_POST['patient_id'])) {
    $patient_id = $_POST['patient_id'];

    $stmt = $conn->prepare("DELETE FROM Patient WHERE ID = ?");
    $stmt->bind_param("i", $patient_id);

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
