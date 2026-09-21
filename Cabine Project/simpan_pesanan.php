<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $detail_pesanan   = mysqli_real_escape_string($conn, $_POST['detail_pesanan']);
    $total_harga      = (int)$_POST['total_harga'];
    $nomor_meja       = mysqli_real_escape_string($conn, $_POST['nomor_meja']);
    $catatan_request  = mysqli_real_escape_string($conn, $_POST['catatan_request']);
    $metode_pembayaran= mysqli_real_escape_string($conn, $_POST['metode_pembayaran']);

    $query = "INSERT INTO pesanan (nomor_meja, detail_pesanan, total_harga, catatan_request, metode_pembayaran, status) 
              VALUES ('$nomor_meja', '$detail_pesanan', '$total_harga', '$catatan_request', '$metode_pembayaran', 'Pending')";
    
    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('Pesanan berhasil dikirim!');
                window.location.href = 'index.php';
              </script>";
    } else {
        echo "Gagal menyimpan pesanan: " . mysqli_error($conn);
    }
}
?>