<nav class="fixed z-30 w-full bg-white border-b border-gray-200 lg:hidden">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">
                <button id="toggleSidebarMobile" aria-expanded="true" aria-controls="sidebar" class="p-2 mr-2 text-gray-600 rounded cursor-pointer lg:hidden hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100 focus:ring-2 focus:ring-gray-100">
                    @svg('iconpark-hamburgerbutton', ['class' => 'w-6 h-6', 'id' => 'toggleSidebarMobileHamburger'])
                    @svg('iconpark-close', ['class' => 'w-6 h-6 hidden', 'id' => 'toggleSidebarMobileClose'])
                </button>
                
                <a href="#" class="text-xl font-bold flex items-center lg:ml-2.5">
                   <x-application-logo class="w-20"></x-application-logo>
                    <span class="self-center whitespace-nowrap">Budal Travel</span>
                </a>
            </div>
            
            <div class="flex items-center"><button id="toggleSidebarMobileSearch" type="button" class="hidden"></button></div>
        </div>
    </div>
</nav>