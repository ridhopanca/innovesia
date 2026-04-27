@php
$projects = \App\Models\Project::orderBy('order')->orderBy('created_at', 'desc')->get();
@endphp

<!-- Projects Management Section -->
<div class="mb-8 bg-white rounded-2xl shadow-lg border border-slate-200 overflow-hidden">
    <!-- Header -->
    <div class="gradient-bg px-6 py-4 flex items-center gap-3 justify-between">
        <div class="flex items-center gap-3">
            <span class="material-icons-outlined text-white text-2xl">work</span>
            <h2 class="font-bold text-lg text-white">
                Projects
            </h2>
        </div>
        <div class="flex gap-2">
            <a href="/cms/projects/create" class="px-3 py-1 rounded-full bg-white/20 text-white text-xs font-semibold hover:bg-white/30 transition-colors">
                + Add New Project
            </a>
        </div>
    </div>

    <!-- Projects List -->
    <div class="p-6 space-y-4">
        @if($projects->count() > 0)
        @foreach($projects as $project)
        <div class="flex items-center gap-4 p-4 bg-slate-50 rounded-xl hover:bg-slate-100 transition-colors">
            @if($project->image)
            <div class="w-16 h-16 rounded-lg overflow-hidden shrink-0">
                <img src="{{ $project->image }}" alt="{{ $project->title }}" class="w-full h-full object-cover">
            </div>
            @else
            <div class="w-16 h-16 rounded-lg bg-slate-200 flex items-center justify-center shrink-0">
                <span class="material-icons-outlined text-slate-400">image</span>
            </div>
            @endif
            <div class="flex-1 min-w-0">
                <div class="flex items-center gap-2">
                    @if($project->is_featured)
                    <span class="material-icons-outlined text-amber-500 text-sm">star</span>
                    @endif
                    <h3 class="font-semibold text-slate-800 truncate">{{ $project->title }}</h3>
                </div>
                <p class="text-sm text-slate-500 truncate">{{ $project->category ?? '-' }}</p>
            </div>
            <div class="flex items-center gap-2">
                @if($project->status === 'published')
                <span class="px-2 py-1 rounded-full text-xs font-semibold bg-green-400/20 text-green-700">Published</span>
                @else
                <span class="px-2 py-1 rounded-full text-xs font-semibold bg-orange-400/20 text-orange-700">Draft</span>
                @endif
            </div>
            <div class="flex gap-2">
                <a href="/cms/projects/{{ $project->id }}/edit?referrer=/cms/pages/our-work" class="p-2 text-indigo-600 hover:bg-indigo-50 rounded-lg transition-colors">
                    <span class="material-icons-outlined">edit</span>
                </a>
                <form action="/cms/projects/{{ $project->id }}" method="POST" onsubmit="return confirm('Delete this project?');" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                        <span class="material-icons-outlined">delete</span>
                    </button>
                </form>
            </div>
        </div>
        @endforeach
        @else
        <div class="text-center py-8">
            <span class="material-icons-outlined text-4xl text-slate-300 mb-2">work_outline</span>
            <p class="text-slate-500">No projects yet</p>
            <a href="/cms/projects/create" class="text-indigo-600 font-semibold hover:underline">Create your first project</a>
        </div>
        @endif
    </div>
</div>