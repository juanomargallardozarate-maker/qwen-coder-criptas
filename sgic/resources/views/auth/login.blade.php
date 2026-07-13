<x-guest-layout>
    <!-- Login Container -->
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-slate-50 via-emerald-50/30 to-indigo-50/30">
        <!-- Decorative Blobs -->
        <div class="absolute top-20 left-10 w-72 h-72 bg-primary-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob"></div>
        <div class="absolute top-40 right-10 w-72 h-72 bg-secondary-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-20 left-1/2 w-72 h-72 bg-accent-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-4000"></div>

        <!-- Login Card -->
        <div class="relative w-full max-w-md">
            <!-- Logo and Header -->
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-primary-600 to-secondary-600 rounded-2xl shadow-lg mb-4 transform hover:scale-105 transition-transform duration-300">
                    <i class="fas fa-monument text-4xl text-white"></i>
                </div>
                <h1 class="text-3xl font-bold text-slate-900">SGIC 2.0</h1>
                <p class="text-sm text-slate-600 mt-2">Sistema de Gestión Integral de Criptas</p>
            </div>

            <!-- Login Form Card -->
            <div class="card bg-white/80 backdrop-blur-xl border border-white/50 shadow-2xl">
                <div class="card-body p-8">
                    <!-- Welcome Message -->
                    <div class="text-center mb-6">
                        <h2 class="text-2xl font-semibold text-slate-800">¡Bienvenido!</h2>
                        <p class="text-slate-600 mt-2">Inicia sesión para continuar</p>
                    </div>

                    <!-- Session Status Messages -->
                    @if (session('status'))
                        <div class="alert alert-success mb-6">
                            <i class="fas fa-check-circle mr-2"></i>
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->has('email'))
                        <div class="alert alert-error mb-6">
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            {{ $errors->first('email') }}
                        </div>
                    @endif

                    <!-- Login Form -->
                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf

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
                                autofocus 
                                autocomplete="email"
                                placeholder="tu@empresa.com"
                                class="input-base @error('email') input-error @enderror"
                            >
                            @error('email')
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
                                    autocomplete="current-password"
                                    placeholder="••••••••"
                                    class="input-base @error('password') input-error @enderror"
                                >
                                <button 
                                    type="button" 
                                    onclick="togglePassword()"
                                    class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-primary-600 transition-colors"
                                >
                                    <i class="fas fa-eye" id="toggleIcon"></i>
                                </button>
                            </div>
                            @error('password')
                                <p class="text-error text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="flex items-center justify-between">
                            <label class="flex items-center cursor-pointer group">
                                <input 
                                    type="checkbox" 
                                    name="remember" 
                                    class="w-4 h-4 text-primary-600 border-slate-300 rounded focus:ring-primary-500 cursor-pointer"
                                >
                                <span class="ml-2 text-sm text-slate-600 group-hover:text-slate-800 transition-colors">Recordarme</span>
                            </label>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-sm text-primary-600 hover:text-primary-700 font-medium transition-colors">
                                    ¿Olvidaste tu contraseña?
                                </a>
                            @endif
                        </div>

                        <!-- Submit Button -->
                        <button 
                            type="submit" 
                            class="btn btn-primary w-full shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200"
                        >
                            <i class="fas fa-sign-in-alt mr-2"></i>
                            Iniciar Sesión
                        </button>
                    </form>

                    <!-- Divider -->
                    <div class="relative my-6">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-slate-200"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-4 bg-white/80 text-slate-500">¿Nuevo en SGIC?</span>
                        </div>
                    </div>

                    <!-- Register Link -->
                    <div class="text-center">
                        <a href="{{ route('register') }}" class="inline-flex items-center text-primary-600 hover:text-primary-700 font-medium transition-colors group">
                            <span>Crea una cuenta gratuita</span>
                            <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>

                <!-- Card Footer -->
                <div class="card-footer bg-slate-50/50 px-8 py-4 rounded-b-xl border-t border-slate-100">
                    <div class="flex items-center justify-center space-x-4 text-xs text-slate-500">
                        <span class="flex items-center">
                            <i class="fas fa-shield-alt text-success-600 mr-1"></i>
                            Seguro
                        </span>
                        <span class="flex items-center">
                            <i class="fas fa-lock text-primary-600 mr-1"></i>
                            Encriptado
                        </span>
                        <span class="flex items-center">
                            <i class="fas fa-cloud text-accent-600 mr-1"></i>
                            Cloud
                        </span>
                    </div>
                </div>
            </div>

            <!-- Additional Info -->
            <div class="mt-8 text-center">
                <p class="text-xs text-slate-500">
                    © {{ date('Y') }} SGIC 2.0 - Todos los derechos reservados
                </p>
                <div class="mt-3 flex items-center justify-center space-x-4">
                    <a href="#" class="text-xs text-slate-500 hover:text-primary-600 transition-colors">Términos</a>
                    <span class="text-slate-300">|</span>
                    <a href="#" class="text-xs text-slate-500 hover:text-primary-600 transition-colors">Privacidad</a>
                    <span class="text-slate-300">|</span>
                    <a href="#" class="text-xs text-slate-500 hover:text-primary-600 transition-colors">Soporte</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Toggle Password Script -->
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            
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
