<?php
session_start();
include("config.php");

if(isset($_SESSION['uemail'])) {
   
    if(isset($_GET['pid'])) {
      
        $propertyId = mysqli_real_escape_string($con, $_GET['pid']);
        
        // Retrieve the student's email 
        $studentEmail = $_SESSION['uemail'];
        
        // Check student already made a reservation request for this property
        $Query = "SELECT * FROM reservation_requests WHERE property_id = '$propertyId' AND student_email = '$studentEmail'";
        $checkResult = mysqli_query($con, $Query);
        
        if(mysqli_num_rows($checkResult) > 0) {
            // Reservation request already exists for this property and student
            echo "Error: You have already made a reservation request for this property.";
        } else {
            // Insert the reservation request into the database
            $insertQuery = "INSERT INTO reservation_requests (property_id, student_email) VALUES ('$propertyId', '$studentEmail')";
            if(mysqli_query($con, $insertQuery)) {
                // Reservation  successful
                echo "Reservation request submitted successfully!";
            } else {
                // Reservation failed
                echo "Error: " . mysqli_error($con);
            }
        }
    } else {
      
        echo "Error: Property ID not provided.";
    }
} else {
   
    echo "Error: User not logged in.";
}
?>
