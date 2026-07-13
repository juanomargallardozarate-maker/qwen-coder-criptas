<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SGIC') }} - @yield('title', 'Sistema de Gestión de Cementerios')</title>

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
    
    <!-- Navbar Público -->
    <nav class="bg-white shadow-sm border-b border-neutral-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Logo y Branding -->
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 gradient-primary rounded-lg flex items-center justify-center shadow-md">
                        <i class="fas fa-church text-white text-xl"></i>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-neutral-800">SGIC</h1>
                        <p class="text-xs text-neutral-500">Sistema de Gestión</p>
                    </div>
                </div>

                <!-- Menú Desktop -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#" class="text-neutral-600 hover:text-primary-600 font-medium transition duration-300">Inicio</a>
                    <a href="#" class="text-neutral-600 hover:text-primary-600 font-medium transition duration-300">Servicios</a>
                    <a href="#" class="text-neutral-600 hover:text-primary-600 font-medium transition duration-300">Nosotros</a>
                    <a href="#" class="text-neutral-600 hover:text-primary-600 font-medium transition duration-300">Contacto</a>
                </div>

                <!-- Botones de Acción -->
                <div class="flex items-center gap-3">
                    <a href="{{ route('login') }}" class="btn-ghost btn-sm hidden sm:inline-flex">
                        <i class="fas fa-sign-in-alt mr-2"></i>Ingresar
                    </a>
                    <a href="{{ route('register') }}" class="btn-primary btn-sm">
                        <i class="fas fa-user-plus mr-2"></i>Registrarse
                    </a>
                    
                    <!-- Mobile Menu Button -->
                    <button id="mobile-menu-btn" class="md:hidden p-2 rounded-lg text-neutral-600 hover:bg-neutral-100 transition">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu (oculto por defecto) -->
        <div id="mobile-menu" class="hidden md:hidden border-t border-neutral-200 bg-white">
            <div class="px-4 py-4 space-y-3">
                <a href="#" class="block text-neutral-600 hover:text-primary-600 font-medium">Inicio</a>
                <a href="#" class="block text-neutral-600 hover:text-primary-600 font-medium">Servicios</a>
                <a href="#" class="block text-neutral-600 hover:text-primary-600 font-medium">Nosotros</a>
                <a href="#" class="block text-neutral-600 hover:text-primary-600 font-medium">Contacto</a>
                <div class="pt-3 border-t border-neutral-200 flex flex-col gap-2">
                    <a href="{{ route('login') }}" class="btn-ghost btn-sm text-center">
                        <i class="fas fa-sign-in-alt mr-2"></i>Ingresar
                    </a>
                    <a href="{{ route('register') }}" class="btn-primary btn-sm text-center">
                        <i class="fas fa-user-plus mr-2"></i>Registrarse
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="min-h-screen">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-neutral-900 text-white py-12 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Branding -->
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 gradient-primary rounded-lg flex items-center justify-center">
                            <i class="fas fa-church text-white text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold">SGIC</h3>
                    </div>
                    <p class="text-neutral-400 text-sm">
                        Sistema Integral de Gestión de Cementerios. Tecnología al servicio de la memoria eterna.
                    </p>
                </div>

                <!-- Links Rápidos -->
                <div>
                    <h4 class="font-semibold mb-4 text-neutral-300">Enlaces Rápidos</h4>
                    <ul class="space-y-2 text-sm text-neutral-400">
                        <li><a href="#" class="hover:text-primary-400 transition">Inicio</a></li>
                        <li><a href="#" class="hover:text-primary-400 transition">Servicios</a></li>
                        <li><a href="#" class="hover:text-primary-400 transition">Contacto</a></li>
                        <li><a href="#" class="hover:text-primary-400 transition">Soporte</a></li>
                    </ul>
                </div>

                <!-- Contacto -->
                <div>
                    <h4 class="font-semibold mb-4 text-neutral-300">Contacto</h4>
                    <ul class="space-y-2 text-sm text-neutral-400">
                        <li><i class="fas fa-envelope mr-2"></i>info@sgic.com</li>
                        <li><i class="fas fa-phone mr-2"></i>+1 234 567 890</li>
                        <li><i class="fas fa-map-marker-alt mr-2"></i>Ciudad, País</li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-neutral-800 mt-8 pt-8 text-center text-sm text-neutral-500">
                <p>&copy; {{ date('Y') }} SGIC. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-btn')?.addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>
    @stack('scripts')
</body>
</html>
