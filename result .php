<?php
include "auth_check.php";

// 1️⃣ Collect all answers safely
$answers = [];

for ($i = 1; $i <= 16; $i++) {
    if (isset($_POST["q$i"])) {
        $answers[] = $_POST["q$i"];
    }
}

// 2️⃣ Count skin types
$skin_count = array_count_values($answers);

// 3️⃣ Sort highest count first
arsort($skin_count);

// 4️⃣ Get final skin type
$skin_type = array_key_first($skin_count);

// 5️⃣ Skin descriptions & recommendations
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
            "Maintain a simple routine",
            "Cleanse twice daily",
            "Moisturize regularly",
            "Always use sunscreen"
        ]
    ],
    "combination" => [
        "title" => "Combination Skin",
        "desc" => "Your skin is oily in some areas and dry in others.",
        "tips" => [
            "Use lightweight moisturizer",
            "Balance oil & hydration",
            "Target T-zone separately",
            "Avoid harsh products"
        ]
    ],
    "sensitive" => [
        "title" => "Sensitive Skin",
        "desc" => "Your skin reacts easily and needs gentle care.",
        "tips" => [
            "Use fragrance-free products",
            "Patch test new products",
            "Avoid harsh exfoliation",
            "Use calming ingredients"
        ]
    ]
];

$data = $skin_data[$skin_type];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Skin Result</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>✨ Your Skin Type Result</h2>
    <p class="subtitle"><b><?php echo $data['title']; ?></b></p>

    <p style="text-align:center; margin-bottom:20px;">
        <?php echo $data['desc']; ?>
    </p>

    <h3 style="margin-top:20px;">🧴 Skincare Tips for You:</h3>
    <ul style="margin-top:10px; padding-left:20px;">
        <?php foreach ($data['tips'] as $tip) { ?>
            <li style="margin:6px 0;"><?php echo $tip; ?></li>
        <?php } ?>
    </ul>

    <a href="skin_test.php">
        <button style="margin-top:25px;">Retake Test</button>
    </a>
</div>

</body>
</html>
