@props([
'items' => [
['svg' => '', 'url' => '#', 'label' => 'Website', 'sublabel' => ''],
['svg' => '', 'url' => '#', 'label' => 'Email', 'sublabel' => ''],
],
'variant' => 'card' // 'card' or 'inline'
])

@if($variant === 'card')
<div class="rounded-2xl p-8 overflow-hidden relative">
    <!-- Decorative background elements -->
    <div class="absolute top-0 right-0 w-64 h-64 bg-gradient-to-br from-indigo-100/50 to-purple-100/50 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
    <div class="absolute bottom-0 left-0 w-48 h-48 bg-gradient-to-br from-blue-100/50 to-cyan-100/50 rounded-full blur-3xl translate-y-1/2 -translate-x-1/2"></div>

    <div class="relative">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach($items as $item)
            <a href="{{ $item['url'] }}"
                class="group relative overflow-hidden rounded-2xl border border-slate-200 bg-white/80 backdrop-blur-sm p-6 transition-all duration-300 hover:border-indigo-300 hover:shadow-xl hover:-translate-y-1">
                <!-- Hover gradient overlay -->
                <div class="absolute inset-0 bg-gradient-to-br from-indigo-500/0 to-purple-500/0 opacity-0 transition-opacity duration-300 group-hover:from-indigo-500/5 group-hover:to-purple-500/5 group-hover:opacity-100"></div>

                <div class="relative flex flex-col items-center gap-4">
                    <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-slate-50 to-slate-100 border border-slate-200 flex items-center justify-center shadow-sm group-hover:shadow-md group-hover:border-indigo-200 transition-all duration-300">
                        @if($item['svg'])
                        <div class="w-8 h-8 text-indigo-600">{!! $item['svg'] !!}</div>
                        @else
                        <span class="material-symbols-outlined text-3xl text-indigo-600">public</span>
                        @endif
                    </div>
                    <div class="text-center">
                        <span class="block text-sm font-semibold text-slate-800 group-hover:text-indigo-600 transition-colors">{{ $item['label'] }}</span>
                        @if($item['sublabel'])
                        <span class="block text-xs text-slate-500 mt-1">{{ $item['sublabel'] }}</span>
                        @endif
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>
@else
<div class="flex gap-4 flex-wrap">
    @foreach($items as $item)
    <a href="{{ $item['url'] }}"
        class="w-10 h-10 rounded-full border border-outline-variant flex items-center justify-center text-primary hover:scale-110 hover:shadow-lg hover:border-primary transition-all duration-300">
        @if($item['svg'])
        <div class="w-5 h-5">{!! $item['svg'] !!}</div>
        @else
        <span class="material-symbols-outlined text-lg">public</span>
        @endif
    </a>
    @endforeach
</div>
@endif