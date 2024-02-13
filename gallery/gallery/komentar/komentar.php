

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
    <title>Halaman Komentar</title>
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
            background-color: #007bff;
            border-radius: 5px;
            padding: 10px;
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
            margin-top: 20px;
            margin-bottom: 20px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        input,
        img {
            display: block;
            margin-bottom: 10px;
            width: 100%;
            padding: 8px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
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

        .comments {
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .comment {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            background-color: #ffffff;
        }
    </style>
</head>
<body>
    <h1>Halaman Komentar</h1>
    <p>Selamat datang <b><?=$_SESSION['namalengkap']?></b></p>
    
    <ul>
        <li><a href="../index.php">Home</a></li>
        <li><a href="../album/album.php">Album</a></li>
        <li><a href="../foto/foto.php">Foto</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>

    <form action="tambah_komentar.php" method="post">
        <?php
            include "../koneksi.php";
            $fotoid=$_GET['fotoid'];
            $sql=mysqli_query($conn,"select * from foto where fotoid='$fotoid'");
            while($data=mysqli_fetch_array($sql)){
        ?>
        <!-- <input type="text" name="fotoid" value="<?=$data['fotoid']?>" hidden> -->
        <p><?=$data['fotoid']?></p>
        
        <label for="judul">Judul</label>
        <!-- <input type="text" name="judulfoto" value="<?=$data['judulfoto']?>" id="judul"> -->
        <p><?=$data['judulfoto']?></p>

        <label for="deskripsi">Deskripsi</label>
        <!-- <input type="text" name="deskripsifoto" value="<?=$data['deskripsifoto']?>" id="deskripsi"> -->
        <p><?=$data['deskripsifoto']?></p>

        <img src="../gambar/<?=$data['lokasifile']?>" width="100%" alt="Foto">

        <label for="komentar">Komentar</label>
        <input type="text" name="isikomentar" id="komentar">

        <input type="submit" value="Tambah">
        <?php
            }
        ?>
    </form>

    <div class="comments">
        <?php
            $userid=$_SESSION['userid'];
            // $sql=mysqli_query($conn,"select * from komentarfoto,user where komentarfoto.userid=user.userid");
        
            while($data=mysqli_fetch_array($sql)){
        ?>
            <div class="comment">
                <p>ID: <?=$data['komentarid']?></p>
                <p>Nama: <?=$data['namalengkap']?></p>
                <p>Komentar: <?=$data['isikomentar']?></p>
                <p>Tanggal: <?=$data['tanggalkomentar']?></p>
            </div>
        <?php
            }
        ?>
    </div>
</body>
</html>