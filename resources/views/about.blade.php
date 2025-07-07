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
        <a href="{{ route('about') }}" class="hover:underline text-blue-400 ">A propos</a>
        <a href="{{ route('concours') }}" class="hover:underline">Concours</a>
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
      <a href="{{ route('about') }}" class="hover:underline text-blue-400 ">A propos</a>
      <a href="{{ route('concours') }}" class="block px-3 py-2 rounded hover:bg-[#1717cf]">Concours</a>
      <a href="{{ route('register') }}" class="block px-3 py-2 rounded hover:bg-[#1717cf]">S'inscrire</a>
      <a href="{{ route('login') }}" class="block px-3 py-2 rounded hover:bg-[#1717cf]">Connexion</a>
    </nav>
  </header>

  <!-- Section A propos -->
  <section class="w-full bg-[#eff1f4] py-12 px-4">
    <div class="max-w-5xl mx-auto text-center">
      <h1
        class="text-4xl md:text-5xl lg:text-6xl font-black bg-gradient-to-br from-[#00037a] to-[#2424f2] bg-clip-text text-transparent hover:bg-gradient-to-bl focus:outline-none focus:ring-4 dark:focus:ring-blue-800 mb-6">
        A propos du CfptDocs
      </h1>

      <p class="text-base md:text-lg text-gray-500 dark:text-gray-400 leading-relaxed">
        CfptDocs, une plateforme qui répond de vos besoins aux sources pédagogiques.
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

  <!-- Section cartes -->
  <section class="bg-[#e8e8ec] w-full pt-12 px-4">
    <div class="max-w-7xl mx-auto ">
        <div class="max-w-xl w-full  mb-6 h-auto bg-white p-4 sm:p-6 md:p-8 rounded-lg shadow-md 
            flex flex-col justify-center items-center 
             hover:items-center active:items-center hover:mx-auto duration-500 overflow-hidden cursor-pointer text-left hover:text-center hover:bg-gradient-to-r hover:from-blue-600 hover:to-blue-400">
          <h2 class="text-3xl md:text-4xl lg:text-5xl font-black bg-gradient-to-br from-[#00037a] to-[#2424f2] bg-clip-text text-transparent hover:bg-gradient-to-bl focus:outline-none focus:ring-4 dark:focus:ring-blue-800 mb-2">
          <h2 class="text-3xl md:text-4xl lg:text-5xl font-black bg-gradient-to-br from-[#00037a] to-[#2424f2] bg-clip-text text-transparent hover:bg-gradient-to-bl focus:outline-none focus:ring-4 dark:focus:ring-blue-800 mb-2">
            Présentation de la plateforme
          </h2>

          <div class="overflow-hidden relative">
            <p class="text-sm sm:text-base md:text-lg lg:text-xl text-gray-600 leading-relaxed hover:text-black">
              CfptDocs est une plateforme de stockage et de partage de documents pédagogiques, à destination des
              étudiants et professeurs du CFPT Sénégal-Japon. Cette plateforme vise à faciliter l’accès aux différents
              types de documents (travaux dirigés et pratiques, épreuves de concours) et à améliorer la gestion des
              documents pédagogiques. Elle doit permettre à chaque professeur de consulter, déposer et organiser
              facilement les documents relatifs aux enseignements (TD, TP), et aussi mettre à disposition du public des
              sujets de concours accessibles sans inscription.
            </p>
          </div>
        </div>
        
        <div class="max-w-xl w-full mx-auto  mb-6 h-auto bg-white p-4 sm:p-6 rounded-lg shadow-md flex flex-col justify-center items-start hover:items-center active:items-center hover: duration-500 overflow-hidden cursor-pointer text-left hover:text-center hover:bg-gradient-to-r hover:from-blue-600 hover:to-blue-400">
          <h2 class="text-3xl md:text-4xl lg:text-5xl font-black bg-gradient-to-br from-[#00037a] to-[#2424f2] bg-clip-text text-transparent hover:bg-gradient-to-bl focus:outline-none focus:ring-4 dark:focus:ring-blue-800 mb-2">
            Fonctionnalité principale
          </h2>

          <div class="overflow-hidden relative">
            <p class="text-sm sm:text-base md:text-lg lg:text-xl text-gray-600 leading-relaxed hover:text-black">
              Pour avoir accès aux resources, chaque utilisateur doit créer un compte à travers la page d'inscription 
              puis se connecter au niveau de la page de connexion en mettant son email et son mot de passe. <br>
              Le professeur, après s'être connecter, il sera redirigé vers son tableau de bord. A travers ce dernier,
              il a la possibilité de téléverser des fichiers, suprimer et mettre à jour ces fichiers. <br>
              L'étudiant est redirigé vers son tableau de bord. A travers cette page, il peut consulter puis 
              télécharger les fichiers qui le concerne.
            </p>
          </div>
        </div>
        
        <div class="max-w-xl w-full  mb-6 h-auto bg-white p-4 sm:p-6 md:p-8 rounded-lg shadow-md 
            flex flex-col justify-center items-center 
             hover:items-center active:items-center hover:mx-auto duration-500 overflow-hidden cursor-pointer text-left hover:text-center hover:bg-gradient-to-r hover:from-blue-600 hover:to-blue-400">
          <h2 class="text-3xl md:text-4xl lg:text-5xl h-full font-black bg-gradient-to-br from-[#00037a] to-[#2424f2] bg-clip-text text-transparent hover:bg-gradient-to-bl focus:outline-none focus:ring-4 dark:focus:ring-blue-800 mb-2">
            Ojectifs du CfptDocs
          </h2>

          <div class="overflow-hidden relative">
            <p class="text-sm sm:text-base md:text-lg lg:text-xl text-gray-600 leading-relaxed hover:text-black">
              ➤ 1. Donner un accès rapide aux supports pédagogiques <br>
                Permettre aux étudiants de consulter et de télécharger facilement les cours et exercices mis en ligne par les enseignants. <br>
              ➤ 2. Fournir un espace de dépôt et de gestion de fichiers <br>
                Offrir aux enseignants la possibilité de télèverser, modifier et organiser leurs documents en ligne via une interface claire. <br>
              ➤ 3. Rendre accessibles les concours <br>
              Permettre à des utilisateurs anonymes (sans compte) de consulter les sujets de concours d’entrée pour s’y préparer à distance.
            </p>
          </div>
        </div>


       

        <!-- Carte 3 -->
        
    </div>
  </section>

  <!-- Footer -->
  <footer
    class="bg-gradient-to-br from-[#00037a] to-[#1c1cdd] hover:bg-gradient-to-bl focus:ring-4 focus:outline-none dark:focus:ring-blue-800 text-white mt-10">
    <div class="max-w-7xl mx-auto px-4 py-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

      <!-- Logo + description -->
      <div>
        <div class="flex items-center mb-3">
          <a href="https://www.linkedin.com/school/cfpt/?originalSubdomain=fr" target="_blank" rel="noopener">
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
