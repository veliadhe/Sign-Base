<?php include "core/db.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Item - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-item.css" rel="stylesheet">
    
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

        var input = document.getElementById('searchInput');
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);

        var infowindow = new google.maps.InfoWindow();
        var marker = new google.maps.Marker({
        map: map,
        anchorPoint: new google.maps.Point(0, -29)
    });

        autocomplete.addListener('place_changed', function() {
            infowindow.close();
            marker.setVisible(false);
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                window.alert("Autocomplete's returned place contains no geometry");
                return;
        }

        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
        }
        marker.setIcon(({
            url: place.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(35, 35)
        }));
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);

        var address = '';
        if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
        }

        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
        infowindow.open(map, marker);

        //Location details
        for (var i = 0; i < place.address_components.length; i++) {
            if(place.address_components[i].types[0] == 'postal_code'){
                document.getElementById('postal_code').innerHTML = place.address_components[i].long_name;
            }
            if(place.address_components[i].types[0] == 'country'){
                document.getElementById('country').innerHTML = place.address_components[i].long_name;
            }
        }
        document.getElementById('location').innerHTML = place.formatted_address;
        document.getElementById('lat').innerHTML = place.geometry.location.lat();
        document.getElementById('lon').innerHTML = place.geometry.location.lng();
    });

        }
      google.maps.event.addDomListener(window, 'load', initialize);

    </script>
</head>

<body>

    <!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.html">Start</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="../index.html#about">About</a>
                    </li>
                    <li>
                        <a href="../index.html#contact">Contact</a>
                    </li>
                    <li>
                        <a href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <p class="lead">SignBase</p>
                <div class="list-group">
                    <a href="index.php" class="list-group-item">ISP</a>
                    <a href="wifi.php" class="list-group-item active">Wi-Fi</a>
                </div>
            </div>

            <div class="col-md-9">

                <div class="thumbnail">
                    <form name="cari" method="post" action="cari.php">
                    <td><input id="searchInput" class="controls" type="text" placeholder="Enter a location"></td>
                    </form>
                    <br>
                    <div id="map-canvas" style="margin-top: -20px; width: 845px; height: 350px;"></div>
                 <div class="well">
                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                             <p><font size="6">Jakarta</font></p>
<?php
include_once '../../Jakarta/dbConfig.php';
//Fetch rating deatails from database
$query = "SELECT rating_number, FORMAT((total_points / rating_number),1) as average_rating FROM post_rating WHERE post_id = 1 AND status = 1";
$result = $db->query($query);
$ratingRow = $result->fetch_assoc();
?>
<link href="../../bogor/rating.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="../../bogor/rating.js"></script>
<script language="javascript" type="text/javascript">
$(function() {
    $("#rating_star").codexworld_rating_widget({
        starLength: '5',
        initialValue: '',
        callbackFunctionName: 'processRating',
        imageDirectory: 'images/',
        inputAttr: 'postID'
    });
});

