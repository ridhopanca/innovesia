<footer class="@yield('footer_classes', 'bg-surface-container-low')">
    <div class="max-w-7xl mx-auto px-8 py-16">

        <div class="grid md:grid-cols-4 gap-10">

            <!-- Brand -->
            <div>
                <h2 class="text-xl font-bold text-primary mb-4">Innovesia</h2>
                <p class="text-sm text-on-surface-variant">
                    Designing innovation through human insight.
                </p>
            </div>

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
                <h3 class="font-bold mb-4 text-primary">Contact</h3>
                <a href="mailto:hello@innovesia.com" class="text-sm text-on-surface-variant hover:text-primary">
                    hello@innovesia.com
                </a>
            </div>

            <!-- CTA -->
            <div>
                <h3 class="font-bold mb-4 text-primary">Get Started</h3>
                <button class="bg-primary text-white px-6 py-3 rounded-xl text-sm">
                    Contact Us
                </button>
            </div>

        </div>

        <div class="border-t border-gray-200 mt-10 pt-6 text-sm text-on-surface-variant">
            © {{ date('Y') }} Innovesia. All rights reserved.
        </div>

    </div>
</footer>