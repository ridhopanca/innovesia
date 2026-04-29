@extends('layouts.admin')

@section('content')

<div class="p-8 max-w-7xl mx-auto">
    <!-- Header Section -->
    <div class="mb-10">
        <div class="flex items-center gap-4 mb-3">
            @if(request('referrer'))
            <a href="{{ request('referrer') }}" class="flex items-center gap-2 text-slate-500 hover:text-slate-700 transition-colors">
                <span class="material-icons-outlined">arrow_back</span>
            </a>
            @else
            <a href="{{ route('admin.communities.index') }}" class="flex items-center gap-2 text-slate-500 hover:text-slate-700 transition-colors">
                <span class="material-icons-outlined">arrow_back</span>
            </a>
            @endif
            <div class="w-10 h-10 rounded-xl gradient-bg flex items-center justify-center shadow-lg">
                <span class="material-icons-outlined text-white text-lg">add</span>
            </div>
            <h1 class="text-2xl font-bold text-slate-800">
                Add New Community
            </h1>
        </div>
    </div>

    <!-- Form -->
    <div class="page-card rounded-2xl overflow-hidden p-8">
        <form id="communityForm" action="{{ route('admin.communities.store') }}" method="POST" class="space-y-6">
            @csrf
            @if(request('referrer'))
            <input type="hidden" name="referrer" value="{{ request('referrer') }}">
            @endif

            <!-- Validation Errors -->
            @if($errors->any())
            <div class="p-4 bg-red-50 border border-red-200 rounded-xl">
                <div class="flex items-center gap-2 text-red-700 font-semibold mb-2">
                    <span class="material-icons-outlined">error</span>
                    <span>Validation Error</span>
                </div>
                <ul class="text-sm text-red-600 space-y-1">
                    @foreach($errors->all() as $error)
                    <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- Title -->
            <div>
                <label class="text-sm font-semibold text-slate-700 mb-2 block">Community Title</label>
                <input type="text" name="title" required
                    class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                    placeholder="Enter community title">
            </div>

            <!-- Slug (Hidden) -->
            <input type="hidden" name="slug" id="slug" value="">

            <!-- Badge -->
            <div>
                <label class="text-sm font-semibold text-slate-700 mb-2 block">Badge</label>
                <input type="text" name="badge"
                    class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                    placeholder="e.g., Workshop, Lab, Event">
            </div>

            <!-- Description -->
            <div>
                <label class="text-sm font-semibold text-slate-700 mb-2 block">Description</label>
                <textarea name="description" rows="3"
                    class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                    placeholder="Short description for community card"></textarea>
            </div>

            <!-- Image -->
            <div>
                <label class="text-sm font-semibold text-slate-700 mb-2 block">Image URL</label>
                <input type="text" name="image"
                    class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                    placeholder="https://example.com/image.jpg">
            </div>

            <!-- Primary Button -->
            <div>
                <label class="text-sm font-semibold text-slate-700 mb-2 block">Primary Button Text</label>
                <input type="text" name="primary_button"
                    class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                    placeholder="e.g., Learn More, Join Now">
            </div>

            <!-- Secondary Button -->
            <div>
                <label class="text-sm font-semibold text-slate-700 mb-2 block">Secondary Button Text</label>
                <input type="text" name="secondary_button"
                    class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                    placeholder="e.g., View Details">
            </div>

            <!-- Program Section -->
            <div class="border-t border-slate-200 pt-6 mt-6">
                <h3 class="text-lg font-bold text-slate-800 mb-4 flex items-center gap-2">
                    <span class="material-icons-outlined text-purple-600">school</span>
                    Program Section
                </h3>
                <div class="space-y-4">
                    <div>
                        <label class="text-sm font-semibold text-slate-700 mb-2 block">Program Title</label>
                        <input type="text" name="program_data[title]"
                            class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                            placeholder="Program Architecture">
                    </div>
                    @for($i = 0; $i < 3; $i++)
                        <div class="p-4 bg-slate-50 rounded-xl border border-slate-200">
                        <h4 class="text-sm font-semibold text-slate-700 mb-3">Program {{ $i + 1 }}</h4>
                        <div class="grid grid-cols-3 gap-3">
                            <input type="text" name="program_data[programs][{{ $i }}][icon]"
                                class="border border-slate-300 p-2 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                                placeholder="Icon (e.g., school)">
                            <input type="text" name="program_data[programs][{{ $i }}][title]"
                                class="border border-slate-300 p-2 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                                placeholder="Title">
                            <input type="text" name="program_data[programs][{{ $i }}][description]"
                                class="border border-slate-300 p-2 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                                placeholder="Description">
                        </div>
                </div>
                @endfor
            </div>
    </div>

    <!-- Timeline Section -->
    <div class="border-t border-slate-200 pt-6 mt-6">
        <h3 class="text-lg font-bold text-slate-800 mb-4 flex items-center gap-2">
            <span class="material-icons-outlined text-purple-600">schedule</span>
            Timeline Section
        </h3>
        <div class="space-y-4">
            <div>
                <label class="text-sm font-semibold text-slate-700 mb-2 block">Timeline Title</label>
                <input type="text" name="timeline_data[title]"
                    class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                    placeholder="Timeline Roadmap">
            </div>
            <div>
                <label class="text-sm font-semibold text-slate-700 mb-2 block">Timeline Subtitle</label>
                <input type="text" name="timeline_data[subtitle]"
                    class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                    placeholder="Tracking our journey">
            </div>
            @for($i = 0; $i < 3; $i++)
                <div class="p-4 bg-slate-50 rounded-xl border border-slate-200">
                <h4 class="text-sm font-semibold text-slate-700 mb-3">Timeline Event {{ $i + 1 }}</h4>
                <div class="space-y-3">
                    <input type="text" name="timeline_data[events][{{ $i }}][date]"
                        class="w-full border border-slate-300 p-2 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                        placeholder="Date (e.g., April Week 4)">
                    <input type="text" name="timeline_data[events][{{ $i }}][school]"
                        class="w-full border border-slate-300 p-2 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                        placeholder="School/Institution">
                    <select name="timeline_data[events][{{ $i }}][status]" class="w-full border border-slate-300 p-2 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all bg-white">
                        <option value="">Select Status</option>
                        <option value="completed">Completed</option>
                        <option value="next">Next Session</option>
                        <option value="upcoming">Upcoming</option>
                    </select>
                    <textarea name="timeline_data[events][{{ $i }}][description]"
                        class="w-full border border-slate-300 p-2 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                        rows="2" placeholder="Description"></textarea>
                </div>
        </div>
        @endfor
    </div>
