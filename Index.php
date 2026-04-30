<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion Store - UTS Web</title>
    <style>
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            background: #e74c3c; /* Latar belakang merah */
            margin: 0; 
            padding: 20px; 
        }

        .container { 
            max-width: 1000px; 
            margin: auto; 
            background: white; 
            padding: 20px; 
            border-radius: 10px; 
            box-shadow: 0 4px 15px rgba(0,0,0,0.2); 
        }

        h1 { text-align: center; color: #333; }

        .menu-icons { 
            display: flex; 
            justify-content: center; 
            gap: 20px; 
            margin-bottom: 30px; 
        }

        .icon-btn { 
            cursor: pointer; 
            text-align: center; 
            padding: 10px; 
            border: 1px solid #ddd; 
            border-radius: 8px; 
            transition: 0.3s; 
            width: 80px; 
            background: #fff;
        }

        .icon-btn:hover { background: #f0f0f0; border-color: #333; }

        .produk-container { 
            display: grid; 
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); 
            gap: 20px; 
        }

        .card { 
            border: 1px solid #eee; 
            padding: 15px; 
            text-align: center; 
            border-radius: 10px; 
            background: #fff;
            transition: transform 0.2s;
        }

        .card:hover { transform: translateY(-5px); }

        /* Pengaturan Gambar Produk */
        .card img { 
            width: 100%; 
            height: 180px; 
            object-fit: cover; /* Agar gambar rapi tidak gepeng */
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .card h3 { font-size: 1.1em; margin: 10px 0; }
        .price { color: #27ae60; font-weight: bold; display: block; margin-bottom: 10px; }

        .btn-beli { 
            background: #2980b9; 
            color: white; 
            border: none; 
            padding: 15px 30px; 
            border-radius: 5px; 
            cursor: pointer; 
            font-size: 1.2em;
            width: 100%;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Katalog Produk Fashion</h1>
    
    <div class="menu-icons">
        <div class="icon-btn" onclick="filterProduk('semua')">🌐<br>Semua</div>
        <div class="icon-btn" onclick="filterProduk('baju')">👕<br>Baju</div>
        <div class="icon-btn" onclick="filterProduk('celana')">👖<br>Celana</div>
        <div class="icon-btn" onclick="filterProduk('topi')">🧢<br>Topi</div>
        <div class="icon-btn" onclick="filterProduk('sepatu')">👟<br>Sepatu</div>
    </div>

    <form action="proses_bayar.php" method="POST">
        <div class="produk-container" id="daftarProduk">
            
            <div class="card" data-category="baju">
                <img src="https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?q=80&w=500" alt="Baju">
                <h3>Kaos Polos Premium</h3>
                <p class="price">Rp 75.000</p>
                Qty: <input type="number" name="item[Kaos Polos Premium][qty]" value="0" min="0" style="width: 40px;">
                <input type="hidden" name="item[Kaos Polos Premium][harga]" value="75000">
            </div>

            <div class="card" data-category="celana">
                <img src="https://images.unsplash.com/photo-1542272604-787c3835535d?q=80&w=500" alt="Celana">
                <h3>Jeans Slim Fit</h3>
                <p class="price">Rp 150.000</p>
                Qty: <input type="number" name="item[Jeans Slim Fit][qty]" value="0" min="0" style="width: 40px;">
                <input type="hidden" name="item[Jeans Slim Fit][harga]" value="150000">
            </div>

            <div class="card" data-category="topi">
                <img src="https://images.unsplash.com/photo-1588850561407-ed78c282e89b?q=80&w=500" alt="Topi">
                <h3>Topi Baseball Classic</h3>
                <p class="price">Rp 45.000</p>
                Qty: <input type="number" name="item[Topi Baseball Classic][qty]" value="0" min="0" style="width: 40px;">
                <input type="hidden" name="item[Topi Baseball Classic][harga]" value="45000">
            </div>

            <div class="card" data-category="sepatu">
                <img src="https://images.unsplash.com/photo-1549298916-b41d501d3772?q=80&w=500" alt="Sepatu">
                <h3>Sneakers Putih</h3>
                <p class="price">Rp 350.000</p>
                Qty: <input type="number" name="item[Sneakers Putih][qty]" value="0" min="0" style="width: 40px;">
                <input type="hidden" name="item[Sneakers Putih][harga]" value="350000">
            </div>
        </div>

        <div style="text-align: right; margin-top: 30px;">
            <button type="submit" class="btn-beli">Proses Pembayaran & Cetak</button>
        </div>
    </form>
</div>

<script>
    function filterProduk(kategori) {
        const cards = document.querySelectorAll('.card');
        cards.forEach(card => {
            if (kategori === 'semua' || card.getAttribute('data-category') === kategori) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }
</script>

</body>
</html>
