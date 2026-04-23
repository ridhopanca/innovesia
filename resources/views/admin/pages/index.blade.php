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
                </div>
            </div>

            <!-- Card Footer / Action -->
            <div class="px-5 pb-5">
                <a href="/cms/pages/{{ $page->slug }}"
                    class="edit-btn w-full inline-flex items-center justify-center gap-2 px-4 py-3 rounded-xl text-white font-semibold">
                    <span class="material-icons-outlined text-lg">edit</span>
                    <span>Edit Page</span>
                    <span class="material-icons-outlined text-lg group-hover:translate-x-1 transition-transform">arrow_forward</span>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection