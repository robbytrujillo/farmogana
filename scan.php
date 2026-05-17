<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title>Farmora Scanner</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    body {
        background: #edf5ed;
        font-family: Segoe UI;
    }

    .app {
        max-width: 420px;
        margin: auto;
        padding: 20px;
        min-height: 100vh;
    }

    .card-ui {
        background: white;
        padding: 25px;
        border-radius: 25px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, .08);
        margin-bottom: 20px;
        text-align: center;
    }

    video,
    img,
    canvas {
        width: 100%;
        border-radius: 20px;
        margin-top: 15px;
    }

    .result-card {
        background: white;
        padding: 20px;
        border-radius: 25px;
        margin-top: 20px;
        text-align: center;
        box-shadow: 0 8px 20px rgba(0, 0, 0, .08);
    }
    </style>
</head>

<body>

    <div class="app">

        <div class="card-ui">

            <h4>AI Plant Scanner</h4>

            <p>Pilih metode scan</p>

            <button id="cameraBtn" class="btn btn-success w-100 mb-2">
                Scan Kamera
            </button>

            <input type="file" id="upload" accept="image/*" class="form-control">

            <div id="preview"></div>

        </div>

        <div id="result"></div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@latest/dist/tf.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@teachablemachine/image@0.8/dist/teachablemachine-image.min.js"></script>

    <script src="/farmora/assets/js/scan.js"></script>

</body>

</html>