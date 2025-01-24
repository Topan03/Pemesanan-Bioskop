<?php
    extract($_POST);
    include('../../config/koneksi.php');
    $w=mysqli_query($conn,"select * from jam_tayang where screen_id='$id'");
    ?>
    <option value="0">Select Show</option>
    <?php
    while($sh=mysqli_fetch_array($w))
    {
        ?>
        <option value="<?php echo $sh['jt_id'];?>"><?php echo $sh['nama'];?></option>
        <?php
    }
?>