
<?php include('header.php');
if(!isset($_SESSION['user']))
{
	header('location:login.php');
}?>
<link rel="stylesheet" href="validation/dist/css/bootstrapValidator.css"/>
    
<script type="text/javascript" src="validation/dist/js/bootstrapValidator.js"></script>
  <!-- =============================================== -->
  <?php
    include('form.php');
    $frm=new formBuilder;      
  ?> 
</div>
<div class="content">
	<div class="wrap">
		<div class="content-top">
			<h3>Payment</h3>
			<form action="bank.php" method="post" id="form1">
			<div class="col-md-4 col-md-offset-4" style="margin-bottom:50px">
			<div class="form-group">
   <label class="control-label">Name</label>
    <input type="text" class="form-control" name="name">
</div>
<div class="form-group">
   <label class="control-label">Rekening Number</label>
    <input type="text" class="form-control" name="number" required title="Enter 12-16 digit card number">
  
</div>      
<div class="form-group">
   <label class="control-label">Expiration date</label>
    <input type="date" class="form-control" name="date">
</div>
<div class="form-group">
    <button class="btn btn-success">Make Payment</button>
    </form>
</div>
</div>
			</div>
			
		<div class="clear"></div>	
		
	</div>
<?php include('footer.php');?>
</div>
<?php

    // Ambil data dari form
    $screen = $_POST['screen'];
    $seats = $_POST['seats'];
    $amount = $_POST['amount'];
    $date = $_POST['date'];

    // Cek apakah kursi sudah dipesan
    $stmt = $conn->prepare("SELECT * FROM tiket WHERE screen_id = ? AND tanggal = ? AND nomor_kursi = ?");
    $stmt->bind_param("isi", $screen, $date, $seats);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
    // Kursi sudah dipesan, simpan pesan dalam session
    $_SESSION['notification'] = "Kursi sudah dipesan. Silakan pilih kursi lain.";
    echo '<meta http-equiv="refresh" content="0;url=booking.php">';
    exit; // Kembali ke halaman pemesanan
} else {

    extract($_POST);
    include ('config/koneksi.php');
    $_SESSION['screen']=$screen;
    $_SESSION['seats']=$seats;
    $_SESSION['amount']=$amount;
    $_SESSION['date']=$date;
    ('location:bank.php');}
?>
<script>
        $(document).ready(function() {
            $('#form1').bootstrapValidator({
            fields: { 
            name: {
            verbose: false,
                validators: {notEmpty: {
                        message: 'The Name is required and can\'t be empty'
                    },regexp: {
                        regexp: /^[a-zA-Z ]+$/,
                        message: 'The Name can only consist of alphabets'
                    } } },
            number: {
            verbose: false,
                validators: {notEmpty: {
                        message: 'The Card Number is required and can\'t be empty'
                    },stringLength: {
                    min: 12,
                    max: 16,
                    message: 'The Card Number must 12-16 characters long'
                },regexp: {
                        regexp: /^[0-9 ]+$/,
                        message: 'Enter a valid Card Number'
                    } } },
            date: {
            verbose: false,
                validators: {notEmpty: {
                        message: 'The Expire Date is required and can\'t be empty'
                    } } },
                }
            });
            });

</script>