@php
    $role = session()->get('user')->role;
@endphp

<aside id="sidebar" class="fixed top-0 left-0 z-20 flex-col flex-shrink-0 hidden w-64 h-full pt-16 duration-75 lg:flex lg:pt-0 transition-width" aria-label="Sidebar">
  <div class="relative flex flex-col flex-1 h-full pt-0 border-r border-gray-200 bg-primary-base">
      <div class="flex flex-col flex-1 pt-12 pb-4 overflow-y-auto">
          <div class="flex-1 px-8 space-y-1 bg-primary-base">
            {{-- Heading --}}
            <a href="/dashboard" class="flex items-center justify-center gap-3 p-3 text-base rounded-lg text-primary-base bg-secondary-base group">
                @svg('bi-lightning-charge')
                <span>{{ session()->get('user')->nama_karyawan }}</span>
            </a>
            
            <div class="pt-6 pb-4 space-y-2">
                <x-side-link-dashboard href="{{ route('dashboard') }}" :active="request()->is('dashboard')">
                    <x-side-icon-dashboard icon="bi-speedometer2" :active="request()->is('dashboard')"></x-side-icon-dashboard>
                    <span class="ml-4">Overview</span>
                </x-side-link-dashboard>

                @can('admin', $role)
                <x-side-link-dashboard href="{{ route('dashboard.bus') }}" :active="request()->is('dashboard/bus*')">
                    <x-side-icon-dashboard  icon="bi-bus-front" :active="request()->is('dashboard/bus*')"></x-side-icon-dashboard>
                    <span class="ml-4">Kelola Bus</span>
                </x-side-link-dashboard>
                
                <x-side-link-dashboard href="{{ route('dashboard.wisata') }}" :active="request()->is('dashboard/wisata*')">
                    <x-side-icon-dashboard  icon="bi-houses" :active="request()->is('dashboard/wisata*')"></x-side-icon-dashboard>
                    <span class="ml-4">Kelola Wisata</span>
                </x-side-link-dashboard>

                <x-side-link-dashboard href="{{ route('dashboard.user') }}" :active="request()->is('dashboard/user*')">
                    <x-side-icon-dashboard  icon="bi-people" :active="request()->is('dashboard/user*')"></x-side-icon-dashboard>
                    <span class="ml-4">Kelola Users</span>
                </x-side-link-dashboard>
                
                @else
                <x-side-link-dashboard href="{{ route('dashboard.transaction') }}" :active="request()->is('dashboard/transaction/*')">
                    <x-side-icon-dashboard  icon="bi-currency-dollar" :active="request()->is('dashboard/transaction/*')"></x-side-icon-dashboard>
                    <span class="ml-4">Kelola Transaksi</span>
                </x-side-link-dashboard>
                @endcan
            </div>
            
            <div class="pt-4 space-y-2 border-t border-secondary-base">
                <form action="{{ route("logout") }}" method="POST">
                    @csrf
                    <a :href="{{ route("logout") }}" onclick="event.preventDefault();
                    this.closest('form').submit();" class="flex items-center p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg cursor-pointer hover:bg-primary-200 group">
                        @svg('carbon-logout', ['class' => "w-5 h-5 transition duration-75 group-hover:text-gray-900 text-gray-500"])
                        <span class="ml-3">Logout</span>
                    </a>
                </form>
            </div>
          </div>
      </div>
  </div>
</aside>