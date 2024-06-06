@php
    $role = session()->get('user')->role;
@endphp

<x-app-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="min-h-screen mx-auto pt-28 lg:pt-12">
        {{-- Content Heading --}}
        <div class="px-6 overflow-hidden shadow-sm sm:px-12 sm:rounded-lg">
            <h2 class="text-3xl font-semibold text-black">Budal Travel Dashboard</h2>
            <p class="pt-2 text-gray-400 font-xs">Manage your bus travel agency operations efficiently with Budal Travel's comprehensive admin dashboard</p>
        </div>

        @can('admin', $role)
        <div class="relative mt-10 bg-center bg-cover before:absolute before:h-full before:w-full before:bg-black/30" style="background-image: url({{ $background }});">
            <div class="relative px-6 pt-16 overflow-hidden shadow-sm sm:px-12 sm:rounded-lg">
                <div class="w-full sm:w-3/4 md:w-1/2">
                    <h2 class="text-5xl font-bold tracking-tighter text-primary-base">More Than Just A Trip</h2>
                    <p class="pt-2 text-lg text-primary-base">Manage your bus travel agency operations efficiently with Budal Travel's comprehensive admin dashboard. Streamline bookings, manage schedules, and oversee customer information with ease.</p>
                </div>

                <div class="w-full pt-8 pb-20 sm:w-3/5 md:w-1/3">
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
        <div class="flex flex-wrap items-center justify-center gap-6 px-6 mb-4 sm:px-12 lg:flex-nowrap mt-14 lg:mt-20">
            <x-card-dashboard-transaction :value="$pendapatan['total']" :profit="true" :presentage="45" :from="4.6">Total Pendapatan</x-card-dashboard-transaction>
            <x-card-dashboard-transaction :value="$pendapatan['success']" :profit="true" :presentage="45" :from="4.6">Sudah Dibayar</x-card-dashboard-transaction>
            <x-card-dashboard-transaction :value="$pendapatan['pending']" :profit="false" :presentage="17" :from="4.6">Belum Dibayar</x-card-dashboard-transaction>
        </div>

        {{-- Chart --}}
        <div class="mt-10">
            <h2 class="text-2xl font-semibold text-black">Reservation Chart</h2>
            <canvas id="reservationChart" width="400" height="200"></canvas>
        </div>

        @push('scripts')
        <script>
            const reservationData = {!! json_encode($reservasi) !!};

            const ctx = document.getElementById('reservationChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: reservationData.labels,
                    datasets: [{
                        label: 'Reservations',
                        data: reservationData.data,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            precision: 0
                        }
                    }
                }
            });
        </script>
        @endpush
        @endcan
    </div>
</x-app-layout>
