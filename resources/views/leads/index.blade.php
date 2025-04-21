@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-xl shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-extrabold text-gray-800">🚀 List Calon Customer (Lead)</h2>
        <a href="{{ route('leads.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md shadow transition">
            + Create Lead
        </a>
    </div>

    @if($leads->count())
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm text-left border border-gray-200 rounded shadow-sm">
            <thead class="bg-gradient-to-r from-blue-100 to-blue-200 text-blue-900 font-semibold uppercase text-xs">
                <tr>
                    <th class="px-4 py-3 text-left">Nama</th>
                    <th class="px-4 py-3 text-left">Kontak</th>
                    <th class="px-4 py-3 text-left">Layanan</th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-800 divide-y divide-gray-200">
                @foreach($leads as $lead)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3">{{ $lead->name }}</td>
                    <td class="px-4 py-3">{{ $lead->contact }}</td>
                    <td class="px-4 py-3">{{ $lead->product->name ?? '-' }}</td>
                    <td class="px-4 py-3 text-center">
                    <div class="flex justify-center gap-2 mt-2">
                        <a href="{{ route('leads.edit', $lead->id) }}"
                        class="inline-flex items-center justify-center px-3 py-1.5 bg-blue-700 hover:bg-blue-800 text-white rounded-md text-xs font-medium shadow transition-all h-8 min-w-[64px]">
                            Edit
                        </a>

                        <form action="{{ route('leads.destroy', $lead->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus lead ini?')">
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
    <p class="text-gray-500 mt-4">Belum ada data lead yang tersedia.</p>
    @endif
</div>
@endsection
