@php
    $role = session()->get('user')->role;
@endphp

<x-app-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="min-h-screen mx-auto pt-28 lg:pt-12">
        {{-- Content Heading --}}
        <div class="px-6 overflow-hidden shadow-sm sm:px-12 sm:rounded-lg">
            <h2 class="text-3xl font-semibold text-black">Budal Travel Dashboard</h2>
            <p class="pt-2 text-gray-400 font-xs">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis repudiandae odio quaerat, quasi voluptatibus sint ullam assumenda</p>
        </div>

        @can('admin', $role)
        <div class="relative mt-10 bg-center bg-cover before:absolute before:h-full before:w-full before:bg-black/30" style="background-image: url({{ $background }});">
            <div class="relative px-6 pt-16 overflow-hidden shadow-sm sm:px-12 sm:rounded-lg">
                <div class="w-5/12">
                    <h2 class="text-5xl font-bold tracking-tighter text-primary-base">More Than Just A Trip</h2>
                    <p class="pt-2 text-lg text-primary-base">Manage your bus travel agency operations efficiently with Budal Travel's comprehensive admin dashboard. Streamline bookings, manage schedules, and oversee customer information with ease.</p>
                </div>

                <div class="w-1/4 pt-8 pb-20">
                    <div class="w-full mt-4 rounded-md shadow-md h-28 bg-white/20 text-primary-base backdrop-blur-sm">
                        <div class="absolute w-24 h-8 translate-y-4 bg-secondary-base"></div>
                        <h1 class="relative pt-3 pl-6 text-4xl font-extrabold">+{{ $count_wisata }} <span class="text-xl">Destinasi Wisata</span></h1>
                        <p class="px-4 pt-1">Lebih dari {{ $count_wisata }} destinasi wisata yang sangat memukau</p>
                    </div>
                    <div class="w-full mt-4 rounded-md shadow-md h-28 bg-white/20 text-primary-base backdrop-blur-sm">
                        <div class="absolute w-24 h-8 translate-y-4 bg-secondary-base"></div>
                        <h1 class="relative pt-3 pl-6 text-4xl font-extrabold">+{{ $count_bus }} <span class="text-xl">Bus</span></h1>
                        <p class="px-4 pt-1">Dengan lebih dari {{ $count_bus }} bus, dapat menawarkan lebih banyak pilihan</p>
                    </div>
                    <div class="w-full mt-4 rounded-md shadow-md h-28 bg-white/20 text-primary-base backdrop-blur-sm">
                        <div class="absolute w-24 h-8 translate-y-4 bg-secondary-base"></div>
                        <h1 class="relative pt-3 pl-6 text-4xl font-extrabold">+{{ $count_user }} <span class="text-xl">New Users</span></h1>
                        <p class="px-4 pt-1">Lebih dari {{ $count_user }} pengguna baru yang mendaftar pada website ini</p>
                    </div>
                </div>
            </div>
        </div>

        @else
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
        @endcan
    </div>
</x-app-layout>
