<?php
session_start();
include("config.php");

if(isset($_SESSION['uemail'])) {
    if(isset($_GET['id'])) {
        $id = mysqli_real_escape_string($con, $_GET['id']);
        
       
        $Query = "UPDATE reservation_requests SET status = 'rejected' WHERE id = '$id'";
        if(mysqli_query($con, $Query)) {
            header("Location: user-listed-property.php?msg=Reservation request accepted successfully.");
            header("Location: reservation_accept_reject.php");
            exit();
        } else {
            echo "Error updating status: " . mysqli_error($con);
        }
    } else {
        echo "Error: ID not provided.";
    }
} else {
    echo "Error: User not logged in.";
}
?>
