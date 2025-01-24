<?php include('header.php');
if(!isset($_SESSION['user']))
{
	header('location:login.php');
}
	$qry2=mysqli_query($conn,"select * from film where film_id='".$_SESSION['movie']."'");
	$movie=mysqli_fetch_array($qry2);
	?>
<div class="content">
	<div class="wrap">
		<div class="content-top">
				<div class="section group">
					<div class="about span_1_of_2">	
						<h3 style="color:black;" class="text-center">BOOKING HISTORY</h3>
						<?php include('msgbox.php');?>
						<?php
				$bk=mysqli_query($conn,"select * from tiket where user_id='".$_SESSION['user']."'");
				if(mysqli_num_rows($bk))
				{
					?>
					<table class="table table-bordered">
						<thead>
						<th>Booking Id</th>
						<th>Movie</th>
						<th>Theatre</th>
						<th>Screen</th>
						<th>Date</th>
						<th>Show</th>
						<th>Seats</th>
						<th>Amount</th>
						<th>action</th>
						</thead>
						<tbody>
						<?php
						while($bkg=mysqli_fetch_array($bk))
						{
							$m=mysqli_query($conn,"select * from film where film_id=(select film_id from jadwal where j_id='".$bkg['jadwal_id']."')");
							$mov=mysqli_fetch_array($m);
							$s=mysqli_query($conn,"select * from screens where screen_id='".$bkg['screen_id']."'");
							$srn=mysqli_fetch_array($s);
							$tt=mysqli_query($conn,"select * from teater where id='".$bkg['t_id']."'");
							$thr=mysqli_fetch_array($tt);
							$st=mysqli_query($conn,"select * from jam_tayang where jt_id=(select jt_id from jadwal where j_id='".$bkg['jadwal_id']."')");
							$stm=mysqli_fetch_array($st);	
							?>
							<tr>
								<td>
									<?php echo $bkg['nomor_tiket'];?>
								</td>
								<td>
									<?php echo $mov['judul_film'];?>
								</td>
								<td>
									<?php echo $thr['nama'];?>
								</td>
								<td>
									<?php echo $srn['nama_screen'];?>
								</td>
								<td>
									<?php echo $bkg['tanggal'];?>
								</td>
								<td>
									<?php echo $stm['waktu_mulai'];?>
								</td>
								<td>
									<?php echo $bkg['nomor_kursi'];?>
								</td>
								<td>
									Rp. <?php echo $bkg['harga'];?>
								</td>
									<td>
    								<a href="print_tiket.php?id=<?php echo $bkg['tiket_id'];?>" style="text-decoration:none; color:blue;">Cetak Tiket</a>
									</td>
								<td>
									<?php  if($bkg['tanggal_tiket']<date('Y-m-d'))
									{
										?>
										<i class="glyphicon glyphicon-ok"></i>
										<?php
									}
									else
									{?>
									<a href="cancel.php?id=<?php echo $bkg['tiket_id'];?>" style="text-decoration:none; color:red;">Cancel</a>
									
									<?php
									}
									?>
								</td>
							</tr>
							<?php
						}
						?></tbody>
					</table>
					<?php
				}
				else
				{
					?>
					<h3 style="color:red;" class="text-center">No Previous Bookings Found!</h3>
					<p>Once you start booking movie tickets with this account, you'll be able to see all the booking history.</p>
					<?php
				}
				?>
					</div>			
				<?php include('movie_sidebar.php');?>
				
			</div>
				<div class="clear"></div>		
			</div>
	</div>
</div>
<?php include('footer.php');?>
<script type="text/javascript">
	$('#seats').change(function(){
		var charge=<?php echo $screen['charge'];?>;
		amount=charge*$(this).val();
		$('#amount').html("Rs "+amount);
		$('#hm').val(amount);
	});
</script>