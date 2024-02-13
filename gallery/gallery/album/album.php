<?php
    session_start();
    if(!isset($_SESSION['userid'])){
        header("location:../login/login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Album</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #343a40;
            margin-bottom: 20px;
        }

        p {
            color: #495057;
        }

        ul {
            list-style: none;
            padding: 0;
            display: flex;
            justify-content: center;
            margin: 0;
            margin-bottom: 20px;
            background-color: #007bff;
            padding: 10px;
            border-radius: 5px;
        }

        li {
            margin-right: 20px;
        }

        a {
            text-decoration: none;
            color: #ffffff;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #0056b3;
        }

        form {
            margin-bottom: 20px;
        }

        .album-container {
            border: 1px solid #dee2e6;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .album-container p {
            margin: 5px 0;
        }

        .action-links a {
            margin-right: 10px;
            color: #007bff;
            font-weight: bold;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .action-links a:hover {
            color: #0056b3;
        }

        .form-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 80px 30px;
            background-color: #ffffff;
            margin-bottom: 50px;
            box-shadow:5px 5px 15px #888888;
            border-radius: 4px;
        }

        input[type="text"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Halaman Album</h1>
    <p>Selamat datang <b><?=$_SESSION['namalengkap']?></b></p>
    
    <ul>
        <li><a href="../index.php">Home</a></li>
        <li><a href="album.php">Album</a></li>
        <li><a href="../foto/foto.php">Foto</a></li>
        <li><a href="../logout.php">Logout</a></li>
    </ul>

    <div class="form-container">
        <h2>
            New Album
        </h2>
        <form action="tambah_album.php" method="post">
            <table>
                    <tr>
                    <td><label>Nama Album</label></td>
                    <td>  <input type="text" name="namaalbum"></td>
                </tr>
                <tr>
                    <td><label>Deskripsi</label></td>
                    <td><input type="text" name="deskripsi"></td>
                </tr>
            </table>
            
          
            <input type="submit" value="Tambah">
        </form>
    </div>

    <?php
        include "../koneksi.php";
        $userid=$_SESSION['userid'];
        $sql=mysqli_query($conn,"select * from album where userid='$userid'");
    ?>
    
    <?php while($data=mysqli_fetch_array($sql)): ?>
        <div class="album-container">

            <p><strong>ID:</strong> <?=$data['albumid']?></p>
            <p><strong>Nama:</strong> <?=$data['namaalbum']?></p>
            <p><strong>Deskripsi:</strong> <?=$data['deskripsi']?></p>
            <p><strong>Tanggal dibuat:</strong> <?=$data['tanggaldibuat']?></p>
            <div class="action-links">
                <a href="hapus_album.php?albumid=<?=$data['albumid']?>">Hapus</a>
                <a href="edit_album.php?albumid=<?=$data['albumid']?>">Edit</a>
            </div>
        </div>
    <?php endwhile; ?>
</body>
</html>
