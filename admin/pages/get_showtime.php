 <?php
 include('../../config/koneksi.php');
    $sr=mysqli_query($conn,"select * from jam_tayang where screen_id='".$_POST['screen']."'");
    if(mysqli_num_rows($sr))
    {
        while($time=mysqli_fetch_array($sr))
        {
            ?>
            <option value="<?php echo $time['jt_id'];?>"><?php echo $time['nama']."( ".$time['waktu_mulai']." )";?></option>
            <?php
        }
    }
    else {
        ?>
        <option disabled>No Show time added in selected screen</option>
        <?php
    }
    ?>