function processRating(val, attrVal){
    $.ajax({
        type: 'POST',
        url: '../../bogor/rating.php',
        data: 'postID='+attrVal+'&ratingPoints='+val,
        dataType: 'json',
        success : function(data) {
            if (data.status == 'ok') {
                alert('You have rated '+val+' to CodexWorld');
                $('#avgrat').text(data.average_rating);
                $('#totalrat').text(data.rating_number);
            }else{
                alert('Some problem occured, please try again.');
            }
        }
    });
}
</script>
<style type="text/css">
    .overall-rating{font-size: 14px;margin-top: 5px;color: #8e8d8d;}
</style>

    <input name="rating" value="0" id="rating_star" type="hidden" postID="1" />
    <div class="overall-rating">(Average Rating <span id="avgrat"><?php echo $ratingRow['average_rating']; ?></span>
Based on <span id="totalrat"><?php echo $ratingRow['rating_number']; ?></span>  rating)</span></div>
                        </div>
                    </div>
                    <div class="text-right">
                        <a href="../../jakarta/index.php" class="btn btn-success">Leave a Review</a>
                    </div>


                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                             <p><font size="6">Bogor</font></p>
<?php
include_once '../../bogor/dbConfig.php';
//Fetch rating deatails from database
$query = "SELECT rating_number, FORMAT((total_points / rating_number),1) as average_rating FROM post_rating WHERE post_id = 2 AND status = 1";
$result = $db->query($query);
$ratingRow = $result->fetch_assoc();
?>
<link href="../../bogor/rating.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="../../bogor/rating.js"></script>
<script language="javascript" type="text/javascript">
$(function() {
    $("#rating_star").codexworld_rating_widget({
        starLength: '5',
        initialValue: '',
        callbackFunctionName: 'processRating',
        imageDirectory: 'images/',
        inputAttr: 'postID'
    });
});

function processRating(val, attrVal){
    $.ajax({
        type: 'POST',
        url: '../../bogor/rating.php',
        data: 'postID='+attrVal+'&ratingPoints='+val,
        dataType: 'json',
        success : function(data) {
            if (data.status == 'ok') {
                alert('You have rated '+val+' to CodexWorld');
                $('#avgrat').text(data.average_rating);
                $('#totalrat').text(data.rating_number);
            }else{
                alert('Some problem occured, please try again.');
            }
        }
    });
}
</script>
<style type="text/css">
    .overall-rating{font-size: 14px;margin-top: 5px;color: #8e8d8d;}
</style>

    <input name="rating" value="0" id="rating_star" type="hidden" postID="2" />
    <div class="overall-rating">(Average Rating <span id="avgrat"><?php echo $ratingRow['average_rating']; ?></span>
Based on <span id="totalrat"><?php echo $ratingRow['rating_number']; ?></span>  rating)</span></div>
                        </div>
                    </div>
                    <div class="text-right">
                        <a href="../../bogor/index.php" class="btn btn-success">Leave a Review</a>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                             <p><font size="6">Yogya</font></p>
<?php
include_once '../../yogya/dbConfig.php';
//Fetch rating deatails from database
$query = "SELECT rating_number, FORMAT((total_points / rating_number),1) as average_rating FROM post_rating WHERE post_id = 3 AND status = 1";
$result = $db->query($query);
$ratingRow = $result->fetch_assoc();
?>
<link href="../../yogya/rating.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="../../yogya/rating.js"></script>
<script language="javascript" type="text/javascript">
$(function() {
    $("#rating_star").codexworld_rating_widget({
        starLength: '5',
        initialValue: '',
        callbackFunctionName: 'processRating',
        imageDirectory: 'images/',
        inputAttr: 'postID'
    });
});

function processRating(val, attrVal){
    $.ajax({
        type: 'POST',
        url: '../../bogor/rating.php',
        data: 'postID='+attrVal+'&ratingPoints='+val,
        dataType: 'json',
        success : function(data) {
            if (data.status == 'ok') {
                alert('You have rated '+val+' to CodexWorld');
                $('#avgrat').text(data.average_rating);
                $('#totalrat').text(data.rating_number);
            }else{
                alert('Some problem occured, please try again.');
            }
        }
    });
}
</script>
<style type="text/css">
    .overall-rating{font-size: 14px;margin-top: 5px;color: #8e8d8d;}
</style>

    <input name="rating" value="0" id="rating_star" type="hidden" postID="3" />
    <div class="overall-rating">(Average Rating <span id="avgrat"><?php echo $ratingRow['average_rating']; ?></span>
Based on <span id="totalrat"><?php echo $ratingRow['rating_number']; ?></span>  rating)</span></div>
                        </div>
                    </div>
                    <div class="text-right">
                        <a href="../../yogya/index.php" class="btn btn-success">Leave a Review</a>
                    </div>

                    <hr>

            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
