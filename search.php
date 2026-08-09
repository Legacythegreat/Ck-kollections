<?php
require_once __DIR__ . '/includes/functions.php';
$search = trim($_GET['q'] ?? '');
$products = $search ? getProducts(null, $search) : [];
include __DIR__ . '/includes/header.php';
?>
<main class="page-content">
  <section class="page-section">
    <div class="section-header">
      <h1>Search Results</h1>
      <p class="section-copy">Showing results for <strong><?php echo htmlspecialchars($search ?: ''); ?></strong></p>
    </div>
    <?php if (!$search): ?>
      <p>Enter a search term to find products.</p>
    <?php elseif (empty($products)): ?>
      <p>No products matched &#8220;<?php echo htmlspecialchars($search); ?>&#8221;.</p>
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