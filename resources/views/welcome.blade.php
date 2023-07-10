<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Universidad</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite('resources/css/app.css')

    <style>
        #typewriter {
            overflow: hidden;
            white-space: nowrap;
            border-right: 0.15em transparent rgb(15, 14, 49); /* Cambia el color del cursor */
            animation: typing 5s steps(22), blink-caret 0.75s step-end infinite;
        }
        @keyframes typing {
            from {
                width: 0;
            }
            to {
                width: 400px;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var typewriterElement = document.getElementById('typewriter');

            typewriterElement.addEventListener('animationend', function() {
                typewriterElement.style.animation = 'none';
                typewriterElement.offsetHeight; /* Reinicia la animación */
                typewriterElement.style.animation = null;
            });
        });
    </script>
</head>
<body class="antialiased">
<div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-indigo-200 selection:bg-indigo-500 selection:text-white flex justify-center  flex-col">
    @if (Route::has('login'))
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
            @auth
                <a href="{{ url('/dashboard') }}" class="font-semibold text-blue-800 hover:text-blue-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-indigo-500">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="font-semibold text-blue-800 hover:text-blue-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-indigo-500">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 font-semibold text-blue-800 hover:text-blue-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-indigo-500">Register</a>
                @endif
            @endauth
        </div>
    @endif
    <div class="w-1/2 max-w-7xl mx-auto p-6 lg:p-8 flex justify-center">
        <h1 id="typewriter" class="text-6xl">Bienvenido..!</h1>
    </div>
    <div class="max-w-7xl mx-auto p-6 lg:p-8">
        <div class="flex justify-center">
            <img src="img/logo.png" alt="Logo" class="w-72">
        </div>
    </div>
</div>
</body>
</html>


