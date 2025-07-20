<?php
session_start();

// Simple user authentication check
if (!isset($_SESSION['user_id'])) {
    $_SESSION['user_id'] = 1; // Default user for demo
    $_SESSION['username'] = 'Admin';
    $_SESSION['role'] = 'admin';
}

// Mock database data (in a real app, this would come from a database)
$todos = [
    ['id' => 1, 'title' => 'Complete project documentation', 'description' => 'Write comprehensive docs for the new feature', 'status' => 'pending', 'priority' => 'high', 'created_at' => '2025-01-10', 'assigned_to' => 1],
    ['id' => 2, 'title' => 'Fix login bug', 'description' => 'Users cannot login with special characters', 'status' => 'in_progress', 'priority' => 'urgent', 'created_at' => '2025-01-09', 'assigned_to' => 2],
    ['id' => 3, 'title' => 'Update dependencies', 'description' => 'Upgrade all npm packages to latest versions', 'status' => 'completed', 'priority' => 'medium', 'created_at' => '2025-01-08', 'assigned_to' => 1],
    ['id' => 4, 'title' => 'Design new UI components', 'description' => 'Create mockups for dashboard widgets', 'status' => 'pending', 'priority' => 'low', 'created_at' => '2025-01-07', 'assigned_to' => 3],
    ['id' => 5, 'title' => 'Database optimization', 'description' => 'Optimize slow queries and add indexes', 'status' => 'in_progress', 'priority' => 'high', 'created_at' => '2025-01-06', 'assigned_to' => 2],
];

$users = [
    ['id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com', 'role' => 'admin', 'status' => 'active', 'created_at' => '2025-01-01'],
    ['id' => 2, 'name' => 'Jane Smith', 'email' => 'jane@example.com', 'role' => 'user', 'status' => 'active', 'created_at' => '2025-01-02'],
    ['id' => 3, 'name' => 'Mike Johnson', 'email' => 'mike@example.com', 'role' => 'user', 'status' => 'inactive', 'created_at' => '2025-01-03'],
];

// Get current page
$page = $_GET['page'] ?? 'dashboard';

// Calculate dashboard stats
$totalTodos = count($todos);
$completedTodos = count(array_filter($todos, fn($t) => $t['status'] === 'completed'));
$pendingTodos = count(array_filter($todos, fn($t) => $t['status'] === 'pending'));
$inProgressTodos = count(array_filter($todos, fn($t) => $t['status'] === 'in_progress'));
$totalUsers = count($users);
$activeUsers = count(array_filter($users, fn($u) => $u['status'] === 'active'));

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_todo'])) {
        // Add new todo (simplified)
        $newTodo = [
            'id' => count($todos) + 1,
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'status' => 'pending',
            'priority' => $_POST['priority'],
            'created_at' => date('Y-m-d'),
            'assigned_to' => $_POST['assigned_to']
        ];
        $todos[] = $newTodo;
    }
    
    if (isset($_POST['add_user'])) {
        // Add new user (simplified)
        $newUser = [
            'id' => count($users) + 1,
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'role' => $_POST['role'],
            'status' => 'active',
            'created_at' => date('Y-m-d')
        ];
        $users[] = $newUser;
    }
}

function getPriorityColor($priority) {
    switch ($priority) {
        case 'urgent': return 'bg-red-100 text-red-800';
        case 'high': return 'bg-orange-100 text-orange-800';
        case 'medium': return 'bg-yellow-100 text-yellow-800';
        case 'low': return 'bg-green-100 text-green-800';
        default: return 'bg-gray-100 text-gray-800';
    }
}

function getStatusColor($status) {
    switch ($status) {
        case 'completed': return 'bg-green-100 text-green-800';
        case 'in_progress': return 'bg-blue-100 text-blue-800';
        case 'pending': return 'bg-yellow-100 text-yellow-800';
        default: return 'bg-gray-100 text-gray-800';
    }
}

function getUserName($userId, $users) {
    foreach ($users as $user) {
        if ($user['id'] == $userId) {
            return $user['name'];
        }
    }
    return 'Unknown';
}
?>