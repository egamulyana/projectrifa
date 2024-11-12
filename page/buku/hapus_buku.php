<?php
// Pastikan koneksi ke database sudah ada
$koneksi = new mysqli("localhost","root","","db_perpustakaan");

// Cek apakah parameter id ada
if (isset($_GET['id'])) {
    // Ambil id_buku dari URL
    $id_buku = $_GET['id'];

    // Query untuk menghapus buku berdasarkan id_buku
    $sql = "DELETE FROM tb_buku WHERE id = ?";

    // Persiapkan statement
    if ($stmt = $koneksi->prepare($sql)) {
        // Ikat parameter dan eksekusi
        $stmt->bind_param('i', $id_buku); // 'i' untuk integer
        if ($stmt->execute()) {
            // Redirect ke halaman daftar buku setelah penghapusan berhasil
            header("Location: index.php?page=buku"); // Ganti dengan halaman yang sesuai
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "Error: " . $koneksi->error;
    }
} else {
    echo "ID Buku tidak ditemukan.";
}

ini_set('display_errors', 1);
error_reporting(E_ALL);

?>
