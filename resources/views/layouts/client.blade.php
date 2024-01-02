<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>SAMA EVEN</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <style>
        .dropdown:hover .dropdown-menu {
            display: block;
        }
    </style>
    <header class="lg:px-16 px-4 bg-white flex flex-wrap items-center py-4 shadow-md">
        <div class="flex-1 flex justify-between items-center">
            <a href="/" class="text-xl">SAMA EVEN</a>
        </div>

        <label for="menu-toggle" class="pointer-cursor md:hidden block">
            <svg class="fill-current text-gray-900" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                <title>menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg>
        </label>
        <input class="hidden" type="checkbox" id="menu-toggle" />

        <div class="hidden md:flex md:items-center md:w-auto w-full" id="menu">
            <nav>
                <ul class="md:flex items-center justify-between text-base text-gray-700 pt-4 md:pt-0">
                    @if (Route::has('login'))
                    @auth
                    @if (Auth::user()->role == 'asssociation')
                    <li><a class="md:p-4 py-3 px-0 block" href="{{ url('/asssociation/dashboard') }}">Dashboard</a></li>
                    @else
                    <li>
                        <div class="space-x-5">
                            <div class="dropdown inline-block relative">
                                <button class="bg-white text-gray-900 font-semibold py-2 px-4 rounded inline-flex items-center">
                                    <span class="mr-1">{{Auth::user()->name}} </span>
                                    <i class="fas fa-user text-gray-900 text-lg"></i>
                                </button>
                                <ul class="dropdown-menu absolute hidden text-gray-900 pt-1">
                                    <li class=""><a class="rounded-t bg-white hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="{{ route('profile.show') }}">profile</a></li>
                                    <li class="">
                                        <form method="POST" action="{{ route('logout') }}" x-data>
                                            @csrf
                                            <button type="submit" class="bg-white hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap"> {{ __('Log Out') }}</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>

                    @endif
                    @else
                    <li><a class="md:p-4 py-3 px-0 block" href="{{ route('login') }}">Se Connecter</a></li>
                    @if (Route::has('register'))
                    <li><a class="md:p-4 py-3 px-0 block" href="{{ route('register') }}">Creer Un compte</a></li>
                    @endif
                    @endauth
                    @endif
                </ul>
            </nav>
        </div>
    </header>
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
    @yield('clientContenu')
</body>

</html>