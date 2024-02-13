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
    <title>Halaman Foto</title>
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

        nav {
            background-color: #007bff;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        ul {
            list-style: none;
            padding: 0;
            display: flex;
            justify-content: center;
            margin: 0;
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

        input {
            display: block;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        img {
            display: block;
            max-width: 100%;
            height: auto;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .photo-container {
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 20px;
        }

        .photo-actions {
            display: flex;
            justify-content: space-between;
        }

        .photo-actions a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .photo-actions a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Halaman Foto</h1>
    <p>Selamat datang <b><?=$_SESSION['namalengkap']?></b></p>
    
    <nav>
        <ul>
            <li><a href="../index.php">Home</a></li>
            <li><a href="../album/album.php">Album</a></li>
            <li><a href="foto.php">Foto</a></li>
            <li><a href="../logout.php">Logout</a></li>
        </ul>
    </nav>

    <form action="tambah_foto.php" method="post" enctype="multipart/form-data">
        <label>Judul</label>
        <input type="text" name="judulfoto">

        <label>Deskripsi</label>
        <input type="text" name="deskripsifoto">

        <label>Lokasi File</label>
        <input type="file" name="lokasifile">

        <label>Album</label>
        <select name="albumid">
            <?php
                include "../koneksi.php";
                $userid=$_SESSION['userid'];
                $sql=mysqli_query($conn,"select * from album where userid='$userid'");
                while($data=mysqli_fetch_array($sql)){
            ?>
                    <option value="<?=$data['albumid']?>"><?=$data['namaalbum']?></option>
            <?php
                }
            ?>
        </select>

        <input type="submit" value="Tambah">
    </form>

    <?php
        include "../koneksi.php";
        $userid=$_SESSION['userid'];
        $sql=mysqli_query($conn,"select * from foto,album where foto.userid='$userid' and foto.albumid=album.albumid");
        while($data=mysqli_fetch_array($sql)){
    ?>
            <div class="photo-container">
                <p><strong>ID:</strong> <?=$data['fotoid']?></p>
                <p><strong>Judul:</strong> <?=$data['judulfoto']?></p>
                <p><strong>Deskripsi:</strong> <?=$data['deskripsifoto']?></p>
                <p><strong>Tanggal Unggah:</strong> <?=$data['tanggalunggah']?></p>
                <img src="../gambar/<?=$data['lokasifile']?>" alt="Foto <?=$data['fotoid']?>">
                <p><strong>Album:</strong> <?=$data['namaalbum']?></p>
                <p><strong>Disukai:</strong> 
                    <?php
                        $fotoid=$data['fotoid'];
                        $sql2=mysqli_query($conn,"select * from likefoto where fotoid='$fotoid'");
                        echo mysqli_num_rows($sql2);
                    ?>
                </p>
                <div class="photo-actions">
                    <a href="hapus_foto.php?fotoid=<?=$data['fotoid']?>">Hapus</a>
                    <a href="edit_foto.php?fotoid=<?=$data['fotoid']?>">Edit</a>
                </div>
            </div>
    <?php
        }
    ?>
</body>
</html>
