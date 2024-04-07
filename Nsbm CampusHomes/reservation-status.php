<?php
session_start();
include("config.php");

if(isset($_SESSION['uemail'])) {
   
    if(isset($_GET['pid'])) {
       
        $propertyId = mysqli_real_escape_string($con, $_GET['pid']);
        $studentEmail = mysqli_real_escape_string($con, $_SESSION['uemail']);
        
        
        $query = "SELECT status FROM reservation_requests WHERE property_id = '$propertyId' AND student_email = '$studentEmail'";
        $result = mysqli_query($con, $query);
        
       
        if($result) {
            
            if(mysqli_num_rows($result) > 0) {
                //  fetch the status
                $row = mysqli_fetch_assoc($result);
                $status = $row['status'];
                
                
                echo $status;
            } else {
                
                echo "No reservation request";
            }
        } else {
            
            echo "Failed to fetch reservation status.";
        }
    } else {
        
        echo "Property ID not provided.";
    }
} else {
    
    echo "Error: User not logged in.";
}
?>
