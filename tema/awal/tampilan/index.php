<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ISP</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-item.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
                    <a href="isp.php" class="list-group-item active">ISP</a>
                    <a href="wifi.php" class="list-group-item">Wi-Fi</a>
                </div>
            </div>

            <div class="col-md-9">

                <div class="thumbnail">
                    <form name="cari" method="post" action="cari.php">
        <td><input id="searchInput" class="controls" type="text" placeholder="Enter a location"></td>
    </form>
    <br> 
    <div id="map" style="margin-top:-20px; width: 845px; height: 350px"></div>
    <script type="text/javascript">  // This example adds a search box to a map, using the Google Place Autocomplete
      // feature. People can enter geographical searches. The search box will return a
      // pick list containing a mix of places and predicted search terms.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
      var citymap = {
        ipb: {
          center: {lat: -6.558118, lng: 106.726204},
          population: 2000
        },
        botani_square: {
          center: {lat: -6.601024, lng: 106.806876},
          population: 3000
        }
      };

      var citymap2 = {
        kfc_bogor: {
          center: {lat: -6.621576, lng: 106.817384},
          population: 3400
        },
        yogya_bogor: {
          center: {lat: -6.603593, lng: 106.799379},
          population: 2000
        }
      };

      function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 37.090240, lng: -95.712891},
          zoom: 13,
          mapTypeId: 'roadmap'
        });
        // Construct the circle for each value in citymap.
        // Note: We scale the area of the circle based on the population.
        for (var city in citymap) {
          // Add the circle for this city to the map.
          var cityCircle = new google.maps.Circle({
            strokeColor: '#FF0000',
            strokeOpacity: 0.8,
            strokeWeight: 0.5,
            fillColor: '#FF0000',
            fillOpacity: 0.5,
            map: map,
            center: citymap[city].center,
            radius: Math.sqrt(citymap[city].population) * 100
          });
        }

        for (var city in citymap2) {
          // Add the circle for this city to the map.
          var cityCircle = new google.maps.Circle({
            strokeColor: '#0000FF',
            strokeOpacity: 0.8,
            strokeWeight: 0.5,
            fillColor: '#0000FF',
            fillOpacity: 0.5,
            map: map,
            center: citymap2[city].center,
            radius: Math.sqrt(citymap2[city].population) * 100
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
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBC0FFMXdJC_7kB3SH9pruDlpMSe529PFo&libraries=places&callback=initAutocomplete" async defer></script>

                <div class="well">
                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                             <p><font size="6">Telkomsel</font></p>
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
                        <a href="../../telkomsel/index.php" class="btn btn-success">Leave a Review</a>
                    </div>
                <div class="row">
                        <div class="col-md-12">
                             <p><font size="6">Indosat</font></p>
<?php
include_once '../../Indosat/dbConfig.php';
//Fetch rating deatails from database
$query = "SELECT rating_number, FORMAT((total_points / rating_number),1) as average_rating FROM post_rating WHERE post_id = 2 AND status = 1";
$result = $db->query($query);
$ratingRow = $result->fetch_assoc();
?>
<link href="../../indosat/rating.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="../../indosat/rating.js"></script>
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
        url: '../../indosat/rating.php',
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
                        <a href="../../indosat/index.php" class="btn btn-success">Leave a Review</a>
                    </div>

                    <hr>
                <div class="row">
                        <div class="col-md-12">
                             <p><font size="6">XL</font></p>
<?php
include_once '../../Indosat/dbConfig.php';
//Fetch rating deatails from database
$query = "SELECT rating_number, FORMAT((total_points / rating_number),1) as average_rating FROM post_rating WHERE post_id = 3 AND status = 1";
$result = $db->query($query);
$ratingRow = $result->fetch_assoc();
?>
<link href="../../XL/rating.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="../../XL/rating.js"></script>
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
        url: '../../indosat/rating.php',
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
                        <a href="../../XL/index.php" class="btn btn-success">Leave a Review</a>
                    </div>
                </div>

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
