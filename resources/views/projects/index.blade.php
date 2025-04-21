@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-extrabold mb-6 text-gray-800 border-b pb-2">📋 List Proyek</h2>

    @if($projects->count())
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm text-left border border-gray-200 rounded shadow-sm">
            <thead class="bg-gradient-to-r from-blue-100 to-blue-200 text-blue-900 font-semibold uppercase text-xs">
                <tr>
                    <th class="px-6 py-3 border-b">Nama Lead</th>
                    <th class="px-6 py-3 border-b">Nama Produk</th>
                    <th class="px-6 py-3 border-b">Status</th>
                    <th class="px-6 py-3 border-b text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach($projects as $project)
                <tr class="hover:bg-gray-50 transition duration-200">
                    <td class="px-6 py-4 border-b">{{ $project->lead->name }}</td>
                    <td class="px-6 py-4 border-b">{{ $project->product->name }}</td>
                    <td class="px-6 py-4 border-b">
                        @if($project->approved)
                            <span class="bg-green-100 text-green-700 text-xs font-semibold px-3 py-1 rounded-full">Approved</span>
                        @else
                            <span class="bg-yellow-100 text-yellow-700 text-xs font-semibold px-3 py-1 rounded-full">Pending</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 border-b text-center">
                        @if(!$project->approved)
                        <form action="{{ route('projects.approve', $project->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white text-sm px-4 py-2 rounded-lg shadow">
                                Approve
                            </button>
                        </form>
                        @else
                        <span class="text-gray-400 text-sm">✅Approved</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div class="mt-6 text-center text-gray-600">
        <p>Belum ada proyek yang diminta.</p>
    </div>
    @endif
</div>
@endsection
