<?php

include 'connect.php';
include 'sidebar.php';
$sql = "SELECT * FROM data_artikel";

$result = mysqli_query($connect, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<br>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artikel</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  
    <style>

.container {
            margin-bottom: 120px;
}
      .card {
    border: 1px solid #ccc;
    border-radius: 8px;
    margin: 16px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    background-color: #f9f9f9;
    max-width: 1500px; 
    display: flex;
    flex-direction: row; 
    transition: background-color 0.3s, box-shadow 0.3s;
}

.card:hover {
    background-color: #fff;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.card-img-container {
    flex: 0 0 40%; 
    padding: 16px;
    max-width: 250px;
}

.card-img-container img {
    border-radius: 8px; /* Membuat gambar memiliki sudut yang melengkung */
    max-width: 100%; 
    height: auto;
}

.card-content {
    flex: 1;
    padding: 16px;
}

.card-title {
    margin-bottom: 5px;
    font-size: 25px;
    
}

.card-info {
    font-size: 14px;
    margin-bottom: 25px;
    color: #888;
}

.btn-primary {
    margin-top: auto; 
    color:#FF0000;
}
        
        .footer {
            background-color: #f9f9f9;
            text-align: center;
            padding: 20px;
            width: 100%;
            position: fixed;
            bottom: 0;
            
        }
        .social-icons {
    display: flex; 
    justify-content: center; 
    margin-top: 20px; 
    margin: 0 10px;
    
}

    </style>
</head>

<body>
    <div class="container">
    <h1 style="text-align: center; text-transform: uppercase; font-weight: bold; color: red; font-size: 45px;">ARTIKEL</h1>

<br>
        <?php
        
        // Loop through the result set
        while ($data = mysqli_fetch_assoc($result)) {
            // Ambil tanggal dan waktu dari kolom "date"
            $upload_date = strtotime($data['date']);
            // Format tanggal dan waktu
            $formatted_date = date("d F Y, H:i", $upload_date);
        ?>
            <div class="card">
                <div class="card-img-container">
                    <img src="asset/<?php echo $data['gambar']; ?>" alt="Gambar Artikel">
                </div>
                <div class="card-content">
                    <h5 class="card-title"><?php echo $data['title']; ?></h5>
                    <p class="card-info"><?php echo $formatted_date; ?></p>
                    <a href="detail.php?id=<?php echo $data['id']; ?>" class="btn btn-primary" style="text-decoration: none;">Lihat Detail</a>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    
    <footer class="footer">
    <p>&copy; <?php echo date("Y"); ?>Nita Misbahullail</p>
    <div class="social-icons" style="text-align: center;">
    <a href="#" class="social-icon" style="margin-right: 10px;"><i class="fab fa-twitter" style="color: red;"></i></a>
    <a href="#" class="social-icon" style="margin-right: 10px;"><i class="fab fa-whatsapp" style="color: red;"></i></a>
    <a href="#" class="social-icon" style="margin-right: 10px;"><i class="fab fa-instagram" style="color: red;"></i></a>
    <a href="#" class="social-icon" style="margin-right: 10px;"><i class="fab fa-youtube" style="color: red;"></i></a>
    <a href="#" class="social-icon"><i class="fab fa-facebook" style="color: red;"></i></a>
</div>

</footer>

</body>
</html>
</body>

</html>