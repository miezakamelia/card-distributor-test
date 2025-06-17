<?php

// convert 1–13 to card value
function convertValue($num) {
    switch ($num) {
        case 1: return 'A';
        case 10: return 'X';
        case 11: return 'J';
        case 12: return 'Q';
        case 13: return 'K';
        default: return $num;
    }
}


// generate full 52 cards deck
function generateDeck() {
    $suits = ['S', 'H', 'D', 'C'];
    $deck = [];

    foreach ($suits as $suit) {
        for ($i = 1; $i <= 13; $i++) {
            $deck[] = $suit . '-' . convertValue($i);
        }
    }

    shuffle($deck);
    return $deck;
}

// validate input
$n = isset($_GET['n']) ? intval($_GET['n']) : null;
if ($n === null || $n <= 0) {
    echo "<p style='color:red;'>Input value does not exist or value is invalid</p>";
    exit;
}

// here part to distribute cards
$deck = generateDeck();
$players = array_fill(0, $n, []);

for ($i = 0; $i < count($deck); $i++) {
    $players[$i % $n][] = $deck[$i];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Result</title>
</head>
<body>
  <h2>Card Distribution for <?php echo $n; ?> People</h2>

  <?php foreach ($players as $index => $hand): ?>
    <p><strong>Person <?php echo $index + 1; ?>:</strong> <?php echo implode(", ", $hand); ?></p>
  <?php endforeach; ?>

  <br>
  <a href="index.php">Please Try Again</a>
</body>
</html>
