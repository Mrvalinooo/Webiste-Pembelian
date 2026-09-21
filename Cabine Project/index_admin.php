<?php
// 1. Hubungkan ke database
include 'koneksi.php';

// 2. Fitur untuk mengubah status pesanan jadi "Selesai"
if (isset($_GET['action']) && $_GET['action'] == 'selesai' && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    mysqli_query($conn, "UPDATE pesanan SET status='Selesai' WHERE id=$id");
    header("Location: index_admin.php");
    exit();
}

// 3. FITUR BARU: Menghapus pesanan dari database
if (isset($_GET['action']) && $_GET['action'] == 'hapus' && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    mysqli_query($conn, "DELETE FROM pesanan WHERE id=$id");
    header("Location: index_admin.php");
    exit();
}

// 4. Ambil data pesanan dari database
$query = "SELECT * FROM pesanan ORDER BY id DESC";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="5">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Kasir - CABINE Kedai Kuncit</title>
    <style>
        :root {
            --primary-sage: #0d5c3a;
            --primary-light: #eaf2ee;
            --accent-sage: #88b099;
            --bg-canvas: #f4f7f5;
            --text-dark: #2c3e50;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        }

        body {
            background-color: var(--bg-canvas);
            color: var(--text-dark);
            padding: 20px;
        }

        .header-panel {
            background: white;
            padding: 20px;
            border-radius: 14px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 10px;
        }

        .brand-title {
            font-size: 20px;
            font-weight: 800;
            color: var(--primary-sage);
        }

        .refresh-info {
            font-size: 12px;
            color: #7d8c85;
            background: var(--primary-light);
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: bold;
        }

        .table-responsive {
            background: white;
            border-radius: 14px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            font-size: 14px;
        }

        th {
            background-color: var(--primary-sage);
            color: white;
            padding: 14px;
            font-weight: 600;
            white-space: nowrap;
        }

        td {
            padding: 14px;
            border-bottom: 1px solid var(--primary-light);
            vertical-align: middle;
        }

        tr:hover {
            background-color: #f9fbf0;
        }

        .table-number {
            font-size: 16px;
            font-weight: 800;
            color: var(--primary-sage);
            background: var(--primary-light);
            padding: 4px 10px;
            border-radius: 8px;
            display: inline-block;
        }

        .badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: bold;
            font-size: 11px;
            display: inline-block;
            text-transform: uppercase;
        }

        .badge-pending {
            background: #ffeaa7;
            color: #d63031;
        }

        .badge-selesai {
            background: #e1f5fe;
            color: #0288d1;
        }

        .badge-qris {
            background: #e8f5e9;
            color: #2e7d32;
        }

        .badge-cash {
            background: #fff3e0;
            color: #ef6c00;
        }

        .btn {
            padding: 8px 14px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 12px;
            font-weight: bold;
            color: white;
            transition: 0.2s;
            display: inline-block;
        }

        .btn-success {
            background: #2ed573;
        }

        .btn-success:hover {
            background: #26af5f;
        }

        .btn-danger {
            background: #ff4757;
        }

        .btn-danger:hover {
            background: #ff6b81;
        }

        .btn-disabled {
            background: #b2bec3;
            cursor: not-allowed;
        }

        .action-group {
            display: flex;
            gap: 6px;
        }
    </style>
</head>
<body>

    <div class="header-panel">
        <div>
            <div class="brand-title"> Dashboard Kasir - CABINE</div>
        </div>
        <div class="refresh-info">
            Auto-refresh (5s)
        </div>
    </div>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Waktu</th>
                    <th>Meja</th>
                    <th>Detail Pesanan</th>
                    <th>Request Khusus</th>
                    <th>Total Bayar</th>
                    <th>Pembayaran</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result && mysqli_num_rows($result) > 0) { ?>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?= date('H:i:s', strtotime($row['waktu'])) ?></td>
                            <td><span class="table-number">Meja <?= htmlspecialchars($row['nomor_meja']) ?></span></td>
                            <td><strong><?= htmlspecialchars($row['detail_pesanan']) ?></strong></td>
                            <td><?= htmlspecialchars($row['catatan_request'] ?: '-') ?></td>
                            <td style="font-weight: bold; color: var(--primary-sage);">
                                Rp <?= number_format($row['total_harga'], 0, ',', '.') ?>
                            </td>
                            <td>
                                <span class="badge <?= $row['metode_pembayaran'] == 'QRIS' ? 'badge-qris' : 'badge-cash' ?>">
                                    <?= htmlspecialchars($row['metode_pembayaran']) ?>
                                </span>
                            </td>
                            <td>
                                <span class="badge <?= $row['status'] == 'Pending' ? 'badge-pending' : 'badge-selesai' ?>">
                                    <?= htmlspecialchars($row['status']) ?>
                                </span>
                            </td>
                            <td>
                                <div class="action-group">
                                    <?php if ($row['status'] == 'Pending') { ?>
                                        <a href="index_admin.php?action=selesai&id=<?= $row['id'] ?>" class="btn btn-success">Selesaikan</a>
                                    <?php } else { ?>
                                        <span class="btn btn-disabled">Selesai</span>
                                    <?php } ?>
                                    
                                    <!-- Tombol Hapus dengan Konfirmasi Konfirmasi Alert -->
                                    <a href="index_admin.php?action=hapus&id=<?= $row['id'] ?>" 
                                       class="btn btn-danger" 
                                       onclick="return confirm('Apakah kamu yakin ingin menghapus pesanan ini?')">Hapus</a>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="8" style="text-align: center; padding: 30px; color: #7d8c85;">
                            Belum ada pesanan masuk saat ini.
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>
</html>