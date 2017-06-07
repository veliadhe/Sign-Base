<!DOCTYPE HTML>
<html>
<head>
<title>Tambahkan ISP | SignBase Administrator</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Easy Admin Panel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet">
<!-- jQuery -->
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
<!-- chart -->
<script src="js/Chart.js"></script>
<!-- //chart -->
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!----webfonts--->
<link href='//fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
<!---//webfonts--->
 <!-- Meters graphs -->
<script src="js/jquery-1.10.2.min.js"></script>
<!-- Placed js at the end of the document so the pages load faster -->

</head>

 <body class="sticky-header left-side-collapsed"  onload="initMap()">
    <section>
    <!-- left side start-->
		<div class="left-side sticky-left-side">

			<!--logo and iconic logo start-->
			<div class="logo">
				<h1><a href="index.php">Sign <span>Base</span></a></h1>
			</div>
			<div class="logo-icon text-center">
				<a href="index.php"><i class="lnr lnr-home"></i> </a>
			</div>

			<!--logo and iconic logo end-->
			<div class="left-side-inner">

				<!--sidebar nav start-->
					<ul class="nav nav-pills nav-stacked custom-nav">
						<li class="active"><a href="index.php"><i class="lnr lnr-power-switch"></i><span>Dashboard</span></a></li>
						<li class="menu-list"><a href="#"><i class="lnr lnr-book"></i> <span>Datas</span></a>
							<ul class="sub-menu-list">
								<li><a href="data-user.html">Data User</a> </li>
								<li><a href="data-wifi.html">Data Wifi</a> </li>
								<li><a href="data-isp.html">Data ISP</a></li>
							</ul>
						</li>
					</ul>
				<!--sidebar nav end-->
			</div>
		</div>
		<!-- left side end-->

		<!-- main content start-->
		<div class="main-content">
			<!-- header-starts -->
			<div class="header-section">

			<!--toggle button start-->
			<a class="toggle-btn  menu-collapsed"><i class="fa fa-bars"></i></a>
			<!--toggle button end-->

			<!--notification menu start -->
			<div class="menu-right">
				<div class="user-panel-top">
					<div class="profile_details">
						<ul>
							<li class="dropdown profile_details_drop">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									<div class="profile_img">
										<span style="background:url(images/1.jpg) no-repeat center"> </span>
										 <div class="user-name">
											<p>Fauki<span>Administrator</span></p>
										 </div>
										 <div class="clearfix"></div>
									</div>
								</a>
								<ul class="dropdown-menu drp-mnu">
									<li> <a href="edit.html"><i class="fa fa-user"></i>Profile</a> </li>
									<li> <a href="sign-in.php"><i class="fa fa-sign-out"></i>Sign Out</a> </li>
								</ul>
							</li>
							<div class="clearfix"> </div>
						</ul>
					</div>

					<div class="clearfix"></div>
				</div>
			  </div>
			 </div> 

	<br/>

	<a href="data-isp.php">Lihat Semua Data</a>

	<br/>
	<h3>Input data baru</h3>
	<form action="input-aksi-isp.php" method="post">		
		<table>
			<tr>
				<td>Nama</td>
				<td><input type="text" name="nama"></td>					
			</tr>	
			<tr>
				<td>Lat</td>
				<td><input type="text" name="lat"></td>					
			</tr>	
			<tr>
				<td>Long</td>
				<td><input type="text" name="long"></td>					
			</tr>	
			<tr>
				<td></td>
				<td><input type="submit" value="Simpan"></td>					
			</tr>				
		</table>
	</form>

			         <!--footer section start-->
			<footer>
			   <p>&copy 2017 SignBase. All Rights Reserved</p>
			</footer>
        <!--footer section end-->
      <!-- main content end-->
   </section>

<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
</body>
</html>