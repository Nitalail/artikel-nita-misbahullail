<?php
include 'connect.php';
include 'sidebar.php';

// Terima parameter kategori dari URL
$kategori = isset($_GET['kategori']) ? $_GET['kategori'] : '';

$query = "SELECT * FROM data_artikel WHERE category=?";
$stmt = mysqli_prepare($connect, $query);
mysqli_stmt_bind_param($stmt, "s", $kategori);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

mysqli_stmt_close($stmt);
mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artikel</title>
    <link rel="stylesheet" href="style.css">
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
  border-radius: 8px; 
  max-width: 100%; 
  height: auto;
}

.card-content {
  flex: 1;
  padding: 16px;
}

.card-title {
  margin-bottom: 0px;
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
<div class="container bg-light bg-opacity-75 p-5 rounded-5" style="padding-top: 100px; margin-top: -25px; margin-bottom: 100px;">
    
        <?php while ($data = mysqli_fetch_assoc($result)): ?>
            <div class="card">
                <div class="card-img-container">
                    <img src="asset/<?php echo $data['gambar']; ?>" alt="Gambar Artikel">
                </div>
                <div class="card-content">
                    <h5 class="card-title"><?php echo $data['title']; ?></h5>
                    <p class="card-info">16 menit yang lalu</p>
                    <a href="detail.php?id=<?php echo $data['id']; ?>" class="btn btn-primary">Lihat Detail</a>
                </div>
            </div>
        <?php endwhile; ?>
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
