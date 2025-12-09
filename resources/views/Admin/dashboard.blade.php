<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - SiToko</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>

<body class="bg-red-50 text-gray-800 font-sans antialiased">

    <div class="flex h-screen overflow-hidden">

        @include('admin._sidebar', ['active' => 'dashboard', 'verifCount' => 0])

        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-red-50 p-6 md:p-8">
            
            <div class="mb-8 bg-white rounded-2xl p-6 shadow-sm border border-red-100 flex justify-between items-center">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Selamat Datang Kembali! 👋</h2>
                    <p class="text-gray-500 text-sm mt-1">Ringkasan aktivitas platform SiToko hari ini.</p>
                </div>
                <div class="h-10 w-10 bg-red-200 rounded-full flex items-center justify-center text-red-500 font-bold">A</div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-red-50 hover:shadow-md transition-shadow">
                    <h3 class="text-sm font-semibold text-gray-600">Total Produk</h3>
                    <div class="flex items-end justify-between mt-4">
                        <span class="text-3xl font-bold text-gray-800">{{ number_format($totalProducts) }}</span>
                        <span class="text-xs font-medium {{ $productsGrowth >= 0 ? 'text-green-600 bg-green-100' : 'text-red-600 bg-red-100' }} px-2 py-1 rounded-lg">
                            {{ $productsGrowth >= 0 ? '↑' : '↓' }} {{ number_format(abs($productsGrowth), 1) }}%
                        </span>
                    </div>
                    <p class="text-xs text-gray-400 mt-2">vs bulan lalu</p>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-red-50 hover:shadow-md transition-shadow">
                    <h3 class="text-sm font-semibold text-gray-600">Total Toko Terdaftar</h3>
                    <div class="flex items-end justify-between mt-4">
                        <span class="text-3xl font-bold text-gray-800">{{ number_format($totalSellers) }}</span>
                        <span class="text-xs font-medium {{ $sellersGrowth >= 0 ? 'text-green-600 bg-green-100' : 'text-red-600 bg-red-100' }} px-2 py-1 rounded-lg">
                            {{ $sellersGrowth >= 0 ? '↑' : '↓' }} {{ number_format(abs($sellersGrowth), 1) }}%
                        </span>
                    </div>
                    <p class="text-xs text-gray-400 mt-2">vs bulan lalu</p>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-red-50 hover:shadow-md transition-shadow">
                    <h3 class="text-sm font-semibold text-gray-600">Review & Rating Masuk</h3>
                    <div class="flex items-end justify-between mt-4">
                        <span class="text-3xl font-bold text-gray-800">{{ $todayReviews }}</span>
                        <span class="text-xs font-medium text-red-500 bg-red-100 px-2 py-1 rounded-lg">Baru</span>
                    </div>
                    <p class="text-xs text-gray-400 mt-2">dari pembeli aktif hari ini</p>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-red-50 hover:shadow-md transition-shadow">
                    <h3 class="text-sm font-semibold text-gray-600">Kategori Aktif</h3>
                    <div class="flex items-end justify-between mt-4">
                        <span class="text-3xl font-bold text-gray-800">{{ $activeCategories }}</span>
                        <span class="text-xs font-medium text-green-600 bg-green-100 px-2 py-1 rounded-lg">Stabil</span>
                    </div>
                    <p class="text-xs text-gray-400 mt-2">{{ $topCategory ? $topCategory->name . ' paling tinggi' : 'Belum ada data' }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
                
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-red-50 lg:col-span-2">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Sebaran Produk per Kategori</h3>
                    <div class="relative h-64 w-full">
                        <canvas id="categoryChart"></canvas>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-red-50">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Status Penjual</h3>
                    <div class="relative h-48 w-full flex justify-center">
                        <canvas id="sellerStatusChart"></canvas>
                    </div>
                    <div class="mt-4 space-y-2">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Aktif Berjualan</span>
                            <span class="font-bold text-gray-800">{{ $activeSellers }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Non-Aktif/Libur</span>
                            <span class="font-bold text-gray-800">{{ $inactiveSellers }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm border border-red-50">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-bold text-gray-800">Sebaran Toko per Provinsi</h3>
                    <a href="{{ url('/dashboard-admin/seller-data') }}" class="text-sm text-red-400 font-semibold hover:text-red-600">Lihat Semua</a>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @php
                        $colors = ['blue', 'yellow', 'green', 'purple', 'red'];
                        $maxSellers = $sellersByRegion->max('total') ?? 1;
                    @endphp
                    
                    @foreach($sellersByRegion as $index => $regionData)
                        @php
                            $color = $colors[$index % count($colors)];
                            $percentage = ($regionData->total / $maxSellers) * 100;
                            $initials = strtoupper(substr($regionData->region->name ?? 'N/A', 0, 2));
                        @endphp
                        <div class="flex items-center p-4 border border-gray-100 rounded-xl hover:bg-red-50 transition-colors">
                            <div class="w-10 h-10 rounded-full bg-{{ $color }}-100 flex items-center justify-center text-{{ $color }}-500 font-bold mr-4">{{ $initials }}</div>
                            <div class="flex-1">
                                <h4 class="text-sm font-bold text-gray-800">{{ $regionData->region->name ?? 'Unknown' }}</h4>
                                <div class="w-full bg-gray-200 rounded-full h-1.5 mt-2">
                                    <div class="bg-{{ $color }}-400 h-1.5 rounded-full" style="width: {{ $percentage }}%"></div>
                                </div>
                            </div>
                            <span class="ml-4 font-bold text-gray-700">{{ $regionData->total }} Toko</span>
                        </div>
                    @endforeach

                    @if($sellersByRegion->count() == 0)
                        <div class="col-span-3 text-center py-8 text-gray-400">
                            Belum ada data toko terdaftar
                        </div>
                    @endif
                </div>
            </div>

        </main>
    </div>

    <script>
        // Data dari backend
        const categoryData = {
            labels: {!! json_encode($productsByCategory->pluck('name')) !!},
            values: {!! json_encode($productsByCategory->pluck('products_count')) !!}
        };

        // 1. Chart Sebaran Produk berdasarkan Kategori (Bar Chart)
        const ctxCategory = document.getElementById('categoryChart').getContext('2d');
        new Chart(ctxCategory, {
            type: 'bar',
            data: {
                labels: categoryData.labels,
                datasets: [{
                    label: 'Jumlah Produk',
                    data: categoryData.values,
                    backgroundColor: '#FCA5A5',
                    hoverBackgroundColor: '#EF4444',
                    borderRadius: 6,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { borderDash: [2, 4], color: '#f3f4f6' }
                    },
                    x: {
                        grid: { display: false }
                    }
                }
            }
        });

        // 2. Chart Penjual Aktif vs Tidak Aktif (Doughnut Chart)
        const ctxSeller = document.getElementById('sellerStatusChart').getContext('2d');
        new Chart(ctxSeller, {
            type: 'doughnut',
            data: {
                labels: ['Aktif', 'Tidak Aktif'],
                datasets: [{
                    data: [{{ $activeSellers }}, {{ $inactiveSellers }}],
                    backgroundColor: ['#34D399', '#F87171'],
                    borderWidth: 0,
                    hoverOffset: 4
                }]
            },
            options: {
                cutout: '70%',
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { position: 'bottom', labels: { usePointStyle: true, boxWidth: 8 } }
                }
            }
        });
    </script>
    
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    
</body>
</html>