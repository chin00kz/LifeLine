<?php
// delete_appointment.php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['appointment_id'])) {
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "medical";

    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error) {
        die("Failed to connect database: " . $conn->connect_error);
    }

    $appointment_id = $_POST['appointment_id'];

    $stmt = $conn->prepare("DELETE FROM appointments WHERE ID = ?");
    $stmt->bind_param("i", $appointment_id);

    if ($stmt->execute()) {
        echo "Appointment deleted successfully.";
    } else {
        echo "Error deleting appointment: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request";
}
?>
