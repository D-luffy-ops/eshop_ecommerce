<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .sidebar-link.active {
            background-color: #3b82f6;
            color: white;
        }

        .table-hover:hover {
            background-color: #f8fafc;
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .card-shadow {
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
    </style>
</head>

<body class="bg-gray-50">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="bg-white shadow-xl w-64 fixed h-full z-10">
            <div class="p-6 border-b gradient-bg">
                <h1 class="text-xl font-bold text-white">
                    <i class="fas fa-tasks mr-2"></i>
                    Todo Manager
                </h1>
                <p class="text-blue-100 text-sm mt-1">Manage your tasks efficiently</p>
            </div>

            <nav class="mt-6">
                <a href="#" onclick="showPage('dashboard')" class="sidebar-link flex items-center px-6 py-4 text-gray-700 hover:bg-blue-50 transition-all duration-200 active">
                    <i class="fas fa-chart-dashboard mr-3 text-lg"></i>
                    <span class="font-medium">Dashboard</span>
                </a>
                <a href="#" onclick="showPage('todos')" class="sidebar-link flex items-center px-6 py-4 text-gray-700 hover:bg-blue-50 transition-all duration-200">
                    <i class="fas fa-list-check mr-3 text-lg"></i>
                    <span class="font-medium">Todo List</span>
                </a>
                <a href="#" onclick="showPage('users')" class="sidebar-link flex items-center px-6 py-4 text-gray-700 hover:bg-blue-50 transition-all duration-200">
                    <i class="fas fa-users mr-3 text-lg"></i>
                    <span class="font-medium">User Management</span>
                </a>
                <a href="#" class="sidebar-link flex items-center px-6 py-4 text-gray-700 hover:bg-blue-50 transition-all duration-200">
                    <i class="fas fa-chart-bar mr-3 text-lg"></i>
                    <span class="font-medium">Reports</span>
                </a>
                <a href="#" class="sidebar-link flex items-center px-6 py-4 text-gray-700 hover:bg-blue-50 transition-all duration-200">
                    <i class="fas fa-cog mr-3 text-lg"></i>
                    <span class="font-medium">Settings</span>
                </a>
            </nav>

            <div class="absolute bottom-0 w-full p-6 border-t bg-gray-50">
                <div class="flex items-center">
                    <div class="w-12 h-12 gradient-bg rounded-full flex items-center justify-center">
                        <i class="fas fa-user text-white"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-semibold text-gray-700">John Doe</p>
                        <p class="text-xs text-gray-500">Administrator</p>
                    </div>
                    <div class="ml-auto">
                        <button class="text-gray-400 hover:text-gray-600">
                            <i class="fas fa-sign-out-alt"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 ml-64 p-8 overflow-y-auto">
            <!-- Dashboard Page -->
            <div id="dashboard-page" class="page">
                <div class="mb-8">
                    <h2 class="text-3xl font-bold text-gray-800 mb-2">Dashboard</h2>
                    <p class="text-gray-600">Welcome back! Here's what's happening with your tasks today.</p>
                </div>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white rounded-xl shadow-lg p-6 card-shadow transform hover:scale-105 transition-all duration-300">
                        <div class="flex items-center">
                            <div class="p-3 bg-blue-100 rounded-xl">
                                <i class="fas fa-list text-blue-600 text-2xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Total Tasks</p>
                                <p class="text-3xl font-bold text-gray-900">24</p>
                                <p class="text-xs text-green-600 mt-1">
                                    <i class="fas fa-arrow-up mr-1"></i>12% from last week
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg p-6 card-shadow transform hover:scale-105 transition-all duration-300">
                        <div class="flex items-center">
                            <div class="p-3 bg-green-100 rounded-xl">
                                <i class="fas fa-check-circle text-green-600 text-2xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Completed</p>
                                <p class="text-3xl font-bold text-gray-900">18</p>
                                <p class="text-xs text-green-600 mt-1">
                                    <i class="fas fa-arrow-up mr-1"></i>8% from last week
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg p-6 card-shadow transform hover:scale-105 transition-all duration-300">
                        <div class="flex items-center">
                            <div class="p-3 bg-orange-100 rounded-xl">
                                <i class="fas fa-clock text-orange-600 text-2xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">In Progress</p>
                                <p class="text-3xl font-bold text-gray-900">4</p>
                                <p class="text-xs text-orange-600 mt-1">
                                    <i class="fas fa-arrow-down mr-1"></i>3% from last week
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg p-6 card-shadow transform hover:scale-105 transition-all duration-300">
                        <div class="flex items-center">
                            <div class="p-3 bg-purple-100 rounded-xl">
                                <i class="fas fa-users text-purple-600 text-2xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Team Members</p>
                                <p class="text-3xl font-bold text-gray-900">12</p>
                                <p class="text-xs text-green-600 mt-1">
                                    <i class="fas fa-arrow-up mr-1"></i>2 new this month
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity & Quick Actions -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                    <div class="lg:col-span-2">
                        <div class="bg-white rounded-xl shadow-lg card-shadow">
                            <div class="px-6 py-4 border-b border-gray-200">
                                <h3 class="text-lg font-semibold text-gray-900">Recent Tasks</h3>
                            </div>
                            <div class="p-6">
                                <div class="space-y-4">
                                    <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                                        <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                                            <i class="fas fa-check text-green-600"></i>
                                        </div>
                                        <div class="ml-4 flex-1">
                                            <p class="text-sm font-medium text-gray-900">Complete project documentation</p>
                                            <p class="text-xs text-gray-500">Completed 2 hours ago</p>
                                        </div>
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Completed</span>
                                    </div>

                                    <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                                        <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                            <i class="fas fa-clock text-blue-600"></i>
                                        </div>
                                        <div class="ml-4 flex-1">
                                            <p class="text-sm font-medium text-gray-900">Review code changes</p>
                                            <p class="text-xs text-gray-500">In progress</p>
                                        </div>
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">In Progress</span>
                                    </div>

                                    <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                                        <div class="w-10 h-10 bg-yellow-100 rounded-full flex items-center justify-center">
                                            <i class="fas fa-exclamation text-yellow-600"></i>
                                        </div>
                                        <div class="ml-4 flex-1">
                                            <p class="text-sm font-medium text-gray-900">Update user interface</p>
                                            <p class="text-xs text-gray-500">Pending</p>
                                        </div>
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div class="bg-white rounded-xl shadow-lg card-shadow">
                            <div class="px-6 py-4 border-b border-gray-200">
                                <h3 class="text-lg font-semibold text-gray-900">Quick Actions</h3>
                            </div>
                            <div class="p-6 space-y-3">
                                <button class="w-full btn-primary text-white px-4 py-3 rounded-lg font-medium">
                                    <i class="fas fa-plus mr-2"></i>New Task
                                </button>
                                <button class="w-full bg-gray-100 text-gray-700 px-4 py-3 rounded-lg font-medium hover:bg-gray-200 transition-colors">
                                    <i class="fas fa-user-plus mr-2"></i>Add User
                                </button>
                                <button class="w-full bg-gray-100 text-gray-700 px-4 py-3 rounded-lg font-medium hover:bg-gray-200 transition-colors">
                                    <i class="fas fa-download mr-2"></i>Export Report
                                </button>
                            </div>
                        </div>

                        <div class="bg-white rounded-xl shadow-lg card-shadow">
                            <div class="px-6 py-4 border-b border-gray-200">
                                <h3 class="text-lg font-semibold text-gray-900">Team Activity</h3>
                            </div>
                            <div class="p-6">
                                <div class="space-y-3">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                                            <span class="text-white text-xs font-semibold">JD</span>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-900">John Doe</p>
                                            <p class="text-xs text-gray-500">5 tasks completed</p>
                                        </div>
                                    </div>

                                    <div class="flex items-center">
                                        <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                                            <span class="text-white text-xs font-semibold">JS</span>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-900">Jane Smith</p>
                                            <p class="text-xs text-gray-500">3 tasks completed</p>
                                        </div>
                                    </div>

                                    <div class="flex items-center">
                                        <div class="w-8 h-8 bg-purple-500 rounded-full flex items-center justify-center">
                                            <span class="text-white text-xs font-semibold">MJ</span>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-900">Mike Johnson</p>
                                            <p class="text-xs text-gray-500">2 tasks completed</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Todo List Page -->
            <div id="todos-page" class="page hidden">
                <div class="mb-8">
                    <div class="flex justify-between items-center">
                        <div>
                            <h2 class="text-3xl font-bold text-gray-800 mb-2">Todo List</h2>
                            <p class="text-gray-600">Manage your tasks and track progress</p>
                        </div>
                        <button onclick="openModal('addTodoModal')" class="btn-primary text-white px-6 py-3 rounded-lg font-medium">
                            <i class="fas fa-plus mr-2"></i>Add New Task
                        </button>
                    </div>
                </div>

                <!-- Filters -->
                <div class="bg-white rounded-xl shadow-lg p-6 mb-6 card-shadow">
                    <div class="flex flex-wrap gap-4 items-center">
                        <div class="flex items-center space-x-2">
                            <label class="text-sm font-medium text-gray-700">Status:</label>
                            <select class="px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option>All</option>
                                <option>Pending</option>
                                <option>In Progress</option>
                                <option>Completed</option>
                            </select>
                        </div>
                        <div class="flex items-center space-x-2">
                            <label class="text-sm font-medium text-gray-700">Priority:</label>
                            <select class="px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option>All</option>
                                <option>Urgent</option>
                                <option>High</option>
                                <option>Medium</option>
                                <option>Low</option>
                            </select>
                        </div>
                        <div class="flex items-center space-x-2">
                            <label class="text-sm font-medium text-gray-700">Assigned to:</label>
                            <select class="px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option>All</option>
                                <option>John Doe</option>
                                <option>Jane Smith</option>
                                <option>Mike Johnson</option>
                            </select>
                        </div>
                        <div class="flex items-center space-x-2">
                            <input type="text" placeholder="Search tasks..." class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <button class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg card-shadow">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <input type="checkbox" class="rounded">
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Task</th>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Priority</th>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Assigned To</th>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Due Date</th>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Progress</th>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr class="table-hover">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <input type="checkbox" class="rounded">
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-900">Complete project documentation</div>
                                        <div class="text-sm text-gray-500">Write comprehensive documentation for the new feature implementation</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-3 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">
                                            <i class="fas fa-exclamation-triangle mr-1"></i>Urgent
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                            <i class="fas fa-check mr-1"></i>Completed
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                                                <span class="text-white text-xs font-semibold">JD</span>
                                            </div>
                                            <div class="ml-3">
                                                <div class="text-sm font-medium text-gray-900">John Doe</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        Jan 15, 2025
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-16 bg-gray-200 rounded-full h-2">
                                                <div class="bg-green-500 h-2 rounded-full" style="width: 100%"></div>
                                            </div>
                                            <span class="ml-2 text-xs text-gray-600">100%</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex space-x-2">
                                            <button class="text-blue-600 hover:text-blue-900 p-1">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="text-green-600 hover:text-green-900 p-1">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="text-red-600 hover:text-red-900 p-1">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <tr class="table-hover">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <input type="checkbox" class="rounded">
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-900">Fix login authentication bug</div>
                                        <div class="text-sm text-gray-500">Users cannot login with special characters in passwords</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-3 py-1 text-xs font-semibold rounded-full bg-orange-100 text-orange-800">
                                            <i class="fas fa-exclamation mr-1"></i>High
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-3 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                                            <i class="fas fa-clock mr-1"></i>In Progress
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                                                <span class="text-white text-xs font-semibold">JS</span>
                                            </div>
                                            <div class="ml-3">
                                                <div class="text-sm font-medium text-gray-900">Jane Smith</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        Jan 18, 2025
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-16 bg-gray-200 rounded-full h-2">
                                                <div class="bg-blue-500 h-2 rounded-full" style="width: 65%"></div>
                                            </div>
                                            <span class="ml-2 text-xs text-gray-600">65%</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex space-x-2">
                                            <button class="text-blue-600 hover:text-blue-900 p-1">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="text-green-600 hover:text-green-900 p-1">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="text-red-600 hover:text-red-900 p-1">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <tr class="table-hover">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <input type="checkbox" class="rounded">
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-900">Update dependencies</div>
                                        <div class="text-sm text-gray-500">Upgrade all npm packages to latest versions</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-3 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            <i class="fas fa-minus mr-1"></i>Medium
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-3 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            <i class="fas fa-pause mr-1"></i>Pending
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 bg-purple-500 rounded-full flex items-center justify-center">
                                                <span class="text-white text-xs font-semibold">MJ</span>
                                            </div>
                                            <div class="ml-3">
                                                <div class="text-sm font-medium text-gray-900">Mike Johnson</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        Jan 20, 2025
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-16 bg-gray-200 rounded-full h-2">
                                                <div class="bg-yellow-500 h-2 rounded-full" style="width: 10%"></div>
                                            </div>
                                            <span class="ml-2 text-xs text-gray-600">10%</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex space-x-2">
                                            <button class="text-blue-600 hover:text-blue-900 p-1">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="text-green-600 hover:text-green-900 p-1">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="text-red-600 hover:text-red-900 p-1">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>