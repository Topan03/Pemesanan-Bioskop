<?php include('header.php');?>
</div>
<div class="content">
	<div class="wrap">
		<div class="content-top">
			<center><h1 style="color:#555;">(UPCOOMING)</h1></center>
			
			<?php
          	 $today=date("Y-m-d");
          	 $qry2=mysqli_query($conn,"select * from  terbaru ");

		
          	  while($m=mysqli_fetch_array($qry2))
                   {
			// Membatasi deskripsi menjadi 20 kata
        	$cast = $m['pemeran'];
        	$words = explode(" ", $cast);
        	$maxWords = 35;
        	$limitedWords = array_slice($words, 0, $maxWords);
        	$limitedcast = implode(" ", $limitedWords);

 		       // Jika deskripsi lebih dari 20 kata, tambahkan ellipsis (...)
        		if (count($words) > $maxWords) {
            	$limitedcast .= "...more...";
        		}
                    ?>
                    
                    <div class="col_1_of_4 span_1_of_4">
					<div class="imageRow">
						  	<div class="single">
						  		<?php
						
						?>
						  		<a href="about.php?id=<?php echo $m['news_id'];?>"><img src="admin/<?php  echo  $m['gambar'];?>" alt="" /></a>
						  	</div>
						  	<div class="movie-text">
						  		<h4 class="h-text"><a href="about.php?id=<?php echo $m['news_id'];?>" style="text-decoration:none;"><?php echo $m['name'];?></a></h4>
						  		Cast: <Span class="color2" style="text-decoration:none;"><?php echo $limitedcast;?></span><br>
						  		
						  	</div>
		  				</div>
		  		</div>
		  		
  	    <?php
  	    	}
  	    	?>
			
			</div>
				<div class="clear"></div>		
			</div>
</div>
<div class="content">
	<div class="wrap">
		<div class="content-top">
			<center><h1 style="color:#555;">(NOW SHOWING)</h1></center>
			
			<?php
          	 $today=date("Y-m-d");
          	 $qry2=mysqli_query($conn,"select * from  film ");

		
          	  while($m=mysqli_fetch_array($qry2))
                   {
			// Membatasi deskripsi menjadi 20 kata
        	$cast = $m['pemeran'];
        	$words = explode(" ", $cast);
        	$maxWords = 35;
        	$limitedWords = array_slice($words, 0, $maxWords);
        	$limitedcast = implode(" ", $limitedWords);

 		       // Jika deskripsi lebih dari 20 kata, tambahkan ellipsis (...)
        		if (count($words) > $maxWords) {
            	$limitedcast .= "...more...";
        		}
                    ?>
                    
                    <div class="col_1_of_4 span_1_of_4">
					<div class="imageRow">
						  	<div class="single">
						  		<?php
						
						?>
						  		<a href="about.php?id=<?php echo $m['film_id'];?>"><img src="<?php echo $m['gambar'];?>" alt="" /></a>
						  	</div>
						  	<div class="movie-text">
						  		<h4 class="h-text"><a href="about.php?id=<?php echo $m['film_id'];?>" style="text-decoration:none;"><?php echo $m['judul_film'];?></a></h4>
						  		Cast: <Span class="color2" style="text-decoration:none;"><?php echo $limitedcast;?></span><br>
						  		
						  	</div>
		  				</div>
		  		</div>
		  		
  	    <?php
  	    	}
  	    	?>
			
			</div>
				<div class="clear"></div>		
			</div>
			<?php include('footer.php');?>