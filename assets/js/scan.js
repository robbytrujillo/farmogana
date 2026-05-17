const MODEL_URL = "/farmora/assets/model/";

let model;
let webcam;
let liveMode = false;

/* ======================
LOAD MODEL
====================== */
async function init() {
  model = await tmImage.load(
    MODEL_URL + "model.json",
    MODEL_URL + "metadata.json",
  );

  console.log("Model Loaded");
}

init();

/* ======================
UPLOAD FOTO
====================== */
document
  .getElementById("upload")
  .addEventListener("change", async function (e) {
    const file = e.target.files[0];
    if (!file) return;

    const img = new Image();

    img.src = window.URL.createObjectURL(file);

    img.onload = async function () {
      showPreview(img);

      await predict(img, true);
    };
  });

/* ======================
START CAMERA
====================== */
document.getElementById("cameraBtn").addEventListener("click", startCamera);

async function startCamera() {
  webcam = new tmImage.Webcam(350, 300, true);

  await webcam.setup();
  await webcam.play();

  liveMode = true;

  document.getElementById("preview").innerHTML = "";

  document.getElementById("preview").appendChild(webcam.canvas);

  addCaptureButton();

  window.requestAnimationFrame(loop);
}

/* ======================
LIVE LOOP
====================== */
async function loop() {
  if (!liveMode) return;

  webcam.update();

  await predict(webcam.canvas, false);

  window.requestAnimationFrame(loop);
}

/* ======================
CAPTURE BUTTON
====================== */
function addCaptureButton() {
  document.getElementById("preview").insertAdjacentHTML(
    "beforeend",
    `
<button
id="captureBtn"
class="btn btn-success w-100 mt-3">
Ambil Foto
</button>
`,
  );

  document.getElementById("captureBtn").addEventListener("click", captureImage);
}

/* ======================
CAPTURE
====================== */
async function captureImage() {
  liveMode = false;

  const canvas = document.createElement("canvas");

  canvas.width = webcam.canvas.width;

  canvas.height = webcam.canvas.height;

  const ctx = canvas.getContext("2d");

  ctx.drawImage(webcam.canvas, 0, 0);

  showPreview(canvas);

  await predict(canvas, true);
}

/* ======================
SHOW PREVIEW
====================== */
function showPreview(source) {
  document.getElementById("preview").innerHTML = "";

  document.getElementById("preview").appendChild(source);
}

/* ======================
PREDICT
====================== */
async function predict(source, locked = false) {
  const prediction = await model.predict(source);

  prediction.sort((a, b) => b.probability - a.probability);

  const top = prediction[0];

  const confidence = (top.probability * 100).toFixed(1);

  render(top.className, confidence, locked);
}

/* ======================
RENDER
====================== */
function render(plant, confidence, locked) {
  let badge = locked ? "Final Result" : "Live Detection";

  document.getElementById("result").innerHTML = `

<div class="result-card">

<p>${badge}</p>

<h3>${plant}</h3>

<h1>${confidence}%</h1>

</div>

`;
}
