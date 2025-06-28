<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CfptDocs') }}</title>

    <!-- Favicon optimisé -->
    <link rel="icon" href="{{ asset('images/CfptDocs2.jpg') }}" type="image/jpeg">
    <link rel="shortcut icon" href="{{ asset('images/CfptDocs2.jpg') }}" type="image/jpeg">
    
    <!-- Préchargement des assets -->
    <link rel="preload" href="{{ asset('images/CfptDocs2.jpg') }}" as="image">
    
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- Styles personnalisés -->
    <style>
        :root {
            --color-primary: #0369a1; /* Couleur CFPT principale */
            --color-primary-light: #e0f2fe;
        }
        .bg-cfpt-primary {
            background-color: var(--color-primary);
        }
        .text-cfpt-primary {
            color: var(--color-primary);
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @production
        <noscript>
            <div class="fixed inset-0 bg-red-100 z-50 flex items-center justify-center p-4">
                <div class="text-center">
                    <p class="font-bold text-lg text-red-800">JavaScript est requis pour le bon fonctionnement de CfptDocs</p>
                </div>
            </div>
        </noscript>
    @endproduction

    @livewireStyles
</head>
<body class="font-sans antialiased min-h-screen flex flex-col">
    <x-banner />

    <!-- Navigation -->
    <header class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center space-x-4">
                    <img src="{{ asset('images/CfptDocs2.jpg') }}" 
                         alt="Logo CfptDocs" 
                         class="h-8 w-auto rounded">
                    <span class="text-xl font-semibold text-gray-900">CfptDocs</span>
                </div>
                @livewire('navigation-menu')
            </div>
        </div>
    </header>

    <!-- Contenu principal -->
    <main class="flex-grow bg-gray-50">
        @if (isset($header))
            <div class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                    <div class="flex items-center">
                        <h1 class="text-lg font-medium text-gray-900">
                            {{ $header }}
                        </h1>
                    </div>
                </div>
            </div>
        @endif

        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            {{ $slot }}
        </div>
    </main>

    <!-- Pied de page -->
    <footer class="bg-white border-t border-gray-200 py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-sm text-gray-500">
            © {{ now()->year }} CfptDocs - Plateforme documentaire du CFPT
        </div>
    </footer>

    @stack('modals')
    @livewireScripts
</body>
</html>