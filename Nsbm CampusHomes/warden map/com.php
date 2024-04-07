<!DOCTYPE html>
<html>
<head>
    <title>suresh</title>
    <style>
        #map {
            height: 400px;
            width: 70%;
            float: left;
        }
        .location-list {
            height: 400px;
            width: 30%;
            overflow-y: scroll;
            padding: 10px;
        }
        .location {
            margin-bottom: 10px;
            cursor: pointer;
        }
        .location:hover {
            background-color: #f0f0f0;
        }

    </style>
       <style>
    .info-window-image {
        width: 200px;
        height: auto;
     
    }
    </style>
</head>
<body>
    
    <div id="map"></div>

    <div class="location-list">
        <h2>List of Properties</h2>
        <div id="location-list-container"></div>
    </div>

    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 10,
                center: { lat: 6.8213, lng: 80.0416 } 
            });

            <?php
            $servername = "localhost";
            $username = "root";
            $password = "pass123";
            $dbname = "nsbm_campushomes";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM property";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "var location = { lat: " . $row["latitude"] . ", lng: " . $row["longitude"] . ", title: '" . $row["title"] . "', price: '" . $row["price"] . "', city: '" . $row["city"] . "', image: 'admin/property/" . $row["pimage"] . "', imageWidth: 200, imageHeight: 150 };\n";

                    echo "addLocation(location, map);\n";
                }
            } else {
                echo "console.log('0 results from database');";
            }
            $conn->close();
            ?>

            function addLocation(location, map) {
                var marker = new google.maps.Marker({
                    position: location,
                    map: map,
                    title: location.title
                });

                var infowindow = new google.maps.InfoWindow({
                    content: '<div><p>' + location.title + '</p><div class="info-window-image"><div class=\"info-window-image\"><img src="' + location.image + '" alt="Property Image" width="100px"></div><p>Rs.' + location.price + '</p><p>' + location.city + '</p></div>'
                });

                marker.addListener('click', function() {
                    infowindow.open(map, marker);
                });

                // Add location to the list
                var locationListContainer = document.getElementById('location-list-container');
                var locationElement = document.createElement('div');
                locationElement.classList.add('location');
                locationElement.textContent = location.title;
                locationElement.addEventListener('click', function() {
                    map.setCenter(location);
                    map.setZoom(14);
                    infowindow.open(map, marker);
                });
                locationListContainer.appendChild(locationElement);
            }
        }
    </script>

    <!-- Load the Google Maps API -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8R5Zu_Z9S9xv4LL3RqQdrM_2DCbY2WS4&callback=initMap"  async defer></script>
</body>
</html>
