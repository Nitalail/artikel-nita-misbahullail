<?php
include 'connect.php';

$sql = "SELECT * FROM data_artikel";

if(isset($_GET['search'])){
    $search = $_GET['search'];
    $query2 = "SELECT * FROM data_artikel WHERE (title LIKE '%$search%') OR (category LIKE '%$search%')";
    $sql = $query2;
}

$result = mysqli_query($connect, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artikel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.75); 
            padding: 20px; 
            border-radius: 10px; 
            margin-top: 100px;
        }

        .table-container {
            margin-top: 20px;
            margin-bottom: 40px; 
        }

        @media (max-width: 768px) {
            .container {
                padding-top: 20px;
                margin-top: 20px;
            }
        }
        
td:nth-child(2) {
    text-align: left;
}

    </style>
</head>

<body>

    <div class="container bg-light bg-opacity-75 p-5 rounded-5">
        <h1 style="text-align: center; text-transform: uppercase; font-weight: bold; color: red;"> DATA ARTIKEL</h1>

        <div class="d-flex justify-content-between align-items-center">
            <a class="btn btn-success" href="create.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                    <path d="M7 0h2v16H7V0zM0 7v2h16V7H0z"/>
                </svg>
            </a>

            <form action="index.php" method="GET" class="d-flex gap-2 align-items-center">
            <input type="text" class="form-control" placeholder="Cari" name="search">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-search"></i>
            </button>
        </form>
        </div>
        <div class="table-container">
            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th scope="col" class="bg-body-secondary bg-opacity-75">NO</th>
                            <th scope="col" class="bg-body-secondary bg-opacity-75">Judul</th>
                            <th scope="col" class="bg-body-secondary bg-opacity-75">Gambar</th>
                            <th scope="col" class="bg-body-secondary bg-opacity-75">Kategori</th>
                            <th scope="col" class="bg-body-secondary bg-opacity-75">Tanggal</th>
                            <th scope="col" class="bg-body-secondary bg-opacity-75">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $plus = 1;
                        // Loop through the result set
                        while ($data = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <th scope="row" class="bg-light bg-gradient border"><?= $plus++ ?></th>
                                <td class="bg-light bg-gradient border"><?php echo $data['title']; ?></td>
                                <td class="bg-light bg-gradient border">
                                    <img src="asset/<?php echo $data['gambar']; ?>" alt="Gambar" style="max-width: 100px;">
                                </td>
                                <td class="bg-light bg-gradient border"><?php echo $data['category']; ?></td>
                                <td class="bg-light bg-gradient border"><?php echo $data['date']; ?></td>
                                <td class="bg-light bg-gradient border">
                                <div class="d-flex align-items-center justify-content-evenly">
    <a href="edit.php?id=<?= $data['id'] ?>" style="text-decoration: none;">
        <i class="fas fa-edit" style="color: orange; margin-right: 10px;"></i>
    </a>
    <a href="delete_proses.php?id=<?= $data['id'] ?>" style="text-decoration: none;">
        <i class="fas fa-trash-alt" style="color: red; margin-left: 10px;"></i>
    </a>
</div>

                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>

</html>


