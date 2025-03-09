@extends('dashboard.layout.base')

@section('content')
    <!-- Main Content -->
    <main class="flex-1 p-6 overflow-auto">
        <h1 class="text-2xl font-semibold mb-4">Dashboard Overview</h1>

        <!-- Graphs Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <!-- Graph 1 -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="font-bold text-lg mb-2">Sales Overview</h2>
                <canvas id="salesChart"></canvas>
            </div>

            <!-- Graph 2 -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="font-bold text-lg mb-2">Revenue Growth</h2>
                <canvas id="revenueChart"></canvas>
            </div>

            <!-- Graph 3 -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="font-bold text-lg mb-2">User Engagement</h2>
                <canvas id="engagementChart"></canvas>
            </div>

            <!-- Graph 4 -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="font-bold text-lg mb-2">Traffic Analysis</h2>
                <canvas id="trafficChart"></canvas>
            </div>
        </div>

        <!-- Tables Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Table 1 -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="font-bold text-lg mb-2">Recent Orders</h2>
                <table class="w-full border-collapse border border-gray-300">
                    <thead class="bg-gray-200">
                    <tr>
                        <th class="border p-2">Order ID</th>
                        <th class="border p-2">Customer</th>
                        <th class="border p-2">Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="border">
                        <td class="border p-2">#1001</td>
                        <td class="border p-2">John Doe</td>
                        <td class="border p-2">$200</td>
                    </tr>
                    <tr class="border">
                        <td class="border p-2">#1002</td>
                        <td class="border p-2">Jane Smith</td>
                        <td class="border p-2">$150</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <!-- Table 2 -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="font-bold text-lg mb-2">Top Products</h2>
                <table class="w-full border-collapse border border-gray-300">
                    <thead class="bg-gray-200">
                    <tr>
                        <th class="border p-2">Product</th>
                        <th class="border p-2">Sales</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="border">
                        <td class="border p-2">Laptop</td>
                        <td class="border p-2">500</td>
                    </tr>
                    <tr class="border">
                        <td class="border p-2">Headphones</td>
                        <td class="border p-2">350</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Sales Chart
        const salesChart = new Chart(document.getElementById('salesChart'), {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Sales',
                    data: [100, 200, 150, 300, 250, 400],
                    borderColor: 'blue',
                    borderWidth: 2
                }]
            }
        });

        // Revenue Chart
        const revenueChart = new Chart(document.getElementById('revenueChart'), {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Revenue',
                    data: [500, 700, 800, 600, 900, 1100],
                    backgroundColor: 'green'
                }]
            }
        });

        // Engagement Chart
        const engagementChart = new Chart(document.getElementById('engagementChart'), {
            type: 'pie',
            data: {
                labels: ['Active', 'Inactive', 'New'],
                datasets: [{
                    label: 'User Engagement',
                    data: [60, 25, 15],
                    backgroundColor: ['blue', 'gray', 'orange']
                }]
            }
        });

        // Traffic Chart
        const trafficChart = new Chart(document.getElementById('trafficChart'), {
            type: 'doughnut',
            data: {
                labels: ['Desktop', 'Mobile', 'Tablet'],
                datasets: [{
                    label: 'Traffic',
                    data: [55, 35, 10],
                    backgroundColor: ['red', 'yellow', 'purple']
                }]
            }
        });
    </script>
@endsection
