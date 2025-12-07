<nav class="bg-white border-b border-gray-200 sticky top-0 z-50 shadow-sm transition-all duration-300" id="navbar">
    <div class="tokped-container h-16 flex items-center justify-between gap-6">
        <a href="/" class="flex items-center gap-2 text-[#FF9894] hover:text-pink-600 transition group">
            <div class="bg-pink-50 p-2 rounded-lg group-hover:bg-pink-100 transition">
                <i class="fa-solid fa-bag-shopping text-xl"></i>
            </div>
            <span class="font-bold text-xl tracking-tight hidden md:block">SiToko</span>
        </a>

        <div class="hidden md:flex flex-1 max-w-2xl relative">
            <form action="/products" method="get" class="w-full">
                <input name="q" value="{{ request('q') }}" type="text" placeholder="Cari barang di SiToko..." class="w-full border border-gray-300 rounded-lg py-2 px-4 pl-10 focus:outline-none focus:border-[#FF9894] focus:ring-1 focus:ring-[#FF9894] transition-all text-sm">
                <button type="submit" class="absolute left-0 top-0 h-full pl-3 pr-3 text-gray-400">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
        </div>

        <div class="flex items-center gap-3 shrink-0">
            <a href="/login-seller" class="text-sm font-semibold text-gray-600 hover:text-[#FF7A7A] transition-colors flex items-center gap-2">
                <i class="fa-solid fa-store"></i> Masuk Toko
            </a>
            
            <a href="/register-seller" class="bg-[#FF7A7A] text-white px-5 py-2.5 rounded-lg text-sm font-bold shadow-md hover:bg-[#ff6363] hover:-translate-y-0.5 transition-all duration-300 flex items-center gap-2">
                <i class="fa-solid fa-plus"></i> Buka Toko
            </a>
        </div>
    </div>
</nav>
