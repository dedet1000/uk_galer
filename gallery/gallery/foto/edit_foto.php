<?php
    session_start();
    if (!isset($_SESSION['userid'])) {
        header("location:../login/login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Edit Foto</title>
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
        }

        input {
            display: block;
            margin-bottom: 10px;
            width: 100%;
            padding: 8px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
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

        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <h1>Halaman Edit Foto</h1>
    <p>Selamat datang <b><?=$_SESSION['namalengkap']?></b></p>
    
    <ul>
        <li><a href="../index.php">Home</a></li>
        <li><a href="../album/album.php">Album</a></li>
        <li><a href="foto.php">Foto</a></li>
        <li><a href="../logout.php">Logout</a></li>
    </ul>

    <form action="update_foto.php" method="post" enctype="multipart/form-data">
        <?php
            include "../koneksi.php";
            $fotoid=$_GET['fotoid'];
            $sql=mysqli_query($conn,"select * from foto where fotoid='$fotoid'");
            while($data=mysqli_fetch_array($sql)){
        ?>
        <input type="text" name="fotoid" value="<?=$data['fotoid']?>" hidden>
        
        <label for="judul">Judul</label>
        <input type="text" name="judulfoto" value="<?=$data['judulfoto']?>" id="judul">

        <label for="deskripsi">Deskripsi</label>
        <input type="text" name="deskripsifoto" value="<?=$data['deskripsifoto']?>" id="deskripsi">

        <label for="lokasi">Lokasi File</label>
        <input type="file" name="lokasifile" id="lokasi">

        <label for="album">Album</label>
        <select name="albumid" id="album">
            <?php
                $userid=$_SESSION['userid'];
                $sql2=mysqli_query($conn,"select * from album where userid='$userid'");
                while($data2=mysqli_fetch_array($sql2)){
            ?>
                    <option value="<?=$data2['albumid']?>" <?php if($data2['albumid']==$data['albumid']){echo 'selected';}?>><?=$data2['namaalbum']?></option>
            <?php
                }
            ?>
        </select>

        <input type="submit" value="Ubah">
        <?php
            }
        ?>
    </form>
</body>
</html>
