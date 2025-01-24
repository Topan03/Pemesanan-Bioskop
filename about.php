<?php include('header.php');
	$qry2=mysqli_query($conn,"select * from film where film_id='".$_GET['id']."'");
	$movie=mysqli_fetch_array($qry2);
	?>
<div class="content">
	<div class="wrap">
		<div class="content-top">
				<div class="section group">
					<div class="about span_1_of_2">	
						<h3 style="color:#444; font-size:23px;" class="text-center"><?php echo $movie['judul_film']; ?></h3>	
							<div class="about-top">	
								<div class="grid images_3_of_2">
									<img src="<?php echo $movie['gambar']; ?>" alt=""/>
								</div>
								<div class="desc span_3_of_2">
									<p class="p-link" style="font-size:15px"><b>Genre : </b><?php echo $movie['genre']; ?></p>
									<p class="p-link" style="font-size:15px"><b>Cast : </b><?php echo $movie['pemeran']; ?></p>
									<p class="p-link" style="font-size:15px"><b>duration : </b><?php echo date('h:i',strtotime($movie['durasi'])); ?> menit</p>
									<p class="p-link" style="font-size:15px"><b>Release Date : </b><?php echo date('d-M-Y',strtotime($movie['tanggal_rilis'])); ?></p>
									<p style="font-size:15px"><?php echo $movie['deskripsi']; ?></p>
									<a href="<?php echo $movie['video_url']; ?>" target="_blank" class="watch_but" style="text-decoration:none;">Watch Trailer</a>
								</div>
								<div class="clear"></div>
							</div>
							<?php $s=mysqli_query($conn,"select DISTINCT teater_id from jadwal where film_id='".$movie['film_id']."'");
							if(mysqli_num_rows($s))
							{?>
							<table class="table table-hover table-bordered text-center">
								<h3 style="color:#444;" class="text-center">Available Shows</h3>

								<thead>
										<tr>
											<th class="text-center" style="font-size:16px;"><b>Theatre</b></th>
											<th class="text-center" style="font-size:16px;"><b>Show Timings</b></th>
										</tr>
									</thead>
							<?php

							
								
								while($shw=mysqli_fetch_array($s))
								{
									
									$t=mysqli_query($conn,"select * from teater where id='".$shw['teater_id']."'");
									$theatre=mysqli_fetch_array($t);
									?>
									

									<tbody>
									<tr>
										<td >
											<?php echo $theatre['nama'].", ".$theatre['alamat'];?>
										</td>
										<td>
											<?php $tr=mysqli_query($conn,"select * from jadwal where film_id='".$movie['film_id']."' and teater_id='".$shw['teater_id']."'");
											while($shh=mysqli_fetch_array($tr))
											{
												$ttm=mysqli_query($conn,"select  * from jam_tayang where jt_id='".$shh['jt_id']."'");
												$ttme=mysqli_fetch_array($ttm);
												
												?>
												
												<a href="check_login.php?show=<?php echo $shh['j_id'];?>&movie=<?php echo $shh['film_id'];?>&theatre=<?php echo $shw['teater_id'];?>"><button class="btn btn-default"><?php echo date('h:i A',strtotime($ttme['waktu_mulai']));?></button></a>
												<?php
											}
											?>
										</td>
									</tr>
									</tbody>
									<?php
								}
							?>
						</table>
							<?php
							}
						
							else
							{
								?>
								<h3 style="color:#444; font-size:23px;" class="text-center">Currently there are no any shows available!</h3>
								<p class="text-center">Please check back later!</p>
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