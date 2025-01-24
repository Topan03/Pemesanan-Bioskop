<?php
include('header.php');
if(!isset($_SESSION['user'])) {
    header('location:login.php');
}

if(isset($_GET['id'])) {
    $ticket_id = $_GET['id'];
    $qry = mysqli_query($conn, "SELECT * FROM tiket WHERE tiket_id='$ticket_id'");
    $ticket = mysqli_fetch_array($qry);

    // Ambil detail film, teater, dan jadwal sesuai dengan tiket
    $film_query = mysqli_query($conn, "SELECT * FROM film WHERE film_id=(SELECT film_id FROM jadwal WHERE j_id='".$ticket['jadwal_id']."')");
    $film = mysqli_fetch_array($film_query);
    $teater_query = mysqli_query($conn, "SELECT * FROM teater WHERE id=(SELECT teater_id FROM jadwal WHERE j_id='".$ticket['jadwal_id']."')");
    $thr = mysqli_fetch_array($teater_query);
							$s=mysqli_query($conn,"select * from screens where screen_id='".$ticket['screen_id']."'");
							$srn=mysqli_fetch_array($s);
    $jam_tayang_query = mysqli_query($conn, "SELECT * FROM jam_tayang WHERE jt_id=(SELECT jt_id FROM jadwal WHERE j_id='".$ticket['jadwal_id']."')");
    $stm = mysqli_fetch_array($jam_tayang_query);

    // Tampilkan detail tiket
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jsbarcode/3.11.0/JsBarcode.all.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(41, 40, 40);
            margin: 0;
            padding: 20px;
        }

        .ticket-details {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
        }

        .ticket-details h2 {
            text-align: center;
            color: #333;
        }

        .ticket-details p {
            margin: 10px 0;
            font-size: 16px;
            color: #555;
        }

        .ticket-details p strong {
            color: #000;
        }

        button {
            display: block;
            width: 10%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
            margin-left: 45%;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: rgb(5, 129, 34);
        }

        #barcode {
            display: none; /* Sembunyikan barcode secara default */
        }

        @media print {
            body * {
                visibility: hidden; /* Sembunyikan semua elemen */
            }
            .ticket-details, .ticket-details * {
                visibility: visible; /* Tampilkan hanya elemen dalam div ticket-details */
            }
            .ticket-details {
                position: absolute; /* Posisi div agar bisa dicetak dengan baik */
                left: 0;
                top: 0;
            }
            #barcode {
                display: block; /* Tampilkan barcode saat mencetak */
                margin: 20px auto; /* Pusatkan barcode */
            }
        }
    </style>

    <div class="ticket-details">
        <h2>Detail Tiket</h2>
        <p><strong>Film:</strong> <?php echo $film['judul_film']; ?></p>
        <p><strong>Theatre:</strong> <?php echo $thr['nama']; ?></p>
        <p><strong>Screen:</strong> <?php echo $srn['nama_screen']; ?></p>
        <p><strong>Date:</strong> <?php echo $ticket['tanggal']; ?></p>
        <p><strong>Show:</strong> <?php echo $stm['nama']." - ".$stm['waktu_mulai']; ?></p>
        <p><strong>Seats:</strong> <?php echo $ticket['nomor_kursi']; ?></p>
        <p><strong>Price:</strong> Rp.<?php echo $ticket['harga']; ?></p>
        <svg id="barcode"></svg>
    </div>

    <button onclick="window.print();">Print Ticket</button>

    <script>
        // Generate barcode using JsBarcode
        JsBarcode("#barcode", "<?php echo $ticket['nomor_tiket']; ?>", {
            format: "CODE128",
            lineColor: "#000",
            width: 2,
            height: 40,
            displayValue: true
        });
    </script>
<?php
}
include('footer.php');
?>