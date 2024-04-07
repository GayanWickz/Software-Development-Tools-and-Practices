<?php
// Include your config.php and any other necessary files
//include("config.php");

// Establish a database connection
$con = mysqli_connect("localhost", "root", "pass123", "nsbm_campushomes");

// Check the connection
if (mysqli_connect_errno()) {
    echo json_encode(["error" => "Failed to connect to MySQL: " . mysqli_connect_error()]);
    exit();
}

// Fetch locations from the database
$query = "SELECT * FROM property"; 
$result = mysqli_query($con, $query);

// Initialize an array to store the locations
$locations = [];

// Loop through the query result and format the data
while ($row = mysqli_fetch_assoc($result)) {
    // Convert latitude and longitude to float values
    $latitude = floatval($row['latitude']);
    $longitude = floatval($row['longitude']);

    $location = [
        "title" => $row['title'],
        "coords" => ["lat" => $latitude, "lng" => $longitude],
      //  "placeId" => $row['id'],
     //   "description" => $row['description'],
     "photoUrl" => "admin/property/" . $row['pimage']
    ];
    // Push the formatted location data into the locations array
    $locations[] = $location;
}

// Encode the locations array as JSON and return it
header('Content-Type: application/json');
echo json_encode(["locations" => $locations]);

// Close the database connection
mysqli_close($con);
?>
