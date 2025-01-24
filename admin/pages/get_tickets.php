
<div class="panel panel-default">
            <div class="panel-body" id="disp"><?php
    extract($_POST);
    include('../../config/koneksi.php');
    $w=mysqli_query($conn,"select * from jadwal where jt_id='$id' and r_status='0'");
    $swt=mysqli_fetch_array($w);
    $qq=mysqli_query($conn,"select * from tiket where jadwal_id='".$swt['j_id']."' and tanggal");
    if(mysqli_num_rows($qq))
    {
        $m=mysqli_query($conn,"select * from film where film_id='".$swt['film_id']."'");
        $movie=mysqli_fetch_array($m);
        ?>
        
         <h3><small>Movie : </small><?php echo $movie['judul_film'];?></h3>
        <table class="table">
            <th>
                Slno
            </th>
            <th>
                Ticket id
            </th>
            <th>
                Viewer Name
            </th>
            <th>
                Phone
            </th>
            <th>
                Number of Tickets
            </th>
        <?php
    $sl=1;
    while($sh=mysqli_fetch_array($qq))
    {
        $us=mysqli_query($conn,"SELECT * from registrasi where user_id='".$sh['user_id']."'");
        $user=mysqli_fetch_array($us);
        ?>
        <tr>
            <td><?php echo $sl; $sl++;?></td>
            <td><?php echo $sh['nomor_tiket'];?></td>
            <td><?php echo $user['nama'];?></td>
            <td><?php echo $user['email'];?></td>
            <td><?php echo $sh['nomor_kursi'];?></td>
        </tr>
        <?php
    }
    ?>
    </table>
    <?php
    }
    else
    {
        ?>
        <h3>No Show</h3>
        <?php
    }
?></div>
          </div>