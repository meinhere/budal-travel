@php
    $role = session()->get('user')->role;
@endphp

<x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
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

        <div class="flex flex-col items-center gap-4 px-6 mb-4 sm:px-12 mt-14 lg:mt-20">
            <h2 class="text-2xl font-semibold text-black">Filter Reservasi</h2>
            <form id="form-reservasi" class="flex gap-6 items-center" action="" method="GET">
                <label for="bulan">Bulan</label>
                <select name="bulan" id="bulan" class="border border-gray-300 rounded-md">
                    <option value="0" {{ now()->format('m') == '01' ? 'selected' : '' }}>Januari</option>
                    <option value="1" {{ now()->format('m') == '02' ? 'selected' : '' }}>Februari</option>
                    <option value="2" {{ now()->format('m') == '03' ? 'selected' : '' }}>Maret</option>
                    <option value="3" {{ now()->format('m') == '04' ? 'selected' : '' }}>April</option>
                    <option value="4" {{ now()->format('m') == '05' ? 'selected' : '' }}>Mei</option>
                    <option value="5" {{ now()->format('m') == '06' ? 'selected' : '' }}>Juni</option>
                    <option value="6" {{ now()->format('m') == '07' ? 'selected' : '' }}>Juli</option>
                    <option value="7" {{ now()->format('m') == '08' ? 'selected' : '' }}>Agustus</option>
                    <option value="8" {{ now()->format('m') == '09' ? 'selected' : '' }}>September</option>
                    <option value="9" {{ now()->format('m') == '10' ? 'selected' : '' }}>Oktober</option>
                    <option value="10" {{ now()->format('m') == '11' ? 'selected' : '' }}>November</option>
                    <option value="11" {{ now()->format('m') == '12' ? 'selected' : '' }}>Desember</option>
                </select>
                <label for="tahun">Tahun</label>
                <input type="number" name="tahun" id="tahun" min="2000" max="2099" step="1" value="2024" class="border border-gray-300 rounded-md">
                <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-md">Filter</button>
            </form>
        </div>

        {{-- Chart --}}
        <div class="mt-10 ms-8">
            <h2 class="text-2xl font-semibold text-black">Reservation Chart</h2>
            <canvas id="reservationChart" width="400" height="200" role="img"></canvas>
        </div>

        <script>
            const reservationData = {!! json_encode($reservasi) !!};

            // mendapatkan data reservasi dari database dan mengubahnya menjadi array
            const tahunReservasi = reservationData.map(data => new Date(data.waktu_reservasi).getFullYear());
            const bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
            bulanReservasi = reservationData.map(data => new Date(data.waktu_reservasi).getMonth());
            const hari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"],
            hariReservasi = reservationData.map(data => new Date(data.waktu_reservasi).getDay());
            // const totalPerBulan = new Array(12).fill(0);
            let dataPerDayPerMonth = new Array(12).fill().map(() => new Array(7).fill(0));
            let tglDipilih = [];
            let hariDipilih = [];
            let countPerDate = [];
            const d = new Date();
            let inputBulan =  d.getMonth();
            let inputTahun =   d.getFullYear();
            let resReservation = reservationData.filter((data,i) => tahunReservasi[i] == inputTahun && bulanReservasi[i] == inputBulan);

            /* menghitung jumlah reservasi per bulan */
            // for (let i = 0; i < resReservation.length; i++) {
            //     const date = new Date(resReservation[i].waktu_reservasi);
            //     if (date.getFullYear() === inputTahun) {
            //         const month = date.getMonth();
            //         totalPerBulan[month] += 1;
            //     }
            // }

            // mengisi data per hari per bulan
            for (let i = 0; i < bulanReservasi.length; i++) {

                if (bulanReservasi[i] == inputBulan && tahunReservasi[i] == inputTahun) {
                    hariDipilih.push(hari[hariReservasi[i] % 7]);
                    if (!tglDipilih.includes(new Date(reservationData[i].waktu_reservasi).getDate())) {
                        tglDipilih.push(new Date(reservationData[i].waktu_reservasi).getDate());
                    }
                    countPerDate[new Date(reservationData[i].waktu_reservasi).getDate()] = (countPerDate[new Date(reservationData[i].waktu_reservasi).getDate()] || 0) + 1;
                }
            }

            // membuat chart line
            const ctx = document.getElementById('reservationChart').getContext('2d');
            let reservationChart = new Chart(ctx, {
                type: 'bar',
                data: { 
                    labels: tglDipilih.map((tgl, i) => hariDipilih[i] + ' ' + tgl),
                    datasets: [{
                        label: bulan[inputBulan],
                        data: tglDipilih.map(tgl => countPerDate[tgl]),
                        backgroundColor: [
                            'rgba(75, 192, 192, 0.2)',
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 1)'
                        ],
                        borderWidth: 1,
                    }
                    ]
                },
                options: {
                    datasets: {
                        bar: {
                            barPercentage: 0.1,
                            categoryPercentage: 0.3
                        }
                    },
                    plugins: {
                        legend: {
                            display: false,
                            position: 'bottom',
                            labels: {
                                usePointStyle: true,
                                pointStyle: 'circle',
                                padding: 30,
                            },
                        },
                        title: {
                            display: true,
                            color: '#333',
                            text: 'Reservasi pada Bulan ' + bulan[inputBulan] + ' ' + inputTahun,
                            font: {
                                size: 16,
                                weight: 'bold'
                            },
                            padding: {
                                top: 10,
                                bottom: 30
                            }
                        },
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1
                            },
                            grid: {
                                display: false,
                            },
                            title: {
                                display: true,
                                text: 'Jumlah Reservasi',
                                color: '#333',
                                font: {
                                    size: 14,
                                    weight: 'bold'
                                },
                                padding: {
                                    top: 10,
                                    bottom: 10
                                }
                            }
                        },
                        x: {
                            grid: {
                                display: false,
                            },
                            border: {
                                display: true,
                            },
                            title: {
                                display: true,
                                text: 'Hari & Tanggal',
                                color: '#333',
                                font: {
                                    size: 14,
                                    weight: 'bold'
                                },
                                padding: {
                                    top: 10,
                                    bottom: 10
                                }
                            }
                        }
                    },
                }
            });

            $('#form-reservasi').on('submit', function(e) {
                e.preventDefault();
                inputBulan = parseInt($('#bulan').val());
                inputTahun = parseInt($('#tahun').val());
                let dataPerDayPerMonth = new Array(12).fill().map(() => new Array(7).fill(0));
                let tglDipilih = [];
                let hariDipilih = [];
                let countPerDate = [];
                // window.location.href = '/dashboard?bulan=' + inputBulan + '&tahun=' + inputTahun;
                let resReservation = reservationData.filter((data,i) => tahunReservasi[i] == inputTahun && bulanReservasi[i] == inputBulan);
                for (let i = 0; i < bulan.length; i++) {

                    if (bulanReservasi[i] == inputBulan && tahunReservasi[i] == inputTahun) {
                        hariDipilih.push(hari[hariReservasi[i] % 7]);
                        if (!tglDipilih.includes(new Date(reservationData[i].waktu_reservasi).getDate())) {
                            tglDipilih.push(new Date(reservationData[i].waktu_reservasi).getDate());
                        }
                        countPerDate[new Date(reservationData[i].waktu_reservasi).getDate()] = (countPerDate[new Date(reservationData[i].waktu_reservasi).getDate()] || 0) + 1;
                    }
                }
                reservationChart.data.labels = tglDipilih.map((tgl, i) => hariDipilih[i] + ' ' + tgl);
                reservationChart.options.plugins.title.text = 'Reservasi pada Bulan ' + bulan[inputBulan] + ' ' + inputTahun;
                reservationChart.data.datasets[0].data = tglDipilih.map(tgl => countPerDate[tgl]);
                reservationChart.update();
            });
        </script>
        @endcan
    </div>
</x-app-layout>
