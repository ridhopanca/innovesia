<section class="relative min-h-[500px] md:min-h-[716px] flex items-center overflow-hidden bg-surface py-16 md:py-24">
    <div class="max-w-7xl mx-auto px-4 md:px-8 w-full">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 md:gap-12 items-center">
            <div class="lg:col-span-7" data-animate="fade-up">
                @if(isset($data['badge']))
                <span class="inline-block px-3 md:px-4 py-1.5 mb-4 md:mb-6 rounded-full bg-secondary-container text-on-secondary-container text-[10px] md:text-xs font-bold uppercase tracking-[0.2em] font-label">{{ $data['badge'] }}</span>
                @endif
                @if(isset($data['title']))
                <h1 class="text-3xl md:text-5xl lg:text-7xl font-extrabold font-headline leading-[1.05] tracking-tighter text-primary mb-6 md:mb-8">
                    {{ $data['title'] }}
                    @if(isset($data['title_highlight']))
                    <span class="text-gradient-primary">{{ $data['title_highlight'] }}</span>
                    @endif
                </h1>
                @endif
                @if(isset($data['description']))
                <p class="text-base md:text-xl md:text-2xl text-on-surface-variant max-w-2xl leading-relaxed font-light">
                    {{ $data['description'] }}
                </p>
                @endif
            </div>
            <div class="lg:col-span-5 relative" data-animate="fade-up">
                <div class="aspect-square rounded-2xl overflow-hidden shadow-2xl rotate-3">
                    <img class="w-full h-full object-cover" data-alt="Modern collaborative workshop with diverse team using colorful sticky notes on a glass wall in a sunlit office" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBrMkIMirtz9V2uLTNIfVs4GGC3sK0pmIuUdZOQLTeRCq3pNuCUIBNm_qHIFxsJaAhUGrb_0ZqO3eKBBU2tmgOhsZEgkgtbdHWB37oioQ0Z5YQt58XR89Vvoe9Q_7VLDWzp06Hyksz4VDTeeUt2RInAiNF3pp5F_FtG5V38eQlXpRHXitrjDX7rc6VWt1QE1uUS3hm1-YW2ZlSTdiqTKRySFcJmxYty6A5dW0N253kaZ450_gD5W7-81WD4q6YLHGSy1qOjHEPFUwHb" />
                </div>
                <div class="absolute -bottom-6 -left-6 aspect-square w-48 rounded-xl overflow-hidden border-8 border-surface shadow-xl -rotate-6 hidden md:block">
                    <img class="w-full h-full object-cover" data-alt="Close up of architect sketching on blue paper with precision tools and sunlight streaming in" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBLbli01XDegO--VX69o3HoOZ6CYNANIE9y8k-Gx0xLhgbOnAjiHnnUtAAfzF2J0Zv-xTtkM5kpc-GNloQ1-4qfnrEaOCqFVFhKthlBY1wuB4BqHELGHh8W3-JeztGl0XvN9d32IbW1Bawyj0-GtpgG6KuKhmP-JLQ2IabTJoxiWx0qUbEM5Qn2rLAIRD3QiEJd5i8Y6ww6B04bmbnCffmu4smZ75CN6QjHVx2Du78l7aoST2abGLX6YVRPpFxnc3pQ6gY1zQiPEfUY" />
                </div>
            </div>
        </div>
    </div>
</section>