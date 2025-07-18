<!doctype html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="icon" type="image/x-icon" href="{{ asset('images/CfptDocs.jpg') }}">
  <title>CfptDocs</title>
</head>

<body class="bg-gray-100">

  <!-- Header -->
  <header
    class="bg-gradient-to-br from-[#00037a] to-[#1c1cdd] hover:bg-gradient-to-bl focus:ring-4 focus:outline-none dark:focus:ring-blue-800">
    <div class="max-w-7xl mx-auto flex justify-between items-center px-4 py-3">
      <div class="flex items-center">
        <img src="{{ asset('images/CfptDocs.jpg') }}" class="w-11 h-11 rounded-md" alt="Logo" />
      </div>

      <!-- Menu desktop -->
      <nav class="hidden md:flex space-x-6 text-white font-medium">
        <a href="{{ route('welcome') }}" class="hover:underline">Accueil</a>
        <a href="{{ route('about') }}" class="hover:underline">A propos</a>
        <a href="{{ route('concours') }}" class="hover:underline text-blue-400 ">Concours</a>
        <a href="{{ route('register') }}" class="hover:underline">S'inscrire</a>
        <a href="{{ route('login') }}" class="hover:underline">Connexion</a>
      </nav>

      <!-- Mobile menu button -->
      <div class="md:hidden">
        <button id="menu-btn" class="text-white focus:outline-none focus:ring-2 focus:ring-white" aria-label="Menu">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
      </div>
    </div>

    <!-- Mobile menu -->
    <nav id="mobile-menu" class="md:hidden hidden px-4 pb-4 text-white space-y-2">
      <a href="{{ route('welcome') }}" class="block px-3 py-2 rounded hover:bg-[#1717cf]">Accueil</a>
      <a href="{{ route('about') }}" class="block px-3 py-2 rounded hover:bg-[#1717cf]">A propos</a>
      <a href="{{ route('concours') }}" class="hover:underline text-blue-400 ">Concours</a>
      <a href="{{ route('register') }}" class="block px-3 py-2 rounded hover:bg-[#1717cf]">S'inscrire</a>
      <a href="{{ route('login') }}" class="block px-3 py-2 rounded hover:bg-[#1717cf]">Connexion</a>
    </nav>
  </header>

  <!-- Section A propos -->
  <section class="w-full bg-[#eff1f4] py-12 px-4">
    <div class="max-w-5xl mx-auto text-center">
      <h1
        class="text-4xl md:text-5xl lg:text-6xl font-black bg-gradient-to-br from-[#00037a] to-[#2424f2] bg-clip-text text-transparent hover:bg-gradient-to-bl focus:outline-none focus:ring-4 dark:focus:ring-blue-800 mb-6">
        Epreuves de Concours
      </h1>

      <p class="text-base md:text-lg text-gray-500 dark:text-gray-400 leading-relaxed">
        CfptDocs vous offre des épreuves de concours.
      </p>

      <div
        class="flex flex-col sm:flex-row justify-center items-center mt-10 space-y-4 sm:space-y-0 sm:space-x-4">
        <a href="#"
          class="text-[#00037a] border border-[#00037a] px-6 py-3 rounded-md text-base font-semibold hover:bg-[#1717cf] hover:text-white focus:outline-none focus:ring-2 focus:ring-[#00037a] transition duration-200 ease-in-out">
          En savoir plus
        </a>
      </div>
    </div>
  </section>
  <section>
      <div class="min-h-screen bg-gray-100 py-8">   
          <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
              <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                  <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 w-11">
                          <tr class="text-left bg-gray-200">
                              <th class="text-center py-4 text-[20px]">Nom</th>
                              <th class="text-center py-4 text-[20px]">Niveau</th>
                              <th class="text-center py-4 text-[20px]">Année</th>
                              <th class="text-center py-4 text-[20px]">Matière</th>
                              <th class="text-center py-4 text-[20px]">Télécharger</th>
                          </tr>
                      </thead>
                      <tbody> 
                          @forelse ($fichiers as $fichier)
                              <tr class="text-left border-b">
                                  <td class=" py-4 text-center">{{ $fichier->name }}</td>
                                  <td class=" py-4 text-center">{{ $fichier->niveau }}</td>
                                  <td class=" py-4 text-center">{{ $fichier->annee }}</td>
                                  <td class=" py-4 text-center">{{ $fichier->matiere->name ?? 'N/A' }}</td>
                                  <td class=" py-4 text-center">
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
                  <div class="flex justify-center mt-4">
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
  </section>
  <!-- Section cartes -->
  

  <!-- Footer -->
  <footer
    class="bg-gradient-to-br from-[#00037a] to-[#1c1cdd] hover:bg-gradient-to-bl focus:ring-4 focus:outline-none dark:focus:ring-blue-800 text-white mt-10">
    <div class="max-w-7xl mx-auto px-4 py-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

      <!-- Logo + description -->
      <div>
        <div class="flex items-center mb-3">
          <a href="http://cfptsj.sn" target="_blank" rel="noopener">
            <img src="{{ asset('images/Logocfpt.png') }}" alt="Logo CFPT Sénégal-Japon"
              class="w-12 h-12 rounded mr-3" />
          </a>
          <h2 class="text-xl font-bold">CFPT SENEGAL-JAPON</h2>
        </div>
        <p class="text-sm text-gray-300">
          Le Centre de Formation Professionnelle et Technique Sénégal-Japon (CFPT) a vu le jour en 1984. Il est l'un des
          fleurons de la coopération entre la République du Sénégal et le Gouvernement du Japon.
        </p>
        <div class="flex space-x-4 mt-4">
          <a href="https://www.facebook.com/cfptsenjap/?locale=fr_FR" target="_blank" rel="noopener">
            <img src="{{ asset('images/facebook.jpg') }}" alt="Facebook" class="w-8 h-8 rounded" />
          </a>
          <a href="https://www.instagram.com/cfpt_senegal_japon_officiel/" target="_blank" rel="noopener">
            <img src="{{ asset('images/instagram.jpg') }}" alt="Instagram" class="w-8 h-8 rounded" />
          </a>
          <a href="https://www.linkedin.com/school/cfpt/?originalSubdomain=fr" target="_blank" rel="noopener">
            <img src="{{ asset('images/Linkedin.jpg') }}" alt="LinkedIn" class="w-8 h-8 rounded" />
          </a>
        </div>
        <div class="mt-3">
          <a href="http://cfptsj.sn" target="_blank" class="text-blue-400 font-bold hover:underline" rel="noopener">
            www.cfpt.sn
          </a>
        </div>
      </div>

      <!-- Documents -->
      <div>
        <h3 class="text-xl font-bold mb-3 px-6">Documents Stockés</h3>
        <ul class="space-y-2 text-gray-300 px-6">
          <li>Documents de TD</li>
          <li>Documents de TP</li>
          <li>Épreuves de concours</li>
        </ul>
      </div>

      <!-- Filières -->
      <div>
        <h3 class="text-xl font-bold mb-3 px-6">Départements</h3>
        <ul class="space-y-2 text-gray-300 px-6">
          <li>Informatique</li>
          <li>Electrique</li>
        </ul>
      </div>

      <!-- Niveaux -->
      <div>
        <h3 class="text-xl font-bold mb-3 px-6">Niveaux d'étude</h3>
        <ul class="space-y-2 text-gray-300 px-6">
          <li>1ère année en BTS</li>
          <li>2e année en BTS</li>
        </ul>
      </div>
    </div>

    <!-- Bas de page -->
    <div class="bg-[#1e0471] py-4">
      <p class="text-center text-sm text-gray-200">
        &copy; 2025 CFPT Sénégal-Japon. Tous droits réservés — Design by <span class="font-bold text-white">BINOME
          DIGITAL</span>
      </p>
    </div>
  </footer>

  <script>
    const btn = document.getElementById('menu-btn');
    const menu = document.getElementById('mobile-menu');

    btn.addEventListener('click', () => {
      menu.classList.toggle('hidden');
    });
  </script>

</body>

</html>
