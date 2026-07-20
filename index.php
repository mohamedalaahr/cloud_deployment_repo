<?php 
require 'header.php'; 

// 1. Products Data (No Database)
$products = [
    ['id' => 1, 'name' => 'Wireless Headphones', 'price' => 89.99, 'emoji' => '🎧'],
    ['id' => 2, 'name' => 'Smart Watch', 'price' => 199.50, 'emoji' => '⌚'],
    ['id' => 3, 'name' => 'Mechanical Keyboard', 'price' => 129.00, 'emoji' => '⌨️'],
    ['id' => 4, 'name' => 'Ergonomic Mouse', 'price' => 45.00, 'emoji' => '🖱️'],
    ['id' => 5, 'name' => '4K Monitor', 'price' => 349.99, 'emoji' => '🖥️'],
    ['id' => 6, 'name' => 'USB-C Hub', 'price' => 35.00, 'emoji' => '🔌']
];

// 2. Handle Add to Cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $productId = (int)$_POST['product_id'];
    $product = array_filter($products, fn($p) => $p['id'] === $productId);
    $product = reset($product);

    if ($product) {
        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId]['quantity']++;
        } else {
            $_SESSION['cart'][$productId] = [
                'name' => $product['name'],
                'price' => $product['price'],
                'emoji' => $product['emoji'],
                'quantity' => 1
            ];
        }
    }
    header("Location: index.php");
    exit;
}
?>

<section class="hero-small">
    <h1>Our Products</h1>
    <p>Premium tech gear, stored in simple PHP arrays. No database required!</p>
</section>

<section class="products-grid">
    <?php foreach ($products as $product): ?>
        <div class="product-card">
            <div class="product-emoji"><?= $product['emoji'] ?></div>
            <div class="product-info">
                <h3><?= htmlspecialchars($product['name']) ?></h3>
                <p class="price">$<?= number_format($product['price'], 2) ?></p>
                <form method="POST">
                    <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                    <button type="submit" name="add_to_cart" class="btn btn-sm">Add to Cart</button>
                </form>
            </div>
        </div>
    <?php endforeach; ?>
</section>

<?php require 'footer.php'; ?>