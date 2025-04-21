@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md max-w-lg mx-auto mt-12">
    <h2 class="text-2xl font-extrabold text-gray-800 mb-6 text-center">✏️ Edit Lead</h2>

    <form action="{{ route('leads.update', $lead->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-6">
            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama</label>
            <input type="text" id="name" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-200" value="{{ $lead->name }}" required>
        </div>

        <div class="mb-6">
            <label for="contact" class="block text-sm font-medium text-gray-700 mb-2">Kontak</label>
            <input type="text" id="contact" name="contact" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-200" value="{{ $lead->contact }}" required>
        </div>

        <div class="mb-6">
            <label for="layanan" class="block text-sm font-medium text-gray-700 mb-2">Layanan</label>
            <select id="layanan" name="product_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-200" required>
                <option value="" disabled>Pilih Layanan</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" 
                    {{ $lead->product_id == $product->id ? 'selected' : '' }}>
                    {{ $product->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition duration-200 transform hover:scale-105">
            Update Lead
        </button>
    </form>
</div>
@endsection
