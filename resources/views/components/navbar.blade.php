<nav x-data="{ isOpen: false }" class="fixed top-0 w-full">
    <div class="mx-auto max-w-6xl p-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <a href="/" class="flex-shrink-0">
          <img class="h-14 w-14" src="{{ url('/img/logo.png') }}" alt="Logo Budal Travel">
        </a>
        <div class="block">
          <div class="ml-4 flex items-center md:ml-6">
            <div class="block">
                <div class="ml-10 flex items-baseline space-x-4">
                  <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                  <a href="#" class="text-primary-base hover:bg-primary-base hover:text-secondary-base rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Login</a>
                  <a href="#" class="bg-primary-base text-secondary-base rounded-md px-3 py-2 text-sm font-medium">Daftar</a>
                </div>
              </div>
          </div>
        </div>
        {{-- <div class="mr-2 flex md:hidden">
          <!-- Mobile menu button -->
          <button @click="isOpen = !isOpen" type="button" class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" aria-controls="mobile-menu" aria-expanded="false">
            <span class="absolute -inset-0.5"></span>
            <span class="sr-only">Open main menu</span>
            <!-- Menu open: "hidden", Menu closed: "block" -->
            <svg :class="{'hidden': isOpen, 'block': !isOpen }" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <!-- Menu open: "block", Menu closed: "hidden" -->
            <svg :class="{'hidden': !isOpen, 'block': isOpen }" class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div> --}}
      </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div x-show="isOpen"  class="md:hidden" id="mobile-menu">
      <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
        <a href="#" class="text-primary hover:bg-primary hover:text-secondary-base block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Login</a>
        <a href="#" class="bg-primary text-secondary-base hover:text-white block rounded-md px-3 py-2 text-base font-medium">Daftar</a>
      </div>
    </div>
  </nav>