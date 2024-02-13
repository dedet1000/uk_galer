<?php
    include "../koneksi.php";
    session_start();

    $fotoid = $_GET['fotoid'];

    // Retrieve foto data from database to get the file path
    $query = mysqli_query($conn, "SELECT * FROM foto WHERE fotoid='$fotoid'");
    $fotoData = mysqli_fetch_assoc($query);

    if ($fotoData) {
        // Delete the foto record from the database
        $sql = mysqli_query($conn, "DELETE FROM foto WHERE fotoid='$fotoid'");
        if ($sql) {
            // Define the file path
            $filePath = "../gambar/" . $fotoData['lokasifile'];

            // Check if the file exists and attempt to delete it
            if (file_exists($filePath)) {
                if (unlink($filePath)) {
                    // Redirect back to foto.php after successful deletion
                    header("location:foto.php");
                    exit();
                } else {
                    echo "Gagal menghapus file foto.";
                }
            } else {
                echo "File foto tidak ditemukan.";
            }
        } else {
            echo "Gagal menghapus data foto dari database.";
        }
    } else {
        echo "Foto tidak ditemukan dalam database.";
    }
?>
