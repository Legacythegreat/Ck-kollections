<?php
require_once __DIR__ . '/includes/functions.php';
$product = getProductById($_GET['id'] ?? null);
if (!$product) {
    header('Location: index.php');
    exit;
}
include __DIR__ . '/includes/header.php';
?>
<main class="page-content">
  <section class="product-detail">
    <figure class="product-image-large">
      <img src="public/images/<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
    </figure>
    <div class="product-detail-info">
      <h1><?php echo htmlspecialchars($product['name']); ?></h1>
      <p class="price">$<?php echo number_format($product['price'], 2); ?></p>
      <p><?php echo htmlspecialchars($product['description']); ?></p>
      <form action="cart.php" method="post">
        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
        <button type="submit" class="button button-primary">Add to Cart</button>
      </form>
    </div>
  </section>
</main>
<?php include __DIR__ . '/includes/footer.php'; ?>