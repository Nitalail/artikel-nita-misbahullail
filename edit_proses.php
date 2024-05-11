<?php
include 'connect.php';

// Mengambil nilai dari form
$id = $_POST['id'];
$title = mysqli_real_escape_string($connect, $_POST['title']);
$content = mysqli_real_escape_string($connect, $_POST['content']);
$category = mysqli_real_escape_string($connect, $_POST['category']);

// Mengambil nama file gambar
$fileName = $_FILES['gambar']['name'];
$targetDir = "asset/";
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

// Handle image upload
if (!empty($fileName)) {
    $check = getimagesize($_FILES["gambar"]["tmp_name"]);
    if ($check !== false) {
        // Allow certain file formats
        if ($fileType == "jpg" || $fileType == "png" || $fileType == "jpeg" || $fileType == "gif") {
            // Upload file to server
            if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $targetFilePath)) {
                // Update article information in the database
                $query = "UPDATE data_artikel SET title=?, content=?, category=?, gambar=? WHERE id=?";
                $stmt = mysqli_prepare($connect, $query);
                mysqli_stmt_bind_param($stmt, "ssssi", $title, $content, $category, $fileName, $id);
                if (mysqli_stmt_execute($stmt)) {
                    header('location:index.php');
                } else {
                    echo "Gagal mengedit artikel.";
                }
            } else {
                echo "Maaf, terjadi kesalahan saat mengunggah file.";
            }
        } else {
            echo "Maaf, hanya file JPG, JPEG, PNG, & GIF yang diperbolehkan.";
        }
    } else {
        echo "File yang diunggah bukan gambar.";
    }
} else {
    
    $query = "UPDATE data_artikel SET title=?, content=?, category=? WHERE id=?";
    $stmt = mysqli_prepare($connect, $query);
    mysqli_stmt_bind_param($stmt, "sssi", $title, $content, $category, $id);
    if (mysqli_stmt_execute($stmt)) {
        header('location:index.php');
    } else {
        echo "Gagal mengedit artikel.";
    }
}

// Tutup koneksi database
mysqli_close($connect);
?>
