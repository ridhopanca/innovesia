@extends('layouts.app')

@section('main_classes', 'pt-32')
@section('footer_classes', 'w-full')

@section('content')
<!-- Hero Section -->
<section class="px-8 max-w-7xl mx-auto mb-32">
    <div class="flex flex-col md:flex-row gap-16 items-center">
        <div class="w-full md:w-3/5">
            <span class="inline-block px-4 py-1.5 rounded-full bg-secondary-container text-on-secondary-container font-label text-xs font-bold tracking-[0.1em] uppercase mb-6">COLLECTIVE</span>
            <h1 class="text-5xl md:text-7xl font-extrabold tracking-tight text-primary leading-[1.1] mb-8">
                {{ $sections['content']['hero_title'] ?? 'The Minds Behind the Innovation.' }}
            </h1>
            <p class="text-xl text-on-surface-variant max-w-2xl leading-relaxed mb-10">
                {{ $sections['content']['hero_description'] ?? 'Innovesia is built as a collective of strategists, researchers, and creators—working together to design solutions that create meaningful and lasting impact.' }}
            </p>
            <div class="flex flex-wrap gap-4">
                <a href="#functional-pillars" class="bg-primary-container text-white px-8 py-4 rounded-xl text-lg font-bold hover:scale-[1.02] transition-transform shadow-[0_20px_40px_rgba(0,30,64,0.12)] inline-block">
                    Explore Our Structure
                </a>
                <a href="#collaborate" class="bg-surface-container-low text-primary px-8 py-4 rounded-xl text-lg font-bold hover:bg-surface-container-high transition-colors inline-block">
                    Collaborate With Us
                </a>
            </div>
        </div>
        <div class="w-full md:w-2/5">
            <div class="relative rounded-xl overflow-hidden aspect-square shadow-2xl">
                <img alt="Team collaborating" class="object-cover w-full h-full" data-alt="A group of diverse, professional strategists collaborating in a sunlit modern studio with glass walls and architectural plants" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAsOFMNhvq3wWctRCEb7k6BIr5F4aV7SdEvyqgbTKSuO0nOe-wxUeHl06UUvYChLwsylqixKfKOvsXOdrqUcK2zdxIjVmqGCZjbPoOaM0_n3ejo_oWRERa_HGJOZCD0YvZWQ2pUOzgrXfwNzP_lYUMO0sCq_uEvLTXjVDWuWm69vPIgOCs8kS8Ma1Qjtcr3A_wmVUDQaEzO4KOFayBMtBzGq_3Jih7-o9KDege0NjKfjRas9MGQ_fVR-SiQmzU9W1sNMAw9QMvoPOcq" />
            </div>
        </div>
    </div>
</section>

<!-- Intro Editorial Section -->
<section class="bg-surface-container-low py-24 mb-32">
    <div class="max-w-4xl mx-auto px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-primary mb-8 leading-tight">
            {{ $sections['content']['editorial_title'] ?? 'A Collaborative Ecosystem' }}
        </h2>
        <p class="text-xl text-on-surface-variant leading-loose font-light">
            {{ $sections['content']['editorial_description'] ?? 'At Innovesia, we dismantle traditional corporate silos. Our model is built on an editorialized framework where strategy, insight, and execution flow as a single narrative.' }}
        </p>
    </div>
</section>

