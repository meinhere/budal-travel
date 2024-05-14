<x-app-layout>
    <div class="min-h-screen px-5 mx-auto pt-28 lg:pt-12 max-w-7xl">
        {{-- Content Heading --}}
        <div class="overflow-hidden shadow-sm sm:rounded-lg">
            <h2 class="text-3xl font-semibold text-black">Budal Travel Dashboard</h2>
            <p class="pt-2 text-gray-400 font-xs">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis repudiandae odio quaerat, quasi voluptatibus sint ullam assumenda</p>
        </div>

        {{-- Card --}}
        <div class="flex flex-wrap items-center justify-center gap-6 mb-4 lg:flex-nowrap mt-14 lg:mt-20">
            <div class="p-4 shadow basis-full lg:basis-1/3 rounded-xl">
                <div class="pb-8">
                    <h3 class="text-base font-normal text-gray-500">Total Pendapatan</h3>
                    <span class="text-xl font-bold leading-none text-gray-900 sm:text-3xl">Rp 100.000.000,-</span>
                </div>

                <p class="text-xs font-semibold text-gray-400"><span class="px-3 py-1 mr-1 text-green-500 bg-green-100 rounded-xl">+45%</span> From 4.6%</p>
            </div>
            <div class="p-4 shadow basis-full lg:basis-1/3 rounded-xl">
                <div class="pb-8">
                    <h3 class="text-base font-normal text-gray-500">Sudah Dibayar</h3>
                    <span class="text-xl font-bold leading-none text-gray-900 sm:text-3xl">Rp 80.000.000,-</span>
                </div>

                <p class="text-xs font-semibold text-gray-400"><span class="px-3 py-1 mr-1 text-green-500 bg-green-100 rounded-xl">+45%</span> From 4.6%</p>
            </div>
            <div class="p-4 shadow basis-full lg:basis-1/3 rounded-xl">
                <div class="pb-8">
                    <h3 class="text-base font-normal text-gray-500">Belum Dibayar</h3>
                    <span class="text-xl font-bold leading-none text-gray-900 sm:text-3xl">Rp 20.000.000,-</span>
                </div>

                <p class="text-xs font-semibold text-gray-400"><span class="px-3 py-1 mr-1 text-red-500 bg-red-100 rounded-xl">-17%</span> From 4.6%</p>
            </div>
        </div>
    </div>
</x-app-layout>
