<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SGIC') }} - @yield('title', 'Dashboard')</title>

    <!-- Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700&display=swap" rel="stylesheet" />
    
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @stack('styles')
</head>
<body class="font-sans antialiased bg-neutral-50">
    
    <!-- Sidebar + Main Content Layout -->
    <div class="flex min-h-screen">
        
        <!-- Sidebar -->
        <aside id="sidebar" class="fixed inset-y-0 left-0 z-50 w-64 bg-neutral-900 text-white transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out">
            <!-- Logo -->
            <div class="h-16 flex items-center gap-3 px-6 border-b border-neutral-800">
                <div class="w-10 h-10 gradient-primary rounded-lg flex items-center justify-center shadow-md">
                    <i class="fas fa-church text-white text-xl"></i>
                </div>
                <div>
                    <h1 class="text-lg font-bold">SGIC</h1>
                    <p class="text-xs text-neutral-400">Admin Panel</p>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="py-4 px-3 space-y-1 overflow-y-auto max-h-[calc(100vh-4rem)]">
                <!-- Dashboard -->
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-primary-600 text-white' : 'text-neutral-300 hover:bg-neutral-800 hover:text-white' }} transition duration-300">
                    <i class="fas fa-home w-5"></i>
                    <span class="font-medium">Dashboard</span>
                </a>

                <!-- Multi-tenancy -->
                <div class="pt-4">
                    <p class="px-4 text-xs font-semibold text-neutral-500 uppercase tracking-wider mb-2">Cementerios</p>
                    <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg text-neutral-300 hover:bg-neutral-800 hover:text-white transition duration-300">
                        <i class="fas fa-building w-5"></i>
                        <span class="font-medium">Tenants</span>
                    </a>
                </div>

                <!-- Inventario -->
                <div class="pt-4">
                    <p class="px-4 text-xs font-semibold text-neutral-500 uppercase tracking-wider mb-2">Inventario</p>
                    <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg text-neutral-300 hover:bg-neutral-800 hover:text-white transition duration-300">
                        <i class="fas fa-th w-5"></i>
                        <span class="font-medium">Criptas</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg text-neutral-300 hover:bg-neutral-800 hover:text-white transition duration-300">
                        <i class="fas fa-th-list w-5"></i>
                        <span class="font-medium">Nichos</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg text-neutral-300 hover:bg-neutral-800 hover:text-white transition duration-300">
                        <i class="fas fa-monument w-5"></i>
                        <span class="font-medium">Mausoleos</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg text-neutral-300 hover:bg-neutral-800 hover:text-white transition duration-300">
                        <i class="fas fa-box w-5"></i>
                        <span class="font-medium">Osarios</span>
                    </a>
                </div>

                <!-- Clientes y Contratos -->
                <div class="pt-4">
                    <p class="px-4 text-xs font-semibold text-neutral-500 uppercase tracking-wider mb-2">Clientes</p>
                    <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg text-neutral-300 hover:bg-neutral-800 hover:text-white transition duration-300">
                        <i class="fas fa-users w-5"></i>
                        <span class="font-medium">Clientes</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg text-neutral-300 hover:bg-neutral-800 hover:text-white transition duration-300">
                        <i class="fas fa-file-contract w-5"></i>
                        <span class="font-medium">Contratos</span>
                    </a>
                </div>

                <!-- Financiero -->
                <div class="pt-4">
                    <p class="px-4 text-xs font-semibold text-neutral-500 uppercase tracking-wider mb-2">Financiero</p>
                    <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg text-neutral-300 hover:bg-neutral-800 hover:text-white transition duration-300">
                        <i class="fas fa-money-bill-wave w-5"></i>
                        <span class="font-medium">Pagos</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg text-neutral-300 hover:bg-neutral-800 hover:text-white transition duration-300">
                        <i class="fas fa-calculator w-5"></i>
                        <span class="font-medium">Mantenimientos</span>
                    </a>
                </div>

                <!-- Operaciones -->
                <div class="pt-4">
                    <p class="px-4 text-xs font-semibold text-neutral-500 uppercase tracking-wider mb-2">Operaciones</p>
                    <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg text-neutral-300 hover:bg-neutral-800 hover:text-white transition duration-300">
                        <i class="fas fa-tools w-5"></i>
                        <span class="font-medium">Órdenes de Trabajo</span>
                    </a>
                </div>

                <!-- Reportes -->
                <div class="pt-4">
                    <p class="px-4 text-xs font-semibold text-neutral-500 uppercase tracking-wider mb-2">Reportes</p>
                    <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg text-neutral-300 hover:bg-neutral-800 hover:text-white transition duration-300">
                        <i class="fas fa-chart-bar w-5"></i>
                        <span class="font-medium">Reportes</span>
                    </a>
                </div>

                <!-- Configuración -->
                <div class="pt-4">
                    <p class="px-4 text-xs font-semibold text-neutral-500 uppercase tracking-wider mb-2">Configuración</p>
                    <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg text-neutral-300 hover:bg-neutral-800 hover:text-white transition duration-300">
                        <i class="fas fa-cog w-5"></i>
                        <span class="font-medium">Ajustes</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg text-neutral-300 hover:bg-neutral-800 hover:text-white transition duration-300">
                        <i class="fas fa-users-cog w-5"></i>
                        <span class="font-medium">Usuarios</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg text-neutral-300 hover:bg-neutral-800 hover:text-white transition duration-300">
                        <i class="fas fa-history w-5"></i>
                        <span class="font-medium">Auditoría</span>
                    </a>
                </div>
            </nav>
        </aside>

        <!-- Overlay para mobile -->
        <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden md:hidden"></div>

        <!-- Main Content Area -->
        <div class="flex-1 md:ml-64 flex flex-col">
            
            <!-- Top Navbar -->
            <header class="bg-white shadow-sm border-b border-neutral-200 sticky top-0 z-30">
                <div class="px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <!-- Left: Title + Mobile Menu Button -->
                        <div class="flex items-center gap-4">
                            <button id="mobile-sidebar-btn" class="md:hidden p-2 rounded-lg text-neutral-600 hover:bg-neutral-100 transition">
                                <i class="fas fa-bars text-xl"></i>
                            </button>
                            <h2 class="text-xl font-semibold text-neutral-800">@yield('page-title', 'Dashboard')</h2>
                        </div>

                        <!-- Right: User Menu + Notifications -->
                        <div class="flex items-center gap-4">
                            <!-- Notifications -->
                            <button class="relative p-2 rounded-lg text-neutral-600 hover:bg-neutral-100 transition">
                                <i class="fas fa-bell text-xl"></i>
                                <span class="absolute top-1 right-1 w-2 h-2 bg-error-500 rounded-full"></span>
                            </button>

                            <!-- User Dropdown -->
                            <div class="relative" x-data="{ open: false }">
                                <button class="flex items-center gap-3 p-2 rounded-lg hover:bg-neutral-100 transition">
                                    <div class="w-8 h-8 gradient-primary rounded-full flex items-center justify-center text-white font-semibold">
                                        {{ substr(Auth::user()->name ?? 'U', 0, 1) }}
                                    </div>
                                    <span class="hidden sm:block text-sm font-medium text-neutral-700">{{ Auth::user()->name ?? 'Usuario' }}</span>
                                    <i class="fas fa-chevron-down text-xs text-neutral-500"></i>
                                </button>
                                
                                <!-- Dropdown Menu (simple implementation) -->
                                <div id="user-menu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-neutral-200 py-2 z-50">
                                    <a href="#" class="block px-4 py-2 text-sm text-neutral-700 hover:bg-neutral-50">
                                        <i class="fas fa-user mr-2"></i>Perfil
                                    </a>
                                    <a href="#" class="block px-4 py-2 text-sm text-neutral-700 hover:bg-neutral-50">
                                        <i class="fas fa-cog mr-2"></i>Configuración
                                    </a>
                                    <hr class="my-2 border-neutral-200">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="w-full text-left px-4 py-2 text-sm text-error-600 hover:bg-error-50">
                                            <i class="fas fa-sign-out-alt mr-2"></i>Cerrar Sesión
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 p-4 sm:p-6 lg:p-8 overflow-y-auto">
                <!-- Flash Messages -->
                @if (session('success'))
                    <div class="alert alert-success mb-6">
                        <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-error mb-6">
                        <i class="fas fa-exclamation-circle mr-2"></i>{{ session('error') }}
                    </div>
                @endif

                @if (session('warning'))
                    <div class="alert alert-warning mb-6">
                        <i class="fas fa-exclamation-triangle mr-2"></i>{{ session('warning') }}
                    </div>
                @endif

                @if (session('info'))
                    <div class="alert alert-info mb-6">
                        <i class="fas fa-info-circle mr-2"></i>{{ session('info') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        // Sidebar toggle para mobile
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebar-overlay');
        const mobileBtn = document.getElementById('mobile-sidebar-btn');
        const userMenuBtn = document.querySelector('button[onclick*="user-menu"]');
        const userMenu = document.getElementById('user-menu');

        mobileBtn?.addEventListener('click', function() {
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        });

        overlay?.addEventListener('click', function() {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        });

        // User menu toggle
        document.querySelector('.fa-chevron-down')?.parentElement?.addEventListener('click', function(e) {
            e.preventDefault();
            userMenu.classList.toggle('hidden');
        });

        // Cerrar user menu al hacer click fuera
        document.addEventListener('click', function(e) {
            if (userMenu && !e.target.closest('.relative')) {
                userMenu.classList.add('hidden');
            }
        });
    </script>
    @stack('scripts')
</body>
</html>
