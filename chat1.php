<?php
$current = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>AI Plant Assistant</title>

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

    .chat-box {
        background: white;
        border-radius: 25px;
        padding: 15px;
        height: 500px;
        overflow-y: auto;
        box-shadow: 0 8px 20px rgba(0, 0, 0, .08);
    }

    .msg {
        padding: 12px 16px;
        border-radius: 18px;
        margin: 10px 0;
        max-width: 80%;
        word-wrap: break-word;
    }

    .user {
        background: #2f9e44;
        color: white;
        margin-left: auto;
    }

    .bot {
        background: #f1f3f5;
        color: #333;
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
            <h4>AI Plant Assistant</h4>
        </div>

        <div class="chat-box" id="chatBox">
            <div class="msg bot">
                Halo 🌱 Saya Farmogana AI.
                Tanyakan masalah tanamanmu.
            </div>
        </div>

        <div class="d-flex gap-2 mt-3">
            <input type="text" id="input" class="form-control" style="border-radius: 30px;"
                placeholder="Contoh: tomat saya layu">

            <button class="btn btn-success" onclick="sendMsg()" style="border-radius: 30px;">
                <i class="bi bi-send-fill"></i>
            </button>
        </div>

    </div>

    <!-- Bottom Nav -->
    <div class="bottom-nav">

        <a href="index.php" class="<?= $current=='index.php'?'active':'' ?>">
            <i class="bi bi-house-fill"></i>
        </a>

        <a href="chat.php" class="<?= $current=='chat.php'?'active':'' ?>">
            <i class="bi bi-chat-dots-fill"></i>
        </a>

        <a href="scan.php" class="<?= $current=='scan.php'?'active':'' ?>">
            <i class="bi bi-camera-fill"></i>
        </a>

        <a href="#">
            <i class="bi bi-book-fill"></i>
        </a>

        <a href="profile.php" class="<?= $current=='profile.php'?'active':'' ?>">
            <i class="bi bi-person-fill"></i>
        </a>

    </div>

    <script>
    function sendMsg() {

        const input = document.getElementById("input");
        const text = input.value.trim();

        if (!text) return;

        const box = document.getElementById("chatBox");

        box.innerHTML += `
        <div class="msg user">${text}</div>
    `;

        let reply = "Coba jelaskan gejala tanaman lebih detail 🌿";

        if (text.includes("tomat") && text.includes("layu")) {
            reply = "Tomat layu biasanya karena kekurangan air, akar busuk, atau jamur fusarium.";
        } else if (text.includes("cabai") && text.includes("layu")) {
            reply = "Cabai layu bisa disebabkan fusarium, drainase buruk, atau akar rusak.";
        } else if (text.includes("kuning")) {
            reply = "Daun kuning biasanya karena kekurangan nitrogen atau terlalu banyak air.";
        } else if (text.includes("bercak")) {
            reply = "Bercak daun bisa disebabkan bakteri atau jamur. Kurangi kelembapan.";
        } else if (text.includes("sehat")) {
            reply = "Tanaman terlihat sehat 🌱 lanjutkan penyiraman & nutrisi rutin.";
        }

        setTimeout(() => {
            box.innerHTML += `
            <div class="msg bot">${reply}</div>
        `;
            box.scrollTop = box.scrollHeight;
        }, 500);

        input.value = "";
    }
    </script>

</body>

</html>