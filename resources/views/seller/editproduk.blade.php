<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
        .form-input { @apply w-full px-4 py-2 border-2 border-red-200 rounded-2xl text-sm font-medium bg-red-50 text-gray-700 focus:border-red-500 focus:ring-red-500; }
    </style>
</head>
<body class="bg-red-50">
<div class="flex min-h-screen overflow-auto">
    @include('seller.layouts.sidebar', ['activeMenu' => 'produk'])
    <main class="flex-1 p-6 md:p-8">
        <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-xl border border-red-200 p-8">
            <h1 class="text-3xl font-extrabold mb-6 text-red-600 tracking-tight">Edit Produk</h1>

            <form method="POST" action="{{ route('seller.produk.update', $product->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="space-y-6 mb-6">
                    <label class="block text-base font-bold text-gray-700 mb-2 font-sans">Kategori</label>
                    <select name="category_id" class="form-input border-2 rounded-2xl bg-gray-50 text-gray-700 focus:border-red-500 focus:ring-red-500" required>
                        @foreach($categories as $c)
                            <option value="{{ $c->id }}" @if($product->category_id == $c->id) selected @endif>{{ $c->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-base font-bold text-gray-700 mb-2 font-sans">Nama Produk</label>
                    <input type="text" name="name" value="{{ $product->name }}" required class="form-input border-2 rounded-2xl bg-gray-50 text-gray-700 focus:border-red-500 focus:ring-red-500">
                </div>

                <div class="mb-4">
                    <label class="block text-base font-bold text-gray-700 mb-2 font-sans">Harga</label>
                    <input type="number" name="price" value="{{ $product->price }}" min="0" required class="form-input border-2 rounded-2xl bg-gray-50 text-gray-700 focus:border-red-500 focus:ring-red-500">
                </div>

                <div class="mb-4">
                    <label class="block text-base font-bold text-gray-700 mb-2 font-sans">Stok</label>
                    <input type="number" name="stock" value="{{ $product->stock }}" min="0" class="form-input border-2 rounded-2xl bg-gray-50 text-gray-700 focus:border-red-500 focus:ring-red-500">
                </div>

                <div class="mb-6">
                    <label class="block text-base font-bold text-gray-700 mb-2 font-sans">Deskripsi</label>
                    <textarea name="description" rows="7" style="min-height:140px; width:100%; max-width:100%;" class="form-input border-2 rounded-2xl bg-gray-50 text-gray-700 p-3 resize-y focus:border-red-500">{{ $product->description }}</textarea>
                </div>

                <div class="mb-6">
                    <label class="block text-base font-bold text-gray-700 mb-2 font-sans">Foto (unggah untuk mengganti)</label>
                    <div class="flex items-center space-x-4">
                        <img src="{{ $product->image ?? '/images/products/default.png' }}" class="w-28 h-28 object-cover rounded-2xl border-2 border-red-200 bg-red-50">
                        <input type="file" name="image" accept="image/*" class="form-input border-2 rounded-2xl bg-red-50 text-gray-700 focus:border-red-500 focus:ring-red-500">
                    </div>
                </div>

                <div class="flex justify-end space-x-3 mt-8">
                    <a href="{{ route('seller.produk') }}" class="px-4 py-2 rounded bg-red-100 text-red-700">Batal</a>
                    <button type="submit" class="px-6 py-2 rounded bg-red-600 text-white hover:bg-red-700 transition">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </main>
</div>
</body>
</html>
