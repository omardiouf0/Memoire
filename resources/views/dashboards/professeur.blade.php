<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
         @if (session('success'))
                <div id="success-message"class="alert alert-success text-center" style="color:#1D4598">
                    {{ session('success') }}
                </div>
                <script>
                    setTimeout(function () {
                        const msg = document.getElementById('success-message');
                        if (msg) {
                            msg.style.display = 'none';
                        }
                    }, 5000); // 5000 ms = 5 secondes
                </script>
         @endif

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=""> <a href="{{ route('fichiers.create') }}" class="px-4 py-2 ml-2 text-white rounded hover:bg-blue-700"style="background-color:#1D4598">Ajouter</a>
            <br>
            <br>
            </div>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Nom
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center">
                                        Type
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center">
                                        Niveau
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center">
                                        Matière
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center">
                                        Action
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($fichiers as $fichier)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $fichier->name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $fichier->type }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $fichier->niveau }}
                                    </td>
                                    <td class="px-6 py-4">
                                         {{ $fichier->matiere->name }}
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <a href="{{ route('fichiers.edit', $fichier->id) }}" 
                                        class="px-2 py-2  text-white rounded hover:bg-blue-700"style="background-color:#1D4598">Modifier</a>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <form action="{{ route('fichiers.destroy', $fichier->id) }}" method="POST" 
                                            onsubmit="return confirm('Voulez-vous vraiment supprimer ce fichier ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="px-2 py-2 rounded text-white hover:bg-red-700" 
                                                    style="background-color:#dc2626">
                                                Supprimer
                                            </button>
                                        </form>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <a href="{{ route('fichiers.download', $fichier->id) }}" 
                                        class="px-4 py-2 text-white rounded hover:bg-green-700" 
                                        style="background-color:#16a34a">
                                            Télécharger
                                        </a>
                                    </td>

                                </tr>
                        @empty
                            <tr>
                                <td colspan="4">Aucun fichier téléversé.</td>
                            </tr>
                        @endforelse

                        </tbody>
                    </table>
                     <div class="flex justify-center mt-4 py-4">
                    <nav aria-label="Page navigation example">
                      <ul class="inline-flex -space-x-px text-sm">
                        <li>
                          <a href="#" class="px-3 h-8 flex items-center justify-center text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700">Previous</a>
                        </li>
                        <li>
                          <a href="#" class="px-3 h-8 flex items-center justify-center text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">1</a>
                        </li>
                        <li>
                          <a href="#" class="px-3 h-8 flex items-center justify-center text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">2</a>
                        </li>
                        <li>
                          <a href="#" aria-current="page" class="px-3 h-8 flex items-center justify-center text-blue-600 bg-blue-50 border border-gray-300 hover:bg-blue-100 hover:text-blue-700">3</a>
                        </li>
                        <li>
                          <a href="#" class="px-3 h-8 flex items-center justify-center text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">4</a>
                        </li>
                        <li>
                          <a href="#" class="px-3 h-8 flex items-center justify-center text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">5</a>
                        </li>
                        <li>
                          <a href="#" class="px-3 h-8 flex items-center justify-center text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700">Next</a>
                        </li>
                      </ul>
                    </nav>
                  </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
