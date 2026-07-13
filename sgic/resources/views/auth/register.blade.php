<x-guest-layout>
    <!-- Register Container -->
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-slate-50 via-emerald-50/30 to-indigo-50/30">
        <!-- Decorative Blobs -->
        <div class="absolute top-20 left-10 w-72 h-72 bg-primary-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob"></div>
        <div class="absolute top-40 right-10 w-72 h-72 bg-secondary-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-20 left-1/2 w-72 h-72 bg-accent-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-4000"></div>

        <!-- Register Card -->
        <div class="relative w-full max-w-lg">
            <!-- Logo and Header -->
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-primary-600 to-secondary-600 rounded-2xl shadow-lg mb-4 transform hover:scale-105 transition-transform duration-300">
                    <i class="fas fa-monument text-4xl text-white"></i>
                </div>
                <h1 class="text-3xl font-bold text-slate-900">Crear Cuenta</h1>
                <p class="text-sm text-slate-600 mt-2">Únete a SGIC 2.0 gratuitamente</p>
            </div>

            <!-- Register Form Card -->
            <div class="card bg-white/80 backdrop-blur-xl border border-white/50 shadow-2xl">
                <div class="card-body p-8">
                    <!-- Welcome Message -->
                    <div class="text-center mb-6">
                        <h2 class="text-2xl font-semibold text-slate-800">Comienza Ahora</h2>
                        <p class="text-slate-600 mt-2">Completa el formulario para registrarte</p>
                    </div>

                    <!-- Session Status Messages -->
                    @if (session('status'))
                        <div class="alert alert-success mb-6">
                            <i class="fas fa-check-circle mr-2"></i>
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Global Errors -->
                    @if ($errors->any())
                        <div class="alert alert-error mb-6">
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            <ul class="mt-2 space-y-1 text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Register Form -->
                    <form method="POST" action="{{ route('register') }}" class="space-y-5">
                        @csrf

                        <!-- Name Input -->
                        <div>
                            <label for="name" class="label">
                                <i class="fas fa-user text-primary-600 mr-2"></i>
                                Nombre Completo
                            </label>
                            <input 
                                id="name" 
                                type="text" 
                                name="name" 
                                value="{{ old('name') }}" 
                                required 
                                autofocus 
                                autocomplete="name"
                                placeholder="Juan Pérez"
                                class="input-base @error('name') input-error @enderror"
                            >
                            @error('name')
                                <p class="text-error text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email Input -->
                        <div>
                            <label for="email" class="label">
                                <i class="fas fa-envelope text-primary-600 mr-2"></i>
                                Correo Electrónico
                            </label>
                            <input 
                                id="email" 
                                type="email" 
                                name="email" 
                                value="{{ old('email') }}" 
                                required 
                                autocomplete="email"
                                placeholder="tu@empresa.com"
                                class="input-base @error('email') input-error @enderror"
                            >
                            @error('email')
                                <p class="text-error text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Organization Input -->
                        <div>
                            <label for="organization" class="label">
                                <i class="fas fa-building text-primary-600 mr-2"></i>
                                Organización / Cementerio
                            </label>
                            <input 
                                id="organization" 
                                type="text" 
                                name="organization" 
                                value="{{ old('organization') }}" 
                                required 
                                autocomplete="organization"
                                placeholder="Nombre de tu organización"
                                class="input-base @error('organization') input-error @enderror"
                            >
                            @error('organization')
                                <p class="text-error text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password Input -->
                        <div>
                            <label for="password" class="label">
                                <i class="fas fa-lock text-primary-600 mr-2"></i>
                                Contraseña
                            </label>
                            <div class="relative">
                                <input 
                                    id="password" 
                                    type="password" 
                                    name="password" 
                                    required 
                                    autocomplete="new-password"
                                    placeholder="Mínimo 8 caracteres"
                                    class="input-base @error('password') input-error @enderror"
                                >
                                <button 
                                    type="button" 
                                    onclick="togglePassword('password', 'toggleIcon1')"
                                    class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-primary-600 transition-colors"
                                >
                                    <i class="fas fa-eye" id="toggleIcon1"></i>
                                </button>
                            </div>
                            @error('password')
                                <p class="text-error text-xs mt-1">{{ $message }}</p>
                            @enderror
                            <p class="text-xs text-slate-500 mt-1">
                                <i class="fas fa-info-circle mr-1"></i>
                                Mínimo 8 caracteres, incluye mayúsculas y números
                            </p>
                        </div>

                        <!-- Confirm Password Input -->
                        <div>
                            <label for="password_confirmation" class="label">
                                <i class="fas fa-lock text-primary-600 mr-2"></i>
                                Confirmar Contraseña
                            </label>
                            <div class="relative">
                                <input 
                                    id="password_confirmation" 
                                    type="password" 
                                    name="password_confirmation" 
                                    required 
                                    autocomplete="new-password"
                                    placeholder="Repite tu contraseña"
                                    class="input-base"
                                >
                                <button 
                                    type="button" 
                                    onclick="togglePassword('password_confirmation', 'toggleIcon2')"
                                    class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-primary-600 transition-colors"
                                >
                                    <i class="fas fa-eye" id="toggleIcon2"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Terms and Conditions -->
                        <div class="flex items-start">
                            <input 
                                id="terms" 
                                type="checkbox" 
                                name="terms" 
                                required
                                class="w-4 h-4 mt-1 text-primary-600 border-slate-300 rounded focus:ring-primary-500 cursor-pointer"
                            >
                            <label for="terms" class="ml-2 text-sm text-slate-600 cursor-pointer">
                                Acepto los 
                                <a href="#" class="text-primary-600 hover:text-primary-700 font-medium underline">Términos y Condiciones</a>
                                y la 
                                <a href="#" class="text-primary-600 hover:text-primary-700 font-medium underline">Política de Privacidad</a>
                            </label>
                        </div>

                        <!-- Submit Button -->
                        <button 
                            type="submit" 
                            class="btn btn-primary w-full shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200"
                        >
                            <i class="fas fa-user-plus mr-2"></i>
                            Crear Cuenta Gratuita
                        </button>
                    </form>

                    <!-- Divider -->
                    <div class="relative my-6">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-slate-200"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-4 bg-white/80 text-slate-500">¿Ya tienes cuenta?</span>
                        </div>
                    </div>

                    <!-- Login Link -->
                    <div class="text-center">
                        <a href="{{ route('login') }}" class="inline-flex items-center text-primary-600 hover:text-primary-700 font-medium transition-colors group">
                            <i class="fas fa-arrow-left mr-2 group-hover:-translate-x-1 transition-transform"></i>
                            <span>Inicia sesión aquí</span>
                        </a>
                    </div>
                </div>

                <!-- Card Footer -->
                <div class="card-footer bg-gradient-to-r from-primary-50 to-secondary-50 px-8 py-4 rounded-b-xl border-t border-primary-100">
                    <div class="flex items-center justify-between text-xs">
                        <span class="flex items-center text-slate-600">
                            <i class="fas fa-gift text-accent-600 mr-1"></i>
                            Prueba gratis por 14 días
                        </span>
                        <span class="flex items-center text-slate-600">
                            <i class="fas fa-check-circle text-success-600 mr-1"></i>
                            Sin tarjeta requerida
                        </span>
                    </div>
                </div>
            </div>

            <!-- Features -->
            <div class="mt-8 grid grid-cols-3 gap-4">
                <div class="text-center p-4 bg-white/60 backdrop-blur-sm rounded-xl border border-white/50">
                    <i class="fas fa-chart-line text-2xl text-primary-600 mb-2"></i>
                    <p class="text-xs text-slate-600 font-medium">Reportes</p>
                </div>
                <div class="text-center p-4 bg-white/60 backdrop-blur-sm rounded-xl border border-white/50">
                    <i class="fas fa-mobile-alt text-2xl text-secondary-600 mb-2"></i>
                    <p class="text-xs text-slate-600 font-medium">PWA Offline</p>
                </div>
                <div class="text-center p-4 bg-white/60 backdrop-blur-sm rounded-xl border border-white/50">
                    <i class="fas fa-users text-2xl text-accent-600 mb-2"></i>
                    <p class="text-xs text-slate-600 font-medium">Multi-usuario</p>
                </div>
            </div>

            <!-- Additional Info -->
            <div class="mt-6 text-center">
                <p class="text-xs text-slate-500">
                    © {{ date('Y') }} SGIC 2.0 - Todos los derechos reservados
                </p>
            </div>
        </div>
    </div>

    <!-- Toggle Password Script -->
    <script>
        function togglePassword(inputId, iconId) {
            const passwordInput = document.getElementById(inputId);
            const toggleIcon = document.getElementById(iconId);
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
    </script>
</x-guest-layout>