<!-- Organizational Structure: Functional Pillars -->
<section id="functional-pillars" class="px-8 max-w-7xl mx-auto mb-40">
    <div class="mb-16">
        <h2 class="text-4xl font-bold text-primary tracking-tight">Functional Pillars</h2>
        <div class="h-1 w-24 bg-primary-container mt-4 rounded-full"></div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Director -->
        <div class="md:col-span-2 bg-surface-container-lowest p-10 rounded-xl shadow-sm hover:shadow-lg transition-shadow flex flex-col justify-between min-h-[300px]">
            <div>
                <span class="material-symbols-outlined text-4xl text-primary mb-6" data-icon="leaderboard">leaderboard</span>
                <h3 class="text-2xl font-bold text-primary mb-4">{{ $sections['content']['director_title'] ?? 'Director' }}</h3>
                <p class="text-on-surface-variant text-lg leading-relaxed max-w-lg">
                    {{ $sections['content']['director_description'] ?? 'Architects of vision, leading strategic direction and high-level global partnerships to ensure Innovesia\'s trajectory remains at the frontier of innovation.' }}
                </p>
            </div>
        </div>
        <!-- Innovation Strategy -->
        <div class="bg-surface-container-lowest p-10 rounded-xl shadow-sm hover:shadow-lg transition-shadow">
            <span class="material-symbols-outlined text-4xl text-primary mb-6" data-icon="auto_awesome_motion">auto_awesome_motion</span>
            <h3 class="text-xl font-bold text-primary mb-4">{{ $sections['content']['strategy_title'] ?? 'Innovation Strategy' }}</h3>
            <p class="text-on-surface-variant leading-relaxed">
                {{ $sections['content']['strategy_description'] ?? 'Designing the frameworks and long-term roadmaps that define how businesses evolve.' }}
            </p>
        </div>
        <!-- Design Research & Insight -->
        <div class="bg-surface-container-lowest p-10 rounded-xl shadow-sm hover:shadow-lg transition-shadow">
            <span class="material-symbols-outlined text-4xl text-primary mb-6" data-icon="biotech">biotech</span>
            <h3 class="text-xl font-bold text-primary mb-4">{{ $sections['content']['research_title'] ?? 'Design Research &amp; Insight' }}</h3>
            <p class="text-on-surface-variant leading-relaxed">
                {{ $sections['content']['research_description'] ?? 'Deep cultural immersion and data-backed validation to uncover what truly matters to humans.' }}
            </p>
        </div>
        <!-- Human-Centered Design -->
        <div class="bg-surface-container-lowest p-10 rounded-xl shadow-sm hover:shadow-lg transition-shadow">
            <span class="material-symbols-outlined text-4xl text-primary mb-6" data-icon="psychology">psychology</span>
            <h3 class="text-xl font-bold text-primary mb-4">{{ $sections['content']['design_title'] ?? 'Human-Centered Design' }}</h3>
            <p class="text-on-surface-variant leading-relaxed">
                {{ $sections['content']['design_description'] ?? 'Transforming abstract insights into tangible, intuitive solutions designed for the user.' }}
            </p>
        </div>
        <!-- Creative & Communication -->
        <div class="bg-surface-container-lowest p-10 rounded-xl shadow-sm hover:shadow-lg transition-shadow">
            <span class="material-symbols-outlined text-4xl text-primary mb-6" data-icon="palette">palette</span>
            <h3 class="text-xl font-bold text-primary mb-4">{{ $sections['content']['creative_title'] ?? 'Creative &amp; Communication' }}</h3>
            <p class="text-on-surface-variant leading-relaxed">
                {{ $sections['content']['creative_description'] ?? 'Crafting visual identities and narratives that resonate across every human touchpoint.' }}
            </p>
        </div>
        <!-- Program & Ecosystem -->
        <div class="md:col-span-1 bg-primary-container p-10 rounded-xl text-white shadow-xl">
            <span class="material-symbols-outlined text-4xl text-on-primary-container mb-6" data-icon="hub">hub</span>
            <h3 class="text-xl font-bold mb-4">{{ $sections['content']['program_title'] ?? 'Program &amp; Ecosystem' }}</h3>
            <p class="text-on-primary-container leading-relaxed">
                {{ $sections['content']['program_description'] ?? 'Scaling impact through education, UMKM support, and public sector innovation programs.' }}
            </p>
        </div>
        <!-- Community & Engagement -->
        <div class="md:col-span-2 bg-surface-container-high p-10 rounded-xl shadow-sm">
            <div class="flex flex-col md:flex-row gap-8">
                <div class="flex-1">
                    <span class="material-symbols-outlined text-4xl text-primary mb-6" data-icon="groups">groups</span>
                    <h3 class="text-xl font-bold text-primary mb-4">{{ $sections['content']['community_title'] ?? 'Community &amp; Engagement' }}</h3>
                    <p class="text-on-surface-variant leading-relaxed">
                        {{ $sections['content']['community_description'] ?? 'The InnoVocation Lab: Activating communities through collaborative learning and creative expression.' }}
                    </p>
                </div>
                <div class="flex-1 bg-surface-container-lowest p-6 rounded-lg border border-outline-variant/10">
                    <p class="text-sm font-label uppercase font-bold tracking-widest text-primary mb-4">Lab Focus</p>
                    <ul class="space-y-3 text-on-surface-variant">
                        <li class="flex items-center gap-3">
                            <span class="material-icons-outlined text-sm" data-icon="check_circle">check_circle</span>
                            {{ $sections['content']['lab_focus_1'] ?? 'Skill-building Workshops' }}
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="material-icons-outlined text-sm" data-icon="check_circle">check_circle</span>
                            {{ $sections['content']['lab_focus_2'] ?? 'Ecosystem Networking' }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team Visual Grid -->
<section class="py-32 bg-white">
    <div class="px-8 max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-8">
            <div>
                <h2 class="text-4xl font-bold text-primary tracking-tight">{{ $sections['content']['team_title'] ?? 'The Collective Mindset' }}</h2>
                <p class="text-on-surface-variant mt-4 text-lg">{{ $sections['content']['team_subtitle'] ?? 'A collective of diverse thinkers and builders' }}</p>
            </div>
        </div>

        @if($teamMembers && $teamMembers->count() > 0)
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            @foreach($teamMembers as $member)
            <div class="group">
                <div class="aspect-[3/4] rounded-xl overflow-hidden mb-4 bg-surface-container-low grayscale group-hover:grayscale-0 transition-all duration-500">
                    @if($member->image)
                    <img src="{{ $member->image }}" alt="{{ $member->name }}" class="object-cover w-full h-full">
                    @else
                    <div class="w-full h-full flex items-center justify-center">
                        <span class="material-icons-outlined text-4xl text-slate-300">person</span>
                    </div>
                    @endif
                </div>
                <h4 class="font-bold text-primary">{{ $member->name }}</h4>
                <p class="text-sm text-on-surface-variant">{{ $member->role ?? '' }}</p>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        @if($teamMembers->hasPages())
        <div class="flex justify-center mt-12">
            {{ $teamMembers->links() }}
        </div>
        @endif
        @endif
    </div>
</section>

<!-- How We Work Section -->
<section class="px-8 max-w-7xl mx-auto mb-40">
    <div class="bg-surface-container-lowest rounded-xl p-16 shadow-sm border border-outline-variant/10">
        <h2 class="text-3xl font-bold text-primary text-center mb-16">{{ $sections['content']['methodology_title'] ?? 'The Methodology of Movement' }}</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            <div class="text-center">
                <div class="w-16 h-16 rounded-full bg-secondary-container flex items-center justify-center mx-auto mb-6 text-on-secondary-container">
                    <span class="material-symbols-outlined text-3xl" data-icon="lightbulb">lightbulb</span>
                </div>
                <h4 class="text-xl font-bold text-primary mb-3">Design Thinking</h4>
                <p class="text-on-surface-variant">A non-linear, iterative process used to understand users and redefine problems.</p>
            </div>
            <div class="text-center">
                <div class="w-16 h-16 rounded-full bg-secondary-container flex items-center justify-center mx-auto mb-6 text-on-secondary-container">
                    <span class="material-symbols-outlined text-3xl" data-icon="visibility">visibility</span>
                </div>
                <h4 class="text-xl font-bold text-primary mb-3">Insightism</h4>
                <p class="text-on-surface-variant">Our signature approach to distilling complex data into actionable cultural narratives.</p>
            </div>
            <div class="text-center">
                <div class="w-16 h-16 rounded-full bg-secondary-container flex items-center justify-center mx-auto mb-6 text-on-secondary-container">
                    <span class="material-symbols-outlined text-3xl" data-icon="travel_explore">travel_explore</span>
                </div>
                <h4 class="text-xl font-bold text-primary mb-3">Field-Based</h4>
                <p class="text-on-surface-variant">Deep immersion in real-world contexts to validate solutions where they live.</p>
            </div>
        </div>
    </div>
</section>

<!-- Collaboration Invite -->
<section id="collaborate" class="px-8 max-w-7xl mx-auto mb-20">
    <div class="bg-primary-container rounded-xl overflow-hidden relative">
        <div class="absolute inset-0 opacity-10">
            <img alt="Collaborative environment" class="w-full h-full object-cover" data-alt="Blurred background showing a group of creative professionals in a workshop, colorful sticky notes on a glass wall" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBy2C5eDcup5abUpGOCU57ECOkeQ7DVPiACEkm6RtnvpqKfEHkGoC1ybWS3uiMl0RjV2kMeGBh3Lkpg9ZyV6_UuXzZAHHzRQWyKhCCHRSWUw0wGovHgaShhxhlr8wtlvpIrO4FQZ0WNBIY0qH84sa9A8K6JEfzPHQ4By4j3i9S62NfSTCZbjfPBMmUQrfvbLis8qD5ngECnnY5AzDN72mNpdkODvSZfCDcxsqVUE5oW4Hct3yrecwZ4rtYNRpvJ4mIclrkDUw6A9wcD" />
        </div>
        <div class="relative z-10 px-12 py-20 text-center max-w-3xl mx-auto">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">{{ $sections['content']['cta_title'] ?? 'Be Part of the Collective' }}</h2>
            <p class="text-on-primary-container text-lg mb-10 leading-relaxed">
                {{ $sections['content']['cta_description'] ?? 'We are constantly seeking brilliant strategists, empathetic researchers, and visionary creators to join our mission of designing a better future.' }}
            </p>
            <a href="{{ route('contact') }}" class="bg-white text-primary px-10 py-4 rounded-xl font-bold text-lg hover:bg-surface transition-colors shadow-2xl inline-block">
                Collaborate With Us
            </a>
        </div>
    </div>
</section>
@endsection