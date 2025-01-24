<?php
include('header.php');
if (!isset($_SESSION['user'])) {
    header('location:login.php');
    exit;
}

// Pastikan koneksi ke database sudah tersedia di variabel $conn
if (!isset($_SESSION['movie']) || empty($_SESSION['movie'])) {
    die("Film tidak ditemukan di sesi.");
}

// Mengambil detail film menggunakan prepared statement
$stmt = $conn->prepare("SELECT * FROM film WHERE film_id = ?");
$stmt->bind_param("i", $_SESSION['movie']);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $movie = $result->fetch_assoc();
} else {
    die("Film tidak ditemukan.");
}
// Cek apakah ada notifikasi
if (isset($_SESSION['notification'])) {
    // Tampilkan notifikasi
    echo '<div class="alert alert-warning">' . $_SESSION['notification'] . '</div>';

    // Hapus notifikasi dari session
    unset($_SESSION['notification']);
}
?>

<div class="content">
    <div class="wrap">
        <div class="content-top">
            <div class="section group">
                <div class="about span_1_of_2">    
                    <h3><?php echo htmlspecialchars($movie['judul_film']); ?></h3>    
                    <div class="about-top">    
                        <div class="grid images_3_of_2">
                            <img src="<?php echo htmlspecialchars($movie['gambar']); ?>" alt=""/>
                        </div>
                        <div class="desc span_3_of_2">
                            <p class="p-link" style="font-size:15px"><b>Cast : </b><?php echo htmlspecialchars($movie['pemeran']); ?></p>
                            <p class="p-link" style="font-size:15px"><b>Duration : </b><?php echo date('h:i A', strtotime($movie['durasi'])); ?></p>
                            <p class="p-link" style="font-size:15px"><b>Release Date : </b><?php echo date('d-M-Y', strtotime($movie['tanggal_rilis'])); ?></p>
                            <p style="font-size:15px"><?php echo htmlspecialchars($movie['deskripsi']); ?></p>
                            <a href="<?php echo htmlspecialchars($movie['video_url']); ?>" target="_blank" class="watch_but">Watch Trailer</a>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <table class="table table-hover table-bordered text-center">
                        <?php
                        if (!isset($_SESSION['show']) || empty($_SESSION['show'])) {
                            die("Jadwal tidak ditemukan di sesi.");
                        }

                        // Mengambil data jadwal
                        $stmt = $conn->prepare("SELECT * FROM jadwal WHERE j_id = ?");
                        $stmt->bind_param("i", $_SESSION['show']);
                        $stmt->execute();
                        $shwResult = $stmt->get_result();
                        if ($shwResult->num_rows > 0) {
                            $shw = $shwResult->fetch_assoc();
                        } else {
                            die("Jadwal tidak ditemukan.");
                        }

                                    // Cek r_status dari jadwal
                    if ($shw['r_status'] == 1) {
                        echo '<div class="alert alert-danger">Film sedang dimulai!</div>';
                    }

                        // Mengambil data teater
                        $stmt = $conn->prepare("SELECT * FROM teater WHERE id = ?");
                        $stmt->bind_param("i", $shw['teater_id']);
                        $stmt->execute();
                        $theatreResult = $stmt->get_result();
                        if ($theatreResult->num_rows > 0) {
                            $theatre = $theatreResult->fetch_assoc();
                        } else {
                            die("Teater tidak ditemukan.");
                        }
                        ?>
                        <tr>
                            <td class="col-md-6">Theatre</td>
                            <td><?php echo htmlspecialchars($theatre['nama']) . ", " . htmlspecialchars($theatre['alamat']); ?></td>
                        </tr>
                        <tr>
                            <td>Screen</td>
                            <td>
                                <?php
                                // Mengambil data screen
                                $stmt = $conn->prepare("SELECT * FROM jam_tayang WHERE jt_id = ?");
                                $stmt->bind_param("i", $shw['jt_id']);
                                $stmt->execute();
                                $ttmResult = $stmt->get_result();
                                if ($ttmResult->num_rows > 0) {
                                    $ttme = $ttmResult->fetch_assoc();
                                } else {
                                    die("Jam tayang tidak ditemukan.");
                                }

                                $stmt = $conn->prepare("SELECT * FROM screens WHERE screen_id = ?");
                                $stmt->bind_param("i", $ttme['screen_id']);
                                $stmt->execute();
                                $screenResult = $stmt->get_result();
                                if ($screenResult->num_rows > 0) {
                                    $screen = $screenResult->fetch_assoc();
                                } else {
                                    die("Screen tidak ditemukan.");
                                }
                                echo htmlspecialchars($screen['nama_screen']);
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Date</td>
                            <td>
                                <?php
                                if (isset($_GET['date'])) {
                                    $date = $_GET['date'];
                                } else {
                                    $date = date('Y-m-d');
                                }
                                ?>
                                <span class="btn btn-default"><?php echo date('d-M-Y', strtotime($date)); ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Show Time</td>
                            <td>
                                    <?php
                                    // Menampilkan jam tayang yang berbeda
                                    $stmt = $conn->prepare("SELECT * FROM jam_tayang WHERE jt_id = ?");
                                    $stmt->bind_param("i", $shw['jt_id']);
                                    $stmt->execute();
                                    $showTimes = $stmt->get_result();
                                    while ($time = $showTimes->fetch_assoc()) {
                                        echo '<option value="' . $time['nama'] . '">' . date('h:i A', strtotime($time['waktu_mulai'])) . '</option>';
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Amount</td>
                            <td id="amount" style="font-weight:bold;font-size:18px">
                            Rp. <?php echo $screen['harga']; ?>
                            </td>
                        </tr>
                        <tr>
                            <p class="p">Number of Seats</p>
                            
                                <form action="process_booking.php" method="post">
                                    <input type="hidden" name="screen" value="<?php echo $screen['screen_id']; ?>"/>
                                    <input type="hidden" name="amount" value="<?php echo $screen['harga']; ?>"/>
                                <div class="seating-chart">
                                    <?php
                                    // Mendapatkan kursi yang sudah dipesan berdasarkan jadwal_id dan tanggal
                                    $stmt = $conn->prepare("SELECT nomor_kursi FROM tiket WHERE jadwal_id = ? AND tanggal = ?");
                                    $stmt->bind_param("is", $shw['j_id'], $date);
                                    $stmt->execute();
                                    $bookedSeatsResult = $stmt->get_result();
                                    $bookedSeats = [];
                                    while ($row = $bookedSeatsResult->fetch_assoc()) {
                                        $bookedSeats[] = $row['nomor_kursi'];
                                    }

                                    // Misalkan kita memiliki 10 kursi untuk ditampilkan
                                    $totalSeats = $screen['kursi']; 
                                    for ($i = 1; $i <= $totalSeats; $i++) {
                                        $isBooked = in_array($i, $bookedSeats) ? ' booked' : '';
                                        $disabled = $isBooked ? ' disabled' : '';
                                        echo '<div class="seat' . $isBooked . '">
                                                <input type="radio" name="seats" class="form-control" value="' . $i . '" id="seat' . $i . '"' . $disabled . '/>
                                                <label for="seat' . $i . '">' . $i . '</label>
                                              </div>';
                                    }
                                    ?>
                                </div>
                                    <input type="hidden" name="date" value="<?php echo $date; ?>"/>
                        
                        </tr>
<tr>
    <td colspan="2">
        <?php if ($shw['r_status'] == 1): ?>
            <button class="btn btn-info" style="width:100%" disabled>Booking Now</button>
        <?php else: ?>
            <button class="btn btn-info" style="width:100%">Booking Now</button>
        <?php endif; ?>
    </td>
</tr>
                    </table>
                </div>
                <?php include('movie_sidebar.php'); ?>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>
<style>
    input[type="radio"] {
    display: none; /* Menyembunyikan radio button default */
}

.p {
    font-weight: bold;
    font-size: 20px;
    margin-left: 330px;
}

.seating-chart {
    display: grid;
    grid-template-columns: repeat(15, 1fr); /* 15 kursi per baris */
    gap: 0px; /* Jarak antar kursi */
    margin: 0px 0;
}

.seat {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.seat input[type="checkbox"] {
    display: none; /* Sembunyikan checkbox asli */
}

.seat label {
    background-color: #ccc; /* Warna kursi */
    border: 1px solid #666; /* Border kursi */
    border-radius: 5px; /* Sudut melengkung */
    padding: 10px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.seat input[type="radio"]:checked + label {
    background-color: #28a745; /* Warna saat kursi dipilih */
    color: white; /* Warna teks saat dipilih */
}

.seat.booked label {
    background-color: #dc3545; /* Warna kursi yang sudah dipesan */
    color: white;
    cursor: not-allowed; /* Tanda bahwa kursi tidak dapat dipilih */
}
.seat.booked input {
    pointer-events: none; /* Nonaktifkan interaksi */
}
.btn:disabled {
    background-color: #ccc;
    cursor: not-allowed;
}
</style>
