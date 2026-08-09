<?php
require_once __DIR__ . '/includes/functions.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['product_id'])) {
    addToCart((int) $_POST['product_id']);
    header('Location: cart.php');
    exit;
}
$cartItems = getCartItems();
include __DIR__ . '/includes/header.php';
?>
<main class="page-content">
  <section class="page-section cart-section">
    <h1>Your Cart</h1>
    <?php if (empty($cartItems)): ?>
      <p>Your cart is empty.</p>
    <?php else: ?>
      <table class="cart-table">
        <thead>
          <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($cartItems as $item): ?>
            <tr>
              <td><?php echo htmlspecialchars($item['name']); ?></td>
              <td><?php echo $item['quantity']; ?></td>
              <td>Ksh <?php echo number_format($item['price'] * $item['quantity'], 2); ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php endif; ?>
  </section>
</main>
<?php include __DIR__ . '/includes/footer.php'; ?>