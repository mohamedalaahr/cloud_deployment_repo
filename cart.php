<?php 
require 'header.php'; 

// 1. Handle Remove from Cart
if (isset($_GET['remove'])) {
    $id = (int)$_GET['remove'];
    if (isset($_SESSION['cart'][$id])) {
        unset($_SESSION['cart'][$id]);
    }
    header("Location: cart.php");
    exit;
}

// 2. Handle Checkout (Clear Cart)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['checkout'])) {
    $_SESSION['cart'] = [];
    $checkoutSuccess = true;
}

$total = 0;
?>

<section class="hero-small">
    <h1>Your Cart</h1>
    <p>Review your items before checkout.</p>
</section>

<?php if (isset($checkoutSuccess)): ?>
    <div class="alert alert-success">
        ✅ Order placed successfully! Your cart has been cleared.
    </div>
<?php endif; ?>

<?php if (empty($_SESSION['cart'])): ?>
    <div class="empty-state">
        <h2>🛒 Your cart is empty</h2>
        <p>Looks like you haven't added anything yet.</p>
        <a href="index.php" class="btn">Continue Shopping</a>
    </div>
<?php else: ?>
    <div class="cart-container">
        <div class="cart-items">
            <?php foreach ($_SESSION['cart'] as $id => $item): 
                $subtotal = $item['price'] * $item['quantity'];
                $total += $subtotal;
            ?>
                <div class="cart-item">
                    <div class="cart-item-info">
                        <span class="cart-emoji"><?= $item['emoji'] ?></span>
                        <div>
                            <h3><?= htmlspecialchars($item['name']) ?></h3>
                            <p class="text-muted">$<?= number_format($item['price'], 2) ?> x <?= $item['quantity'] ?></p>
                        </div>
                    </div>
                    <div class="cart-item-actions">
                        <span class="item-total">$<?= number_format($subtotal, 2) ?></span>
                        <a href="?remove=<?= $id ?>" class="btn-remove" title="Remove">✕</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="cart-summary">
            <h3>Order Summary</h3>
            <div class="summary-row">
                <span>Subtotal</span>
                <span>$<?= number_format($total, 2) ?></span>
            </div>
            <div class="summary-row total">
                <span>Total</span>
                <span>$<?= number_format($total, 2) ?></span>
            </div>
            <form method="POST">
                <button type="submit" name="checkout" class="btn btn-full">Checkout</button>
            </form>
        </div>
    </div>
<?php endif; ?>

<?php require 'footer.php'; ?>