</div>

<!-- Documentation Section -->
<div class="border-t border-slate-200 pt-6 mt-6">
    <h3 class="text-lg font-bold text-slate-800 mb-4 flex items-center gap-2">
        <span class="material-icons-outlined text-purple-600">photo_library</span>
        Documentation Section
    </h3>
    <div class="space-y-4">
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Section Title</label>
            <input type="text" name="documentation_data[title]"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                value="In the Lab">
        </div>
        @for($i = 0; $i < 4; $i++)
            <div class="p-4 bg-slate-50 rounded-xl border border-slate-200">
            <h4 class="text-sm font-semibold text-slate-700 mb-3">Image {{ $i + 1 }}</h4>
            <div class="space-y-3">
                <input type="text" name="documentation_images[{{ $i }}][url]"
                    class="w-full border border-slate-300 p-2 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                    placeholder="Image URL">
                <input type="text" name="documentation_images[{{ $i }}][title]"
                    class="w-full border border-slate-300 p-2 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                    placeholder="Image Title (e.g., Brainstorming Session)">
                <p class="text-xs text-slate-500">
                    <span class="material-icons-outlined text-sm align-text-bottom">info</span>
                    Image {{ $i + 1 }}: {{ $i === 0 ? 'Large (2x2)' : ($i === 2 ? 'Tall (1x2)' : 'Standard (1x1)') }}
                </p>
            </div>
    </div>
    @endfor
</div>
</div>

<!-- Prototype Section -->
<div class="border-t border-slate-200 pt-6 mt-6">
    <h3 class="text-lg font-bold text-slate-800 mb-4 flex items-center gap-2">
        <span class="material-icons-outlined text-purple-600">lightbulb</span>
        Prototype Section
    </h3>
    <div class="space-y-4">
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Prototype Title</label>
            <input type="text" name="prototype_projects[title]"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                placeholder="Prototype Showcase">
        </div>
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Subtitle</label>
            <textarea name="prototype_projects[subtitle]" rows="2"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                placeholder="Turning ideas into tangible solutions"></textarea>
        </div>
        @for($i = 0; $i < 3; $i++)
            <div class="p-4 bg-slate-50 rounded-xl border border-slate-200">
            <h4 class="text-sm font-semibold text-slate-700 mb-3">Project {{ $i + 1 }}</h4>
            <div class="space-y-3">
                <input type="text" name="prototype_projects[projects][{{ $i }}][title]"
                    class="w-full border border-slate-300 p-2 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                    placeholder="Project Title">
                <input type="text" name="prototype_projects[projects][{{ $i }}][category]"
                    class="w-full border border-slate-300 p-2 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                    placeholder="Category (e.g., Product Design)">
                <textarea name="prototype_projects[projects][{{ $i }}][description]" rows="2"
                    class="w-full border border-slate-300 p-2 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                    placeholder="Project description"></textarea>
                <input type="text" name="prototype_projects[projects][{{ $i }}][image]"
                    class="w-full border border-slate-300 p-2 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                    placeholder="Image URL">
            </div>
    </div>
    @endfor
