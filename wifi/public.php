<?php include "../core/db.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marker WiFi Public</title>
    <!-- Bagian css -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/ilmudetil.css">
    <?php

     ?>
    <!-- Bagian js -->
    <script src='assets/js/jquery-1.10.1.min.js'></script>

    <script src="assets/js/bootstrap.min.js"></script>
    <!-- akhir dari Bagian js -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBC0FFMXdJC_7kB3SH9pruDlpMSe529PFo&callback=initMap"></script>

    <script>

    var marker;
      function initialize() {

        // Variabel untuk menyimpan informasi (desc)
        var infoWindow = new google.maps.InfoWindow;

        //  Variabel untuk menyimpan peta Roadmap
        var mapOptions = {
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }

        // Pembuatan petanya
        var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

        // Variabel untuk menyimpan batas kordinat
        var bounds = new google.maps.LatLngBounds();

        // Pengambilan data dari database
        <?php
            $query = mysqli_query($link,"SELECT * FROM wifi_public");
            while ($data = mysqli_fetch_array($query))
            {
                $nama = $data['nama'];
                $lat = $data['lat'];
                $lon = $data['long'];

                echo ("addMarker($lat, $lon, '<b>$nama</b>');\n");
            }
          ?>

        // Proses membuat marker
        function addMarker(lat, long, info) {
            var lokasi = new google.maps.LatLng(lat, long);
            bounds.extend(lokasi);
            var marker = new google.maps.Marker({
                map: map,
                position: lokasi
            });
            map.fitBounds(bounds);
            bindInfoWindow(marker, map, infoWindow, info);
         }

        // Menampilkan informasi pada masing-masing marker yang diklik
        function bindInfoWindow(marker, map, infoWindow, html) {
          google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(map, marker);
          });
        }

        }
      google.maps.event.addDomListener(window, 'load', initialize);

    </script>

</head>
<body onload="initialize()">
<!--- Bagian Judul-->
<div class="container" style="margin-top:10px">

    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Marker Google Maps</div>
                    <div class="panel-body">
                        <div id="map-canvas" style="width: 700px; height: 600px;"></div>
                    </div>
            </div>
        </div>
    </div>
    <form action="php_action/search.php" method="post">
		<table cellspacing="0" cellpadding="0">
			<tr>
				<th>Search</th>
				<td><input type="text" name="search" placeholder="Search" /></td>
			</tr>
			<tr>
				<td><button type="submit">Search</button></td>
				<td><a href="index.php"><button type="button">Back</button></a></td>
			</tr>
		</table>
	</form>
</div>
</body>
</html>
