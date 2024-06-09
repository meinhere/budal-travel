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
        <x-application-logo class="w-28 h-28" />
      </a>

      @auth
      {{-- Nav Links --}}
      <div class="items-baseline hidden ml-10 space-x-4 sm:flex">
        <a href="/" class="border-b-2 text-primary-base hover:border-primary-base {{ request()->is('/') || request()->is('search/*') || request()->is('order/*') || request()->is('profile')  ? 'border-primary-base' : 'border-transparent' }}" aria-current="page">Home</a>
        <a href="/transaction" class="border-b-2 text-primary-base hover:border-primary-base {{ request()->is('transaction*') ? 'border-primary-base' : 'border-transparent' }}" aria-current="page">Riwayat Transaksi</a>
      </div>

      <!-- Settings Dropdown -->
      <div class="hidden sm:flex sm:items-center sm:ms-6">
        <x-dropdown align="right" width="48">
            <x-slot name="trigger">
                <button @click="isOpen = !isOpen" class="inline-flex items-center gap-2 transition duration-150 ease-in-outborder-transparent " id="profile-button">
                  @svg('carbon-user-avatar-filled', ['class' => 'w-12 h-12 text-primary-200'])
                  @svg('carbon-chevron-down', ['class' => 'w-6 h-6 text-primary-base', 'x-show' => '!isOpen'])
                  @svg('carbon-chevron-up', ['class' => 'w-6 h-6 text-primary-base', 'x-show' => 'isOpen'])
                </button>
            </x-slot> 

            <x-slot name="content">
                <div class="block w-full px-4 py-2 text-sm leading-5 text-gray-700 border-b border-gray-200 text-start">{{ session()->get('user')->nama_pelanggan ?? session()->get('user')->nama_karyawan }}</div>

                <x-dropdown-link :href="route('profile.edit')">
                  {{ __('Edit Profile') }}
                </x-dropdown-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>
      </div>

      <!-- Hamburger -->
      <div class="flex items-center -me-2 sm:hidden">
          <button @click="isOpen = ! isOpen" class="inline-flex items-center justify-center p-2 text-gray-200 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
              <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                  <path :class="{'hidden': isOpen, 'inline-flex': ! isOpen }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                  <path :class="{'hidden': ! isOpen, 'inline-flex': isOpen }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
          </button>
      </div> 
      @endauth

      @guest
      <div class="block">
        <div class="flex items-center ml-4 md:ml-6">
          <div class="block">
              <div class="flex items-baseline ml-10 space-x-4">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <a href="/login" class="px-5 py-3 rounded-md text-primary-base hover:bg-primary-base hover:text-secondary-base" aria-current="page">Login</a>
                <a href="/register" class="px-5 py-3 rounded-md bg-primary-base text-secondary-base">Daftar</a>
              </div>
            </div>
        </div>
      </div>
      @endguest
    </div>
  </div>

  <!-- Responsive Navigation Menu -->
  @auth
  <div :class="{'block': isOpen, 'hidden': ! isOpen}" class="hidden sm:hidden bg-grey-100">
    <div class="px-4 py-4 space-y-1">
        <div class="text-base font-semibold text-gray-800">Halo, {{ session()->get('user')->nama_pelanggan ?? session()->get('user')->nama_karyawan }}</div>
    </div>
    
    <div class="pt-2 pb-3 space-y-1 border-t border-gray-600">
      <x-responsive-nav-link href="/" :active="request()->is('/') || request()->is('search/*') || request()->is('order/*')">
        {{ __('Home') }}
      </x-responsive-nav-link>
      
      <x-responsive-nav-link href="/" :active="request()->is('transaction*')">
        {{ __('Riwayat Transaksi') }}
      </x-responsive-nav-link>
    </div>

    <!-- Responsive Settings Options -->
    <div class="pt-2 pb-3 space-y-1 border-t border-gray-600">
        <x-responsive-nav-link :href="route('profile.edit')" :active="request()->is('profile')">
            {{ __('Profile') }}
        </x-responsive-nav-link>

        <!-- Authentication -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-responsive-nav-link :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                {{ __('Log Out') }}
            </x-responsive-nav-link>
        </form>
    </div>
  </div> 
  @endauth
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