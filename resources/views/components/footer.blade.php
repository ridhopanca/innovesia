<footer class="@yield('footer_classes', 'bg-surface-container-low')">
    <div class="max-w-7xl mx-auto px-4 md:px-8 py-12 md:py-16">
        <div class="flex flex-col md:flex-row gap-8">
            <!-- Brand -->
            <div class="w-full md:w-[350px]">
                <h2 class="text-xl font-bold text-primary mb-4">Innovesia</h2>
                <p class="text-sm text-on-surface-variant">
                    The Human Architect for the digital age. Designing the future of institutional strategy with human empathy at the core.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-10 w-full">
                <!-- Links -->
                <div>
                    <h3 class="font-bold mb-4 text-primary">Navigation</h3>
                    <ul class="space-y-2 text-sm text-on-surface-variant">
                        <li><a href="/">Intro</a></li>
                        <li><a href="/product">Product & Services</a></li>
                        <li><a href="/portfolio">Portfolio</a></li>
                        <li><a href="/articles">Articles</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h3 class="font-bold mb-4 text-primary">Support</h3>
                    <ul class="space-y-2 text-sm text-on-surface-variant">
                        @if($generalInfo)
                        @php
                        $emailItem = collect($generalInfo->items)->first(function($item) {
                        return str_starts_with($item['url'] ?? '', 'mailto:') || str_contains($item['label'] ?? '', 'Email');
                        });
                        $email = $emailItem ? str_replace('mailto:', '', $emailItem['url'] ?? '') : 'hello@innovesia.com';
                        @endphp
                        <li><a href="mailto:{{ $email }}" class="text-sm text-on-surface-variant hover:text-primary">
                                {{ $email }}
                            </a></li>
                        @else
                        @endif
                        <li><a href="/contact">Contact</a></li>
                    </ul>

                </div>

                <!-- CTA -->
                <div>
                    <h4 class="font-headline font-bold text-primary mb-6">Follow</h4>
                    @if($generalInfo)
                    @php
                    $socialItems = collect($generalInfo->items)->filter(function($item) {
                    return !str_starts_with($item['url'] ?? '', 'mailto:') && !str_contains($item['label'] ?? '', 'Email');
                    })->values()->toArray();
                    @endphp
                    <x-general-information :variant="'inline'" :items="$socialItems" />
                    @else
                    <x-general-information :variant="'inline'" :items="[
                            ['svg' => '', 'url' => '#', 'label' => 'Website'],
                        ]" />
                    @endif
                    <p class="mt-8 text-xs text-slate-400 font-manrope">© 2024 Innovesia. Human-Centered Innovation.</p>
                </div>

            </div>

        </div>


    </div>
</footer>