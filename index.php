<?php
session_start();
require_once 'calorie_data.php';

// Initialize food log
if (!isset($_SESSION['log'])) {
    $_SESSION['log'] = [];
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle reset first
    if (isset($_POST['reset'])) {
        $_SESSION['log'] = [];
        $_SESSION['message'] = 'Log cleared successfully';
    } else {
        // Get form data
        $food = isset($_POST['food']) ? strtolower(trim($_POST['food'])) : '';
        $quantity = isset($_POST['quantity']) ? (float)$_POST['quantity'] : 0;

        // Validate input
        if (empty($food) || $quantity <= 0) {
            $_SESSION['error'] = 'Please select a food item and enter valid quantity';
        } elseif (!isset($calorie_data[$food])) {
            $_SESSION['error'] = 'Invalid food selection';
        } else {
            // Calculate calories
            $calories = ($quantity / 100) * $calorie_data[$food];
            
            // Add to log
            $_SESSION['log'][] = [
                'food' => $food,
                'quantity' => $quantity,
                'calories' => round($calories, 2)
            ];
            
            $_SESSION['message'] = 'Entry added successfully';
        }
    }
    
    // Redirect to clear POST data
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daily Calorie Tracker Platform</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

  <!-- logo -->
  <a href="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" class="logo-link">
    <img src="LogoDCTP.png" alt="Daily Calorie Tracker Logo" class="logo-img"> <!-- IMAGE -->
  </a>

    <div class="container">
        <h2>Daily Calorie Tracker Platform</h2>

        <!-- Messages -->
        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert success">
                <?= $_SESSION['message'] ?>
                <?php unset($_SESSION['message']); ?>
            </div>
        <?php endif; ?>
        
        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert error">
                <?= $_SESSION['error'] ?>
                <?php unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>

        <!-- Input Form -->
        <form method="POST">
            <select name="food" required>
                <option value="">Select Food Item</option>
                <?php foreach ($calorie_data as $food => $calories): ?>
                    <option value="<?php echo $food ?>"><?php echo ucfirst($food) ?> (<?php echo $calories ?> kcal/100g)</option>
                <?php endforeach; ?>
            </select>

            <input type="number" name="quantity" step="1" min="1" 
                   placeholder="Quantity (grams)" required>

            <div class="button-group">
                <button type="submit">Add Food</button>
                <button type="submit" name="reset" value="1">Reset Log</button>
            </div>
        </form>

        <!-- Food Log -->
        <?php if (!empty($_SESSION['log'])): ?>
            <table>
                <thead>
                    <tr>
                        <th>Food Item</th>
                        <th>Quantity (g)</th>
                        <th>Calories</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0; ?>
                    <?php foreach ($_SESSION['log'] as $item): ?>
                        <?php $total += $item['calories']; ?>
                        <tr>
                            <td><?= htmlspecialchars(ucfirst($item['food'])) ?></td>
                            <td><?= htmlspecialchars($item['quantity']) ?></td>
                            <td><?= htmlspecialchars($item['calories']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="total">
                Total Calories: <?= round($total, 2) ?>
            </div>
        <?php endif; ?>
    </div>

<!-- credit -->
<div class="credit">
  Made by Mohammad Ahsan Neyaz & Harshit
</div>

</body>
</html>