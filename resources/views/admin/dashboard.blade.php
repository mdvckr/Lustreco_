@extends('layouts.store')

@section('title', 'Admin Panel | lustreco®')

@section('content')
<div class="bg-zinc-50 min-h-screen pt-24 pb-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Banner Premium Header --}}
        <div class="bg-zinc-950 text-white rounded-3xl p-8 mb-8 shadow-xl relative overflow-hidden flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_70%_120%,rgba(120,120,120,0.15),transparent_50%)]"></div>
            <div class="relative z-10">
                <span class="text-xs uppercase tracking-widest text-zinc-400 font-semibold">Administrator Console</span>
                <h1 class="text-3xl font-black tracking-tight mt-1">Lustreco Store Control</h1>
                <p class="text-sm text-zinc-400 mt-2">Manage store products, upload media assets, and track catalog listings.</p>
            </div>
            <div class="relative z-10 flex gap-3">
                <button onclick="toggleModal('product-modal')" class="bg-white text-zinc-950 hover:bg-zinc-100 px-6 py-3 rounded-full text-sm font-bold shadow-md transition flex items-center gap-2">
                    <i class="fa-solid fa-plus text-xs"></i> Add New Product
                </button>
            </div>
        </div>

        {{-- Statistics Cards --}}
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 mb-8">
            <div class="bg-white rounded-2xl border border-zinc-100 p-5 shadow-sm">
                <div class="flex items-center justify-between text-zinc-400 mb-2">
                    <span class="text-xs font-bold uppercase tracking-wider">Total Sales</span>
                    <i class="fa-solid fa-wallet text-base text-zinc-800"></i>
                </div>
                <div class="text-xl md:text-2xl font-black text-zinc-950">
                    Rp {{ number_format($stats['total_sales'], 0, ',', '.') }}
                </div>
                <div class="text-[10px] text-zinc-400 mt-1">From successful payments</div>
            </div>
            <div class="bg-white rounded-2xl border border-zinc-100 p-5 shadow-sm">
                <div class="flex items-center justify-between text-zinc-400 mb-2">
                    <span class="text-xs font-bold uppercase tracking-wider">Total Orders</span>
                    <i class="fa-solid fa-cart-shopping text-base text-zinc-800"></i>
                </div>
                <div class="text-xl md:text-2xl font-black text-zinc-950">
                    {{ $stats['total_orders'] }}
                </div>
                <div class="text-[10px] text-zinc-400 mt-1">{{ $stats['pending_orders'] }} pending / {{ $stats['processing_orders'] }} processing</div>
            </div>
            <div class="bg-white rounded-2xl border border-zinc-100 p-5 shadow-sm">
                <div class="flex items-center justify-between text-zinc-400 mb-2">
                    <span class="text-xs font-bold uppercase tracking-wider">Total Products</span>
                    <i class="fa-solid fa-box-open text-base text-zinc-800"></i>
                </div>
                <div class="text-xl md:text-2xl font-black text-zinc-950">
                    {{ $stats['total_products'] }}
                </div>
                <div class="text-[10px] text-zinc-400 mt-1">Live in store catalog</div>
            </div>
            <div class="bg-white rounded-2xl border border-zinc-100 p-5 shadow-sm">
                <div class="flex items-center justify-between text-zinc-400 mb-2">
                    <span class="text-xs font-bold uppercase tracking-wider">Active Customers</span>
                    <i class="fa-solid fa-users text-base text-zinc-800"></i>
                </div>
                <div class="text-xl md:text-2xl font-black text-zinc-950">
                    {{ $stats['total_users'] }}
                </div>
                <div class="text-[10px] text-zinc-400 mt-1">Registered accounts</div>
            </div>
        </div>

        {{-- Toast Notifikasi --}}
        @if(session('success'))
            <div class="mb-6 bg-zinc-900 text-white text-sm font-medium px-6 py-4 rounded-2xl shadow-lg border border-zinc-800 flex items-center gap-2 animate-pulse">
                <i class="fa-solid fa-circle-check text-emerald-400 text-base"></i>
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="mb-6 bg-red-950 text-red-200 text-sm font-medium px-6 py-4 rounded-2xl shadow-lg border border-red-900 flex items-center gap-2">
                <i class="fa-solid fa-triangle-exclamation text-red-400 text-base"></i>
                {{ session('error') }}
            </div>
        @endif

        {{-- Grid Utama Dashboard --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            {{-- Kiri & Tengah: Manajemen Produk (2/3 width) --}}
            <div class="lg:col-span-2 space-y-8">
                <div class="bg-white rounded-3xl border border-zinc-100 shadow-sm p-6 md:p-8">
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h2 class="text-xl font-bold text-zinc-900">Products Catalog</h2>
                            <p class="text-xs text-zinc-500 mt-0.5">List of locally created products in the database.</p>
                        </div>
                        <span class="bg-zinc-100 text-zinc-800 text-xs font-bold px-3 py-1.5 rounded-full">
                            {{ $products->count() }} Total
                        </span>
                    </div>

                    @if($products->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr class="border-b border-zinc-100 text-xs text-zinc-400 uppercase tracking-wider font-semibold">
                                        <th class="pb-3 w-20">Product</th>
                                        <th class="pb-3 px-4">Details</th>
                                        <th class="pb-3 text-right">Price</th>
                                        <th class="pb-3 text-center w-24">Stock</th>
                                        <th class="pb-3 text-center w-20">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-zinc-50">
                                    @foreach($products as $prod)
                                        <tr class="group">
                                            <td class="py-4">
                                                <div class="w-16 h-16 bg-zinc-50 rounded-2xl border border-zinc-100 overflow-hidden flex items-center justify-center p-1.5 shadow-sm group-hover:scale-105 transition-transform duration-200">
                                                    <img src="{{ $prod->image }}" alt="{{ $prod->name }}" class="max-w-full max-h-full object-contain">
                                                </div>
                                            </td>
                                            <td class="py-4 px-4 align-top">
                                                <h4 class="font-bold text-zinc-900 text-sm leading-tight">{{ $prod->name }}</h4>
                                                <p class="text-xs text-zinc-400 line-clamp-2 mt-1.5 max-w-sm leading-relaxed">{{ $prod->description }}</p>
                                            </td>
                                            <td class="py-4 text-right font-semibold text-zinc-900 text-sm align-top">
                                                Rp {{ number_format($prod->price, 0, ',', '.') }}
                                            </td>
                                            <td class="py-4 text-center text-sm font-semibold text-zinc-800 align-top">
                                                {{ $prod->stock }}
                                            </td>
                                            <td class="py-4 text-center align-top">
                                                <form action="{{ route('admin.products.destroy', $prod->id) }}" method="POST" onsubmit="return confirm('Hapus produk ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-500 hover:text-red-700 hover:bg-red-50 p-2 rounded-xl transition duration-150">
                                                        <i class="fa-regular fa-trash-can text-base"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-16 border-2 border-dashed border-zinc-200 rounded-3xl">
                            <i class="fa-solid fa-shirt text-5xl text-zinc-300 mb-4 block"></i>
                            <h3 class="font-bold text-zinc-700">No Custom Products</h3>
                            <p class="text-xs text-zinc-400 mt-1 max-w-xs mx-auto">Create your first custom product by clicking the button above.</p>
                        </div>
                    @endif
                </div>

                {{-- Orders Management --}}
                <div class="bg-white rounded-3xl border border-zinc-100 shadow-sm p-6 md:p-8">
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h2 class="text-xl font-bold text-zinc-900">Orders Management</h2>
                            <p class="text-xs text-zinc-500 mt-0.5">View and update user transaction states.</p>
                        </div>
                        <span class="bg-zinc-100 text-zinc-800 text-xs font-bold px-3 py-1.5 rounded-full">
                            {{ $orders->count() }} Total
                        </span>
                    </div>

                    @if($orders->count() > 0)
                        <div class="space-y-6">
                            @foreach($orders as $order)
                                <div class="bg-zinc-50/50 rounded-2xl border border-zinc-100 p-5 space-y-4">
                                    <div class="flex flex-wrap items-start justify-between gap-2 border-b border-zinc-100/80 pb-3">
                                        <div>
                                            <span class="text-xs font-semibold text-zinc-400">Order #{{ $order->id }}</span>
                                            <h4 class="text-sm font-bold text-zinc-850 mt-0.5">{{ $order->recipient_name }} ({{ $order->email }})</h4>
                                            <p class="text-[10px] text-zinc-400 mt-0.5">{{ $order->created_at->format('d M Y, H:i') }}</p>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            {{-- Status Badges --}}
                                            <span class="text-[10px] font-extrabold uppercase px-2.5 py-1 rounded-full tracking-wider
                                                @if($order->status === 'completed') bg-emerald-50 text-emerald-600
                                                @elseif($order->status === 'processing') bg-blue-50 text-blue-600
                                                @elseif($order->status === 'cancelled') bg-red-50 text-red-600
                                                @else bg-zinc-100 text-zinc-600 @endif">
                                                Status: {{ $order->status }}
                                            </span>
                                            <span class="text-[10px] font-extrabold uppercase px-2.5 py-1 rounded-full tracking-wider
                                                @if($order->payment_status === 'success') bg-emerald-50 text-emerald-600
                                                @elseif($order->payment_status === 'failed') bg-red-50 text-red-600
                                                @else bg-amber-50 text-amber-600 @endif">
                                                Payment: {{ $order->payment_status }}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        {{-- Items --}}
                                        <div class="space-y-2">
                                            <p class="text-[10px] font-bold text-zinc-400 uppercase tracking-wider">Ordered Items</p>
                                            <div class="max-h-[120px] overflow-y-auto space-y-1.5 pr-1">
                                                @foreach($order->items as $item)
                                                    <div class="flex justify-between items-center text-xs">
                                                        <span class="text-zinc-600 truncate max-w-[180px]">{{ $item->product_name }}</span>
                                                        <span class="font-medium text-zinc-800 shrink-0">x{{ $item->quantity }} - Rp {{ number_format($item->price, 0, ',', '.') }}</span>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="border-t border-zinc-100 pt-2 flex justify-between text-xs font-bold text-zinc-900">
                                                <span>Total Amount</span>
                                                <span>Rp {{ number_format($order->total, 0, ',', '.') }}</span>
                                            </div>
                                        </div>

                                        {{-- Control Form --}}
                                        <div class="bg-white border border-zinc-100 rounded-xl p-3.5 space-y-3 flex flex-col justify-between">
                                            <p class="text-[10px] font-bold text-zinc-400 uppercase tracking-wider">Update Status</p>
                                            <form action="{{ route('admin.orders.update-status', $order->id) }}" method="POST" class="space-y-3">
                                                @csrf
                                                @method('PATCH')
                                                <div class="grid grid-cols-2 gap-2">
                                                    <div>
                                                        <label class="text-[9px] font-bold text-zinc-400 uppercase block mb-1">Order State</label>
                                                        <select name="status" class="w-full bg-zinc-50 border border-zinc-200 text-xs rounded-lg p-1.5 outline-none font-medium text-zinc-800">
                                                            <option value="pending" @selected($order->status === 'pending')>Pending</option>
                                                            <option value="processing" @selected($order->status === 'processing')>Processing</option>
                                                            <option value="completed" @selected($order->status === 'completed')>Completed</option>
                                                            <option value="cancelled" @selected($order->status === 'cancelled')>Cancelled</option>
                                                        </select>
                                                    </div>
                                                    <div>
                                                        <label class="text-[9px] font-bold text-zinc-400 uppercase block mb-1">Payment</label>
                                                        <select name="payment_status" class="w-full bg-zinc-50 border border-zinc-200 text-xs rounded-lg p-1.5 outline-none font-medium text-zinc-800">
                                                            <option value="pending" @selected($order->payment_status === 'pending')>Pending</option>
                                                            <option value="success" @selected($order->payment_status === 'success')>Success</option>
                                                            <option value="failed" @selected($order->payment_status === 'failed')>Failed</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <button type="submit" class="w-full bg-zinc-950 text-white hover:bg-zinc-800 text-[10px] font-bold py-2 rounded-lg transition duration-150">
                                                    Apply Updates
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-12 border border-dashed border-zinc-200 rounded-2xl">
                            <i class="fa-solid fa-receipt text-4xl text-zinc-300 mb-2.5 block"></i>
                            <p class="text-xs text-zinc-400">No orders received yet.</p>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Kanan: Upload & Manajemen Media Aset (1/3 width) --}}
            <div class="space-y-8">
                <div class="bg-white rounded-3xl border border-zinc-100 shadow-sm p-6">
                    <h3 class="text-lg font-bold text-zinc-900 mb-1">Image Manager</h3>
                    <p class="text-xs text-zinc-500 mb-6">Upload banners or general images to generate live asset URLs.</p>

                    {{-- Form Upload Cepat --}}
                    <form action="{{ route('admin.upload') }}" method="POST" enctype="multipart/form-data" class="space-y-4 mb-8">
                        @csrf
                        <div class="border-2 border-dashed border-zinc-200 hover:border-zinc-400 rounded-2xl p-6 text-center cursor-pointer transition relative group">
                            <input type="file" name="image" required onchange="this.form.submit()" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                            <i class="fa-solid fa-cloud-arrow-up text-3xl text-zinc-400 group-hover:text-zinc-600 transition mb-2 block"></i>
                            <span class="text-xs font-bold text-zinc-700 block">Click to upload image</span>
                            <span class="text-[10px] text-zinc-400 block mt-1">Supports PNG, JPG, WEBP, SVG (Max 5MB)</span>
                        </div>
                    </form>

                    {{-- Galeri File --}}
                    <div class="space-y-4 max-h-[500px] overflow-y-auto pr-1">
                        @if(count($images) > 0)
                            @foreach($images as $img)
                                <div class="bg-zinc-50 border border-zinc-100 rounded-2xl p-3 flex gap-3 items-center group relative hover:shadow-md transition duration-200">
                                    <div class="w-14 h-14 bg-white border border-zinc-100 rounded-xl overflow-hidden flex items-center justify-center p-1 shrink-0 shadow-sm">
                                        <img src="{{ $img['url'] }}" alt="{{ $img['name'] }}" class="max-w-full max-h-full object-contain">
                                    </div>
                                    <div class="flex-grow min-w-0">
                                        <p class="text-[11px] font-bold text-zinc-800 truncate leading-tight">{{ $img['name'] }}</p>
                                        <p class="text-[10px] text-zinc-400 mt-1">{{ $img['size'] }}</p>
                                    </div>
                                    <div class="flex gap-1">
                                        <button onclick="copyToClipboard('{{ $img['url'] }}', this)" class="text-zinc-600 hover:text-zinc-900 bg-white hover:bg-zinc-100 p-2 rounded-xl shadow-sm transition border border-zinc-100" title="Copy URL">
                                            <i class="fa-regular fa-copy text-xs"></i>
                                        </button>
                                        <form action="{{ route('admin.upload.destroy') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="name" value="{{ $img['name'] }}">
                                            <button type="submit" onclick="return confirm('Hapus file gambar ini?')" class="text-red-500 hover:text-red-700 bg-white hover:bg-red-50 p-2 rounded-xl shadow-sm transition border border-zinc-100" title="Delete">
                                                <i class="fa-regular fa-trash-can text-xs"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="text-center py-10 bg-zinc-50 rounded-2xl border border-zinc-100">
                                <i class="fa-solid fa-images text-3xl text-zinc-300 mb-2 block"></i>
                                <p class="text-[11px] text-zinc-400">No media assets uploaded yet.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

{{-- Modal Add Product --}}
<div id="product-modal" class="fixed inset-0 z-50 overflow-y-auto hidden">
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity" onclick="toggleModal('product-modal')"></div>
    <div class="flex min-h-screen items-center justify-center p-4">
        <div class="relative bg-white rounded-3xl max-w-md w-full p-6 md:p-8 shadow-2xl border border-zinc-100 z-10 transform scale-95 transition-all duration-300">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold text-zinc-900">Add New Product</h3>
                <button onclick="toggleModal('product-modal')" class="text-zinc-400 hover:text-zinc-700 transition">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
            </div>

            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-bold text-zinc-500 uppercase tracking-wider mb-1">Product Name</label>
                    <input type="text" name="name" required class="w-full border border-zinc-200 rounded-xl px-4 py-3 text-sm focus:border-zinc-800 focus:ring-1 focus:ring-zinc-800 outline-none transition" placeholder="e.g. Vintage Leather Jacket">
                </div>
                
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-zinc-500 uppercase tracking-wider mb-1">Price (IDR)</label>
                        <input type="number" name="price" required class="w-full border border-zinc-200 rounded-xl px-4 py-3 text-sm focus:border-zinc-800 focus:ring-1 focus:ring-zinc-800 outline-none transition" placeholder="e.g. 150000">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-zinc-500 uppercase tracking-wider mb-1">Stock</label>
                        <input type="number" name="stock" required class="w-full border border-zinc-200 rounded-xl px-4 py-3 text-sm focus:border-zinc-800 focus:ring-1 focus:ring-zinc-800 outline-none transition" placeholder="e.g. 10">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-zinc-500 uppercase tracking-wider mb-1">Description</label>
                    <textarea name="description" required rows="3" class="w-full border border-zinc-200 rounded-xl px-4 py-3 text-sm focus:border-zinc-800 focus:ring-1 focus:ring-zinc-800 outline-none transition resize-none" placeholder="Provide product details, sizing, material..."></textarea>
                </div>

                <div>
                    <label class="block text-xs font-bold text-zinc-500 uppercase tracking-wider mb-1">Product Image</label>
                    <div class="border border-zinc-200 rounded-xl p-4 flex items-center justify-between bg-zinc-50 relative">
                        <input type="file" name="image" required class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" onchange="updateFileName(this)">
                        <span id="file-name-label" class="text-xs text-zinc-500 font-medium">Select file image...</span>
                        <span class="bg-zinc-900 text-white text-[10px] font-bold px-3 py-1.5 rounded-lg">Browse</span>
                    </div>
                </div>

                <div class="pt-4 flex justify-end gap-3">
                    <button type="button" onclick="toggleModal('product-modal')" class="border border-zinc-200 text-zinc-700 hover:bg-zinc-50 px-5 py-2.5 rounded-full text-sm font-semibold transition">Cancel</button>
                    <button type="submit" class="bg-zinc-950 text-white hover:bg-zinc-850 px-6 py-2.5 rounded-full text-sm font-bold shadow-md transition">Save Product</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Toggle Modal
    function toggleModal(id) {
        const modal = document.getElementById(id);
        modal.classList.toggle('hidden');
        if (!modal.classList.contains('hidden')) {
            document.body.style.overflow = 'hidden';
        } else {
            document.body.style.overflow = '';
        }
    }

    // Update File Name label on upload
    function updateFileName(input) {
        const label = document.getElementById('file-name-label');
        if (input.files && input.files[0]) {
            label.textContent = input.files[0].name;
            label.classList.remove('text-zinc-500');
            label.classList.add('text-zinc-800');
        } else {
            label.textContent = 'Select file image...';
        }
    }

    // Copy to Clipboard Utility
    function copyToClipboard(text, button) {
        navigator.clipboard.writeText(text).then(() => {
            const originalHTML = button.innerHTML;
            button.innerHTML = '<i class="fa-solid fa-check text-emerald-500 text-xs"></i>';
            button.classList.add('bg-emerald-50/50', 'border-emerald-100');
            
            setTimeout(() => {
                button.innerHTML = originalHTML;
                button.classList.remove('bg-emerald-50/50', 'border-emerald-100');
            }, 2000);
        }).catch(err => {
            console.error('Failed to copy: ', err);
            alert('Gagal menyalin URL.');
        });
    }
</script>
@endsection
