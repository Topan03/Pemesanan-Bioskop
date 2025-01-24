<?php
include('header.php');
?>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Theatre Assistance
      </h1>
      <ol class="breadcrumb">
        <li><a href="index"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Home</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box --> 
      <div class="box">
        <div class="box-body">
            
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Running Movies</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-condensed">
                <tr>
                  <th class="col-md-1">No</th>
                  <th class="col-md-3">Screen</th>
                  <th class="col-md-4">Show Time</th>
                  <th class="col-md-4">Movie</th>
                </tr>
                <?php 
					$qry8=mysqli_query($conn,"select * from jadwal where r_status=1 and teater_id='".$_SESSION['theatre']."'");
					$no=1;
					while($mn=mysqli_fetch_array($qry8))
					{
					 $qry9=mysqli_query($conn,"select * from film where film_id='".$mn['film_id']."'");
					 $mov=mysqli_fetch_array($qry9);
					 $qry10=mysqli_query($conn,"select * from jam_tayang where jt_id='".$mn['jt_id']."'");
					 $scr=mysqli_fetch_array($qry10);
					 $qry11=mysqli_query($conn,"select * from screens where screen_id='".$scr['screen_id']."'");
					 $scn=mysqli_fetch_array($qry11);
					?>
                <tr>
                  <td><?php echo $no;?></td>
                  <td><span class="badge bg-green"><?php echo $scn['nama_screen'];?></span></td>
                  <td><span class="badge bg-light-blue"><?php echo $scr['waktu_mulai'];?>(<?php echo $scr['nama'];?>)</span></td>
                  <td><?php echo $mov['judul_film'];?></td>
                  </tr>
                  <?php
					       $no=$no+1;
					  
					}
                  ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
            
            
        </div> 
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <?php
include('footer.php');
?>