</div>
</div>

<!-- Video Section -->
<div class="border-t border-slate-200 pt-6 mt-6">
    <h3 class="text-lg font-bold text-slate-800 mb-4 flex items-center gap-2">
        <span class="material-icons-outlined text-purple-600">videocam</span>
        Video Section
    </h3>
    <div class="space-y-4">
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Section Title</label>
            <input type="text" name="video_data[title]"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                placeholder="Witness the Transformation">
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="text-sm font-semibold text-slate-700 mb-2 block">Video Title</label>
                <input type="text" name="video_title"
                    class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
            </div>
            <div>
                <label class="text-sm font-semibold text-slate-700 mb-2 block">Video Subtitle</label>
                <input type="text" name="video_subtitle"
                    class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
            </div>
        </div>
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Video Image URL</label>
            <input type="text" name="video_image"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                placeholder="https://example.com/video-thumbnail.jpg">
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="border-t border-slate-200 pt-6 mt-6">
    <h3 class="text-lg font-bold text-slate-800 mb-4 flex items-center gap-2">
        <span class="material-icons-outlined text-purple-600">campaign</span>
        CTA Section
    </h3>
    <div class="space-y-4">
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">CTA Title</label>
            <input type="text" name="cta_data[title]"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
        </div>
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Description</label>
            <textarea name="cta_data[description]" rows="3"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"></textarea>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="text-sm font-semibold text-slate-700 mb-2 block">Primary Button</label>
                <input type="text" name="cta_data[primary_button]"
                    class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
            </div>
            <div>
                <label class="text-sm font-semibold text-slate-700 mb-2 block">Secondary Button</label>
                <input type="text" name="cta_data[secondary_button]"
                    class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
            </div>
        </div>
    </div>
</div>

<!-- Featured -->
<div class="flex items-center gap-3">
    <input type="checkbox" name="is_featured" id="is_featured" class="w-5 h-5 text-purple-600 rounded">
    <label for="is_featured" class="text-sm font-semibold text-slate-700">Featured Community</label>
</div>

<!-- Status -->
<div>
    <label class="text-sm font-semibold text-slate-700 mb-2 block">Status</label>
    <select name="status" class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
        <option value="draft">Draft</option>
        <option value="published">Published</option>
    </select>
</div>

<!-- Order -->
<div>
    <label class="text-sm font-semibold text-slate-700 mb-2 block">Order</label>
    <input type="number" name="order" value="0"
        class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
</div>

<!-- Submit -->
<div class="flex gap-4 pt-4">
    @if(request('referrer'))
    <a href="{{ request('referrer') }}" class="flex-1 py-3 px-6 rounded-xl border-2 border-slate-300 text-slate-600 font-semibold hover:bg-slate-50 transition-all text-center">
        Cancel
    </a>
    @else
    <a href="{{ route('admin.communities.index') }}" class="flex-1 py-3 px-6 rounded-xl border-2 border-slate-300 text-slate-600 font-semibold hover:bg-slate-50 transition-all text-center">
        Cancel
    </a>
    @endif
    <button type="button" id="submitBtn" class="flex-1 py-3 px-6 rounded-xl gradient-bg text-white font-semibold hover:shadow-lg hover:scale-[1.02] transition-all">
        Create Community
    </button>
</div>
</form>
</div>
</div>

@endsection

@push('scripts')
<script>
    (function() {
        const titleInput = document.querySelector('input[name="title"]');
        const slugInput = document.getElementById('slug');
        const form = document.getElementById('communityForm');
        const submitBtn = document.getElementById('submitBtn');

        function generateSlug(text) {
            if (!text) return '';
            return text.toLowerCase()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-')
                .replace(/^-|-$/g, '')
                .substring(0, 100);
        }

        if (form && submitBtn && titleInput) {
            submitBtn.addEventListener('click', function() {
                if (titleInput.value.trim()) {
                    slugInput.value = generateSlug(titleInput.value.trim());
                }
                form.submit();
            });
        }
    })();
</script>
@endpush