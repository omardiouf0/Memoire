<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="min-h-screen bg-gray-100 py-8">
        <div class="w-full py-4 text-white text-center text-2xl font-semibold shadow" style="background-color:#1D4598">
            cfptdocs - Espace Étudiant
        </div>    
         <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr class="text-left bg-gray-200">
                            <th class="px-4 py-2">Nom</th>
                            <th class="px-4 py-2">Type</th>
                            <th class="px-4 py-2">Matière</th>
                            <th class="px-4 py-2">Télécharger</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($fichiers as $fichier)
                            <tr class="text-left border-b">
                                <td class="px-6 py-4 text-center">{{ $fichier->name }}</td>
                                <td class="px-6 py-4 text-center">{{ $fichier->type }}</td>
                                <td class="px-6 py-4 text-center">{{ $fichier->matiere->name ?? 'N/A' }}</td>
                                <td class="px-6 py-4 text-center">
                                    <a href="{{ asset('storage/' . $fichier->chemin) }}" target="_blank"
                                        class="px-4 py-2 text-white rounded hover:bg-green-700" 
                                        style="background-color:#16a34a">
                                        Télécharger
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr class="px-6 py-4 text-center">
                                <td colspan="4">Aucun fichier n'est disponible pour vous.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
