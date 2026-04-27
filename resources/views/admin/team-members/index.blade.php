@extends('layouts.admin')

@section('content')

<div class="p-8">
    <!-- Header -->
    <div class="mb-8">
        <div class="flex items-center gap-4 mb-2">
            <a href="/cms" class="flex items-center gap-2 text-slate-500 hover:text-slate-700 transition-colors">
                <span class="material-icons-outlined">arrow_back</span>
            </a>
            <div class="w-10 h-10 rounded-xl gradient-bg flex items-center justify-center shadow-lg">
                <span class="material-icons-outlined text-white text-lg">groups</span>
            </div>
            <h1 class="text-2xl font-bold text-slate-800">
                Team Members
            </h1>
        </div>
        <p class="text-slate-500 text-sm">Manage your team members</p>
    </div>

    <!-- Add Button -->
    <div class="mb-6">
        <a href="/cms/team-members/create" class="gradient-bg text-white px-6 py-3 rounded-xl font-semibold hover:shadow-lg hover:scale-[1.02] transition-all inline-flex items-center gap-2">
            <span class="material-icons-outlined">add</span>
            Add Team Member
        </a>
    </div>

    <!-- Table -->
    <div class="page-card rounded-2xl overflow-hidden">
        <table class="w-full">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-200">
                    <th class="text-left px-6 py-4 text-sm font-semibold text-slate-700">Name</th>
                    <th class="text-left px-6 py-4 text-sm font-semibold text-slate-700">Category</th>
                    <th class="text-left px-6 py-4 text-sm font-semibold text-slate-700">Status</th>
                    <th class="text-left px-6 py-4 text-sm font-semibold text-slate-700">Order</th>
                    <th class="text-right px-6 py-4 text-sm font-semibold text-slate-700">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($teamMembers as $member)
                <tr class="border-b border-slate-100 hover:bg-slate-50 transition-colors">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            @if($member->image)
                            <div class="w-10 h-10 rounded-full overflow-hidden">
                                <img src="{{ $member->image }}" alt="{{ $member->name }}" class="w-full h-full object-cover">
                            </div>
                            @else
                            <div class="w-10 h-10 rounded-full bg-primary-container/20 flex items-center justify-center">
                                <span class="material-icons-outlined text-primary">person</span>
                            </div>
                            @endif
                            <span class="font-medium text-slate-800">{{ $member->name }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-slate-600">{{ $member->category ?? '-' }}</td>
                    <td class="px-6 py-4">
                        @if($member->status === 'published')
                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-green-400/20 text-green-700">Published</span>
                        @else
                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-orange-400/20 text-orange-700">Draft</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-slate-600">{{ $member->order }}</td>
                    <td class="px-6 py-4">
                        <div class="flex gap-2 justify-end">
                            <a href="/cms/team-members/{{ $member->id }}/edit" class="p-2 text-indigo-600 hover:bg-indigo-50 rounded-lg transition-colors">
                                <span class="material-icons-outlined">edit</span>
                            </a>
                            <form action="/cms/team-members/{{ $member->id }}" method="POST" onsubmit="return confirm('Delete this team member?');" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors">
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
