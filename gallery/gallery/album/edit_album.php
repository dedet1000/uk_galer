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
    <title>Halaman Edit Album</title>
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

        input {
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 3px;
            border: 1px solid #ced4da;
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
        .for{
            background-color: #ffffff;
            margin: auto;
            padding: 10px 30px;
            border-radius: 4PX;
            box-shadow:0 0 10px #a2a2a2;
        }
    </style>
</head>
<body>
    <h1>Halaman Edit Album</h1>
    <p>Selamat datang <b><?=$_SESSION['namalengkap']?></b></p>
    
    <ul>
        <li><a href="../index.php">Home</a></li>
        <li><a href="album.php">Album</a></li>
        <li><a href="../foto/foto.php">Foto</a></li>
        <li><a href="../logout.php">Logout</a></li>
    </ul>

    <form action="update_album.php" method="post">
        <?php
            include "../koneksi.php";
            $albumid=$_GET['albumid'];
            $sql=mysqli_query($conn,"select * from album where albumid='$albumid'");
            while($data=mysqli_fetch_array($sql)){
        ?>
        
        <input type="text" name="albumid" value="<?=$data['albumid']?>" hidden>
        <table class="for">
            <tr>
                <td><label>Nama Album</label></td>
                <td> <input type="text" name="namaalbum" value="<?=$data['namaalbum']?>"></td>
            </tr>
            <tr>
                <td> <label>Deskripsi</label></td>
                    <td><input type="text" name="deskripsi" value="<?=$data['deskripsi']?>">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Ubah">
                </td>
            </tr>
            
        </table>
        
       
        
       
        
        
        <?php
            }
        ?>
    </form>
</body>
</html>
