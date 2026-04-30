<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $items = $_POST['item'];
    $totalBelanja = 0;
    $strukData = [];

    foreach ($items as $nama => $detail) {
        $qty = intval($detail['qty']);
        $harga = intval($detail['harga']);
        if ($qty > 0) {
            $subtotal = $qty * $harga;
            $totalBelanja += $subtotal;
            $strukData[] = [
                'nama' => $nama,
                'qty' => $qty,
                'harga' => $harga,
                'subtotal' => $subtotal
            ];
        }
    }

    if (empty($strukData)) {
        echo "<script>alert('Pilih minimal 1 produk!'); window.location='index.php';</script>";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Struk Pembayaran</title>
    <style>
        body { font-family: 'Courier New', Courier, monospace; background: #eee; padding: 20px; }
        .struk { background: white; width: 300px; margin: auto; padding: 15px; border: 1px solid #ccc; box-shadow: 0 0 5px rgba(0,0,0,0.1); }
        .header { text-align: center; border-bottom: 1px dashed #000; padding-bottom: 10px; margin-bottom: 10px; }
        .item { display: flex; justify-content: space-between; font-size: 0.9em; margin-bottom: 5px; }
        .total { border-top: 1px dashed #000; margin-top: 10px; padding-top: 10px; font-weight: bold; }
        .btn-print { display: block; width: 100%; margin-top: 20px; padding: 10px; background: #2ecc71; color: white; border: none; cursor: pointer; text-align: center; text-decoration: none; }
        @media print { .btn-print { display: none; } body { background: white; } }
    </style>
</head>
<body>

<div class="struk">
    <div class="header">
        <strong>TOKO FASHION UTS</strong><br>
        Jl. Universitas Nias Raya<br>
        Tgl: <?php echo date("d/m/Y H:i"); ?>
    </div>

    <?php foreach ($strukData as $item): ?>
    <div class="item">z
        <span><?php echo $item['nama']; ?> (x<?php echo $item['qty']; ?>)</span>
        <span>Rp <?php echo number_format($item['subtotal'], 0, ',', '.'); ?></span>
    </div>
    <?php endforeach; ?>

    <div class="total">
        <div class="item">
            <span>TOTAL</span>
            <span>Rp <?php echo number_format($totalBelanja, 0, ',', '.'); ?></span>
        </div>
    </div>

    <div class="header" style="border-top: 1px dashed #000; margin-top: 10px; border-bottom: none;">
        Terima Kasih Atas Kunjungan Anda!
    </div>

    <button onclick="window.print()" class="btn-print">Klik untuk Cetak Struk</button>
    <a href="index.php" class="btn-print" style="background: #e74c3c;">Kembali Belanja</a>
</div>

</body>
</html>
