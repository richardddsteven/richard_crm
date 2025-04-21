<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT. Smart</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .navbar-hide {
            transform: translateY(-200%);
            transition: transform 0.3s ease-in-out;
        }
        .navbar-show {
            transform: translateY(100);
            transition: transform 0.3s ease-in-out;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen">
    <header id="navbar"
        class="navbar-show fixed inset-x-0 top-0 z-30 mx-auto w-full max-w-screen-md border border-gray-100 bg-white/80 py-3 shadow backdrop-blur-lg md:top-6 md:rounded-3xl lg:max-w-screen-lg transition-transform duration-300">
        <div class="px-4">
            <div class="flex items-center justify-between">
                <div class="flex shrink-0">
                    <a class="flex items-center gap-2 text-xl font-bold text-gray-900">
                        PT. Smart
                    </a>
                </div>
                <!-- Desktop Menu -->
                <div class="hidden md:flex md:items-center md:justify-center md:gap-5">
                    <a href="/leads" class="inline-block rounded-lg px-2 py-1 text-sm font-medium text-gray-900 hover:bg-gray-100">Lead</a>
                    <a href="/products" class="inline-block rounded-lg px-2 py-1 text-sm font-medium text-gray-900 hover:bg-gray-100">Products</a>
                    <a href="/projects" class="inline-block rounded-lg px-2 py-1 text-sm font-medium text-gray-900 hover:bg-gray-100">Projects</a>
                    <a href="/customers" class="inline-block rounded-lg px-2 py-1 text-sm font-medium text-gray-900 hover:bg-gray-100">Customers</a>
                    <a href="/login"
                        class="inline-flex items-center justify-center rounded-xl bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus:outline-none">Logout</a>
                </div>

                <!-- Mobile Menu -->
                <div class="md:hidden flex items-center">
                    <button id="menu-toggle" class="text-gray-800 hover:text-blue-600 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                             xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="hidden md:hidden mt-2">
                <a href="/leads" class="block px-3 py-2 text-sm font-medium text-gray-800 hover:bg-gray-100 rounded">Lead</a>
                <a href="/products" class="block px-3 py-2 text-sm font-medium text-gray-800 hover:bg-gray-100 rounded">Products</a>
                <a href="/projects" class="block px-3 py-2 text-sm font-medium text-gray-800 hover:bg-gray-100 rounded">Projects</a>
                <a href="/customers" class="block px-3 py-2 text-sm font-medium text-gray-800 hover:bg-gray-100 rounded">Customers</a>
                <form action="{{ route('logout') }}" method="POST" class="block">
                    @csrf
                    <button type="submit"
                            class="w-full text-left px-3 py-2 text-sm font-medium text-red-600 hover:bg-red-100 rounded">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </header>

    <main class="container mt-24 px-10 py-6">
        @yield('content')
    </main>

    <script>
        let lastScrollTop = 0;
        const navbar = document.getElementById('navbar');
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');

        // Handle navbar scroll hide/show
        window.addEventListener("scroll", function () {
            const currentScroll = window.pageYOffset || document.documentElement.scrollTop;

            if (currentScroll > lastScrollTop) {
                navbar.classList.remove("navbar-show");
                navbar.classList.add("navbar-hide");
            } else {
                navbar.classList.remove("navbar-hide");
                navbar.classList.add("navbar-show");
            }

            lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
        }, false);

        // Toggle mobile menu
        menuToggle.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
