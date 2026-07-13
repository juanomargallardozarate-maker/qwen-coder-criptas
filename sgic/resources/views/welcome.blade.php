@extends('layouts.guest')

@section('title', 'Bienvenido - SGIC')

@section('content')
<!-- Hero Section -->
<section class="gradient-hero relative overflow-hidden">
    <!-- Decorative Blobs -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-white/10 rounded-full animate-blob"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-accent-400/20 rounded-full animate-blob animation-delay-2000"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-secondary-500/10 rounded-full animate-blob animation-delay-4000"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-32">
        <div class="text-center">
            <!-- Icono Principal -->
            <div class="inline-flex items-center justify-center w-20 h-20 bg-white/20 backdrop-blur-sm rounded-2xl mb-8 shadow-xl">
                <i class="fas fa-church text-white text-4xl"></i>
            </div>

            <!-- Título -->
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6">
                Sistema de Gestión de Cementerios
            </h1>
            
            <p class="text-xl md:text-2xl text-white/90 mb-8 max-w-3xl mx-auto">
                SGIC 2.0 - Tecnología moderna para la administración integral de servicios funerarios y cementerios
            </p>

            <!-- Botones de Acción -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="{{ route('register') }}" class="btn-primary btn-lg inline-flex items-center group">
                    <i class="fas fa-rocket mr-2 group-hover:animate-pulse"></i>
                    Comenzar Ahora
                </a>
                <a href="#features" class="bg-white/20 backdrop-blur-sm hover:bg-white/30 text-white font-medium py-3 px-6 rounded-lg transition duration-300 inline-flex items-center">
                    <i class="fas fa-play-circle mr-2"></i>
                    Conocer Más
                </a>
            </div>

            <!-- Stats -->
            <div class="mt-16 grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 border border-white/20">
                    <div class="text-3xl font-bold text-white mb-2">99.9%</div>
                    <div class="text-white/80 text-sm">Disponibilidad</div>
                </div>
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 border border-white/20">
                    <div class="text-3xl font-bold text-white mb-2">24/7</div>
                    <div class="text-white/80 text-sm">Soporte</div>
                </div>
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 border border-white/20">
                    <div class="text-3xl font-bold text-white mb-2">+500</div>
                    <div class="text-white/80 text-sm">Clientes</div>
                </div>
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 border border-white/20">
                    <div class="text-3xl font-bold text-white mb-2">100%</div>
                    <div class="text-white/80 text-sm">Seguro</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Wave Divider -->
    <div class="absolute bottom-0 left-0 right-0">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" class="w-full h-auto">
            <path fill="#f8fafc" fill-opacity="1" d="M0,64L80,69.3C160,75,320,85,480,80C640,75,800,53,960,48C1120,43,1280,53,1360,58.7L1440,64L1440,120L1360,120C1280,120,1120,120,960,120C800,120,640,120,480,120C320,120,160,120,80,120L0,120Z"></path>
        </svg>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="py-20 bg-neutral-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-neutral-800 mb-4">
                Características Principales
            </h2>
            <p class="text-lg text-neutral-600 max-w-2xl mx-auto">
                Una solución completa para la gestión moderna de cementerios
            </p>
        </div>

        <!-- Features Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="card hover:shadow-xl transition duration-300 group">
                <div class="card-body">
                    <div class="w-14 h-14 gradient-primary rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition duration-300">
                        <i class="fas fa-th-large text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-neutral-800 mb-3">Gestión de Inventario</h3>
                    <p class="text-neutral-600">Administra criptas, nichos, mausoleos y osarios con un sistema visual intuitivo.</p>
                </div>
            </div>

            <!-- Feature 2 -->
            <div class="card hover:shadow-xl transition duration-300 group">
                <div class="card-body">
                    <div class="w-14 h-14 gradient-secondary rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition duration-300">
                        <i class="fas fa-users text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-neutral-800 mb-3">Clientes y Contratos</h3>
                    <p class="text-neutral-600">Gestiona clientes, contratos y documentos de manera organizada y segura.</p>
                </div>
            </div>

            <!-- Feature 3 -->
            <div class="card hover:shadow-xl transition duration-300 group">
                <div class="card-body">
                    <div class="w-14 h-14 gradient-accent rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition duration-300">
                        <i class="fas fa-chart-line text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-neutral-800 mb-3">Reportes Financieros</h3>
                    <p class="text-neutral-600">Genera reportes detallados de pagos, mantenimientos y estado financiero.</p>
                </div>
            </div>

            <!-- Feature 4 -->
            <div class="card hover:shadow-xl transition duration-300 group">
                <div class="card-body">
                    <div class="w-14 h-14 bg-success-500 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition duration-300">
                        <i class="fas fa-mobile-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-neutral-800 mb-3">PWA Mobile</h3>
                    <p class="text-neutral-600">Aplicación progresiva con funcionamiento offline para trabajo en campo.</p>
                </div>
            </div>

            <!-- Feature 5 -->
            <div class="card hover:shadow-xl transition duration-300 group">
                <div class="card-body">
                    <div class="w-14 h-14 bg-warning-500 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition duration-300">
                        <i class="fas fa-tools text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-neutral-800 mb-3">Órdenes de Trabajo</h3>
                    <p class="text-neutral-600">Gestiona mantenimiento y operaciones con seguimiento en tiempo real.</p>
                </div>
            </div>

            <!-- Feature 6 -->
            <div class="card hover:shadow-xl transition duration-300 group">
                <div class="card-body">
                    <div class="w-14 h-14 bg-info-500 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition duration-300">
                        <i class="fas fa-shield-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-neutral-800 mb-3">Multi-Tenancy</h3>
                    <p class="text-neutral-600">Arquitectura multi-inquilino para gestionar múltiples cementerios.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-neutral-900 relative overflow-hidden">
    <!-- Decorative Elements -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 right-0 w-64 h-64 bg-primary-500 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-secondary-500 rounded-full blur-3xl"></div>
    </div>

    <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
            ¿Listo para comenzar?
        </h2>
        <p class="text-xl text-neutral-300 mb-8">
            Únete a cientos de cementerios que ya confían en SGIC para su gestión diaria
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('register') }}" class="btn-primary btn-lg">
                <i class="fas fa-user-plus mr-2"></i>Crear Cuenta Gratuita
            </a>
            <a href="{{ route('login') }}" class="bg-white/10 hover:bg-white/20 text-white font-medium py-3 px-6 rounded-lg transition duration-300">
                <i class="fas fa-sign-in-alt mr-2"></i>Iniciar Sesión
            </a>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    @keyframes blob {
        0%, 100% { transform: translate(0, 0) scale(1); }
        33% { transform: translate(30px, -50px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.9); }
    }
    .animate-blob {
        animation: blob 7s infinite;
    }
    .animation-delay-2000 {
        animation-delay: 2s;
    }
    .animation-delay-4000 {
        animation-delay: 4s;
    }
</style>
@endpush
