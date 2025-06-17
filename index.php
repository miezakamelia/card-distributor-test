<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Card Distributor</title>
</head>
<body>
  <h2>Distribute 52 Playing Cards</h2>

  <form action="process.php" method="get">
    <label for="n">Number of People:</label>
    <input type="number" name="n" id="n" min="1" required>
    <button type="submit">Distribute</button>
  </form>
</body>
</html>
