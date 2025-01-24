<?php
session_start();
include('../../config/koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $name = $_POST['name'];
    $genre = $_POST['genre'];
    $pemeran = $_POST['pemeran'];
    $durasi = $_POST['durasi'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal = $_POST['tanggal'];
    $video_url = $_POST['video_url'];

    // Validasi ekstensi file gambar
    $target_dir = "../../images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Validasi apakah file adalah gambar yang valid
    $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($imageFileType, $allowed_extensions)) {
        $_SESSION['error'] = "Invalid file format. Only JPG, JPEG, PNG & GIF files are allowed.";
        header('Location: add_movie.php');
        exit;
    }

    $flname = "images/" . basename($_FILES["image"]["name"]);

    // Upload file gambar
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        // Gunakan prepared statements untuk keamanan
        $stmt = $conn->prepare("INSERT INTO film (film_id, t_id, judul_film, genre, pemeran, durasi, deskripsi, tanggal_rilis, gambar, video_url, status) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        if (!$stmt) {
            die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
        }

        // Ambil ID theatre dari session
        $theatre_id = $_SESSION['theatre'];
        $status = 0; // Default status

        // Bind parameters dan eksekusi query
        // Perbaiki bind_param dengan tipe yang sesuai
        $stmt->bind_param("issssssssi", $theatre_id, $name, $genre, $pemeran, $durasi, $deskripsi, $tanggal, $flname, $video_url, $status);
        if ($stmt->execute()) {
            $_SESSION['success'] = "Movie Added Successfully!";
            header('Location: add_movie.php');
        } else {
            die("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
        }

        $stmt->close();
    } else {
        $_SESSION['error'] = "File upload failed.";
        header('Location: add_movie.php');
    }
} else {
    echo "Invalid request.";
}
?>
