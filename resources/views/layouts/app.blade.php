<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Panel - Club ISE</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body class="font-[Inter] bg-gray-100">

    <div class="flex min-h-screen">

        <!-- SIDEBAR -->
        <aside class="w-64 bg-[#0f172a] text-white flex flex-col">

            <!-- Logo -->
            <div class="p-6 border-b border-gray-700">
                <img src="/logo.png" class="w-20 mx-auto mb-2">
                <h2 class="text-center font-semibold">Club ISE</h2>
            </div>

            <!-- MENU -->
            <nav class="flex-1 p-4 space-y-2">

                <a href="#"
                    class="sidebar-link flex items-center gap-3 p-3 rounded-xl hover:bg-white/10 transition">
                    🏠 <span>Dashboard</span>
                </a>

                <a href="{{ route('deportistas.index') }}"
                    class="flex items-center gap-3 p-3 rounded-xl hover:bg-white/10 transition">
                    🏐 <span>Deportistas</span>
                </a>

                <a href="{{ route('grupos.index') }}" class="sidebar-link">
                    📚 <span>Grupos</span>
                </a>

                <a href="{{ route('sedes.index') }}" class="sidebar-link">
                    📍 <span>Sedes</span>
                </a>

                <a href="{{ route('productos.index') }}" class="sidebar-link">
                    🛒 <span>Productos</span>
                </a>

                <a href="#" class="flex items-center gap-3 p-3 rounded-xl hover:bg-white/10 transition">
                    📅 <span>Asistencia</span>
                </a>

                <a href="#" class="flex items-center gap-3 p-3 rounded-xl hover:bg-white/10 transition">
                    💰 <span>Pagos</span>
                </a>

            </nav>

            <!-- USER -->
            <div class="p-4 border-t border-gray-700">

                <div class="text-sm mb-2">
                    {{ auth()->user()->name }}
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="w-full bg-red-500 hover:bg-red-600 py-2 rounded-lg text-sm">
                        Cerrar sesión
                    </button>
                </form>

            </div>

        </aside>

        <!-- CONTENT -->
        <main class="flex-1">

            <!-- TOPBAR -->
            <div class="bg-white shadow px-6 py-4 flex justify-between items-center">

                <h1 class="font-semibold text-lg">
                    @yield('title', 'Panel')
                </h1>

                <div class="text-sm text-gray-500">
                    {{ now()->format('d/m/Y') }}
                </div>

            </div>

            <!-- PAGE CONTENT -->
            <div class="p-6">
                @yield('content')
            </div>

        </main>

    </div>

</body>

</html>
