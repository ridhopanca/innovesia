@extends('layouts.admin')

@section('content')

<div class="p-8 max-w-7xl mx-auto">
    <!-- Header Section -->
    <div class="mb-10">
        <div class="flex items-center gap-4 mb-3">
            <div class="w-12 h-12 rounded-2xl gradient-bg flex items-center justify-center icon-glow">
                <span class="material-icons-outlined text-white text-2xl">diversity_3</span>
            </div>
            <div>
                <h1 class="text-3xl font-bold gradient-text">Communities</h1>
                <p class="text-slate-500 mt-1">Manage your community programs</p>
            </div>
        </div>
        <div class="flex justify-end">
            <a href="{{ route('admin.communities.create') }}" class="edit-btn inline-flex items-center gap-2 px-6 py-3 rounded-xl text-black font-semibold">
                <span class="material-icons-outlined">add</span>
                <span>Add Community</span>
            </a>
        </div>
    </div>

    <!-- Communities Table -->
    <div class="page-card rounded-2xl overflow-hidden">
        <table class="w-full">
            <thead class="bg-slate-50">
                <tr>
                    <th class="text-left px-6 py-4 text-sm font-semibold text-slate-700">Title</th>
                    <th class="text-left px-6 py-4 text-sm font-semibold text-slate-700">Badge</th>
                    <th class="text-left px-6 py-4 text-sm font-semibold text-slate-700">Status</th>
                    <th class="text-left px-6 py-4 text-sm font-semibold text-slate-700">Featured</th>
                    <th class="text-left px-6 py-4 text-sm font-semibold text-slate-700">Order</th>
                    <th class="text-left px-6 py-4 text-sm font-semibold text-slate-700">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @foreach($communities as $community)
                <tr class="hover:bg-slate-50 transition-colors">
                    <td class="px-6 py-4">
                        <div class="font-semibold text-slate-800">{{ $community->title }}</div>
                        <div class="text-sm text-slate-500">/{{ $community->slug }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="text-sm text-slate-600">{{ $community->badge ?? '-' }}</span>
                    </td>
                    <td class="px-6 py-4">
                        @if($community->status === 'published')
                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-green-400/20 text-green-700">Published</span>
                        @else
                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-orange-400/20 text-orange-700">Draft</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        @if($community->is_featured)
                        <span class="material-icons-outlined text-primary">star</span>
                        @else
                        <span class="text-slate-400">-</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <span class="text-sm text-slate-600">{{ $community->order }}</span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex gap-2">
                            <a href="{{ route('admin.communities.edit', $community->id) }}" class="text-indigo-600 hover:text-indigo-800 transition-colors">
                                <span class="material-icons-outlined">edit</span>
                            </a>
                            <form action="{{ route('admin.communities.destroy', $community->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 transition-colors">
                                    <span class="material-icons-outlined">delete</span>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
