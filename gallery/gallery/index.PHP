<?php
    session_start();
    include "koneksi.php";

    // Redirect to login if user is not logged in
    if (!isset($_SESSION['userid'])) {
        header("location: login/login.php");
        exit();
    }

    // Fetch user data for logged-in users
    $userdata = [];
    if (isset($_SESSION['namalengkap'])) {
        $userdata['namalengkap'] = $_SESSION['namalengkap'];
    }

    // Fetch photos data
    $photos = [];
    $sql = "SELECT foto.fotoid, foto.judulfoto, foto.deskripsifoto, foto.lokasifile, user.namalengkap
            FROM foto
            INNER JOIN user ON foto.userid = user.userid";
    $result = mysqli_query($conn, $sql);

    while ($data = mysqli_fetch_assoc($result)) {
        $fotoid = $data['fotoid'];
        $likesCount = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM likefoto WHERE fotoid='$fotoid'"));

        $data['likesCount'] = $likesCount;
        $photos[] = $data;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Landing</title>
    <style>
        /* Your existing styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        nav {
            width: 100%;
            background-color: #007bff;
            padding: 10px 0;
            position: fixed;
            top: 0;
            z-index: 1000;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }

         nav ul li {
            margin-right: 20px;
        }

        nav ul li a {
            text-decoration: none;
            color: white;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #0056b3;
        }

        h1 {
            color: #343a40;
            margin: 20px 0;
        }

        .content-container {
            max-width: 800px;
            margin: 40px auto;
        }

        /* Style for the photo container */
        .photo-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px; /* Spasi antara kartu foto */
        }

        /* Style for each photo card */
        .photo-card {
            border: 1px solid #dee2e6;
            width: 300px; /* Lebar kartu foto */
            margin-bottom: 20px;
        }

        .action-links {
            margin-top: 10px;
            margin-bottom: 10px;
            display: flex;
            justify-content: left;
        }

        .action-links a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
            margin-right: 10px;
            padding: 5px 10px;
            border: 1px solid #007bff;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .action-links a:hover {
            background-color: #007bff;
            color: white;
        }

        img {
            max-width: 100%;
            height: auto;
            display: block;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="album/album.php">Album</a></li>
            <li><a href="foto/foto.php">Foto</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <div class="content-container">
        <h1>Halaman Web Gale</h1>

        <?php if (empty($userdata)): ?>
            <ul>
                <li><a href="register/register.php">Register</a></li>
                <li><a href="login/login.php">Login</a></li>
            </ul>
        <?php else: ?>
            <p>Selamat datang, <b><?= $userdata['namalengkap'] ?></b></p>
        <?php endif; ?>

        <div class="photo-container">
            <?php foreach ($photos as $photo): ?>
                <div class="photo-card">
                    <!-- <p><strong>ID:</strong> <?= $photo['fotoid'] ?></p>
                    <p><strong>Judul:</strong> <?= $photo['judulfoto'] ?></p>
                    <p><strong>Deskripsi:</strong> <?= $photo['deskripsifoto'] ?></p>
                    <p><strong>Uploader:</strong> <?= $photo['namalengkap'] ?></p>
                    <p><strong>Jumlah Like:</strong> <?= $photo['likesCount'] ?></p> -->
                    
                    <img src="gambar/<?= $photo['lokasifile'] ?>" alt="Foto <?= $photo['fotoid'] ?>">
                    <div class="action-links">
                        <a class="like" href="like.php?fotoid=<?= $photo['fotoid'] ?>">Like</a>
                        <a class="komentar" href="komentar/komentar.php?fotoid=<?= $photo['fotoid'] ?>">Komentar</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
