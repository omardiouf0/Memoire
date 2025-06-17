@extends('layouts.app') <!-- ou 'layouts.app' selon ton layout principal -->

@section('content')
    <div class="min-h-screen bg-gray-100 py-8">

        <!-- Bandeau bleu avec le nom du site -->
        <div class="w-full py-4 text-white text-center text-2xl font-bold shadow" style="background-color:#1D4598">
            cfptdocs
        </div>
        <h2 class="text-xl font-bold mb-4">Mes fichiers</h2>
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Type</th>
                        <th>Niveau</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($fichiers as $fichier)
                        <tr>
                            <td>{{ $fichier->name }}</td>
                            <td>{{ $fichier->type }}</td>
                            <td>{{ $fichier->niveau }}</td>
                            <td>
                                <a href="{{ asset('storage/' . $fichier->chemin) }}" class="text-blue-500" target="_blank">Télécharger</a>

                                @if(auth()->id() === $fichier->user_id)
                                    <a href="{{ route('fichiers.edit', $fichier->id) }}" class="text-yellow-500 ml-2">Modifier</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
@endsection