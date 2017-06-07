<?php
/*
	@! Sistem komentar facebook
	@@ Menggunakan PHP, jQuery, dan AJAX
*/

## Menentukan tanggal dan waktu
$date = date('Y-m-d H:i:s');
$date = date('c', strtotime($date));

if(isset($_GET['msg'])) {
	$msg = $_GET['msg'];
    
    /* @@ Telah melakukan validasi dan mengirim hasilnya kembali ke halaman index.php.
    /* Biasanya, dalam aplikasi kita akan menyimpan informasi dalam database. */

?>
    <div class="comments clearfix">
        <div class="pull-left lh-fix">
            <img src="img/default.gif">
        </div>
        <div class="comment-text pull-left">
            <span class="color strong"><a href="#">Anda</a></span> &nbsp;<?php echo $msg; ?>
            <span class="info"><abbr class="time" title="<?php echo $date; ?>"></abbr></span>
        </div>
    </div>
<?php
}
?>