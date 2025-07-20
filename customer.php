<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Store</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header */
        header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 1rem 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: bold;
        }

        .cart-icon {
            position: relative;
            cursor: pointer;
            font-size: 1.5rem;
            padding: 10px;
            background: rgba(255,255,255,0.2);
            border-radius: 50%;
            transition: all 0.3s ease;
        }

        .cart-icon:hover {
            background: rgba(255,255,255,0.3);
            transform: scale(1.1);
        }

        .cart-count {
            position: absolute;
            top: -5px;
            right: -5px;
            background: #ff4757;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            font-weight: bold;
        }

        /* Navigation */
        nav {
            background: white;
            padding: 1rem 0;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .nav-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
        }

        .nav-links a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .nav-links a:hover {
            color: #667eea;
        }

        /* Filters */
        .filters {
            background: white;
            padding: 1.5rem;
            margin: 2rem 0;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .filter-row {
            display: flex;
            gap: 2rem;
            align-items: center;
            flex-wrap: wrap;
        }

        .filter-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .filter-group label {
            font-weight: 600;
            color: #555;
        }

        .filter-group select, .filter-group input {
            padding: 0.5rem;
            border: 2px solid #e1e5e9;
            border-radius: 5px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        .filter-group select:focus, .filter-group input:focus {
            outline: none;
            border-color: #667eea;
        }

        .btn-filter {
            padding: 0.75rem 1.5rem;
            background: #667eea;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-filter:hover {
            background: #5a6fd8;
            transform: translateY(-2px);
        }

        /* Product Grid */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 2rem;
            margin: 2rem 0;
        }

        .product-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        }

        .product-image {
            width: 100%;
            height: 200px;
            background: linear-gradient(45deg, #f0f2f5, #e1e5e9);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #999;
            font-size: 3rem;
            position: relative;
        }

        .product-info {
            padding: 1.5rem;
        }

        .product-name {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #333;
        }

        .product-price {
            font-size: 1.5rem;
            font-weight: bold;
            color: #667eea;
            margin-bottom: 1rem;
        }

        .product-stock {
            font-size: 0.9rem;
            color: #28a745;
            margin-bottom: 1rem;
        }

        .product-stock.low {
            color: #ffc107;
        }

        .product-stock.out {
            color: #dc3545;
        }

        .btn-add-cart {
            width: 100%;
            padding: 0.75rem;
            background: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-add-cart:hover {
            background: #218838;
            transform: translateY(-2px);
        }

        .btn-add-cart:disabled {
            background: #6c757d;
            cursor: not-allowed;
            transform: none;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.8);
            animation: fadeIn 0.3s ease;
        }

        .modal-content {
            background-color: white;
            margin: 5% auto;
            padding: 0;
            border-radius: 15px;
            width: 90%;
            max-width: 800px;
            max-height: 80vh;
            overflow-y: auto;
            animation: slideIn 0.3s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideIn {
            from { transform: translateY(-50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        .modal-header {
            padding: 1.5rem;
            border-bottom: 1px solid #e1e5e9;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .close {
            font-size: 2rem;
            cursor: pointer;
            color: #999;
            transition: color 0.3s ease;
        }

        .close:hover {
            color: #333;
        }

        .modal-body {
            padding: 2rem;
        }

        .product-detail {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
        }

        .product-detail-image {
            width: 100%;
            height: 300px;
            background: linear-gradient(45deg, #f0f2f5, #e1e5e9);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            color: #999;
        }

        .product-detail-info h2 {
            color: #333;
            margin-bottom: 1rem;
        }

        .product-detail-price {
            font-size: 2rem;
            color: #667eea;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .product-detail-description {
            color: #666;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .quantity-selector {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .quantity-btn {
            width: 40px;
            height: 40px;
            border: 2px solid #667eea;
            background: white;
            color: #667eea;
            border-radius: 50%;
            cursor: pointer;
            font-size: 1.2rem;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .quantity-btn:hover {
            background: #667eea;
            color: white;
        }

        .quantity-input {
            width: 60px;
            text-align: center;
            padding: 0.5rem;
            border: 2px solid #e1e5e9;
            border-radius: 5px;
            font-size: 1rem;
        }

        /* Cart Styles */
        .cart-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem;
            border-bottom: 1px solid #e1e5e9;
        }

        .cart-item-image {
            width: 80px;
            height: 80px;
            background: linear-gradient(45deg, #f0f2f5, #e1e5e9);
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #999;
            font-size: 1.5rem;
        }

        .cart-item-info {
            flex: 1;
        }

        .cart-item-name {
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .cart-item-price {
            color: #667eea;
            font-weight: bold;
        }

        .cart-item-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .btn-remove {
            background: #dc3545;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.9rem;
            transition: background-color 0.3s ease;
        }

        .btn-remove:hover {
            background: #c82333;
        }

        .cart-summary {
            padding: 1.5rem;
            background: #f8f9fa;
            border-radius: 10px;
            margin-top: 1rem;
        }

        .cart-total {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 1rem;
        }

        .btn-checkout {
            width: 100%;
            padding: 1rem;
            background: #667eea;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.1rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-checkout:hover {
            background: #5a6fd8;
            transform: translateY(-2px);
        }

        /* Checkout Form */
        .checkout-form {
            display: grid;
            gap: 2rem;
        }

        .form-section {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .form-section h3 {
            margin-bottom: 1rem;
            color: #333;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        .form-group label {
            font-weight: 600;
            color: #555;
        }

        .form-group input, .form-group select, .form-group textarea {
            padding: 0.75rem;
            border: 2px solid #e1e5e9;
            border-radius: 5px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus, .form-group select:focus, .form-group textarea:focus {
            outline: none;
            border-color: #667eea;
        }

        .payment-methods {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }

        .payment-method {
            border: 2px solid #e1e5e9;
            border-radius: 10px;
            padding: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
        }

        .payment-method:hover {
            border-color: #667eea;
            background: #f8f9ff;
        }

        .payment-method.selected {
            border-color: #667eea;
            background: #f8f9ff;
        }

        .payment-method input[type="radio"] {
            display: none;
        }

        .order-summary {
            background: #f8f9fa;
            padding: 1.5rem;
            border-radius: 10px;
        }

        .summary-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
        }

        .summary-total {
            font-size: 1.2rem;
            font-weight: bold;
            border-top: 2px solid #e1e5e9;
            padding-top: 1rem;
            margin-top: 1rem;
        }

        .btn-place-order {
            width: 100%;
            padding: 1rem;
            background: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.1rem;
            font-weight: 600;
            margin-top: 1rem;
            transition: all 0.3s ease;
        }

        .btn-place-order:hover {
            background: #218838;
            transform: translateY(-2px);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .product-detail {
                grid-template-columns: 1fr;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .filter-row {
                flex-direction: column;
                align-items: stretch;
            }

            .nav-content {
                flex-direction: column;
                gap: 1rem;
            }

            .modal-content {
                width: 95%;
                margin: 10% auto;
            }
        }

        /* Loading Animation */
        .loading {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid #f3f3f3;
            border-top: 3px solid #667eea;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Success Message */
        .success-message {
            background: #d4edda;
            color: #155724;
            padding: 1rem;
            border-radius: 5px;
            margin: 1rem 0;
            border: 1px solid #c3e6cb;
        }

        .error-message {
            background: #f8d7da;
            color: #721c24;
            padding: 1rem;
            border-radius: 5px;
            margin: 1rem 0;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container">
            <div class="header-content">
                <div class="logo">🛍️ E-Store</div>
                <div class="cart-icon" onclick="openCartModal()">
                    🛒
                    <span class="cart-count" id="cartCount">0</span>
                </div>
            </div>
        </div>
    </header>

    <!-- Navigation -->
    <nav>
        <div class="container">
            <div class="nav-content">
                <div class="nav-links">
                    <a href="#" onclick="showSection('products')">Products</a>
                    <a href="#" onclick="showSection('cart')">Cart</a>
                    <a href="#" onclick="showSection('checkout')">Checkout</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <!-- Products Section -->
        <div id="productsSection">
            <!-- Filters -->
            <div class="filters">
                <div class="filter-row">
                    <div class="filter-group">
                        <label>Category</label>
                        <select id="categoryFilter">
                            <option value="">All Categories</option>
                            <option value="electronics">Electronics</option>
                            <option value="clothing">Clothing</option>
                            <option value="home">Home & Garden</option>
                            <option value="books">Books</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label>Price Range</label>
                        <select id="priceFilter">
                            <option value="">All Prices</option>
                            <option value="0-50">$0 - $50</option>
                            <option value="51-100">$51 - $100</option>
                            <option value="101-200">$101 - $200</option>
                            <option value="201-500">$201 - $500</option>
                            <option value="500+">$500+</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label>Sort By</label>
                        <select id="sortFilter">
                            <option value="popularity">Popularity</option>
                            <option value="price-low">Price: Low to High</option>
                            <option value="price-high">Price: High to Low</option>
                            <option value="newest">Newest</option>
                        </select>
                    </div>
                    <button class="btn-filter" onclick="applyFilters()">Apply Filters</button>
                </div>
            </div>

            <!-- Product Grid -->
            <div class="product-grid" id="productGrid">
                <!-- Products will be loaded here -->
            </div>
        </div>

        <!-- Cart Section -->
        <div id="cartSection" style="display: none;">
            <div class="form-section">
                <h2>Shopping Cart</h2>
                <div id="cartItems">
                    <!-- Cart items will be loaded here -->
                </div>
                <div class="cart-summary">
                    <div class="cart-total">Total: $<span id="cartTotal">0.00</span></div>
                    <button class="btn-checkout" onclick="showSection('checkout')">Proceed to Checkout</button>
                </div>
            </div>
        </div>

        <!-- Checkout Section -->
        <div id="checkoutSection" style="display: none;">
            <div class="checkout-form">
                <div class="form-section">
                    <h3>Shipping Information</h3>
                    <div class="form-grid">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" id="firstName" required>
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" id="lastName" required>
                        </div>
                        <div class="form-group full-width">
                            <label>Email</label>
                            <input type="email" id="email" required>
                        </div>
                        <div class="form-group full-width">
                            <label>Phone</label>
                            <input type="tel" id="phone" required>
                        </div>
                        <div class="form-group full-width">
                            <label>Address</label>
                            <input type="text" id="address" required>
                        </div>
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" id="city" required>
                        </div>
                        <div class="form-group">
                            <label>State</label>
                            <input type="text" id="state" required>
                        </div>
                        <div class="form-group">
                            <label>ZIP Code</label>
                            <input type="text" id="zipCode" required>
                        </div>
                        <div class="form-group">
                            <label>Country</label>
                            <select id="country" required>
                                <option value="">Select Country</option>
                                <option value="US">United States</option>
                                <option value="CA">Canada</option>
                                <option value="UK">United Kingdom</option>
                                <option value="AU">Australia</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h3>Payment Method</h3>
                    <div class="payment-methods">
                        <div class="payment-method" onclick="selectPaymentMethod('credit_card')">
                            <input type="radio" name="payment" value="credit_card" id="creditCard">
                            <label for="creditCard">
                                <div>💳 Credit Card</div>
                                <small>Visa, MasterCard, American Express</small>
                            </label>
                        </div>
                        <div class="payment-method" onclick="selectPaymentMethod('paypal')">
                            <input type="radio" name="payment" value="paypal" id="paypal">
                            <label for="paypal">
                                <div>🅿️ PayPal</div>
                                <small>Pay with your PayPal account</small>
                            </label>
                        </div>
                        <div class="payment-method" onclick="selectPaymentMethod('cash_on_delivery')">
                            <input type="radio" name="payment" value="cash_on_delivery" id="cashOnDelivery">
                            <label for="cashOnDelivery">
                                <div>💵 Cash on Delivery</div>
                                <small>Pay when you receive your order</small>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h3>Order Summary</h3>
                    <div class="order-summary">
                        <div id="orderSummaryItems">
                            <!-- Order items will be loaded here -->
                        </div>
                        <div class="summary-item">
                            <span>Subtotal:</span>
                            <span>$<span id="subtotal">0.00</span></span>
                        </div>
                        <div class="summary-item">
                            <span>Shipping:</span>
                            <span>$<span id="shipping">10.00</span></span>
                        </div>
                        <div class="summary-item">
                            <span>Tax:</span>
                            <span>$<span id="tax">0.00</span></span>
                        </div>
                        <div class="summary-item summary-total">
                            <span>Total:</span>
                            <span>$<span id="orderTotal">0.00</span></span>
                        </div>
                    </div>
                    <button class="btn-place-order" onclick="placeOrder()">Place Order</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Product Detail Modal -->
    <div id="productModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 id="modalProductName">Product Details</h2>
                <span class="close" onclick="closeModal()">&times;</span>
            </div>
            <div class="modal-body">
                <div class="product-detail">
                    <div class="product-detail-image" id="modalProductImage">
                        📱
                    </div>
                    <div class="product-detail-info">
                        <h2 id="modalProductTitle">Product Name</h2>
                        <div class="product-detail-price" id="modalProductPrice">$99.99</div>
                        <div class="product-detail-description" id="modalProductDescription">
                            Product description goes here...
                        </div>
                        <div class="product-stock" id="modalProductStock">In Stock</div>
                        
                        <div class="quantity-selector">
                            <button class="quantity-btn" onclick="changeQuantity(-1)">-</button>
                            <input type="number" class="quantity-input" id="quantityInput" value="1" min="1">
                            <button class="quantity-btn" onclick="changeQuantity(1)">+</button>
                        </div>
                        
                        <button class="btn-add-cart" onclick="addToCart()">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Cart Modal -->
    <div id="cartModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Shopping Cart</h2>
                <span class="close" onclick="closeModal()">&times;</span>
            </div>
            <div class="modal-body">
                <div id="cartModalItems">
                    <!-- Cart items will be loaded here -->
                </div>
                <div class="cart-summary">
                    <div class="cart-total">Total: $<span id="cartModalTotal">0.00</span></div>
                    <button class="btn-checkout" onclick="showSection('checkout'); closeModal();">Proceed to Checkout</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Sample product data (in a real app, this would come from your database)
        const products = [
            {
                id: 1,
                name: "Smartphone Pro",
                price: 699.99,
                category: "electronics",
                description: "Latest smartphone with advanced camera and fast processor",
                stock: 25,
                image: "📱",
                popularity: 95
            },
            {
                id: 2,
                name: "Laptop Ultra",
                price: 1299.99,
                category: "electronics",
                description: "High-performance laptop for work and gaming",
                stock: 15,
                image: "💻",
                popularity: 88
            },
            {
                id: 3,
                name: "Casual T-Shirt",
                price: 29.99,
                category: "clothing",
                description: "Comfortable cotton t-shirt for everyday wear",
                stock: 50,
                image: "👕",
                popularity: 72
            },
            {
                id: 4,
                name: "Running Shoes",
                price: 89.99,
                category: "clothing",
                description: "Lightweight running shoes with excellent cushioning",
                stock: 30,
                image: "👟",
                popularity: 85
            },
            {
                id: 5,
                name: "Coffee Maker",
                price: 149.99,
                category: "home",
                description: "Automatic drip coffee maker with programmable timer",
                stock: 20,
                image: "☕",
                popularity: 78
            },
            {
                id: 6,
                name: "Programming Book",
                price: 49.99,
                category: "books",
                description: "Learn modern web development with practical examples",
                stock: 40,
                image: "📚",
                popularity: 65
            },
            {
                id: 7,
                name: "Wireless Earbuds",
                price: 199.99,
                category: "electronics",
                description: "Premium wireless earbuds with noise cancellation",
                stock: 35,
                image: "🎧",
                popularity: 92
            },
            {
                id: 8,
                name: "Winter Jacket",
                price: 179.99,
                category: "clothing",
                description: "Warm winter jacket with water-resistant coating",
                stock: 18,
                image: "🧥",
                popularity: 68
            }
        ];

        let cart = [];
        let currentProduct = null;
        let filteredProducts = [...products];

        // Initialize the application
        document.addEventListener('DOMContentLoaded', function() {
            loadProducts();
            updateCartCount();
        });

        // Load and display products
        function loadProducts() {
            const grid = document.getElementById('productGrid');
            grid.innerHTML = '';

            filteredProducts.forEach(product => {
                const productCard = createProductCard(product);
                grid.appendChild(productCard);
            });
        }

        // Create product card element
        function createProductCard(product) {
            const card = document.createElement('div');
            card.className = 'product-card';
            card.onclick = () => openProductModal(product);

            const stockClass = product.stock > 20 ? '' : product.stock > 0 ? 'low' : 'out';
            const stockText = product.stock > 0 ? `${product.stock} in stock` : 'Out of stock';

            card.innerHTML = `
                <div class="product-image">${product.image}</div>
                <div class="product-info">
                    <div class="product-name">${product.name}</div>
                    <div class="product-price">${product.price.toFixed(2)}</div>
                    <div class="product-stock ${stockClass}">${stockText}</div>
                    <button class="btn-add-cart" onclick="event.stopPropagation(); quickAddToCart(${product.id})" ${product.stock === 0 ? 'disabled' : ''}>
                        ${product.stock === 0 ? 'Out of Stock' : 'Add to Cart'}
                    </button>
                </div>
            `;

            return card;
        }

        // Open product detail modal
        function openProductModal(product) {
            currentProduct = product;
            document.getElementById('modalProductName').textContent = product.name;
            document.getElementById('modalProductTitle').textContent = product.name;
            document.getElementById('modalProductPrice').textContent = `${product.price.toFixed(2)}`;
            document.getElementById('modalProductDescription').textContent = product.description;
            document.getElementById('modalProductImage').textContent = product.image;
            
            const stockClass = product.stock > 20 ? '' : product.stock > 0 ? 'low' : 'out';
            const stockText = product.stock > 0 ? `${product.stock} in stock` : 'Out of stock';
            const stockElement = document.getElementById('modalProductStock');
            stockElement.textContent = stockText;
            stockElement.className = `product-stock ${stockClass}`;
            
            document.getElementById('quantityInput').value = 1;
            document.getElementById('productModal').style.display = 'block';
        }

        // Close modal
        function closeModal() {
            document.getElementById('productModal').style.display = 'none';
            document.getElementById('cartModal').style.display = 'none';
        }

        // Change quantity in modal
        function changeQuantity(change) {
            const input = document.getElementById('quantityInput');
            let newValue = parseInt(input.value) + change;
            
            if (newValue < 1) newValue = 1;
            if (newValue > currentProduct.stock) newValue = currentProduct.stock;
            
            input.value = newValue;
        }

        // Add to cart from modal
        function addToCart() {
            if (!currentProduct) return;
            
            const quantity = parseInt(document.getElementById('quantityInput').value);
            const existingItem = cart.find(item => item.id === currentProduct.id);
            
            if (existingItem) {
                existingItem.quantity += quantity;
            } else {
                cart.push({
                    ...currentProduct,
                    quantity: quantity
                });
            }
            
            updateCartCount();
            showSuccessMessage('Product added to cart!');
            closeModal();
        }

        // Quick add to cart (from product card)
        function quickAddToCart(productId) {
            const product = products.find(p => p.id === productId);
            if (!product || product.stock === 0) return;
            
            const existingItem = cart.find(item => item.id === productId);
            
            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                cart.push({
                    ...product,
                    quantity: 1
                });
            }
            
            updateCartCount();
            showSuccessMessage('Product added to cart!');
        }

        // Update cart count in header
        function updateCartCount() {
            const count = cart.reduce((sum, item) => sum + item.quantity, 0);
            document.getElementById('cartCount').textContent = count;
        }

        // Apply filters
        function applyFilters() {
            const category = document.getElementById('categoryFilter').value;
            const priceRange = document.getElementById('priceFilter').value;
            const sortBy = document.getElementById('sortFilter').value;
            
            filteredProducts = [...products];
            
            // Filter by category
            if (category) {
                filteredProducts = filteredProducts.filter(product => product.category === category);
            }
            
            // Filter by price range
            if (priceRange) {
                const [min, max] = priceRange.split('-').map(p => p.replace('+', ''));
                filteredProducts = filteredProducts.filter(product => {
                    if (priceRange === '500+') {
                        return product.price >= 500;
                    } else {
                        return product.price >= parseInt(min) && product.price <= parseInt(max);
                    }
                });
            }
            
            // Sort products
            switch (sortBy) {
                case 'price-low':
                    filteredProducts.sort((a, b) => a.price - b.price);
                    break;
                case 'price-high':
                    filteredProducts.sort((a, b) => b.price - a.price);
                    break;
                case 'popularity':
                    filteredProducts.sort((a, b) => b.popularity - a.popularity);
                    break;
                case 'newest':
                    filteredProducts.sort((a, b) => b.id - a.id);
                    break;
            }
            
            loadProducts();
        }

        // Show different sections
        function showSection(sectionName) {
            document.getElementById('productsSection').style.display = 'none';
            document.getElementById('cartSection').style.display = 'none';
            document.getElementById('checkoutSection').style.display = 'none';
            
            switch (sectionName) {
                case 'products':
                    document.getElementById('productsSection').style.display = 'block';
                    break;
                case 'cart':
                    document.getElementById('cartSection').style.display = 'block';
                    loadCartItems();
                    break;
                case 'checkout':
                    document.getElementById('checkoutSection').style.display = 'block';
                    loadCheckoutSummary();
                    break;
            }
        }

        // Open cart modal
        function openCartModal() {
            loadCartModalItems();
            document.getElementById('cartModal').style.display = 'block';
        }

        // Load cart items in main cart section
        function loadCartItems() {
            const container = document.getElementById('cartItems');
            container.innerHTML = '';
            
            if (cart.length === 0) {
                container.innerHTML = '<p style="text-align: center; color: #666; padding: 2rem;">Your cart is empty</p>';
                document.getElementById('cartTotal').textContent = '0.00';
                return;
            }
            
            cart.forEach(item => {
                const cartItem = createCartItem(item);
                container.appendChild(cartItem);
            });
            
            updateCartTotal();
        }

        // Load cart items in modal
        function loadCartModalItems() {
            const container = document.getElementById('cartModalItems');
            container.innerHTML = '';
            
            if (cart.length === 0) {
                container.innerHTML = '<p style="text-align: center; color: #666; padding: 2rem;">Your cart is empty</p>';
                document.getElementById('cartModalTotal').textContent = '0.00';
                return;
            }
            
            cart.forEach(item => {
                const cartItem = createCartItem(item, true);
                container.appendChild(cartItem);
            });
            
            updateCartModalTotal();
        }

        // Create cart item element
        function createCartItem(item, isModal = false) {
            const div = document.createElement('div');
            div.className = 'cart-item';
            
            div.innerHTML = `
                <div class="cart-item-image">${item.image}</div>
                <div class="cart-item-info">
                    <div class="cart-item-name">${item.name}</div>
                    <div class="cart-item-price">${item.price.toFixed(2)} each</div>
                </div>
                <div class="cart-item-actions">
                    <div class="quantity-selector">
                        <button class="quantity-btn" onclick="updateCartQuantity(${item.id}, -1)">-</button>
                        <input type="number" class="quantity-input" value="${item.quantity}" min="1" onchange="setCartQuantity(${item.id}, this.value)">
                        <button class="quantity-btn" onclick="updateCartQuantity(${item.id}, 1)">+</button>
                    </div>
                    <button class="btn-remove" onclick="removeFromCart(${item.id})">Remove</button>
                </div>
            `;
            
            return div;
        }

        // Update cart item quantity
        function updateCartQuantity(productId, change) {
            const item = cart.find(item => item.id === productId);
            if (!item) return;
            
            item.quantity += change;
            
            if (item.quantity <= 0) {
                removeFromCart(productId);
                return;
            }
            
            updateCartCount();
            loadCartItems();
            loadCartModalItems();
        }

        // Set cart item quantity directly
        function setCartQuantity(productId, quantity) {
            const item = cart.find(item => item.id === productId);
            if (!item) return;
            
            const newQuantity = parseInt(quantity);
            if (newQuantity <= 0) {
                removeFromCart(productId);
                return;
            }
            
            item.quantity = newQuantity;
            updateCartCount();
            loadCartItems();
            loadCartModalItems();
        }

        // Remove item from cart
        function removeFromCart(productId) {
            cart = cart.filter(item => item.id !== productId);
            updateCartCount();
            loadCartItems();
            loadCartModalItems();
        }

        // Update cart total
        function updateCartTotal() {
            const total = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
            document.getElementById('cartTotal').textContent = total.toFixed(2);
        }

        // Update cart modal total
        function updateCartModalTotal() {
            const total = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
            document.getElementById('cartModalTotal').textContent = total.toFixed(2);
        }

        // Select payment method
        function selectPaymentMethod(method) {
            document.querySelectorAll('.payment-method').forEach(el => {
                el.classList.remove('selected');
            });
            
            event.currentTarget.classList.add('selected');
            document.getElementById(method.replace('_', '')).checked = true;
        }

        // Load checkout summary
        function loadCheckoutSummary() {
            const container = document.getElementById('orderSummaryItems');
            container.innerHTML = '';
            
            let subtotal = 0;
            
            cart.forEach(item => {
                const itemTotal = item.price * item.quantity;
                subtotal += itemTotal;
                
                const div = document.createElement('div');
                div.className = 'summary-item';
                div.innerHTML = `
                    <span>${item.name} x ${item.quantity}</span>
                    <span>${itemTotal.toFixed(2)}</span>
                `;
                container.appendChild(div);
            });
            
            const shipping = 10.00;
            const tax = subtotal * 0.08; // 8% tax
            const total = subtotal + shipping + tax;
            
            document.getElementById('subtotal').textContent = subtotal.toFixed(2);
            document.getElementById('shipping').textContent = shipping.toFixed(2);
            document.getElementById('tax').textContent = tax.toFixed(2);
            document.getElementById('orderTotal').textContent = total.toFixed(2);
        }

        // Place order
        function placeOrder() {
            // Validate form
            const requiredFields = ['firstName', 'lastName', 'email', 'phone', 'address', 'city', 'state', 'zipCode', 'country'];
            let isValid = true;
            
            requiredFields.forEach(fieldId => {
                const field = document.getElementById(fieldId);
                if (!field.value.trim()) {
                    field.style.borderColor = '#dc3545';
                    isValid = false;
                } else {
                    field.style.borderColor = '#e1e5e9';
                }
            });
            
            // Check if payment method is selected
            const paymentMethod = document.querySelector('input[name="payment"]:checked');
            if (!paymentMethod) {
                showErrorMessage('Please select a payment method');
                return;
            }
            
            if (!isValid) {
                showErrorMessage('Please fill in all required fields');
                return;
            }
            
            if (cart.length === 0) {
                showErrorMessage('Your cart is empty');
                return;
            }
            
            // Simulate order placement
            const orderData = {
                customer: {
                    firstName: document.getElementById('firstName').value,
                    lastName: document.getElementById('lastName').value,
                    email: document.getElementById('email').value,
                    phone: document.getElementById('phone').value,
                },
                shipping: {
                    address: document.getElementById('address').value,
                    city: document.getElementById('city').value,
                    state: document.getElementById('state').value,
                    zipCode: document.getElementById('zipCode').value,
                    country: document.getElementById('country').value,
                },
                items: cart,
                payment: paymentMethod.value,
                total: parseFloat(document.getElementById('orderTotal').textContent)
            };
            
            // Show loading state
            const button = document.querySelector('.btn-place-order');
            const originalText = button.textContent;
            button.innerHTML = '<span class="loading"></span> Processing Order...';
            button.disabled = true;
            
            // Simulate API call
            setTimeout(() => {
                // Reset button
                button.textContent = originalText;
                button.disabled = false;
                
                // Show success message
                showSuccessMessage('Order placed successfully! Order confirmation will be sent to your email.');
                
                // Clear cart
                cart = [];
                updateCartCount();
                
                // Show products section
                showSection('products');
                
                // Clear form (optional)
                document.querySelectorAll('input, select').forEach(input => {
                    if (input.type !== 'radio') {
                        input.value = '';
                    }
                });
                
                console.log('Order placed:', orderData);
            }, 2000);
        }

        // Show success message
        function showSuccessMessage(message) {
            const div = document.createElement('div');
            div.className = 'success-message';
            div.textContent = message;
            
            document.body.insertBefore(div, document.body.firstChild);
            
            setTimeout(() => {
                div.remove();
            }, 3000);
        }

        // Show error message
        function showErrorMessage(message) {
            const div = document.createElement('div');
            div.className = 'error-message';
            div.textContent = message;
            
            document.body.insertBefore(div, document.body.firstChild);
            
            setTimeout(() => {
                div.remove();
            }, 3000);
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            const productModal = document.getElementById('productModal');
            const cartModal = document.getElementById('cartModal');
            
            if (event.target === productModal) {
                productModal.style.display = 'none';
            }
            
            if (event.target === cartModal) {
                cartModal.style.display = 'none';
            }
        }

        // Handle Enter key in quantity input
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Enter' && event.target.classList.contains('quantity-input')) {
                event.target.blur();
            }
        });

        // Auto-update checkout summary when cart changes
        setInterval(() => {
            if (document.getElementById('checkoutSection').style.display !== 'none') {
                loadCheckoutSummary();
            }
        }, 1000);
    </script>
</body>
</html>