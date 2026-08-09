<?php
require_once __DIR__ . '/includes/functions.php';
$slug = $_GET['slug'] ?? null;
if (!$slug) {
    header('Location: index.php');
    exit;
}
$categories = getCategories();
$products = getProducts($slug);
$category = null;
foreach ($categories as $cat) {
    if ($cat['slug'] === $slug) {
        $category = $cat;
        break;
    }
}
if (!$category) {
    header('Location: index.php');
    exit;
}
include __DIR__ . '/includes/header.php';
?>
<main class="page-content">
  <section class="page-section">
    <div class="section-header">
      <h1><?php echo htmlspecialchars($category['name']); ?></h1>
      <p class="section-copy">Browse elegant items curated for this collection.</p>
    </div>
    <?php if (empty($products)): ?>
      <p>No products are available in this category yet.</p>
    <?php else: ?>
      <div class="product-grid">
        <?php foreach ($products as $product): ?>
          <article class="product-card">
            <img src="public/images/<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
            <div class="product-card-body">
              <h3><?php echo htmlspecialchars($product['name']); ?></h3>
              <p><?php echo htmlspecialchars($product['short_description']); ?></p>
              <div class="product-meta">
                <span class="price">Ksh <?php echo number_format($product['price'], 2); ?></span>
                <a class="button button-secondary" href="product.php?id=<?php echo $product['id']; ?>">View</a>
              </div>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </section>
</main>
<?php include __DIR__ . '/includes/footer.php'; ?>