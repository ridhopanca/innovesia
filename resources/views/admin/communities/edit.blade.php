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
                <span class="material-icons-outlined text-white text-lg">edit</span>
            </div>
            <h1 class="text-2xl font-bold text-slate-800">
                Edit Community
            </h1>
        </div>
    </div>

    <!-- Form -->
    <div class="page-card rounded-2xl overflow-hidden p-8">
        <form action="{{ route('admin.communities.update', $community->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            @if(request('referrer'))
            <input type="hidden" name="referrer" value="{{ request('referrer') }}">
            @endif

            <!-- Title -->
            <div>
                <label class="text-sm font-semibold text-slate-700 mb-2 block">Community Title</label>
                <input type="text" name="title" required value="{{ $community->title }}"
                    class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
            </div>

            <!-- Slug -->
            <div>
                <label class="text-sm font-semibold text-slate-700 mb-2 block">Slug</label>
                <input type="text" name="slug" required value="{{ $community->slug }}"
                    class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
            </div>

            <!-- Badge -->
            <div>
                <label class="text-sm font-semibold text-slate-700 mb-2 block">Badge</label>
                <input type="text" name="badge" value="{{ $community->badge }}"
                    class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
            </div>

            <!-- Description -->
            <div>
                <label class="text-sm font-semibold text-slate-700 mb-2 block">Description</label>
                <textarea name="description" rows="3"
                    class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">{{ $community->description }}</textarea>
            </div>

            <!-- Image -->
            <div>
                <label class="text-sm font-semibold text-slate-700 mb-2 block">Image URL</label>
                <input type="text" name="image" value="{{ $community->image }}"
                    class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                @if($community->image)
                <div class="mt-2">
                    <img src="{{ $community->image }}" alt="Preview" class="h-32 rounded-lg object-cover">
                </div>
                @endif
            </div>

            <!-- Primary Button -->
            <div>
                <label class="text-sm font-semibold text-slate-700 mb-2 block">Primary Button Text</label>
                <input type="text" name="primary_button" value="{{ $community->primary_button }}"
                    class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
            </div>

            <!-- Secondary Button -->
            <div>
                <label class="text-sm font-semibold text-slate-700 mb-2 block">Secondary Button Text</label>
                <input type="text" name="secondary_button" value="{{ $community->secondary_button }}"
                    class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
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
                        <input type="text" name="program_data[title]" value="{{ $community->program_data['title'] ?? '' }}"
                            class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                            placeholder="Program Architecture">
                    </div>
                    @for($i = 0; $i < 3; $i++)
                        <div class="p-4 bg-slate-50 rounded-xl border border-slate-200">
                        <h4 class="text-sm font-semibold text-slate-700 mb-3">Program {{ $i + 1 }}</h4>
                        <div class="grid grid-cols-3 gap-3">
                            <input type="text" name="program_data[programs][{{ $i }}][icon]" value="{{ $community->program_data['programs'][$i]['icon'] ?? '' }}"
                                class="border border-slate-300 p-2 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                                placeholder="Icon (e.g., school)">
                            <input type="text" name="program_data[programs][{{ $i }}][title]" value="{{ $community->program_data['programs'][$i]['title'] ?? '' }}"
                                class="border border-slate-300 p-2 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                                placeholder="Title">
                            <input type="text" name="program_data[programs][{{ $i }}][description]" value="{{ $community->program_data['programs'][$i]['description'] ?? '' }}"
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
                <input type="text" name="timeline_data[title]" value="{{ $community->timeline_data['title'] ?? '' }}"
                    class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                    placeholder="Timeline Roadmap">
            </div>
            <div>
                <label class="text-sm font-semibold text-slate-700 mb-2 block">Timeline Subtitle</label>
                <input type="text" name="timeline_data[subtitle]" value="{{ $community->timeline_data['subtitle'] ?? '' }}"
                    class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                    placeholder="Tracking our journey">
            </div>
            @php
            $timelineEvents = $community->timeline_data['events'] ?? $community->timeline_data['entries'] ?? [];
            @endphp
            @for($i = 0; $i < 3; $i++)
                <div class="p-4 bg-slate-50 rounded-xl border border-slate-200">
                <h4 class="text-sm font-semibold text-slate-700 mb-3">Timeline Event {{ $i + 1 }}</h4>
                <div class="space-y-3">
                    <input type="text" name="timeline_data[events][{{ $i }}][date]" value="{{ $timelineEvents[$i]['date'] ?? '' }}"
                        class="w-full border border-slate-300 p-2 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                        placeholder="Date (e.g., April Week 4)">
                    <input type="text" name="timeline_data[events][{{ $i }}][school]" value="{{ $timelineEvents[$i]['school'] ?? '' }}"
                        class="w-full border border-slate-300 p-2 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                        placeholder="School/Institution">
                    <select name="timeline_data[events][{{ $i }}][status]" class="w-full border border-slate-300 p-2 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all bg-white">
                        <option value="">Select Status</option>
                        <option value="completed" {{ ($timelineEvents[$i]['status'] ?? '') === 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="next" {{ ($timelineEvents[$i]['status'] ?? '') === 'next' ? 'selected' : '' }}>Next Session</option>
                        <option value="upcoming" {{ ($timelineEvents[$i]['status'] ?? '') === 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                    </select>
                    <textarea name="timeline_data[events][{{ $i }}][description]"
                        class="w-full border border-slate-300 p-2 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                        rows="2" placeholder="Description">{{ $timelineEvents[$i]['description'] ?? '' }}</textarea>
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
            <input type="text" name="documentation_data[title]" value="{{ $community->documentation_data['title'] ?? 'In the Lab' }}"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
        </div>
        @php
        $docImages = $community->documentation_images ?? [];
        @endphp
        @for($i = 0; $i < 4; $i++)
            @php
            $imageUrl=is_array($docImages[$i] ?? null) ? ($docImages[$i]['url'] ?? '' ) : ($docImages[$i] ?? '' );
            $imageTitle=is_array($docImages[$i] ?? null) ? ($docImages[$i]['title'] ?? '' ) : '' ;
            @endphp
            <div class="p-4 bg-slate-50 rounded-xl border border-slate-200">
            <h4 class="text-sm font-semibold text-slate-700 mb-3">Image {{ $i + 1 }}</h4>
            <div class="space-y-3">
                <input type="text" name="documentation_images[{{ $i }}][url]" value="{{ $imageUrl }}"
                    class="w-full border border-slate-300 p-2 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                    placeholder="Image URL">
                <input type="text" name="documentation_images[{{ $i }}][title]" value="{{ $imageTitle }}"
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
            <input type="text" name="prototype_projects[title]" value="{{ $community->prototype_projects['title'] ?? '' }}"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                placeholder="Prototype Showcase">
        </div>
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Subtitle</label>
            <textarea name="prototype_projects[subtitle]" rows="2"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                placeholder="Turning ideas into tangible solutions">{{ $community->prototype_projects['subtitle'] ?? '' }}</textarea>
        </div>
        @for($i = 0; $i < 3; $i++)
            @php
            $project=$community->prototype_projects['projects'][$i] ?? [];
            @endphp
            <div class="p-4 bg-slate-50 rounded-xl border border-slate-200">
                <h4 class="text-sm font-semibold text-slate-700 mb-3">Project {{ $i + 1 }}</h4>
                <div class="space-y-3">
                    <input type="text" name="prototype_projects[projects][{{ $i }}][title]" value="{{ $project['title'] ?? '' }}"
                        class="w-full border border-slate-300 p-2 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                        placeholder="Project Title">
                    <input type="text" name="prototype_projects[projects][{{ $i }}][category]" value="{{ $project['category'] ?? '' }}"
                        class="w-full border border-slate-300 p-2 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                        placeholder="Category (e.g., Product Design)">
                    <textarea name="prototype_projects[projects][{{ $i }}][description]" rows="2"
                        class="w-full border border-slate-300 p-2 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                        placeholder="Project description">{{ $project['description'] ?? '' }}</textarea>
                    <input type="text" name="prototype_projects[projects][{{ $i }}][image]" value="{{ $project['image'] ?? '' }}"
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
            <input type="text" name="video_data[title]" value="{{ $community->video_data['title'] ?? 'Witness the Transformation' }}"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="text-sm font-semibold text-slate-700 mb-2 block">Video Title</label>
                <input type="text" name="video_title" value="{{ $community->video_title }}"
                    class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
            </div>
            <div>
                <label class="text-sm font-semibold text-slate-700 mb-2 block">Video Subtitle</label>
                <input type="text" name="video_subtitle" value="{{ $community->video_subtitle }}"
                    class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
            </div>
        </div>
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Video Image URL</label>
            <input type="text" name="video_image" value="{{ $community->video_image }}"
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
            <input type="text" name="cta_data[title]" value="{{ $community->cta_data['title'] ?? $community->cta_title }}"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
        </div>
        <div>
            <label class="text-sm font-semibold text-slate-700 mb-2 block">Description</label>
            <textarea name="cta_data[description]" rows="3"
                class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">{{ $community->cta_data['description'] ?? $community->cta_description }}</textarea>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="text-sm font-semibold text-slate-700 mb-2 block">Primary Button</label>
                <input type="text" name="cta_data[primary_button]" value="{{ $community->cta_data['primary_button'] ?? $community->cta_primary_button }}"
                    class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
            </div>
            <div>
                <label class="text-sm font-semibold text-slate-700 mb-2 block">Secondary Button</label>
                <input type="text" name="cta_data[secondary_button]" value="{{ $community->cta_data['secondary_button'] ?? $community->cta_secondary_button }}"
                    class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
            </div>
        </div>
    </div>
</div>

<!-- Featured -->
<div class="flex items-center gap-3">
    <input type="checkbox" name="is_featured" id="is_featured" {{ $community->is_featured ? 'checked' : '' }} class="w-5 h-5 text-purple-600 rounded">
    <label for="is_featured" class="text-sm font-semibold text-slate-700">Featured Community</label>
</div>

<!-- Status -->
<div>
    <label class="text-sm font-semibold text-slate-700 mb-2 block">Status</label>
    <select name="status" class="w-full border border-slate-300 p-3 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all bg-white">
        <option value="draft" {{ $community->status === 'draft' ? 'selected' : '' }}>Draft</option>
        <option value="published" {{ $community->status === 'published' ? 'selected' : '' }}>Published</option>
    </select>
</div>

<!-- Order -->
<div>
    <label class="text-sm font-semibold text-slate-700 mb-2 block">Order</label>
    <input type="number" name="order" value="{{ $community->order }}"
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
    <button type="submit" class="flex-1 py-3 px-6 rounded-xl gradient-bg text-white font-semibold hover:shadow-lg hover:scale-[1.02] transition-all">
        Update Community
    </button>
</div>
</form>
</div>
</div>

@endsection