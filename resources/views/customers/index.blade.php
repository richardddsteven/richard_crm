@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-lg">
    <h2 class="text-2xl font-extrabold mb-6 text-gray-800 border-b pb-2">📋 Daftar Proyek Customer (Approved)</h2>

    @if($projects->count())
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm text-left border border-gray-200 rounded-lg shadow-sm">
            <thead class="bg-gradient-to-r from-blue-100 to-blue-200 text-blue-800 font-semibold uppercase">
                <tr>
                    <th class="px-6 py-3 border-b border-gray-300">Nama Customer</th>
                    <th class="px-6 py-3 border-b border-gray-300">Layanan</th>
                    <th class="px-6 py-3 border-b border-gray-300">Harga</th>
                    <th class="px-6 py-3 border-b border-gray-300 text-center">Status</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach($projects as $project)
                <tr class="hover:bg-blue-50 transition duration-200">
                    <td class="px-6 py-4 border-b">{{ $project->lead->name }}</td>
                    <td class="px-6 py-4 border-b">{{ $project->product->name }}</td>
                    <td class="px-6 py-4 border-b">Rp {{ number_format($project->product->price, 0, ',', '.') }}</td>
                    <td class="px-6 py-4 border-b text-center">
                        <span class="bg-green-100 text-green-700 px-3 py-1 text-xs font-bold rounded-full">Approved</span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div class="mt-6 text-center text-gray-600">
        <p>Belum ada proyek yang disetujui untuk customer.</p>
    </div>
    @endif
</div>
@endsection
