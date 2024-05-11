<?php

include 'connect.php';


// Periksa apakah parameter id artikel telah diteruskan
if(isset($_GET['id'])) {
    // Escape parameter id untuk menghindari serangan SQL Injection
    $id = mysqli_real_escape_string($connect, $_GET['id']);

    // Query SQL untuk mengambil data artikel berdasarkan id
    $sql = "SELECT * FROM data_artikel WHERE id = '$id'";

    // Eksekusi query SQL
    $result = mysqli_query($connect, $sql);

    // Periksa apakah artikel ditemukan
    if(mysqli_num_rows($result) > 0) {
        // Ambil data artikel
        $article = mysqli_fetch_assoc($result);

        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Artikel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .img {
            max-width: 70%;
            height: auto;
        }

        .article-container {
    width: 93vw;
    max-width: 2000px; 
    padding: 20px;
    margin: 20px;
    border: 1px solid #ccc;
    border-radius: 8px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    position: relative;
    overflow-y: auto; 
    margin-bottom: 100px; /* Tambahkan margin bawah untuk memberikan ruang di bawah konten */
}
        .article {
            word-wrap: break-word; 
        }

        .close-icon {
            color: #999;
            font-size: 24px;
            position: absolute;
            top: 20px;
            right: 20px;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .close-icon:hover {
            color: #333;
        }

        .footer {
            background-color: #f9f9f9;
            text-align: center;
            padding: 20px;
            width: 100%;
            position: fixed;
            bottom: 0;
            margin-top: 20px; /* Tambahkan margin atas untuk memberikan ruang di bawah konten */
        }

        .footer p {
            margin: 0; 
        }

        @media screen and (max-width: 600px) {
            .article-container {
                max-width: 90vw; /* Mengatur lebar maksimum artikel untuk layar kecil */
                padding: 10px;
                margin: 10px;
            }
        }
        .article h2 {
        color: red; /* Mengubah warna teks judul artikel menjadi merah */
        font-size: 40px;
    }
    </style>
</head>
<body>
    <div class="article-container">
        <?php
        if(isset($_GET['id'])) {
            $id = mysqli_real_escape_string($connect, $_GET['id']);
            $sql = "SELECT * FROM data_artikel WHERE id = '$id'";
            $result = mysqli_query($connect, $sql);
            if(mysqli_num_rows($result) > 0) {
                $article = mysqli_fetch_assoc($result);
        ?>
       <a href="javascript:history.back()" class="close-icon" style="text-decoration: none; color: red;">&times;</a>
        <div class="article">
        <p style="margin-bottom: 5px;"> >> <a href="subkategori.php?kategori=<?php echo $article['category']; ?>" style="text-decoration: none;"><?php echo $article['category']; ?></a></p>
        <h2 style="margin-top: 5px;"><?php echo $article['title']; ?></h2>
        <p style="margin-bottom: 5px;">Tanggal: <?php echo date("d F Y, H:i", strtotime($article['date'])); ?></p>
        <img src="asset/<?php echo $article['gambar']; ?>" alt="Gambar Artikel" class="img">
            <p><?php echo nl2br($article['content']); ?></p>

        </div>
        <?php
            } else {
                echo "Artikel tidak ditemukan.";
            }
        } else {
            echo "Parameter id artikel tidak ditemukan.";
        }
        ?>
    </div>
     
    <footer class="footer">
    <p>&copy; <?php echo date("Y"); ?>Nita Misbahullail</p>
    <div class="social-icons">
        <a href="#" class="social-icon"><i class="fab fa-twitter" style="color: red;"></i></a>
        <a href="#" class="social-icon"><i class="fab fa-whatsapp" style="color: red;"></i></a>
        <a href="#" class="social-icon"><i class="fab fa-instagram" style="color: red;"></i></a>
        <a href="#" class="social-icon"><i class="fab fa-youtube" style="color: red;"></i></a>
        <a href="#" class="social-icon"><i class="fab fa-facebook" style="color: red;"></i></a>
    </div>
</footer>

</body>
</html>

<?php
    } else {
        // Artikel tidak ditemukan, tampilkan pesan kesalahan
        echo "Artikel tidak ditemukan.";
    }
} else {
    // Parameter id artikel tidak diteruskan, tampilkan pesan kesalahan
    echo "Parameter id artikel tidak ditemukan.";
}
?>