<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>403 Accès Refusé</title>
    @filamentStyles
    <style>
        .error-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            text-align: center;
            padding: 2rem;
        }
        .error-code {
            font-size: 6rem;
            font-weight: bold;
            color: #ef4444; /* Couleur rouge */
        }
        .error-message {
            font-size: 1.5rem;
            margin: 1rem 0;
        }
        .button-group {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }
        .button {
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
            transition: all 0.2s;
        }
        .button-primary {
            background-color: #3b82f6; /* Couleur bleue Filament */
            color: white;
        }
        .button-primary:hover {
            background-color: #2563eb;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-code">403</div>
        <h1 class="error-message">
            {{ $exception->getMessage() ?: 'Accès refusé' }}
        </h1>
        <p>Vous n'avez pas les permissions nécessaires pour accéder à cette page.</p>
        
                <div class="button-group">
            <!-- Bouton de déconnexion + redirection -->
            <form method="POST" action="{{ route('filament.admin.auth.logout') }}">
                @csrf
                <button type="submit" class="button button-primary">
                    Se déconnecter et revenir au login
                </button>
            </form>
            
            <a href="{{ url('/') }}" class="button" style="background-color: #e5e7eb; color: #111827;">
                Retour à l'accueil
            </a>
        </div>
    </div>
    @filamentScripts
</body>
</html>