<?php
    session_start();
    if (!isset($_SESSION['userid'])) {
        header("location: login/login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Home</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        nav {
            background-color: #007bff;
            width: 100%;
            padding: 15px 0;
            position: fixed;
            top: 0;
            z-index: 1000;
        }

        ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        li {
            margin-right: 20px;
        }

        a {
            text-decoration: none;
            color: #ffffff;
            font-weight: bold;
            transition: color 0.3s ease;
            font-size: 16px;
        }

        a:hover {
            color: #0056b3;
        }

        h1 {
            color: #343a40;
            margin-top: 80px;
        }

        p {
            color: #495057;
            margin-bottom: 40px;
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

    <h1>Halaman Home</h1>
    <p>Selamat datang, <b><?=$_SESSION['namalengkap']?></b></p>
</body>
</html>
