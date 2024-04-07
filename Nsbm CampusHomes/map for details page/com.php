<?php
$id = $_GET['pid'];

echo "<script>console.log('Property ID: $id');</script>";

?>
<div id="com-content">


    <style>
        /* Add a unique ID or class to all CSS rules to prevent clashes */
        #com-content .com-container {
            /* Your CSS rules specific to com.php */
        }
        /* Add more CSS rules specific to com.php as needed */
    </style>

    <!-- Your provided HTML content -->
    <html>
      <head>
        <title>Locator</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <style>
          html,
          body {
            height: 100%;
            margin: 0;
          }

          gmpx-store-locator {
            display: block;
            width: 500px;
            height: 500px;
            --gmpx-color-surface: #fff;
            --gmpx-color-on-surface: #212121;
            --gmpx-color-on-surface-variant: #757575;
            --gmpx-color-primary: #1967d2;
            --gmpx-color-outline: #e0e0e0;
            --gmpx-fixed-panel-width-row-layout: 28.5em;
            --gmpx-fixed-panel-height-column-layout: 65%;
            --gmpx-font-family-base: "Roboto", sans-serif;
            --gmpx-font-family-headings: "Roboto", sans-serif;
            --gmpx-font-size-base: 1.875rem;
            --gmpx-hours-color-open: #188038;
            --gmpx-hours-color-closed: #d50000;
            --gmpx-rating-color: #ffb300;
            --gmpx-rating-color-empty: #e0e0e0;
          }
        </style>
        
        <script>
          const fetchLocations = async () => {
            try {
              // Fetch location data from the database using PHP
              const response = await fetch('map for details page/get_location_data.php');
              const data = await response.json();
              
              return data.locations; // Assuming your PHP script returns an array of locations
            } catch (error) {
              console.error('Error fetching locations:', error);
              return [];
            }
          };

          document.addEventListener('DOMContentLoaded', async () => {
            const locations = await fetchLocations();

            const configuration = {
              locations: locations,
              mapOptions: {
                center: { lat: 38.0, lng: -100.0 }, // Default center
                fullscreenControl: true,
                mapTypeControl: false,
                streetViewControl: true,
                zoom: 14,
                zoomControl: true,
                maxZoom: 17,
                mapId: ""
              },
              mapsApiKey: "YOUR_API_KEY_HERE",
              capabilities: {
                input: true,
                autocomplete: true,
                directions: true,
                distanceMatrix: true,
                details: true,
                actions: false
              }
            };

            await customElements.whenDefined('gmpx-store-locator');
            const locator = document.querySelector('gmpx-store-locator');
            locator.configureFromQuickBuilder(configuration);
          });
        </script>
      </head>
      <body>
        <!-- Please note unpkg.com is unaffiliated with Google Maps Platform. -->
        <script type="module" src="https://unpkg.com/@googlemaps/extended-component-library@0.6"></script>
        <gmpx-api-loader key="AIzaSyD8R5Zu_Z9S9xv4LL3RqQdrM_2DCbY2WS4" solution-channel="GMP_QB_locatorplus_v10_cABCDE"></gmpx-api-loader>
        <gmpx-store-locator map-id="DEMO_MAP_ID"></gmpx-store-locator>
      </body>
    </html>
</div>