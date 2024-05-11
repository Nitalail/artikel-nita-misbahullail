<?php
// Include file untuk koneksi database
include "connect.php";

// Mengambil nilai dari form
$title = mysqli_real_escape_string($connect, $_POST['title']);
$content = mysqli_real_escape_string($connect, $_POST['content']);
$category = mysqli_real_escape_string($connect, $_POST['category']);

// Mengambil nama file gambar
$gambar = $_FILES['gambar']['name'];

// Lokasi penyimpanan file gambar
$target_dir = "asset/";
$target_file = $target_dir . basename($_FILES["gambar"]["name"]);

// Coba upload file gambar
if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
    echo "File ". htmlspecialchars( basename( $_FILES["gambar"]["name"])). " berhasil diupload.";
} else {
    echo "Maaf, terjadi kesalahan saat mengupload file.";
}

$query = "INSERT INTO data_artikel (title, content, gambar, category) VALUES (?, ?, ?, ?)";
$stmt = mysqli_prepare($connect, $query);

mysqli_stmt_bind_param($stmt, "ssss", $title, $content, $gambar, $category);


if(mysqli_stmt_execute($stmt)) {
    // Jika berhasil, redirect ke halaman utama
    header('location: index.php');
} else {
    // Jika terjadi kesalahan, tampilkan pesan kesalahan
    echo "Error: " . $query . "<br>" . mysqli_error($connect);
}

// Tutup statement
mysqli_stmt_close($stmt);

mysqli_close($connect);
?>
