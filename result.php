<?php
include "auth_check.php";
include "db.php";


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: questions.php");
    exit;
}


$user_id = $_SESSION['user_id'] ?? null;
if (!$user_id) {
    die("User not logged in");
}


$answers = [];
for ($i = 1; $i <= 16; $i++) {
    if (!isset($_POST["q$i"])) {
        die("Please answer all questions.");
    }
    $answers[] = $_POST["q$i"];
}


$count = array_count_values($answers);
arsort($count);
$skin_type = array_key_first($count);


$stmt = mysqli_prepare($conn, "SELECT skin_id FROM skin_type WHERE name = ?");
mysqli_stmt_bind_param($stmt, "s", $skin_type);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) === 0) {
    die("Skin type not found.");
}

$row = mysqli_fetch_assoc($result);
$skin_id = $row['skin_id'];


$check = mysqli_prepare($conn, "SELECT result_id FROM result WHERE user_id = ?");
mysqli_stmt_bind_param($check, "i", $user_id);
mysqli_stmt_execute($check);
$checkRes = mysqli_stmt_get_result($check);

if (mysqli_num_rows($checkRes) > 0) {
    $update = mysqli_prepare($conn, "UPDATE result SET skin_id = ? WHERE user_id = ?");
    mysqli_stmt_bind_param($update, "ii", $skin_id, $user_id);
    mysqli_stmt_execute($update);
} else {
    $insert = mysqli_prepare($conn, "INSERT INTO result (user_id, skin_id) VALUES (?, ?)");
    mysqli_stmt_bind_param($insert, "ii", $user_id, $skin_id);
    mysqli_stmt_execute($insert);
}


$skin_data = [
    "dry" => [
        "title" => "Dry Skin",
        "desc" => "Your skin lacks moisture and may feel tight or flaky.",
        "tips" => [
            "Use a creamy cleanser",
            "Apply moisturizer twice daily",
            "Avoid hot water",
            "Use hydrating sunscreen"
        ]
    ],
    "oily" => [
        "title" => "Oily Skin",
        "desc" => "Your skin produces excess oil, especially in the T-zone.",
        "tips" => [
            "Use gel-based cleanser",
            "Choose oil-free products",
            "Do not skip moisturizer",
            "Use clay masks weekly"
        ]
    ],
    "normal" => [
        "title" => "Normal Skin",
        "desc" => "Your skin is balanced and healthy.",
        "tips" => [
            "Cleanse twice daily",
            "Moisturize regularly",
            "Always use sunscreen"
        ]
    ],
    "combination" => [
        "title" => "Combination Skin",
        "desc" => "Your skin is oily in some areas and dry in others.",
        "tips" => [
            "Balance oil & hydration",
            "Use lightweight moisturizer",
            "Target T-zone separately"
        ]
    ],
    "sensitive" => [
        "title" => "Sensitive Skin",
        "desc" => "Your skin reacts easily and needs gentle care.",
        "tips" => [
            "Use fragrance-free products",
            "Patch test new products",
            "Avoid harsh exfoliation"
        ]
    ]
];

$data = $skin_data[$skin_type];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Skin Analysis Result</title>
    <style>
        body{
            background: linear-gradient(135deg,#f6d1ff,#c2e9fb);
            font-family: Poppins, sans-serif;
            display:flex;
            justify-content:center;
            align-items:center;
            min-height:100vh;
        }
        .card{
            background:rgba(255,255,255,0.35);
            backdrop-filter: blur(12px);
            padding:40px;
            border-radius:20px;
            width:90%;
            max-width:600px;
        }
        a{
            display:inline-block;
            margin-top:20px;
            padding:12px 18px;
            background:#6366f1;
            color:white;
            border-radius:10px;
            text-decoration:none;
        }
    </style>
</head>

<body>
<div class="card">
    <h1>🌿 <?= $data['title'] ?></h1>
    <p><?= $data['desc'] ?></p>

    <h3>Care Tips</h3>
    <ul>
        <?php foreach ($data['tips'] as $tip): ?>
            <li>✔ <?= $tip ?></li>
        <?php endforeach; ?>
    </ul>

    <a href="questions.php">Retake Test</a>
    <a href="logout.php">Logout</a>
    <a href="recommendation.php">View Routine</a>
</div>
</body>
</html>
