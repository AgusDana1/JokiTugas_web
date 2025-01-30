<nav id="navbar" class="bg-white shadow-md py-4 fixed top-0 w-full z-50  transition-transform duration-300" x-data="{ open: false }">
    <div class="mx-auto flex items-center space-x-4 px-4 font-poppins justify-between">
        <div class="flex items-center space-x-4 ml-4">
            <img class="rounded-full w-14 h-14" src="{{ asset('img/SHEETS LOGO1.jpg') }}" alt="Logo Sheets si Joki Tugas">
            <div>
                <h2 class="text-blue-600 font-semibold">Sheets Si Joki Tugas</h2>
                <p class="font-light text-sm">Joki tugas sekolah anda</p>
            </div>
        </div>

        {{-- navbar nav --}}
        <ul class="hidden md:flex gap-4 justify-between font-semibold">
            <li><a href="/"  class="{{ request()->is('/') ? 'text-blue-600 font-semibold' : 'text-gray-900 font-semibold hover:text-blue-600' }}">Home</a></li>
            <li><a href="/caraOrder" class="{{ request()->is('caraOrder') ? 'text-blue-600 font-semibold' : 'text-gray-900 font-semibold hover:text-blue-600' }}">How To Order</a></li>
            <li><a href="/blog" class="{{ request()->is('blog') ? 'text-blue-600 font-semibold' : 'text-gray-900 font-semibold hover:text-blue-600' }}">Blog</a></li>
            <li><a href="/contact" class="{{ request()->is('contact') ? 'text-blue-600 font-semibold' : 'text-gray-900 font-semibold hover:text-blue-600' }}">Contact Us</a></li>
        </ul>

        {{-- Mobile Menu Button --}}
        <button class="md:hidden flex items-center" @click="open = !open">
            <i class="bi bi-list text-4xl"></i>
        </button>
    </div>

    {{-- Mobile Menu --}}
    <div x-show="open" class="md:hidden bg-white shadow-md py-4 absolute top-30 w-full z-20 transition-transform duration-300" @click.away="open = false" x-transition.duration.400ms>
        <ul class="flex flex-col gap-4 px-4 font-semibold">
            <li><a href="/" class="{{ request()->is('/') ? 'text-blue-600 font-semibold' : 'text-gray-900 font-semibold hover:text-blue-600' }}">Home</a></li>
            <li><a href="/caraOrder" class="{{ request()->is('caraOrder') ? 'text-blue-600 font-semibold' : 'text-gray-900 font-semibold hover:text-blue-600' }}">How To Order</a></li>
            <li><a href="/blog" class="{{ request()->is('blog') ? 'text-blue-600 font-semibold' : 'text-gray-900 font-semibold hover:text-blue-600' }}">Blog</a></li>
            <li><a href="/contact" class="{{ request()->is('contact') ? 'text-blue-600 font-semibold' : 'text-gray-900 font-semibold hover:text-blue-600' }}">Contact Us</a></li>
        </ul>
    </div>
</nav>

{{-- Javascript --}}
<script>
    let lastScrollTop = 0;
    const navbar = document.getElementById('navbar');

    // navbar scroller
    window.addEventListener('scroll', function () {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        if (scrollTop > lastScrollTop) {
            navbar.style.transform = 'translateY(-100%)';
        } else {
            navbar.style.transform = 'translateY(0)';
        }
        lastScrollTop = scrollTop;
    });

    // Animate mobile menu toggle
    const mobileMenu = document.querySelector('[x-show="open"]');
    const toggleButton = document.querySelector('[@click]');

    toggleButton.addEventListener('click', () => {
        mobileMenu.style.transform = mobileMenu.style.transform === 'scaleY(1)' ? 'scaleY(0)' : 'scaleY(1)';
        mobileMenu.style.transformOrigin = 'top';
        mobileMenu.style.transition = 'transform 0.3s ease';
    });
</script>
