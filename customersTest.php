<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopEase - Your Online Store</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f8f9fa;
        }

        /* Header & Navigation */
        header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 1rem 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        nav {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 2rem;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: bold;
            text-decoration: none;
            color: white;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: #ffd700;
        }

        .cart-icon {
            position: relative;
            font-size: 1.2rem;
            cursor: pointer;
        }

        .cart-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background: #ff4757;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
        }

        /* Main Content */
        main {
            margin-top: 80px;
            min-height: calc(100vh - 80px);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 600"><rect fill="%23e74c3c" width="1200" height="600"/><polygon fill="%23c0392b" points="0,600 1200,400 1200,600"/></svg>');
            background-size: cover;
            background-position: center;
            height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
        }

        .hero-content h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .hero-content p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }

        .btn {
            display: inline-block;
            padding: 12px 30px;
            background: #667eea;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
            border: none;
            cursor: pointer;
            font-size: 1rem;
        }

        .btn:hover {
            background: #5a6fd8;
        }

        .btn-secondary {
            background: #6c757d;
        }

        .btn-secondary:hover {
            background: #5a6268;
        }

        /* Filters */
        .filters {
            background: white;
            padding: 2rem;
            margin: 2rem 0;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .filter-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            align-items: center;
        }

        .filter-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .filter-group label {
            font-weight: bold;
            color: #555;
        }

        .filter-group select,
        .filter-group input {
            padding: 8px;
            border: 2px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }

        /* Products Grid */
        .products-section {
            padding: 2rem 0;
        }

        .section-title {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 3rem;
            color: #333;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .product-card {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .product-image {
            width: 100%;
            height: 200px;
            background: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            color: #ccc;
            position: relative;
            overflow: hidden;
        }

        .product-info {
            padding: 1.5rem;
        }

        .product-title {
            font-size: 1.1rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
            color: #333;
        }

        .product-price {
            font-size: 1.3rem;
            color: #e74c3c;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .product-description {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 1rem;
            line-height: 1.4;
        }

        .stock-status {
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .in-stock {
            color: #27ae60;
        }

        .low-stock {
            color: #f39c12;
        }

        .out-of-stock {
            color: #e74c3c;
        }

        /* Cart */
        .cart-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            display: none;
            z-index: 2000;
        }

        .cart-sidebar {
            position: fixed;
            top: 0;
            right: -400px;
            width: 400px;
            height: 100%;
            background: white;
            transition: right 0.3s;
            z-index: 2001;
            overflow-y: auto;
        }

        .cart-sidebar.active {
            right: 0;
        }

        .cart-header {
            padding: 1rem 1.5rem;
            background: #667eea;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .close-cart {
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
        }

        .cart-content {
            padding: 1.5rem;
        }

        .cart-item {
            display: flex;
            gap: 1rem;
            padding: 1rem 0;
            border-bottom: 1px solid #eee;
        }

        .cart-item-image {
            width: 60px;
            height: 60px;
            background: #f8f9fa;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ccc;
        }

        .cart-item-info {
            flex: 1;
        }

        .cart-item-title {
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .cart-item-controls {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.5rem;
        }

        .quantity-btn {
            background: #667eea;
            color: white;
            border: none;
            width: 25px;
            height: 25px;
            border-radius: 3px;
            cursor: pointer;
            font-size: 0.8rem;
        }

        .quantity-input {
            width: 50px;
            text-align: center;
            border: 1px solid #ddd;
            padding: 2px;
            border-radius: 3px;
        }

        .remove-item {
            background: #e74c3c;
            color: white;
            border: none;
            padding: 4px 8px;
            border-radius: 3px;
            cursor: pointer;
            font-size: 0.8rem;
        }

        .cart-total {
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 2px solid #eee;
            text-align: center;
        }

        .total-price {
            font-size: 1.5rem;
            font-weight: bold;
            color: #e74c3c;
        }

        /* Checkout */
        .checkout-section {
            background: white;
            padding: 2rem;
            margin: 2rem 0;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .checkout-form {
            display: grid;
            gap: 1.5rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .form-group label {
            font-weight: bold;
            color: #555;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .payment-methods {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 1rem;
        }

        .payment-option {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 1rem;
            border: 2px solid #ddd;
            border-radius: 4px;
            cursor: pointer;
            transition: border-color 0.3s;
        }

        .payment-option:hover {
            border-color: #667eea;
        }

        .payment-option input[type="radio"] {
            margin: 0;
        }

        /* Footer */
        footer {
            background: #2c3e50;
            color: white;
            text-align: center;
            padding: 2rem 0;
            margin-top: 3rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .hero-content h1 {
                font-size: 2rem;
            }

            .filter-row {
                grid-template-columns: 1fr;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .cart-sidebar {
                width: 100%;
                right: -100%;
            }
        }

        /* Hidden sections */
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <nav>
            <a href="#" class="logo">ShopEase</a>
            <ul class="nav-links">
                <li><a href="#" onclick="showSection('home')">Home</a></li>
                <li><a href="#" onclick="showSection('products')">Products</a></li>
                <li><a href="#" onclick="showSection('checkout')">Checkout</a></li>
                <li><a href="#" onclick="showSection('contact')">Contact</a></li>
            </ul>
            <div class="cart-icon" onclick="toggleCart()">
                <i class="fas fa-shopping-cart"></i>
                <span class="cart-count" id="cartCount">0</span>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        <!-- Home Section -->
        <section id="home" class="section">
            <div class="hero">
                <div class="hero-content">
                    <h1>Welcome to ShopEase</h1>
                    <p>Discover amazing products at unbeatable prices</p>
                    <a href="#" class="btn" onclick="showSection('products')">Shop Now</a>
                </div>
            </div>
        </section>

        <!-- Products Section -->
        <section id="products" class="section hidden">
            <div class="container">
                <h2 class="section-title">Our Products</h2>
                
                <!-- Filters -->
                <div class="filters">
                    <div class="filter-row">
                        <div class="filter-group">
                            <label>Category</label>
                            <select id="categoryFilter" onchange="filterProducts()">
                                <option value="">All Categories</option>
                                <option value="electronics">Electronics</option>
                                <option value="clothing">Clothing</option>
                                <option value="books">Books</option>
                                <option value="home">Home & Garden</option>
                            </select>
                        </div>
                        <div class="filter-group">
                            <label>Price Range</label>
                            <select id="priceFilter" onchange="filterProducts()">
                                <option value="">All Prices</option>
                                <option value="0-50">$0 - $50</option>
                                <option value="51-100">$51 - $100</option>
                                <option value="101-200">$101 - $200</option>
                                <option value="201+">$201+</option>
                            </select>
                        </div>
                        <div class="filter-group">
                            <label>Sort By</label>
                            <select id="sortFilter" onchange="filterProducts()">
                                <option value="name">Name</option>
                                <option value="price-low">Price: Low to High</option>
                                <option value="price-high">Price: High to Low</option>
                                <option value="popularity">Popularity</option>
                            </select>
                        </div>
                        <div class="filter-group">
                            <label>Search</label>
                            <input type="text" id="searchInput" placeholder="Search products..." onkeyup="filterProducts()">
                        </div>
                    </div>
                </div>

                <!-- Products Grid -->
                <div class="products-grid" id="productsGrid">
                    <!-- Products will be loaded here -->
                </div>
            </div>
        </section>

        <!-- Checkout Section -->
        <section id="checkout" class="section hidden">
            <div class="container">
                <h2 class="section-title">Checkout</h2>
                
                <div class="checkout-section">
                    <h3>Shipping Information</h3>
                    <form class="checkout-form" id="checkoutForm">
                        <div class="form-row">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" id="firstName" required>
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" id="lastName" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" id="email" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="tel" id="phone" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" id="address" required>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label>City</label>
                                <input type="text" id="city" required>
                            </div>
                            <div class="form-group">
                                <label>ZIP Code</label>
                                <input type="text" id="zipCode" required>
                            </div>
                        </div>
                        
                        <h3>Payment Method</h3>
                        <div class="payment-methods">
                            <div class="payment-option">
                                <input type="radio" id="creditCard" name="payment" value="credit">
                                <label for="creditCard">Credit Card</label>
                            </div>
                            <div class="payment-option">
                                <input type="radio" id="paypal" name="payment" value="paypal">
                                <label for="paypal">PayPal</label>
                            </div>
                            <div class="payment-option">
                                <input type="radio" id="cashOnDelivery" name="payment" value="cod">
                                <label for="cashOnDelivery">Cash on Delivery</label>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>Order Notes (Optional)</label>
                            <textarea id="orderNotes" rows="3" placeholder="Special instructions for your order..."></textarea>
                        </div>
                        
                        <button type="submit" class="btn" style="width: 100%; padding: 1rem; font-size: 1.1rem;">
                            Place Order
                        </button>
                    </form>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="section hidden">
            <div class="container">
                <h2 class="section-title">Contact Us</h2>
                <div class="checkout-section">
                    <p>Have questions? We'd love to hear from you!</p>
                    <p><strong>Email:</strong> support@shopease.com</p>
                    <p><strong>Phone:</strong> (555) 123-4567</p>
                    <p><strong>Address:</strong> 123 Commerce St, Business District, City 12345</p>
                </div>
            </div>
        </section>
    </main>

    <!-- Shopping Cart Sidebar -->
    <div class="cart-overlay" id="cartOverlay" onclick="toggleCart()"></div>
    <div class="cart-sidebar" id="cartSidebar">
        <div class="cart-header">
            <h3>Shopping Cart</h3>
            <button class="close-cart" onclick="toggleCart()">&times;</button>
        </div>
        <div class="cart-content">
            <div id="cartItems">
                <!-- Cart items will be loaded here -->
            </div>
            <div class="cart-total">
                <div class="total-price">Total: $<span id="cartTotal">0.00</span></div>
                <button class="btn" onclick="proceedToCheckout()" style="width: 100%; margin-top: 1rem;">
                    Proceed to Checkout
                </button>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>&copy; 2024 ShopEase. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // Sample product data (in real app, this would come from PHP/database)
        const products = [
            {
                id: 1,
                name: "Wireless Headphones",
                price: 89.99,
                category: "electronics",
                description: "High-quality wireless headphones with noise cancellation",
                stock: 15,
                image: "🎧",
                popularity: 95
            },
            {
                id: 2,
                name: "Cotton T-Shirt",
                price: 24.99,
                category: "clothing",
                description: "Comfortable 100% cotton t-shirt in various colors",
                stock: 50,
                image: "👕",
                popularity: 78
            },
            {
                id: 3,
                name: "JavaScript Guide",
                price: 34.99,
                category: "books",
                description: "Complete guide to modern JavaScript programming",
                stock: 3,
                image: "📚",
                popularity: 65
            },
            {
                id: 4,
                name: "Smart Watch",
                price: 199.99,
                category: "electronics",
                description: "Feature-rich smartwatch with health tracking",
                stock: 8,
                image: "⌚",
                popularity: 89
            },
            {
                id: 5,
                name: "Garden Tools Set",
                price: 45.99,
                category: "home",
                description: "Complete set of essential garden tools",
                stock: 0,
                image: "🌱",
                popularity: 42
            },
            {
                id: 6,
                name: "Wireless Mouse",
                price: 29.99,
                category: "electronics",
                description: "Ergonomic wireless mouse with long battery life",
                stock: 25,
                image: "🖱️",
                popularity: 71
            }
        ];

        let cart = [];
        let currentSection = 'home';

        // Initialize the page
        document.addEventListener('DOMContentLoaded', function() {
            loadProducts();
            updateCartUI();
        });

        // Navigation functions
        function showSection(section) {
            // Hide all sections
            document.querySelectorAll('.section').forEach(s => s.classList.add('hidden'));
            
            // Show selected section
            document.getElementById(section).classList.remove('hidden');
            currentSection = section;
            
            // Load products if products section is shown
            if (section === 'products') {
                loadProducts();
            }
        }

        // Product functions
        function loadProducts() {
            const grid = document.getElementById('productsGrid');
            grid.innerHTML = '';
            
            products.forEach(product => {
                const productCard = createProductCard(product);
                grid.appendChild(productCard);
            });
        }

        function createProductCard(product) {
            const card = document.createElement('div');
            card.className = 'product-card';
            card.dataset.category = product.category;
            card.dataset.price = product.price;
            card.dataset.name = product.name.toLowerCase();
            card.dataset.popularity = product.popularity;
            
            const stockClass = product.stock === 0 ? 'out-of-stock' : 
                              product.stock < 5 ? 'low-stock' : 'in-stock';
            
            const stockText = product.stock === 0 ? 'Out of Stock' : 
                             product.stock < 5 ? `Only ${product.stock} left` : 'In Stock';
            
            card.innerHTML = `
                <div class="product-image">${product.image}</div>
                <div class="product-info">
                    <h3 class="product-title">${product.name}</h3>
                    <p class="product-price">$${product.price.toFixed(2)}</p>
                    <p class="product-description">${product.description}</p>
                    <p class="stock-status ${stockClass}">${stockText}</p>
                    <button class="btn" onclick="addToCart(${product.id})" 
                            ${product.stock === 0 ? 'disabled' : ''}>
                        ${product.stock === 0 ? 'Out of Stock' : 'Add to Cart'}
                    </button>
                </div>
            `;
            
            return card;
        }

        function filterProducts() {
            const category = document.getElementById('categoryFilter').value;
            const priceRange = document.getElementById('priceFilter').value;
            const sortBy = document.getElementById('sortFilter').value;
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            
            const cards = document.querySelectorAll('.product-card');
            let visibleCards = [];
            
            cards.forEach(card => {
                let show = true;
                
                // Category filter
                if (category && card.dataset.category !== category) {
                    show = false;
                }
                
                // Price filter
                if (priceRange) {
                    const price = parseFloat(card.dataset.price);
                    if (priceRange === '0-50' && price > 50) show = false;
                    if (priceRange === '51-100' && (price < 51 || price > 100)) show = false;
                    if (priceRange === '101-200' && (price < 101 || price > 200)) show = false;
                    if (priceRange === '201+' && price < 201) show = false;
                }
                
                // Search filter
                if (searchTerm && !card.dataset.name.includes(searchTerm)) {
                    show = false;
                }
                
                if (show) {
                    visibleCards.push(card);
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
            
            // Sort visible cards
            if (sortBy && visibleCards.length > 0) {
                visibleCards.sort((a, b) => {
                    switch (sortBy) {
                        case 'name':
                            return a.dataset.name.localeCompare(b.dataset.name);
                        case 'price-low':
                            return parseFloat(a.dataset.price) - parseFloat(b.dataset.price);
                        case 'price-high':
                            return parseFloat(b.dataset.price) - parseFloat(a.dataset.price);
                        case 'popularity':
                            return parseInt(b.dataset.popularity) - parseInt(a.dataset.popularity);
                        default:
                            return 0;
                    }
                });
                
                const grid = document.getElementById('productsGrid');
                visibleCards.forEach(card => grid.appendChild(card));
            }
        }

        // Cart functions
        function addToCart(productId) {
            const product = products.find(p => p.id === productId);
            const existingItem = cart.find(item => item.id === productId);
            
            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                cart.push({
                    id: product.id,
                    name: product.name,
                    price: product.price,
                    image: product.image,
                    quantity: 1
                });
            }
            
            updateCartUI();
            showNotification('Product added to cart!');
        }

        function removeFromCart(productId) {
            cart = cart.filter(item => item.id !== productId);
            updateCartUI();
        }

        function updateQuantity(productId, quantity) {
            const item = cart.find(item => item.id === productId);
            if (item) {
                item.quantity = parseInt(quantity);
                if (item.quantity <= 0) {
                    removeFromCart(productId);
                }
                updateCartUI();
            }
        }

        function updateCartUI() {
            const cartCount = document.getElementById('cartCount');
            const cartItems = document.getElementById('cartItems');
            const cartTotal = document.getElementById('cartTotal');
            
            // Update cart count
            const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
            cartCount.textContent = totalItems;
            
            // Update cart items
            cartItems.innerHTML = '';
            let total = 0;
            
            cart.forEach(item => {
                const itemTotal = item.price * item.quantity;
                total += itemTotal;
                
                const cartItem = document.createElement('div');
                cartItem.className = 'cart-item';
                cartItem.innerHTML = `
                    <div class="cart-item-image">${item.image}</div>
                    <div class="cart-item-info">
                        <div class="cart-item-title">${item.name}</div>
                        <div class="cart-item-controls">
                            <button class="quantity-btn" onclick="updateQuantity(${item.id}, ${item.quantity - 1})">-</button>
                            <input type="number" class="quantity-input" value="${item.quantity}" 
                                   onchange="updateQuantity(${item.id}, this.value)" min="1">
                            <button class="quantity-btn" onclick="updateQuantity(${item.id}, ${item.quantity + 1})">+</button>
                            <button class="remove-item" onclick="removeFromCart(${item.id})">Remove</button>
                        </div>
                        <div>$${itemTotal.toFixed(2)}</div>
                    </div>
                `;
                cartItems.appendChild(cartItem);
            });
            
            cartTotal.textContent = total.toFixed(2);
            
            // Show empty cart message if no items
            if (cart.length === 0) {
                cartItems.innerHTML = '<p style="text-align: center; color: #666; padding: 2rem;">Your cart is empty</p>';
            }
        }

        function toggleCart() {
            const overlay = document.getElementById('cartOverlay');
            const sidebar = document.getElementById('cartSidebar');
            
            if (sidebar.classList.contains('active')) {
                sidebar.classList.remove('active');
                overlay.style.display = 'none';
            } else {
                sidebar.classList.add('active');
                overlay.style.display = 'block';
            }
        }

        function proceedToCheckout() {
            if (cart.length === 0) {
                showNotification('Your cart is empty!');
                return;
            }
            
            toggleCart();
            showSection('checkout');
        }

        // Checkout functions
        document.getElementById('checkoutForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            if (cart.length === 0) {
                showNotification('Your cart is empty!');
                return;
            }
            
            // Collect form data
            const formData = {
                firstName: document.getElementById('firstName').value,
                lastName: document.getElementById('lastName').value,
                email: document.getElementById('email').value,
                phone: document.getElementById('phone').value,
                address: document.getElementById('address').value,
                city: document.getElementById('city').value,
                zipCode: document.getElementById('zipCode').value,
                paymentMethod: document.querySelector('input[name="payment"]:checked')?.value,
                orderNotes: document.getElementById('orderNotes').value,
                items: cart,
                total: cart.reduce((sum, item) => sum + (item.price * item.quantity), 0)
            };
            
            // In a real application, this would send data to your PHP backend
            console.log('Order data:', formData);
            
            // Simulate order processing
            showNotification('Order placed successfully! You will receive a confirmation email shortly.');
            
            // Clear cart and redirect to home
            cart = [];
            updateCartUI();
            document.getElementById('checkoutForm').reset();
            showSection('home');
        });

        // Utility functions
        function showNotification(message) {
            // Create notification element
            const notification = document.createElement('div');
            notification.style.cssText = `
                position: fixed;
                top: 100px;
                right: 20px;
                background: #27ae60;
                color: white;
                padding: 1rem 1.5rem;
                border-radius: 4px;
                z-index: 3000;
                box-shadow: 0 4px 12px rgba(0,0,0,0.15);
                transition: all 0.3s ease;
                transform: translateX(100%);
            `;
            notification.textContent = message;
            
            document.body.appendChild(notification);
            
            // Animate in
            setTimeout(() => {
                notification.style.transform = 'translateX(0)';
            }, 100);
            
            // Remove after 3 seconds
            setTimeout(() => {
                notification.style.transform = 'translateX(100%)';
                setTimeout(() => {
                    document.body.removeChild(notification);
                }, 300);
            }, 3000);
        }

        // PHP Integration Points (for backend connection)
        /*
        
        // Example PHP endpoints that this frontend would connect to:
        
        // 1. Load products from database
        async function loadProductsFromDB() {
            try {
                const response = await fetch('api/products.php');
                const products = await response.json();
                return products;
            } catch (error) {
                console.error('Error loading products:', error);
                return [];
            }
        }
        
        // 2. Submit order to backend
        async function submitOrder(orderData) {
            try {
                const response = await fetch('api/orders.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(orderData)
                });
                const result = await response.json();
                return result;
            } catch (error) {
                console.error('Error submitting order:', error);
                return { success: false, message: 'Order submission failed' };
            }
        }
        
        // 3. Check product availability
        async function checkProductStock(productId) {
            try {
                const response = await fetch(`api/stock.php?id=${productId}`);
                const stock = await response.json();
                return stock;
            } catch (error) {
                console.error('Error checking stock:', error);
                return { available: false };
            }
        }
        
        // 4. Update inventory after purchase
        async function updateInventory(items) {
            try {
                const response = await fetch('api/inventory.php', {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ items })
                });
                const result = await response.json();
                return result;
            } catch (error) {
                console.error('Error updating inventory:', error);
                return { success: false };
            }
        }
        
        */
    </script>
</body>
</html>