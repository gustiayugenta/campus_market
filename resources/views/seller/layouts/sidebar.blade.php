<aside class="w-64 bg-white hidden md:flex flex-col border-r border-red-100">
    <div class="p-6">
        <h1 class="text-xl font-bold text-gray-800">SiToko</h1>
        <p class="text-xs text-red-500 font-semibold mt-1">Power Merchant CampusMarket</p>
    </div>
    <nav class="flex-1 px-4 space-y-2">
        <p class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Menu Utama</p>
        <a href="{{ route('seller.dashboard') }}"
           class="flex items-center px-4 py-3 rounded-xl shadow-md transition-colors {{ ($activeMenu ?? '') == 'dashboard' ? 'bg-red-500 text-white' : 'text-gray-600 hover:bg-red-50 hover:text-red-500' }}">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
            Home
        </a>
        <a href="{{ route('seller.produk') }}"
           class="flex items-center px-4 py-3 rounded-xl shadow-md transition-colors {{ ($activeMenu ?? '') == 'produk' ? 'bg-red-500 text-white' : 'text-gray-600 hover:bg-red-50 hover:text-red-500' }}">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path></svg>
            Produk
        </a>
        <a href="{{ route('seller.cetaklaporan') }}"
           class="flex items-center px-4 py-3 rounded-xl shadow-md transition-colors {{ ($activeMenu ?? '') == 'laporan' ? 'bg-red-500 text-white' : 'text-gray-600 hover:bg-red-50 hover:text-red-500' }}">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zM9 11h6"></path></svg>
            Cetak Laporan
        </a>
        <a href="#"
           class="flex items-center px-4 py-3 rounded-xl shadow-md transition-colors text-gray-600 hover:bg-red-50 hover:text-red-500"
           onclick="event.preventDefault(); document.getElementById('logout-modal').classList.remove('hidden');">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
            Logout
        </a>
    </nav>
</aside>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
    @csrf
</form>

<!-- Modal Logout -->
<div id="logout-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-30 hidden">
    <div class="bg-white rounded-xl shadow-lg p-0 w-full max-w-md text-center">
        <div class="flex flex-col items-center pt-8 pb-2">
            <span class="inline-block bg-red-100 rounded-full p-3 mb-2">
                <svg class="w-8 h-8 text-red-500" fill="none" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10" fill="#FEE2E2"/>
                    <path d="M12 8v4" stroke="#EF4444" stroke-width="2" stroke-linecap="round"/>
                    <circle cx="12" cy="16" r="1" fill="#EF4444"/>
                </svg>
            </span>
            <h3 class="text-xl font-bold text-gray-800 mb-4">Apakah Anda yakin ingin keluar?</h3>
        </div>
        <div class="flex justify-center gap-4 px-8 pb-8">
            <button onclick="document.getElementById('logout-modal').classList.add('hidden');" class="flex-1 py-3 rounded-lg bg-gray-100 text-gray-600 font-semibold text-lg">Batal</button>
            <button onclick="document.getElementById('logout-form').submit();" class="flex-1 py-3 rounded-lg bg-red-500 text-white font-semibold text-lg">Ya, Keluar</button>
        </div>
    </div>
</div>