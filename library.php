<?php
$current = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Plant Library</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
    body {
        background: #edf5ed;
        font-family: 'Poppins', sans-serif;
    }

    .app {
        max-width: 420px;
        margin: auto;
        min-height: 100vh;
        padding: 20px;
        padding-bottom: 100px;
    }

    .header {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 20px;
    }

    .header a {
        font-size: 24px;
        color: #2f9e44;
        text-decoration: none;
    }

    .header h4 {
        margin: 0;
        font-weight: 600;
    }

    .plant-card {
        background: white;
        border-radius: 25px;
        padding: 20px;
        margin-bottom: 18px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, .08);
    }

    .plant-card h5 {
        color: #2f9e44;
        font-weight: 700;
        margin-bottom: 12px;
    }

    .plant-card p {
        font-size: 14px;
        margin-bottom: 8px;
        color: #444;
    }

    .bottom-nav {
        position: fixed;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 100%;
        max-width: 420px;
        background: white;
        padding: 16px 10px;
        display: flex;
        justify-content: space-around;
        align-items: center;
        border-radius: 25px 25px 0 0;
        box-shadow: 0 -8px 25px rgba(0, 0, 0, .08);
        z-index: 999;
    }

    .bottom-nav a {
        font-size: 22px;
        color: #8a8a8a;
        text-decoration: none;
        transition: .25s;
    }

    .bottom-nav a.active {
        color: #2f9e44;
        transform: translateY(-3px);
    }
    </style>
</head>

<body>

    <div class="app">

        <div class="header">
            <a href="index.php">
                <i class="bi bi-arrow-left"></i>
            </a>
            <h4>Plant Library</h4>
        </div>

        <!-- TOMAT -->
        <div class="plant-card">
            <h5>🍅 Tomat</h5>
            <p><strong>Penyiraman:</strong> 1–2x sehari</p>
            <p><strong>Cahaya:</strong> Matahari penuh</p>
            <p><strong>Panen:</strong> 70–90 hari</p>
            <p><strong>Penyakit:</strong> Busuk daun, fusarium</p>
            <p><strong>Solusi:</strong> Kurangi kelembapan & gunakan fungisida</p>
        </div>

        <!-- CABAI -->
        <div class="plant-card">
            <h5>🌶 Cabai</h5>
            <p><strong>Penyiraman:</strong> 1x sehari</p>
            <p><strong>Cahaya:</strong> Full sunlight</p>
            <p><strong>Panen:</strong> 75–100 hari</p>
            <p><strong>Penyakit:</strong> Layu bakteri</p>
            <p><strong>Solusi:</strong> Drainase baik & sanitasi lahan</p>
        </div>

        <!-- SELADA -->
        <div class="plant-card">
            <h5>🥬 Selada</h5>
            <p><strong>Penyiraman:</strong> 2x sehari</p>
            <p><strong>Cahaya:</strong> Sedang</p>
            <p><strong>Panen:</strong> 30–45 hari</p>
            <p><strong>Penyakit:</strong> Busuk akar</p>
            <p><strong>Solusi:</strong> Hindari genangan air</p>
        </div>

        <!-- TERONG -->
        <div class="plant-card">
            <h5>🍆 Terong</h5>
            <p><strong>Penyiraman:</strong> 1x sehari</p>
            <p><strong>Cahaya:</strong> Matahari penuh</p>
            <p><strong>Panen:</strong> 80–100 hari</p>
            <p><strong>Penyakit:</strong> Layu fusarium</p>
            <p><strong>Solusi:</strong> Rotasi tanaman</p>
        </div>

    </div>

    <!-- Bottom Navbar -->
    <nav class="bottom-nav">

        <a href="index.php" class="<?= $current=='index.php'?'active':'' ?>">
            <i class="bi bi-house-fill"></i>
        </a>

        <a href="chat.php" class="<?= $current=='chat.php'?'active':'' ?>">
            <i class="bi bi-chat-dots-fill"></i>
        </a>

        <a href="scan.php" class="<?= $current=='scan.php'?'active':'' ?>">
            <i class="bi bi-camera-fill"></i>
        </a>

        <a href="library.php" class="<?= $current=='library.php'?'active':'' ?>">
            <i class="bi bi-book-fill"></i>
        </a>

        <a href="profile.php" class="<?= $current=='profile.php'?'active':'' ?>">
            <i class="bi bi-person-fill"></i>
        </a>

    </nav>

</body>

</html>