<?php
require "Views/partials/header.php";
require "Views/partials/nav.php";
require "Views/partials/subHeader.php";

// Get current URI (e.g., /ecommerce/products)
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Adjust this if your project is in a subfolder
$basePath = '/ecommerce';
$relativePath = str_replace($basePath, '', $uri);

// Routing logic
switch ($relativePath) {
    case '':
    case '/':
    case '/dashboard':
        $activeSection = 'dashboard';
        require "Views/dashboard.php";
        break;
    case '/products':
        $activeSection = 'products';
        require "Views/products.php";
        break;
    case '/category':
        $activeSection = 'category';
        require "Views/category.php";
        break;
    default:
        http_response_code(404);
        echo "404 Not Found";
}

require "Views/partials/footer.php";
