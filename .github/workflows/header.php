<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Initialize cart if not exists
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Calculate cart count
$cartCount = array_sum(array_column($_SESSION['cart'], 'quantity'));
?>
<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Mini Store</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <a href="index.php" class="logo">ShopFlow.</a>
            <div class="nav-right">
                <a href="index.php" class="nav-link">Products</a>
                <a href="cart.php" class="nav-link cart-link">
                    Cart 🛒 <span class="badge"><?= $cartCount ?></span>
                </a>
                <button class="theme-toggle" id="themeToggle">🌙</button>
            </div>
        </nav>
    </header>
    <main class="container">