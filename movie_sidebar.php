<div class="listview_1_of_3 images_1_of_3">
    <h2 style="color:#555;">Films in Theaters</h2>
    
    <?php
    $today = date("Y-m-d");
    $qry2 = mysqli_query($conn, "SELECT * FROM film WHERE status='0' ORDER BY RAND() LIMIT 10");

    while ($m = mysqli_fetch_array($qry2)) {
        // Membatasi deskripsi menjadi 20 kata
        $description = $m['deskripsi'];
        $words = explode(" ", $description);
        $maxWords = 5;
        $limitedWords = array_slice($words, 0, $maxWords);
        $limitedDescription = implode(" ", $limitedWords);

        // Jika deskripsi lebih dari 20 kata, tambahkan ellipsis (...)
        if (count($words) > $maxWords) {
            $limitedDescription .= "...";
        }
    ?>
        <div class="content-left">
            <div class="listimg listimg_1_of_2">
                <a href="about.php?id=<?php echo $m['film_id']; ?>">
                    <img src="<?php echo $m['gambar']; ?>">
                </a>
            </div>
            <div class="text list_1_of_2">
                <div class="extra-wrap1">
                    <a href="about.php?id=<?php echo $m['film_id']; ?>" class="link4" style="text-decoration:none; font-size:18px;">
                        <?php echo $m['judul_film']; ?>
                    </a><br>
                    <span class="data">Release Date: <?php echo $m['tanggal_rilis']; ?></span><br>
                    Cast: <span class="data"><?php echo $m['pemeran']; ?></span><br>
                    Description: <span class="color2" style="text-decoration:none;">
                        <?php echo $limitedDescription; ?>
                    </span><br>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    <?php
    }
    ?>
</div>
<div class="clear"></div>