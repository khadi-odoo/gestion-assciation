<!-- component -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <style>
        .dropdown:hover .dropdown-menu {
            display: block;
        }
    </style>
    <div class="flex flex-col h-screen bg-gray-100">

        <!-- Barra de navegación superior -->
        <div class="bg-white text-white shadow w-full p-2 flex items-center justify-between">
            <div class="flex items-center">
                <div class="flex items-center"> <!-- Mostrado en todos los dispositivos -->
                    <a href="{{'/'}}">
                        <h2 class="font-bold  text-gray-900  text-xl">SAMA EVEN</h2>
                    </a>
                </div>
                <div class="md:hidden flex items-center"> <!-- Se muestra solo en dispositivos pequeños -->
                    <button id="menuBtn">
                        <i class="fas fa-bars text-gray-900 text-lg"></i> <!-- Ícono de menú -->
                    </button>
                </div>
            </div>

            <!-- Ícono de Notificación y Perfil -->
            <div class="space-x-5">
                <div class="dropdown inline-block relative">
                    <button class="bg-white text-gray-900 font-semibold py-2 px-4 rounded inline-flex items-center">
                        <span class="mr-1">{{Auth::user()->name}} </span>
                        <i class="fas fa-user text-gray-900 text-lg"></i>
                    </button>
                    <ul class="dropdown-menu absolute hidden text-gray-900 pt-1">
                        <li class=""><a class="rounded-t bg-white hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="{{ route('profile.show') }}">Profil</a></li>
                        <li class="">
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                <button type="submit" class="bg-white hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap"> {{ __('Log Out') }}</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Contenido principal -->
        <div class="flex-1 flex flex-wrap">
            <!-- Barra lateral de navegación (oculta en dispositivos pequeños) -->
            <div class="p-2 bg-white w-full md:w-60 flex flex-col md:flex" id="sideNav">
                <nav>
                    <a href="{{'/association/dashboard'}}" class="block text-gray-900 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-cyan-500 hover:to-cyan-500 hover:text-white">
                        <i class="fas fa-home mr-2"></i>Dashboard
                    </a>
                    <a class="block text-gray-900 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-cyan-500 hover:to-cyan-500 hover:text-white">
                        <i class="fas fa-file-alt mr-2"></i>Evenement
                    </a>
                    </a>
                </nav>
            </div>
            @if (session('status'))
            <div class="flex flex-col max-w-lg mt-20 mx-auto">
                <div class="inline-flex justify-between bg-teal-100 border border-teal-400 text-teal-700 px-4 py-3 my-2 rounded " role="alert">
                    <span class="block sm:inline pl-2">
                        <strong class="font-bold">Success</strong>
                        {{ session('status') }}
                    </span>
                    <span class="inline" onclick="return this.parentNode.remove();">
                        <svg class="fill-current h-6 w-6" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <title>Close</title>
                        </svg>
                    </span>
                </div>
            </div>
            @endif
            @if(count($errors) >0)
            <div class="inline-flex justify-between bg-red-100 border border-red-400 text-red-700 px-4 py-3 my-2 rounded  " role="alert">
                <span class="block sm:inline pl-2">
                    <strong class="font-bold">Success</strong>
                    @foreach($errors->all() as $error)
                    {{$error}}
                    @endforeach
                </span>
                <span class="inline" onclick="return this.parentNode.remove();">
                    <svg class="fill-current h-6 w-6" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <title>Close</title>
                        <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                    </svg>
                </span>
            </div>
            @endif

            @yield('contenu')

        </div>
    </div>
    </div>

    <!-- Script para las gráficas -->
    <script>
        // Agregar lógica para mostrar/ocultar la navegación lateral al hacer clic en el ícono de menú
        const menuBtn = document.getElementById('menuBtn');
        const sideNav = document.getElementById('sideNav');

        menuBtn.addEventListener('click', () => {
            sideNav.classList.toggle('hidden'); // Agrega o quita la clase 'hidden' para mostrar u ocultar la navegación lateral
        });
    </script>
</body>

</html>