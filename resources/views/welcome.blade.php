<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="icon" type="image/x-icon" href="{{ asset('images/CfptDocs.jpg') }}">
</head>

<body class="bg-gray-100">

  <header class="bg-gradient-to-br from-[#00037a] to-[#1c1cdd] hover:bg-gradient-to-bl focus:ring-4 focus:outline-none  dark:focus:ring-blue-800">
    <div class="max-w-7xl mx-auto flex justify-between items-center px-4 py-3">
      <div class="flex items-center">
        <img src="{{ asset('images/CfptDocs.jpg') }}" class="w-11 h-11 rounded-md" alt="Logo">
      </div>

      <div class="hidden md:flex space-x-6 text-white font-medium">
        <a href="{{ route('about') }}" class="hover:underline">A propos</a>
        <a href="{{ route('concours') }}" class="hover:underline">Concours</a>
        <a href="{{ route('register') }}" class="hover:underline">S'inscrire</a>
        <a href="{{ route('login') }}" class="hover:underline">Connexion</a>
      </div>

      <!-- Mobile menu button -->
      <div class="md:hidden">
        <button id="menu-btn" class="text-white focus:outline-none focus:ring-2 focus:ring-white">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 6h16M4 12h16M4 18h16"/>
          </svg>
        </button>
      </div>
    </div>

    <!-- Mobile menu -->
    <div id="mobile-menu" class="md:hidden hidden px-4 pb-4 text-white space-y-2">
      <a href="{{ route('about') }}" class="block">A propos</a>
      <a href="{{ route('concours') }}" class="block">Concours</a>
      <a href="{{ route('register') }}" class="block">S'inscrire</a>
      <a href="{{ route('login') }}" class="block">Connexion</a>
    </div>
  </header>
  <section class="w-full bg-[#eff1f4] py-12 px-4">
      <div class="max-w-5xl mx-auto text-center">
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-black 
          bg-gradient-to-br from-[#00037a] to-[#2424f2] 
          bg-clip-text text-transparent 
          hover:bg-gradient-to-bl 
          focus:outline-none focus:ring-4 dark:focus:ring-blue-800 mb-6">
          Bienvenue au CfptDocs
        </h1>


        <p class="text-base md:text-lg text-gray-500 dark:text-gray-400 leading-relaxed">
          Découvrez des centaines de documents de TP, de TD et d'épreuves de concours à votre disposition. <br class="hidden sm:block">
          Avec CfptDocs, notre apprentissage devient plus facile.
        </p>

        <div class="flex flex-col sm:flex-row justify-center items-center mt-10 space-y-4 sm:space-y-0 sm:space-x-4">
          <a href="#" class="bg-gradient-to-br from-[#00037a] to-[#1c1cdd] hover:bg-gradient-to-bl focus:ring-4 focus:outline-none  dark:focus:ring-blue-800
            text-white px-6 py-3 rounded-md text-base font-semibold hover:bg-blue-900 transition">
            Commencez maintenant
          </a>
          <a href="#"class="text-[#00037a] border border-[#00037a] px-6 py-3 rounded-md text-base font-semibold
            hover:bg-[#1717cf] hover:text-white
            focus:outline-none focus:ring-2 focus:ring-[#00037a] transition duration-200 ease-in-out">
              En savoir plus
            </a>
        </div>
      </div>
  </section>
  <section class="bg-[#e8e8ec] w-full pt-12">
      <!-- Titre -->
      <p class="text-2xl md:text-3xl lg:text-4xl font-black text-center 
        bg-gradient-to-br from-[#00037a] to-[#2424f2] 
        bg-clip-text text-transparent 
        hover:bg-gradient-to-bl 
        focus:outline-none focus:ring-4 dark:focus:ring-blue-800 mb-12 px-5">
        Documents Disponibles
      </p>

      <!-- Cartes de documents -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 px-6 lg:px-20">
        <!-- Carte 1 -->
        <div class="bg-white rounded-md shadow-md p-5 flex flex-col justify-between">
          <h2 class="text-[#2c2cd0] font-bold text-[18px] mb-4">Documents de Travaux Dirigés</h2>
          <p class="text-gray-600 text-center text-sm flex-grow">Trouvez ici des documents de travaux dirigés de vos cours</p>
          <div class="flex items-center mt-5">
            <div class="w-6 mr-2 text-[#00037a]">
              <!-- Icône -->
              <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M5.625 1.5c-1.036...Z" clip-rule="evenodd"/>
                <path d="M12.971 1.816A5.23...Z"/>
              </svg>
            </div>
            <p class="text-sm text-gray-500">Plus de 20 documents disponibles !</p>
          </div>
          <a href="#" class="mt-6 bg-gradient-to-br from-[#00037a] to-[#1c1cdd] hover:bg-gradient-to-bl text-white py-2 rounded-md text-center font-semibold transition">
            Voir plus
          </a>
        </div>

        <!-- Carte 2 -->
        <div class="bg-white rounded-md shadow-md p-5 flex flex-col justify-between">
          <h2 class="text-[#2c2cd0] font-bold text-[18px] mb-4">Documents de Travaux Pratiques</h2>
          <p class="text-gray-600 text-center text-sm flex-grow">Trouvez ici des documents de travaux pratiques de vos cours</p>
          <div class="flex items-center mt-5">
            <div class="w-6 mr-2 text-[#00037a]">
              <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M5.625 1.5c-1.036...Z" clip-rule="evenodd"/>
                <path d="M12.971 1.816A5.23...Z"/>
              </svg>
            </div>
            <p class="text-sm text-gray-500">Plus de 20 documents disponibles !</p>
          </div>
          <a href="#" class="mt-6 bg-gradient-to-br from-[#00037a] to-[#1c1cdd] hover:bg-gradient-to-bl text-white py-2 rounded-md text-center font-semibold transition">
            Voir plus
          </a>
        </div>

        <!-- Carte 3 -->
        <div class="bg-white rounded-md shadow-md p-5 flex flex-col justify-between">
          <h2 class="text-[#2c2cd0] font-bold text-[18px] mb-4">Épreuves de Concours</h2>
          <p class="text-gray-600 text-center text-sm flex-grow">Trouvez ici des épreuves de concours de tous les niveaux</p>
          <div class="flex items-center mt-5">
            <div class="w-6 mr-2 text-[#00037a]">
              <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M5.625 1.5c-1.036...Z" clip-rule="evenodd"/>
                <path d="M12.971 1.816A5.23...Z"/>
              </svg>
            </div>
            <p class="text-sm text-gray-500">Plus de 30 épreuves disponibles !</p>
          </div>
          <a href="#" class="mt-6 bg-gradient-to-br from-[#00037a] to-[#1c1cdd] hover:bg-gradient-to-bl text-white py-2 rounded-md text-center font-semibold transition">
            Voir plus
          </a>
        </div>
      </div>

      <!-- Pourquoi nous choisir -->
      <div class="mt-24 px-6 w-full h-max  py-11 mb-0 bg-white">
        <p class="text-center text-2xl md:text-3xl lg:text-4xl font-black 
          bg-gradient-to-br from-[#00037a] to-[#2424f2] bg-clip-text text-transparent mb-10">
          Pourquoi nous choisir ?
        </p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
          <!-- Bloc 1 -->
          <div>
            <img src="https://img.icons8.com/?size=100&id=44005&format=png&color=00037a" alt="Gestion" class="mx-auto mb-4">
            <p class="font-bold text-lg bg-gradient-to-br from-[#00037a] to-[#2424f2] bg-clip-text text-transparent mb-2">Gestion de fichiers</p>
            <p class="text-sm text-gray-500">Des documents de TP et TD pour vos cours</p>
          </div>

          <!-- Bloc 2 -->
          <div>
            <img src="https://img.icons8.com/?size=100&id=tZuAOUGm9AuS&format=png&color=000000" alt="Partage" class="mx-auto mb-4">
            <p class="font-bold text-lg bg-gradient-to-br from-[#00037a] to-[#2424f2] bg-clip-text text-transparent mb-2">Partage de fichiers</p>
            <p class="text-sm text-gray-500">Les professeurs partagent des fichiers de TP et TD.</p>
          </div>

          <!-- Bloc 3 -->
          <div>
            <img src="https://img.icons8.com/?size=100&id=44005&format=png&color=00037a" alt="Concours" class="mx-auto mb-4">
            <p class="font-bold text-lg bg-gradient-to-br from-[#00037a] to-[#2424f2] bg-clip-text text-transparent mb-2">Épreuves de concours</p>
            <p class="text-sm text-gray-500">Consultez et téléchargez des épreuves pour vous préparer.</p>
          </div>
        </div>
      </div>
  </section>
  <footer class="bg-gradient-to-br from-[#00037a] to-[#1c1cdd] hover:bg-gradient-to-bl focus:ring-4 focus:outline-none  dark:focus:ring-blue-800 text-white mt-10">
  <div class="max-w-7xl mx-auto px-4 py-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
    
    <!-- Logo + description -->
    <div>
      <div class="flex items-center mb-3">
         <a href="https://www.linkedin.com/school/cfpt/?originalSubdomain=fr" target="_blank">
           <img src="{{ asset('images/Logocfpt.png') }}" alt="Logo CFPT Sénégal-Japon" class="w-12 h-12 rounded mr-3">
        </a>
        <h2 class="text-xl font-bold">CFPT SENEGAL-JAPON</h2>
      </div>
      <p class="text-sm text-gray-300">
        Le Centre de Formation Professionnelle et Technique Sénégal-Japon (CFPT) a vu le jour en 1984.
        Il est l'un des fleurons de la coopération entre la République du Sénégal et le Gouvernement du Japon.
      </p>
      <div class="flex space-x-4 mt-4">
        <a href="https://www.facebook.com/cfptsenjap/?locale=fr_FR" target="_blank">
          <img src="{{ asset('images/facebook.jpg') }}" alt="Facebook" class="w-8 h-8 rounded">
        </a>
        <a href="https://www.instagram.com/cfpt_senegal_japon_officiel/" target="_blank">
          <img src="{{ asset('images/instagram.jpg') }}" alt="Instagram" class="w-8 h-8 rounded">
        </a>
        <a href="https://www.linkedin.com/school/cfpt/?originalSubdomain=fr" target="_blank">
          <img src="{{ asset('images/Linkedin.jpg') }}" alt="LinkedIn" class="w-8 h-8 rounded">
        </a>
      </div>
      <div class="mt-3">
        <a href="http://cfptsj.sn" target="_blank" class="text-blue-400 font-bold hover:underline">
          www.cfpt.sn
        </a>
      </div>
    </div>

    <!-- Documents -->
    <div>
      <h3 class="text-xl font-bold mb-3 mx-[60px] w-full">Documents Stockés</h3>
      <ul class="space-y-2 text-gray-300 mx-[60px] w-full">
        <li>Documents de TD</li>
        <li>Documents de TP</li>
        <li>Épreuves de concours</li>
      </ul>
    </div>

    <!-- Filières -->
    <div>
      <h3 class="text-xl font-bold mb-3 mx-[60px]">Départements</h3>
      <ul class="space-y-2 text-gray-300 mx-[60px]">
        <li>Informatique</li>
        <li>Electrique</li>
      </ul>
    </div>

    <!-- Niveaux -->
    <div>
      <h3 class="text-xl font-bold mb-3 mx-[60px]">Niveaux d'étude</h3>
      <ul class="space-y-2 text-gray-300 mx-[60px]">
        <li>1ère année en BTS</li>
        <li>2e année en BTS</li>
      </ul>
    </div>
  </div>

  <!-- Bas de page -->
  <div class="bg-[#1e0471] py-4">
    <p class="text-center text-sm text-gray-200">
      &copy; 2025 CFPT Sénégal-Japon. Tous droits réservés — Design by <span class="font-bold text-white">BINOME DIGITAL</span>
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