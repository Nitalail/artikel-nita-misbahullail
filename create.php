<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Artikel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            background-position: center;
            background-color: #f0f0f0;
            background-repeat: no-repeat;
            background-size: cover;
            font-family: 'Roboto', sans-serif; /* Mengubah font */
        }
        .container-fluid {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .form-container {
            max-width: 500px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
        }
        .form-label {
            font-weight: bold;
        }
        .btn {
            margin-top: 10px;
        }
        .title-font {
    font-family: 'Nunito', cursive; /* Mengubah font judul */
}

    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="form-container">
        <h1 class="fw-bold text-uppercase text-center mb-4 title-font">Tambah Artikel</h1>

            <form action="create_proses.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="title" class="form-label">Judul</label>
                    <input type="text" class="form-control" name="title" required>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Isi Artikel</label>
                    <textarea class="form-control" name="content" rows="5" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar</label>
                    <input type="file" class="form-control" name="gambar" required>
                </div>
                <div class="mb-3">
    <label for="category" class="form-label">Kategori</label>
    <select class="form-control" name="category" required>
        <option value="">Pilih Kategori</option>
        <option value="Teknologi">Teknologi</option>
        <option value="Kesehatan">Kesehatan</option>
        <option value="Pendidikan">Pendidikan</option>
        <option value="Hiburan">Hiburan</option>
        <option value="Olahraga">Olahraga</option>
    </select>
</div>


                <button type="submit" class="btn btn-success">Submit</button>
                <a href="index.php" class="btn btn-primary">Kembali</a>
            </form>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
