@php
$teamMembers = \App\Models\TeamMember::orderBy('order')->orderBy('created_at', 'desc')->get();
@endphp

<!-- Team Members Management Section -->
<div class="mb-8 bg-white rounded-2xl shadow-lg border border-slate-200 overflow-hidden">
    <!-- Header -->
    <div class="gradient-bg px-6 py-4 flex items-center gap-3 justify-between">
        <div class="flex items-center gap-3">
            <span class="material-icons-outlined text-white text-2xl">groups</span>
            <h2 class="font-bold text-lg text-white">
                Team Members
            </h2>
        </div>
        <div class="flex gap-2">
            <a href="/cms/team-members/create?referrer={{ request()->fullUrl() }}" class="px-3 py-1 rounded-full bg-white/20 text-white text-xs font-semibold hover:bg-white/30 transition-colors">
                + Add New Member
            </a>
        </div>
    </div>

    <!-- Team Members List -->
    <div class="p-6 space-y-4">
        @if($teamMembers->count() > 0)
        @foreach($teamMembers as $member)
        <div class="flex items-center gap-4 p-4 bg-slate-50 rounded-xl hover:bg-slate-100 transition-colors">
            @if($member->image)
            <div class="w-12 h-12 rounded-full overflow-hidden shrink-0">
                <img src="{{ $member->image }}" alt="{{ $member->name }}" class="w-full h-full object-cover">
            </div>
            @else
            <div class="w-12 h-12 rounded-full bg-slate-200 flex items-center justify-center shrink-0">
                <span class="material-icons-outlined text-slate-400">person</span>
            </div>
            @endif
            <div class="flex-1 min-w-0">
                <h3 class="font-semibold text-slate-800 truncate">{{ $member->name }}</h3>
                <p class="text-sm text-slate-500 truncate">{{ $member->role ?? $member->category ?? '-' }}</p>
            </div>
            <div class="flex items-center gap-2">
                @if($member->status === 'published')
                <span class="px-2 py-1 rounded-full text-xs font-semibold bg-green-400/20 text-green-700">Published</span>
                @else
                <span class="px-2 py-1 rounded-full text-xs font-semibold bg-orange-400/20 text-orange-700">Draft</span>
                @endif
            </div>
            <div class="flex gap-2">
                <a href="/cms/team-members/{{ $member->id }}/edit?referrer={{ request()->fullUrl() }}" class="p-2 text-indigo-600 hover:bg-indigo-50 rounded-lg transition-colors">
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
        </div>
        @endforeach
        @else
        <div class="text-center py-8">
            <span class="material-icons-outlined text-4xl text-slate-300 mb-2">groups</span>
            <p class="text-slate-500">No team members yet</p>
            <a href="/cms/team-members/create" class="text-indigo-600 font-semibold hover:underline">Create your first team member</a>
        </div>
        @endif
    </div>
</div>