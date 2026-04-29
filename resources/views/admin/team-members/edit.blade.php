@extends('layouts.admin')

@section('content')

<div class="p-8 max-w-7xl mx-auto">
    <!-- Header Section -->
    <div class="mb-10">
        <div class="flex items-center gap-4 mb-3">
            <a href="{{ request()->query('referrer') ?? route('admin.team-members.index') }}" class="flex items-center gap-2 text-slate-500 hover:text-slate-700 transition-colors">
                <span class="material-icons-outlined">arrow_back</span>
            </a>
            <div class="w-10 h-10 rounded-xl gradient-bg flex items-center justify-center shadow-lg">
                <span class="material-icons-outlined text-white text-lg">edit</span>
            </div>
            <h1 class="text-2xl font-bold text-slate-800">
                Edit Team Member
            </h1>
        </div>
    </div>

    <!-- Form -->
    <div class="page-card rounded-2xl overflow-hidden p-8">
        <form id="teamMemberForm" action="{{ route('admin.team-members.update', $teamMember->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            <input type="hidden" name="referrer" value="{{ request()->query('referrer') }}">

            <!-- Name -->
            <div>
                <label class="text-sm font-semibold text-slate-700 mb-2 block">Name</label>
                <input type="text" name="name" required value="{{ $teamMember->name }}"
                    class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
            </div>

            <!-- Slug (Hidden) -->
            <input type="hidden" name="slug" id="slug" value="{{ $teamMember->slug }}">

            <!-- Role -->
            <div>
                <label class="text-sm font-semibold text-slate-700 mb-2 block">Role</label>
                <input type="text" name="role" value="{{ $teamMember->role }}"
                    class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
            </div>

            <!-- Category -->
            <div>
                <label class="text-sm font-semibold text-slate-700 mb-2 block">Category</label>
                <input type="text" name="category" value="{{ $teamMember->category }}"
                    class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
            </div>

            <!-- Bio -->
            <div>
                <label class="text-sm font-semibold text-slate-700 mb-2 block">Bio</label>
                <textarea name="bio" rows="4"
                    class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">{{ $teamMember->bio }}</textarea>
            </div>

            <!-- Image -->
            <div>
                <label class="text-sm font-semibold text-slate-700 mb-2 block">Image URL</label>
                <input type="text" name="image" value="{{ $teamMember->image }}"
                    class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                @if($teamMember->image)
                <div class="mt-2">
                    <img src="{{ $teamMember->image }}" alt="Preview" class="h-32 rounded-lg object-cover">
                </div>
                @endif
            </div>

            <!-- Show in Who We Are -->
            <div class="flex items-center justify-between p-4 bg-slate-50 rounded-xl border border-slate-200">
                <div>
                    <label class="text-sm font-semibold text-slate-700 block">Tampilkan di Menu Who We Are</label>
                    <p class="text-xs text-slate-500 mt-1">Hidupkan untuk menampilkan di section <wbr></wbr>ho we are page</p>
                </div>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="is_featured" class="sr-only peer"
                        {{ $teamMember->is_featured ? 'checked' : '' }}>
                    <div class="w-11 h-6 bg-slate-300 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-purple-500 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-purple-600"></div>
                </label>
            </div>

            <!-- Status -->
            <div>
                <label class="text-sm font-semibold text-slate-700 mb-2 block">Status</label>
                <select name="status" class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all bg-white">
                    <option value="draft" {{ $teamMember->status === 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ $teamMember->status === 'published' ? 'selected' : '' }}>Published</option>
                </select>
            </div>

            <!-- Order -->
            <div>
                <label class="text-sm font-semibold text-slate-700 mb-2 block">Order</label>
                <input type="number" name="order" value="{{ $teamMember->order }}"
                    class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
            </div>

            <!-- Submit -->
            <div class="flex gap-4 pt-4">
                <a href="{{ request()->query('referrer') ?? route('admin.team-members.index') }}" class="flex-1 py-3 px-6 rounded-xl border-2 border-slate-300 text-slate-600 font-semibold hover:bg-slate-50 transition-all text-center">
                    Cancel
                </a>
                <button type="button" id="submitBtn" class="flex-1 py-3 px-6 rounded-xl gradient-bg text-white font-semibold hover:shadow-lg hover:scale-[1.02] transition-all">
                    Update Team Member
                </button>
            </div>
        </form>
    </div>
</div>

@endsection

@push('scripts')
<script>
    (function() {
        const nameInput = document.querySelector('input[name="name"]');
        const slugInput = document.getElementById('slug');

        function generateSlug(text) {
            if (!text) return '';
            return text.toLowerCase()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-')
                .replace(/^-|-$/g, '')
                .substring(0, 100);
        }

        const form = document.getElementById('teamMemberForm');
        const submitBtn = document.getElementById('submitBtn');
        if (form && submitBtn && nameInput) {
            submitBtn.addEventListener('click', function() {
                if (nameInput.value.trim()) {
                    slugInput.value = generateSlug(nameInput.value.trim());
                }
                form.submit();
            });
        }
    })();
</script>
@endpush