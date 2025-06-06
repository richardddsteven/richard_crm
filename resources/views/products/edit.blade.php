@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md max-w-lg mx-auto mt-12">
    <h2 class="text-2xl font-extrabold text-gray-800 mb-6 text-center">✏️ Edit Product</h2>

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-6">
            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Produk</label>
            <input type="text" id="name" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-200" value="{{ $product->name }}" required>
        </div>

        <div class="mb-6">
            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
            <input type="text" id="description" name="description" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-200" value="{{ $product->description }}" required>
        </div>

        <div class="mb-6">
            <label for="price" class="block text-sm font-medium text-gray-700 mb-2">Harga</label>
            <input type="text" id="price" name="price" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-200" value="{{ $product->price }}" required>
        </div>

        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition duration-200 transform hover:scale-105">
            Update Product
        </button>
    </form>
</div>
@endsection
