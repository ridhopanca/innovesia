<footer class="@yield('footer_classes', 'bg-surface-container-low')">
    <div class="max-w-7xl mx-auto px-8 py-16">
        <div class="flex sm:flex-col md:flex-row gap-8">
            <!-- Brand -->
            <div class="sm:w-full md:w-[350px]">
                <h2 class="text-xl font-bold text-primary mb-4">Innovesia</h2>
                <p class="text-sm text-on-surface-variant">
                    The Human Architect for the digital age. Designing the future of institutional strategy with human empathy at the core.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-10">
                <!-- Links -->
                <div>
                    <h3 class="font-bold mb-4 text-primary">Navigation</h3>
                    <ul class="space-y-2 text-sm text-on-surface-variant">
                        <li><a href="/">Home</a></li>
                        <li><a href="/product">Product</a></li>
                        <li><a href="/portfolio">Portfolio</a></li>
                        <li><a href="/articles">Articles</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h3 class="font-bold mb-4 text-primary">Support</h3>
                    <ul class="space-y-2 text-sm text-on-surface-variant">
                        <li><a href="mailto:hello@innovesia.com" class="text-sm text-on-surface-variant hover:text-primary">
                                hello@innovesia.com
                            </a></li>
                        <li><a href="/contact">Contact</a></li>
                    </ul>

                </div>

                <!-- CTA -->
                <div>
                    <h4 class="font-headline font-bold text-primary mb-6">Follow</h4>
                    <div class="flex gap-4">
                        <a class="w-10 h-10 rounded-full border border-outline-variant flex items-center justify-center text-primary hover:bg-primary hover:text-white transition-all" href="#">
                            <span class="material-symbols-outlined text-lg">public</span>
                        </a>
                        <a class="w-10 h-10 rounded-full border border-outline-variant flex items-center justify-center text-primary hover:bg-primary hover:text-white transition-all" href="#">
                            <span class="material-symbols-outlined text-lg">alternate_email</span>
                        </a>
                    </div>
                    <p class="mt-8 text-xs text-slate-400 font-manrope">© 2024 Innovesia. Human-Centered Innovation.</p>
                </div>

            </div>

        </div>


    </div>
</footer>