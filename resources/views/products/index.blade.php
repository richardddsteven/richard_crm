@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-extrabold text-gray-800">🛍️ List Produk</h2>
        <a href="{{ route('products.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow text-sm font-medium">
            + Tambah Produk
        </a>
    </div>

    @if($products->count())
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm text-left border border-gray-200 rounded shadow-sm">
            <thead class="bg-gradient-to-r from-blue-100 to-blue-200 text-blue-900 font-semibold uppercase text-xs">
                <tr>
                    <th class="px-6 py-3 border-b">Nama</th>
                    <th class="px-6 py-3 border-b">Deskripsi</th>
                    <th class="px-6 py-3 border-b">Harga</th>
                    <th class="px-6 py-3 border-b text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach($products as $product)
                <tr class="hover:bg-gray-50 transition duration-150">
                    <td class="px-6 py-4 border-b">{{ $product->name }}</td>
                    <td class="px-6 py-4 border-b">{{ $product->description ?? '-' }}</td>
                    <td class="px-6 py-4 border-b">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                    <td class="px-4 py-3 text-center">
                    <div class="flex justify-center gap-2 mt-2">
                        <a href="{{ route('products.edit', $product->id) }}"
                        class="inline-flex items-center justify-center px-3 py-1.5 bg-blue-700 hover:bg-blue-800 text-white rounded-md text-xs font-medium shadow transition-all h-8 min-w-[64px]">
                            Edit
                        </a>

                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus lead ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="inline-flex items-center justify-center px-3 py-1.5 bg-red-500 hover:bg-red-600 text-white rounded-md text-xs font-medium shadow transition-all h-8 min-w-[64px]">
                                Delete
                            </button>
                        </form>
                    </div>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <p class="text-gray-600 mt-4">Belum ada produk yang tersedia.</p>
    @endif
</div>
@endsection
