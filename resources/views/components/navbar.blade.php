<style>
  .nav-fixed {
    background: linear-gradient(to top, rgba(60, 72, 107, 0), rgba(60, 72, 107, 0.8));
    backdrop-filter: blur(3px);
  }
</style>

<nav x-data="{ isOpen: false }" class="fixed top-0 z-10 w-full">
  <div class="max-w-6xl p-4 mx-auto sm:px-6 lg:px-8">
    <div class="flex items-center justify-between h-16">
      <a href="/" class="flex-shrink-0">
        <img class="w-17 h-17" src="{{ url('/img/logo.svg') }}" alt="Logo Budal Travel">
      </a>
      <div class="block">
        <div class="flex items-center ml-4 md:ml-6">
          <div class="block">
              <div class="flex items-baseline ml-10 space-x-4">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <a href="#" class="px-5 py-3 rounded-md text-primary-base hover:bg-primary-base hover:text-secondary-base" aria-current="page">Login</a>
                <a href="#" class="px-5 py-3 rounded-md bg-primary-base text-secondary-base">Daftar</a>
              </div>
            </div>
        </div>
      </div>
      {{-- <div class="flex mr-2 md:hidden">
        <!-- Mobile menu button -->
        <button @click="isOpen = !isOpen" type="button" class="relative inline-flex items-center justify-center p-2 text-gray-400 bg-gray-800 rounded-md hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" aria-controls="mobile-menu" aria-expanded="false">
          <span class="absolute -inset-0.5"></span>
          <span class="sr-only">Open main menu</span>
          <!-- Menu open: "hidden", Menu closed: "block" -->
          <svg :class="{'hidden': isOpen, 'block': !isOpen }" class="block w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
          <!-- Menu open: "block", Menu closed: "hidden" -->
          <svg :class="{'hidden': !isOpen, 'block': isOpen }" class="hidden w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div> --}}
    </div>
  </div>

  <!-- Mobile menu, show/hide based on menu state. -->
  <div x-show="isOpen"  class="md:hidden" id="mobile-menu">
    <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
      <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
      <a href="#" class="block px-3 py-2 text-base font-medium rounded-md text-primary hover:bg-primary hover:text-secondary-base" aria-current="page">Login</a>
      <a href="#" class="block px-3 py-2 text-base font-medium rounded-md bg-primary text-secondary-base hover:text-white">Daftar</a>
    </div>
  </div>
</nav>

<script>
  window.onscroll = function () {
    const nav = document.querySelector("nav"); // ambil elemen dengan nama class nav
    const fixedNav = nav.offsetTop; // ambil jarak dari atas hingga elemen class nav

      // Apabila jarak nav bertambah (melebihi fixedNav)
      if (window.pageYOffset > fixedNav) {
        nav.classList.add("nav-fixed"); // tambah class nav-fixed
      } else {
        nav.classList.remove("nav-fixed"); // hapus class menu-fixed
      }
  };
</script>