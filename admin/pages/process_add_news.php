<?php
session_start();
include('../../config/koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $name = $_POST['name'];
    $pemeran = $_POST['pemeran'];
    $tanggal = $_POST['tanggal'];
    $deskripsi = $_POST['deskripsi'];

    // Upload file gambar
    $uploaddir = '../news_images/';
    $uploadfile = $uploaddir . basename($_FILES['gambar']['name']);
    $flname = "news_images/" . basename($_FILES["gambar"]["name"]);

    if (move_uploaded_file($_FILES['gambar']['tmp_name'], $uploadfile)) {
        // Gunakan prepared statements untuk mencegah SQL Injection
        $stmt = $conn->prepare("INSERT INTO terbaru (news_id, name, pemeran, tanggal, deskripsi, gambar) VALUES (NULL, ?, ?, ?, ?, ?)");

        if (!$stmt) {
            // Debug jika prepare gagal
            die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
        }

        $stmt->bind_param("sssss", $name, $pemeran, $tanggal, $deskripsi, $flname);

        if ($stmt->execute()) {
            $_SESSION['add'] = 1;
            header('Location: add_movie_news.php');
        } else {
            // Debug jika execute gagal
            die("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
        }

        $stmt->close();
    } else {
        echo "File upload failed.";
    }
} else {
    echo "Invalid request.";
}
?>
