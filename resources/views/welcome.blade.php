<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

  <header class="bg-gradient-to-br from-[#00037a] to-[#1c1cdd] hover:bg-gradient-to-bl focus:ring-4 focus:outline-none  dark:focus:ring-blue-800
">
    <div class="max-w-7xl mx-auto flex justify-between items-center px-4 py-3">
      <div class="flex items-center">
        <img src="{{ asset('images/CfptDocs.jpg') }}" class="w-11 h-11 rounded-md" alt="Logo">
      </div>

      <div class="hidden md:flex space-x-6 text-white font-medium">
        <a href="#" class="hover:underline">A propos</a>
        <a href="#" class="hover:underline">Concours</a>
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
      <a href="#" class="block">A propos</a>
      <a href="#" class="block">Concours</a>
      <a href="{{ route('register') }}" class="block">S'inscrire</a>
      <a href="{{ route('login') }}" class="block">Connexion</a>
    </div>
  </header>
  <section class="w-full bg-[#F9FAFB] py-12 px-4">
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
<section class="h-[200px] bg-gray-200 w-full">
  <p class="text-2xl md:text-2xl lg:text-3xl font-black  bg-gradient-to-br from-[#00037a] to-[#2424f2] 
        bg-clip-text text-transparent 
        hover:bg-gradient-to-bl 
        focus:outline-none focus:ring-4 dark:focus:ring-blue-800 mb-6 px-5 py-11">Documents Disponsibles</p>

</section>

  <script>
    const btn = document.getElementById('menu-btn');
    const menu = document.getElementById('mobile-menu');

    btn.addEventListener('click', () => {
      menu.classList.toggle('hidden');
    });
  </script>

</body>

</html>