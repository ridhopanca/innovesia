@php
$projects = $data['projects'] ?? [
['category' => 'FinTech • 2024', 'title' => 'Reimagining Digital Banking for Gen-Z', 'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCKC0XeXEi3LBDgxm7gWbJ4uwjMVgbiFDzqKd2sXUCXoKvtqUr0d7SfrNAteXUwd_FLXjJvFkZ_t-R4QUrejH8Wx9Bex-xG2rxYBFCAKjqxCgm-E8K5PdD_-mlMy3Dqjnolno3xIxR4oGCTCZ9dgwEnHQS_H62JalYF3vJ5XKDT-DMmITr5cpWL_GI_qC3-f7j0PLkSwZbg34t18GqjoCtKJAV7irxE8AsScC9yN-_oFzHLi8bXGZjCGrO_sybTEoCaydquaU9HG_N6'],
['category' => 'Sustainability • 2023', 'title' => 'Eco-Systems Architecture', 'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAijYmEUvBhyQcSY-scU2YiWZRqFOa2TPRNhhvqFkq69_sq_7V60Td7dhk-CZyLzlggQ6A-NmIPP4iTFY_GCvmWNUBJ_rpjq1PWyMJhEPuEb1Eubo-g_81CzmA1T-vnPFk_a-QtERdg9d3ETVWhQlCepNGk4ry4K4gasZr33Z28ujEMV6VMS9Wh2xdlooU2wR_2l-GyMzmgomiJxMWWcZx9MppFm-Vwf7yyZt_ZvCOREtPUDl7Ne_xJdHT7T6ihgiXqdzsuikDADZrc']
];
$featured = $projects[0] ?? null;
$secondary = $projects[1] ?? null;
@endphp
<section class="py-32 bg-surface-container-high overflow-hidden">
    <div class="max-w-7xl mx-auto px-8">
        <h2 class="text-5xl font-black font-headline text-primary tracking-tighter mb-20 text-center lg:text-left" data-animate="fade-up">{{ $data['title'] ?? 'Strategic Case Studies' }}</h2>
        <div class="grid grid-cols-1 md:grid-cols-12 gap-10" data-animate="stagger">
            @if($featured)
            <div class="md:col-span-8 group relative rounded-3xl overflow-hidden aspect-[16/9] shadow-xl">
                <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" alt="{{ $featured['title'] }}" src="{{ $featured['image'] }}" />
                <div class="absolute inset-0 bg-gradient-to-t from-primary/80 via-transparent to-transparent opacity-60 group-hover:opacity-80 transition-opacity"></div>
                <div class="absolute bottom-0 left-0 p-10">
                    <span class="text-white/70 text-xs font-bold font-label tracking-widest uppercase mb-2 block">{{ $featured['category'] }}</span>
                    <h4 class="text-3xl font-bold text-white font-headline">{{ $featured['title'] }}</h4>
                </div>
            </div>
            @endif
            @if($secondary)
            <div class="md:col-span-4 group relative rounded-3xl overflow-hidden aspect-[1/1] md:aspect-auto shadow-xl">
                <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" alt="{{ $secondary['title'] }}" src="{{ $secondary['image'] }}" />
                <div class="absolute inset-0 bg-gradient-to-t from-primary/80 via-transparent to-transparent opacity-60 group-hover:opacity-80 transition-opacity"></div>
                <div class="absolute bottom-0 left-0 p-8">
                    <span class="text-white/70 text-xs font-bold font-label tracking-widest uppercase mb-2 block">{{ $secondary['category'] }}</span>
                    <h4 class="text-xl font-bold text-white font-headline">{{ $secondary['title'] }}</h4>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>