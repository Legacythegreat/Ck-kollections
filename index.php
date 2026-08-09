<?php
require_once __DIR__ . '/includes/functions.php';
$categories = getCategories();
$products = getProducts();
include __DIR__ . '/includes/header.php';
?>
<main class="page-content">
  <section class="hero">
    <div class="hero-copy">
      <p class="eyebrow">Precision Crafted Luxury</p>
      <h1>CK Kollections</h1>
      <p>Modern collections designed for discerning buyers who expect incredible performance, exceptional materials, and absolute confidence.</p>
      <div class="hero-actions">
        <a href="category.php?slug=new-arrivals" class="button button-primary">Shop New Arrivals</a>
        <a href="category.php?slug=gifts" class="button button-secondary">Explore Gift Sets</a>
      </div>
      <div class="trust-bar">
        <div class="trust-item">
          <strong>Certified Luxury</strong>
          <span>Premium quality materials, curated finishes.</span>
        </div>
        <div class="trust-item">
          <strong>Secure Checkout</strong>
          <span>PCI-compliant payments & trusted service.</span>
        </div>
        <div class="trust-item">
          <strong>Countrywide Delivery</strong>
          <span>Fast, insured shipping to your door.</span>
        </div>
      </div>
    </div>
    <div class="hero-image">
      <div class="hero-glow"></div>
    </div>
  </section>
  <section class="category-pills">
    <div class="pill-list">
      <?php foreach ($categories as $category): ?>
        <a class="pill" href="category.php?slug=<?php echo urlencode($category['slug']); ?>"><?php echo htmlspecialchars($category['name']); ?></a>
      <?php endforeach; ?>
    </div>
  </section>
  <section class="featured-products">
    <div class="section-header">
      <h2>Featured Collections</h2>
      <a href="search.php?q=champagne" class="link-secondary">Browse all products</a>
    </div>
    <div class="product-grid">
      <?php foreach (array_slice($products, 0, 6) as $product): ?>
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
  </section>
</main>
<?php include __DIR__ . '/includes/footer.php';
?>