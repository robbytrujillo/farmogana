<!-- AIzaSyAC659sP-NrP_j8ER7FRdkBlpJ5XF67WlM -->

<?php

header("Content-Type: application/json");

$apiKey = "AIzaSyAC659sP-NrP_j8ER7FRdkBlpJ5XF67WlM";

$data = json_decode(file_get_contents("php://input"), true);

$message = $data['message'] ?? '';

if (!$message) {
    echo json_encode([
        "reply" => "Pesan kosong."
    ]);
    exit;
}

$url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=".$apiKey;

$postData = [
    "contents" => [
        [
            "parts" => [
                [
                    "text" =>
                    "Kamu adalah Farmogana AI, asisten ahli tanaman pertanian Indonesia. Jawab singkat, jelas, ramah, dan membantu.\n\nUser: ".$message
                ]
            ]
        ]
    ]
];

$ch = curl_init($url);

curl_setopt_array($ch,[
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER => [
        "Content-Type: application/json"
    ],
    CURLOPT_POSTFIELDS => json_encode($postData)
]);

$response = curl_exec($ch);

curl_close($ch);

$result = json_decode($response,true);

$reply =
$result['candidates'][0]['content']['parts'][0]['text']
?? "Maaf, AI sedang sibuk.";

echo json_encode([
    "reply"=>$reply
]);