<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Login - Club ISE</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>

<body class="font-[Inter] bg-gray-100">

    <div class="min-h-screen flex">

        <!-- LEFT PANEL -->
        <div class="hidden md:flex w-1/2 relative overflow-hidden justify-center items-center">

            <!-- Fondo imagen -->
            <div class="absolute inset-0 m-auto">
                <img src="/bg-volleyball.jpg" class="w-full h-full object-cover">
            </div>

            <!-- Overlay gradiente -->
            {{-- <div class="absolute inset-0 bg-gradient-to-br from-[#0f172a]/90 via-[#16a34a]/80 to-[#facc15]/70"></div> --}}
            <div class="absolute inset-0 bg-gradient-to-br from-[#0f172a]/90 via-[#16a34a]/80 to-[#000000]/70"></div>

            <!-- Contenido -->
            <div class="relative z-10 flex flex-col justify-center px-16 text-white items-center">

                <img src="/logo.png" class="w-64 mb-8">

                <h1 class="text-5xl font-bold text-center leading-tight">
                    Bienvenido al sistema <br>
                    <span class="text-yellow-300">Club ISE</span>
                </h1>

                <div class="w-16 h-1 bg-yellow-400 my-6 rounded"></div>

                <p class="text-lg text-gray-200 max-w-md">
                    Plataforma de gestión administrativa, financiera y operativa del club de voleibol femenino.
                </p>

                <!-- Badge -->
                <div class="mt-10 bg-white/10 backdrop-blur-md px-6 py-4 rounded-xl w-fit">
                    <p class="text-sm">
                        Formación deportiva con disciplina, pasión y valores
                    </p>
                </div>

            </div>
        </div>

        <!-- RIGHT PANEL -->
        <div class="w-full md:w-1/2 flex items-center justify-center p-6">

            <div class="w-full max-w-md">

                <!-- Card -->
                <div class="bg-white rounded-3xl shadow-2xl p-10">

                    <!-- Logo -->
                    <div class="text-center mb-6">
                        <img src="/logo.png" class="w-20 mx-auto mb-4">
                        <h2 class="text-2xl font-bold text-gray-800">Iniciar sesión</h2>
                        <p class="text-gray-500 text-sm">Ingresa tus credenciales para continuar</p>
                    </div>

                    @if ($errors->any())
                        <div class="mb-4 p-3 bg-red-100 text-red-600 rounded-lg text-sm">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form method="POST" action="/login" class="space-y-5">
                        @csrf

                        <!-- EMAIL -->
                        <div>
                            <label class="text-sm text-gray-600">Correo electrónico</label>
                            <div class="relative mt-1">
                                <input type="email" name="email"
                                    class="w-full pl-10 pr-4 py-3 border rounded-xl focus:ring-2 focus:ring-green-500 outline-none"
                                    placeholder="ejemplo@ise.com">

                                <!-- icon -->
                                <span class="absolute left-3 top-3 text-gray-400">📧</span>
                            </div>
                        </div>

                        <!-- PASSWORD -->
                        <div>
                            <label class="text-sm text-gray-600">Contraseña</label>
                            <div class="relative mt-1">
                                <input type="password" name="password"
                                    class="w-full pl-10 pr-10 py-3 border rounded-xl focus:ring-2 focus:ring-green-500 outline-none">

                                <span class="absolute left-3 top-3 text-gray-400">🔒</span>
                                <span class="absolute right-3 top-3 text-gray-400 cursor-pointer">👁</span>
                            </div>
                        </div>

                        <!-- OPCIONES -->
                        <div class="flex justify-between text-sm">
                            <label class="flex items-center gap-2">
                                <input type="checkbox"> Recordarme
                            </label>

                            <a href="#" class="text-green-600 hover:underline">
                                ¿Olvidaste tu contraseña?
                            </a>
                        </div>

                        <!-- BOTÓN -->
                        <button
                            class="w-full cursor-pointer bg-green-600 hover:bg-green-700 text-white py-3 rounded-xl font-semibold transition">
                            Ingresar al sistema
                        </button>

                        <!-- FOOT -->
                        <div class="text-center text-xs text-gray-400 mt-4">
                            Acceso seguro · Tus datos están protegidos
                        </div>

                    </form>

                </div>

                <p class="text-center text-xs text-gray-400 mt-6">
                    © {{ date('Y') }} Club ISE
                </p>

            </div>
        </div>

    </div>

</body>

</html>
