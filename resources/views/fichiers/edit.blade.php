<x-app-layout>
    <div class="min-h-screen bg-gray-100 py-8">
        <!-- Bandeau bleu -->
        <div class="w-full py-4 text-white text-center text-2xl font-semibold shadow" style="background-color:#1D4598">
            cfptdocs
        </div>

        <div class="max-w-2xl mx-auto mt-8 bg-white p-6 rounded shadow">
            <h2 class="text-xl font-semibold mb-4">Modifier le fichier</h2>

            @if(session('success'))
                <div class="mb-4 text-green-600">{{ session('success') }}</div>
            @endif

            @if ($errors->any())
                <div class="mb-4 text-red-600">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('fichiers.update', $fichier->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Nom -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium">Nom du fichier</label>
                    <input type="text" name="name" id="name" class="mt-1 block w-full rounded border-gray-300" value="{{ old('name', $fichier->name) }}" required>
                </div>

                <!-- Type -->
                <div class="mb-4">
                    <label for="type" class="block text-sm font-medium">Type</label>
                    <select name="type" id="type" class="mt-1 block w-full rounded border-gray-300" required>
                        <option value="TD" {{ $fichier->type == 'TD' ? 'selected' : '' }}>TD</option>
                        <option value="TP" {{ $fichier->type == 'TP' ? 'selected' : '' }}>TP</option>
                        <option value="Concours" {{ $fichier->type == 'Concours' ? 'selected' : '' }}>Concours</option>
                    </select>
                </div>

                    <!-- Niveau -->
                     <div id="autres-fields" style="display: none;">
                        <!-- Niveau -->
                        <div class="mb-4">
                            <label for="niveau_autres" class="block text-sm font-medium">Niveau</label>
                            <select name="niveau" id="niveau_autres" class="mt-1 block w-full rounded border-gray-300" required>
                                <option value="">-- Sélectionnez --</option>
                                <option value="BTS1" {{ old('niveau') == 'BTS1' ? 'selected' : '' }}>BTS1</option>
                                <option value="BTS2" {{ old('niveau') == 'BTS2' ? 'selected' : '' }}>BTS2</option>
                            </select>
                        </div>
                    </div>

                    <div id="concours-fields" style="display: none;">
                        <!-- specialiste -->
                        <div class="mt-4">
                            <label for="niveau_concours" class="block text-sm font-medium">Niveau</label>
                            <select name="niveau" id="niveau_concours"  required class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="">-- Sélectionnez --</option>
                                <option value="BTS" {{ old('niveau') == 'BTS' ? 'selected' : '' }}>BTS</option>
                                <option value="BT" {{ old('niveau') == 'BT' ? 'selected' : '' }}>BT</option>
                                <option value="BTI" {{ old('niveau') == 'BTI' ? 'selected' : '' }}>BTI</option>
                            </select>
                            @error('niveau')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                <div class="mb-4">
                    <x-label for="matiere_id" value="Matière" />
                    <select id="matiere_id" name="matiere_id" class="mt-1 block w-full rounded border-gray-300">
                        <option value="">--- Séléctionnez la matière ---</option>
                        @foreach ($filieres as $filiere)
                            <optgroup label="{{ $filiere->name }}">
                                @foreach ($filiere->matieres as $matiere)
                                    <option value="{{ $matiere->id }}"
                                        {{ old('matiere_id', $fichier->matiere_id) == $matiere->id ? 'selected' : '' }}>
                                        {{ $matiere->name }}
                                    </option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>
                </div>

                  <div class="mb-4">
                        <label for="annee" class="block text-sm font-medium">Année</label>
                        <input type="text" name="annee" placeholder="2023-2024"id="annee" class="mt-1 block w-full rounded border-gray-300" value="{{ old('name') }}" required>
                  </div>

                <!-- Fichier -->
                <div class="mb-4">
                    <label for="fichier" class="block text-sm font-medium">Nouveau fichier (optionnel)</label>
                    <input type="file" name="fichier" id="fichier" class="mt-1 block w-full" accept=".pdf,.doc,.docx,.ppt,.pptx">
                    <p class="text-sm text-gray-500">Laisser vide si vous ne souhaitez pas modifier le fichier existant.</p>
                </div>

                <!-- Boutons -->
                <div class="flex justify-between">
                    <a href="{{ route('dashboard.professeur') }}" class="px-4 py-2 text-white rounded hover:bg-blue-700" style="background-color:#1D4598">Annuler</a>
                    <button type="submit" class="px-4 py-2 text-white rounded hover:bg-blue-700" style="background-color:#1D4598">Mettre à jour</button>
                </div>
            </form>
        </div>
    </div>
        <script>
            const typeSelect = document.getElementById('type');
            const concoursFields = document.getElementById('concours-fields');
            const autresFields = document.getElementById('autres-fields');

            const toggleFields = (element, show) => {
                element.style.display = show ? 'block' : 'none';
                element.querySelectorAll('input, select').forEach(el => {
                    el.disabled = !show;
                });
            };

            const handleTypeChange = () => {
                const value = typeSelect.value;
                toggleFields(concoursFields, value === 'Concours');
                toggleFields(autresFields, value === 'TD' || value === 'TP');
            };

            typeSelect.addEventListener('change', handleTypeChange);
            window.addEventListener('DOMContentLoaded', handleTypeChange);
        </script>
</x-app-layout>
