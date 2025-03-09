<div class="h-screen w-64 bg-gray-900 text-white flex flex-col p-4 space-y-6">

    <!-- Logo -->
    <div class="text-xl font-bold tracking-wide text-center">
        <a href="{{ url('/dashboard') }}">ECOMMERCE STORE</a>
    </div>

    <!-- Navigation Links -->
    <nav class="flex flex-col space-y-2">
        <a href="{{ url('/dashboard') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-gray-800 transition">
            <i data-lucide="home" class="w-5 h-5 mr-3"></i>
            <span>Dashboard</span>
        </a>
        <a href="#" class="flex items-center px-4 py-3 rounded-lg hover:bg-gray-800 transition">
            <i data-lucide="users" class="w-5 h-5 mr-3"></i>
            <span>Users</span>
        </a>
        <a href="#" class="flex items-center px-4 py-3 rounded-lg hover:bg-gray-800 transition">
            <i data-lucide="package" class="w-5 h-5 mr-3"></i>
            <span>Categories</span>
        </a>
        <a href="#" class="flex items-center px-4 py-3 rounded-lg hover:bg-gray-800 transition">
            <i data-lucide="shopping-cart" class="w-5 h-5 mr-3"></i>
            <span>Products</span>
        </a>
        <a href="#" class="flex items-center px-4 py-3 rounded-lg hover:bg-gray-800 transition">
            <i data-lucide="settings" class="w-5 h-5 mr-3"></i>
            <span>Settings</span>
        </a>
    </nav>

    <!-- Logout Button -->
    <a href="#" class="mt-auto flex items-center px-4 py-3 text-red-400 hover:bg-red-500 hover:text-white rounded-lg transition">
        <i data-lucide="log-out" class="w-5 h-5 mr-3"></i>
        <span>Logout</span>
    </a>
</div>

<!-- Lucide Icons Script -->
<script>
    lucide.createIcons();
</script>
