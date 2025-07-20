<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Admin Panel</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        .admin-container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px 0;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            transition: all 0.3s ease;
        }

        .sidebar-header {
            text-align: center;
            padding: 20px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            margin-bottom: 20px;
        }

        .sidebar-header h2 {
            font-size: 24px;
            margin-bottom: 5px;
        }

        .sidebar-header p {
            font-size: 14px;
            opacity: 0.8;
        }

        .sidebar-menu {
            list-style: none;
        }

        .sidebar-menu li {
            margin-bottom: 5px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background: rgba(255,255,255,0.1);
            border-left-color: #fff;
        }

        .sidebar-menu i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: 250px;
            padding: 20px;
        }

        .header {
            background: white;
            padding: 15px 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            color: #333;
            font-size: 28px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }

        /* Dashboard Cards */
        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .card-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: white;
        }

        .card-icon.orders { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .card-icon.products { background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); }
        .card-icon.revenue { background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); }
        .card-icon.customers { background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%); }

        .card-value {
            font-size: 32px;
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }

        .card-label {
            color: #666;
            font-size: 14px;
        }

        .card-trend {
            display: flex;
            align-items: center;
            gap: 5px;
            margin-top: 10px;
            font-size: 12px;
        }

        .trend-up { color: #10b981; }
        .trend-down { color: #ef4444; }

        /* Content Sections */
        .content-section {
            display: none;
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }

        .content-section.active {
            display: block;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #f1f5f9;
        }

        .section-title {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .btn-success {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
        }

        .btn-warning {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            color: white;
        }

        .btn-danger {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: white;
        }

        /* Tables */
        .table-container {
            overflow-x: auto;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #f1f5f9;
        }

        th {
            background: #f8f9fa;
            font-weight: 600;
            color: #374151;
        }

        tr:hover {
            background: #f8f9fa;
        }

        .status-badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }

        .status-pending { background: #fef3c7; color: #92400e; }
        .status-processing { background: #dbeafe; color: #1e40af; }
        .status-shipped { background: #d1fae5; color: #065f46; }
        .status-delivered { background: #dcfce7; color: #166534; }
        .status-cancelled { background: #fee2e2; color: #991b1b; }

        /* Forms */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
            color: #374151;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px 15px;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        /* Charts placeholder */
        .chart-container {
            height: 300px;
            background: #f8f9fa;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666;
            font-size: 18px;
            margin: 20px 0;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }
            
            .main-content {
                margin-left: 200px;
            }
            
            .dashboard-cards {
                grid-template-columns: 1fr;
            }
            
            .form-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 576px) {
            .sidebar {
                transform: translateX(-100%);
                z-index: 1000;
            }
            
            .sidebar.active {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .header {
                padding: 10px 15px;
            }
            
            .header h1 {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-header">
                <h2>Admin Panel</h2>
                <p>Ecommerce Management</p>
            </div>
            <ul class="sidebar-menu">
                <li><a href="#dashboard" class="menu-item active"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li><a href="#products" class="menu-item"><i class="fas fa-box"></i> Products</a></li>
                <li><a href="#categories" class="menu-item"><i class="fas fa-tags"></i> Categories</a></li>
                <li><a href="#inventory" class="menu-item"><i class="fas fa-warehouse"></i> Inventory</a></li>
                <li><a href="#orders" class="menu-item"><i class="fas fa-shopping-cart"></i> Orders</a></li>
                <li><a href="#customers" class="menu-item"><i class="fas fa-users"></i> Customers</a></li>
                <li><a href="#reports" class="menu-item"><i class="fas fa-chart-line"></i> Reports</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Header -->
            <div class="header">
                <h1 id="page-title">Dashboard Overview</h1>
                <div class="user-info">
                    <div class="user-avatar">A</div>
                    <span>Admin User</span>
                </div>
            </div>

            <!-- Dashboard Section -->
            <div id="dashboard" class="content-section active">
                <div class="dashboard-cards">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-icon orders">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                        </div>
                        <div class="card-value">1,234</div>
                        <div class="card-label">Total Orders</div>
                        <div class="card-trend trend-up">
                            <i class="fas fa-arrow-up"></i>
                            <span>12% from last month</span>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <div class="card-icon products">
                                <i class="fas fa-box"></i>
                            </div>
                        </div>
                        <div class="card-value">567</div>
                        <div class="card-label">Total Products</div>
                        <div class="card-trend trend-up">
                            <i class="fas fa-arrow-up"></i>
                            <span>5% from last month</span>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <div class="card-icon revenue">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                        </div>
                        <div class="card-value">$45,678</div>
                        <div class="card-label">Total Revenue</div>
                        <div class="card-trend trend-up">
                            <i class="fas fa-arrow-up"></i>
                            <span>18% from last month</span>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <div class="card-icon customers">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                        <div class="card-value">890</div>
                        <div class="card-label">Total Customers</div>
                        <div class="card-trend trend-up">
                            <i class="fas fa-arrow-up"></i>
                            <span>8% from last month</span>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="section-header">
                        <h3 class="section-title">Top Selling Items</h3>
                    </div>
                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Category</th>
                                    <th>Sales</th>
                                    <th>Revenue</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>iPhone 14 Pro</td>
                                    <td>Electronics > Phones</td>
                                    <td>156 units</td>
                                    <td>$155,844</td>
                                </tr>
                                <tr>
                                    <td>Samsung Galaxy S23</td>
                                    <td>Electronics > Phones</td>
                                    <td>134 units</td>
                                    <td>$107,200</td>
                                </tr>
                                <tr>
                                    <td>MacBook Pro M2</td>
                                    <td>Electronics > Computers</td>
                                    <td>89 units</td>
                                    <td>$178,000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Products Section -->
            <div id="products" class="content-section">
                <div class="section-header">
                    <h2 class="section-title">Product Management</h2>
                    <button class="btn btn-primary" onclick="showAddProductForm()">
                        <i class="fas fa-plus"></i> Add New Product
                    </button>
                </div>

                <div id="product-list">
                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><div style="width: 50px; height: 50px; background: #f3f4f6; border-radius: 4px;"></div></td>
                                    <td>iPhone 14 Pro</td>
                                    <td>Electronics > Phones</td>
                                    <td>$999</td>
                                    <td>25</td>
                                    <td><span class="status-badge status-delivered">Active</span></td>
                                    <td>
                                        <button class="btn btn-warning" style="margin-right: 5px; padding: 5px 10px;">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-danger" style="padding: 5px 10px;">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><div style="width: 50px; height: 50px; background: #f3f4f6; border-radius: 4px;"></div></td>
                                    <td>Samsung Galaxy S23</td>
                                    <td>Electronics > Phones</td>
                                    <td>$799</td>
                                    <td>15</td>
                                    <td><span class="status-badge status-delivered">Active</span></td>
                                    <td>
                                        <button class="btn btn-warning" style="margin-right: 5px; padding: 5px 10px;">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-danger" style="padding: 5px 10px;">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div id="product-form" style="display: none;">
                    <div class="form-grid">
                        <div class="form-group">
                            <label>Product Name</label>
                            <input type="text" placeholder="Enter product name">
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select>
                                <option>Select Category</option>
                                <option>Electronics > Phones</option>
                                <option>Electronics > Computers</option>
                                <option>Clothing > Men</option>
                                <option>Clothing > Women</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" placeholder="0.00">
                        </div>
                        <div class="form-group">
                            <label>Stock Quantity</label>
                            <input type="number" placeholder="0">
                        </div>
                        <div class="form-group">
                            <label>Product Image</label>
                            <input type="file" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select>
                                <option>Active</option>
                                <option>Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea rows="4" placeholder="Enter product description"></textarea>
                    </div>
                    <div style="margin-top: 20px;">
                        <button class="btn btn-primary" style="margin-right: 10px;">Save Product</button>
                        <button class="btn" onclick="hideAddProductForm()" style="background: #6b7280; color: white;">Cancel</button>
                    </div>
                </div>
            </div>

            <!-- Categories Section -->
            <div id="categories" class="content-section">
                <div class="section-header">
                    <h2 class="section-title">Category Management</h2>
                    <button class="btn btn-primary">
                        <i class="fas fa-plus"></i> Add Category
                    </button>
                </div>

                <div class="form-grid">
                    <div class="card">
                        <h3>Main Categories</h3>
                        <div class="table-container">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Category Name</th>
                                        <th>Products</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Electronics</td>
                                        <td>156</td>
                                        <td>
                                            <button class="btn btn-warning" style="margin-right: 5px; padding: 5px 10px;">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-danger" style="padding: 5px 10px;">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Clothing</td>
                                        <td>89</td>
                                        <td>
                                            <button class="btn btn-warning" style="margin-right: 5px; padding: 5px 10px;">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-danger" style="padding: 5px 10px;">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card">
                        <h3>Subcategories</h3>
                        <div class="table-container">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Subcategory</th>
                                        <th>Parent Category</th>
                                        <th>Products</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Phones</td>
                                        <td>Electronics</td>
                                        <td>67</td>
                                        <td>
                                            <button class="btn btn-warning" style="margin-right: 5px; padding: 5px 10px;">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-danger" style="padding: 5px 10px;">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Computers</td>
                                        <td>Electronics</td>
                                        <td>45</td>
                                        <td>
                                            <button class="btn btn-warning" style="margin-right: 5px; padding: 5px 10px;">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-danger" style="padding: 5px 10px;">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Inventory Section -->
            <div id="inventory" class="content-section">
                <div class="section-header">
                    <h2 class="section-title">Inventory Management</h2>
                    <button class="btn btn-primary">
                        <i class="fas fa-sync"></i> Sync Inventory
                    </button>
                </div>

                <div class="dashboard-cards">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-icon" style="background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);">
                                <i class="fas fa-exclamation-triangle"></i>
                            </div>
                        </div>
                        <div class="card-value">23</div>
                        <div class="card-label">Low Stock Items</div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <div class="card-icon" style="background: linear-gradient(135deg, #6b7280 0%, #4b5563 100%);">
                                <i class="fas fa-box-open"></i>
                            </div>
                        </div>
                        <div class="card-value">5</div>
                        <div class="card-label">Out of Stock</div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <div class="card-icon" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%);">
                                <i class="fas fa-check-circle"></i>
                            </div>
                        </div>
                        <div class="card-value">534</div>
                        <div class="card-label">In Stock</div>
                    </div>
                </div>

                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Current Stock</th>
                                <th>Minimum Stock</th>
                                <th>Status</th>
                                <th>Last Updated</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>iPhone 14 Pro</td>
                                <td>25</td>
                                <td>10</td>
                                <td><span class="status-badge status-delivered">In Stock</span></td>
                                <td>2025-01-15</td>
                                <td>
                                    <button class="btn btn-primary" style="padding: 5px 10px;">
                                        <i class="fas fa-edit"></i> Adjust
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>Samsung Galaxy S23</td>
                                <td>5</td>
                                <td>10</td>
                                <td><span class="status-badge status-pending">Pending</span></td>
                                <td>2025-01-15</td>
                                <td>
                                    <button class="btn btn-success" style="margin-right: 5px; padding: 5px 10px;">
                                        <i class="fas fa-check"></i> Confirm
                                    </button>
                                    <button class="btn btn-danger" style="padding: 5px 10px;">
                                        <i class="fas fa-times"></i> Cancel
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>#ORD-002</td>
                                <td>Jane Smith</td>
                                <td>Samsung Galaxy S23</td>
                                <td>$799</td>
                                <td><span class="status-badge status-processing">Processing</span></td>
                                <td>2025-01-14</td>
                                <td>
                                    <button class="btn btn-primary" style="margin-right: 5px; padding: 5px 10px;">
                                        <i class="fas fa-shipping-fast"></i> Ship
                                    </button>
                                    <button class="btn btn-warning" style="padding: 5px 10px;">
                                        <i class="fas fa-eye"></i> View
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>#ORD-003</td>
                                <td>Mike Johnson</td>
                                <td>MacBook Pro M2</td>
                                <td>$1,999</td>
                                <td><span class="status-badge status-shipped">Shipped</span></td>
                                <td>2025-01-13</td>
                                <td>
                                    <button class="btn btn-success" style="margin-right: 5px; padding: 5px 10px;">
                                        <i class="fas fa-check-circle"></i> Deliver
                                    </button>
                                    <button class="btn btn-warning" style="padding: 5px 10px;">
                                        <i class="fas fa-eye"></i> View
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Customers Section -->
            <div id="customers" class="content-section">
                <div class="section-header">
                    <h2 class="section-title">Customer Management</h2>
                    <button class="btn btn-primary">
                        <i class="fas fa-user-plus"></i> Add Customer
                    </button>
                </div>

                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Customer ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Orders</th>
                                <th>Total Spent</th>
                                <th>Join Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#CUST-001</td>
                                <td>John Doe</td>
                                <td>john.doe@email.com</td>
                                <td>+1 (555) 123-4567</td>
                                <td>12</td>
                                <td>$3,456</td>
                                <td>2024-03-15</td>
                                <td>
                                    <button class="btn btn-primary" style="margin-right: 5px; padding: 5px 10px;">
                                        <i class="fas fa-eye"></i> View
                                    </button>
                                    <button class="btn btn-warning" style="padding: 5px 10px;">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>#CUST-002</td>
                                <td>Jane Smith</td>
                                <td>jane.smith@email.com</td>
                                <td>+1 (555) 987-6543</td>
                                <td>8</td>
                                <td>$2,134</td>
                                <td>2024-05-22</td>
                                <td>
                                    <button class="btn btn-primary" style="margin-right: 5px; padding: 5px 10px;">
                                        <i class="fas fa-eye"></i> View
                                    </button>
                                    <button class="btn btn-warning" style="padding: 5px 10px;">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>#CUST-003</td>
                                <td>Mike Johnson</td>
                                <td>mike.johnson@email.com</td>
                                <td>+1 (555) 456-7890</td>
                                <td>15</td>
                                <td>$5,678</td>
                                <td>2024-01-10</td>
                                <td>
                                    <button class="btn btn-primary" style="margin-right: 5px; padding: 5px 10px;">
                                        <i class="fas fa-eye"></i> View
                                    </button>
                                    <button class="btn btn-warning" style="padding: 5px 10px;">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Reports Section -->
            <div id="reports" class="content-section">
                <div class="section-header">
                    <h2 class="section-title">Reports & Analytics</h2>
                    <select class="btn" style="background: white; border: 2px solid #e5e7eb; color: #333;">
                        <option>Last 30 Days</option>
                        <option>Last 7 Days</option>
                        <option>Last 3 Months</option>
                        <option>Last Year</option>
                    </select>
                </div>

                <div class="dashboard-cards">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-icon" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                                <i class="fas fa-chart-line"></i>
                            </div>
                        </div>
                        <div class="card-value">$45,678</div>
                        <div class="card-label">Monthly Revenue</div>
                        <div class="card-trend trend-up">
                            <i class="fas fa-arrow-up"></i>
                            <span>18% vs last month</span>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <div class="card-icon" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%);">
                                <i class="fas fa-shopping-bag"></i>
                            </div>
                        </div>
                        <div class="card-value">1,234</div>
                        <div class="card-label">Orders This Month</div>
                        <div class="card-trend trend-up">
                            <i class="fas fa-arrow-up"></i>
                            <span>12% vs last month</span>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <div class="card-icon" style="background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);">
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                        <div class="card-value">156</div>
                        <div class="card-label">Best Selling Product</div>
                        <div class="card-trend">
                            <span>iPhone 14 Pro</span>
                        </div>
                    </div>
                </div>

                <div class="form-grid">
                    <div class="card">
                        <h3>Sales Report</h3>
                        <div class="chart-container">
                            <i class="fas fa-chart-bar" style="font-size: 48px; margin-bottom: 10px;"></i>
                            <div>Sales Chart Placeholder</div>
                            <div style="font-size: 14px; margin-top: 10px;">Daily, Weekly, Monthly sales visualization</div>
                        </div>
                    </div>
                    <div class="card">
                        <h3>Product Performance</h3>
                        <div class="chart-container">
                            <i class="fas fa-chart-pie" style="font-size: 48px; margin-bottom: 10px;"></i>
                            <div>Product Chart Placeholder</div>
                            <div style="font-size: 14px; margin-top: 10px;">Best sellers and low stock items</div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <h3>Detailed Reports</h3>
                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>Report Type</th>
                                    <th>Period</th>
                                    <th>Total Sales</th>
                                    <th>Orders</th>
                                    <th>Average Order Value</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Daily Sales</td>
                                    <td>Today</td>
                                    <td>$1,234</td>
                                    <td>23</td>
                                    <td>$53.65</td>
                                    <td>
                                        <button class="btn btn-primary" style="padding: 5px 10px;">
                                            <i class="fas fa-download"></i> Export
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Weekly Sales</td>
                                    <td>This Week</td>
                                    <td>$8,765</td>
                                    <td>156</td>
                                    <td>$56.19</td>
                                    <td>
                                        <button class="btn btn-primary" style="padding: 5px 10px;">
                                            <i class="fas fa-download"></i> Export
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Monthly Sales</td>
                                    <td>This Month</td>
                                    <td>$45,678</td>
                                    <td>1,234</td>
                                    <td>$37.01</td>
                                    <td>
                                        <button class="btn btn-primary" style="padding: 5px 10px;">
                                            <i class="fas fa-download"></i> Export
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Navigation functionality
        document.querySelectorAll('.menu-item').forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Remove active class from all menu items
                document.querySelectorAll('.menu-item').forEach(menuItem => {
                    menuItem.classList.remove('active');
                });
                
                // Add active class to clicked item
                this.classList.add('active');
                
                // Hide all content sections
                document.querySelectorAll('.content-section').forEach(section => {
                    section.classList.remove('active');
                });
                
                // Show selected section
                const targetSection = this.getAttribute('href').substring(1);
                document.getElementById(targetSection).classList.add('active');
                
                // Update page title
                const titles = {
                    'dashboard': 'Dashboard Overview',
                    'products': 'Product Management',
                    'categories': 'Category Management',
                    'inventory': 'Inventory Management',
                    'orders': 'Order Management',
                    'customers': 'Customer Management',
                    'reports': 'Reports & Analytics'
                };
                document.getElementById('page-title').textContent = titles[targetSection];
            });
        });

        // Product form functions
        function showAddProductForm() {
            document.getElementById('product-list').style.display = 'none';
            document.getElementById('product-form').style.display = 'block';
        }

        function hideAddProductForm() {
            document.getElementById('product-list').style.display = 'block';
            document.getElementById('product-form').style.display = 'none';
        }

        // Mobile sidebar toggle (for future mobile optimization)
        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');
            sidebar.classList.toggle('active');
        }

        // Add some interactive effects
        document.querySelectorAll('.card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });

        // Simulate real-time updates (optional)
        function updateDashboardStats() {
            // This would typically fetch real data from your PHP backend
            const cards = document.querySelectorAll('.card-value');
            cards.forEach(card => {
                // Add a subtle animation to simulate live updates
                card.style.transform = 'scale(1.05)';
                setTimeout(() => {
                    card.style.transform = 'scale(1)';
                }, 200);
            });
        }

        // Update stats every 30 seconds (optional)
        setInterval(updateDashboardStats, 30000);
    </script>
</body>
</html>Low Stock</span></td>
                                <td>2025-01-14</td>
                                <td>
                                    <button class="btn btn-primary" style="padding: 5px 10px;">
                                        <i class="fas fa-edit"></i> Adjust
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>MacBook Pro M2</td>
                                <td>0</td>
                                <td>5</td>
                                <td><span class="status-badge status-cancelled">Out of Stock</span></td>
                                <td>2025-01-13</td>
                                <td>
                                    <button class="btn btn-primary" style="padding: 5px 10px;">
                                        <i class="fas fa-edit"></i> Adjust
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Orders Section -->
            <div id="orders" class="content-section">
                <div class="section-header">
                    <h2 class="section-title">Order Management</h2>
                    <select class="btn" style="background: white; border: 2px solid #e5e7eb; color: #333;">
                        <option>All Orders</option>
                        <option>Pending</option>
                        <option>Processing</option>
                        <option>Shipped</option>
                        <option>Delivered</option>
                    </select>
                </div>

                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Products</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#ORD-001</td>
                                <td>John Doe</td>
                                <td>iPhone 14 Pro, Case</td>
                                <td>$1,049</td>
                                <td><span class="status-badge status-pending">