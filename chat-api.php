<!-- AIzaSyAC659sP-NrP_j8ER7FRdkBlpJ5XF67WlM -->

<?php

header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);
$message = $data["message"] ?? "";

if (!$message) {
    echo json_encode([
        "reply" => "Pesan kosong."
    ]);
    exit;
}

$apiKey = "AIzaSyAC659sP-NrP_j8ER7FRdkBlpJ5XF67WlM";

$url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=".$apiKey;

$postData = [
    "contents" => [
        [
            "parts" => [
                [
                    "text" =>
                    "Kamu adalah Farmogana AI, asisten ahli tanaman. Jawab singkat, jelas, ramah, dan fokus pada solusi tanaman.\n\nUser: ".$message
                ]
            ]
        ]
    ]
];

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);

curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json"
]);

curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo json_encode([
        "reply" => "cURL Error: ".curl_error($ch)
    ]);
    exit;
}

curl_close($ch);

$result = json_decode($response, true);

$reply =
$result["candidates"][0]["content"]["parts"][0]["text"]
?? "AI sedang offline.";

echo json_encode([
    "reply" => $reply
]);