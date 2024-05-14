<aside id="sidebar" class="fixed top-0 left-0 z-20 flex-col flex-shrink-0 hidden w-64 h-full pt-16 duration-75 lg:flex lg:pt-0 transition-width" aria-label="Sidebar">
  <div class="relative flex flex-col flex-1 h-full pt-0 border-r border-gray-200 bg-primary-base">
      <div class="flex flex-col flex-1 pt-12 pb-4 overflow-y-auto">
          <div class="flex-1 px-8 space-y-1 bg-primary-base">
            {{-- Heading --}}
            <a href="/dashboard" class="flex items-center justify-center gap-3 p-3 text-base rounded-lg text-primary-base bg-secondary-base group">
                <x-bi-lightning-charge />
                <span>Welcome Guides</span>
            </a>
            
            <div class="pt-6 pb-4 space-y-2">
                <a href="/dashboard" class="flex items-center p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg hover:bg-primary-200 {{ request()->is('dashboard') ? 'bg-primary-200' : '' }} group">
                    <x-bi-speedometer2 class="flex-shrink-0 w-5 h-5 transition duration-75 group-hover:text-gray-900 {{ request()->is('dashboard') ? 'text-gray-900' : 'text-gray-500' }}"  />
                    <span class="ml-4">Overview</span>
                </a>
                <a href="/dashboard/transaction" class="flex items-center p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg hover:bg-primary-200 {{ request()->is('dashboard/transaction') ? 'bg-primary-200' : '' }} group">
                    <x-bi-currency-dollar class="flex-shrink-0 w-5 h-5 transition duration-75 group-hover:text-gray-900 {{ request()->is('dashboard/transaction') ? 'text-gray-900' : 'text-gray-500' }}" />
                    <span class="ml-3">Detail Transaksi</span>
                </a>
            </div>

            <div class="pt-4 space-y-2 border-t border-secondary-base">
                <form action="{{ route("logout") }}" method="POST">
                    @csrf
                    <a :href="{{ route("logout") }}" onclick="event.preventDefault();
                    this.closest('form').submit();" class="flex items-center p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg cursor-pointer hover:bg-primary-200 group">
                        <x-carbon-exit class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" />
                        <span class="ml-3">Logout</span>
                    </a>
                </form>
            </div>
          </div>
      </div>
  </div>
</aside>