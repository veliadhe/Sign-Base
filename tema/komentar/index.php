<?php

?>
<!doctype html>
<html lang="en">
<head>
<title>Membuat sistem komentar dan like facebook dengan PHP dan Jquery Ajax</title>
<link rel="shortcut icon" href="img/favicon.ico">
<link href="css/style.css" media="screen" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.timeago.js"></script>
<script type="text/javascript" src="js/jquery.autosize.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	var msg = '#message';

	$('.time').timeago();
	$(msg).autosize();

	$('#post_comment').click(function() {
		$(msg).focus();
	});

	$(msg).keypress(function(e) {
		if(e.which == 13) {
			var val = $(msg).val();

			$.ajax({
				url: 'php/ajax.php',
				type: 'GET',
				data: 'msg='+escape(val),
				success: function(data) {
					$(msg).val('');
					$(msg).css('height','14px');
					$('#commentscontainer').append(data);
					$('.time').timeago();
				}
			});
		}
	});

	$('#like_post').click(function() {
		var count = parseFloat($('#count').html()) + 1;
		if(count > 1) {
			$('#if_like').html('Anda dan');
			$('#people').html('lainnya');
		} else {
			$('#if_like').html('Anda suka ini.');
			$('#likecontent').hide();
		}

		$('#like_post').hide();
		$('#unlike_post').show();
	});

	$('#unlike_post').click(function() {
		var count = parseFloat($('#count').html()) - 1;
		if(count < 1) {
			$('#likecontent').show();	
		}
		$('#unlike_post').hide();
		$('#like_post').show();
		$('#if_like').html('');
		$('#people').html('people');
	});
});
</script>
</head>
<body>
	<div class="header">
		<div class="header-inner clearfix">
			<div class="pull-left">
				<a href="http://www.rullypermana.com" target="_blank">
                    <img src="http://www.mainkoding.com/uploads/tools/mainkoding-white250_1479211794.png" style="height: 25px;"/>
                </a>
			</div>

			<div class="pull-right">
				<p class="small-text no-margin"><span style="color: #FFFFFF;">Facebook comments, like sistem menggunakan PHP, jQuery dan AJAX</span></p>
			</div>
		</div>
	</div>

	<div class="container">

		<div class="content">
            <div style="height: 50px;"></div>
			<div class="links">
				<a href="javascript:;" id="unlike_post" class="hide">Tidak Suka</a><a href="javascript:;" id="like_post">Suka</a> &middot; <a href="javascript:;" id="post_comment">Komentar</a>
			</div>
			<div class="like clearfix">
				<img src="img/like.png" class="pull-left">
				<div class="pull-left">
					<span id="if_like"></span> <span id="likecontent"><span id="count" class="color">8</span> <span id="people" class="color">orang</span> menyukai ini</span>
				</div>
			</div>

			<div id="commentscontainer">
				<div class="comments clearfix">
					<div class="pull-left lh-fix">
						<img src="img/avatar-mainkoding.png" style="width: 30px;">
					</div>

					<div class="comment-text pull-left">
						<span class="pull-left color strong"><a href="#">Ara Permana</a></span> &nbsp;Ini adalah contoh sistem komentar dan like facebook dengan php dan jquery ajax.
						<span class="info"><abbr class="time" title="2016-07-08T21:50:03+02:00"></abbr></span>
					</div>
				</div>

				<div class="comments clearfix">
					<div class="pull-left lh-fix">
						<img src="img/icon30.png" style="width: 30px;">
					</div>

					<div class="comment-text pull-left">
						<span class="color strong"><a href="#">Mainkoding.com</a></span> &nbsp;Bagaimana ini bekerja?
						<span class="info"><abbr class="time" title="2016-07-07T21:50:03+02:00"></abbr></span>
					</div>
				</div>
			</div>

			<div class="comments clearfix">
				<div class="pull-left lh-fix">
					<img src="img/default.gif">
				</div>

				<div class="comment-text pull-left">
					<textarea class="text-holder" placeholder="Tulis komentar.." id="message"></textarea>
				</div>
			</div>
		</div>
	</div>
    <div class="page-footer">
	   <center><p><a href="http://www.mainkoding.com" target="_blank">www.mainkoding.com</a></strong></p></center>
	</div>
</body>
</html>