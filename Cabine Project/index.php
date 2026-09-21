<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CABINE Kedai Kuncit</title>
    <style>
        :root {
            --primary-sage: #0d5c3a;
            --primary-light: #eaf2ee;
            --accent-sage: #88b099;
            --bg-canvas: #e2ece6;
            --card-bg: #ffffff;
            --text-dark: #2c3e50;
            --text-muted: #7d8c85;
            --gray-bg: #f4f6f5;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        }

        body {
            background-color: var(--bg-canvas);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 15px;
        }

        /* Container Frame Handphone */
        .mobile-frame {
            width: 100%;
            max-width: 410px;
            background: var(--card-bg);
            border-radius: 28px;
            box-shadow: 0 15px 35px rgba(13, 92, 58, 0.15);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            border: 6px solid #ffffff;
        }

        /* Header Logo */
        .app-header {
            padding: 15px 20px 10px;
            text-align: center;
            background: var(--card-bg);
            border-bottom: 1px solid var(--primary-light);
        }

        .brand-logo {
            width: 75px;
            height: auto;
            margin-bottom: 2px;
        }

        .brand-title {
            font-size: 17px;
            font-weight: 800;
            color: var(--primary-sage);
            letter-spacing: 1px;
        }

        .brand-subtitle {
            font-size: 10px;
            font-weight: bold;
            color: var(--text-muted);
            letter-spacing: 1.5px;
        }

        /* Kategori Scroll */
        .cat-scroll {
            display: flex;
            gap: 8px;
            overflow-x: auto;
            padding: 12px 15px;
            scrollbar-width: none;
        }
        .cat-scroll::-webkit-scrollbar { display: none; }

        .cat-btn {
            background: var(--gray-bg);
            color: var(--text-muted);
            padding: 7px 14px;
            border-radius: 18px;
            font-size: 11px;
            font-weight: bold;
            white-space: nowrap;
            cursor: pointer;
            transition: 0.2s;
        }

        .cat-btn.active {
            background: var(--primary-sage);
            color: white;
        }

        /* Container Menu List */
        .menu-container {
            padding: 5px 15px 20px;
            max-height: 520px;
            overflow-y: auto;
        }

        .section-label {
            font-size: 13px;
            font-weight: bold;
            color: var(--primary-sage);
            margin: 15px 0 10px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            width: 100%;
        }

        /* Grid Kartu Produk */
        .grid-layout {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        .product-card {
            background: #ffffff;
            border-radius: 14px;
            border: 1px solid var(--primary-light);
            box-shadow: 0 4px 10px rgba(0,0,0,0.03);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            cursor: pointer;
            transition: transform 0.2s;
        }

        .product-card:active {
            transform: scale(0.97);
        }

        /* Placeholder Gambar Anonim SVG */
        .img-placeholder {
            width: 100%;
            height: 120px;
            background: #f0f4f2;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .img-placeholder svg {
            width: 48px;
            height: 48px;
            fill: #a3b8ad;
        }

        .product-info {
            padding: 10px;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .product-title {
            font-size: 12px;
            font-weight: 600;
            color: var(--text-dark);
            line-height: 1.3;
            height: 32px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .product-price {
            font-size: 13px;
            font-weight: 800;
            color: var(--primary-sage);
        }

        /* Modal Order Form */
        .modal-overlay {
            display: none;
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(13, 92, 58, 0.4);
            backdrop-filter: blur(3px);
            justify-content: center;
            align-items: center;
            z-index: 999;
        }

        .modal-card {
            background: white;
            padding: 20px;
            border-radius: 18px;
            width: 88%;
            max-width: 340px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            position: relative;
        }

        .close-modal {
            position: absolute;
            right: 15px; top: 12px;
            font-size: 20px;
            cursor: pointer;
            color: var(--text-muted);
        }

        .form-group { margin-bottom: 12px; }
        .form-group label { display: block; font-size: 11px; font-weight: bold; color: var(--primary-sage); margin-bottom: 4px; }
        .form-group input, .form-group textarea, .form-group select {
            width: 100%; padding: 8px 10px; border: 1px solid var(--accent-sage); border-radius: 8px; font-size: 12px;
        }

        #qris-box {
            display: none; text-align: center; background: var(--primary-light); padding: 10px; border-radius: 8px; margin-bottom: 10px;
        }
        #qris-box img { width: 120px; }

        .btn-submit {
            width: 100%; background: var(--primary-sage); color: white; border: none; padding: 10px; border-radius: 10px; font-weight: bold; font-size: 13px; cursor: pointer;
        }
    </style>
</head>
<body>

<div class="mobile-frame">
    <!-- Header Brand Logo -->
    <div class="app-header">
        <img src="logocabine.png" alt="CABINE Logo" class="brand-logo">
        <div class="brand-title">CABINE</div>
        <div class="brand-subtitle">KEDAI KUNCIT</div>
    </div>

    <!-- Filter Kategori -->
    <div class="cat-scroll">
        <div class="cat-btn active" onclick="filterCategory('all')">Semua</div>
        <div class="cat-btn" onclick="filterCategory('makanan')">Makanan</div>
        <div class="cat-btn" onclick="filterCategory('minuman')">Minuman</div>
        <div class="cat-btn" onclick="filterCategory('cemilan')">Cemilan</div>
        <div class="cat-btn" onclick="filterCategory('tambahan')">Tambahan</div>
    </div>

    <!-- Katalog Produk Grid -->
    <div class="menu-container">
        
        <!-- MAKANAN -->
        <div class="section-label menu-cat makanan">Makanan</div>
        <div class="grid-layout menu-cat makanan">
            <div class="product-card" onclick="openOrder('Ayam Goreng', 25000)">
                <div class="img-placeholder"><svg viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg></div>
                <div class="product-info"><div class="product-title">Ayam Goreng</div><div class="product-price">Rp 25.000</div></div>
            </div>
            <div class="product-card" onclick="openOrder('Ayam Bakar', 28000)">
                <div class="img-placeholder"><svg viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg></div>
                <div class="product-info"><div class="product-title">Ayam Bakar</div><div class="product-price">Rp 28.000</div></div>
            </div>
            <div class="product-card" onclick="openOrder('Nasi Goreng Jadul', 18000)">
                <div class="img-placeholder"><svg viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg></div>
                <div class="product-info"><div class="product-title">Nasi Goreng Jadul</div><div class="product-price">Rp 18.000</div></div>
            </div>
            <div class="product-card" onclick="openOrder('Nasi Goreng Seafood', 23000)">
                <div class="img-placeholder"><svg viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg></div>
                <div class="product-info"><div class="product-title">Nasi Goreng Seafood</div><div class="product-price">Rp 23.000</div></div>
            </div>
            <div class="product-card" onclick="openOrder('Steak Ayam Crispy (Bbq/LH)', 25000)">
                <div class="img-placeholder"><svg viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg></div>
                <div class="product-info"><div class="product-title">Steak Ayam Crispy (Bbq/LH)</div><div class="product-price">Rp 25.000</div></div>
            </div>
            <div class="product-card" onclick="openOrder('Steak Ayam Spaghetti (Bbq/LH)', 30000)">
                <div class="img-placeholder"><svg viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg></div>
                <div class="product-info"><div class="product-title">Steak Ayam Spaghetti (Bbq/LH)</div><div class="product-price">Rp 30.000</div></div>
            </div>
            <div class="product-card" onclick="openOrder('Spaghetti Aglio', 18000)">
                <div class="img-placeholder"><svg viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg></div>
                <div class="product-info"><div class="product-title">Spaghetti Aglio</div><div class="product-price">Rp 18.000</div></div>
            </div>
            <div class="product-card" onclick="openOrder('Spaghetti Bolognese', 23000)">
                <div class="img-placeholder"><svg viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg></div>
                <div class="product-info"><div class="product-title">Spaghetti Bolognese</div><div class="product-price">Rp 23.000</div></div>
            </div>
            <div class="product-card" onclick="openOrder('Spaghetti Carbonara', 28000)">
                <div class="img-placeholder"><svg viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg></div>
                <div class="product-info"><div class="product-title">Spaghetti Carbonara</div><div class="product-price">Rp 28.000</div></div>
            </div>
            <div class="product-card" onclick="openOrder('Indomie Soto / Goreng', 13000)">
                <div class="img-placeholder"><svg viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg></div>
                <div class="product-info"><div class="product-title">Indomie Soto / Goreng</div><div class="product-price">Rp 13.000</div></div>
            </div>
            <div class="product-card" onclick="openOrder('Indomie Nyemek', 16000)">
                <div class="img-placeholder"><svg viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg></div>
                <div class="product-info"><div class="product-title">Indomie Nyemek</div><div class="product-price">Rp 16.000</div></div>
            </div>
            <div class="product-card" onclick="openOrder('Indomie Bangladesh', 18000)">
                <div class="img-placeholder"><svg viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg></div>
                <div class="product-info"><div class="product-title">Indomie Bangladesh</div><div class="product-price">Rp 18.000</div></div>
            </div>
        </div>

        <!-- MINUMAN -->
        <div class="section-label menu-cat minuman">Minuman</div>
        <div class="grid-layout menu-cat minuman">
            <div class="product-card" onclick="openOrder('Es Teh Kuncit (Take Away)', 5000)">
                <div class="img-placeholder"><svg viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg></div>
                <div class="product-info"><div class="product-title">Es Teh Kuncit (Take Away)</div><div class="product-price">Rp 5.000 - 8.000</div></div>
            </div>
            <div class="product-card" onclick="openOrder('Tea', 5000)">
                <div class="img-placeholder"><svg viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg></div>
                <div class="product-info"><div class="product-title">Tea</div><div class="product-price">Rp 5.000 - 7.000</div></div>
            </div>
            <div class="product-card" onclick="openOrder('Milk Tea', 7000)">
                <div class="img-placeholder"><svg viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg></div>
                <div class="product-info"><div class="product-title">Milk Tea</div><div class="product-price">Rp 7.000 - 10.000</div></div>
            </div>
            <div class="product-card" onclick="openOrder('Roasted Milk Tea', 10000)">
                <div class="img-placeholder"><svg viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg></div>
                <div class="product-info"><div class="product-title">Roasted Milk Tea</div><div class="product-price">Rp 10.000</div></div>
            </div>
            <div class="product-card" onclick="openOrder('Lemon Tea', 7000)">
                <div class="img-placeholder"><svg viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg></div>
                <div class="product-info"><div class="product-title">Lemon Tea</div><div class="product-price">Rp 7.000 - 10.000</div></div>
            </div>
            <div class="product-card" onclick="openOrder('Air Mineral', 2000)">
                <div class="img-placeholder"><svg viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg></div>
                <div class="product-info"><div class="product-title">Air Mineral</div><div class="product-price">Rp 2.000 - 5.000</div></div>
            </div>
            <div class="product-card" onclick="openOrder('Kopi O', 8000)">
                <div class="img-placeholder"><svg viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg></div>
                <div class="product-info"><div class="product-title">Kopi O</div><div class="product-price">Rp 8.000 - 12.000</div></div>
            </div>
            <div class="product-card" onclick="openOrder('Kopi Susu', 10000)">
                <div class="img-placeholder"><svg viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg></div>
                <div class="product-info"><div class="product-title">Kopi Susu</div><div class="product-price">Rp 10.000 - 15.000</div></div>
            </div>
            <div class="product-card" onclick="openOrder('Kopi Butterscotch', 17000)">
                <div class="img-placeholder"><svg viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg></div>
                <div class="product-info"><div class="product-title">Kopi Butterscotch</div><div class="product-price">Rp 17.000</div></div>
            </div>
            <div class="product-card" onclick="openOrder('Kopi Hazelnut', 17000)">
                <div class="img-placeholder"><svg viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg></div>
                <div class="product-info"><div class="product-title">Kopi Hazelnut</div><div class="product-price">Rp 17.000</div></div>
            </div>
            <div class="product-card" onclick="openOrder('Kopi Caramel', 17000)">
                <div class="img-placeholder"><svg viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg></div>
                <div class="product-info"><div class="product-title">Kopi Caramel</div><div class="product-price">Rp 17.000</div></div>
            </div>
            <div class="product-card" onclick="openOrder('Kopi Gula Aren', 17000)">
                <div class="img-placeholder"><svg viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg></div>
                <div class="product-info"><div class="product-title">Kopi Gula Aren</div><div class="product-price">Rp 17.000</div></div>
            </div>
        </div>

        <!-- CEMILAN -->
        <div class="section-label menu-cat cemilan">Cemilan</div>
        <div class="grid-layout menu-cat cemilan">
            <div class="product-card" onclick="openOrder('Dimsum Ayam', 15000)">
                <div class="img-placeholder"><svg viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg></div>
                <div class="product-info"><div class="product-title">Dimsum Ayam</div><div class="product-price">Rp 15.000</div></div>
            </div>
            <div class="product-card" onclick="openOrder('Dimsum Kepiting', 15000)">
                <div class="img-placeholder"><svg viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg></div>
                <div class="product-info"><div class="product-title">Dimsum Kepiting</div><div class="product-price">Rp 15.000</div></div>
            </div>
            <div class="product-card" onclick="openOrder('Dimsum Udang', 15000)">
                <div class="img-placeholder"><svg viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg></div>
                <div class="product-info"><div class="product-title">Dimsum Udang</div><div class="product-price">Rp 15.000</div></div>
            </div>
            <div class="product-card" onclick="openOrder('Risol Ragout', 15000)">
                <div class="img-placeholder"><svg viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg></div>
                <div class="product-info"><div class="product-title">Risol Ragout</div><div class="product-price">Rp 15.000</div></div>
            </div>
            <div class="product-card" onclick="openOrder('Piscok / Coklat Keju', 15000)">
                <div class="img-placeholder"><svg viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg></div>
                <div class="product-info"><div class="product-title">Piscok / Coklat Keju</div><div class="product-price">Rp 15.000</div></div>
            </div>
            <div class="product-card" onclick="openOrder('Pempek Lenggang', 15000)">
                <div class="img-placeholder"><svg viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg></div>
                <div class="product-info"><div class="product-title">Pempek Lenggang</div><div class="product-price">Rp 15.000</div></div>
            </div>
            <div class="product-card" onclick="openOrder('Cireng Isi', 10000)">
                <div class="img-placeholder"><svg viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg></div>
                <div class="product-info"><div class="product-title">Cireng Isi</div><div class="product-price">Rp 10.000</div></div>
            </div>
            <div class="product-card" onclick="openOrder('Tahu Walik', 10000)">
                <div class="img-placeholder"><svg viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg></div>
                <div class="product-info"><div class="product-title">Tahu Walik</div><div class="product-price">Rp 10.000</div></div>
            </div>
            <div class="product-card" onclick="openOrder('Kentang Goreng', 15000)">
                <div class="img-placeholder"><svg viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg></div>
                <div class="product-info"><div class="product-title">Kentang Goreng</div><div class="product-price">Rp 15.000</div></div>
            </div>
        </div>

        <!-- TAMBAHAN -->
        <div class="section-label menu-cat tambahan">+ Tambahan</div>
        <div class="grid-layout menu-cat tambahan">
            <div class="product-card" onclick="openOrder('Nasi', 4000)">
                <div class="img-placeholder"><svg viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg></div>
                <div class="product-info"><div class="product-title">Nasi</div><div class="product-price">Rp 4.000</div></div>
            </div>
            <div class="product-card" onclick="openOrder('Tahu Tempe', 4000)">
                <div class="img-placeholder"><svg viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg></div>
                <div class="product-info"><div class="product-title">Tahu Tempe</div><div class="product-price">Rp 4.000</div></div>
            </div>
        </div>

    </div>
</div>

<!-- Modal Direct Order -->
<div id="modalOrder" class="modal-overlay">
    <div class="modal-card">
        <span class="close-modal" onclick="closeOrder()">&times;</span>
        <h4 id="title-modal" style="color: var(--primary-sage); margin-bottom: 12px;">Detail Pesanan</h4>
        
        <form action="simpan_pesanan.php" method="POST">
            <input type="hidden" id="detail_pesanan" name="detail_pesanan">
            <input type="hidden" id="unit_price" value="0">
            <input type="hidden" id="total_harga" name="total_harga" value="0">

            <div class="form-group">
                <label>Jumlah Porsi / Gelas:</label>
                <input type="number" id="qty" value="1" min="1" onchange="calcTotal()" required>
            </div>

            <div class="form-group">
                <label>Nomor Meja:</label>
                <input type="number" id="nomor_meja" name="nomor_meja" value="<?= isset($_GET['meja']) ? htmlspecialchars($_GET['meja']) : '' ?>" placeholder="Contoh: 05" required>
            </div>

            <div class="form-group">
                <label>Request Khusus (Panas/Dingin/Pedas):</label>
                <textarea id="catatan_request" name="catatan_request" rows="2" placeholder="Contoh: Dingin (D), Es Sedikit"></textarea>
            </div>

            <div class="form-group">
                <label>Pembayaran:</label>
                <select id="metode_pembayaran" name="metode_pembayaran" onchange="toggleQRIS()" required>
                    <option value="Cash">Cash / Tunai</option>
                    <option value="QRIS">QRIS</option>
                </select>
            </div>

            <div id="qris-box">
                <p style="font-size: 10px; font-weight: bold; color: var(--primary-sage); margin-bottom: 4px;">Scan QRIS:</p>
                <img src="qris.jpeg" alt="QRIS">
            </div>

            <div style="display: flex; justify-content: space-between; font-weight: bold; margin: 12px 0;">
                <span>Total Bayar:</span>
                <span id="price-display" style="color: var(--primary-sage);">Rp 0</span>
            </div>

            <button type="submit" class="btn-submit">Kirim Pesanan Direct</button>
        </form>
    </div>
</div>

<script>
let currentItem = "";

function openOrder(name, price) {
    currentItem = name;
    document.getElementById("title-modal").innerText = "Pesan: " + name;
    document.getElementById("unit_price").value = price;
    document.getElementById("qty").value = 1;
    calcTotal();
    document.getElementById("modalOrder").style.display = "flex";
}

function closeOrder() {
    document.getElementById("modalOrder").style.display = "none";
}

function calcTotal() {
    let q = parseInt(document.getElementById("qty").value) || 1;
    let p = parseInt(document.getElementById("unit_price").value) || 0;
    let total = q * p;

    document.getElementById("detail_pesanan").value = `${q}x ${currentItem}`;
    document.getElementById("total_harga").value = total;
    document.getElementById("price-display").innerText = "Rp " + total.toLocaleString('id-ID');
}

function toggleQRIS() {
    let method = document.getElementById("metode_pembayaran").value;
    document.getElementById("qris-box").style.display = (method === "QRIS") ? "block" : "none";
}

function filterCategory(cat) {
    let elements = document.querySelectorAll('.menu-cat');
    let buttons = document.querySelectorAll('.cat-btn');

    buttons.forEach(btn => btn.classList.remove('active'));
    event.target.classList.add('active');

    elements.forEach(el => {
        if (cat === 'all' || el.classList.contains(cat)) {
            el.style.display = el.classList.contains('grid-layout') ? 'grid' : 'block';
        } else {
            el.style.display = 'none';
        }
    });
}
</script>

</body>
</html>