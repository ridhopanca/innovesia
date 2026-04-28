@extends('layouts.admin')

@push('styles')
<style>
    .page-card {
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        box-shadow: 0 8px 32px rgba(102, 126, 234, 0.1),
            0 2px 8px rgba(0, 0, 0, 0.04);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .page-card:hover {
        transform: translateY(-4px) scale(1.01);
        box-shadow: 0 20px 40px rgba(102, 126, 234, 0.15),
            0 8px 16px rgba(0, 0, 0, 0.06);
        border-color: rgba(102, 126, 234, 0.2);
    }

    .status-pulse {
        animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }

    @keyframes pulse {

        0%,
        100% {
            opacity: 1;
        }

        50% {
            opacity: 0.7;
        }
    }

    .gradient-text {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .edit-btn {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .edit-btn:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 24px rgba(102, 126, 234, 0.4);
    }

    .icon-glow {
        box-shadow: 0 4px 16px rgba(102, 126, 234, 0.3);
    }
</style>
@endpush

@section('content')

<div class="p-8 max-w-7xl mx-auto">
    <!-- Header Section -->
    <div class="mb-10">
        <div class="flex items-center gap-4 mb-3">
            <div class="w-12 h-12 rounded-2xl gradient-bg flex items-center justify-center icon-glow">
                <span class="material-icons-outlined text-white text-2xl">auto_stories</span>
            </div>
            <div>
                <h1 class="text-3xl font-bold gradient-text">Pages</h1>
                <p class="text-slate-500 mt-1">Manage and organize your website content</p>
            </div>
        </div>
    </div>

    <!-- Stats Overview -->
    <div class="grid grid-cols-4 gap-4 mb-8">
        @php
        $published = $pages->where('display_status', 'published')->count();
        $modified = $pages->where('display_status', 'modified')->count();
        $draft = $pages->where('display_status', 'draft')->count();
        @endphp
        <div class="page-card rounded-2xl p-5">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-green-100 flex items-center justify-center">
                    <span class="material-icons-outlined text-green-600">check_circle</span>
                </div>
                <div>
                    <div class="text-2xl font-bold text-slate-800">{{ $published }}</div>
                    <div class="text-xs text-slate-500 font-medium">Published</div>
                </div>
            </div>
        </div>
        <div class="page-card rounded-2xl p-5">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-amber-100 flex items-center justify-center">
                    <span class="material-icons-outlined text-amber-600">edit_note</span>
                </div>
                <div>
                    <div class="text-2xl font-bold text-slate-800">{{ $modified }}</div>
                    <div class="text-xs text-slate-500 font-medium">Modified</div>
                </div>
            </div>
        </div>
        <div class="page-card rounded-2xl p-5">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-orange-100 flex items-center justify-center">
                    <span class="material-icons-outlined text-orange-600">drafts</span>
                </div>
                <div>
                    <div class="text-2xl font-bold text-slate-800">{{ $draft }}</div>
                    <div class="text-xs text-slate-500 font-medium">Drafts</div>
                </div>
            </div>
        </div>
        <div class="page-card rounded-2xl p-5">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-indigo-100 flex items-center justify-center">
                    <span class="material-icons-outlined text-indigo-600">layers</span>
                </div>
                <div>
                    <div class="text-2xl font-bold text-slate-800">{{ $pages->count() }}</div>
                    <div class="text-xs text-slate-500 font-medium">Total Pages</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pages Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
        @foreach($pages as $page)
        <div class="page-card rounded-2xl overflow-hidden group">
            <!-- Card Header with Gradient -->
            <div class="h-24 gradient-bg relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-white/10 to-transparent"></div>
                <div class="absolute -bottom-6 -right-6 w-24 h-24 bg-white/10 rounded-full blur-xl"></div>
                <div class="absolute top-4 left-4">
                    @if($page->display_status === 'published')
                    <span class="px-3 py-1 rounded-full text-xs font-semibold bg-green-400/20 text-green-50 backdrop-blur-sm border border-green-400/30">
                        Published
                    </span>
                    @elseif($page->display_status === 'modified')
                    <span class="px-3 py-1 rounded-full text-xs font-semibold bg-amber-400/20 text-amber-50 backdrop-blur-sm border border-amber-400/30 status-pulse">
                        Modified
                    </span>
                    @else
                    <span class="px-3 py-1 rounded-full text-xs font-semibold bg-white/10 text-white/80 backdrop-blur-sm border border-white/20">
                        Draft
                    </span>
                    @endif
                </div>
                <div class="absolute bottom-4 left-4 right-4">
                    <div class="text-white/60 text-xs font-medium uppercase tracking-wider">{{ $page->template ?? 'Page' }}</div>
                </div>
            </div>

            <!-- Card Body -->
            <div class="p-5">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-slate-50 to-slate-100 flex items-center justify-center shrink-0 border border-slate-200 group-hover:border-indigo-200 transition-colors">
                        <span class="material-icons-outlined text-slate-400 group-hover:text-indigo-500 transition-colors">description</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <h3 class="font-bold text-slate-800 text-lg truncate group-hover:text-indigo-600 transition-colors">{{ $page->title }}</h3>
                        <p class="text-sm text-slate-400 mt-1">/{{ $page->slug }}</p>
                    </div>
                </div>

                <!-- Meta Info -->
                <div class="flex items-center gap-4 mt-4 pt-4 border-t border-slate-100">
                    <div class="flex items-center gap-1.5 text-xs text-slate-500">
                        <span class="material-icons-outlined text-base">schedule</span>
                        <span>{{ $page->updated_at->diffForHumans() }}</span>
                    </div>
                    <div class="flex items-center gap-1.5 text-xs text-slate-500">
                        <span class="material-icons-outlined text-base">view_carousel</span>
                        <span>{{ $page->unique_sections_count }} sections</span>
                    </div>
                    @if($page->slug === 'product')
                    @php
                    $serviceCount = \App\Models\Service::published()->count();
                    @endphp
                    @if($serviceCount > 0)
                    <button onclick="openServicesModal()" class="flex items-center gap-1.5 text-xs text-indigo-600 font-semibold hover:text-indigo-800 transition-colors">
                        <span class="material-icons-outlined text-base">subdirectory_arrow_right</span>
                        <span>{{ $serviceCount }} services</span>
                    </button>
                    @endif
                    @elseif($page->children->count() > 0)
                    <div class="flex items-center gap-1.5 text-xs text-indigo-600 font-semibold">
                        <span class="material-icons-outlined text-base">subdirectory_arrow_right</span>
                        <span>{{ $page->children->count() }} detail pages</span>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Card Footer / Action -->
            <div class="px-5 pb-5">
                @if($page->slug === 'our-work' && $page->children->count() === 0)
                <div class="flex gap-3">
                    <a href="/cms/pages/{{ $page->slug }}"
                        class="flex-1 edit-btn inline-flex items-center justify-center gap-2 px-4 py-3 rounded-xl text-white font-semibold">
                        <span class="material-icons-outlined text-lg">edit</span>
                        <span>Edit Page</span>
                    </a>
                    <a href="/cms/projects"
                        class="flex-1 bg-slate-100 hover:bg-slate-200 text-slate-700 px-4 py-3 rounded-xl font-semibold transition-all inline-flex items-center justify-center gap-2">
                        <span class="material-icons-outlined text-lg">work</span>
                        <span>Manage Projects</span>
                    </a>
                </div>
                @elseif($page->slug === 'product')
                <div class="flex flex-col gap-3">
                    <a href="/cms/pages/{{ $page->slug }}"
                        class="flex-1 edit-btn inline-flex items-center justify-center gap-2 px-4 py-3 rounded-xl text-white font-semibold">
                        <span class="material-icons-outlined text-lg">edit</span>
                        <span>Edit Page</span>
                    </a>
                    <a href="/cms/services"
                        class="flex-1 bg-slate-100 hover:bg-slate-200 text-slate-700 px-4 py-3 rounded-xl font-semibold transition-all inline-flex items-center justify-center gap-2">
                        <span class="material-icons-outlined text-lg">business_center</span>
                        <span>Manage Services</span>
                    </a>
                </div>
                @else
                <a href="/cms/pages/{{ $page->slug }}"
                    class="edit-btn w-full inline-flex items-center justify-center gap-2 px-4 py-3 rounded-xl text-white font-semibold">
                    <span class="material-icons-outlined text-lg">edit</span>
                    <span>Edit Page</span>
                    <span class="material-icons-outlined text-lg group-hover:translate-x-1 transition-transform">arrow_forward</span>
                </a>
                @endif
            </div>

            <!-- Child Pages -->
            @if($page->children->count() > 0)
            <div class="px-5 pb-5 pt-0 border-t border-slate-100">
                <div class="mt-4 space-y-2">
                    @foreach($page->children as $child)
                    <a href="/cms/pages/{{ $child->slug }}" class="flex items-center gap-2 p-3 rounded-lg bg-slate-50 hover:bg-indigo-50 transition-colors group/child">
                        <div class="w-8 h-8 rounded-lg bg-white flex items-center justify-center shrink-0 border border-slate-200">
                            <span class="material-icons-outlined text-sm text-slate-400">article</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="text-sm font-semibold text-slate-700 truncate group-hover/child:text-indigo-600 transition-colors">{{ $child->title }}</div>
                            <div class="text-xs text-slate-400">/{{ $child->slug }}</div>
                        </div>
                        @if($child->display_status === 'modified')
                        <span class="w-2 h-2 rounded-full bg-amber-400 status-pulse"></span>
                        @elseif($child->display_status === 'draft')
                        <span class="w-2 h-2 rounded-full bg-orange-400"></span>
                        @endif
                    </a>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
        @endforeach
    </div>

    <!-- General Information Section -->
    <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
        <div class="page-card rounded-2xl overflow-hidden group">
            <!-- Card Header with Gradient -->
            <div class="h-24 gradient-bg relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-white/10 to-transparent"></div>
                <div class="absolute -bottom-6 -right-6 w-24 h-24 bg-white/10 rounded-full blur-xl"></div>
                <div class="absolute top-4 left-4">
                    <span class="px-3 py-1 rounded-full text-xs font-semibold bg-green-400/20 text-green-50 backdrop-blur-sm border border-green-400/30">
                        Active
                    </span>
                </div>
                <div class="absolute bottom-4 left-4 right-4">
                    <div class="text-white/60 text-xs font-medium uppercase tracking-wider">General Information</div>
                </div>
            </div>

            <!-- Card Body -->
            <div class="p-5">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-slate-50 to-slate-100 flex items-center justify-center shrink-0 border border-slate-200 group-hover:border-indigo-200 transition-colors">
                        <span class="material-icons-outlined text-slate-400 group-hover:text-indigo-500 transition-colors">link</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <h3 class="font-bold text-slate-800 text-lg truncate group-hover:text-indigo-600 transition-colors">Links & Information</h3>
                        <p class="text-sm text-slate-400 mt-1">Social media & contact links</p>
                    </div>
                </div>

                <!-- Meta Info -->
                <div class="flex items-center gap-4 mt-4 pt-4 border-t border-slate-100">
                    <div class="flex items-center gap-1.5 text-xs text-slate-500">
                        <span class="material-icons-outlined text-base">link</span>
                        <span>{{ $generalInfo ? count($generalInfo->items) : 0 }} links</span>
                    </div>
                </div>
            </div>

            <!-- Card Footer / Action -->
            <div class="px-5 pb-5">
                <a href="{{ route('admin.general-information.edit') }}"
                    class="edit-btn w-full inline-flex items-center justify-center gap-2 px-4 py-3 rounded-xl text-white font-semibold">
                    <span class="material-icons-outlined text-lg">edit</span>
                    <span>Edit Links</span>
                    <span class="material-icons-outlined text-lg group-hover:translate-x-1 transition-transform">arrow_forward</span>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Services Modal -->
<div id="servicesModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden items-center justify-center">
    <div class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full mx-4 max-h-[80vh] overflow-hidden">
        <div class="gradient-bg px-6 py-4 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <span class="material-icons-outlined text-white text-2xl">business_center</span>
                <h2 class="font-bold text-lg text-white">Services</h2>
            </div>
            <button onclick="closeServicesModal()" class="text-white/80 hover:text-white transition-colors">
                <span class="material-icons-outlined">close</span>
            </button>
        </div>
        <div class="p-6 overflow-y-auto max-h-[60vh]">
            <div class="space-y-2">
                @php
                $allServices = \App\Models\Service::ordered()->get();
                @endphp
                @foreach($allServices as $service)
                <a href="/cms/services/{{ $service->id }}/edit?referrer={{ url()->current() }}" class="flex items-center gap-3 p-4 rounded-xl bg-slate-50 hover:bg-indigo-50 transition-colors group/child">
                    <div class="w-10 h-10 rounded-lg bg-white flex items-center justify-center shrink-0 border border-slate-200">
                        <span class="material-icons-outlined text-slate-400">business_center</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="font-semibold text-slate-700 truncate group-hover/child:text-indigo-600 transition-colors">{{ $service->title }}</div>
                        <div class="text-sm text-slate-400">/service/{{ $service->slug }}</div>
                    </div>
                    @if($service->status === 'draft')
                    <span class="px-2 py-1 rounded-full text-xs font-semibold bg-orange-400/20 text-orange-700">Draft</span>
                    @elseif($service->status === 'published')
                    <span class="px-2 py-1 rounded-full text-xs font-semibold bg-green-400/20 text-green-700">Published</span>
                    @endif
                </a>
                @endforeach
            </div>
        </div>
        <div class="px-6 py-4 border-t border-slate-100 bg-slate-50">
            <a href="/cms/services" class="flex items-center justify-center gap-2 w-full py-3 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold transition-all">
                <span class="material-icons-outlined">settings</span>
                <span>Manage All Services</span>
            </a>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    function openServicesModal() {
        document.getElementById('servicesModal').classList.remove('hidden');
        document.getElementById('servicesModal').classList.add('flex');
    }

    function closeServicesModal() {
        document.getElementById('servicesModal').classList.add('hidden');
        document.getElementById('servicesModal').classList.remove('flex');
    }

    // Close modal on escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeServicesModal();
        }
    });

    // Close modal on backdrop click
    document.getElementById('servicesModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeServicesModal();
        }
    });
</script>
@endpush