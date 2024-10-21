<?php

include '../connect.php';

if(isset($_POST['delete_prescription']) && isset($_POST['prescription_id'])) {
    $prescription_id = $_POST['prescription_id'];

   
    $sql = "DELETE FROM prescriptions WHERE ID = '$prescription_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Prescription deleted successfully";
        
        exit();
    } else {
        echo "Error deleting prescription: " . $conn->error;
    }
}
?>
