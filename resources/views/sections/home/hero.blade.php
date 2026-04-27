<section class="relative min-h-[600px] md:min-h-[921px] flex items-center overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 md:px-8 grid grid-cols-1 lg:grid-cols-12 gap-8 md:gap-12 items-center">
        <div class="lg:col-span-7 z-10" data-animate="fade-up">
            @if(isset($data['badge']))
            <span class="inline-block px-3 md:px-4 py-1.5 rounded-full bg-secondary-container text-on-secondary-container text-[10px] font-bold tracking-[0.1em] uppercase mb-4 md:mb-6 font-label">{{ $data['badge'] }}</span>
            @endif
            @if(isset($data['title']))
            <h1 class="text-4xl md:text-6xl lg:text-8xl font-black font-headline text-primary tracking-tighter leading-[0.9] mb-6 md:mb-8 text-balance">
                {{ $data['title'] }}
                @if(isset($data['title_highlight']))
                <span class="text-on-primary-container">{{ $data['title_highlight'] }}</span>
                @endif
            </h1>
            @endif
            @if(isset($data['description']))
            <p class="text-base md:text-lg md:text-xl text-on-surface-variant max-w-xl mb-8 md:mb-10 leading-relaxed">
                {{ $data['description'] }}
            </p>
            @endif
            @if(isset($data['primary_button']) || isset($data['secondary_button']))
            <div class="flex flex-wrap gap-3 md:gap-4">
                @if(isset($data['primary_button']))
                <a href="{{ route('product') }}">
                    <button type="button" class="px-6 md:px-8 py-3 md:py-4 bg-gradient-to-br from-primary to-primary-container text-white rounded-xl font-headline font-bold text-base md:text-lg hover:scale-105 transition-all shadow-xl">
                        {{ $data['primary_button'] }}
                    </button>
                </a>
                @endif
                @if(isset($data['secondary_button']))
                <a href="{{ route('our-work') }}">
                    <button class="px-6 md:px-8 py-3 md:py-4 border border-outline-variant/30 text-primary rounded-xl font-headline font-bold text-base md:text-lg hover:bg-surface-container-low transition-all">
                        {{ $data['secondary_button'] }}
                    </button>
                </a>
                @endif
            </div>
            @endif
        </div>
        <div class="lg:col-span-5 relative group" data-animate="fade-up">
            <div class="absolute -inset-4 bg-primary-container/5 rounded-3xl blur-2xl group-hover:bg-primary-container/10 transition-all"></div>
            <div class="relative rounded-2xl overflow-hidden aspect-[4/5] shadow-2xl">
                @if(isset($data['image']))
                @php
                $imageUrl = $data['image'];
                if (str_starts_with($imageUrl, 'http://') || str_starts_with($imageUrl, 'https://')) {
                $imageSrc = $imageUrl;
                } elseif (str_starts_with($imageUrl, 'uploads/')) {
                $imageSrc = asset('storage/' . $imageUrl);
                } else {
                $imageSrc = asset('storage/' . $imageUrl);
                }
                @endphp
                <img class="w-full h-full object-cover" src="{{ $imageSrc }}" alt="Hero Image" />
                @else
                <img class="w-full h-full object-cover" data-alt="A diverse team of creative professionals collaborating in a bright modern workshop, using colorful sticky notes on a glass wall during sunset light" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA4xgsWSzzroCH2VeOFuqbUKhMnBGWwtYIq0tt5qFkHW-2VmJVijsnoxLh8aoIuDLH7JGvPb_7eXVmkLViS1s5XlHeQhD4rb9_MF46SWpZRk_xbKZtuVZQgi9QZPM0QaSHjX5xApKEzjlewHnxi8x5h_XH_i7t86IPJ3zd6ysAHCqkLXCMNwmIgV_3lYpU6dUhl2PPtUU54auSn2BGEzhfyyzEasb6rH9YGtaSg4g36zrROzh_Ft1kCKAlyPljadjWIkNCpuECfRt8i" />
                @endif
            </div>
        </div>
    </div>
</section>