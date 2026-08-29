<?php
// Define menu items array for easy dynamic rendering
$menuItems = [
    [
        'title'       => 'Pan-Seared Salmon',
        'category'    => 'mains',
        'price'       => 38.00,
        'description' => 'Fresh Atlantic salmon served with roasted asparagus, dill cream sauce, and lemon zest.',
        'image'       => 'https://images.unsplash.com/photo-1519708227418-c8fd9a32b7a2?auto=format&fit=crop&w=600&q=80',
        'tag'         => 'Gluten-Free'
    ],
    [
        'title'       => 'Truffle Parmesan Fries',
        'category'    => 'starters',
        'price'       => 18.00,
        'description' => 'Hand-cut fries tossed in white truffle oil, grated parmesan cheese, and fresh parsley.',
        'image'       => 'https://images.unsplash.com/photo-1573080496219-bb080dd4f877?auto=format&fit=crop&w=600&q=80',
        'tag'         => 'Vegetarian'
    ],
    [
        'title'       => 'Molten Chocolate Cake',
        'category'    => 'desserts',
        'price'       => 22.00,
        'description' => 'Warm dark chocolate cake with a molten center, served with vanilla bean gelato.',
        'image'       => 'https://images.unsplash.com/photo-1606313564200-e75d5e30476c?auto=format&fit=crop&w=600&q=80',
        'tag'         => null
    ],
    [
        'title'       => 'Rosemary Citrus Mocktail',
        'category'    => 'drinks',
        'price'       => 16.00,
        'description' => 'Non-alcoholic sparkling blend with fresh orange juice, smoked rosemary syrup, and soda.',
        'image'       => 'https://images.unsplash.com/photo-1513558161293-cdaf765ed2fd?auto=format&fit=crop&w=600&q=80',
        'tag'         => 'Halal Mocktail'
    ]
];

// Define filter categories
$categories = [
    'all'      => 'All',
    'starters' => 'Starters',
    'mains'    => 'Mains',
    'desserts' => 'Desserts',
    'drinks'   => 'Drinks'
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - Featured Items</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="menu.css">
    <style>
      /* Filter helper class */
      .menu-item.hide {
        display: none !important;
      }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Fork & Flame</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link active" href="menu.php">Menu</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Booking.php">Booking</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="AboutUs.php">About us</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <section id="menu" class="menu-section">
      <div class="container">
        
        <div class="section-header">
          <span class="sub-heading">100% Halal Certified</span>
          <h2>Our Featured Menu</h2>
          <p>Crafted with fresh halal ingredients and extraordinary passion.</p>
        </div>

        <!-- Category Filter Buttons -->
        <div class="menu-filters">
          <?php foreach ($categories as $key => $label): ?>
            <button class="filter-btn <?= $key === 'all' ? 'active' : '' ?>" data-filter="<?= htmlspecialchars($key) ?>">
                <?= htmlspecialchars($label) ?>
            </button>
          <?php endforeach; ?>
        </div>

        <!-- Menu Grid -->
        <div class="menu-grid">
          <?php foreach ($menuItems as $item): ?>
            <div class="menu-item <?= htmlspecialchars($item['category']) ?>">
              <img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['title']) ?>" class="menu-img" />
              <div class="menu-details">
                <div class="menu-title-price">
                  <h3><?= htmlspecialchars($item['title']) ?></h3>
                  <span class="price">RM <?= number_format($item['price'], 2) ?></span>
                </div>
                <p class="description"><?= htmlspecialchars($item['description']) ?></p>
                <?php if (!empty($item['tag'])): ?>
                  <span class="tag"><?= htmlspecialchars($item['tag']) ?></span>
                <?php endif; ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>

      </div>
    </section>

    <!-- JavaScript for Category Filtering -->
    <script>
      document.addEventListener('DOMContentLoaded', () => {
        const filterBtns = document.querySelectorAll('.filter-btn');
        const menuItems = document.querySelectorAll('.menu-item');

        filterBtns.forEach(btn => {
          btn.addEventListener('click', () => {
            filterBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            const filterValue = btn.getAttribute('data-filter');

            menuItems.forEach(item => {
              if (filterValue === 'all' || item.classList.contains(filterValue)) {
                item.classList.remove('hide');
              } else {
                item.classList.add('hide');
              }
            });
          });
        });
      });
    </script>
</body>
</html>
