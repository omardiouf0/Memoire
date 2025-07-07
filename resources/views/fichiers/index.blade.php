@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-100 py-8">
        <!-- Bandeau bleu avec le nom du site -->
        <div class="w-full py-4 text-white text-center text-2xl font-bold shadow" style="background-color:#1D4598">
            CfptDocs
        </div>

        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-xl font-bold mb-4 mt-6">Mes fichiers</h2>

            <table class="table-auto w-full bg-white shadow rounded">
                <thead class="bg-gray-200">
                    <tr class="text-left">
                        <th class="px-4 py-2">Nom</th>
                        <th class="px-4 py-2">Type</th>
                        <th class="px-4 py-2">Niveau</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($fichiers as $fichier)
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $fichier->name }}</td>
                            <td class="px-4 py-2">{{ ucfirst($fichier->type) }}</td>
                            <td class="px-4 py-2">{{ $fichier->niveau }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ asset('storage/' . $fichier->chemin) }}" class="text-blue-500 hover:underline" target="_blank">Télécharger</a>

                                @if(auth()->id() === $fichier->user_id)
                                    <a href="{{ route('fichiers.edit', $fichier->id) }}" class="text-yellow-500 hover:underline ml-2">Modifier</a>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center px-4 py-4">Aucun fichier disponible.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="mt-6 flex justify-center">
                {{ $fichiers->links() }}
            </div>
        </div>
    </div>
@endsection
